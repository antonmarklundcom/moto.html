<?php
/**
 * The route registry: every URL the site has, derived from the content
 * arrays. It is the one list that the indexing gate, the sitemap, verify.sh's
 * route contract and router.php's [DEV] dispatch all read, so they cannot
 * disagree about what exists.
 *
 * URL scheme (PLAN §2.1, the Node app's URLs, no trailing slash):
 *
 *   static      content/pages.php key           /, /motos, /guias, /contacto…
 *   brand       /motos/{marca}                  content/catalogo.php marcas
 *   model       /motos/{marca}/{modelo}         content/catalogo.php modelos
 *   type        /motos/tipo/{slug}              content/tipos.php
 *   city        /motos/ciudad/{slug}            content/ciudades.php
 *   guide       /guias/{slug}                   content/guias.php
 *   comparison  /guias/{a}-vs-{b}               content/comparativas.php
 *   never       content/pages.php with gate => 'never' (/gracias, legal)
 *
 * In production a route is served by its route file, <path>/index.php, three
 * lines long (bootstrap, $key, the template). [DEV] routes have no route
 * file: router.php renders them with render_route() when APP_ENV=dev.
 */

declare(strict_types=1);

/** Slugs a brand or model may never take (the Node app reserves them). */
const RESERVED_SLUGS = ['tipo', 'ciudad', 'nuevas', 'usadas', 'en-cuotas', 'page'];

/* ------------------------------------------------------------ paths -------- */

function path_brand(string $marca): string
{
    return '/motos/' . $marca;
}

function path_model(string $key): string
{
    return '/motos/' . $key;               // key is "marca/modelo"
}

function path_type(string $slug): string
{
    return '/motos/tipo/' . $slug;
}

function path_city(string $slug): string
{
    return '/motos/ciudad/' . $slug;
}

function path_guide(string $slug): string
{
    return '/guias/' . $slug;
}

function path_comparison(string $slug): string
{
    return '/guias/' . $slug;
}

/* -------------------------------------------------------- catalogue -------- */

/** One brand from content/catalogo.php, or null. */
function marca(string $slug): ?array
{
    $m = content('catalogo')['marcas'][$slug] ?? null;

    return is_array($m) ? $m : null;
}

/** All brands, in sortOrder. */
function marcas(): array
{
    $all = array_filter(content('catalogo')['marcas'], 'is_array');
    uasort($all, static fn (array $a, array $b): int
        => [(int) ($a['sortOrder'] ?? 999), (string) ($a['name'] ?? '')]
       <=> [(int) ($b['sortOrder'] ?? 999), (string) ($b['name'] ?? '')]);

    return $all;
}

/** One model from content/catalogo.php by "marca/modelo", or null. */
function modelo(string $key): ?array
{
    $m = content('catalogo')['modelos'][$key] ?? null;

    return is_array($m) ? $m : null;
}

/**
 * Models, optionally of one brand or one category, keyed "marca/modelo",
 * in the file's order.
 */
function modelos(?string $marca = null, ?string $category = null): array
{
    return array_filter(
        content('catalogo')['modelos'],
        static fn ($m) => is_array($m)
            && ($marca === null || ($m['brand'] ?? null) === $marca)
            && ($category === null || ($m['category'] ?? null) === $category)
    );
}

/** "Honda CG 150 Titan": the brand's name plus the model's. */
function modelo_name(string $key): string
{
    $m = modelo($key);
    if ($m === null) {
        return $key;
    }
    $brand = marca((string) ($m['brand'] ?? ''));

    return trim(($brand['name'] ?? '') . ' ' . ($m['name'] ?? ''));
}

/** The model's specs that are complete facts, in the order the catalogue lists them. */
function modelo_sourced_specs(string $key): array
{
    return array_filter((array) (modelo($key)['specs'] ?? []), 'fact_ok');
}

/** The model's prices still inside the 120-day window (D6). */
function modelo_current_prices(string $key): array
{
    return array_values(array_filter((array) (modelo($key)['prices'] ?? []), 'price_is_current'));
}

/* --------------------------------------------------------- registry -------- */

/**
 * Every route: path => ['type', 'key', 'dev' => bool]. Memoised per request
 * and per APP_ENV.
 */
