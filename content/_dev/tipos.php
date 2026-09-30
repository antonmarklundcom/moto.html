<?php
/** [DEV] fixture for content/tipos.php (shape in that file's header). APP_ENV=dev only. */

declare(strict_types=1);

require_once __DIR__ . '/_text.php';

return [
    'dev-tipo' => [
        'name'     => '[DEV] Tipo',
        'intro'    => dev_text('el tipo de prueba', 140),
        'sections' => [['h2' => 'Para quién es el tipo de prueba', 'id' => 'para-quien', 'body' => dev_text('quien usa el tipo', 120)]],
        'guides'   => ['dev-guia'],
        'faq'      => [],
        'updated'  => '2026-09-10',
    ],
];
