<?php
/**
 * The indexing gate (PLAN §2.3, D12, D13). ONE decision, used by
 * partials/head.php (meta robots) and sitemap.php alike, so the two can
 * never disagree:
 *
 *     is_indexable($path) = mode_allows(mode, type) && gate_passes($path)
 *
 * 1. SITE_NOINDEX — config.php first, then the environment:
 *      'true', absent or anything unknown → nothing is indexable (fails closed)
 *      'content' → only static pages and guides, each still through its gate
 *      'false'   → the table below decides. The owner launches with this (D12).
 *
 * 2. The table, measured on the rendered body (lib/render.php page_body()):
 *      model       >= 300 words AND (>= 3 sourced specs OR a current price)
 *      brand       >= 300 words AND a sourced distributor
 *      type, city  >= 250 own words AND >= 3 links to models/guides that pass their gate
 *      comparison  >= 500 words AND >= 5 spec rows sourced on BOTH models
 *      guide       >= 600 words AND >= 2 internal links
 *      static      always (a 'stub' page is not)
 *      never       never — /gracias, /terminos, /privacidad, /404
 *
 * 3. A URL with a query string is 'noindex, follow' with the canonical on the
 *    clean URL (page_robots()). A path that is not in the route registry is
 *    never indexable.
 *
 * Nothing here is cached across requests: a price that expires tonight (D6)
 * turns its page noindex and drops it from the sitemap on the next request
 * (D13), and brings it back the day someone re-verifies it.
 */

declare(strict_types=1);

const GATE_MODEL_WORDS      = 300;
const GATE_MODEL_SPECS      = 3;
const GATE_BRAND_WORDS      = 300;
const GATE_HUB_WORDS        = 250;   // type, city
const GATE_HUB_LINKS        = 3;
const GATE_COMPARISON_WORDS = 500;
const GATE_COMPARISON_ROWS  = 5;
const GATE_GUIDE_WORDS      = 600;
const GATE_GUIDE_LINKS      = 2;

/**
 * Parse a raw SITE_NOINDEX value. Only the exact words count.
 */
function indexing_mode_from(?string $raw): string
{
    $raw = $raw === null ? '' : trim($raw);

    return in_array($raw, ['content', 'false'], true) ? $raw : 'true';
}

/**
 * The current mode: config.php, then the environment (cfg() does both).
 */
function indexing_mode(): string
{
    return indexing_mode_from(cfg('SITE_NOINDEX'));
}

/**
 * Whether a mode lets a page type be indexed at all.
 */
function mode_allows(string $mode, string $type): bool
{
    if ($type === 'never') {
        return false;
    }

    return match ($mode) {
        'false'   => true,
        'content' => in_array($type, ['static', 'guide'], true),
        default   => false,
    };
}

/**
 * The table, as a pure function of the measured metrics.
 */
function gate_passes_metrics(string $type, array $m): bool
{
    $words = (int) ($m['words'] ?? 0);

    return match ($type) {
        'static'     => true,
        'model'      => $words >= GATE_MODEL_WORDS
                        && ((int) ($m['sourcedSpecs'] ?? 0) >= GATE_MODEL_SPECS || !empty($m['currentPrice'])),
        'brand'      => $words >= GATE_BRAND_WORDS && !empty($m['distributor']),
        'type', 'city' => $words >= GATE_HUB_WORDS && (int) ($m['indexableLinks'] ?? 0) >= GATE_HUB_LINKS,
        'comparison' => $words >= GATE_COMPARISON_WORDS && (int) ($m['rows'] ?? 0) >= GATE_COMPARISON_ROWS,
        'guide'      => $words >= GATE_GUIDE_WORDS && (int) ($m['internalLinks'] ?? 0) >= GATE_GUIDE_LINKS,
        default      => false,
    };
}

/**
 * Memo for the current request. indexing_reset() clears it (tests change the
 * mode or the date mid-process).
 */
function &indexing_memo(): array
{
    static $memo = [];

    return $memo;
}

function indexing_reset(): void
{
    $memo = &indexing_memo();
    $memo = [];
}

