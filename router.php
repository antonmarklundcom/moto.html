<?php
/**
 * Router for the PHP built-in server ONLY:
 *
 *     php -S localhost:8080 router.php
 *
 * Apache never uses this file. It exists so that local preview and verify.sh
 * behave exactly like production, by mirroring every routing rule in .htaccess:
 * the denied internals, sitemap.xml, robots.txt, the no-trailing-slash rule
 * (PLAN D3), directory pages served from <dir>/index.php, and the 404 document.
 * If you change a rule in .htaccess, change it here too.
 *
 * One thing here has no production counterpart, on purpose: APP_ENV. This
 * router sets APP_ENV=dev unless the environment already names a value, so the
 * [DEV] fixture records in content/_dev/ load (lib/bootstrap.php content()) and
 * their pages are served straight from the route registry — they have no route
 * file, so under Apache they simply do not exist. verify.sh starts one server
 * with APP_ENV=prod to prove exactly that.
 */

declare(strict_types=1);

if (getenv('APP_ENV') === false || getenv('APP_ENV') === '') {
    putenv('APP_ENV=dev');
}

$root  = __DIR__;
$uri   = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$query = (string) ($_SERVER['QUERY_STRING'] ?? '');
$path  = '/' . ltrim(rawurldecode($uri), '/');
$qs    = $query !== '' ? '?' . $query : '';

$halt = static function (int $status, string $body = ''): bool {
    http_response_code($status);
    header('Content-Type: text/html; charset=utf-8');
    echo $body;
    return true;
};

// --- internals: never readable over HTTP (D19) -------------------------------
if (preg_match('#^/(content|lib|partials|templates|docs|prompts|tests|deploy|scripts|logs|dist|node_modules)(/|$)#', $path)
    || preg_match('#(^|/)\.(?!well-known/)#', $path)
    || preg_match('#^/config(\.example)?\.php$#', $path)
    || preg_match('#\.(md|sh|json|jsonl|lock|ya?ml|log|mjs|dist|example)$#', $path)
) {
    return $halt(404, '<h1>404 Not Found</h1>');
}

// --- generated text endpoints ------------------------------------------------
if ($path === '/sitemap.xml') {
    require $root . '/sitemap.php';
    return true;
}
if ($path === '/robots.txt') {
    require $root . '/robots.php';
    return true;
}

// --- no trailing slash (D3), no visible index.php -----------------------------
if (preg_match('#^(.*?)/index\.php$#', $path, $m)) {
    http_response_code(301);
    header('Location: ' . ($m[1] === '' ? '/' : $m[1]) . $qs);
    return true;
}
if ($path !== '/' && str_ends_with($path, '/')) {
    http_response_code(301);
    header('Location: ' . rtrim($path, '/') . $qs);
    return true;
}

// --- an existing file: the built-in server serves it --------------------------
if ($path !== '/' && is_file($root . $path)) {
    return false;
}

// --- a page: <dir>/index.php ---------------------------------------------------
$index = $path === '/' ? $root . '/index.php' : $root . $path . '/index.php';
if (is_file($index)) {
    $_SERVER['SCRIPT_NAME'] = $path === '/' ? '/index.php' : $path . '/index.php';
    require $index;
    return true;
}

// --- dev only: [DEV] records have no route file (see the header) ---------------
if (getenv('APP_ENV') === 'dev') {
    require_once $root . '/lib/bootstrap.php';
    $devRoute = route_for_path($path);
    if ($devRoute !== null && !empty($devRoute['dev'])) {
        render_route($devRoute);
        return true;
    }
}

// --- ErrorDocument 404 /404.php -----------------------------------------------
http_response_code(404);
require $root . '/404.php';
return true;
