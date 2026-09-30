<?php
/**
 * The static (non-service) pages, keyed by path. Services live in
 * content/services.php, tools in content/tools.php, guides in content/guias.php,
 * segment pages in content/segmentos.php; this is everything else with a URL.
 *
 *   title        string  <title> without the ' | <site name>' suffix
 *   description  string  120–155 chars, unique across the whole site
 *   h1           string  visible heading
 *   lead         string  one-line intro under the H1
 *   sections     array   optional prose blocks for templates/page.php:
 *                        [['h2' => ..., 'body' => [paragraph, ...]], ...]
 *   stub         bool    true while the page is still a placeholder: it renders
 *                        through templates/page-stub.php, is marked noindex and
 *                        stays out of sitemap.php. The phase that writes the
 *                        page sets this to false.
 *   noindex      bool    the page exists but is not a URL of its own (/404).
 *                        Excluded from sitemap.php and from the route contract.
 *   changefreq   string  sitemap hint
 *   priority     string  sitemap hint
 *
 * Every entry here needs a route file (<path>/index.php) except '/404', which
 * is served by 404.php.
 */

declare(strict_types=1);

return [
    '/' => [
        'title'       => 'Inicio',
        'description' => 'Motos en Paraguay: modelos, precios publicados por fuentes reales, guías de '
                       . 'compra, reparación y trámites. Consultá por WhatsApp.',
        'h1'          => '',
        'lead'        => '',
        'stub'        => false,
        'changefreq'  => 'weekly',
        'priority'    => '1.0',
    ],

    '/guias/' => [
        'title'       => 'Guías',
        'description' => 'Guías para comprar, mantener y arreglar tu moto en Paraguay, y para hacer '
                       . 'los trámites del registro y la chapa, paso a paso.',
        'h1'          => 'Guías',
        'lead'        => 'Cómo comprar, mantener y arreglar tu moto, paso a paso.',
        'stub'        => false,
        'changefreq'  => 'monthly',
        'priority'    => '0.7',
    ],

    '/contacto/' => [
        'title'       => 'Contacto',
        'description' => 'Escribinos por WhatsApp o dejanos tus datos: te respondemos dentro del '
                       . 'siguiente día hábil.',
        'h1'          => '',
        'lead'        => '',
        'stub'        => false,
        'changefreq'  => 'yearly',
        'priority'    => '0.8',
    ],

    /* Marcador literal (PLAN D15): ninguna sesión escribe texto legal. Queda
       noindex y fuera del sitemap hasta que el abogado entregue el texto. */
    '/privacidad/' => [
        'title'       => 'Política de privacidad',
        'description' => 'Política de privacidad de moto.com.py. El texto está en revisión legal.',
        'h1'          => 'Política de privacidad',
        'lead'        => 'Texto en revisión legal. Lo publicamos apenas esté listo.',
        'sections'    => [],
        'stub'        => false,
        'noindex'     => true,
        'changefreq'  => 'yearly',
        'priority'    => '0.1',
    ],

    /* Marcador literal (PLAN D15): ninguna sesión escribe texto legal. Queda
       noindex y fuera del sitemap hasta que el abogado entregue el texto. */
    '/terminos/' => [
        'title'       => 'Términos y condiciones',
        'description' => 'Términos y condiciones de moto.com.py. El texto está en revisión legal.',
        'h1'          => 'Términos y condiciones',
        'lead'        => 'Texto en revisión legal. Lo publicamos apenas esté listo.',
        'sections'    => [],
        'stub'        => false,
        'noindex'     => true,
        'changefreq'  => 'yearly',
        'priority'    => '0.1',
    ],

    // Served by 404.php, not by a route file: it has no URL of its own, so it
    // is excluded from the sitemap and from the route contract.
    '/404' => [
        'title'       => 'Página no encontrada',
        'description' => 'No encontramos la página que buscabas. Mirá las guías o escribinos y te '
                       . 'indicamos dónde está lo que necesitás.',
        'h1'          => 'No encontramos esta página',
        'lead'        => '',
        'stub'        => false,
        'noindex'     => true,
        'changefreq'  => 'yearly',
        'priority'    => '0.1',
    ],
];
