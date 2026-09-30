<?php
/**
 * A city page, /motos/ciudad/{slug} (content/ciudades.php). Route file:
 * bootstrap, $key = '{slug}', require this.
 */

declare(strict_types=1);

/** @var string $key */
$cityRecord = content('ciudades')[$key ?? ''] ?? null;
if (!is_array($cityRecord)) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}
$cityName = (string) ($cityRecord['name'] ?? $key);

$page = [
    'title'        => trim((string) ($cityRecord['title'] ?? '')) ?: 'Motos en ' . $cityName . ': dónde comprar y trámites',
    'description'  => seo_description(
        $cityRecord['description'] ?? null,
        sprintf('Motos en %s, %s: dónde consultar por una moto, sucursales de distribuidores y trámites '
              . 'locales, con la fuente y la fecha de cada dato.', $cityName, (string) ($cityRecord['department'] ?? 'Paraguay'))
    ),
    'path'         => path_city($key),
    'breadcrumbs'  => [
        ['label' => 'Motos', 'path' => '/motos'],
        ['label' => $cityName, 'path' => path_city($key)],
    ],
    'faq'          => visible_faq((array) ($cityRecord['faq'] ?? [])),
    'leadSlug'     => 'consulta',
    'whatsappText' => sprintf('Hola, quiero consultar por una moto en %s.', $cityName),
];

$layoutBody = page_body('city', $key);
$layoutForm = ['formId' => 'ciudad', 'formSource' => 'consulta'];

unset($cityRecord, $cityName);
require ROOT_DIR . '/templates/layout.php';
