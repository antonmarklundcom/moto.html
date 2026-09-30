<?php
/**
 * The motorcycle catalogue: every brand and model sold (0 km, now or before) in Paraguay, with sourced facts.
 * Written by phase R1 from the research record in docs/research/catalogo/*.json via
 * `php docs/research/build-catalogo.php` — edit the JSON and rebuild, never this file by hand.
 * Reasoning, what was rejected and the "próxima tanda" live in docs/research/catalogo.md.
 *
 * Shape (PLAN.md §2.2 — a contract: nobody renames these keys later):
 *
 *   A sourced fact  ['value' => int|string, 'source' => ['label' => string, 'url' => string], 'accessed' => 'YYYY-MM-DD']
 *
 *   marcas[slug]
 *     name          string
 *     distributor   ['name' => string, 'source' => ['label', 'url'], 'accessed' => 'YYYY-MM-DD']  official distributor
 *     sortOrder     int      seed order from moto (honda 10 … kenton 60), new brands from 100
 *
 *   modelos["marca/modelo"]
 *     brand         string   key into marcas
 *     name          string   commercial name as sold in Paraguay, without the brand
 *     slug          string   slugify() of moto/src/lib/slug.ts; seed slugs never change; never tipo, ciudad,
 *                            nuevas, usadas, en-cuotas, page
 *     category      string   slug from moto/src/db/seed-data/categories.ts: naked, scooter, cub, enduro-cross,
 *                            touring, deportiva, custom-chopper, motocarro-carga, electrica, cuatriciclo
 *     years         ?string  optional, only when a source gives it
 *     specs         array    key => sourced fact, only what a source publishes. Keys: cc (int), potencia, torque,
 *                            transmision, arranque, freno_del, freno_tras, tanque, peso, motor, refrigeracion,
 *                            alimentacion, velocidad_max, neumatico_del, neumatico_tras, altura_asiento (strings,
 *                            exactly as published)
 *     prices        array    list of sourced facts + 'currency' => 'PYG'|'USD', 'condition' => '0km'. Only a price
 *                            a distributor, the brand or a Paraguayan retailer published; the render hides one whose
 *                            'accessed' is > 120 days old (D6). Never an estimate.
 *     versions      string[] trim names as published
 *     sources       array    list of ['label', 'url', 'accessed', 'method' => 'page'|'snippet', 'note'?]: the evidence
 *                            that the model is sold in Paraguay (D4) plus every page a fact came from. 'snippet' =
 *                            read through a web-search result for that URL because the environment could not open
 *                            the page directly (PLAN §4.18).
 */

declare(strict_types=1);

