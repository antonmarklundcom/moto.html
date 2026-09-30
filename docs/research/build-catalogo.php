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

function src(array $s): ?array
{
    $url = trim((string) ($s['url'] ?? ''));
    $label = trim((string) ($s['label'] ?? ''));
    if (!preg_match('~^https?://~', $url) || $label === '') {
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
            $warnings[] = "brand $slug duplicated in " . basename($file);
            continue;
        }
        $marcas[$slug] = [
            'name' => (string) $b['name'],
            'distributor' => ['name' => trim((string) $d['name']), 'source' => $source, 'accessed' => accessed($d)],
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
            $value = $k === 'cc' ? (int) $f['value'] : trim((string) $f['value']);
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
            $warnings[] = "model $key duplicated in " . basename($file);
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