function route_index(): array
{
    static $memo = [];
    $env = app_env();
    if (isset($memo[$env])) {
        return $memo[$env];
    }

    $routes = [];
    $add = static function (string $path, string $type, string $key, bool $dev) use (&$routes): void {
        $routes[$path] = ['path' => $path, 'type' => $type, 'key' => $key, 'dev' => $dev];
    };

    foreach (content('pages') as $path => $meta) {
        if ($path === '/404') {
            continue;
        }
        $type = ($meta['gate'] ?? 'static') === 'never' ? 'never' : 'static';
        $add(clean_path((string) $path), $type, (string) $path, false);
    }

    $devBrands = content_dev_keys('catalogo', 'marcas');
    foreach (array_keys(content('catalogo')['marcas']) as $slug) {
        $add(path_brand((string) $slug), 'brand', (string) $slug, in_array((string) $slug, $devBrands, true));
    }
    $devModels = content_dev_keys('catalogo', 'modelos');
    foreach (array_keys(content('catalogo')['modelos']) as $key) {
        $add(path_model((string) $key), 'model', (string) $key, in_array((string) $key, $devModels, true));
    }

    foreach ([
        'tipos'        => ['type', 'path_type'],
        'ciudades'     => ['city', 'path_city'],
        'guias'        => ['guide', 'path_guide'],
        'comparativas' => ['comparison', 'path_comparison'],
    ] as $file => [$type, $pathFn]) {
        $devKeys = content_dev_keys($file);
        foreach (array_keys(content($file)) as $slug) {
            $add($pathFn((string) $slug), $type, (string) $slug, in_array((string) $slug, $devKeys, true));
        }
    }

    ksort($routes);

    return $memo[$env] = $routes;
}

/**
 * The route for a path (query string and trailing slash ignored), or null.
 */
function route_for_path(string $path): ?array
{
    return route_index()[clean_path($path)] ?? null;
}

/**
 * Render a non-static route through its template. Used by router.php for
 * [DEV] routes; production route files require the template directly.
 */
function render_route(array $route): void
{
    $template = [
        'brand' => 'brand', 'model' => 'model', 'type' => 'type', 'city' => 'city',
        'guide' => 'guide', 'comparison' => 'comparison',
    ][$route['type']] ?? null;

    if ($template === null) {
        http_response_code(404);
        require ROOT_DIR . '/404.php';
        return;
    }

    (static function (string $key, string $template): void {
        require ROOT_DIR . '/templates/' . $template . '.php';
    })($route['key'], $template);
}

/**
 * The record behind a route, for templates and the gate. Static routes return
 * their content/pages.php record.
 */
function route_record(array $route): ?array
{
    $key = $route['key'];

    $record = match ($route['type']) {
        'static', 'never' => page_meta($key) ?: null,
        'brand'           => marca($key),
        'model'           => modelo($key),
        'type'            => content('tipos')[$key] ?? null,
        'city'            => content('ciudades')[$key] ?? null,
        'guide'           => content('guias')[$key] ?? null,
        'comparison'      => content('comparativas')[$key] ?? null,
        default           => null,
    };

    return is_array($record) ? $record : null;
}

/**
 * A comparison's spec rows that are complete facts on BOTH models:
 * spec key => [fact A, fact B]. Rows missing a source on either side are
 * not rendered and do not count toward the gate.
 */
function comparison_rows(string $slug): array
{
    $c = content('comparativas')[$slug] ?? null;
    if (!is_array($c)) {
        return [];
    }
    $a = modelo((string) ($c['a'] ?? ''));
    $b = modelo((string) ($c['b'] ?? ''));
    if ($a === null || $b === null) {
        return [];
    }

    $rows = [];
    foreach ((array) ($c['rows'] ?? []) as $spec) {
        if (!is_string($spec)) {
            continue;
        }
        $fa = $a['specs'][$spec] ?? null;
        $fb = $b['specs'][$spec] ?? null;
        if (fact_ok($fa) && fact_ok($fb)) {
            $rows[$spec] = [$fa, $fb];
        }
    }

    return $rows;
}

/**
 * True when an internal path leads somewhere: a route in the registry, or a
 * real file (an asset). inline() and the templates render a link to anything
 * else as plain text, so content may link ahead to a page another phase has
 * not built yet and the link goes live on its own the day it exists.
 */
function link_live(string $path): bool
{
    $clean = clean_path($path);

    return route_for_path($clean) !== null
        || ($clean !== '/' && is_file(ROOT_DIR . $clean));
}

/** "Honda CG 150 Titan vs Yamaha YBR 125": the visible name of a comparison. */
function comparison_title(string $slug): string
{
    $c = content('comparativas')[$slug] ?? [];

    return sprintf(ui('compare.h1', '%s vs %s'), modelo_name((string) ($c['a'] ?? '')), modelo_name((string) ($c['b'] ?? '')));
}
