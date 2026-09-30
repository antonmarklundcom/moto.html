<?php
/**
 * A guide, /guias/{slug} (content/guias.php). Route file (three lines):
 *
 *     <?php require __DIR__ . '/../../lib/bootstrap.php';
 *     $key = 'moto-no-arranca';
 *     require ROOT_DIR . '/templates/guide.php';
 */

declare(strict_types=1);

/** @var string $key */
$guideRecord = content('guias')[$key ?? ''] ?? null;
if (!is_array($guideRecord)) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}

$page = [
    'title'        => (string) (($guideRecord['seoTitle'] ?? '') !== '' ? $guideRecord['seoTitle'] : $guideRecord['title']),
    'description'  => (string) ($guideRecord['metaDescription'] ?? ''),
    'path'         => path_guide($key),
    'ogType'       => 'article',
    'breadcrumbs'  => [
        ['label' => ui('nav.guides'), 'path' => '/guias'],
        ['label' => (string) $guideRecord['title'], 'path' => path_guide($key)],
    ],
    'faq'          => visible_faq((array) ($guideRecord['faq'] ?? [])),
    'article'      => [
        'headline'      => (string) ($guideRecord['hero']['h1'] ?? $guideRecord['title']),
        'datePublished' => $guideRecord['published'] ?? null,
        'dateModified'  => $guideRecord['updated'] ?? null,
        'description'   => $guideRecord['metaDescription'] ?? null,
    ],
    'leadSlug'     => 'consulta',
    'whatsappText' => sprintf('Hola, leí la guía "%s" y quiero consultar.', (string) $guideRecord['title']),
];

$layoutBody = page_body('guide', $key);
$layoutForm = ['formId' => 'guia', 'formSource' => 'consulta'];

unset($guideRecord);
require ROOT_DIR . '/templates/layout.php';
