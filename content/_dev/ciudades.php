<?php
/** [DEV] fixture for content/ciudades.php (shape in that file's header). APP_ENV=dev only. */

declare(strict_types=1);

require_once __DIR__ . '/_text.php';

return [
    'dev-ciudad' => [
        'name'       => '[DEV] Ciudad',
        'department' => '[DEV] Departamento',
        'intro'      => dev_text('la ciudad de prueba', 140),
        'sections'   => [['h2' => 'Trámites en la ciudad de prueba', 'id' => 'tramites', 'body' => dev_text('los trámites locales', 120)]],
        'models'     => ['dev-marca/dev-modelo-a', 'dev-marca/dev-modelo-d'],
        'guides'     => ['dev-guia'],
        'faq'        => [],
        'sources'    => [['label' => '[DEV] Municipalidad de prueba', 'url' => 'https://example.com/muni', 'accessed' => '2026-09-01']],
        'updated'    => '2026-09-11',
    ],
];