return [
    'marcas' => [
        'honda' => [
            'name' => 'Honda',
            'distributor' => [
                'name' => 'DIESA S.A.',
                'source' => [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/03/15/diesa-presento-las-nuevas-motos-honda-nx190-y-cb190r-20/',
                ],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 10,
        ],
        'star' => [
            'name' => 'Star',
            'distributor' => [
                'name' => 'Alex S.A.',
                'source' => [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/07/10/star-la-motocicleta-que-acompana-en-todo-lo-que-uno-se-propone/',
                ],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 15,
        ],
        'yamaha' => [
            'name' => 'Yamaha',
            'distributor' => [
                'name' => 'Chacomer S.A.E.',
                'source' => ['label' => 'Yamaha Motor Paraguay', 'url' => 'http://yamaha-motor.com.py/producto/51/xtz-150'],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 20,
        ],
        'suzuki' => [
            'name' => 'Suzuki',
            'distributor' => [
                'name' => 'Chacomer S.A.E.',
                'source' => [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/01/14/suzuki-motos-regresa-a-paraguay-con-chacomer/',
                ],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 30,
        ],
        'bajaj' => [
            'name' => 'Bajaj',
            'distributor' => [
                'name' => 'Asunción Motor Sport S.A. (AMS)',
                'source' => [
                    'label' => 'La Nación',
                    'url' => 'https://www.lanacion.com.py/negocios_edicion_impresa/2019/01/12/bajaj-llego-al-paraguay-y-busca-ser-lider-en-el-segmento-de-motos/',
                ],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 40,
        ],
        'tvs' => [
            'name' => 'TVS',
            'distributor' => [
                'name' => 'Chacomer S.A.E.',
                'source' => ['label' => 'TVS Motor Paraguay', 'url' => 'https://paraguay.tvsmotor.com/en/'],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 50,
        ],
        'kenton' => [
            'name' => 'Kenton',
            'distributor' => [
                'name' => 'Chacomer S.A.E.',
                'source' => ['label' => 'Chacomer', 'url' => 'https://www.chacomer.com.py/moto/kenton.html'],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 60,
        ],
        'bmw-motorrad' => [
            'name' => 'BMW Motorrad',
            'distributor' => [
                'name' => 'Garden Automotores S.A.',
                'source' => [
                    'label' => 'La Nación',
                    'url' => 'https://www.lanacion.com.py/negocios_edicion_impresa/2018/03/26/bmw-motorrad-paraguay-lanzo-la-nueva-g-310-gs/',
                ],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 103,
        ],
        'cfmoto' => [
            'name' => 'CFMoto',
            'distributor' => [
                'name' => 'IMAG',
                'source' => ['label' => 'CFMoto Paraguay', 'url' => 'https://www.cfmoto.com.py/motos.php'],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 106,
        ],
        'triumph' => [
            'name' => 'Triumph',
            'distributor' => [
                'name' => 'Mecauto S.A.',
                'source' => [
                    'label' => 'Triumph Motorcycles',
                    'url' => 'https://www.triumph-motorcycles.co/triumph-hub-page/paraguay',
                ],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 110,
        ],
        'taiga' => [
            'name' => 'Taiga',
            'distributor' => [
                'name' => 'Inverfin',
                'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/collections/taiga'],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 111,
        ],
        'leopard' => [
            'name' => 'Leopard',
            'distributor' => [
                'name' => 'Reimpex',
                'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard'],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 112,
        ],
        'super-soco' => [
            'name' => 'Super Soco',
            'distributor' => [
                'name' => 'Quantum Motors',
                'source' => [
                    'label' => 'InfoNegocios',
                    'url' => 'https://infonegocios.com.py/infomotor/donde-conseguir-motos-electricas-tipo-scooter-en-paraguay-aca-tenes-unas-opciones',
                ],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 113,
        ],
        'yadea' => [
            'name' => 'Yadea',
            'distributor' => [
                'name' => 'Quantum Motors',
                'source' => [
                    'label' => 'InfoNegocios',
                    'url' => 'https://infonegocios.com.py/infomotor/donde-conseguir-motos-electricas-tipo-scooter-en-paraguay-aca-tenes-unas-opciones',
                ],
                'accessed' => '2026-09-30',
            ],
            'sortOrder' => 114,
        ],
    ],
    'modelos' => [
        'honda/cb-500x' => [
            'brand' => 'honda',
            'name' => 'CB 500X',
            'slug' => 'cb-500x',
            'category' => 'touring',
            'specs' => [],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Clasipar (aviso de DIESA S.A.)',
                    'url' => 'https://clasipar.paraguay.com/motor/motos/no-te-quedes-sin-tu-moto-honda-diesa-cg-110-cb1-125-navi-110-cb160-xr150-africa-1100-92967',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Clasipar ad by DIESA S.A. (lists CG 110, CB1 125, Navi 110, CB160, XR150, Africa, XR190, CB190R, Tornado 250, Grom, CB 500X, CB650R, NC750X, CRF1100, CRF250F) — distributor ad (criterion a); model list taken from search summary',
                ],
            ],
        ],
        'honda/cb1-125' => [
            'brand' => 'honda',
            'name' => 'CB1 125',
            'slug' => 'cb1-125',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => [
                        'label' => 'Honda Motos Paraguay',
                        'url' => 'https://hondamotos.com.py/uploads/products/30.pdf',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '10.1 hp @ 8,500 rpm',
                    'source' => [
                        'label' => 'Honda Motos Paraguay',
                        'url' => 'https://hondamotos.com.py/uploads/products/30.pdf',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '4 velocidades',
                    'source' => [
                        'label' => 'Honda Motos Paraguay',
                        'url' => 'https://hondamotos.com.py/uploads/products/30.pdf',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '10 L',
                    'source' => [
                        'label' => 'Honda Motos Paraguay',
                        'url' => 'https://hondamotos.com.py/uploads/products/30.pdf',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '128 kg',
                    'source' => [
                        'label' => 'Honda Motos Paraguay',
                        'url' => 'https://hondamotos.com.py/uploads/products/30.pdf',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Honda Motos Paraguay',
                        'url' => 'https://hondamotos.com.py/uploads/products/30.pdf',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '80/100-18',
                    'source' => [
                        'label' => 'Honda Motos Paraguay',
                        'url' => 'https://hondamotos.com.py/uploads/products/30.pdf',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '90/90-18',
                    'source' => [
                        'label' => 'Honda Motos Paraguay',
                        'url' => 'https://hondamotos.com.py/uploads/products/30.pdf',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 13950000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/honda-cb1-125/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Honda Motos Paraguay',
                    'url' => 'https://hondamotos.com.py/uploads/products/30.pdf',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Honda CB1 125 ficha (hondamotos.com.py) — official Honda Paraguay (DIESA) page, seen in search results',
                ],
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/honda-cb1-125/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos CB1 125 — retailer evidence',
                ],
                [
                    'label' => 'La Norteña',
                    'url' => 'https://lanortena.net.py/prod/honda-cb1-125/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'La Norteña CB1 125 — retailer page',
                ],
            ],
        ],
        'honda/cb160f' => [
            'brand' => 'honda',
            'name' => 'CB160F',
            'slug' => 'cb160f',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 162,
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/honda-cb160-f/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/honda-cb160-f/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/honda-cb160-f/'],
                    'accessed' => '2026-09-30',
                ],
                'velocidad_max' => [
                    'value' => '110 km/h',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/honda-cb160-f/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 19105000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/honda-cb160-f/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/honda-cb160-f/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos CB160-F — retailer evidence',
                ],
                [
                    'label' => 'Clasipar (aviso de DIESA S.A.)',
                    'url' => 'https://clasipar.paraguay.com/motor/motos/no-te-quedes-sin-tu-moto-honda-diesa-cg-110-cb1-125-navi-110-cb160-xr150-africa-1100-92967',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Clasipar ad by DIESA S.A. (lists CG 110, CB1 125, Navi 110, CB160, XR150, Africa, XR190, CB190R, Tornado 250, Grom, CB 500X, CB650R, NC750X, CRF1100, CRF250F) — distributor ad (criterion a); model list taken from search summary',
                ],
            ],
        ],
        'honda/cg-110' => [
            'brand' => 'honda',
            'name' => 'CG 110',
            'slug' => 'cg-110',
            'category' => 'naked',
            'specs' => [],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Clasipar (aviso de DIESA S.A.)',
                    'url' => 'https://clasipar.paraguay.com/motor/motos/no-te-quedes-sin-tu-moto-honda-diesa-cg-110-cb1-125-navi-110-cb160-xr150-africa-1100-92967',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Clasipar ad by DIESA S.A. (lists CG 110, CB1 125, Navi 110, CB160, XR150, Africa, XR190, CB190R, Tornado 250, Grom, CB 500X, CB650R, NC750X, CRF1100, CRF250F) — distributor ad (criterion a); model list taken from search summary',
                ],
            ],
        ],
        'honda/crf-250f' => [
            'brand' => 'honda',
            'name' => 'CRF 250F',
            'slug' => 'crf-250f',
            'category' => 'enduro-cross',
            'specs' => [],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Clasipar (aviso de DIESA S.A.)',
                    'url' => 'https://clasipar.paraguay.com/motor/motos/no-te-quedes-sin-tu-moto-honda-diesa-cg-110-cb1-125-navi-110-cb160-xr150-africa-1100-92967',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Clasipar ad by DIESA S.A. (lists CG 110, CB1 125, Navi 110, CB160, XR150, Africa, XR190, CB190R, Tornado 250, Grom, CB 500X, CB650R, NC750X, CRF1100, CRF250F) — distributor ad (criterion a); model list taken from search summary',
                ],
            ],
        ],
        'honda/dio-110' => [
            'brand' => 'honda',
            'name' => 'DIO 110',
            'slug' => 'dio-110',
            'category' => 'scooter',
            'specs' => [
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Honda Motos Paraguay', 'url' => 'https://hondamotos.com.py/productos/DIO-110/51'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 10725000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Honda Motos Paraguay', 'url' => 'https://hondamotos.com.py/productos/DIO-110/51'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Honda Motos Paraguay',
                    'url' => 'https://hondamotos.com.py/productos/DIO-110/51',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Honda Paraguay DIO 110',
                ],
            ],
        ],
        'honda/navi-110' => [
            'brand' => 'honda',
            'name' => 'Navi 110',
            'slug' => 'navi-110',
            'category' => 'scooter',
            'specs' => [],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Clasipar (aviso de DIESA S.A.)',
                    'url' => 'https://clasipar.paraguay.com/motor/motos/no-te-quedes-sin-tu-moto-honda-diesa-cg-110-cb1-125-navi-110-cb160-xr150-africa-1100-92967',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Clasipar ad by DIESA S.A. (lists CG 110, CB1 125, Navi 110, CB160, XR150, Africa, XR190, CB190R, Tornado 250, Grom, CB 500X, CB650R, NC750X, CRF1100, CRF250F) — distributor ad (criterion a); model list taken from search summary',
                ],
            ],
        ],
        'honda/nx190' => [
            'brand' => 'honda',
            'name' => 'NX190',
            'slug' => 'nx190',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 184,
                    'source' => ['label' => 'Honda Motos Paraguay', 'url' => 'https://hondamotos.com.py/productos/NX190/58'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Honda Motos Paraguay', 'url' => 'https://hondamotos.com.py/productos/NX190/58'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Honda Motos Paraguay', 'url' => 'https://hondamotos.com.py/productos/NX190/58'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 L',
                    'source' => ['label' => 'Honda Motos Paraguay', 'url' => 'https://hondamotos.com.py/productos/NX190/58'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Monocilíndrico',
                    'source' => ['label' => 'Honda Motos Paraguay', 'url' => 'https://hondamotos.com.py/productos/NX190/58'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Inyección electrónica PGM-FI',
                    'source' => ['label' => 'Honda Motos Paraguay', 'url' => 'https://hondamotos.com.py/productos/NX190/58'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Honda Motos Paraguay',
                    'url' => 'https://hondamotos.com.py/productos/NX190/58',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Honda Paraguay NX190 — official Honda Paraguay (DIESA) page, seen in search results',
                ],
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/03/15/diesa-presento-las-nuevas-motos-honda-nx190-y-cb190r-20/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color — Paraguayan press naming model as launched by DIESA',
                ],
            ],
        ],
        'honda/nx500' => [
            'brand' => 'honda',
            'name' => 'NX500',
            'slug' => 'nx500',
            'category' => 'touring',
            'specs' => [
                'cc' => [
                    'value' => 471,
                    'source' => [
                        'label' => 'La Nación',
                        'url' => 'https://www.lanacion.com.py/negocios/2025/04/04/diesa-presento-las-nuevas-motocicletas-rebel-500-nx500-y-x-adv-750/',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/04/12/lanzan-honda-rebel-500-nx500-y-x-adv-750/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color: Lanzan Honda Rebel 500, NX500 y X-ADV 750 — Paraguayan press naming model as launched by DIESA',
                ],
                [
                    'label' => 'La Nación',
                    'url' => 'https://www.lanacion.com.py/negocios/2025/04/04/diesa-presento-las-nuevas-motocicletas-rebel-500-nx500-y-x-adv-750/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'La Nación — Paraguayan press naming model as launched by DIESA',
                ],
            ],
        ],
        'honda/rebel-500' => [
            'brand' => 'honda',
            'name' => 'Rebel 500',
            'slug' => 'rebel-500',
            'category' => 'custom-chopper',
            'specs' => [],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/04/12/lanzan-honda-rebel-500-nx500-y-x-adv-750/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color: Lanzan Honda Rebel 500, NX500 y X-ADV 750 — Paraguayan press naming model as launched by DIESA',
                ],
                [
                    'label' => 'La Nación',
                    'url' => 'https://www.lanacion.com.py/negocios/2025/04/04/diesa-presento-las-nuevas-motocicletas-rebel-500-nx500-y-x-adv-750/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'La Nación: Diesa presentó Rebel 500, NX500 y X-ADV 750 — Paraguayan press naming model as launched by DIESA',
                ],
            ],
        ],
        'honda/wave' => [
            'brand' => 'honda',
            'name' => 'Wave 110S',
            'slug' => 'wave',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 110,
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/honda-wave-110s/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Semiautomática 4 velocidades',
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/honda-wave-110s/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico y pedal',
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/honda-wave-110s/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/honda-wave-110s/',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 16150000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/honda-wave-110s/',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Honda Motos Paraguay',
                    'url' => 'https://hondamotos.com.py/productos/WAVE110S/29',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Honda Paraguay Wave 110S — official Honda Paraguay (DIESA) page, seen in search results',
                ],
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/honda-wave-110s/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos Wave 110S — retailer evidence',
                ],
            ],
        ],
        'honda/x-adv-750' => [
            'brand' => 'honda',
            'name' => 'X-ADV 750',
            'slug' => 'x-adv-750',
            'category' => 'scooter',
            'specs' => [
                'cc' => [
                    'value' => 745,
                    'source' => [
                        'label' => 'La Nación',
                        'url' => 'https://www.lanacion.com.py/negocios/2025/04/04/diesa-presento-las-nuevas-motocicletas-rebel-500-nx500-y-x-adv-750/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Automática DCT de doble embrague',
                    'source' => [
                        'label' => 'La Nación',
                        'url' => 'https://www.lanacion.com.py/negocios/2025/04/04/diesa-presento-las-nuevas-motocicletas-rebel-500-nx500-y-x-adv-750/',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/04/12/lanzan-honda-rebel-500-nx500-y-x-adv-750/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color: Lanzan Honda Rebel 500, NX500 y X-ADV 750 — Paraguayan press naming model as launched by DIESA',
                ],
                [
                    'label' => 'La Nación',
                    'url' => 'https://www.lanacion.com.py/negocios/2025/04/04/diesa-presento-las-nuevas-motocicletas-rebel-500-nx500-y-x-adv-750/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'La Nación — Paraguayan press naming model as launched by DIESA',
                ],
            ],
        ],
        'honda/xr-150' => [
            'brand' => 'honda',
            'name' => 'XR 150L',
            'slug' => 'xr-150',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/honda-xr150l/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 20267000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Honda Motos Paraguay', 'url' => 'https://hondamotos.com.py/productos/XR150L/13'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 21500000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/honda-xr150l/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Honda Motos Paraguay',
                    'url' => 'https://hondamotos.com.py/productos/XR150L/13',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Honda Paraguay XR150L — official Honda Paraguay (DIESA) page, seen in search results',
                ],
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/honda-xr150l/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos XR150L — retailer evidence',
                ],
            ],
        ],
        'honda/xr-190' => [
            'brand' => 'honda',
            'name' => 'XR 190L',
            'slug' => 'xr-190',
            'category' => 'enduro-cross',
            'specs' => [],
            'prices' => [
                [
                    'value' => 26500000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/honda-xr190l/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Honda Motos Paraguay',
                    'url' => 'https://hondamotos.com.py/productos/XR190L/12',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Honda Paraguay XR190L — official Honda Paraguay (DIESA) page, seen in search results',
                ],
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/honda-xr190l/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos XR190L — retailer evidence',
                ],
            ],
        ],
        'honda/xr-250-tornado' => [
            'brand' => 'honda',
            'name' => 'XR 250 Tornado',
            'slug' => 'xr-250-tornado',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 249,
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/xr-250-tornado/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '22.98 hp a 7500 rpm',
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/xr-250-tornado/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '23.73 Nm a 6000 rpm',
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/xr-250-tornado/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '6 velocidades',
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/xr-250-tornado/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/xr-250-tornado/',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 49300000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Classic Motos',
                        'url' => 'https://www.classicmotos.com.py/producto/xr-250-tornado/',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Honda Motos Paraguay',
                    'url' => 'https://hondamotos.com.py/productos/XR-250-TORNADO/10',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Honda Paraguay XR 250 Tornado — official Honda Paraguay (DIESA) page, seen in search results',
                ],
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/xr-250-tornado/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos XR 250 Tornado — retailer evidence',
                ],
            ],
        ],
        'honda/xr-650l' => [
            'brand' => 'honda',
            'name' => 'XR 650L',
            'slug' => 'xr-650l',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 644,
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xr-650l/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '44 HP',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xr-650l/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos SOHC',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xr-650l/'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire, cárter seco',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xr-650l/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/xr-650l/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos XR 650L — retailer evidence',
                ],
            ],
        ],
        'star/150-x' => [
            'brand' => 'star',
            'name' => '150-X',
            'slug' => '150-x',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-X-CKD/150-x'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11,56 HP / 8000 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-X-CKD/150-x'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 6800000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Alex S.A.', 'url' => 'https://www.alex.com.py/producto/258/150-x'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK150-X-CKD/150-x',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => '150-X — Official brand page star.com.py',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://www.alex.com.py/producto/258/150-x',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. 150-X — Distributor catalogue with Gs. price',
                ],
            ],
        ],
        'star/dax-110' => [
            'brand' => 'star',
            'name' => 'Dax 110',
            'slug' => 'dax-110',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 110,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK110-DAX-CKD/dax-110'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico / Pedal',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK110-DAX-CKD/dax-110'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK110-DAX-CKD/dax-110'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK110-DAX-CKD/dax-110'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '3,5 litros',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK110-DAX-CKD/dax-110'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '100 kg',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK110-DAX-CKD/dax-110'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '740 mm',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK110-DAX-CKD/dax-110'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 5400000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Alex S.A.', 'url' => 'https://www.alex.com.py/producto/252/dax-110cc'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK110-DAX-CKD/dax-110',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'DAX 110 — Official brand page star.com.py',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://www.alex.com.py/producto/252/dax-110cc',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. Dax 110 — Distributor catalogue with Gs. price',
                ],
            ],
        ],
        'star/dax-a-110' => [
            'brand' => 'star',
            'name' => 'Dax-A 110',
            'slug' => 'dax-a-110',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 110,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK110DAX-A-CKD/dax-a-110'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK110DAX-A-CKD/dax-a-110'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 5900000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Alex S.A.', 'url' => 'https://www.alex.com.py/producto/253/dax-a-110cc'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK110DAX-A-CKD/dax-a-110',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'DAX-A 110 — Official brand page star.com.py',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://www.alex.com.py/producto/253/dax-a-110cc',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. Dax-A 110 — Distributor catalogue with Gs. price',
                ],
            ],
        ],
        'star/fxz-150' => [
            'brand' => 'star',
            'name' => 'FXZ 150',
            'slug' => 'fxz-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-FXZ-CKD/fxz-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '12,78 HP / 8500 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-FXZ-CKD/fxz-150cc'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 9500000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Alex S.A.', 'url' => 'https://alex.com.py/producto/263/motocicleta-fxz-150cc'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK150-FXZ-CKD/fxz-150cc',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'FXZ 150 — Official brand page star.com.py',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://alex.com.py/producto/263/motocicleta-fxz-150cc',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. FXZ 150 — Distributor catalogue with Gs. price',
                ],
            ],
        ],
        'star/genius-125' => [
            'brand' => 'star',
            'name' => 'Genius 125',
            'slug' => 'genius-125',
            'category' => 'scooter',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125GENIUS-CKD/genius-125'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '7,3 HP / 7500 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125GENIUS-CKD/genius-125'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125GENIUS-CKD/genius-125'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125GENIUS-CKD/genius-125'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '4 litros',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125GENIUS-CKD/genius-125'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 6600000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Alex S.A.', 'url' => 'https://www.alex.com.py/producto/254/genius-125cc'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK125GENIUS-CKD/genius-125',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'GENIUS 125 — Official brand page star.com.py',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://www.alex.com.py/producto/254/genius-125cc',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. Genius 125 — Distributor catalogue with Gs. price',
                ],
            ],
        ],
        'star/magic-125' => [
            'brand' => 'star',
            'name' => 'Magic 125',
            'slug' => 'magic-125',
            'category' => 'scooter',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125-MAGIC-CKD/magic-125'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '7,3 HP / 7500 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125-MAGIC-CKD/magic-125'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125-MAGIC-CKD/magic-125'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125-MAGIC-CKD/magic-125'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '4 litros',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125-MAGIC-CKD/magic-125'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 6900000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Alex S.A.', 'url' => 'https://www.alex.com.py/producto/255/magic-125'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK125-MAGIC-CKD/magic-125',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'MAGIC 125 — Official brand page star.com.py',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://www.alex.com.py/producto/255/magic-125',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. Magic 125 — Distributor catalogue with Gs. price',
                ],
            ],
        ],
        'star/new-desert-150' => [
            'brand' => 'star',
            'name' => 'New Desert 150',
            'slug' => 'new-desert-150',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150BR-NEW-CKD/new-desert-150'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11 HP / 8500 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150BR-NEW-CKD/new-desert-150'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 8500000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Alex S.A.', 'url' => 'https://www.alex.com.py/producto/264/new-desert-150cc'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK150BR-NEW-CKD/new-desert-150',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'NEW DESERT 150 — Official brand page star.com.py',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://www.alex.com.py/producto/264/new-desert-150cc',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. New Desert 150 — Distributor catalogue with Gs. price',
                ],
            ],
        ],
        'star/nt-a-150' => [
            'brand' => 'star',
            'name' => 'NT-A 150',
            'slug' => 'nt-a-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150NT-A-CKD/nt-a-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11 HP / 8500 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150NT-A-CKD/nt-a-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150NT-A-CKD/nt-a-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150NT-A-CKD/nt-a-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '14 litros',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150NT-A-CKD/nt-a-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '2.75×18',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150NT-A-CKD/nt-a-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '90/90×18',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150NT-A-CKD/nt-a-150cc'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK150NT-A-CKD/nt-a-150cc',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'NT-A 150cc — Official brand page star.com.py',
                ],
            ],
        ],
        'star/rx4-150' => [
            'brand' => 'star',
            'name' => 'RX4 150',
            'slug' => 'rx4-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-RX4-CKD/rx4-150'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11 HP',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-RX4-CKD/rx4-150'],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '9.8 Nm',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-RX4-CKD/rx4-150'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-RX4-CKD/rx4-150'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-RX4-CKD/rx4-150'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '15 litros',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-RX4-CKD/rx4-150'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '2.75x18',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-RX4-CKD/rx4-150'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '3.00 x18',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-RX4-CKD/rx4-150'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK150-RX4-CKD/rx4-150',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'RX4 150 — Official brand page star.com.py',
                ],
            ],
        ],
        'star/smx-150' => [
            'brand' => 'star',
            'name' => 'SMX 150',
            'slug' => 'smx-150',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11 HP / 8500 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual 5 velocidades',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico / Pedal',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 litros',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '110 kg',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos, monocilíndrico, refrigerado por aire, 2 válvulas',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '90/90-19',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '110/90-17',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SMX150-CKD/smx-150cc',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'SMX 150cc — Official brand page star.com.py',
                ],
            ],
        ],
        'star/star-125' => [
            'brand' => 'star',
            'name' => 'Star 125',
            'slug' => 'star-125',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125-5-CKD/star-125'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '10,34 HP / 8000 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125-5-CKD/star-125'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125-5-CKD/star-125'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125-5-CKD/star-125'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '11 litros',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK125-5-CKD/star-125'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 5650000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Alex S.A.', 'url' => 'https://www.alex.com.py/producto/256/star-125'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK125-5-CKD/star-125',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'STAR 125 — Official brand page star.com.py',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://www.alex.com.py/producto/256/star-125',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. Star 125 — Distributor catalogue with Gs. price',
                ],
            ],
        ],
        'star/star-150' => [
            'brand' => 'star',
            'name' => 'Star 150',
            'slug' => 'star-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-CG-CKD/star-150'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11,56 HP / 8000 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-CG-CKD/star-150'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-CG-CKD/star-150'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-CG-CKD/star-150'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '11 litros',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-CG-CKD/star-150'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '110 kg',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-CG-CKD/star-150'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos, monocilíndrico',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-CG-CKD/star-150'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '760 mm',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150-CG-CKD/star-150'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 5800000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Alex S.A.', 'url' => 'https://www.alex.com.py/producto/257/star-150'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK150-CG-CKD/star-150',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'STAR 150 — Official brand page star.com.py',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://www.alex.com.py/producto/257/star-150',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. Star 150 — Distributor catalogue with Gs. price',
                ],
            ],
        ],
        'star/super-carga-200' => [
            'brand' => 'star',
            'name' => 'Super Carga 200',
            'slug' => 'super-carga-200',
            'category' => 'motocarro-carga',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => [
                        'label' => 'Star',
                        'url' => 'https://star.com.py/producto/SKCARGA200-CKD/motocarga-200cc-super-carga',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '14 HP / 7500 RPM',
                    'source' => [
                        'label' => 'Star',
                        'url' => 'https://star.com.py/producto/SKCARGA200-CKD/motocarga-200cc-super-carga',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico/pedal',
                    'source' => [
                        'label' => 'Star',
                        'url' => 'https://star.com.py/producto/SKCARGA200-CKD/motocarga-200cc-super-carga',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos/monocilíndrico/transmisión por eje/refrigerado por aire',
                    'source' => [
                        'label' => 'Star',
                        'url' => 'https://star.com.py/producto/SKCARGA200-CKD/motocarga-200cc-super-carga',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => ['Sin cabina', 'Con cabina'],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SKCARGA200-CKD/motocarga-200cc-super-carga',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'MOTOCARGA 200cc SUPER CARGA — Official brand page star.com.py',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://www.alex.com.py/producto/240/motocarga',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. Motocarga — distributor',
                ],
            ],
        ],
        'star/tr-5-150' => [
            'brand' => 'star',
            'name' => 'TR-5 150',
            'slug' => 'tr-5-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150GY-5-CKD/tr-5-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '12,51 HP / 8500 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150GY-5-CKD/tr-5-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 litros',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/SK150GY-5-CKD/tr-5-150cc'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/SK150GY-5-CKD/tr-5-150cc',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'TR-5 150cc — Official brand page star.com.py',
                ],
            ],
        ],
        'star/xpro-150' => [
            'brand' => 'star',
            'name' => 'XPro 150',
            'slug' => 'xpro-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/XPRO150-R-CKD/xpro-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11,56 HP / 8000 RPM',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/XPRO150-R-CKD/xpro-150cc'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '14 litros',
                    'source' => ['label' => 'Star', 'url' => 'https://star.com.py/producto/XPRO150-R-CKD/xpro-150cc'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/XPRO150-R-CKD/xpro-150cc',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'XPRO 150 — Official brand page star.com.py',
                ],
            ],
        ],
        'star/xvr-200' => [
            'brand' => 'star',
            'name' => 'XVR 200',
            'slug' => 'xvr-200',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/star-xvr200/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '13.7 HP / 8000 RPM',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/star-xvr200/'],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '13.8 Nm / 6500 RPM',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/star-xvr200/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual 5 velocidades',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/star-xvr200/'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico / pedal',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/star-xvr200/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos monocilíndrico, varilla',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/star-xvr200/'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/star-xvr200/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Star',
                    'url' => 'https://star.com.py/producto/XVR200-CKD/xvr-200',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Star XVR 200 (star.com.py) — official brand page, listed in result',
                ],
                [
                    'label' => 'Alex S.A.',
                    'url' => 'https://alex.com.py/producto/2217/xvr-200',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Alex S.A. XVR 200 — official distributor',
                ],
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/star-xvr200/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos Star XVR200 — retailer spec source',
                ],
            ],
        ],
        'yamaha/crypton' => [
            'brand' => 'yamaha',
            'name' => 'Crypton',
            'slug' => 'crypton',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 110,
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/moto/yamaha.html?cilindrada=110+CC&modelo=CRYPTON',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Semiautomatica',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/moto-yamaha-t110c-crypton-negro.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Monocilindrico, 4 tiempos, 2 valvulas, SOHC',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/moto-yamaha-t110c-crypton-negro.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/moto-yamaha-t110c-crypton-negro.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/moto-yamaha-t110c-crypton-negro.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '70/90 R17',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/moto-yamaha-t110c-crypton-negro.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 13990000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/moto-yamaha-t110c-crypton-negro.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['T110C Crypton'],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/moto-yamaha-t110c-crypton-negro.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Moto Yamaha T110C Crypton Negro — Distributor (Chacomer) product page',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-cub-yamaha-crypton.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Motocicleta Cub Yamaha Crypton — Distributor (Chacomer) product page',
                ],
            ],
        ],
        'yamaha/fz-25' => [
            'brand' => 'yamaha',
            'name' => 'FZ-25',
            'slug' => 'fz-25',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 249,
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-sport-yamaha-fz-25-abs.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos SOHC',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-sport-yamaha-fz-25-abs.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire y aceite',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-sport-yamaha-fz-25-abs.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Inyección electrónica de combustible',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-sport-yamaha-fz-25-abs.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-sport-yamaha-fz-25-abs.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer FZ-25 ABS — retailer/distributor page',
                ],
                [
                    'label' => 'Yamaha Paraguay',
                    'url' => 'https://yamaha.com.py/motos/?orderby=price-desc&product_count=36',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Yamaha Paraguay - Motos — Brand PY site',
                ],
            ],
        ],
        'yamaha/mt-03' => [
            'brand' => 'yamaha',
            'name' => 'MT-03',
            'slug' => 'mt-03',
            'category' => 'naked',
            'years' => '2026 (new generation launched Dec 2025)',
            'specs' => [
                'cc' => [
                    'value' => 321,
                    'source' => [
                        'label' => 'Obedira',
                        'url' => 'https://www.obedira.com.py/chacomer-presenta-la-nueva-yamaha-mt-03/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '41.4 HP a 10,750 RPM',
                    'source' => [
                        'label' => 'Obedira',
                        'url' => 'https://www.obedira.com.py/chacomer-presenta-la-nueva-yamaha-mt-03/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '29.66 NM a 9,000 RPM',
                    'source' => [
                        'label' => 'Obedira',
                        'url' => 'https://www.obedira.com.py/chacomer-presenta-la-nueva-yamaha-mt-03/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual 6 velocidades',
                    'source' => [
                        'label' => 'Obedira',
                        'url' => 'https://www.obedira.com.py/chacomer-presenta-la-nueva-yamaha-mt-03/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => [
                        'label' => 'Obedira',
                        'url' => 'https://www.obedira.com.py/chacomer-presenta-la-nueva-yamaha-mt-03/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '14 L',
                    'source' => [
                        'label' => 'Obedira',
                        'url' => 'https://www.obedira.com.py/chacomer-presenta-la-nueva-yamaha-mt-03/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos DOHC bicilindrico, 4 valvulas',
                    'source' => [
                        'label' => 'Obedira',
                        'url' => 'https://www.obedira.com.py/chacomer-presenta-la-nueva-yamaha-mt-03/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Liquida',
                    'source' => [
                        'label' => 'Obedira',
                        'url' => 'https://www.obedira.com.py/chacomer-presenta-la-nueva-yamaha-mt-03/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Inyeccion',
                    'source' => [
                        'label' => 'Obedira',
                        'url' => 'https://www.obedira.com.py/chacomer-presenta-la-nueva-yamaha-mt-03/',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 7900,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/5901387an-moto-yamaha-mt-03-abs-negro.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['MT-03 ABS'],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-sport-yamaha-mt-03.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Motocicleta Sport Yamaha MT-03 — Distributor (Chacomer) product page',
                ],
                [
                    'label' => 'Obedira',
                    'url' => 'https://www.obedira.com.py/chacomer-presenta-la-nueva-yamaha-mt-03/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Obedira - Chacomer presenta la Nueva Yamaha MT-03 — Paraguayan press',
                ],
                [
                    'label' => 'InfoNegocios',
                    'url' => 'https://infonegocios.com.py/conosur/nueva-yamaha-mt-03-en-paraguay-destacan-su-diseno-agresivo-e-innovaciones-tecnologicas',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Infonegocios - Nueva Yamaha MT-03 en Paraguay — Paraguayan press',
                ],
            ],
        ],
        'yamaha/mt-07' => [
            'brand' => 'yamaha',
            'name' => 'MT-07',
            'slug' => 'mt-07',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 689,
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://www.yamaha-motor.com.py/producto/23/mt-07',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '73.7 Hp (55.0 kW) a 9000 rpm',
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://www.yamaha-motor.com.py/producto/23/mt-07',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '68.0 Nm (6.9 kgf.m) a 6500 rpm',
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://www.yamaha-motor.com.py/producto/23/mt-07',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Toma constante, 6 velocidades',
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://www.yamaha-motor.com.py/producto/23/mt-07',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://www.yamaha-motor.com.py/producto/23/mt-07',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Inyección de combustible',
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://www.yamaha-motor.com.py/producto/23/mt-07',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 11870,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => ['label' => 'Chacomer', 'url' => 'https://www.chacomer.com.py/moto-yamaha-mt-07-abs-azul.html'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 11627,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => ['label' => 'Chacomer', 'url' => 'https://www.chacomer.com.py/moto-yamaha-mt-07-abs-plata.html'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 11900,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Yamaha Paraguay',
                        'url' => 'https://yamaha.com.py/motos/?orderby=price-desc&product_count=36',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['MT-07 ABS'],
            'sources' => [
                [
                    'label' => 'Yamaha Motor Paraguay',
                    'url' => 'http://www.yamaha-motor.com.py/producto/23/mt-07',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Yamaha Motor Paraguay MT-07 — distributor brand site',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-sport-yamaha-mt-07-abs.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Motocicleta Sport Yamaha MT-07 ABS — Distributor (Chacomer) product page',
                ],
                [
                    'label' => 'Yamaha Paraguay',
                    'url' => 'https://yamaha.com.py/motos/?orderby=price-desc&product_count=36',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Yamaha Paraguay - Motos — Brand PY site',
                ],
            ],
        ],
        'yamaha/mt-09' => [
            'brand' => 'yamaha',
            'name' => 'MT-09',
            'slug' => 'mt-09',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 847,
                    'source' => ['label' => 'Yamaha Motor Paraguay', 'url' => 'http://yamaha-motor.com.py/producto/15/mt-09'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '84,6 kW (115PS) @ 10.000 rpm',
                    'source' => ['label' => 'Yamaha Motor Paraguay', 'url' => 'http://yamaha-motor.com.py/producto/15/mt-09'],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '87,5 Nm (8,9 kg-m) @ 8.500 rpm',
                    'source' => ['label' => 'Yamaha Motor Paraguay', 'url' => 'http://yamaha-motor.com.py/producto/15/mt-09'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '6 velocidades',
                    'source' => ['label' => 'Yamaha Motor Paraguay', 'url' => 'http://yamaha-motor.com.py/producto/15/mt-09'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Yamaha Motor Paraguay', 'url' => 'http://yamaha-motor.com.py/producto/15/mt-09'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Inyección de combustible',
                    'source' => ['label' => 'Yamaha Motor Paraguay', 'url' => 'http://yamaha-motor.com.py/producto/15/mt-09'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 14900,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/moto/moto-yamaha-mt-09-abs-negro.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['MT-09 ABS'],
            'sources' => [
                [
                    'label' => 'Yamaha Motor Paraguay',
                    'url' => 'http://yamaha-motor.com.py/producto/15/mt-09',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Yamaha Motor Paraguay MT-09 — distributor brand site',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/moto/moto-yamaha-mt-09-abs-negro.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Moto Yamaha MT-09 ABS Negro — Distributor (Chacomer) product page',
                ],
            ],
        ],
        'yamaha/tenere-700' => [
            'brand' => 'yamaha',
            'name' => 'Ténéré 700',
            'slug' => 'tenere-700',
            'category' => 'touring',
            'specs' => [],
            'prices' => [
                [
                    'value' => 16300,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-yamaha-xtz690-tenere-700-blanco.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 16300,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-yamaha-xtz690-tenere-700-azul.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['XTZ690 Tenere 700'],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-yamaha-xtz690-tenere-700-blanco.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Ténéré 700 — retailer/distributor page',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-yamaha-xtz690-tenere-700-azul.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Yamaha XTZ690 (Tenere 700) Azul — Distributor (Chacomer) product page',
                ],
            ],
        ],
        'yamaha/xtz-125' => [
            'brand' => 'yamaha',
            'name' => 'XTZ 125',
            'slug' => 'xtz-125',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 123,
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 velocidades',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '10,6 L',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '114 kg',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Monocilíndrico, 4T, SOHC',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 21210000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz125.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer XTZ125 — retailer/distributor page',
                ],
            ],
        ],
        'yamaha/xtz-150' => [
            'brand' => 'yamaha',
            'name' => 'XTZ 150',
            'slug' => 'xtz-150',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 149,
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xtz-150/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '12.3 Hp a 7500 rpm',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xtz-150/'],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '13.1 Nm a 6000 rpm',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xtz-150/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 L',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xtz-150/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '131 kg',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xtz-150/'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xtz-150/'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Inyección electrónica',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xtz-150/'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '835 mm',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/xtz-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 25000000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz150.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 25000000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz150.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-trail-yamaha-xtz150.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer XTZ150 — retailer/official distributor page',
                ],
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/xtz-150/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos XTZ 150 — retailer specs',
                ],
                [
                    'label' => 'Yamaha Motor Paraguay',
                    'url' => 'http://yamaha-motor.com.py/producto/51/xtz-150',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Yamaha Motor Paraguay - xtz-150 — Brand PY site; result listed but specs in summary not attributable to it, so dropped',
                ],
            ],
        ],
        'yamaha/xtz-250' => [
            'brand' => 'yamaha',
            'name' => 'XTZ 250',
            'slug' => 'xtz-250',
            'category' => 'enduro-cross',
            'specs' => [],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-enduro-yamaha-xtz-250.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Motocicleta Enduro Yamaha XTZ 250 — Distributor (Chacomer) product page',
                ],
                [
                    'label' => 'Yamaha Motor Paraguay',
                    'url' => 'http://yamaha-motor.com.py/producto/34/xtz-250',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Yamaha Motor Paraguay - xtz-250 — Brand PY site page exists',
                ],
            ],
        ],
        'yamaha/ybr-125e' => [
            'brand' => 'yamaha',
            'name' => 'YBR125E',
            'slug' => 'ybr-125e',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 124,
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://yamaha-motor.com.py/producto/52/ybr-125-e',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '9.5 Hp a 7800 rpm',
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://yamaha-motor.com.py/producto/52/ybr-125-e',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '10.1 Nm a 6000 rpm',
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://yamaha-motor.com.py/producto/52/ybr-125-e',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 velocidades, toma constante',
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://yamaha-motor.com.py/producto/52/ybr-125-e',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 L',
                    'source' => [
                        'label' => 'Yamaha Motor Paraguay',
                        'url' => 'http://yamaha-motor.com.py/producto/52/ybr-125-e',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Yamaha Motor Paraguay',
                    'url' => 'http://yamaha-motor.com.py/producto/52/ybr-125-e',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Yamaha Motor Paraguay YBR 125 E — distributor brand site',
                ],
            ],
        ],
        'yamaha/ybr-125z' => [
            'brand' => 'yamaha',
            'name' => 'YBR 125Z',
            'slug' => 'ybr-125z',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 123,
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '10.7 bHP',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Mecanica',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco 130 mm',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Disco 130 mm',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '14 L',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Monocilindrico, 4 tiempos, 2 valvulas, SOHC',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 16800000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-ybr125z.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Motocicleta Utilitaria Yamaha YBR125Z — Distributor (Chacomer) product page',
                ],
                [
                    'label' => 'Yamaha Motor Paraguay',
                    'url' => 'http://yamaha-motor.com.py/producto/4/ybr-125-z',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Yamaha Motor Paraguay - ybr-125-z — Brand PY site',
                ],
            ],
        ],
        'yamaha/yc-z-110' => [
            'brand' => 'yamaha',
            'name' => 'YC-Z 110',
            'slug' => 'yc-z-110',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 110,
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-yc-z-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '7.3 HP',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-yc-z-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Mecanica',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-yc-z-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '7.2 L',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-yc-z-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-yc-z-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-yc-z-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 11500000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-yc-z-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-yamaha-yc-z-110.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Motocicleta Utilitaria Yamaha YC-Z 110 — Distributor (Chacomer) product page',
                ],
            ],
        ],
        'suzuki/dr-650' => [
            'brand' => 'suzuki',
            'name' => 'DR 650',
            'slug' => 'dr-650',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 644,
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/dr650'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '43 HP',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/dr650'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 velocidades',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/dr650'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/dr650'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 L',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/dr650'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '166 kg',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/dr650'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Monocilindrico 4 tiempos SOHC',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/dr650'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire y aceite',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/dr650'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/dr650'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 8990,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/dr650'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Suzuki Motos Paraguay',
                    'url' => 'https://suzukimotos.com.py/modelo/dr650',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'suzukimotos.com.py DR650 — Brand PY site',
                ],
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/01/14/suzuki-motos-regresa-a-paraguay-con-chacomer/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color - Suzuki Motos regresa a Paraguay con Chacomer — Paraguayan press naming model as launch lineup',
                ],
                [
                    'label' => 'Última Hora',
                    'url' => 'https://www.ultimahora.com/motos-suzuki-llegan-a-paraguay-con-variados-modelos',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Ultima Hora - Motos Suzuki llegan a Paraguay con variados modelos — Paraguayan press',
                ],
            ],
        ],
        'suzuki/gixxer-150' => [
            'brand' => 'suzuki',
            'name' => 'Gixxer 150',
            'slug' => 'gixxer-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 155,
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-150'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 velocidades',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-150'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico y pedal',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-150'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 L',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-150'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-150'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Inyeccion',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-150'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 17899000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-150'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Suzuki Motos Paraguay',
                    'url' => 'https://suzukimotos.com.py/modelo/gixxer-150',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'suzukimotos.com.py GIXXER 150 — Brand PY site',
                ],
                [
                    'label' => 'Suzuki Paraguay',
                    'url' => 'https://www.suzuki.com.py/moto/gixxer-dxa-150/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'suzuki.com.py Gixxer DXA 150 — Brand PY site',
                ],
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/01/14/suzuki-motos-regresa-a-paraguay-con-chacomer/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color - Suzuki Motos regresa a Paraguay con Chacomer — Paraguayan press naming model as launch lineup',
                ],
                [
                    'label' => 'Última Hora',
                    'url' => 'https://www.ultimahora.com/motos-suzuki-llegan-a-paraguay-con-variados-modelos',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Ultima Hora - Motos Suzuki llegan a Paraguay con variados modelos — Paraguayan press',
                ],
            ],
        ],
        'suzuki/gixxer-250' => [
            'brand' => 'suzuki',
            'name' => 'Gixxer 250',
            'slug' => 'gixxer-250',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 249,
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-250'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '6 velocidades',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-250'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-250'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 L',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-250'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aceite',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-250'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Inyeccion electronica',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-250'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 27170000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/gixxer-250'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Suzuki Motos Paraguay',
                    'url' => 'https://suzukimotos.com.py/modelo/gixxer-250',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'suzukimotos.com.py GIXXER 250 — Brand PY site',
                ],
            ],
        ],
        'suzuki/v-strom-1050' => [
            'brand' => 'suzuki',
            'name' => 'V-Strom 1050',
            'slug' => 'v-strom-1050',
            'category' => 'touring',
            'specs' => [
                'cc' => [
                    'value' => 1037,
                    'source' => [
                        'label' => 'Suzuki Motos Paraguay',
                        'url' => 'https://suzukimotos.com.py/modelo/v-strom-1-050de',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos, 2 cilindros en V a 90°, DOHC',
                    'source' => [
                        'label' => 'Suzuki Motos Paraguay',
                        'url' => 'https://suzukimotos.com.py/modelo/v-strom-1-050de',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 16990,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Suzuki Motos Paraguay',
                        'url' => 'https://suzukimotos.com.py/modelo/v-strom-1-050de',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['V-Strom 1050DE'],
            'sources' => [
                [
                    'label' => 'Suzuki Motos Paraguay',
                    'url' => 'https://suzukimotos.com.py/modelo/v-strom-1-050de',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Suzuki Motos Chacomer - V-Strom 1050 — distributor brand site',
                ],
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/01/14/suzuki-motos-regresa-a-paraguay-con-chacomer/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color - Suzuki Motos regresa a Paraguay con Chacomer — Paraguayan press naming model as launch lineup',
                ],
                [
                    'label' => 'Última Hora',
                    'url' => 'https://www.ultimahora.com/motos-suzuki-llegan-a-paraguay-con-variados-modelos',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Ultima Hora - Motos Suzuki llegan a Paraguay con variados modelos — Paraguayan press',
                ],
            ],
        ],
        'suzuki/v-strom-250' => [
            'brand' => 'suzuki',
            'name' => 'V-Strom 250',
            'slug' => 'v-strom-250',
            'category' => 'touring',
            'specs' => [
                'cc' => [
                    'value' => 249,
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-250sx'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-250sx'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 L',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-250sx'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '167 kg',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-250sx'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '835 mm',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-250sx'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 4990,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-250sx'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['V-Strom 250SX'],
            'sources' => [
                [
                    'label' => 'Suzuki Motos Paraguay',
                    'url' => 'https://suzukimotos.com.py/modelo/v-strom-250sx',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'suzukimotos.com.py V-STROM 250SX — Brand PY site',
                ],
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/01/14/suzuki-motos-regresa-a-paraguay-con-chacomer/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color - Suzuki Motos regresa a Paraguay con Chacomer — Paraguayan press naming model as launch lineup',
                ],
                [
                    'label' => 'Última Hora',
                    'url' => 'https://www.ultimahora.com/motos-suzuki-llegan-a-paraguay-con-variados-modelos',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Ultima Hora - Motos Suzuki llegan a Paraguay con variados modelos — Paraguayan press',
                ],
            ],
        ],
        'suzuki/v-strom-650' => [
            'brand' => 'suzuki',
            'name' => 'V-Strom 650',
            'slug' => 'v-strom-650',
            'category' => 'touring',
            'specs' => [
                'cc' => [
                    'value' => 645,
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-650xt'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '20 L',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-650xt'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos, 2 cilindros en V a 90°, DOHC',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-650xt'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 10990,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-650xt'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['V-Strom 650XT'],
            'sources' => [
                [
                    'label' => 'Suzuki Motos Paraguay',
                    'url' => 'https://suzukimotos.com.py/modelo/v-strom-650xt',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Suzuki Motos Chacomer - V-Strom 650 — distributor brand site',
                ],
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/01/14/suzuki-motos-regresa-a-paraguay-con-chacomer/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color - Suzuki Motos regresa a Paraguay con Chacomer — Paraguayan press naming model as launch lineup',
                ],
                [
                    'label' => 'Última Hora',
                    'url' => 'https://www.ultimahora.com/motos-suzuki-llegan-a-paraguay-con-variados-modelos',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Ultima Hora - Motos Suzuki llegan a Paraguay con variados modelos — Paraguayan press',
                ],
            ],
        ],
        'suzuki/v-strom-800' => [
            'brand' => 'suzuki',
            'name' => 'V-Strom 800',
            'slug' => 'v-strom-800',
            'category' => 'touring',
            'specs' => [
                'cc' => [
                    'value' => 776,
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-800de'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 13990,
                    'currency' => 'USD',
                    'condition' => '0km',
                    'source' => ['label' => 'Suzuki Motos Paraguay', 'url' => 'https://suzukimotos.com.py/modelo/v-strom-800de'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['V-Strom 800DE'],
            'sources' => [
                [
                    'label' => 'Suzuki Motos Paraguay',
                    'url' => 'https://suzukimotos.com.py/modelo/v-strom-800de',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Suzuki Motos Chacomer - V-Strom 800 — distributor brand site',
                ],
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2025/01/14/suzuki-motos-regresa-a-paraguay-con-chacomer/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color - Suzuki Motos regresa a Paraguay con Chacomer — Paraguayan press naming model as launch lineup',
                ],
                [
                    'label' => 'Última Hora',
                    'url' => 'https://www.ultimahora.com/motos-suzuki-llegan-a-paraguay-con-variados-modelos',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Ultima Hora - Motos Suzuki llegan a Paraguay con variados modelos — Paraguayan press',
                ],
            ],
        ],
        'bajaj/boxer-150' => [
            'brand' => 'bajaj',
            'name' => 'Boxer 150',
            'slug' => 'boxer-150',
            'category' => 'naked',
            'specs' => [
                'motor' => [
                    'value' => '144,8 cc',
                    'source' => [
                        'label' => 'Tupi',
                        'url' => 'https://cde.tupi.com.py/producto/MKP096380/MOTO-BAJAJ-BOXER-150-COLOR-ROJO-',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 7489000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Tupi',
                        'url' => 'https://www.tupi.com.py/producto/MKP096379/MOTO-BAJAJ-BOXER-150-COLOR-NEGRO-Y-GRIS-',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'La Nación',
                    'url' => 'https://www.lanacion.com.py/negocios_edicion_impresa/2019/06/15/moto-boxer-150-ya-esta-disponible-en-el-mercado/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'La Nación - Moto Boxer 150 ya está disponible en el mercado — Official distributor AMS; colours red/blue/white/black; warranty 20,000 km / 12 months. Price is 2019-era, cuota from Gs. 299.000 not a price.',
                ],
                [
                    'label' => 'InfoNegocios',
                    'url' => 'https://infonegocios.com.py/infomotor/este-ano-ams-apunta-a-vender-1-000-unidades-de-la-boxer-150-su-modelo-mas-rentable',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Infonegocios - AMS apunta a vender 1.000 Boxer 150',
                ],
                [
                    'label' => 'Tupi',
                    'url' => 'https://www.tupi.com.py/producto/MKP096379/MOTO-BAJAJ-BOXER-150-COLOR-NEGRO-Y-GRIS-',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Tupi Boxer 150 negro y gris — retailer page; promo price Gs. 7.311.000 also shown',
                ],
                [
                    'label' => 'Tupi',
                    'url' => 'https://cde.tupi.com.py/producto/MKP096380/MOTO-BAJAJ-BOXER-150-COLOR-ROJO-',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Tupi Boxer 150 rojo — retailer page',
                ],
            ],
        ],
        'bajaj/dominar-400' => [
            'brand' => 'bajaj',
            'name' => 'Dominar 400',
            'slug' => 'dominar-400',
            'category' => 'touring',
            'specs' => [],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'La Nación',
                    'url' => 'https://www.lanacion.com.py/negocios_edicion_impresa/2019/01/12/bajaj-llego-al-paraguay-y-busca-ser-lider-en-el-segmento-de-motos/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'La Nación - Bajaj llegó al Paraguay — Dominar named as launch model; US$ 4.575 historical launch price.',
                ],
                [
                    'label' => 'InfoNegocios',
                    'url' => 'https://infonegocios.com.py/infomotor/bajaj-espera-obtener-el-30-del-mercado-paraguayo',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Infonegocios - Bajaj espera obtener el 30% del mercado paraguayo — press; 2019 launch price US$ 4.575 mentioned in search summary, not current so not recorded as price',
                ],
            ],
        ],
        'bajaj/rouser-ns-200' => [
            'brand' => 'bajaj',
            'name' => 'Rouser NS 200',
            'slug' => 'rouser-ns-200',
            'category' => 'naked',
            'specs' => [],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'La Nación',
                    'url' => 'https://www.lanacion.com.py/negocios_edicion_impresa/2019/01/12/bajaj-llego-al-paraguay-y-busca-ser-lider-en-el-segmento-de-motos/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'La Nación - Bajaj llegó al Paraguay — Launch models: Dominar, Rouser NS 200, Boxer. Price US$ 2,999 is 2019 launch, likely stale.',
                ],
                [
                    'label' => 'Diario HOY',
                    'url' => 'https://www.hoy.com.py/negocios/bajaj-presento-oficialmente-su-primera-linea-de-motos-en-paraguay',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Diario HOY - Bajaj presentó oficialmente su primera línea de motos en Paraguay — press naming Rouser 200 among initial AMS models (price/specs not shown)',
                ],
            ],
        ],
        'tvs/apache-rtr-160-2v' => [
            'brand' => 'tvs',
            'name' => 'Apache RTR 160 2V',
            'slug' => 'apache-rtr-160-2v',
            'category' => 'naked',
            'specs' => [],
            'prices' => [
                [
                    'value' => 14111000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/catalog/category/view/s/tvs/id/760/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 14111000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-apache-rtr-160-2v.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/catalog/category/view/s/tvs/id/760/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - TVS moto category — Chacomer is TVS distributor. Category judgement (no PY description retrieved).',
                ],
                [
                    'label' => 'TVS Motor Paraguay',
                    'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/apache-rtr-160-2v-refresh-py',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'TVS Motor Paraguay - Apache RTR 160 2V Refresh',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-apache-rtr-160-2v.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Apache RTR 160 2V — retailer/distributor page',
                ],
            ],
        ],
        'tvs/hlx-150' => [
            'brand' => 'tvs',
            'name' => 'HLX 150',
            'slug' => 'hlx-150',
            'category' => 'naked',
            'specs' => [],
            'prices' => [
                [
                    'value' => 9402000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/catalog/category/view/s/tvs/id/760/',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/catalog/category/view/s/tvs/id/760/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - TVS moto category — Chacomer is TVS distributor. Sold as \'rutera\'.',
                ],
            ],
        ],
        'tvs/hlx-150-f' => [
            'brand' => 'tvs',
            'name' => 'HLX 150 F',
            'slug' => 'hlx-150-f',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 148,
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-hlx-150-f.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 velocidades',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-hlx-150-f.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 10077000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-hlx-150-f.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-hlx-150-f.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Motocicleta rutera TVS HLX 150 F — Chacomer is TVS distributor. Titled \'rutera\'.',
                ],
            ],
        ],
        'tvs/neo-nx-110' => [
            'brand' => 'tvs',
            'name' => 'Neo NX 110',
            'slug' => 'neo-nx-110',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 110,
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-cub-motoneta-tvs-neo-nx-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '8.44 Hp',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-cub-motoneta-tvs-neo-nx-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '8,5 Nm',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-cub-motoneta-tvs-neo-nx-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 7555000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-cub-motoneta-tvs-neo-nx-110.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-cub-motoneta-tvs-neo-nx-110.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Motocicleta cub/motoneta TVS Neo NX 110 — Chacomer is TVS distributor. Titled \'cub/motoneta\'.',
                ],
                [
                    'label' => 'Tupi',
                    'url' => 'https://www.tupi.com.py/producto/MKP052189/MOTO-TVS-NEO-NX-110-NEGRO-',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Tupi - Moto TVS Neo NX 110 Negro',
                ],
                [
                    'label' => 'TVS Motor Paraguay',
                    'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/neo-nx-py',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'TVS Motor Paraguay Neo NX — brand page',
                ],
            ],
        ],
        'tvs/raider-125' => [
            'brand' => 'tvs',
            'name' => 'Raider 125',
            'slug' => 'raider-125',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-raider-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '12.73 HP',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-raider-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Mecánico 5 velocidades',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-raider-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco 240 mm, pinza flotante 2 émbolos',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-raider-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor 130 SYNCRO SBT',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-raider-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '10 L',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-raider-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-raider-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '781 mm',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-raider-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 12375000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Tupi',
                        'url' => 'https://www.tupi.com.py/producto/MKP051982/MOTO-TVS-RAIDER-125-AZUL-',
                    ],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 12484968,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-raider-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['Azul', 'Negro', 'Amarillo'],
            'sources' => [
                [
                    'label' => 'TVS Motor Paraguay',
                    'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/tvs-raider-py',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'TVS Motor Paraguay - Raider 125',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-raider-125.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - Motocicleta rutera TVS Raider 125 — Chacomer = TVS distributor; spec values differ between sources (Chacomer snippet says carburetor; Tupi says EFI) - alimentacion omitted.',
                ],
                [
                    'label' => 'Tupi',
                    'url' => 'https://www.tupi.com.py/producto/MKP051982/MOTO-TVS-RAIDER-125-AZUL-',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Tupi - Moto TVS Raider 125 Azul',
                ],
            ],
        ],
        'tvs/ronin-225' => [
            'brand' => 'tvs',
            'name' => 'Ronin 225',
            'slug' => 'ronin-225',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 225,
                    'source' => [
                        'label' => 'TVS Motor Paraguay',
                        'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/tvs-ronin-py',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '20.1 HP @ 7750 rpm',
                    'source' => [
                        'label' => 'TVS Motor Paraguay',
                        'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/tvs-ronin-py',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '19.93 Nm @ 3750 rpm',
                    'source' => [
                        'label' => 'TVS Motor Paraguay',
                        'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/tvs-ronin-py',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco 300 mm con ABS de dos canales',
                    'source' => [
                        'label' => 'TVS Motor Paraguay',
                        'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/tvs-ronin-py',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Disco 240 mm',
                    'source' => [
                        'label' => 'TVS Motor Paraguay',
                        'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/tvs-ronin-py',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aceite',
                    'source' => [
                        'label' => 'TVS Motor Paraguay',
                        'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/tvs-ronin-py',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '110/70-17 sin cámara',
                    'source' => [
                        'label' => 'TVS Motor Paraguay',
                        'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/tvs-ronin-py',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '130/70-17 sin cámara',
                    'source' => [
                        'label' => 'TVS Motor Paraguay',
                        'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/tvs-ronin-py',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 26203000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/catalog/category/view/s/tvs/id/760/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 26203000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-ronin-225.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/catalog/category/view/s/tvs/id/760/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - TVS moto category — Chacomer is TVS distributor. Neo-retro.',
                ],
                [
                    'label' => 'Tupi',
                    'url' => 'https://www.tupi.com.py/producto/MKP052232/MOTO-TVS-RONIN-225-NIMBUS-GRIS-',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Tupi - Moto TVS Ronin 225 Nimbus Gris — Described as neo-retro',
                ],
                [
                    'label' => 'TVS Motor Paraguay',
                    'url' => 'https://paraguay.tvsmotor.com/en/p/our-products/tvs-ronin-py',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'TVS Motor Paraguay Ronin — brand page',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-ronin-225.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Ronin 225 — retailer/distributor page',
                ],
            ],
        ],
        'tvs/stryker-125' => [
            'brand' => 'tvs',
            'name' => 'Stryker 125',
            'slug' => 'stryker-125',
            'category' => 'naked',
            'specs' => [
                'freno_del' => [
                    'value' => 'Disco 240 mm',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-stryker-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor 130 mm',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-stryker-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 10349000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/catalog/category/view/s/tvs/id/760/',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/catalog/category/view/s/tvs/id/760/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer - TVS moto category — Chacomer is TVS distributor. Category uncertain.',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-rutera-tvs-stryker-125.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Stryker 125 — retailer page',
                ],
            ],
        ],
        'kenton/blitz-110' => [
            'brand' => 'kenton',
            'name' => 'Blitz 110',
            'slug' => 'blitz-110',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 110,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/blitz-110-se/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '7.5 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/blitz-110-se/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Motor OHV 110cc con distribución a cadena',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/blitz-110-se/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 6279000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/blitz-110-se/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 6789000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/blitz-110-dlx-plus/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 7074000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/blitz-110-automatic/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['DLX', 'SE', 'Automatic'],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/blitz-110-se/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton BLITZ 110 (SE/DLX+/Automatic) — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/blitz-110-automatic/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton BLITZ 110 Automatic — official',
                ],
            ],
        ],
        'kenton/blitz-125-sport' => [
            'brand' => 'kenton',
            'name' => 'Blitz 125 Sport',
            'slug' => 'blitz-125-sport',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/blitz-125-sport/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 7513000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/blitz-125-sport/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 7513000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-cub-motoneta-kenton-blitz-125-sport.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/blitz-125-sport/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton BLITZ 125 SPORT — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-cub-motoneta-kenton-blitz-125-sport.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton Blitz 125 Sport — retailer',
                ],
            ],
        ],
        'kenton/bravo-125' => [
            'brand' => 'kenton',
            'name' => 'Bravo 125',
            'slug' => 'bravo-125',
            'category' => 'scooter',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '8.4 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Automática',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '9.5 litros',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '124.6 cc, monocilíndrico, 4 tiempos, refrigerado por aire',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '90/90-12',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '3.50-10',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '770 mm',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 8700000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-125/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/bravo-125/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton Bravo 125 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-scooter-kenton-bravo-125.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Bravo 125 — Chacomer product page',
                ],
            ],
        ],
        'kenton/bravo-150' => [
            'brand' => 'kenton',
            'name' => 'Bravo 150',
            'slug' => 'bravo-150',
            'category' => 'scooter',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-150/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Automática',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-150/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '9.5 L',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bravo-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/bravo-150/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton Bravo 150 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/bull-200' => [
            'brand' => 'kenton',
            'name' => 'Bull 200',
            'slug' => 'bull-200',
            'category' => 'cuatriciclo',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/bull-200/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'disco',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-kenton-bull-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'disco',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-kenton-bull-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 13610000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-kenton-bull-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/bull-200/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton BULL 200 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-kenton-bull-200.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton Bull 200 — retailer',
                ],
            ],
        ],
        'kenton/classic-125' => [
            'brand' => 'kenton',
            'name' => 'Classic 125',
            'slug' => 'classic-125',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '10 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '9 LITROS',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '97 KG',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Motor OHV 125cc con distribución a varilla',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '2.75-18',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '3.00-18',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 6505000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/classic-125/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/classic-125/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton CLASSIC 125 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/classic-150' => [
            'brand' => 'kenton',
            'name' => 'Classic 150',
            'slug' => 'classic-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-classic-150.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '8.5 KW / 8000 RPM',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-classic-150.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico/pedal',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-classic-150.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '11 L',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-classic-150.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'OHV 4 tiempos monocilíndrico',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-classic-150.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-classic-150.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 6685000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-classic-150.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-classic-150.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton Classic 150 — Chacomer retailer/maker product page; no price/spec figures seen',
                ],
            ],
        ],
        'kenton/dkr-150' => [
            'brand' => 'kenton',
            'name' => 'DKR 150',
            'slug' => 'dkr-150',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11.8 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 LITROS',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '120 KG',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Motor OHV 150cc con distribución a cadena',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '90/90-19',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '120/90-17',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 10939000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/dakar-150/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton DKR 150 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/dkr-200' => [
            'brand' => 'kenton',
            'name' => 'DKR 200',
            'slug' => 'dkr-200',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-200/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '18.4 HP',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-dkr-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-dkr-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'disco',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-dkr-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'disco',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-dkr-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 L',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-dkr-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-dkr-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 12047000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/dakar-200/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 12047000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-dkr-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['DKR 200 Storm (page kenton.com.py/moto/dkr-200-storm/, price not seen)'],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/dakar-200/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton DKR 200 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-dkr-200.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton DKR 200 — retailer',
                ],
            ],
        ],
        'kenton/e-kenton-next-v1' => [
            'brand' => 'kenton',
            'name' => 'E-Kenton Next V1',
            'slug' => 'e-kenton-next-v1',
            'category' => 'electrica',
            'specs' => [
                'potencia' => [
                    'value' => '2000 watts',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/e-kenton-next-v1/'],
                    'accessed' => '2026-09-30',
                ],
                'velocidad_max' => [
                    'value' => '50 km/h',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/e-kenton-next-v1/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 7282000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/e-kenton-next-v1/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 7282000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-electrica-kenton-next-v1.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/e-kenton-next-v1/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'E-KENTON NEXT V1 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-electrica-kenton-next-v1.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer E-Kenton Next V1 — retailer',
                ],
            ],
        ],
        'kenton/e-kenton-next-v3' => [
            'brand' => 'kenton',
            'name' => 'E-Kenton Next V3',
            'slug' => 'e-kenton-next-v3',
            'category' => 'electrica',
            'specs' => [
                'velocidad_max' => [
                    'value' => '55 km/h',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-electrica-kenton-next-v3.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 8092000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/e-kenton-next-v3/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 8092000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-electrica-kenton-next-v3.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/e-kenton-next-v3/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'E-KENTON NEXT V3 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-electrica-kenton-next-v3.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer E-Kenton Next V3 — retailer',
                ],
            ],
        ],
        'kenton/e-kenton-next-v5' => [
            'brand' => 'kenton',
            'name' => 'E-Kenton Next V5',
            'slug' => 'e-kenton-next-v5',
            'category' => 'electrica',
            'specs' => [],
            'prices' => [
                [
                    'value' => 8506000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/e-kenton-next-v5/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 8506000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-electrica-kenton-next-v5.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/e-kenton-next-v5/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'E-KENTON NEXT V5 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-electrica-kenton-next-v5.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer E-Kenton Next V5 — retailer',
                ],
            ],
        ],
        'kenton/forza-150' => [
            'brand' => 'kenton',
            'name' => 'Forza 150',
            'slug' => 'forza-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '8.5 kW / 8000 RPM',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 velocidades',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico y Pedal',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '11 Litros',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '104 KG',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Motor OHV 150cc con distribución a varilla, 4 tiempos, mono cilíndrico, Refrigerado por aire',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '2.75×18',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '3,00×18',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 7489000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/forza-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/forza-150/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton FORZA 150 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/fusion-125' => [
            'brand' => 'kenton',
            'name' => 'Fusion 125',
            'slug' => 'fusion-125',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/fusion-125/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 7641000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/fusion-125/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 7641000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-cub-motoneta-kenton-fusion-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/fusion-125/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton FUSION 125 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-cub-motoneta-kenton-fusion-125.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton Fusion 125 — retailer',
                ],
            ],
        ],
        'kenton/fusion-135' => [
            'brand' => 'kenton',
            'name' => 'Fusion 135',
            'slug' => 'fusion-135',
            'category' => 'cub',
            'specs' => [],
            'prices' => [
                [
                    'value' => 7780000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/fusion-135/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 7780000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/fusion-135/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/fusion-135/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton FUSION 135 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/gl-125' => [
            'brand' => 'kenton',
            'name' => 'GL 125',
            'slug' => 'gl-125',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-125/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual 5 velocidades',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-gl-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico y pedal',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-gl-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-gl-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 6618000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-125/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 6618000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-gl-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/gl-125/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton GL 125 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-gl-125.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton GL 125 — retailer',
                ],
            ],
        ],
        'kenton/gl-150' => [
            'brand' => 'kenton',
            'name' => 'GL 150',
            'slug' => 'gl-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '12 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 velocidades con embrague',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '13 litros',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '97 kg',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '150 cc, 4 tiempos, refrigerado por aire',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '2.75-17',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '3.00-18',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 7489000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/gl-150/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton GL 150 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/gl-150-pro' => [
            'brand' => 'kenton',
            'name' => 'GL 150 Pro',
            'slug' => 'gl-150-pro',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '12 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico/Pedal',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '13 litros',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '100 kg',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Motor OHV 150cc con distribución a varilla, 4 tiempos, monocilíndrico, refrigerado por aire',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '2.75-17',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '3.00-18',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '750 mm',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 7715000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gl-150-pro/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/gl-150-pro/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton GL 150 Pro — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/gtr-150' => [
            'brand' => 'kenton',
            'name' => 'GTR 150',
            'slug' => 'gtr-150',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11.3 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150/'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 litros',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '116 kg',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Motor OHV 150cc con distribución a varilla',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 9063000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/gtr-150/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton GTR 150 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/gtr-150-ltd' => [
            'brand' => 'kenton',
            'name' => 'GTR 150 LTD',
            'slug' => 'gtr-150-ltd',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150-ltd/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11.3 hp',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150-ltd/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150-ltd/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150-ltd/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '15 litros',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150-ltd/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '120 kg',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150-ltd/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '150 cc, Motor OHV con distribución a varilla, 4 tiempos, mono cilíndrico, refrigeración por aire',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150-ltd/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 9556000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150-ltd/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 9764000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-150-ltd-black-edition/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['LTD', 'LTD Black Edition'],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/gtr-150-ltd/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton GTR 150 LTD — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/gtr-200-ltd' => [
            'brand' => 'kenton',
            'name' => 'GTR 200 LTD',
            'slug' => 'gtr-200-ltd',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-kenton-gtr-200-ltd.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '13.4 HP',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-kenton-gtr-200-ltd.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '15 L',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-kenton-gtr-200-ltd.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 10833000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/gtr-200-ltd/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 10833000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-rutera-kenton-gtr-200-ltd.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['LTD', 'LTD Black Edition (page exists, price not seen)'],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/gtr-200-ltd/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton GTR 200 LTD — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-rutera-kenton-gtr-200-ltd.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton GTR 200 LTD — retailer',
                ],
            ],
        ],
        'kenton/quest-200' => [
            'brand' => 'kenton',
            'name' => 'Quest 200',
            'slug' => 'quest-200',
            'category' => 'cuatriciclo',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quest-200/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 22600000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quest-200/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 22600000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/cuaciclon-atv-kenton-quest-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/quest-200/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton QUEST 200 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/cuaciclon-atv-kenton-quest-200.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton Quest 200 — retailer',
                ],
            ],
        ],
        'kenton/quest-300-4x4' => [
            'brand' => 'kenton',
            'name' => 'Quest 300 4x4',
            'slug' => 'quest-300-4x4',
            'category' => 'cuatriciclo',
            'specs' => [
                'cc' => [
                    'value' => 300,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quest-300-4x4/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 38974000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quest-300-4x4/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/quest-300-4x4/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton QUEST 300 4x4 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/quest-atv-500-4x4' => [
            'brand' => 'kenton',
            'name' => 'Quest ATV 500 4x4',
            'slug' => 'quest-atv-500-4x4',
            'category' => 'cuatriciclo',
            'specs' => [
                'cc' => [
                    'value' => 500,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quest-atv-500-4x4/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 47571000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quest-atv-500-4x4/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/quest-atv-500-4x4/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton QUEST ATV 500 4x4 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/quick-125' => [
            'brand' => 'kenton',
            'name' => 'Quick 125',
            'slug' => 'quick-125',
            'category' => 'scooter',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '7.24 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Automática CVT',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '4.5 litros',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'OHV 125 cc distribución a cadena, 4 tiempos, monocilíndrico, refrigerado por aire',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '3.50-10',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '3.50-10',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '740 mm',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/quick-125/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/quick-125/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton Quick 125 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/road-power-170' => [
            'brand' => 'kenton',
            'name' => 'Road Power 170',
            'slug' => 'road-power-170',
            'category' => 'scooter',
            'specs' => [
                'cc' => [
                    'value' => 170,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '13.3 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Automática CVT',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '6.7 litros',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '120/70-12',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '120/70-12',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '740 mm',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 9500000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/road-power-170/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 9500000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-scooter-kenton-road-power.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/road-power-170/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton Road Power 170 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-scooter-kenton-road-power.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton Road Power — retailer',
                ],
            ],
        ],
        'kenton/shark-150' => [
            'brand' => 'kenton',
            'name' => 'Shark 150',
            'slug' => 'shark-150',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 149,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11.5 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual – 5 cambios',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 L',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '110 Kg',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Monocilíndrico, 4 tiempos, refrigeración por aire',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '90/90-19',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '110/90-17',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '860 mm',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 9981000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/shark-150/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton SHARK 150 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/shark-200' => [
            'brand' => 'kenton',
            'name' => 'Shark 200',
            'slug' => 'shark-200',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/shark-200/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '13.6 HP',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-shark-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'eléctrico/pedal',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-shark-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'disco',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-shark-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'tambor',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-shark-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 L',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-shark-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '860 mm',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-shark-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 10621000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-shark-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/shark-200/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton SHARK 200 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-trail-kenton-shark-200.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton Shark 200 — retailer',
                ],
            ],
        ],
        'kenton/skua-150' => [
            'brand' => 'kenton',
            'name' => 'Skua 150',
            'slug' => 'skua-150',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual – 5 Cambios',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 litros',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '115kg',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Monocilíndrico, 4 tiempos, refrigeración por aire',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '2.75 – 21',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '4.60 – 18',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '898mm',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 9189000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/skua-150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/skua-150/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton SKUA 150 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/spark-150' => [
            'brand' => 'kenton',
            'name' => 'Spark 150',
            'slug' => 'spark-150',
            'category' => 'scooter',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/spark150/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '10.5 HP',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/spark150/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/spark150/'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/spark150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/spark150/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/spark150/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '14.5 litros',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/spark150/'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/spark150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '120/70-12',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/spark150/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '130/70-12',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/spark150/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/spark150/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton SPARK 150 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-spark-150.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Spark 150 — Chacomer product page',
                ],
            ],
        ],
        'kenton/stratta-200' => [
            'brand' => 'kenton',
            'name' => 'Stratta 200',
            'slug' => 'stratta-200',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '15 HP',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual 6 velocidades',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'disco',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'disco',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '13 L',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '140 kg',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_del' => [
                    'value' => '100/80-17',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'neumatico_tras' => [
                    'value' => '130/80-17',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '765 mm',
                    'source' => ['label' => 'Classic Motos', 'url' => 'https://www.classicmotos.com.py/producto/stratta-200/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 13350000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-stratta-200.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/stratta-200/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton Stratta 200 — official Kenton page',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/motocicleta-utilitaria-kenton-stratta-200.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton Stratta 200 — retailer; listed as Kenton brand',
                ],
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/stratta-200/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos Stratta 200 — retailer spec source',
                ],
            ],
        ],
        'kenton/symphony-125s' => [
            'brand' => 'kenton',
            'name' => 'Symphony 125S',
            'slug' => 'symphony-125s',
            'category' => 'scooter',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/symphony-125s/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 12500000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/symphony-125s/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/symphony-125s/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton Symphony 125S — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/transporter-150-hd' => [
            'brand' => 'kenton',
            'name' => 'Transporter 150 HD',
            'slug' => 'transporter-150-hd',
            'category' => 'motocarro-carga',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/transporter-150-hd/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 17984000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/transporter-150-hd/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 17984000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/triciclo-motocarga-kenton-transporter-150-hd.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/transporter-150-hd/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton TRANSPORTER 150 HD — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/triciclo-motocarga-kenton-transporter-150-hd.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton Transporter 150 HD — retailer',
                ],
            ],
        ],
        'kenton/transporter-180' => [
            'brand' => 'kenton',
            'name' => 'Transporter 180',
            'slug' => 'transporter-180',
            'category' => 'motocarro-carga',
            'specs' => [
                'cc' => [
                    'value' => 180,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/familia/motocargas/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 18880000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/familia/motocargas/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/familia/motocargas/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton TRANSPORTER 180 — Official brand page (kenton.com.py), data from search summary',
                ],
            ],
        ],
        'kenton/transporter-210-hd' => [
            'brand' => 'kenton',
            'name' => 'Transporter 210 HD',
            'slug' => 'transporter-210-hd',
            'category' => 'motocarro-carga',
            'specs' => [
                'cc' => [
                    'value' => 210,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/transporter-210-hd/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 22330000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/transporter-210-hd/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 22330000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/triciclo-motocarga-kenton-transporter-210-hd.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/transporter-210-hd/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton TRANSPORTER 210 HD — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/triciclo-motocarga-kenton-transporter-210-hd.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Chacomer Kenton Transporter 210 HD — retailer',
                ],
            ],
        ],
        'kenton/volkano-125' => [
            'brand' => 'kenton',
            'name' => 'Volkano 125',
            'slug' => 'volkano-125',
            'category' => 'cuatriciclo',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/volkano-125/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 11202000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/volkano-125/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 11202000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/cuaciclon-atv-kenton-volkano-125.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/volkano-125/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton VOLKANO 125 — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/cuaciclon-atv-kenton-volkano-125.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Volkano 125',
                ],
            ],
        ],
        'kenton/volkano-150-off-road' => [
            'brand' => 'kenton',
            'name' => 'Volkano 150 Off Road',
            'slug' => 'volkano-150-off-road',
            'category' => 'cuatriciclo',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/familia/atv-cuaci/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 16900000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/familia/atv-cuaci/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 16900000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/moto/volkano-150-off-road/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/familia/atv-cuaci/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton VOLKANO 150 OFF ROAD — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/moto/volkano-150-off-road/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Volkano 150 Off Road',
                ],
            ],
        ],
        'kenton/volkano-250-off-road' => [
            'brand' => 'kenton',
            'name' => 'Volkano 250 Off Road',
            'slug' => 'volkano-250-off-road',
            'category' => 'cuatriciclo',
            'specs' => [
                'cc' => [
                    'value' => 250,
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/familia/atv-cuaci/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 18685000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Kenton', 'url' => 'https://kenton.com.py/familia/atv-cuaci/'],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 18685000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Chacomer',
                        'url' => 'https://www.chacomer.com.py/cuaciclon-atv-kenton-volkano-250-off-road.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Kenton',
                    'url' => 'https://kenton.com.py/familia/atv-cuaci/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Kenton VOLKANO 250 OFF ROAD — Official brand page (kenton.com.py), data from search summary',
                ],
                [
                    'label' => 'Chacomer',
                    'url' => 'https://www.chacomer.com.py/cuaciclon-atv-kenton-volkano-250-off-road.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Volkano 250 Off Road',
                ],
            ],
        ],
        'bmw-motorrad/g-310-gs' => [
            'brand' => 'bmw-motorrad',
            'name' => 'G 310 GS',
            'slug' => 'g-310-gs',
            'category' => 'touring',
            'specs' => [
                'cc' => [
                    'value' => 313,
                    'source' => [
                        'label' => 'BMW Motorrad Paraguay',
                        'url' => 'https://www.bmw-motorrad.com.py/es/models/adventure/g310gs/technicaldata.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '34 HP (25 kW) a 9.500 rpm',
                    'source' => [
                        'label' => 'BMW Motorrad Paraguay',
                        'url' => 'https://www.bmw-motorrad.com.py/es/models/adventure/g310gs/technicaldata.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '6 velocidades',
                    'source' => [
                        'label' => 'BMW Motorrad Paraguay',
                        'url' => 'https://www.bmw-motorrad.com.py/es/models/adventure/g310gs/technicaldata.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Un cilindro, cuatro tiempos, 4 válvulas, dos árboles de levas',
                    'source' => [
                        'label' => 'BMW Motorrad Paraguay',
                        'url' => 'https://www.bmw-motorrad.com.py/es/models/adventure/g310gs/technicaldata.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Agua',
                    'source' => [
                        'label' => 'BMW Motorrad Paraguay',
                        'url' => 'https://www.bmw-motorrad.com.py/es/models/adventure/g310gs/technicaldata.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'La Nación',
                    'url' => 'https://www.lanacion.com.py/negocios_edicion_impresa/2018/03/26/bmw-motorrad-paraguay-lanzo-la-nueva-g-310-gs/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'La Nación - BMW Motorrad Paraguay lanzó la nueva G 310 GS — Press article naming model as launched in Paraguay.',
                ],
                [
                    'label' => 'BMW Motorrad Paraguay',
                    'url' => 'https://www.bmw-motorrad.com.py/es/models/adventure/g310gs/technicaldata.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'BMW Motorrad Paraguay G 310 GS datos técnicos — distributor brand site',
                ],
            ],
        ],
        'bmw-motorrad/g-310-r' => [
            'brand' => 'bmw-motorrad',
            'name' => 'G 310 R',
            'slug' => 'g-310-r',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 313,
                    'source' => [
                        'label' => 'BMW Motorrad Paraguay',
                        'url' => 'https://www.bmw-motorrad.com.py/es/models/roadster/g310r/technicaldata.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '34 HP (25 kW) a 9.500 rpm',
                    'source' => [
                        'label' => 'BMW Motorrad Paraguay',
                        'url' => 'https://www.bmw-motorrad.com.py/es/models/roadster/g310r/technicaldata.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Un cilindro, cuatro tiempos, 4 válvulas, dos árboles de levas',
                    'source' => [
                        'label' => 'BMW Motorrad Paraguay',
                        'url' => 'https://www.bmw-motorrad.com.py/es/models/roadster/g310r/technicaldata.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Agua',
                    'source' => [
                        'label' => 'BMW Motorrad Paraguay',
                        'url' => 'https://www.bmw-motorrad.com.py/es/models/roadster/g310r/technicaldata.html',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'InfoNegocios',
                    'url' => 'https://infonegocios.com.py/infomotor/bmw-motorrad-paraguay-presento-la-nueva-g-310-r-la-mas-joven-de-la-familia',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Infonegocios - BMW Motorrad Paraguay presentó la nueva G 310 R — Press article naming model as launched in Paraguay.',
                ],
                [
                    'label' => 'BMW Motorrad Paraguay',
                    'url' => 'https://www.bmw-motorrad.com.py/es/models/roadster/g310r/technicaldata.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'BMW Motorrad Paraguay G 310 R datos técnicos — distributor brand site',
                ],
            ],
        ],
        'bmw-motorrad/r-1300-gs' => [
            'brand' => 'bmw-motorrad',
            'name' => 'R 1300 GS',
            'slug' => 'r-1300-gs',
            'category' => 'touring',
            'specs' => [
                'cc' => [
                    'value' => 1300,
                    'source' => [
                        'label' => 'ABC Color',
                        'url' => 'https://www.abc.com.py/empresariales/2024/03/26/la-nueva-y-potente-bmw-r-1300-gs-ya-esta-en-paraguay/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '145 HP a 7.750 rpm',
                    'source' => [
                        'label' => 'ABC Color',
                        'url' => 'https://www.abc.com.py/empresariales/2024/03/26/la-nueva-y-potente-bmw-r-1300-gs-ya-esta-en-paraguay/',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '149 Nm a 6.500 rpm',
                    'source' => [
                        'label' => 'ABC Color',
                        'url' => 'https://www.abc.com.py/empresariales/2024/03/26/la-nueva-y-potente-bmw-r-1300-gs-ya-esta-en-paraguay/',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'ABC Color',
                    'url' => 'https://www.abc.com.py/empresariales/2024/03/26/la-nueva-y-potente-bmw-r-1300-gs-ya-esta-en-paraguay/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'ABC Color - La nueva BMW R 1300 GS ya está en Paraguay — Press article naming model as launched in Paraguay.',
                ],
                [
                    'label' => 'BMW Motorrad Paraguay',
                    'url' => 'https://www.bmw-motorrad.com.py/es/models/adventure/r1300gs.html',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'BMW Motorrad Paraguay R 1300 GS — brand page',
                ],
            ],
        ],
        'cfmoto/450mt' => [
            'brand' => 'cfmoto',
            'name' => '450MT',
            'slug' => '450mt',
            'category' => 'touring',
            'specs' => [
                'potencia' => [
                    'value' => '44 CV',
                    'source' => ['label' => 'CFMoto Paraguay', 'url' => 'https://www.cfmoto.com.py/producto.php?prod=450mt'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'Dos cilindros, 449,5 cc, refrigeración líquida',
                    'source' => ['label' => 'CFMoto Paraguay', 'url' => 'https://www.cfmoto.com.py/producto.php?prod=450mt'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Líquida',
                    'source' => ['label' => 'CFMoto Paraguay', 'url' => 'https://www.cfmoto.com.py/producto.php?prod=450mt'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'CFMoto Paraguay',
                    'url' => 'https://www.cfmoto.com.py/producto.php?prod=450mt',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'CFMOTO Paraguay - 450MT — Brand PY site product page.',
                ],
                [
                    'label' => 'Classic Motos',
                    'url' => 'https://www.classicmotos.com.py/producto/mt450/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Classic Motos MT450 — retailer page',
                ],
            ],
        ],
        'triumph/speed-400' => [
            'brand' => 'triumph',
            'name' => 'Speed 400',
            'slug' => 'speed-400',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 398,
                    'source' => ['label' => 'Mecauto', 'url' => 'https://mecauto.com.py/triumph/speed400/'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '40 hp',
                    'source' => ['label' => 'Mecauto', 'url' => 'https://mecauto.com.py/triumph/speed400/'],
                    'accessed' => '2026-09-30',
                ],
                'torque' => [
                    'value' => '37.5 Nm',
                    'source' => ['label' => 'Mecauto', 'url' => 'https://mecauto.com.py/triumph/speed400/'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '6 velocidades',
                    'source' => ['label' => 'Mecauto', 'url' => 'https://mecauto.com.py/triumph/speed400/'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'DOHC 4 tiempos monocilíndrico',
                    'source' => ['label' => 'Mecauto', 'url' => 'https://mecauto.com.py/triumph/speed400/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Mecauto',
                    'url' => 'https://mecauto.com.py/triumph/speed400/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Mecauto Triumph Speed 400 — distributor page',
                ],
            ],
        ],
        'taiga/mawi-125' => [
            'brand' => 'taiga',
            'name' => 'Mawi 125',
            'slug' => 'mawi-125',
            'category' => 'scooter',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-mawi-125'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '8.84 HP',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-mawi-125'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'CVT',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-mawi-125'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico y a pedal',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-mawi-125'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-mawi-125'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '4.3 litros',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-mawi-125'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'OHC 4 tiempos 125cc',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-mawi-125'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-mawi-125'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Inverfin',
                    'url' => 'https://inverfin.com.py/products/moto-taiga-mawi-125',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Inverfin - Mawi 125 — Product page by Inverfin, Taiga\'s owner/distributor (Inverfin created Taiga per ABC Color) (two different cash prices across listings in snippet: dropped)',
                ],
            ],
        ],
        'taiga/motocarro-tl200zh-3' => [
            'brand' => 'taiga',
            'name' => 'Motocarro TL200ZH-3',
            'slug' => 'motocarro-tl200zh-3',
            'category' => 'motocarro-carga',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => [
                        'label' => 'Gonzalez Gimenez',
                        'url' => 'https://www.gonzalezgimenez.com.py/producto/6974/motocarro-taiga-tl200zh-3-2024-stecho',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '14 HP',
                    'source' => [
                        'label' => 'Gonzalez Gimenez',
                        'url' => 'https://www.gonzalezgimenez.com.py/producto/6974/motocarro-taiga-tl200zh-3-2024-stecho',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 cambios con embrague y reversa, cardán',
                    'source' => [
                        'label' => 'Gonzalez Gimenez',
                        'url' => 'https://www.gonzalezgimenez.com.py/producto/6974/motocarro-taiga-tl200zh-3-2024-stecho',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico y a pedal',
                    'source' => [
                        'label' => 'Gonzalez Gimenez',
                        'url' => 'https://www.gonzalezgimenez.com.py/producto/6974/motocarro-taiga-tl200zh-3-2024-stecho',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'OHV 200 CC 4 tiempos',
                    'source' => [
                        'label' => 'Gonzalez Gimenez',
                        'url' => 'https://www.gonzalezgimenez.com.py/producto/6974/motocarro-taiga-tl200zh-3-2024-stecho',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/99991627493312'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 16810000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Gonzalez Gimenez',
                        'url' => 'https://www.gonzalezgimenez.com.py/producto/6973/motocarro-taiga-tl200zh-3-2024-negro-ctecho-metal',
                    ],
                    'accessed' => '2026-09-30',
                ],
                [
                    'value' => 16810000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/99991627493312'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => ['Con techo metal', 'Sin techo'],
            'sources' => [
                [
                    'label' => 'Gonzalez Gimenez',
                    'url' => 'https://www.gonzalezgimenez.com.py/producto/6974/motocarro-taiga-tl200zh-3-2024-stecho',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Gonzalez Gimenez - Motocarro Taiga TL200ZH-3 2024 — Retailer evidence; capacidad de carga 500 kg',
                ],
                [
                    'label' => 'Inverfin',
                    'url' => 'https://inverfin.com.py/products/99991627493308',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Inverfin - Triciclo de carga TL200ZH-3 2024 — Distributor listing (snippet price Gs. 16.318.000 contado, regular 19.900.000; not recorded as price due to ambiguity between listings)',
                ],
                [
                    'label' => 'Inverfin',
                    'url' => 'https://inverfin.com.py/products/99991627493312',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Inverfin Triciclo Taiga TL200ZH-3 Techo',
                ],
            ],
        ],
        'taiga/rally-250' => [
            'brand' => 'taiga',
            'name' => 'Rally 250',
            'slug' => 'rally-250',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 223,
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '17,7 HP',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '6 cambios con embrague',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '14 LTS',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '135 KG ± 5',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'OHC 250 cc 4 tiempos',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire con radiador de aceite',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
                'altura_asiento' => [
                    'value' => '835 MM',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 12750000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Inverfin',
                    'url' => 'https://inverfin.com.py/products/moto-taiga-rally-250',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Inverfin - Rally 250 — Product page by Inverfin, Taiga\'s owner/distributor (Inverfin created Taiga per ABC Color) (snippet lists both \'250 cc\' and \'Cilindrada: 223 CC\'; 223 kept as published under Cilindrada)',
                ],
            ],
        ],
        'taiga/tl150-cr1' => [
            'brand' => 'taiga',
            'name' => 'TL150 CR1',
            'slug' => 'tl150-cr1',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl-150-cr1-2024'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11 HP',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl-150-cr1-2024'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 velocidades manual con embrague',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl-150-cr1-2024'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico y a pedal',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl-150-cr1-2024'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl-150-cr1-2024'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl-150-cr1-2024'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '14 litros',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl-150-cr1-2024'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'OHV 150 cc 4 tiempos',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl-150-cr1-2024'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl-150-cr1-2024'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Inverfin',
                    'url' => 'https://inverfin.com.py/products/moto-taiga-tl-150-cr1-2024',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Inverfin - TL150 CR1 — Product page by Inverfin, Taiga\'s owner/distributor (Inverfin created Taiga per ABC Color) (price in snippet ambiguous: dropped)',
                ],
            ],
        ],
        'taiga/tl200-eclipse-pro-gen1' => [
            'brand' => 'taiga',
            'name' => 'TL200 Eclipse Pro Gen1',
            'slug' => 'tl200-eclipse-pro-gen1',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '13,41 HP',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '6 velocidades',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico y a pedal',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '13 LTS',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'OHV 200 CC 4 tiempos balanceado',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 8364000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Inverfin',
                    'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-eclipse-pro-gen1',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Inverfin - TL200 Eclipse Pro Gen1 — Product page by Inverfin, Taiga\'s owner/distributor (Inverfin created Taiga per ABC Color)',
                ],
            ],
        ],
        'taiga/tl200-rally' => [
            'brand' => 'taiga',
            'name' => 'TL200 Rally',
            'slug' => 'tl200-rally',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '14 HP',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 cambios con embrague',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico y a pedal',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '11 litros',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'OHV 200 c.c.',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 11950000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Inverfin', 'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Inverfin',
                    'url' => 'https://inverfin.com.py/products/moto-taiga-tl200-rally-2024',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Inverfin - TL200 Rally — Product page by Inverfin, Taiga\'s owner/distributor (Inverfin created Taiga per ABC Color)',
                ],
            ],
        ],
        'taiga/tl250-cr5-gt' => [
            'brand' => 'taiga',
            'name' => 'TL250 CR5 GT',
            'slug' => 'tl250-cr5-gt',
            'category' => 'enduro-cross',
            'specs' => [
                'cc' => [
                    'value' => 223,
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '17,7 HP',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '6 velocidades',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Disco',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12 litros',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => 'OHC 250 cc 4 tiempos',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    ],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire con radiador de aceite',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 14995000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => [
                        'label' => 'Inverfin',
                        'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    ],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Inverfin',
                    'url' => 'https://inverfin.com.py/products/moto-taiga-tl-250-cr5-gt2024',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Inverfin - TL250 CR5 GT — Product page by Inverfin, Taiga\'s owner/distributor (Inverfin created Taiga per ABC Color)',
                ],
            ],
        ],
        'leopard/hb-125-grand-tour' => [
            'brand' => 'leopard',
            'name' => 'HB 125 Grand Tour',
            'slug' => 'hb-125-grand-tour',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '7.8 CV',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '4 velocidades semiautomática, cadena',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico/pedal',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '3.5 litros',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '98 kg',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Reimpex',
                    'url' => 'https://www.reimpex.com.py/leopard/5/hb-125-grand-tour',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Reimpex - Leopard HB 125 Grand Tour — Reimpex (Leopard maker/distributor) model page',
                ],
            ],
        ],
        'leopard/hb1-110' => [
            'brand' => 'leopard',
            'name' => 'HB1 110',
            'slug' => 'hb1-110',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 110,
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '6.5 HP',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '4 velocidades semiautomática, cadena',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico/pedal',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'Tambor',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '3.5 litros',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '93 kg',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
                'alimentacion' => [
                    'value' => 'Carburador',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Reimpex',
                    'url' => 'https://www.reimpex.com.py/leopard/7/hb1-110',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Reimpex - Leopard HB1 110 — Reimpex (Leopard maker/distributor) model page',
                ],
            ],
        ],
        'leopard/hb1-125' => [
            'brand' => 'leopard',
            'name' => 'HB1 125',
            'slug' => 'hb1-125',
            'category' => 'cub',
            'specs' => [
                'cc' => [
                    'value' => 125,
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/12/hb1-125'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/12/hb1-125'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/12/hb1-125'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Reimpex',
                    'url' => 'https://www.reimpex.com.py/leopard/12/hb1-125',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Reimpex Leopard HB1 125 — official distributor',
                ],
            ],
        ],
        'leopard/ht-150-ba' => [
            'brand' => 'leopard',
            'name' => 'HT 150 BA',
            'slug' => 'ht-150-ba',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 150,
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/8/ht-150-ba'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '10 HP',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/8/ht-150-ba'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 velocidades, mecánico, cadena',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/8/ht-150-ba'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico/Pedal',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/8/ht-150-ba'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '12,6 L',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/8/ht-150-ba'],
                    'accessed' => '2026-09-30',
                ],
                'peso' => [
                    'value' => '120 kg',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/8/ht-150-ba'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/8/ht-150-ba'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Por aire',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/8/ht-150-ba'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Reimpex',
                    'url' => 'https://www.reimpex.com.py/leopard/8/ht-150-ba',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Reimpex - Leopard HT 150 BA — Reimpex (Leopard maker/distributor) model page',
                ],
            ],
        ],
        'leopard/ht-200-ba' => [
            'brand' => 'leopard',
            'name' => 'HT 200 BA',
            'slug' => 'ht-200-ba',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/1/ht-200-ba'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '11,4 HP',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/1/ht-200-ba'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => '5 cambios',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/1/ht-200-ba'],
                    'accessed' => '2026-09-30',
                ],
                'arranque' => [
                    'value' => 'Eléctrico',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/1/ht-200-ba'],
                    'accessed' => '2026-09-30',
                ],
                'freno_del' => [
                    'value' => 'Disco',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/1/ht-200-ba'],
                    'accessed' => '2026-09-30',
                ],
                'freno_tras' => [
                    'value' => 'A tambor',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/1/ht-200-ba'],
                    'accessed' => '2026-09-30',
                ],
                'tanque' => [
                    'value' => '10,6 Litros',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/1/ht-200-ba'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '5 tiempos (as published)',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/1/ht-200-ba'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/1/ht-200-ba'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Reimpex',
                    'url' => 'https://www.reimpex.com.py/leopard/1/ht-200-ba',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Reimpex - Leopard HT 200 BA — Reimpex (Leopard maker/distributor) model page',
                ],
            ],
        ],
        'leopard/kh-200' => [
            'brand' => 'leopard',
            'name' => 'KH 200',
            'slug' => 'kh-200',
            'category' => 'naked',
            'specs' => [
                'cc' => [
                    'value' => 200,
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/9/kh-200'],
                    'accessed' => '2026-09-30',
                ],
                'potencia' => [
                    'value' => '13.8 HP',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/9/kh-200'],
                    'accessed' => '2026-09-30',
                ],
                'transmision' => [
                    'value' => 'Manual 5 velocidades',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/9/kh-200'],
                    'accessed' => '2026-09-30',
                ],
                'motor' => [
                    'value' => '4 tiempos monocilíndrico',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/9/kh-200'],
                    'accessed' => '2026-09-30',
                ],
                'refrigeracion' => [
                    'value' => 'Aire',
                    'source' => ['label' => 'Reimpex', 'url' => 'https://www.reimpex.com.py/leopard/9/kh-200'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Reimpex',
                    'url' => 'https://www.reimpex.com.py/leopard/9/kh-200',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Reimpex Leopard KH 200 — official distributor',
                ],
            ],
        ],
        'super-soco/tc-wanderer' => [
            'brand' => 'super-soco',
            'name' => 'TC Wanderer',
            'slug' => 'tc-wanderer',
            'category' => 'electrica',
            'specs' => [
                'motor' => [
                    'value' => 'BOSCH 3.000 W, batería litio 60V/32Ah',
                    'source' => ['label' => 'Quantum Motors', 'url' => 'https://tuquantum.com.py/producto/tc/'],
                    'accessed' => '2026-09-30',
                ],
                'velocidad_max' => [
                    'value' => '75 km/h',
                    'source' => ['label' => 'Quantum Motors', 'url' => 'https://tuquantum.com.py/producto/tc/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 25500000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Quantum Motors', 'url' => 'https://tuquantum.com.py/producto/tc/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Quantum Motors',
                    'url' => 'https://tuquantum.com.py/producto/tc/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Quantum - TC Wanderer — Quantum Paraguayan product page',
                ],
            ],
        ],
        'super-soco/tc-wanderer-pro' => [
            'brand' => 'super-soco',
            'name' => 'TC Wanderer Pro',
            'slug' => 'tc-wanderer-pro',
            'category' => 'electrica',
            'specs' => [
                'motor' => [
                    'value' => '4.100 W, batería litio 60V/32Ah',
                    'source' => ['label' => 'Quantum Motors', 'url' => 'https://tuquantum.com.py/producto/tc-wanderer-pro/'],
                    'accessed' => '2026-09-30',
                ],
                'velocidad_max' => [
                    'value' => '90 km/h',
                    'source' => ['label' => 'Quantum Motors', 'url' => 'https://tuquantum.com.py/producto/tc-wanderer-pro/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 37000000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Quantum Motors', 'url' => 'https://tuquantum.com.py/producto/tc-wanderer-pro/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Quantum Motors',
                    'url' => 'https://tuquantum.com.py/producto/tc-wanderer-pro/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Quantum - TC Wanderer Pro — Quantum Paraguayan product page',
                ],
            ],
        ],
        'yadea/c-umi' => [
            'brand' => 'yadea',
            'name' => 'C-UMI',
            'slug' => 'c-umi',
            'category' => 'electrica',
            'specs' => [
                'motor' => [
                    'value' => '1200 W, batería plomo-ácido 60V/20Ah',
                    'source' => ['label' => 'Quantum Motors', 'url' => 'https://tuquantum.com.py/producto/c-umi/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'prices' => [
                [
                    'value' => 7600000,
                    'currency' => 'PYG',
                    'condition' => '0km',
                    'source' => ['label' => 'Quantum Motors', 'url' => 'https://tuquantum.com.py/producto/c-umi/'],
                    'accessed' => '2026-09-30',
                ],
            ],
            'versions' => [],
            'sources' => [
                [
                    'label' => 'Quantum Motors',
                    'url' => 'https://tuquantum.com.py/producto/c-umi/',
                    'accessed' => '2026-09-30',
                    'method' => 'snippet',
                    'note' => 'Quantum - C-UMI — Quantum Paraguayan product page',
                ],
            ],
        ],
    ],
];
