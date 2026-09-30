<?php
/**
 * Loaded first by every page: `require __DIR__.'/../lib/bootstrap.php';`
 *
 * Defines ROOT_DIR, loads configuration, pulls in the library and loads the
 * market module named by content/site.php. Content arrays load lazily through
 * content() the first time a page asks for them.
 *
 * Library map:
 *   helpers.php   escaping, URLs, site facts, UI strings, inline text, WhatsApp
 *   facts.php     sourced facts (D5), price expiry (D6), verify blocks (D14)
 *   routes.php    the route registry: every URL, its type and its record
 *   render.php    page bodies and content blocks
 *   indexing.php  the indexing gate (PLAN §2.3): meta robots AND the sitemap
 *   leads.php     the lead model, phone normalisation, the idempotency key
 *   seo.php       head metadata and JSON-LD
 */

declare(strict_types=1);

if (defined('ROOT_DIR')) {
    return;
}

define('ROOT_DIR', dirname(__DIR__));

/**
 * A configuration value, or $default when unset or blank.
 *
 * config.php (on the server, never committed) wins; then the process
 * environment; then config.example.php's committed defaults. The environment
 * step lets verify.sh point the lead handler at a mock CRM without a
 * config.php.
 */
function cfg(string $key, ?string $default = null): ?string
{
    static $config = null;

    if ($config === null) {
        $defaults = require ROOT_DIR . '/config.example.php';
        $local    = is_file(ROOT_DIR . '/config.php') ? require ROOT_DIR . '/config.php' : [];
        $config   = ['defaults' => $defaults, 'local' => is_array($local) ? $local : []];
    }

    $value = $config['local'][$key] ?? '';
    if ($value === '' || $value === null) {
        $env   = getenv($key);
        $value = $env !== false && $env !== '' ? $env : ($config['defaults'][$key] ?? '');
    }
    if (is_bool($value)) {
        $value = $value ? 'true' : 'false';
    }

    return $value === '' || $value === null ? $default : (string) $value;
}

/**
 * 'dev' only when the environment says so: router.php and verify.sh set it.
 * Production (Apache, or the unzipped deploy artifact) never does, so the
 * [DEV] records in content/_dev/ never load there — whether the site was
 * deployed by zip or by Hostinger Git (PLAN D19).
 */
function app_env(): string
{
    $env = getenv('APP_ENV');

    return $env === 'dev' ? 'dev' : 'prod';
}

/**
 * A content array from content/<name>.php, loaded once per request.
 *
 * The shape of each file is documented in its header and is a contract (PLAN
 * §2.2): later phases fill values and add optional keys, never rename one.
 *
 * A missing file is an empty collection, not an error: content/catalogo.php
 * belongs to phase R1 and may land after the templates that read it.
 *
 * With APP_ENV=dev, content/_dev/<name>.php is merged on top: fixture records
 * whose keys start with `dev-` and whose titles start with [DEV], so every
 * template has a record to render in verify.sh.
 */
function content(string $name): array
{
    static $cache = [];
    $cacheKey = $name . '@' . app_env();

    if (!isset($cache[$cacheKey])) {
        if (!preg_match('/^[a-z-]+$/', $name)) {
            throw new RuntimeException("Bad content name: {$name}");
        }
        $path = ROOT_DIR . '/content/' . $name . '.php';
        $data = is_file($path) ? require $path : [];
        $data = is_array($data) ? $data : [];

        if ($name === 'catalogo') {
            $data += ['marcas' => [], 'modelos' => []];
        }

        $devPath = ROOT_DIR . '/content/_dev/' . $name . '.php';
        if (app_env() === 'dev' && is_file($devPath)) {
            $dev  = require $devPath;
            $data = content_merge($name, $data, is_array($dev) ? $dev : []);
        }

        $cache[$cacheKey] = $data;
    }

    return $cache[$cacheKey];
}

/**
 * Keys that exist only because of content/_dev/<name>.php, so the route
 * registry can mark those pages as [DEV] (router.php serves them without a
 * route file; verify.sh proves production never sees them).
 */
function content_dev_keys(string $name, ?string $group = null): array
{
    $devPath = ROOT_DIR . '/content/_dev/' . $name . '.php';
    if (app_env() !== 'dev' || !is_file($devPath)) {
        return [];
    }
    $dev = require $devPath;
    $dev = $group === null ? $dev : ($dev[$group] ?? []);

    return is_array($dev) ? array_map('strval', array_keys($dev)) : [];
}

/**
 * Dev records are added after the real ones. The catalogue has two keyed
 * maps and merges per map; lead-values merges per group; site.php is a flat
 * record; everything else is one keyed map.
 */
function content_merge(string $name, array $base, array $dev): array
{
    if (in_array($name, ['catalogo', 'lead-values'], true)) {
        foreach ($dev as $group => $records) {
            $base[$group] = is_array($records) && is_array($base[$group] ?? null)
                ? array_replace($base[$group], $records)
                : $records;
        }
        return $base;
    }

    return array_replace($base, $dev);
}

require_once ROOT_DIR . '/lib/helpers.php';
require_once ROOT_DIR . '/lib/facts.php';
require_once ROOT_DIR . '/lib/routes.php';
require_once ROOT_DIR . '/lib/render.php';
require_once ROOT_DIR . '/lib/indexing.php';
require_once ROOT_DIR . '/lib/leads.php';
require_once ROOT_DIR . '/lib/seo.php';

/**
 * The market module: exactly one of lib/market/*.php, named by 'market' in
 * content/site.php. Every module defines the same function names (fmt_money,
 * validate_tax_id, fmt_date_long, market_table, …).
 */
$market     = (string) (content('site')['market'] ?? 'py');
$marketFile = ROOT_DIR . '/lib/market/' . preg_replace('/[^a-z0-9_-]/', '', $market) . '.php';

if (!is_file($marketFile)) {
    throw new RuntimeException("Unknown market '{$market}': no lib/market/{$market}.php");
}

require_once $marketFile;
unset($market, $marketFile);
