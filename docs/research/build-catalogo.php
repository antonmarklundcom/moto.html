<?php
/**
 * R1: builds content/catalogo.php from the research JSON in docs/research/catalogo/*.json.
 *
 *     php docs/research/build-catalogo.php
 *
 * The JSON files are the research record (one per brand group, with the queries that were run and what was
 * rejected). This script only reshapes them into the PLAN §2.2 contract: it never adds a figure, and it drops any
 * spec or price that lacks a source URL or an accessed date.
 */

declare(strict_types=1);

$root = dirname(__DIR__, 2);
$categories = ['naked', 'scooter', 'cub', 'enduro-cross', 'touring', 'deportiva', 'custom-chopper',
    'motocarro-carga', 'electrica', 'cuatriciclo'];
$reserved = ['tipo', 'ciudad', 'nuevas', 'usadas', 'en-cuotas', 'page'];
$specKeys = ['cc', 'potencia', 'torque', 'transmision', 'arranque', 'freno_del', 'freno_tras', 'tanque', 'peso',
    'motor', 'refrigeracion', 'alimentacion', 'velocidad_max', 'neumatico_del', 'neumatico_tras', 'altura_asiento'];
// Seed order from moto/src/db/seed-data/brands.ts; new brands follow from 100 in file order.
$sortOrder = ['honda' => 10, 'star' => 15, 'yamaha' => 20, 'suzuki' => 30, 'bajaj' => 40, 'tvs' => 50, 'kenton' => 60];

function slugify(string $s): string
{
    $s = Normalizer::normalize($s, Normalizer::FORM_D);
    $s = preg_replace('/[\x{0300}-\x{036f}]/u', '', $s);
    $s = strtolower($s);
    $s = preg_replace('/[^a-z0-9]+/', '-', $s);
    return trim($s, '-');
}

// A fact's label is rendered as "Publicado por {label}", so it is the publisher's name, derived from the host —
// never the free-text label a research note carried (some held figures or English notes).
// Visible distributor names, cleaned of the research notes some JSON names carried.
const DISTRIBUTOR_NAMES = [
    'honda' => 'DIESA S.A.', 'star' => 'Alex S.A.', 'yamaha' => 'Chacomer S.A.E.', 'suzuki' => 'Chacomer S.A.E.',
    'bajaj' => 'Asunción Motor Sport S.A. (AMS)', 'tvs' => 'Chacomer S.A.E.', 'kenton' => 'Chacomer S.A.E.',
    'bmw-motorrad' => 'Garden Automotores S.A.', 'cfmoto' => 'IMAG', 'triumph' => 'Mecauto S.A.', 'taiga' => 'Inverfin',
    'leopard' => 'Reimpex', 'super-soco' => 'Quantum Motors', 'yadea' => 'Quantum Motors',
    'royal-enfield' => 'Reimpex S.A.', 'ktm' => 'Asunción Motor Sport S.A. (AMS)', 'kawasaki' => 'Metalcar S.A.',
    'benelli' => 'Inverfin', 'ducati' => 'IMAG S.R.L.', 'voge' => 'Voge Motos Paraguay', 'buler' => 'Britam S.A.',
];

