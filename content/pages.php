<?php
/**
 * The static pages, keyed by path (NO trailing slash, PLAN D3). Everything
 * with a URL that is not a brand, model, type, city, guide or comparison.
 * Phases add their own keys at the end of this file; nobody renames one.
 *
 *   title        string   <title>; the ' | moto.com.py' suffix is added only if
 *                          the whole stays <= 60 chars
 *   description  string   120–160 chars, unique across the whole site
 *   h1           string   visible heading ('' → the title)
 *   lead         string   one-line intro under the H1
 *   sections     array    optional prose for templates/page.php:
 *                          [['h2' => …, 'id' => ?, 'body' => blocks], …]
 *   gate         string   'static' (default): always indexable once SITE_NOINDEX
 *                          allows it; 'never': never indexable, never in the
 *                          sitemap, never in the main nav (/gracias, legal)
 *   leadSlug     ?string  lead source in content/lead-values.php 'sources'
 *                          ('consulta' | 'comercial'); default: the neutral default
 *   stub         bool     true while a page is a placeholder: not indexable
 *   updated      ?string  YYYY-MM-DD → sitemap lastmod (omitted when absent)
 *
 * Every key needs a route file (<path>/index.php) except '/404', which 404.php
 * serves. verify.sh checks both directions.
 */

declare(strict_types=1);

