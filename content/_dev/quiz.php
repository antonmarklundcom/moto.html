<?php
/** [DEV] fixture for content/quiz.php (shape in that file's header). APP_ENV=dev only. */

declare(strict_types=1);

return [
    'dev-quiz' => [
        'source'    => ['label' => '[DEV] Banco de preguntas de prueba', 'url' => 'https://example.com/banco', 'accessed' => '2026-09-01'],
        'questions' => [
            ['q' => '¿Qué indica una luz roja?', 'options' => ['Seguir', 'Detenerse', 'Acelerar'], 'answer' => 1, 'source' => 'Pregunta 1'],
            ['q' => '¿El casco es obligatorio?', 'options' => ['Sí', 'No'], 'answer' => 0, 'source' => 'Pregunta 2'],
            ['verify' => '[DEV] copiar la pregunta 3 del banco oficial'],
        ],
    ],
];
