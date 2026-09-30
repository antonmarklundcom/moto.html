<?php
/**
 * Crawls a running site and checks it against the route contract, the
 * indexing gate and the content rules (PLAN §2.3, §2.4, §4.16).
 *
 *     php tests/site.php <base-url> <site-root> <mode> [--full] [--prod]
 *
 * Run by verify.sh against `php -S … router.php` servers started with the
 * same APP_ENV and SITE_NOINDEX as this process, so the expectations it
 * computes from lib/ are the ones the server should be answering with.
 *
 *   every mode  route contract (status + Location); meta robots == sitemap;
 *               the mode's semantics; query strings noindex + clean canonical;
 *               canonical is the clean URL
 *   --full      titles/descriptions; one h1; a label on every input; no wa.me;
 *               no [VERIFICAR; forbidden words and claims; every Gs. inside a
 *               sourced fact; forbidden JSON-LD; nav links pass the gate;
 *               internal links resolve; weight budget; the /ir/wa/ click log
 *   --prod      no [DEV] record reachable or listed; WhatsApp falls back to /contacto
 *
 * Exit code: number of failures (capped at 1).
 */

declare(strict_types=1);

[$self, $base, $root, $mode] = array_pad($argv, 4, null);
$full = in_array('--full', $argv, true);
$prod = in_array('--prod', $argv, true);
$base = rtrim((string) $base, '/');
require rtrim((string) $root, '/') . '/lib/bootstrap.php';

$failures = 0;
function fail(string $msg): void
{
    global $failures;
    $failures++;
    echo "  FAIL  {$msg}\n";
}
function ok(string $msg): void
{
    echo "  ok    {$msg}\n";
}

/** GET without following redirects: [status, headers[], body]. */
function http(string $url, array $headers = []): array
{
    $ch = curl_init($url);
    $h  = [];
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_TIMEOUT        => 20,
        CURLOPT_HTTPHEADER     => $headers,
        CURLOPT_HEADERFUNCTION => static function ($ch, string $line) use (&$h): int {
            if (str_contains($line, ':')) {
                [$k, $v] = explode(':', $line, 2);
                $h[strtolower(trim($k))] = trim($v);
            }
            return strlen($line);
        },
    ]);
    $body   = (string) curl_exec($ch);
    $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [$status, $h, $body];
}

/** Path + query of a Location header, whether absolute or relative. */
function location_path(string $location): string
{
    $p = parse_url($location);
    if (isset($p['scheme'], $p['host']) && !str_contains($location, '127.0.0.1')) {
        return $location;                          // an external target (wa.me)
    }

    return ($p['path'] ?? '') . (isset($p['query']) ? '?' . $p['query'] : '');
}

function dom(string $html): DOMXPath
{
    $doc  = new DOMDocument();
    $prev = libxml_use_internal_errors(true);
    $doc->loadHTML('<?xml encoding="UTF-8">' . $html, LIBXML_NONET);
    libxml_clear_errors();
    libxml_use_internal_errors($prev);

    return new DOMXPath($doc);
}

$mode = indexing_mode_from($mode);
if (indexing_mode() !== $mode) {
    fail("this process sees SITE_NOINDEX=" . indexing_mode() . " but was asked to check {$mode}");
    exit(1);
}

/* ------------------------------------------------ 1. route contract ------ */
$contract = [];
exec('php ' . escapeshellarg(dirname(__DIR__) . '/deploy/routes.php') . ' ' . escapeshellarg(ROOT_DIR), $lines);
foreach ($lines as $line) {
    $parts = explode("\t", $line);
    if (count($parts) >= 2) {
        $contract[] = $parts;
    }
}
$contractFails = 0;
foreach ($contract as $row) {
    [$path, $want] = $row;
    [$status, $headers] = http($base . $path);
    $wantStatus = $want === 'deny' ? 404 : (int) $want;
    if ($status !== $wantStatus) {
        fail("{$path} — expected {$want}, got {$status}");
        $contractFails++;
        continue;
    }
    if (isset($row[2]) && location_path($headers['location'] ?? '') !== $row[2]) {
        fail("{$path} — expected Location {$row[2]}, got " . ($headers['location'] ?? 'none'));
        $contractFails++;
    }
}
if ($contractFails === 0) {
    ok(count($contract) . ' URLs answered as the route contract says');
}

