<?php
/**
 * GET /ir/wa/general?texto=…&desde=/ruta — the tracked WhatsApp redirect
 * (PLAN D10, ADR-07). Every WhatsApp CTA on the site points here through
 * wa_href(); wa.me appears nowhere else.
 *
 *   1. Append the click to logs/wa-clicks.jsonl: time, desde, texto, referrer,
 *      user agent, is_bot. No IP is stored.
 *   2. Answer 302 to https://wa.me/<number>?text=<texto>. If logging fails,
 *      redirect anyway: losing an event is acceptable, losing a contact is not.
 *
 * No render, no cache (Cache-Control: no-store), noindex, Disallowed in
 * robots.txt. Without a WhatsApp number configured it answers 302 to
 * /contacto (PLAN §4.5).
 */

require __DIR__ . '/../../../lib/bootstrap.php';

header('Cache-Control: no-store');
header('X-Robots-Tag: noindex, nofollow');

$waTexto = isset($_GET['texto']) && is_string($_GET['texto']) ? trim($_GET['texto']) : '';
$waTexto = mb_substr($waTexto !== '' ? $waTexto : (string) lead_value(null)['whatsappText'], 0, 300);
$waDesde = isset($_GET['desde']) && is_string($_GET['desde']) && str_starts_with($_GET['desde'], '/')
    ? mb_substr(clean_path($_GET['desde']), 0, 300)
    : null;

$waUa    = mb_substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 300);
$waRef   = mb_substr((string) ($_SERVER['HTTP_REFERER'] ?? ''), 0, 500);
$waOwnRef = $waRef !== '' && strcasecmp((string) parse_url($waRef, PHP_URL_HOST), (string) parse_url(site_origin(), PHP_URL_HOST)) === 0;
$waBot   = $waUa === '' || preg_match('/bot|crawl|spider|slurp|preview|facebookexternalhit|headless/i', $waUa) === 1 || !$waOwnRef;
$waNum   = wa_number();

try {
    $waDir = ROOT_DIR . '/logs';
    if (is_dir($waDir) || @mkdir($waDir, 0775, true)) {
        @file_put_contents($waDir . '/wa-clicks.jsonl', json_encode([
            'at'       => gmdate('c'),
            'desde'    => $waDesde,
            'texto'    => $waTexto,
            'referrer' => $waRef,
            'ua'       => $waUa,
            'is_bot'   => $waBot,
            'target'   => $waNum === null ? 'contacto' : 'whatsapp',
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n", FILE_APPEND | LOCK_EX);
    }
} catch (Throwable $e) {
    error_log('wa-click log failed: ' . $e->getMessage());
}

http_response_code(302);
header('Location: ' . ($waNum === null
    ? '/contacto'
    : 'https://wa.me/' . $waNum . '?text=' . rawurlencode($waTexto)));
