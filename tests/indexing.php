<?php
/**
 * Unit tests for the indexing gate (PLAN §2.3), the fact renderer (D6, D14)
 * and the lead key (D11). No framework: every check is an assert() that
 * prints one line; the exit code is the number of failures.
 *
 *     APP_ENV=dev php tests/indexing.php [site-root]
 *
 * verify.sh runs it first. The integration half at the end needs the [DEV]
 * records in content/_dev/, so APP_ENV must be dev; it is skipped (with a
 * FAIL) otherwise, never silently.
 */

declare(strict_types=1);

$root = rtrim($argv[1] ?? dirname(__DIR__), '/');
putenv('APP_ENV=dev');
putenv('SITE_NOINDEX');           // start from "absent"
require $root . '/lib/bootstrap.php';

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

function with_mode(?string $mode, callable $fn): void
{
    $mode === null ? putenv('SITE_NOINDEX') : putenv('SITE_NOINDEX=' . $mode);
    indexing_reset();
    $fn();
    putenv('SITE_NOINDEX');
    indexing_reset();
}

$configPinsMode = cfg('SITE_NOINDEX') !== null;
if ($configPinsMode) {
    echo "  FAIL  config.php sets SITE_NOINDEX: the three modes cannot be tested. Move it aside and re-run.\n";
    exit(1);
}

/* --- 1. SITE_NOINDEX parsing: fails closed ------------------------------- */
check(indexing_mode_from(null) === 'true', 'absent → true');
check(indexing_mode_from('') === 'true', 'empty → true');
check(indexing_mode_from('true') === 'true', 'true → true');
check(indexing_mode_from('content') === 'content', 'content → content');
check(indexing_mode_from('false') === 'false', 'false → false');
check(indexing_mode_from('FALSE') === 'true', 'FALSE (case) → true: only the exact words count');
check(indexing_mode_from('0') === 'true', '0 → true');
check(indexing_mode_from('no') === 'true', 'no → true');
check(indexing_mode_from(' false ') === 'false', 'surrounding whitespace is trimmed');

/* --- 2. which page types each mode lets through ------------------------ */
foreach (['static', 'guide', 'brand', 'model', 'type', 'city', 'comparison', 'never'] as $type) {
    check(!mode_allows('true', $type), "true blocks {$type}");
}
check(mode_allows('content', 'static'), 'content allows static');
check(mode_allows('content', 'guide'), 'content allows guide');
foreach (['brand', 'model', 'type', 'city', 'comparison', 'never'] as $type) {
    check(!mode_allows('content', $type), "content blocks {$type}");
}
foreach (['static', 'guide', 'brand', 'model', 'type', 'city', 'comparison'] as $type) {
    check(mode_allows('false', $type), "false allows {$type} (the table decides)");
}
check(!mode_allows('false', 'never'), 'false still blocks never');

/* --- 3. the table, at every threshold ------------------------------------ */
$g = static fn (string $type, array $m): bool => gate_passes_metrics($type, $m);

// Modelo: >= 300 words AND (>= 3 sourced specs OR a current price)
check($g('model', ['words' => 300, 'sourcedSpecs' => 3, 'currentPrice' => false]), 'model 300w + 3 specs');
check($g('model', ['words' => 300, 'sourcedSpecs' => 0, 'currentPrice' => true]), 'model 300w + price');
check(!$g('model', ['words' => 299, 'sourcedSpecs' => 9, 'currentPrice' => true]), 'model 299w fails');
check(!$g('model', ['words' => 900, 'sourcedSpecs' => 2, 'currentPrice' => false]), 'model 2 specs, no price fails');

// Marca: >= 300 words AND sourced distributor
check($g('brand', ['words' => 300, 'distributor' => true]), 'brand 300w + distributor');
check(!$g('brand', ['words' => 299, 'distributor' => true]), 'brand 299w fails');
check(!$g('brand', ['words' => 900, 'distributor' => false]), 'brand without sourced distributor fails');

// Tipo, ciudad: >= 250 words AND >= 3 links to indexable models or guides
foreach (['type', 'city'] as $type) {
    check($g($type, ['words' => 250, 'indexableLinks' => 3]), "{$type} 250w + 3 links");
    check(!$g($type, ['words' => 249, 'indexableLinks' => 3]), "{$type} 249w fails");
    check(!$g($type, ['words' => 900, 'indexableLinks' => 2]), "{$type} 2 links fails");
}

