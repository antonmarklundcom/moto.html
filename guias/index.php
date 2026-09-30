<?php
/**
 * The guides hub: every record in content/guias.php, in file order.
 */

require __DIR__ . '/../lib/bootstrap.php';

$meta = page_meta('/guias');
$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/guias',
    'breadcrumbs' => [['label' => ui('nav.guides'), 'path' => '/guias']],
];

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <p class="eyebrow"><?= e(ui('nav.guides')) ?></p>
        <h1><?= e($meta['h1']) ?></h1>
        <p class="lead"><?= e($meta['lead']) ?></p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <?php
      /* Only guides that pass the indexing gate are listed (PLAN §2.3.3). */
      $listGuides = array_filter(
          content('guias'),
          static fn ($g, $slug) => is_array($g) && gate_passes(path_guide((string) $slug)),
          ARRAY_FILTER_USE_BOTH
      );
      ?>
      <?php if ($listGuides === []): ?>
        <p class="lead"><?= e(ui('hub.empty')) ?></p>
      <?php else: ?>
        <div class="grid grid--3">
          <?php foreach ($listGuides as $listSlug => $listGuide): ?>
            <a class="card card--link" href="<?= e(path_guide((string) $listSlug)) ?>">
              <h2 class="card-title"><?= e($listGuide['navLabel']) ?></h2>
              <p class="card__text"><?= e($listGuide['metaDescription']) ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
