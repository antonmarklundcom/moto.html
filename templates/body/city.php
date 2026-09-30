<?php
/**
 * Body of a city page: H1, intro, sections, the models listed for the city,
 * related guides, FAQ, sources.
 *
 *   $key  city slug
 */

declare(strict_types=1);

/** @var string $key */
$c = content('ciudades')[$key] ?? null;
if (!is_array($c)) {
    return;
}
$models = [];
foreach ((array) ($c['models'] ?? []) as $mKey) {
    if (is_string($mKey) && modelo($mKey) !== null) {
        $models[$mKey] = modelo($mKey);
    }
}
?>
<header class="content-head">
  <p class="eyebrow"><?= e((string) ($c['department'] ?? '')) ?></p>
  <h1><?= e('Motos en ' . (string) ($c['name'] ?? $key)) ?></h1>
  <?php if (!empty($c['intro'])): ?>
    <div class="prose"><?= render_blocks((array) $c['intro']) ?></div>
  <?php endif; ?>
</header>

<?= render_sections((array) ($c['sections'] ?? [])) ?>

<?php require ROOT_DIR . '/partials/model-list.php'; ?>

<?php $linkSlugs = (array) ($c['guides'] ?? []); require ROOT_DIR . '/partials/guide-links.php'; ?>

<?php $faqItems = (array) ($c['faq'] ?? []); require ROOT_DIR . '/partials/faq.php'; ?>

<?php $sourcesList = (array) ($c['sources'] ?? []); require ROOT_DIR . '/partials/sources.php'; ?>