return [
    '/' => [
        'title'       => 'moto.com.py: motos en Paraguay, precios y guías',
        'description' => 'Motos en Paraguay: modelos, precios publicados por fuentes reales, guías de '
                       . 'compra, reparación y trámites. Consultá por WhatsApp.',
        'h1'          => '',
        'lead'        => '',
        'leadSlug'    => 'consulta',
    ],

    '/guias' => [
        'title'       => 'Guías de motos',
        'description' => 'Guías para comprar, mantener y arreglar tu moto en Paraguay, y para hacer '
                       . 'los trámites del registro y la chapa, paso a paso.',
        'h1'          => 'Guías',
        'lead'        => 'Cómo comprar, mantener y arreglar tu moto, paso a paso.',
    ],

    '/contacto' => [
        'title'       => 'Contacto',
        'description' => 'Escribinos por WhatsApp o dejanos tus datos para consultar por una moto, un '
                       . 'modelo o un trámite: te respondemos dentro del siguiente día hábil.',
        'h1'          => '',
        'lead'        => '',
        'leadSlug'    => 'consulta',
    ],

    /* Confirmation after a lead (PLAN §2.1): noindex, out of the sitemap. */
    '/gracias' => [
        'title'       => 'Recibimos tu consulta',
        'description' => 'Recibimos tu consulta en moto.com.py. Te respondemos dentro del siguiente día hábil.',
        'h1'          => 'Recibimos tu consulta',
        'lead'        => '',
        'gate'        => 'never',
    ],

    /* Marcador literal (PLAN D15): ninguna sesión escribe texto legal. */
    '/privacidad' => [
        'title'       => 'Política de privacidad',
        'description' => 'Política de privacidad de moto.com.py. El texto está en revisión legal.',
        'h1'          => 'Política de privacidad',
        'lead'        => 'Texto en revisión legal. Lo publicamos apenas esté listo.',
        'sections'    => [],
        'gate'        => 'never',
    ],

    '/terminos' => [
        'title'       => 'Términos y condiciones',
        'description' => 'Términos y condiciones de moto.com.py. El texto está en revisión legal.',
        'h1'          => 'Términos y condiciones',
        'lead'        => 'Texto en revisión legal. Lo publicamos apenas esté listo.',
        'sections'    => [],
        'gate'        => 'never',
    ],

    // Served by 404.php: no URL of its own, no route file.
    '/404' => [
        'title'       => 'Página no encontrada',
        'description' => 'No encontramos la página que buscabas. Mirá las guías o escribinos y te '
                       . 'indicamos dónde está lo que necesitás.',
        'h1'          => 'No encontramos esta página',
        'lead'        => '',
        'gate'        => 'never',
    ],
    /* == B3 == */
    '/para-marcas-y-comercios' => [
        'title'       => 'Para marcas y comercios',
        'description' => 'Si representás una marca, un distribuidor o un comercio de motos en Paraguay, '
                       . 'escribinos: estamos arrancando y queremos conversar con vos.',
        'h1'          => 'Para marcas y comercios',
        'lead'        => 'Estamos arrancando y queremos conversar con quienes venden motos en Paraguay.',
        'leadSlug'    => 'comercial',
        'sections'    => [
            ['h2' => 'Qué es moto.com.py', 'body' => [
                'moto.com.py es un sitio informativo sobre motos en Paraguay: guías de compra, mantenimiento y trámites, y fichas de modelos con datos de fuentes públicas.',
                'Todavía no vendemos motos ni tenemos planes comerciales. Por eso no publicamos precios ni cifras de visitas: preferimos conversar primero.',
            ]],
            ['h2' => 'Para quién es esta página', 'body' => [
                'Para marcas, distribuidores, concesionarias, talleres y financieras que quieran que su información llegue bien a quien busca una moto.',
                'Si algún dato nuestro sobre tu marca o tus modelos está desactualizado, también escribinos y lo revisamos con la fuente que nos indiques.',
            ]],
            ['h2' => 'Cómo seguimos', 'body' => [
                'Completá el formulario o escribinos por WhatsApp. Contanos qué marca o comercio representás y qué querés conversar. Te respondemos dentro del siguiente día hábil.',
            ]],
        ],
        'updated'     => '2026-10-01',
    ],

    /* == T1 == */
    '/motos' => [
        'title'       => 'Marcas y tipos de motos en Paraguay',
        'description' => 'Todas las marcas de motos que se venden en Paraguay y los tipos que hay: naked, '
                       . 'scooter, cub, enduro y más, con la fuente de cada dato.',
        'h1'          => 'Motos en Paraguay',
        'lead'        => 'Elegí una marca o un tipo de moto y mirá sus modelos, con la ficha y el precio '
                       . 'publicado por la fuente, siempre con la fecha de consulta.',
        'leadSlug'    => 'consulta',
        'updated'     => '2026-10-01',
        // Rótulos que leen index.php, motos/index.php y guias/index.php (el slug es el de la app Node).
        'typeLabels'  => [
            'naked'           => 'Naked',
            'scooter'         => 'Scooter',
            'cub'             => 'Cub',
            'enduro-cross'    => 'Enduro y cross',
            'touring'         => 'Touring',
            'deportiva'       => 'Deportiva',
            'custom-chopper'  => 'Custom y chopper',
            'motocarro-carga' => 'Motocarro de carga',
            'electrica'       => 'Eléctrica',
            'cuatriciclo'     => 'Cuatriciclo',
        ],
        'guideGroups' => [
            'compra'     => ['label' => 'Comprar una moto', 'text' => 'Cero kilómetro o usada, cilindrada, papeles y cómo evitar estafas.'],
            'precios'    => ['label' => 'Precios', 'text' => 'Los precios publicados por las fuentes, con fecha y enlace.'],
            'reparacion' => ['label' => 'Reparación y mantenimiento', 'text' => 'Mi moto no arranca, aceite, cadena, batería y otros arreglos.'],
            'tramites'   => ['label' => 'Trámites y ley', 'text' => 'Registro de conducir, chapa, casco y multas.'],
        ],
    ],

    '/motos/en-cuotas' => [
        'title'       => 'Motos en cuotas en Paraguay: cómo funcionan',
        'description' => 'Cómo leer una oferta de moto en cuotas en Paraguay: entrega, cantidad y monto de '
                       . 'cuotas, total a pagar y qué mirar antes de firmar.',
        'h1'          => 'Motos en cuotas en Paraguay',
        'lead'        => 'Comprar una moto en cuotas es la forma más común de llegar a una 0 km sin tener el '
                       . 'total. Acá te explicamos cómo leer una oferta y qué mirar antes de firmar.',
        'leadSlug'    => 'consulta',
        'updated'     => '2026-10-01',
        'sections'    => [
            ['h2' => 'Cómo leer una oferta en cuotas', 'id' => 'como-leer', 'body' => [
                'Cada comercio informa lo suyo: el precio de contado (si lo publica), la entrega inicial y cuántas cuotas de cuánto. '
                . 'Nosotros no calculamos ni ajustamos esos montos, y **moto.com.py no otorga créditos ni aprueba solicitudes**: '
                . 'quien financia es el comercio o la entidad con la que trabaja.',
                'Para comparar dos ofertas, fijate en tres números:',
                ['list' => [
                    '**La entrega:** lo que pagás el día que te llevás la moto.',
                    '**La cuota y la cantidad de cuotas:** multiplicalas y sumale la entrega. Ese es el total que vas a pagar.',
                    '**La diferencia con el contado:** el total en cuotas menos el precio de contado es lo que te cuesta financiar.',
                ]],
                'Si una oferta no muestra el precio de contado, preguntalo antes de decidir. Sin ese dato no sabés cuánto te cuesta el plan.',
            ]],
            ['h2' => 'Qué suelen pedir', 'id' => 'requisitos', 'body' => [
                'Los requisitos cambian según el comercio y la entidad que financia. Antes de ir, escribile al comercio y preguntá '
                . 'qué documentos tenés que llevar, así no perdés el viaje.',
                ['verify' => 'Requisitos habituales para financiar una moto en Paraguay (cédula, comprobante de ingresos, IPS, factura de servicios, garante). Fuente: consulta a al menos tres comercios o a las financieras que trabajan con ellos.'],
            ]],
            ['h2' => 'Antes de firmar', 'id' => 'antes-de-firmar', 'body' => [
                ['list' => [
                    'Pedí el plan por escrito, con el total a pagar y la tasa.',
                    'Preguntá qué pasa si te atrasás en una cuota y si podés cancelar antes.',
                    'Confirmá si el precio incluye la chapa, el seguro y la transferencia, o si se pagan aparte.',
                    'Revisá la moto que te entregan: que el número de chasis y de motor coincidan con los papeles.',
                ]],
                ['verify' => 'Qué gastos de patentamiento y transferencia suelen quedar a cargo del comprador en una moto 0 km. Fuente: dos comercios y el Registro de Automotores.'],
            ]],
            ['h2' => 'Planes publicados por un fabricante', 'id' => 'planes-publicados', 'body' => [
                'Un ejemplo de cómo se publican: Kenton, marca de Chacomer fabricada en Paraguay, muestra en la página de cada modelo '
                . 'una cuota mensual «desde». Es un monto de referencia que publica la fuente, no una oferta nuestra ni una promesa de aprobación.',
                ['table' => [
                    'head' => ['Modelo', 'Cuota mensual «desde»'],
                    'rows' => [
                        ['Kenton Classic 125', ['value' => 'Gs. 279.000 por mes', 'source' => ['label' => 'kenton.com.py', 'url' => 'https://kenton.com.py/moto/classic-125/'], 'accessed' => '2026-09-30']],
                        ['Kenton GL 150', ['value' => 'Gs. 299.000 por mes', 'source' => ['label' => 'kenton.com.py', 'url' => 'https://kenton.com.py/moto/gl-150/'], 'accessed' => '2026-09-30']],
                        ['Kenton Bravo 125', ['value' => 'Gs. 345.000 por mes', 'source' => ['label' => 'kenton.com.py', 'url' => 'https://kenton.com.py/moto/bravo-125/'], 'accessed' => '2026-09-30']],
                        ['Kenton GTR 150', ['value' => 'Gs. 359.000 por mes', 'source' => ['label' => 'kenton.com.py', 'url' => 'https://kenton.com.py/moto/gtr-150/'], 'accessed' => '2026-09-30']],
                        ['Kenton Transporter 150 HD (carga)', ['value' => 'Gs. 845.000 por mes', 'source' => ['label' => 'kenton.com.py', 'url' => 'https://kenton.com.py/moto/transporter-150-hd/'], 'accessed' => '2026-09-30']],
                    ],
                ], 'caption' => 'Cuotas publicadas por kenton.com.py. La fuente no informa en estos datos la entrega ni la cantidad de cuotas.'],
                ['note' => 'Leímos estos montos a través de un resumen de búsqueda, no abriendo la página. Los planes cambian: confirmá el vigente con el comercio.'],
                ['verify' => 'Planes en cuotas (entrega, cantidad de cuotas) de otros distribuidores oficiales. Fuente: sus páginas o avisos, con fecha de consulta.'],
            ]],
            ['h2' => 'Si querés consultar', 'id' => 'consultar', 'body' => [
                'Si no sabés qué plan te conviene o querés preguntar por un modelo, dejá tu consulta abajo o escribinos por WhatsApp. '
                . 'Mientras tanto, leé la [guía para comprar una moto en cuotas](/guias/comprar-moto-en-cuotas-en-paraguay) y mirá las [marcas y modelos](/motos).',
            ]],
        ],
    ],
];