// Comparativa: >= 500 words AND >= 5 rows sourced on both sides
check($g('comparison', ['words' => 500, 'rows' => 5]), 'comparison 500w + 5 rows');
check(!$g('comparison', ['words' => 499, 'rows' => 5]), 'comparison 499w fails');
check(!$g('comparison', ['words' => 900, 'rows' => 4]), 'comparison 4 rows fails');

// Guía: >= 600 words AND >= 2 internal links
check($g('guide', ['words' => 600, 'internalLinks' => 2]), 'guide 600w + 2 links');
check(!$g('guide', ['words' => 599, 'internalLinks' => 2]), 'guide 599w fails');
check(!$g('guide', ['words' => 900, 'internalLinks' => 1]), 'guide 1 link fails');

check($g('static', []), 'static always');
check(!$g('never', ['words' => 99999]), 'never never');
check(!$g('unknown', ['words' => 99999]), 'an unknown type fails closed');

/* --- 4. words and links are read from rendered HTML ---------------------- */
check(body_words('<p>uno dos tres</p><p>cuatro</p>') === 4, 'words across paragraphs');
check(body_words('<p>uno <a href="/x">dos</a></p><ul data-nocount><li>no cuenta</li></ul>') === 2,
    'data-nocount subtrees are not counted');
check(body_words('<p>Gs. 12.500.000 y 150 cc</p>') === 5, 'numbers are words');
check(body_words('<script>var a = 1;</script><p>uno</p>') === 1, 'script text is not counted');
check(body_links('<a href="/a">a</a><a href="/b?x=1#y">b</a><a href="/a">a</a><a href="#top">t</a>'
    . '<a href="https://e.com/c">c</a><a href="/ir/wa/general?texto=x">w</a>') === ['/a', '/b'],
    'internal links: distinct, clean, no fragments, no externals, no /ir/');

/* --- 5. facts: prices hide after 120 days (D6), verify blocks never render (D14) */
$fact = static fn (string $accessed): array => [
    'value' => 12500000, 'source' => ['label' => 'Distribuidor', 'url' => 'https://example.com'],
    'accessed' => $accessed, 'condition' => '0km',
];
check(price_is_current($fact('2026-06-02'), '2026-09-30'), 'a price consulted 120 days ago is current');
check(!price_is_current($fact('2026-06-01'), '2026-09-30'), 'a price consulted 121 days ago is hidden');
check(!price_is_current($fact('2026-10-01'), '2026-09-30'), 'a price from the future is not trusted');
check(!fact_ok(['value' => 1, 'source' => ['label' => 'x', 'url' => ''], 'accessed' => '2026-09-01']),
    'a fact without a source URL is not a fact');
check(!fact_ok(['verify' => 'confirmar en el sitio de la marca']), 'a verify block is not a fact');
check(fact_ok(['value' => '150 cc', 'source' => ['Honda', 'https://h.com'], 'accessed' => '2026-09-01']),
    'the list form of source is accepted');

$html = render_blocks(['Primer párrafo.', ['verify' => 'NO DEBE APARECER'], ['list' => ['a', ['verify' => 'x'], 'b']]]);
check(!str_contains($html, 'NO DEBE APARECER') && !str_contains($html, 'verify'), 'verify blocks do not render');
check(substr_count($html, '<li>') === 2, 'verify items inside a list do not render');
check(render_sections([['h2' => 'Vacía', 'body' => [['verify' => 'x']]]]) === '',
    'a section left with only verify blocks is dropped with its heading');
check(!str_contains(render_blocks(['Precio: [VERIFICAR con el distribuidor]']), 'VERIFICAR'),
    'a stray [VERIFICAR…] marker in text is never printed');
check(str_contains(inline('Mirá [las guías](/guias/) y **esto**'), '<a href="/guias">las guías</a>'),
    'inline links, trailing slash removed');
check(inline('Mirá [esta](/guias/no-existe-todavia)') === 'Mirá esta',
    'a link to a page that does not exist yet renders as text');
check(!str_contains(inline('<script>'), '<script>'), 'inline escapes HTML');

/* --- 6. the lead key (ADR-25) -------------------------------------------- */
check(phone_e164('0981 123 456') === '+595981123456', 'local mobile → E.164');
check(phone_e164('+595 981 123456') === '+595981123456', 'international → E.164');
check(phone_e164('595981123456') === '+595981123456', 'bare country code → E.164');
check(phone_e164('981123456') === '+595981123456', 'no leading zero → E.164');
check(phone_e164('021 123 456') === '+59521123456', 'Asunción landline → E.164');
check(phone_e164('12') === null, 'too short is rejected');
$at = new DateTimeImmutable('2026-09-30 14:59:59', new DateTimeZone('UTC'));
check(lead_idempotency_key('+595981123456', 'consulta', $at)
    === hash('sha256', '+595981123456|consulta|2026-09-30-14'), 'key = sha256(e164|type|YYYY-MM-DD-HH) in UTC');