/**
 * What the gate measures for a route. Also printed by verify.sh when a page
 * unexpectedly fails, so a phase sees WHY.
 */
function page_metrics(array $route): array
{
    $type = $route['type'];
    $key  = $route['key'];

    if (in_array($type, ['static', 'never'], true)) {
        return [];
    }

    $body  = page_body($type, $key);
    $links = body_links($body);
    $m     = ['words' => body_words($body)];

    switch ($type) {
        case 'model':
            $m['sourcedSpecs'] = count(modelo_sourced_specs($key));
            $m['currentPrice'] = modelo_current_prices($key) !== [];
            break;
        case 'brand':
            $distributor       = marca($key)['distributor'] ?? null;
            $m['distributor']  = is_array($distributor)
                && is_string($distributor['name'] ?? null) && trim($distributor['name']) !== ''
                && fact_source($distributor['source'] ?? null) !== null
                && fact_date_ok($distributor['accessed'] ?? null);
            break;
        case 'type':
        case 'city':
            $m['indexableLinks'] = count(array_filter($links, static function (string $p): bool {
                $target = route_for_path($p);
                return $target !== null
                    && in_array($target['type'], ['model', 'guide', 'comparison'], true)
                    && gate_passes($p);
            }));
            break;
        case 'comparison':
            $m['rows'] = count(comparison_rows($key));
            break;
        case 'guide':
            $m['internalLinks'] = count(array_filter($links, static fn (string $p) => $p !== path_guide($key)));
            break;
    }

    return $m;
}

/**
 * Table-level verdict for a path, regardless of SITE_NOINDEX. The main
 * navigation uses this: it never links a page the gate would noindex.
 */
function gate_passes(string $path): bool
{
    $memo = &indexing_memo();
    $id   = 'gate:' . clean_path($path) . ':' . today();
    if (array_key_exists($id, $memo)) {
        return $memo[$id];
    }
    $memo[$id] = false;                     // a cycle can never vote itself in

    $route = route_for_path($path);
    if ($route === null) {
        return $memo[$id] = false;
    }
    if ($route['type'] === 'never') {
        return $memo[$id] = false;
    }
    if ($route['type'] === 'static') {
        return $memo[$id] = empty(page_meta($route['key'])['stub']);
    }
    if (route_record($route) === null) {
        return $memo[$id] = false;
    }

    return $memo[$id] = gate_passes_metrics($route['type'], page_metrics($route));
}

/**
 * THE decision: may this path be indexed right now?
 */
function is_indexable(string $path): bool
{
    $route = route_for_path($path);

    return $route !== null
        && mode_allows(indexing_mode(), $route['type'])
        && gate_passes($path);
}

/**
 * The meta robots value for the page being rendered, or null for none
 * (indexable). $query is the request's query string.
 */
function page_robots(array $page, ?string $query = null): ?string
{
    $query = $query ?? (string) ($_SERVER['QUERY_STRING'] ?? '');

    if (!empty($page['noindex']) || $query !== '' || !is_indexable((string) ($page['path'] ?? ''))) {
        return 'noindex, follow';
    }

    return null;
}

/**
 * Every indexable path, for sitemap.php.
 */
function sitemap_paths(): array
{
    return array_values(array_filter(array_keys(route_index()), 'is_indexable'));
}

/**
 * lastmod for a path: the record's own `updated` (a real date, never today's).
 * null when the record has none — sitemap.php then omits the tag.
 */
function route_lastmod(string $path): ?string
{
    $route = route_for_path($path);
    if ($route === null) {
        return null;
    }
    $dates = [];
    $record = route_record($route);
    $dates[] = $record['updated'] ?? null;
    if ($route['type'] === 'model') {
        $dates[] = content('modelos')[$route['key']]['updated'] ?? null;
    }
    if ($route['type'] === 'brand') {
        $dates[] = content('marcas')[$route['key']]['updated'] ?? null;
    }
    $dates = array_filter($dates, static fn ($d) => is_string($d) && fact_date_ok($d));

    return $dates === [] ? null : max($dates);
}
