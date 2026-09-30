<?php
/**
 * Lead handler (PLAN D11, INTEGRATIONS §2, ADR-25). The browser posts here;
 * this file posts to VenderCRM with the site's API key, which never reaches
 * the page.
 *
 * Order of operations — each one is a rule:
 *   1. POST only. Honeypot filled → 303 /gracias, nothing written, nothing sent.
 *   2. Same-origin check, phone required and normalised to E.164 (+595…).
 *   3. The lead TYPE is resolved server-side from the posted `source` slug in
 *      content/lead-values.php (consulta | comercial). A posted type, tier or
 *      idempotency key is never read.
 *   4. idempotency_key = sha256(phone_e164|type|YYYY-MM-DD-HH), hour in UTC.
 *   5. The lead is appended to logs/leads.jsonl FIRST — before the CRM is
 *      tried — so a lead can never be lost to a CRM outage.
 *   6. POST to {VENDERCRM_URL}/api/v1/leads (10 s timeout). source is
 *      "site:moto-com-py"; fields.tipo_lead carries the type. Empty optional
 *      fields are omitted; never pipeline, stage, owner or tag — not even
 *      inside fields. 201 and 200 duplicate:true are success. Each attempt is
 *      appended to logs/crm-deliveries.jsonl with the same key, so a later
 *      retry is safe.
 *   7. The visitor never sees a CRM error: JSON {ok:true, degraded} for the
 *      fetch() path, 303 to /gracias (?tipo=comercial for that type) without JS.
 *
 * Without VENDERCRM_URL / VENDERCRM_API_KEY the lead stays in leads.jsonl
 * (degraded) and the visitor still gets the thank-you. Optional: RESEND_API_KEY
 * + LEAD_NOTIFY_TO + LEAD_FROM email each lead too.
 */

declare(strict_types=1);

require __DIR__ . '/lib/bootstrap.php';

const LEAD_RATE_MAX    = 5;     // submissions per IP …
const LEAD_RATE_WINDOW = 600;   // … per 10 minutes
const LEAD_CRM_TIMEOUT = 10;    // seconds

$wantsJson = str_contains((string) ($_SERVER['HTTP_ACCEPT'] ?? ''), 'application/json');

/**
 * Answer and stop: JSON for fetch(), a 303 for the plain form.
 */
function respond(bool $ok, bool $degraded, ?string $error = null, array $extra = []): never
{
    global $wantsJson;

    if ($wantsJson) {
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-Control: no-store');
        http_response_code($ok ? 200 : 422);
        echo json_encode(
            array_filter(['ok' => $ok, 'degraded' => $degraded, 'error' => $error], static fn ($v) => $v !== null) + $extra,
            JSON_UNESCAPED_UNICODE
        );
        exit;
    }

    http_response_code(303);
    if ($ok) {
        header('Location: /gracias' . (($extra['lead_type'] ?? '') === 'comercial' ? '?tipo=comercial' : ''));
    } else {
        header('Location: /contacto?error=1');
    }
    exit;
}

/**
 * Trimmed POST value, capped at the length VenderCRM accepts.
 */
function field(string $key, int $max): string
{
    $value = $_POST[$key] ?? '';

    return is_string($value) ? mb_substr(trim($value), 0, $max) : '';
}

function client_ip(): string
{
    foreach (['HTTP_CF_CONNECTING_IP', 'HTTP_X_REAL_IP', 'REMOTE_ADDR'] as $key) {
        if (!empty($_SERVER[$key]) && is_string($_SERVER[$key])) {
            return trim(explode(',', $_SERVER[$key])[0]);
        }
    }

    return 'unknown';
}

/**
 * At most LEAD_RATE_MAX submissions per IP per window; one small file per IP
 * hash under logs/rate/. Never blocks a lead when it cannot track.
 */
function rate_limited(string $ip): bool
{
    $dir = logs_dir() . '/rate';
    if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
        return false;
    }

    $file = $dir . '/' . hash('sha256', $ip) . '.json';
    $now  = time();
    $hits = [];
    if (is_file($file)) {
        $decoded = json_decode((string) @file_get_contents($file), true);
        if (is_array($decoded)) {
            $hits = array_filter($decoded, static fn ($t) => is_int($t) && $t > $now - LEAD_RATE_WINDOW);
        }
    }
    if (count($hits) >= LEAD_RATE_MAX) {
        return true;
    }
    $hits[] = $now;
    @file_put_contents($file, json_encode(array_values($hits)), LOCK_EX);

    if (random_int(1, 50) === 1) {
        foreach (glob($dir . '/*.json') ?: [] as $stale) {
            if (@filemtime($stale) < $now - LEAD_RATE_WINDOW * 6) {
                @unlink($stale);
            }
        }
    }

    return false;
}

