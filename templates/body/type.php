<?php
/**
 * Body of a type hub: H1, intro, the catalogue's models of this category
 * (generated: links count, words do not), sections, related guides, FAQ.
 *
 *   $key  category slug
 */

declare(strict_types=1);

/** @var string $key */
$t = content('tipos')[$key] ?? null;
if (!is_array($t)) {
    return;
}
$models = modelos(null, $key);
?>
<header class="content-head">
  <h1><?= e((string) ($t['name'] ?? $key)) ?></h1>
  <?php if (!empty($t['intro'])): ?>
    <div class="prose"><?= render_blocks((array) $t['intro']) ?></div>
  <?php endif; ?>
</header>

<?php require ROOT_DIR . '/partials/model-list.php'; ?>

<?= render_sections((array) ($t['sections'] ?? [])) ?>

<?php $linkSlugs = (array) ($t['guides'] ?? []); require ROOT_DIR . '/partials/guide-links.php'; ?>

<?php $faqItems = (array) ($t['faq'] ?? []); require ROOT_DIR . '/partials/faq.php'; ?>