const PUBLISHERS = [
    'alex.com.py' => 'Alex S.A.', 'tupi.com.py' => 'Tupi', 'clasipar.paraguay.com' => 'Clasipar (aviso de DIESA S.A.)',
    'hondamotos.com.py' => 'Honda Motos Paraguay', 'infonegocios.com.py' => 'InfoNegocios',
    'inverfin.com.py' => 'Inverfin', 'kenton.com.py' => 'Kenton', 'lanortena.net.py' => 'La Norteña',
    'mecauto.com.py' => 'Mecauto', 'paraguay.tvsmotor.com' => 'TVS Motor Paraguay', 'star.com.py' => 'Star',
    'suzukimotos.com.py' => 'Suzuki Motos Paraguay', 'suzuki.com.py' => 'Suzuki Paraguay',
    'tuquantum.com.py' => 'Quantum Motors', 'abc.com.py' => 'ABC Color', 'bmw-motorrad.com.py' => 'BMW Motorrad Paraguay',
    'cfmoto.com.py' => 'CFMoto Paraguay', 'chacomer.com.py' => 'Chacomer', 'classicmotos.com.py' => 'Classic Motos',
    'gonzalezgimenez.com.py' => 'Gonzalez Gimenez', 'hoy.com.py' => 'Diario HOY', 'lanacion.com.py' => 'La Nación',
    'obedira.com.py' => 'Obedira', 'reimpex.com.py' => 'Reimpex', 'triumph-motorcycles.co' => 'Triumph Motorcycles',
    'ultimahora.com' => 'Última Hora', 'yamaha-motor.com.py' => 'Yamaha Motor Paraguay', 'yamaha.com.py' => 'Yamaha Paraguay',
    'ktm.com.py' => 'KTM Paraguay', 'paraguay.kawasaki-la.com' => 'Kawasaki Paraguay',
    'harleyparaguay.com' => 'Harley-Davidson Paraguay', 'facebook.com' => 'Facebook', 'voge.com.py' => 'Voge Paraguay',
    'royalenfieldpy.com' => 'Royal Enfield Paraguay', 'ducati.com.py' => 'Ducati Paraguay', 'bristol.com.py' => 'Bristol',
];

function publisher(string $url): ?string
{
    $host = preg_replace('/^www\./', '', (string) parse_url($url, PHP_URL_HOST));
    foreach (PUBLISHERS as $h => $name) {
        if ($host === $h || str_ends_with($host, '.' . $h)) {
            return $name;
        }
    }
    return null;
}

function src(array $s): ?array
{
    $url = trim((string) ($s['url'] ?? ''));
    if (!preg_match('~^https?://~', $url)) {
        return null;
    }
    $label = publisher($url);
    if ($label === null) {
        fwrite(STDERR, "warn: no publisher name for $url\n");
        return null;
    }
    return ['label' => $label, 'url' => $url];
}

function accessed(array $f): ?string
{
    $a = (string) ($f['accessed'] ?? '');
    return preg_match('/^\d{4}-\d{2}-\d{2}$/', $a) ? $a : null;
}

$marcas = [];
$modelos = [];
$warnings = [];
$next = 100;
$files = glob($root . '/docs/research/catalogo/*.json');
sort($files);