/**
 * Append one JSON line to logs/<file>. Returns false when it could not.
 */
function append_log(string $file, array $line): bool
{
    $dir = logs_dir();
    if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
        return false;
    }

    return @file_put_contents(
        $dir . '/' . $file,
        json_encode($line, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n",
        FILE_APPEND | LOCK_EX
    ) !== false;
}

/**
 * Email the lead through Resend when configured. Never changes the outcome.
 */
function notify_by_email(array $payload, string $outcome): void
{
    $apiKey = cfg('RESEND_API_KEY');
    $to     = cfg('LEAD_NOTIFY_TO');
    $from   = cfg('LEAD_FROM');
    if ($apiKey === null || $to === null || $from === null || !function_exists('curl_init')) {
        return;
    }

    $lines = [];
    foreach (['name' => 'Nombre', 'phone' => 'Teléfono', 'email' => 'Email', 'message' => 'Mensaje', 'page_url' => 'Página'] as $key => $label) {
        if (!empty($payload[$key])) {
            $lines[] = $label . ': ' . $payload[$key];
        }
    }
    foreach (($payload['fields'] ?? []) as $key => $value) {
        $lines[] = ucfirst(str_replace('_', ' ', (string) $key)) . ': ' . $value;
    }
    $lines[] = '';
    $lines[] = 'Estado CRM: ' . $outcome;
    $lines[] = 'Recibido: ' . gmdate('Y-m-d H:i') . ' UTC';

    $subject = '[' . ($payload['fields']['tipo_lead'] ?? 'consulta') . '] Nuevo contacto: '
             . (!empty($payload['fields']['modelo']) ? $payload['fields']['modelo'] . ' — ' : '')
             . ($payload['name'] ?? $payload['phone']);

    $ch = curl_init('https://api.resend.com/emails');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 8,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json', 'Authorization: Bearer ' . $apiKey],
        CURLOPT_POSTFIELDS     => json_encode(array_filter([
            'from'     => $from,
            'to'       => [$to],
            'reply_to' => $payload['email'] ?? null,
            'subject'  => mb_substr($subject, 0, 150),
            'text'     => implode("\n", $lines),
        ]), JSON_UNESCAPED_UNICODE),
    ]);
    $response = curl_exec($ch);
    $status   = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($status !== 200) {
        error_log(sprintf('Resend notification failed [%d] %s', $status, (string) $response));
    }
}

// --- 1. POST only; honeypot ---------------------------------------------------
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit;
}

if (($_POST['website'] ?? '') !== '') {
    respond(true, false);          // looks like success to the bot; nothing written, nothing sent
}

// --- 2. Same origin, phone ------------------------------------------------------
$origin = (string) ($_SERVER['HTTP_ORIGIN'] ?? $_SERVER['HTTP_REFERER'] ?? '');
if ($origin !== '') {
    $originHost  = parse_url($origin, PHP_URL_HOST);
    $requestHost = parse_url(site_origin(), PHP_URL_HOST) ?: ($_SERVER['HTTP_HOST'] ?? '');
    if (is_string($originHost) && strcasecmp($originHost, (string) $requestHost) !== 0) {
        respond(false, false, 'origin');
    }
}

$phone = phone_e164(field('phone', 30));
if ($phone === null) {
    respond(false, false, 'phone');
}

$email = field('email', 320);
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, false, 'email');
}

if (rate_limited(client_ip())) {
    respond(false, false, 'rate');
}

// --- 3. Type, tier, key: server-side --------------------------------------------
$sourceSlug = field('source', 60);
$need       = field('need', 60);
$lead       = lead_value($sourceSlug !== '' ? $sourceSlug : null);
if ($lead['slug'] === null) {
    $lead = lead_value_for_need($need !== '' ? $need : 'otro');
}
$leadType = lead_type_for($lead['slug'] ?? null);
$tier     = (string) $lead['tier'];

$idempotencyKey = lead_idempotency_key($phone, $leadType);

// --- 4. Attribution: POST fields win over the vc_attr first-touch cookie ------------
$attr = [];
if (!empty($_COOKIE['vc_attr']) && is_string($_COOKIE['vc_attr'])) {
    $decoded = json_decode($_COOKIE['vc_attr'], true);
    $attr    = is_array($decoded) ? $decoded : [];
}
$attribution = [];
foreach (['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid'] as $key) {
    $value = field($key, 200) ?: (is_string($attr[$key] ?? null) ? mb_substr($attr[$key], 0, 200) : '');
    if ($value !== '') {
        $attribution[$key] = $value;
    }
}

