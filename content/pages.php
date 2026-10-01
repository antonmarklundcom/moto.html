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
];
