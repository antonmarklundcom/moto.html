<?php
/**
 * Prints the route contract, one URL per line:
 *
 *     <path>\t<expected status>[\t<expected Location>]
 *
 * Status "deny" means "never readable": 404 locally, 403 or 404 on Apache.
 * verify.sh and deploy/verify-live.sh both consume it, so a phase extends the
 * smoke test just by adding content: every route in the registry
 * (lib/routes.php) appears here automatically.
 *
 *     php deploy/routes.php [site-root]
 *
 * With APP_ENV=dev the [DEV] fixture routes are included; verify-live.sh runs
 * it without, so production is never asked for a [DEV] page.
 */

declare(strict_types=1);

$root = $argv[1] ?? dirname(__DIR__);
require rtrim($root, '/') . '/lib/bootstrap.php';

$routes = [];

/* Every page the content arrays declare. */
foreach (array_keys(route_index()) as $path) {
    $routes[] = [$path, '200'];
}

/* Generated endpoints. */
$routes[] = ['/robots.txt', '200'];
$routes[] = ['/sitemap.xml', '200'];

/* No trailing slash (D3), no visible index.php; the query string survives. */
$routes[] = ['/guias/', '301', '/guias'];
$routes[] = ['/motos/', '301', '/motos'];
$routes[] = ['/guias/index.php', '301', '/guias'];
$routes[] = ['/contacto/?utm_source=x', '301', '/contacto?utm_source=x'];

/* The tracked WhatsApp redirect (D10) answers 302 whatever is configured. */
$routes[] = ['/ir/wa/general?texto=verify&desde=/', '302'];

/* The lead handler refuses GET. */
$routes[] = ['/enviar.php', '405'];

/* A path that does not exist is a 404, not a soft 200. */
$routes[] = ['/esta-pagina-no-existe', '404'];

/* Internals are never readable over HTTP (D19: the whole repo is deployed). */
foreach ([
    '/content/site.php', '/content/_dev/catalogo.php', '/lib/helpers.php', '/lib/market/py.php',
    '/partials/head.php', '/templates/model.php', '/templates/body/model.php',
    '/docs/log/T0.md', '/prompts/_handoff.md', '/tests/indexing.php', '/deploy/make-zip.sh',
    '/deploy/package.json', '/scripts/port-guides.php', '/logs/leads.jsonl', '/logs/wa-clicks.jsonl',
    '/config.php', '/config.example.php', '/README.md', '/PLAN.md', '/.git/config', '/.git/HEAD',
    '/.gitignore', '/.github/workflows/verify.yml',
] as $path) {
    $routes[] = [$path, 'deny'];
}

foreach ($routes as $route) {
    echo implode("\t", $route), "\n";
}