foreach ($files as $file) {
    $data = json_decode((string) file_get_contents($file), true, 512, JSON_THROW_ON_ERROR);
    foreach ($data['brands'] ?? [] as $b) {
        $slug = (string) $b['slug'];
        $d = $b['distributor'] ?? [];
        $source = src($d['source'] ?? []);
        if ($source === null || accessed($d) === null || trim((string) ($d['name'] ?? '')) === '') {
            $warnings[] = "brand $slug dropped: distributor without source";
            continue;
        }
        if (isset($marcas[$slug])) {
            continue; // first research file that sourced the distributor wins
        }
        $marcas[$slug] = [
            'name' => (string) $b['name'],
            'distributor' => ['name' => DISTRIBUTOR_NAMES[$slug] ?? trim((string) $d['name']), 'source' => $source, 'accessed' => accessed($d)],
            'sortOrder' => $sortOrder[$slug] ?? $next++,
        ];
    }
    foreach ($data['models'] ?? [] as $m) {
        $brand = (string) $m['brand'];
        $slug = (string) $m['slug'];
        $key = "$brand/$slug";
        if ($slug !== slugify($slug) || in_array($slug, $reserved, true)) {
            $warnings[] = "model $key dropped: bad slug";
            continue;
        }
        if (!in_array($m['category'] ?? '', $categories, true)) {
            $warnings[] = "model $key dropped: category " . json_encode($m['category'] ?? null);
            continue;
        }
        $specs = [];
        foreach ($specKeys as $k) {
            $f = $m['specs'][$k] ?? null;
            if (!is_array($f)) {
                continue;
            }
            $s = src($f['source'] ?? []);
            if ($s === null || accessed($f) === null || $f['value'] === null || $f['value'] === '') {
                $warnings[] = "spec $key.$k dropped: no source";
                continue;
            }
            // Unit words only (English → Spanish); the figure itself is never touched.
            $value = $k === 'cc' ? (int) $f['value']
                : preg_replace(['/\\bliters?\\b/i', '/\\bElectrico\\b/'], ['litros', 'Eléctrico'], trim((string) $f['value']));
            $specs[$k] = ['value' => $value, 'source' => $s, 'accessed' => accessed($f)];
        }
        foreach (array_diff(array_keys($m['specs'] ?? []), $specKeys) as $k) {
            $warnings[] = "spec $key.$k dropped: unknown key";
        }
        $prices = [];
        foreach ($m['prices'] ?? [] as $p) {
            $s = src($p['source'] ?? []);
            $currency = strtoupper((string) ($p['currency'] ?? 'PYG'));
            if ($s === null || accessed($p) === null || !is_int($p['value'] ?? null) || $p['value'] <= 0
                || !in_array($currency, ['PYG', 'USD'], true)) {
                $warnings[] = "price $key dropped: " . json_encode($p['value'] ?? null);
                continue;
            }
            $prices[] = ['value' => $p['value'], 'currency' => $currency, 'condition' => '0km',
                'source' => $s, 'accessed' => accessed($p)];
        }
        $sources = [];
        foreach ($m['sources'] ?? [] as $x) {
            $s = src($x);
            if ($s === null || accessed($x) === null) {
                continue;
            }
            $x['note'] = trim(($x['label'] ?? '') . (empty($x['note']) ? '' : ' — ' . $x['note']));
            $s['accessed'] = accessed($x);
            $s['method'] = ($x['method'] ?? '') === 'page' ? 'page' : 'snippet';
            if (!empty($x['note'])) {
                $s['note'] = (string) $x['note'];
            }
            $sources[] = $s;
        }
        if ($sources === []) {
            $warnings[] = "model $key dropped: no inclusion source";
            continue;
        }
        if (isset($modelos[$key])) {
            // A later research pass (r2-*.json) deepens a model: keep existing facts, add missing ones.
            $modelos[$key]['specs'] += $specs;
            $modelos[$key]['prices'] = array_merge($modelos[$key]['prices'], $prices);
            $modelos[$key]['versions'] = array_values(array_unique(array_merge($modelos[$key]['versions'],
                array_map('strval', $m['versions'] ?? []))));
            $seen = array_column($modelos[$key]['sources'], 'url');
            foreach ($sources as $s) {
                if (!in_array($s['url'], $seen, true)) {
                    $modelos[$key]['sources'][] = $s;
                }
            }
            continue;
        }
        $row = ['brand' => $brand, 'name' => (string) $m['name'], 'slug' => $slug, 'category' => $m['category']];
        if (!empty($m['years'])) {
            $row['years'] = (string) $m['years'];
        }
        $row['specs'] = $specs;
        $row['prices'] = $prices;
        $row['versions'] = array_values(array_map('strval', $m['versions'] ?? []));
        $row['sources'] = $sources;
        $modelos[$key] = $row;
    }
}

foreach ($modelos as $key => $m) {
    if (!isset($marcas[$m['brand']])) {
        $warnings[] = "model $key dropped: brand not in catalogue";
        unset($modelos[$key]);
    }
}
// PLAN R1: over 120 models, keep the 35 seed models plus those with price + specs; the rest waits in
// docs/research/proxima-tanda.json ("próxima tanda" in docs/research/catalogo.md).
$seeds = ['yamaha/xtz-125', 'yamaha/xtz-150', 'yamaha/xtz-250', 'yamaha/ybr-125z', 'yamaha/crypton', 'bajaj/boxer-150',
    'bajaj/rouser-ns-200', 'bajaj/dominar-400', 'suzuki/v-strom-250', 'suzuki/v-strom-650', 'suzuki/v-strom-800',
    'suzuki/v-strom-1050', 'suzuki/dr-650', 'suzuki/gixxer-150', 'tvs/raider-125', 'kenton/classic-125', 'kenton/gl-150',
    'kenton/gl-150-pro', 'kenton/gtr-150', 'kenton/gtr-150-ltd', 'kenton/blitz-110', 'star/star-150', 'star/smx-150',
    'honda/xr-150', 'honda/wave', 'honda/cg-110', 'honda/navi-110', 'honda/cb1-125', 'honda/xr-190',
    'honda/xr-250-tornado', 'honda/crf-250f', 'honda/cb-500x', 'honda/rebel-500', 'honda/nx500', 'honda/x-adv-750'];