// --- 5. The payload ---------------------------------------------------------------
$sourcePage = field('source_page', 300);
$sourcePage = str_starts_with($sourcePage, '/') ? clean_path($sourcePage) : '/';

$fields = array_filter([
    'tipo_lead'  => $leadType,
    'formulario' => field('form_id', 60),
    'origen'     => lead_label((string) ($lead['slug'] ?? 'consulta')),
    'necesita'   => $need !== '' && ui('needs.' . $need) !== '' ? lead_need_label($need) : '',
    'modelo'     => field('modelo', 120),
    'en_cuotas'  => $leadType === 'consulta' && field('cuotas', 5) === 'si' ? 'si' : '',
    'empresa'    => $leadType === 'comercial' ? field('company', 200) : '',
    'valor'      => $tier,
], static fn ($v) => $v !== '');

$referrer = is_string($attr['referrer'] ?? null) ? mb_substr($attr['referrer'], 0, 2000) : '';

$payload = array_filter([
    'phone'           => $phone,
    'idempotency_key' => $idempotencyKey,
    'name'            => field('name', 200),
    'email'           => $email,
    'message'         => field('message', 5000),
    'source'          => 'site:' . (string) site('slug'),
    'page_url'        => url($sourcePage),
    'referrer'        => $referrer,
], static fn ($v) => $v !== '' && $v !== null) + $attribution + ['fields' => $fields];

$result = [
    'lead_type'  => $leadType,
    'service'    => (string) ($lead['slug'] ?? ''),
    'value_tier' => $tier,
    'value'      => lead_tier_value($tier),
    'currency'   => market_currency(),
    'thanks'     => [
        'steps'    => array_values((array) ($lead['nextStep'] ?? [])),
        'whatsapp' => wa_href((string) $lead['whatsappText'], $sourcePage),
        'link'     => $lead['nextLink'] ?? null,
    ],
];

// --- 6. logs/leads.jsonl FIRST ---------------------------------------------------
$logged = append_log('leads.jsonl', ['at' => gmdate('c')] + $payload);
if (!$logged) {
    error_log('LEAD NOT LOGGED (logs/ not writable): ' . json_encode($payload, JSON_UNESCAPED_UNICODE));
}

// --- 7. Then the CRM --------------------------------------------------------------
$crmUrl = cfg('VENDERCRM_URL');
$apiKey = cfg('VENDERCRM_API_KEY');

if ($crmUrl === null || $apiKey === null || !function_exists('curl_init')) {
    append_log('crm-deliveries.jsonl', ['at' => gmdate('c'), 'idempotency_key' => $idempotencyKey, 'status' => 'not-configured']);
    notify_by_email($payload, 'sin CRM configurado');
    respond(true, true, null, $result);
}

$ch = curl_init(rtrim($crmUrl, '/') . '/api/v1/leads');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => LEAD_CRM_TIMEOUT,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_HTTPHEADER     => ['Content-Type: application/json', 'X-Api-Key: ' . $apiKey],
    CURLOPT_POSTFIELDS     => json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
]);
$response = curl_exec($ch);
$status   = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlErr  = curl_error($ch);
curl_close($ch);

/* 201 created; 200 is the idempotency replay (duplicate:true) — both success. */
$body      = is_string($response) ? json_decode($response, true) : null;
$delivered = $status === 201 || $status === 200;

append_log('crm-deliveries.jsonl', [
    'at'              => gmdate('c'),
    'idempotency_key' => $idempotencyKey,
    'status'          => $status ?: 'unreachable',
    'duplicate'       => is_array($body) ? (bool) ($body['duplicate'] ?? false) : null,
    'error'           => $delivered ? null : mb_substr(trim((string) $response . ' ' . $curlErr), 0, 2000),
]);

if (!$delivered) {
    /* 401 key, 403 site off or billing, 422 names the field, 429 rate: all ours
       to fix, none the visitor's problem. The lead is already in leads.jsonl. */
    error_log(sprintf('VenderCRM lead failed [%d] %s %s', $status, (string) $response, $curlErr));
}
notify_by_email($payload, $delivered ? 'crm:' . $status : 'crm-falló:' . ($status ?: 'sin-respuesta'));

respond(true, !$delivered, null, $result);
