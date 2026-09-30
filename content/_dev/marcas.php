<?php
/** [DEV] fixture for content/marcas.php (shape in that file's header). APP_ENV=dev only. */

declare(strict_types=1);

require_once __DIR__ . '/_text.php';

return [
    'dev-marca' => [
        'intro'    => dev_text('la marca de prueba', 160),
        'sections' => [
            ['h2' => 'Historia de la marca de prueba', 'id' => 'historia', 'body' => dev_text('la historia de la marca', 170)],
            ['h2' => 'Sección pendiente', 'body' => [['verify' => '[DEV] confirmar la red de talleres en el sitio de la marca']]],
        ],
        'faq'      => [
            ['q' => '¿Dónde se consulta la marca de prueba?', 'a' => 'En el [distribuidor de prueba](/contacto), que no existe.'],
            ['verify' => '[DEV] confirmar la garantía oficial'],
        ],
        'updated'  => '2026-09-15',
    ],
];
