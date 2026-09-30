<?php
/**
 * The lead handler end to end (PLAN D11, ADR-25, INTEGRATIONS §2).
 *
 *     php tests/leads.php <base-url> <site-root> degraded
 *     php tests/leads.php <base-url> <site-root> crm      (VENDERCRM_URL → tests/mock-crm.php)
 *
 * APP_LOG_DIR must be the same directory the server under test writes to.
 */

declare(strict_types=1);

[$self, $base, $root, $scenario] = array_pad($argv, 4, null);
$base = rtrim((string) $base, '/');
require rtrim((string) $root, '/') . '/lib/bootstrap.php';

$failures = 0;
$checks   = 0;
function check(bool $ok, string $what): void
{
    global $failures, $checks;
    $checks++;
    if (!$ok) {
        $failures++;
        echo "  FAIL  {$what}\n";
    }
}

$ipSeq = 10;
/** POST the form: [status, Location, body]. Each request comes from its own IP (the rate limit is per IP). */
function post(array $fields, bool $json = false): array
{
    global $base, $ipSeq;
    $ch = curl_init($base . '/enviar.php');
    $h  = [];
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query($fields),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_HTTPHEADER     => array_merge(['Origin: ' . $base, 'X-Real-IP: 10.0.0.' . ($ipSeq++)], $json ? ['Accept: application/json'] : []),
        CURLOPT_HEADERFUNCTION => static function ($ch, string $line) use (&$h): int {
            if (stripos($line, 'location:') === 0) {
                $h['location'] = trim(substr($line, 9));
            }
            return strlen($line);
        },
    ]);
    $body   = (string) curl_exec($ch);
    $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [$status, $h['location'] ?? '', $body];
}

function lines(string $file): array
{
    clearstatcache();
    $path = logs_dir() . '/' . $file;

    return is_file($path) ? array_map(static fn ($l) => json_decode($l, true), file($path, FILE_IGNORE_NEW_LINES)) : [];
}

/** The key the server must have computed (the hour may tick between post and check). */
function key_ok(string $key, string $phone, string $type): bool
{
    $now = new DateTimeImmutable('now', new DateTimeZone('UTC'));

    return in_array($key, [
        lead_idempotency_key($phone, $type, $now),
        lead_idempotency_key($phone, $type, $now->modify('-1 hour')),
    ], true);
}

/** No routing keys anywhere, no empty optional values (D11). */
function payload_clean(array $p): bool
{
    $walk = static function (array $a) use (&$walk): bool {
        foreach ($a as $k => $v) {
            if (in_array(strtolower((string) $k), ['pipeline', 'stage', 'owner', 'tag', 'tags', 'etiqueta'], true)) {
                return false;
            }
            if ($v === '' || $v === null || (is_array($v) && !$walk($v))) {
                return false;
            }
        }
        return true;
    };

    return $walk($p);
}

$form = ['name' => 'Verify', 'phone' => '0981 000 999', 'source' => 'consulta', 'form_id' => 'contacto',
         'source_page' => '/contacto', 'need' => 'consulta', 'cuotas' => 'si', 'email' => '', 'website' => ''];

/* 1. A consulta without JS: logged first, 303 to /gracias. */
$before = count(lines('leads.jsonl'));
[$status, $loc] = post($form + ['tipo_lead' => 'comercial', 'idempotency_key' => 'posted-by-the-browser', 'value_tier' => 'A']);
$leads = lines('leads.jsonl');
$lead  = end($leads) ?: [];
check($status === 303 && location_path_ok($loc, '/gracias'), "no-JS consulta → 303 /gracias (got {$status} {$loc})");
check(count($leads) === $before + 1, 'the lead is appended to leads.jsonl');
check(($lead['phone'] ?? '') === '+595981000999', 'phone stored in E.164');
check(key_ok((string) ($lead['idempotency_key'] ?? ''), '+595981000999', 'consulta'),
    'idempotency_key = sha256(e164|consulta|hour); the posted key is ignored');
check(($lead['fields']['tipo_lead'] ?? '') === 'consulta', 'tipo_lead resolved server-side (a posted tipo_lead is ignored)');
check(($lead['fields']['en_cuotas'] ?? '') === 'si', 'the "en cuotas" interest travels as data');
check(($lead['source'] ?? '') === 'site:moto-com-py', 'source is site:moto-com-py');
check(payload_clean($lead), 'no pipeline/stage/owner/tag and no empty optional field: ' . json_encode($lead));
check(!array_key_exists('email', $lead), 'an empty email is omitted, not sent as ""');