/* ------------------------------------------ 2. robots == sitemap == mode -- */
[, , $sitemapXml] = http($base . '/sitemap.xml');
preg_match_all('#<loc>([^<]+)</loc>#', $sitemapXml, $m);
$inSitemap = array_map(static fn (string $u): string => clean_path((string) parse_url(html_entity_decode($u), PHP_URL_PATH)), $m[1]);
if (preg_match('#<(priority|changefreq)>#', $sitemapXml)) {
    fail('sitemap.xml carries priority or changefreq');
}

$pages      = [];
$metaIndex  = [];
foreach (array_keys(route_index()) as $path) {
    [$status, , $html] = http($base . $path);
    if ($status !== 200) {
        continue;                                   // already reported by the contract
    }
    $pages[$path] = $html;
    $robots = preg_match('#<meta name="robots" content="([^"]*)"#', $html, $rm) ? $rm[1] : '';
    if (!str_contains($robots, 'noindex')) {
        $metaIndex[] = $path;
    }
    if (preg_match('#<link rel="canonical" href="([^"]*)"#', $html, $cm)
        && clean_path((string) parse_url(html_entity_decode($cm[1]), PHP_URL_PATH)) !== $path) {
        fail("{$path} — canonical is {$cm[1]}");
    }
}
sort($metaIndex);
$sortedSitemap = $inSitemap;
sort($sortedSitemap);
if ($metaIndex !== $sortedSitemap) {
    fail('meta robots and sitemap disagree. indexable but not in sitemap: '
        . implode(', ', array_diff($metaIndex, $sortedSitemap)) . ' | in sitemap but noindex: '
        . implode(', ', array_diff($sortedSitemap, $metaIndex)));
} else {
    ok(count($metaIndex) . ' indexable pages; meta robots and sitemap agree exactly');
}

$expected = array_values(array_filter(
    array_keys(route_index()),
    static fn (string $p): bool => mode_allows($mode, route_index()[$p]['type']) && gate_passes($p)
));
sort($expected);
if ($metaIndex !== $expected) {
    fail("mode {$mode}: expected indexable [" . implode(', ', $expected) . '] got [' . implode(', ', $metaIndex) . ']');
} elseif ($mode === 'true' && $metaIndex !== []) {
    fail('mode true must index nothing');
} elseif ($mode === 'false' && $metaIndex === []) {
    fail('mode false indexes nothing: the gate or the fixtures are broken');
} else {
    ok("mode {$mode}: exactly the pages the gate and the mode allow are indexable");
}

/* Failing pages explain themselves: the gate's metrics, for a phase to act on. */
foreach (route_index() as $path => $route) {
    if (!in_array($route['type'], ['static', 'never'], true) && !gate_passes($path) && empty($route['dev'])) {
        echo '  note  ', $path, ' fails its gate: ', json_encode(page_metrics($route)), "\n";
    }
}

$qsFails = 0;
foreach (array_slice($metaIndex, 0, 40) as $path) {
    [, , $html] = http($base . $path . '?utm_source=verify');
    $robots = preg_match('#<meta name="robots" content="([^"]*)"#', $html, $rm) ? $rm[1] : '';
    $canon  = preg_match('#<link rel="canonical" href="([^"]*)"#', $html, $cm) ? html_entity_decode($cm[1]) : '';
    if ($robots !== 'noindex, follow' || str_contains($canon, '?') || clean_path((string) parse_url($canon, PHP_URL_PATH)) !== $path) {
        fail("{$path}?utm_source=verify — robots '{$robots}', canonical '{$canon}'");
        $qsFails++;
    }
}
if ($qsFails === 0) {
    ok('a query string turns a page noindex, follow with the clean canonical');
}

/* ------------------------------------------------------- 3. prod ---------- */
if ($prod) {
    putenv('APP_ENV=dev');
    $devPaths = array_keys(array_filter(route_index(), static fn (array $r): bool => $r['dev']));
    putenv('APP_ENV=prod');
    $leaks = 0;
    foreach ($devPaths as $path) {
        [$status] = http($base . $path);
        if ($status !== 404) {
            fail("prod: [DEV] route {$path} answered {$status}");
            $leaks++;
        }
    }
    foreach ($pages + ['/sitemap.xml' => $sitemapXml] as $path => $html) {
        if (str_contains($html, '[DEV]') || str_contains($html, 'dev-marca')) {
            fail("prod: {$path} shows a [DEV] record");
            $leaks++;
        }
    }
    [$status, $headers] = http($base . '/ir/wa/general?texto=x');
    if (site('whatsapp') === null && ($status !== 302 || location_path($headers['location'] ?? '') !== '/contacto')) {
        fail("prod without a WhatsApp number: /ir/wa/general should 302 to /contacto, got {$status} " . ($headers['location'] ?? ''));
        $leaks++;
    }
    if ($leaks === 0) {
        ok(count($devPaths) . ' [DEV] routes are 404 in production and no [DEV] text is served');
    }
}