$cap = 120;
$score = fn (array $m): int => ($m['prices'] !== [] ? 100 : 0) + count($m['specs']);
$rank = array_keys($modelos);
usort($rank, fn ($a, $b) => [in_array($b, $seeds, true), $score($modelos[$b]), $a]
    <=> [in_array($a, $seeds, true), $score($modelos[$a]), $b]);
$deferred = [];
foreach (array_slice($rank, $cap) as $key) {
    $deferred[$key] = ['name' => $modelos[$key]['name'], 'category' => $modelos[$key]['category'],
        'specs' => count($modelos[$key]['specs']), 'prices' => count($modelos[$key]['prices']),
        'sources' => array_column($modelos[$key]['sources'], 'url')];
    unset($modelos[$key]);
}
ksort($deferred);
file_put_contents(__DIR__ . '/proxima-tanda.json',
    json_encode($deferred, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n");
$withModels = array_unique(array_column($modelos, 'brand'));
foreach (array_keys($marcas) as $slug) {
    if (!in_array($slug, $withModels, true)) {
        $warnings[] = "brand $slug left out: no model in this batch (see proxima-tanda.json)";
        unset($marcas[$slug]);
    }
}
foreach ($modelos as &$row) {
    $row['specs'] = array_merge(array_intersect_key(array_flip($specKeys), $row['specs']), $row['specs']);
}
unset($row);
uasort($marcas, fn ($a, $b) => $a['sortOrder'] <=> $b['sortOrder']);
uksort($modelos, function ($a, $b) use ($marcas, $modelos) {
    return [$marcas[$modelos[$a]['brand']]['sortOrder'], $a] <=> [$marcas[$modelos[$b]['brand']]['sortOrder'], $b];
});

function export($v, int $depth = 0): string
{
    $pad = str_repeat('    ', $depth + 1);
    $end = str_repeat('    ', $depth);
    if (is_array($v)) {
        if ($v === []) {
            return '[]';
        }
        $list = array_is_list($v);
        $flat = true;
        foreach ($v as $x) {
            $flat = $flat && !is_array($x);
        }
        $items = [];
        foreach ($v as $k => $x) {
            $items[] = ($list ? '' : var_export($k, true) . ' => ') . export($x, $depth + 1);
        }
        $one = '[' . implode(', ', $items) . ']';
        if ($flat && strlen($one) + strlen($pad) <= 120) {
            return $one;
        }
        return "[\n" . $pad . implode(",\n" . $pad, $items) . ",\n" . $end . ']';
    }
    return var_export($v, true);
}

$header = file_get_contents(__DIR__ . '/catalogo-header.txt');
$out = "<?php\n" . $header . "\ndeclare(strict_types=1);\n\nreturn " . export(['marcas' => $marcas, 'modelos' => $modelos]) . ";\n";
file_put_contents($root . '/content/catalogo.php', $out);
foreach ($warnings as $w) {
    fwrite(STDERR, "warn: $w\n");
}
printf("catalogo.php: %d marcas, %d modelos, %d con precio, %d con >=3 specs\n", count($marcas), count($modelos),
    count(array_filter($modelos, fn ($m) => $m['prices'] !== [])),
    count(array_filter($modelos, fn ($m) => count($m['specs']) >= 3)));
