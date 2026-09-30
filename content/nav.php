<?php
/**
 * The header and footer link trees (paths without trailing slash, D3).
 * partials/header.php and partials/footer.php render whatever this returns,
 * skipping any link whose page does not pass the indexing gate (PLAN §2.3.3)
 * — so a section can be listed here before its pages exist or pass, and it
 * appears on its own the day they do.
 */

declare(strict_types=1);

return [
    // Header bar, left to right.
    'primary' => [
        ['label' => 'Motos',            'path' => '/motos'],
        ['label' => 'En cuotas',        'path' => '/motos/en-cuotas'],
        ['label' => ui('nav.guides'),   'path' => '/guias'],
        ['label' => ui('nav.contact'),  'path' => '/contacto'],
    ],

    // Footer column.
    'firm' => [
        ['label' => 'Motos',                     'path' => '/motos'],
        ['label' => ui('nav.guides'),            'path' => '/guias'],
        ['label' => 'Para marcas y comercios',   'path' => '/para-marcas-y-comercios'],
        ['label' => ui('nav.contact'),           'path' => '/contacto'],
    ],

    'legal' => [
        ['label' => ui('nav.privacy'), 'path' => '/privacidad'],
        ['label' => ui('nav.terms'),   'path' => '/terminos'],
    ],

    // Rendered only when content/site.php has social URLs.
    'socials' => array_values(array_filter((array) site('socials'))),
];
