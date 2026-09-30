<?php
/**
 * A type hub, /motos/tipo/{categoria} (content/tipos.php). Route file:
 * bootstrap, $key = '{categoria}', require this.
 */

declare(strict_types=1);

/** @var string $key */
$typeRecord = content('tipos')[$key ?? ''] ?? null;
if (!is_array($typeRecord)) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}
$typeName = (string) ($typeRecord['name'] ?? $key);

$page = [
    'title'        => trim((string) ($typeRecord['title'] ?? '')) ?: $typeName . ': modelos y precios en Paraguay',
    'description'  => seo_description(
        $typeRecord['description'] ?? null,
        sprintf('%s en Paraguay: los modelos del catálogo con ficha técnica y precio publicado por fuentes '
              . 'reales, y qué tener en cuenta para elegir el tuyo.', $typeName)
    ),
    'path'         => path_type($key),
    'breadcrumbs'  => [
        ['label' => 'Motos', 'path' => '/motos'],
        ['label' => $typeName, 'path' => path_type($key)],
    ],
    'faq'          => visible_faq((array) ($typeRecord['faq'] ?? [])),
    'leadSlug'     => 'consulta',
    'whatsappText' => sprintf('Hola, quiero consultar por motos tipo %s.', $typeName),
];

$layoutBody = page_body('type', $key);
$layoutForm = ['formId' => 'tipo', 'formSource' => 'consulta'];

unset($typeRecord, $typeName);
require ROOT_DIR . '/templates/layout.php';