/* ------------------------------------------------------- 4. full --------- */
if ($full) {
    $titles = [];
    $descs  = [];
    $problems = [];
    $say = static function (string $path, string $msg) use (&$problems): void {
        $problems[] = "{$path} — {$msg}";
    };

    $assetBytes = 0;
    foreach (['/assets/css/site.css', '/assets/js/analytics.js', '/assets/js/site.js',
              '/assets/js/whatsapp-menu.js', '/assets/js/lead-form.js'] as $asset) {
        $assetBytes += is_file(ROOT_DIR . $asset) ? filesize(ROOT_DIR . $asset) : 0;
    }
    $cssMin = ROOT_DIR . '/assets/css/site.min.css';
    if (is_file($cssMin)) {
        $assetBytes += filesize($cssMin) - filesize(ROOT_DIR . '/assets/css/site.css');   // production ships the minified file
    }

    foreach ($pages as $path => $html) {
        $x     = dom($html);
        $title = trim((string) $x->evaluate('string(//title)'));
        $desc  = trim((string) $x->evaluate('string(//meta[@name="description"]/@content)'));
        $route = route_for_path($path);
        $passes = gate_passes($path);

        if ($title === '' || mb_strlen($title) > TITLE_MAX) {
            $say($path, 'title empty or over ' . TITLE_MAX . ' chars: "' . $title . '"');
        }
        if ($desc === '') {
            $say($path, 'empty meta description');
        } elseif ($passes && (mb_strlen($desc) < 120 || mb_strlen($desc) > 160)) {
            $say($path, 'meta description is ' . mb_strlen($desc) . ' chars (120–160): ' . $desc);
        }
        $titles[$title][] = $path;
        $descs[$desc][]   = $path;

        if ($x->query('//h1')->length !== 1) {
            $say($path, $x->query('//h1')->length . ' <h1> elements (exactly one)');
        }
        foreach ($x->query('//input[not(@type="hidden")] | //textarea | //select') as $input) {
            $id = $input->getAttribute('id');
            $wrapped = $x->query('ancestor::label', $input)->length > 0;
            $forLabel = $id !== '' && $x->query('//label[@for="' . $id . '"]')->length > 0;
            if (!$wrapped && !$forLabel) {
                $say($path, 'an input has no label: ' . ($input->getAttribute('name') ?: $input->nodeName));
            }
        }
        if (str_contains($html, 'wa.me')) {
            $say($path, 'wa.me in the HTML (every WhatsApp link goes through /ir/wa/)');
        }
        if (stripos($html, '[VERIFICAR') !== false) {
            $say($path, 'a [VERIFICAR marker is rendered');
        }

        /* Visible text only. */
        $bodyNode = $x->query('//body')->item(0);
        $visible  = '';
        if ($bodyNode !== null) {
            foreach ($x->query('.//text()[not(ancestor::script) and not(ancestor::style)]', $bodyNode) as $t) {
                $visible .= ' ' . $t->nodeValue;
            }
        }
        if (preg_match('/\b(coche|carro|m[oó]vil|checar|contactar)\b/iu', $visible, $w)) {
            $say($path, "forbidden word in visible text: {$w[1]}");
        }
        if (preg_match('/(?<!registro de |licencia de )\bconducir\b/iu', $visible)) {
            $say($path, 'forbidden word in visible text: conducir (only "registro de conducir" is allowed)');
        }
        if (preg_match('/(N[°º]\s?1\b|n[uú]mero\s+1\b|el mejor portal|m[aá]s de [0-9])/iu', $visible, $w)) {
            $say($path, "forbidden claim in visible text: {$w[1]}");
        }

        /* Every guaraní figure is a sourced fact (D5, D6). */
        foreach ($x->query('//body//text()[contains(., "Gs.") and not(ancestor::script) and not(ancestor::style)]') as $t) {
            if ($x->query('ancestor::*[@data-fact]', $t)->length === 0) {
                $say($path, 'a "Gs." figure outside a sourced fact: ' . trim(mb_substr($t->nodeValue, 0, 80)));
            }
        }

        /* JSON-LD. */
        $blocks = [];
        foreach ($x->query('//script[@type="application/ld+json"]') as $s) {
            $raw = $s->textContent;
            if (preg_match('/"(AggregateRating|Review|Offer|Product)"|ratingValue|priceValidUntil/', $raw, $jm)) {
                $say($path, "forbidden JSON-LD: {$jm[0]}");
            }
            $decoded = json_decode($raw, true);
            if (!is_array($decoded)) {
                $say($path, 'a JSON-LD block does not parse');
                continue;
            }
            foreach ((array) $decoded['@type'] as $type) {
                $blocks[] = $type;
            }
        }
        foreach (['Organization', 'WebSite'] as $type) {
            in_array($type, $blocks, true) || $say($path, "no {$type} JSON-LD");
        }
        $hasCrumbs = $x->query('//nav[contains(@class,"breadcrumbs")]')->length > 0;
        if ($hasCrumbs !== in_array('BreadcrumbList', $blocks, true)) {
            $say($path, 'visible breadcrumbs and BreadcrumbList disagree');
        }
        if (in_array('FAQPage', $blocks, true) && $x->query('//details')->length === 0) {
            $say($path, 'FAQPage without a visible FAQ');
        }
        if (in_array($route['type'] ?? '', ['guide', 'comparison'], true) && !in_array('Article', $blocks, true)) {
            $say($path, 'a guide or comparison without Article JSON-LD');
        }

        /* The main navigation never links a page the gate would noindex. */
        foreach ($x->query('//header//nav//a[@href] | //ul[contains(@class,"site-nav")]//a[@href]') as $a) {
            $href = $a->getAttribute('href');
            if (str_starts_with($href, '/') && !gate_passes($href)) {
                $say($path, "main nav links {$href}, which does not pass its gate");
            }
        }

        /* Internal links resolve. */
        foreach ($x->query('//a[@href]') as $a) {
            $href = $a->getAttribute('href');
            if (!str_starts_with($href, '/') || str_starts_with($href, '//') || str_starts_with($href, '/ir/wa/general')) {
                continue;
            }
            if (!link_live($href) && clean_path($href) !== '/enviar.php') {
                $say($path, "internal link to nothing: {$href}");
            }
            if ($href !== '/' && str_ends_with((string) parse_url($href, PHP_URL_PATH), '/')) {
                $say($path, "internal link with a trailing slash: {$href}");
            }
        }

        if (strlen($html) + $assetBytes > 100 * 1024) {
            $say($path, sprintf('HTML + CSS + JS is %.1f KB (budget 100 KB)', (strlen($html) + $assetBytes) / 1024));
        }
    }

    foreach (['title' => $titles, 'description' => $descs] as $kind => $seen) {
        foreach ($seen as $value => $paths) {
            if (count($paths) > 1 && $value !== '') {
                $problems[] = "duplicate {$kind} \"{$value}\" on " . implode(', ', $paths);
            }
        }
    }

    if ($problems === []) {
        ok(count($pages) . ' pages pass the content, markup, JSON-LD, link and weight rules');
    } else {
        foreach (array_unique($problems) as $p) {
            fail($p);
        }
    }

    /* /ir/wa/general logs the click and answers 302 (D10). */
    $clicks = logs_dir() . '/wa-clicks.jsonl';
    $before = is_file($clicks) ? count(file($clicks)) : 0;
    [$status, $headers] = http($base . '/ir/wa/general?texto=verify-click&desde=/guias', ['Referer: ' . $base . '/guias']);
    clearstatcache();
    $after = is_file($clicks) ? file($clicks) : [];
    $last  = json_decode((string) end($after), true);
    if ($status !== 302 || count($after) !== $before + 1 || ($last['texto'] ?? '') !== 'verify-click' || ($last['desde'] ?? '') !== '/guias') {
        fail("/ir/wa/general?texto=verify-click → {$status}, log lines {$before}→" . count($after));
    } else {
        ok('/ir/wa/general answers 302 to ' . (str_starts_with($headers['location'] ?? '', 'https://wa.me/') ? 'wa.me' : ($headers['location'] ?? '?'))
            . ' and appends the click to wa-clicks.jsonl');
    }
}

exit($failures === 0 ? 0 : 1);
