<?php
/**
 * A model page, /motos/{marca}/{modelo} — the traffic engine (PLAN §2.1, D18).
 * Route file (three lines):
 *
 *     <?php require __DIR__ . '/../../../lib/bootstrap.php';
 *     $key = 'honda/cg-150-titan';
 *     require ROOT_DIR . '/templates/model.php';
 *
 * Facts come from content/catalogo.php, words from content/modelos.php.
 * The body (templates/body/model.php) is what the indexing gate measures.
 */

declare(strict_types=1);

/** @var string $key */
$modelRecord = modelo($key ?? '');
if ($modelRecord === null) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}

$modelEdit  = content('modelos')[$key] ?? [];
$modelName  = modelo_name($key);
$modelBrand = marca((string) $modelRecord['brand']);

$modelTitle = trim((string) ($modelEdit['title'] ?? ''));
if ($modelTitle === '') {
    foreach (['%s: precio en Paraguay y ficha técnica', '%s: precio y ficha técnica', '%s en Paraguay', '%s'] as $modelPattern) {
        $modelTitle = sprintf($modelPattern, $modelName);
        if (mb_strlen($modelTitle) <= TITLE_MAX) {
            break;
        }
    }
}

$page = [
    'title'        => $modelTitle,
    'description'  => seo_description(
        $modelEdit['description'] ?? null,
        sprintf('%s en Paraguay: ficha técnica con fuente, precio publicado cuando existe, mantenimiento, '
              . 'repuestos y qué revisar si la comprás usada.', $modelName)
    ),
    'path'         => path_model($key),
    'breadcrumbs'  => [
        ['label' => 'Motos', 'path' => '/motos'],
        ['label' => (string) ($modelBrand['name'] ?? $modelRecord['brand']), 'path' => path_brand((string) $modelRecord['brand'])],
        ['label' => (string) $modelRecord['name'], 'path' => path_model($key)],
    ],
    'faq'          => visible_faq((array) ($modelEdit['faq'] ?? [])),
    'leadSlug'     => 'consulta',
    'whatsappText' => sprintf(ui('model.whatsapp'), $modelName),
];

$layoutBody = page_body('model', $key);
$layoutForm = ['formId' => 'modelo', 'formSource' => 'consulta', 'formModel' => $modelName];

unset($modelRecord, $modelEdit, $modelBrand, $modelTitle, $modelPattern);
require ROOT_DIR . '/templates/layout.php';
