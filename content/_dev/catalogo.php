<?php
/**
 * [DEV] fixture for content/catalogo.php — AND the catalogue's shape, which
 * phase R1 writes in content/catalogo.php's own header (PLAN §2.2). Loaded
 * only with APP_ENV=dev (lib/bootstrap.php content()); production never sees
 * it, however the site is deployed.
 *
 * content/catalogo.php returns ['marcas' => [...], 'modelos' => [...]]:
 *
 *   marcas[slug]
 *     name          string   "Honda"
 *     distributor   array    ['name' => …, 'source' => ['label','url'], 'accessed' => 'YYYY-MM-DD']
 *                            or ['verify' => …]; the brand page is indexable only with a sourced one
 *     sortOrder     int      B1a takes the first half by sortOrder, B1b the rest
 *     sources       ?array   [['label','url','accessed'], …]
 *
 *   modelos["marca/modelo"]
 *     brand         string   brand slug (must exist in marcas)
 *     name          string   "CG 150 Titan" — without the brand
 *     slug          string   the model slug; the key is "{brand}/{slug}". slugify() of
 *                            moto/src/lib/slug.ts, never one of RESERVED_SLUGS
 *     category      string   category slug (`scooter`, `naked`, `cub`, `enduro-cross`,
 *                            `motocarro-carga`, `electrica`, …) — /motos/tipo/{category}
 *     years         ?string  "2019–2025"
 *     specs         array    key => hecho con fuente. Keys: cc, motor, potencia, torque,
 *                            transmision, arranque, alimentacion, refrigeracion, freno_del,
 *                            freno_tras, neumatico_del, neumatico_tras, tanque, peso,
 *                            altura_asiento, consumo, velocidad_maxima, autonomia,
 *                            bateria, carga_util, … (labels: content/ui.php 'specs';
 *                            a new key renders readable with no edit). A value is a
 *                            string as published ("149,2 cc") or a number + 'unit'.
 *     prices        array    [hecho con fuente + 'condition' => '0km' + 'version' => ?], value
 *                            an int in guaraníes. Shown as "Precio publicado por {fuente} —
 *                            consultado el {d/m/aaaa}", hidden automatically after 120 days (D6)
 *     versions      array    [texto, …] or blocks
 *     sources       array    [['label','url','accessed'], …] — everything consulted
 *
 * A hecho con fuente: ['value' => …, 'source' => ['label' => …, 'url' => …],
 * 'accessed' => 'YYYY-MM-DD'] (+ 'unit', 'note'). A gap: ['verify' => 'qué y dónde'].
 */

declare(strict_types=1);

$devSource = ['label' => '[DEV] Fuente de prueba', 'url' => 'https://example.com/ficha'];
$devFact   = static fn ($value, array $extra = []) => ['value' => $value, 'source' => $devSource, 'accessed' => '2026-09-01'] + $extra;
$devRecent = gmdate('Y-m-d', strtotime('-10 days'));

return [
    'marcas' => [
        'dev-marca' => [
            'name'        => '[DEV] Marca',
            'distributor' => ['name' => '[DEV] Distribuidor S.A.', 'source' => $devSource, 'accessed' => '2026-09-01'],
            'sortOrder'   => 9990,
        ],
        // Fails its gate: no editorial record and no sourced distributor.
        'dev-marca-fina' => [
            'name'        => '[DEV] Marca fina',
            'distributor' => ['verify' => '[DEV] confirmar el distribuidor en el sitio de la marca'],
            'sortOrder'   => 9991,
        ],
    ],
    'modelos' => [
        // Passes on specs: 5 sourced specs, no price.
        'dev-marca/dev-modelo-a' => [
            'brand'    => 'dev-marca',
            'name'     => 'Modelo A',
            'slug'     => 'dev-modelo-a',
            'category' => 'dev-tipo',
            'years'    => '2024–2026',
            'specs'    => [
                'cc'          => $devFact('149,2 cc'),
                'potencia'    => $devFact('12,5 hp a 8.000 rpm'),
                'transmision' => $devFact('5 velocidades'),
                'arranque'    => $devFact('Eléctrico y a pedal'),
                'tanque'      => $devFact(12, ['unit' => 'litros']),
                'peso'        => ['verify' => '[DEV] confirmar el peso en la ficha oficial'],
            ],
            'prices'   => [],
            'versions' => ['Versión estándar'],
            'sources'  => [['label' => '[DEV] Fuente de prueba', 'url' => 'https://example.com/ficha', 'accessed' => '2026-09-01']],
        ],
        // Fails: thin editorial, 1 spec, only an expired price.
        'dev-marca/dev-modelo-b' => [
            'brand'    => 'dev-marca',
            'name'     => 'Modelo B',
            'slug'     => 'dev-modelo-b',
            'category' => 'dev-tipo',
            'specs'    => ['cc' => $devFact('110 cc')],
            'prices'   => [$devFact(9900000, ['condition' => '0km', 'accessed' => '2025-01-01'])],
            'versions' => [],
            'sources'  => [],
        ],
        // Passes on its price alone (2 specs): tests/indexing.php ages it past 120 days.
        'dev-marca/dev-modelo-c' => [
            'brand'    => 'dev-marca',
            'name'     => 'Modelo C',
            'slug'     => 'dev-modelo-c',
            'category' => 'dev-tipo',
            'specs'    => [
                'cc'       => $devFact('150 cc'),
                'potencia' => $devFact('13 hp'),
            ],
            'prices'   => [['value' => 12500000, 'source' => $devSource, 'accessed' => $devRecent, 'condition' => '0km']],
            'versions' => [],
            'sources'  => [],
        ],
        // Passes on specs; the other side of the [DEV] comparison.
        'dev-marca/dev-modelo-d' => [
            'brand'    => 'dev-marca',
            'name'     => 'Modelo D',
            'slug'     => 'dev-modelo-d',
            'category' => 'dev-tipo',
            'specs'    => [
                'cc'          => $devFact('155 cc'),
                'potencia'    => $devFact('14 hp'),
                'transmision' => $devFact('6 velocidades'),
                'arranque'    => $devFact('Eléctrico'),
                'tanque'      => $devFact(11.5, ['unit' => 'litros']),
            ],
            'prices'   => [],
            'versions' => [],
            'sources'  => [],
        ],
    ],
];