check(lead_idempotency_key('+595981123456', 'consulta', $at)
    !== lead_idempotency_key('+595981123456', 'comercial', $at), 'the type is part of the key');

/* --- 7. query strings are noindex with a clean canonical ----------------- */
with_mode('false', function (): void {
    check(page_robots(['path' => '/guias'], '') === null, 'a static page is indexable in false');
    check(page_robots(['path' => '/guias'], 'utm_source=x') === 'noindex, follow', 'any query string → noindex');
    check(seo_canonical(['path' => '/guias']) === url('/guias'), 'canonical is the clean URL');
    check(page_robots(['path' => '/esto-no-existe'], '') === 'noindex, follow', 'an unknown path fails closed');
    check(page_robots(['path' => '/gracias'], '') === 'noindex, follow', '/gracias is never indexable');
});

/* --- 8. integration: the [DEV] records in the three modes ---------------- */
$pass = ['/motos/dev-marca', '/motos/dev-marca/dev-modelo-a', '/motos/dev-marca/dev-modelo-c', '/motos/dev-marca/dev-modelo-d',
         '/motos/tipo/dev-tipo', '/motos/ciudad/dev-ciudad', '/guias/dev-guia', '/guias/dev-guia-examen',
         '/guias/dev-modelo-a-vs-dev-modelo-d'];
$fail = ['/motos/dev-marca/dev-modelo-b', '/motos/dev-marca-fina', '/guias/dev-guia-fina'];

if (route_for_path('/motos/dev-marca') === null) {
    check(false, 'the [DEV] records did not load: is APP_ENV=dev reaching lib/bootstrap.php?');
} else {
    foreach ($pass as $p) {
        check(gate_passes($p), "{$p} passes its gate");
    }
    foreach ($fail as $p) {
        check(route_for_path($p) !== null, "{$p} exists");
        check(!gate_passes($p), "{$p} fails its gate");
    }

    with_mode(null, function () use ($pass): void {
        foreach (array_merge($pass, ['/guias']) as $p) {
            check(!is_indexable($p), "absent mode: {$p} is noindex");
        }
    });
    with_mode('true', function () use ($pass): void {
        foreach (array_merge($pass, ['/guias']) as $p) {
            check(!is_indexable($p), "true: {$p} is noindex");
        }
        check(sitemap_paths() === [], 'true: the sitemap is empty');
    });
    with_mode('content', function (): void {
        check(is_indexable('/guias'), 'content: static is indexable');
        check(is_indexable('/guias/dev-guia'), 'content: a passing guide is indexable');
        check(!is_indexable('/guias/dev-guia-fina'), 'content: a failing guide is not');
        check(!is_indexable('/motos/dev-marca/dev-modelo-a'), 'content: models are noindex');
        check(!is_indexable('/guias/dev-modelo-a-vs-dev-modelo-d'), 'content: comparisons are noindex');
        check(!in_array('/motos/dev-marca', sitemap_paths(), true), 'content: brands stay out of the sitemap');
    });
    with_mode('false', function () use ($pass, $fail): void {
        foreach ($pass as $p) {
            check(is_indexable($p), "false: {$p} is indexable");
            check(in_array($p, sitemap_paths(), true), "false: {$p} is in the sitemap");
        }
        foreach ($fail as $p) {
            check(!is_indexable($p), "false: {$p} is noindex");
            check(!in_array($p, sitemap_paths(), true), "false: {$p} is not in the sitemap");
        }
    });

    /* The price that decides dev-modelo-c: it passes only on its price, so
       ageing the price past 120 days must flip the page to noindex (D13). */
    putenv('APP_TODAY=2099-01-01');
    indexing_reset();
    check(!gate_passes('/motos/dev-marca/dev-modelo-c'), 'an expired price flips a price-only model to noindex');
    check(!str_contains(page_body('model', 'dev-marca/dev-modelo-c'), 'Gs.'), 'an expired price is not rendered');
    putenv('APP_TODAY');
    indexing_reset();
    check(str_contains(page_body('model', 'dev-marca/dev-modelo-c'), 'Gs.'), 'a current price is rendered');
}

echo $failures === 0 ? "  ok    {$checks} checks\n" : "  {$failures} of {$checks} checks failed\n";
exit($failures === 0 ? 0 : 1);
