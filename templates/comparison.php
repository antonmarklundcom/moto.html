<?php
/**
 * A comparison, /guias/{a}-vs-{b} (content/comparativas.php). Route file:
 * bootstrap, $key = '{a}-vs-{b}', require this.
 */

declare(strict_types=1);

/** @var string $key */
$cmpRecord = content('comparativas')[$key ?? ''] ?? null;
if (!is_array($cmpRecord) || modelo((string) ($cmpRecord['a'] ?? '')) === null || modelo((string) ($cmpRecord['b'] ?? '')) === null) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}
$cmpTitle = comparison_title($key);
$cmpShort = $cmpTitle . ': ficha y precio';

$page = [
    'title'        => trim((string) ($cmpRecord['title'] ?? '')) ?: (mb_strlen($cmpShort) <= TITLE_MAX ? $cmpShort : $cmpTitle),
    'description'  => seo_description(
        $cmpRecord['description'] ?? null,
        $cmpTitle . ': ficha técnica lado a lado con la fuente de cada dato, en qué se diferencian y para '
                  . 'quién conviene cada una en Paraguay.'
    ),
    'path'         => path_comparison($key),
    'ogType'       => 'article',
    'breadcrumbs'  => [
        ['label' => ui('nav.guides'), 'path' => '/guias'],
        ['label' => $cmpTitle, 'path' => path_comparison($key)],
    ],
    'faq'          => visible_faq((array) ($cmpRecord['faq'] ?? [])),
    'article'      => [
        'headline'      => $cmpTitle,
        'datePublished' => $cmpRecord['published'] ?? null,
        'dateModified'  => $cmpRecord['updated'] ?? null,
    ],
    'leadSlug'     => 'consulta',
    'whatsappText' => sprintf('Hola, estoy comparando %s y quiero consultar.', $cmpTitle),
];

$layoutBody = page_body('comparison', $key);
$layoutForm = ['formId' => 'comparativa', 'formSource' => 'consulta', 'formModel' => $cmpTitle];

unset($cmpRecord, $cmpTitle, $cmpShort);
require ROOT_DIR . '/templates/layout.php';
