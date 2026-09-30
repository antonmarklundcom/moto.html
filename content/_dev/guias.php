<?php
/** [DEV] fixture for content/guias.php (shape in that file's header). APP_ENV=dev only. */

declare(strict_types=1);

require_once __DIR__ . '/_text.php';

$devGuide = static fn (string $slug, string $name, int $words, array $extra = []): array => $extra + [
    'group'           => 'compra',
    'title'           => "[DEV] {$name}",
    'navLabel'        => "[DEV] {$name}",
    'seoTitle'        => "[DEV] {$name}",
    'metaDescription' => "[DEV] Registro de prueba de {$name}: existe sólo para que la verificación recorra la plantilla de guías completa.",
    'query'           => $name,
    'published'       => '2026-09-01',
    'updated'         => '2026-09-14',
    'hero'            => ['h1' => "[DEV] {$name}", 'lead' => 'Una guía de prueba que no se publica.'],
    'intro'           => array_merge(dev_text($name, (int) ($words / 3)), [['verify' => '[DEV] confirmar un dato del intro']]),
    'sections'        => [
        ['h2' => 'Primera parte', 'id' => 'primera', 'body' => array_merge(
            dev_text("la primera parte de {$name}", (int) ($words / 3)),
            ['Mirá también el [Modelo A de prueba](/motos/dev-marca/dev-modelo-a).']
        )],
        ['h2' => 'Segunda parte', 'id' => 'segunda', 'body' => dev_text("la segunda parte de {$name}", (int) ($words / 3))],
        ['h2' => 'Parte pendiente', 'id' => 'pendiente', 'body' => [['verify' => '[DEV] confirmar esta sección entera']]],
    ],
    'faq'             => [['q' => "¿Para qué sirve {$name}?", 'a' => 'Para probar la plantilla.']],
    'links'           => [['path' => '/motos/dev-marca', 'label' => '[DEV] Marca']],
    'related'         => [],
    'quiz'            => null,
    'sources'         => [['label' => '[DEV] Fuente de la guía', 'url' => 'https://example.com/guia', 'accessed' => '2026-09-01']],
];

return [
    'dev-guia'        => $devGuide('dev-guia', 'la guía de prueba', 660, ['related' => ['dev-guia-examen']]),
    'dev-guia-examen' => $devGuide('dev-guia-examen', 'la guía con examen', 660, ['group' => 'tramites', 'quiz' => 'dev-quiz']),
    // Fails its gate: too short.
    'dev-guia-fina'   => $devGuide('dev-guia-fina', 'la guía fina', 90),
];