/* 2. comercial: its own type, its own key, its own thank-you. */
[$status, $loc] = post(['source' => 'comercial', 'company' => 'Verify S.A.', 'cuotas' => 'si'] + $form);
$leads = lines('leads.jsonl');
$lead  = end($leads) ?: [];
check($status === 303 && location_path_ok($loc, '/gracias?tipo=comercial'), "comercial → 303 /gracias?tipo=comercial (got {$loc})");
check(($lead['fields']['tipo_lead'] ?? '') === 'comercial', 'tipo_lead comercial');
check(key_ok((string) ($lead['idempotency_key'] ?? ''), '+595981000999', 'comercial'), 'the key carries the type');
check(($lead['fields']['empresa'] ?? '') === 'Verify S.A.' && !isset($lead['fields']['en_cuotas']),
    'comercial keeps empresa and drops the consulta-only cuotas field');

/* 3. JSON path. */
[$status, , $body] = post($form, true);
$json = json_decode($body, true);
check($status === 200 && ($json['ok'] ?? false) === true && ($json['lead_type'] ?? '') === 'consulta',
    "JSON path answers ok with the lead type: {$body}");

/* 4. Honeypot: 303 /gracias, nothing written, nothing sent. */
$before = count(lines('leads.jsonl'));
$crmBefore = count(lines('mock-crm.jsonl'));
[$status, $loc] = post(['website' => 'http://spam.example'] + $form);
check($status === 303 && location_path_ok($loc, '/gracias'), "honeypot → 303 /gracias (got {$status} {$loc})");
check(count(lines('leads.jsonl')) === $before && count(lines('mock-crm.jsonl')) === $crmBefore, 'honeypot: nothing written, nothing sent');

/* 5. No phone: back to /contacto?error=1, nothing written. */
$before = count(lines('leads.jsonl'));
[$status, $loc] = post(['phone' => '12'] + $form);
check($status === 303 && location_path_ok($loc, '/contacto?error=1') && count(lines('leads.jsonl')) === $before,
    "an invalid phone → 303 /contacto?error=1 and nothing logged (got {$loc})");

/* 6. With the CRM (mock): delivered, replay is success, failure never reaches the visitor. */
if ($scenario === 'crm') {
    $crm = lines('mock-crm.jsonl');
    check(count($crm) === 3, 'three accepted leads reached the CRM (consulta, comercial, JSON): ' . count($crm));
    $sent = $crm[0] ?? [];
    check(($sent['path'] ?? '') === '/api/v1/leads' && ($sent['api_key'] ?? '') === cfg('VENDERCRM_API_KEY')
        && str_contains((string) ($sent['type'] ?? ''), 'application/json'), 'POST /api/v1/leads with X-Api-Key and JSON');
    check(($sent['body']['phone'] ?? '') === '+595981000999' && payload_clean((array) ($sent['body'] ?? [])),
        'the CRM payload is the logged one: E.164 phone, no routing keys, no empty fields');
    $logged = lines('leads.jsonl');
    check(($logged[0]['idempotency_key'] ?? 'x') === ($sent['body']['idempotency_key'] ?? 'y'), 'leads.jsonl and the CRM share the key');

    [, , $body] = post($form, true);                  // same phone, type and hour → replay
    $json = json_decode($body, true);
    check(($json['ok'] ?? false) === true && ($json['degraded'] ?? true) === false, '200 duplicate:true is success, not degraded');

    [$status, $loc, ] = post(['name' => 'fail', 'phone' => '0981 000 111'] + $form);
    $deliveries = lines('crm-deliveries.jsonl');
    check($status === 303 && location_path_ok($loc, '/gracias'), 'a CRM failure still sends the visitor to /gracias');
    check(((end($deliveries) ?: [])['status'] ?? null) === 500, 'the failed delivery is recorded for a retry');
} else {
    $deliveries = lines('crm-deliveries.jsonl');
    check(((end($deliveries) ?: [])['status'] ?? '') === 'not-configured', 'degraded: the delivery log says the CRM is not configured');
}

function location_path_ok(string $loc, string $want): bool
{
    $p = parse_url($loc);

    return (($p['path'] ?? '') . (isset($p['query']) ? '?' . $p['query'] : '')) === $want;
}

echo $failures === 0 ? "  ok    {$scenario}: {$checks} lead checks\n" : "  {$failures} of {$checks} lead checks failed ({$scenario})\n";
exit($failures === 0 ? 0 : 1);
