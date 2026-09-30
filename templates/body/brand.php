<?php
/**
 * Body of a brand hub: H1, intro, the sourced distributor, the brand's models
 * (generated, not counted as words), sections, FAQ.
 *
 *   $key  brand slug
 */

declare(strict_types=1);

/** @var string $key */
$b = marca($key);
if ($b === null) {
    return;
}
$edit   = content('marcas')[$key] ?? [];
$models = modelos($key);
$dist   = $b['distributor'] ?? null;
$distOk = is_array($dist) && !empty($dist['name']) && fact_ok(['value' => $dist['name']] + $dist);
?>
<header class="content-head">
  <h1><?= e(sprintf(ui('brand.h1'), (string) $b['name'])) ?></h1>
  <?php if (!empty($edit['intro'])): ?>
    <div class="prose"><?= render_blocks((array) $edit['intro']) ?></div>
  <?php endif; ?>
  <?php if ($distOk): ?>
    <p><strong><?= e(ui('brand.distributor')) ?>:</strong> <?= fact_html(['value' => $dist['name']] + $dist) ?></p>
  <?php endif; ?>
</header>

<section id="modelos">
  <h2><?= e(sprintf(ui('brand.models'), (string) $b['name'])) ?></h2>
  <?php if ($models !== []): ?>
    <ul class="link-list" data-nocount>
      <?php foreach ($models as $mKey => $mRecord): ?>
        <li><?php if (link_live(path_model($mKey))): ?><a href="<?= e(path_model($mKey)) ?>"><?= e(modelo_name($mKey)) ?></a><?php else: ?><?= e(modelo_name($mKey)) ?><?php endif; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p data-nocount><?= e(ui('brand.no_models')) ?></p>
  <?php endif; ?>
</section>

<?= render_sections((array) ($edit['sections'] ?? [])) ?>

<?php $faqItems = (array) ($edit['faq'] ?? []); require ROOT_DIR . '/partials/faq.php'; ?>

<?php $sourcesList = (array) ($b['sources'] ?? []); require ROOT_DIR . '/partials/sources.php'; ?>
