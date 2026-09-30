<?php
/**
 * A brand hub, /motos/{marca}. Route file: bootstrap, $key = '{marca}',
 * require this. Facts from content/catalogo.php, words from content/marcas.php.
 */

declare(strict_types=1);

/** @var string $key */
$brandRecord = marca($key ?? '');
if ($brandRecord === null) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}

$brandEdit = content('marcas')[$key] ?? [];
$brandName = (string) $brandRecord['name'];
$brandN    = count(modelos($key));

$page = [
    'title'        => trim((string) ($brandEdit['title'] ?? '')) ?: sprintf(ui('brand.h1'), $brandName),
    'description'  => seo_description(
        $brandEdit['description'] ?? null,
        sprintf('Motos %s en Paraguay: %s con ficha técnica y precios publicados por fuentes reales, con fecha '
              . 'de consulta, y quién las distribuye en el país.', $brandName,
              $brandN === 1 ? 'el modelo del catálogo' : 'los modelos del catálogo')
    ),
    'path'         => path_brand($key),
    'breadcrumbs'  => [
        ['label' => 'Motos', 'path' => '/motos'],
        ['label' => $brandName, 'path' => path_brand($key)],
    ],
    'faq'          => visible_faq((array) ($brandEdit['faq'] ?? [])),
    'leadSlug'     => 'consulta',
    'whatsappText' => sprintf('Hola, quiero consultar por motos %s.', $brandName),
];

$layoutBody = page_body('brand', $key);
$layoutForm = ['formId' => 'marca', 'formSource' => 'consulta', 'formModel' => $brandName];

unset($brandRecord, $brandEdit, $brandName, $brandN);
require ROOT_DIR . '/templates/layout.php';
