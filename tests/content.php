<?php
/**
 * Referential integrity of the content arrays, and the list of pending
 * verify blocks (PLAN D14).
 *
 *     php tests/content.php <site-root> [--write-verificar]
 *
 * Runs WITHOUT the [DEV] records (APP_ENV=prod) unless the environment says
 * otherwise: it checks what production serves. --write-verificar rewrites
 * docs/verificar.md from every ['verify' => …] block in content/*.php.
 */

declare(strict_types=1);

$root = rtrim($argv[1] ?? dirname(__DIR__), '/');
$writeVerificar = in_array('--write-verificar', $argv, true);
require $root . '/lib/bootstrap.php';

$fail = 0;
$say  = static function (string $m) use (&$fail): void {
    echo "  FAIL  {$m}\n";
    $fail++;
};

/* --- catalogue ------------------------------------------------------------ */
$cat = content('catalogo');
foreach ($cat['marcas'] as $slug => $b) {
    is_array($b) && !empty($b['name']) || $say("catalogo marcas[{$slug}]: no name");
    preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', (string) $slug) || $say("catalogo marcas[{$slug}]: not a slug");
    in_array($slug, RESERVED_SLUGS, true) && $say("catalogo marcas[{$slug}]: reserved slug");
}
foreach ($cat['modelos'] as $key => $m) {
    if (!is_array($m)) {
        $say("catalogo modelos[{$key}]: not a record");
        continue;
    }
    $brand = (string) ($m['brand'] ?? '');
    $slug  = (string) ($m['slug'] ?? '');
    isset($cat['marcas'][$brand]) || $say("catalogo modelos[{$key}]: unknown brand '{$brand}'");
    $key === "{$brand}/{$slug}" || $say("catalogo modelos[{$key}]: key must be \"{brand}/{slug}\" ({$brand}/{$slug})");
    preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug) || $say("catalogo modelos[{$key}]: slug '{$slug}' is not a slug");
    in_array($slug, RESERVED_SLUGS, true) && $say("catalogo modelos[{$key}]: reserved slug");
    !empty($m['name']) || $say("catalogo modelos[{$key}]: no name");
    !empty($m['category']) || $say("catalogo modelos[{$key}]: no category");
    foreach ((array) ($m['specs'] ?? []) as $spec => $fact) {
        (fact_ok($fact) || is_verify($fact)) || $say("catalogo modelos[{$key}].specs.{$spec}: neither a sourced fact nor a verify block");
    }
    foreach ((array) ($m['prices'] ?? []) as $i => $price) {
        if (is_verify($price)) {
            continue;
        }
        (fact_ok($price) && is_int($price['value'])) || $say("catalogo modelos[{$key}].prices[{$i}]: not a sourced fact with an integer value in guaraníes");
    }
}

/* --- editorial files point at real records ----------------------------------- */
foreach (content('marcas') as $slug => $r) {
    isset($cat['marcas'][$slug]) || $say("marcas[{$slug}]: no such brand in catalogo.php");
}
foreach (content('modelos') as $key => $r) {
    isset($cat['modelos'][$key]) || $say("modelos[{$key}]: no such model in catalogo.php");
}
foreach (content('tipos') as $slug => $r) {
    !empty($r['name']) || $say("tipos[{$slug}]: no name");
}
foreach (content('comparativas') as $slug => $c) {
    foreach (['a', 'b'] as $side) {
        isset($cat['modelos'][$c[$side] ?? '']) || $say("comparativas[{$slug}].{$side}: unknown model '" . ($c[$side] ?? '') . "'");
    }
    $expected = basename((string) ($c['a'] ?? '')) . '-vs-' . basename((string) ($c['b'] ?? ''));
    $slug === $expected || $say("comparativas[{$slug}]: key should be {$expected}");
    isset(content('guias')[$slug]) && $say("comparativas[{$slug}]: also a guide slug");
}
foreach (content('guias') as $slug => $g) {
    foreach (['group', 'title', 'navLabel', 'seoTitle', 'metaDescription', 'updated'] as $k) {
        !empty($g[$k]) || $say("guias[{$slug}]: missing {$k}");
    }
    in_array($g['group'] ?? '', ['compra', 'precios', 'reparacion', 'tramites'], true)
        || $say("guias[{$slug}]: unknown group '" . ($g['group'] ?? '') . "'");
    foreach ((array) ($g['related'] ?? []) as $rel) {
        (isset(content('guias')[$rel]) || isset(content('comparativas')[$rel])) || $say("guias[{$slug}].related: unknown '{$rel}'");
    }
    if (!empty($g['quiz'])) {
        isset(content('quiz')[$g['quiz']]) || $say("guias[{$slug}].quiz: unknown quiz '{$g['quiz']}'");
    }
}
foreach (['tipos', 'ciudades'] as $file) {
    foreach (content($file) as $slug => $r) {
        foreach ((array) ($r['guides'] ?? []) as $gs) {
            (isset(content('guias')[$gs]) || isset(content('comparativas')[$gs])) || $say("{$file}[{$slug}].guides: unknown '{$gs}'");
        }
        foreach ((array) ($r['models'] ?? []) as $mk) {
            isset($cat['modelos'][$mk]) || $say("{$file}[{$slug}].models: unknown '{$mk}'");
        }
    }
}

