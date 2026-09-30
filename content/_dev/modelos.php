<?php
/** [DEV] fixture for content/modelos.php (shape in that file's header). APP_ENV=dev only. */

declare(strict_types=1);

require_once __DIR__ . '/_text.php';

$devModel = static fn (string $name): array => [
    'intro'         => dev_text($name, 110),
    'mantenimiento' => array_merge(dev_text("el mantenimiento del {$name}", 70), [
        ['verify' => '[DEV] confirmar el intervalo de cambio de aceite en el manual'],
    ]),
    'repuestos'     => [['list' => ['Filtro de aire', 'Kit de arrastre', ['verify' => '[DEV] confirmar la medida de la bujía']]]],
    'revisarUsada'  => dev_text("una unidad usada del {$name}", 70),
    'faq'           => [
        ['q' => "¿El {$name} existe?", 'a' => 'No: es un registro de prueba que sólo carga en desarrollo.'],
    ],
    'updated'       => '2026-09-20',
];

return [
    'dev-marca/dev-modelo-a' => $devModel('Modelo A de prueba'),
    'dev-marca/dev-modelo-b' => ['intro' => ['Un modelo sin texto suficiente.'], 'updated' => '2026-09-20'],
    'dev-marca/dev-modelo-c' => $devModel('Modelo C de prueba'),
    'dev-marca/dev-modelo-d' => $devModel('Modelo D de prueba'),
];
