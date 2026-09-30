<?php
/**
 * R1 exit check: `php docs/research/check-catalogo.php` exits non-zero on any failure.
 * - loads content/catalogo.php
 * - every brand has a sourced distributor; every model has >= 1 source, a valid category, a legal slug
 * - zero unsourced numbers: every spec and price is a fact with source label + http(s) url + accessed date,
 *   and no other field of a model carries a digit-bearing figure except name/slug/versions/years/labels/urls
 * - the 7 seed brands and 35 active seed models of moto are present with identical slugs
 */

declare(strict_types=1);

$c = require dirname(__DIR__, 2) . '/content/catalogo.php';
$fail = [];
$cats = ['naked', 'scooter', 'cub', 'enduro-cross', 'touring', 'deportiva', 'custom-chopper', 'motocarro-carga',
    'electrica', 'cuatriciclo'];
$reserved = ['tipo', 'ciudad', 'nuevas', 'usadas', 'en-cuotas', 'page'];

$isFact = function ($f): bool {
    return is_array($f) && array_key_exists('value', $f) && $f['value'] !== '' && $f['value'] !== null
        && is_string($f['source']['label'] ?? null) && $f['source']['label'] !== ''
        && preg_match('~^https?://\S+$~', (string) ($f['source']['url'] ?? ''))
        && preg_match('/^\d{4}-\d{2}-\d{2}$/', (string) ($f['accessed'] ?? ''));
};

foreach ($c['marcas'] as $slug => $b) {
    if (!$isFact(['value' => $b['distributor']['name'] ?? ''] + ($b['distributor'] ?? []))) {
        $fail[] = "marca $slug: distributor without source";
    }
}
$numbers = 0;
foreach ($c['modelos'] as $key => $m) {
    [$brand, $slug] = explode('/', $key, 2);
    if ($brand !== $m['brand'] || $slug !== $m['slug']) $fail[] = "$key: key != brand/slug";
    if (!isset($c['marcas'][$brand])) $fail[] = "$key: unknown brand";
    if (!preg_match('/^[a-z0-9]+(-[a-z0-9]+)*$/', $slug) || in_array($slug, $reserved, true)) $fail[] = "$key: slug";
    if (!in_array($m['category'], $cats, true)) $fail[] = "$key: category";
    if (count($m['sources']) < 1) $fail[] = "$key: no source";
    foreach ($m['sources'] as $s) {
        if (!preg_match('~^https?://~', $s['url'] ?? '') || !in_array($s['method'] ?? '', ['page', 'snippet'], true)) {
            $fail[] = "$key: malformed source";
        }
    }
    foreach ($m['specs'] as $k => $f) {
        $numbers++;
        if (!$isFact($f)) $fail[] = "$key: spec $k unsourced";
    }
    foreach ($m['prices'] as $p) {
        $numbers++;
        if (!$isFact($p) || !is_int($p['value']) || ($p['condition'] ?? '') !== '0km') $fail[] = "$key: price unsourced";
    }
    $allowed = ['brand', 'name', 'slug', 'category', 'years', 'specs', 'prices', 'versions', 'sources'];
    foreach (array_diff(array_keys($m), $allowed) as $extra) $fail[] = "$key: unexpected field $extra";
}

$seedBrands = ['honda', 'yamaha', 'suzuki', 'bajaj', 'tvs', 'kenton', 'star'];
$seedModels = ['yamaha/xtz-125', 'yamaha/xtz-150', 'yamaha/xtz-250', 'yamaha/ybr-125z', 'yamaha/crypton',
    'bajaj/boxer-150', 'bajaj/rouser-ns-200', 'bajaj/dominar-400', 'suzuki/v-strom-250', 'suzuki/v-strom-650',
    'suzuki/v-strom-800', 'suzuki/v-strom-1050', 'suzuki/dr-650', 'suzuki/gixxer-150', 'tvs/raider-125',
    'kenton/classic-125', 'kenton/gl-150', 'kenton/gl-150-pro', 'kenton/gtr-150', 'kenton/gtr-150-ltd',
    'kenton/blitz-110', 'star/star-150', 'star/smx-150', 'honda/xr-150', 'honda/wave', 'honda/cg-110',
    'honda/navi-110', 'honda/cb1-125', 'honda/xr-190', 'honda/xr-250-tornado', 'honda/crf-250f', 'honda/cb-500x',
    'honda/rebel-500', 'honda/nx500', 'honda/x-adv-750'];
foreach ($seedBrands as $b) if (!isset($c['marcas'][$b])) $fail[] = "seed brand $b missing";
foreach ($seedModels as $k) if (!isset($c['modelos'][$k])) $fail[] = "seed model $k missing";

printf("%d marcas, %d modelos, %d sourced figures checked, %d failures\n", count($c['marcas']), count($c['modelos']),
    $numbers, count($fail));
foreach ($fail as $f) echo "FAIL $f\n";
exit($fail === [] ? 0 : 1);