/* --- lead model --------------------------------------------------------------- */
$lv = content('lead-values');
foreach ((array) $lv['sources'] as $slug => $s) {
    in_array($s['leadType'] ?? '', LEAD_TYPES, true) || $say("lead-values sources[{$slug}]: leadType must be one of " . implode('|', LEAD_TYPES));
    foreach (['menuLabel', 'tier', 'whatsappText', 'nextStep'] as $k) {
        !empty($s[$k]) || $say("lead-values sources[{$slug}]: missing {$k}");
    }
    isset($lv['tierValues'][$s['tier'] ?? '']) || $say("lead-values sources[{$slug}]: unknown tier");
    foreach (['crmTag', 'tag', 'tags', 'pipeline', 'stage', 'owner'] as $k) {
        array_key_exists($k, $s) && $say("lead-values sources[{$slug}]: '{$k}' is not allowed (D11)");
    }
}
foreach (array_keys((array) content('ui')['needs']) as $need) {
    isset($lv['needs'][$need]) || $say("form chip '{$need}' has no entry in lead-values needs");
}
foreach ((array) $lv['whatsappMenu'] as $slug) {
    isset($lv['sources'][$slug]) || $say("lead-values whatsappMenu: unknown source '{$slug}'");
}
foreach (content('pages') as $path => $meta) {
    if (!empty($meta['leadSlug'])) {
        isset($lv['sources'][$meta['leadSlug']]) || $say("pages[{$path}].leadSlug: unknown source '{$meta['leadSlug']}'");
    }
    $path === '/' || $path === '/404' || !str_ends_with((string) $path, '/') || $say("pages[{$path}]: trailing slash (D3)");
}

/* --- route files <-> registry, both ways ---------------------------------------- */
$routes = route_index();
foreach ($routes as $path => $route) {
    if ($route['dev']) {
        continue;
    }
    $file = ROOT_DIR . ($path === '/' ? '' : $path) . '/index.php';
    is_file($file) || $say("route {$path} ({$route['type']}): no route file at " . substr($file, strlen(ROOT_DIR)));
}
$extraRoutes = ['/ir/wa/general'];            // endpoints with a route file but no content record
$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(ROOT_DIR, FilesystemIterator::SKIP_DOTS));
foreach ($it as $f) {
    if ($f->getFilename() !== 'index.php') {
        continue;
    }
    $rel = substr($f->getPath(), strlen(ROOT_DIR));
    if (preg_match('#^/(dist|tests|node_modules|deploy|docs|prompts|\.git)(/|$)#', $rel . '/')) {
        continue;
    }
    $path = $rel === '' ? '/' : $rel;
    (isset($routes[$path]) || in_array($path, $extraRoutes, true))
        || $say("route file {$path}/index.php has no record in the content arrays (it would serve a page no gate or sitemap knows)");
}

/* --- verify blocks → docs/verificar.md ------------------------------------------- */
$pending = [];
$walk = static function ($node, string $where) use (&$walk, &$pending): void {
    if (is_verify($node)) {
        $pending[] = [$where, (string) $node['verify']];
        return;
    }
    if (is_array($node)) {
        foreach ($node as $k => $v) {
            $walk($v, $where === '' ? (string) $k : "{$where}.{$k}");
        }
    }
};
foreach (glob(ROOT_DIR . '/content/*.php') as $file) {
    $name = basename($file, '.php');
    $walk(content($name), $name);
}

if ($writeVerificar) {
    $md  = "# Datos por verificar\n\n";
    $md .= "Generado por `verify.sh` (tests/content.php) a partir de cada bloque `['verify' => …]` de `content/*.php`.\n";
    $md .= "Ninguno se muestra en el sitio (PLAN D14). Para resolver uno: reemplazá el bloque por un hecho con fuente\n";
    $md .= "(`['value' => …, 'source' => ['label' => …, 'url' => …], 'accessed' => 'AAAA-MM-DD']`) o por el texto con su fuente.\n\n";
    if ($pending === []) {
        $md .= "Nada pendiente.\n";
    } else {
        $md .= '| Dónde | Qué confirmar y dónde |' . "\n" . '|---|---|' . "\n";
        foreach ($pending as [$where, $what]) {
            $md .= '| `' . str_replace('|', '\\|', $where) . '` | ' . str_replace(["|", "\n"], ['\\|', ' '], $what) . " |\n";
        }
    }
    file_put_contents(ROOT_DIR . '/docs/verificar.md', $md);
}

if ($fail === 0) {
    echo '  ok    content arrays are consistent; ' . count($routes) . ' routes, each with its route file; '
        . count($pending) . " pending verify blocks\n";
}
exit($fail === 0 ? 0 : 1);
