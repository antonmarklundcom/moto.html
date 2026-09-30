<?php
/** [DEV] fixture for content/comparativas.php (shape in that file's header). APP_ENV=dev only. */

declare(strict_types=1);

require_once __DIR__ . '/_text.php';

return [
    'dev-modelo-a-vs-dev-modelo-d' => [
        'a'         => 'dev-marca/dev-modelo-a',
        'b'         => 'dev-marca/dev-modelo-d',
        'criterio'  => dev_text('el criterio de la comparación', 60),
        'rows'      => ['cc', 'potencia', 'transmision', 'arranque', 'tanque', 'peso'],
        'body'      => dev_text('la comparación de prueba', 420),
        'faq'       => [['q' => '¿Cuál conviene?', 'a' => 'Depende del uso: la comparación de prueba no elige ganador.']],
        'published' => '2026-09-01',
        'updated'   => '2026-09-12',
    ],
];
