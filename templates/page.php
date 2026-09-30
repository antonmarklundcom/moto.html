<?php
/**
 * A plain static page from content/pages.php: H1, lead, optional sections,
 * the CTA band. Route file: bootstrap, $path = '/ruta', require this.
 */

declare(strict_types=1);

/** @var string $path */
$meta = page_meta($path ?? '/');

if ($meta === []) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}

$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => clean_path($path),
    'breadcrumbs' => [['label' => $meta['title'], 'path' => clean_path($path)]],
];

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">
  <section class="page-hero">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <h1><?= e(($meta['h1'] ?? '') !== '' ? $meta['h1'] : $meta['title']) ?></h1>
        <?php if (!empty($meta['lead'])): ?>
          <p class="lead"><?= inline((string) $meta['lead']) ?></p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php $pageSections = render_sections((array) ($meta['sections'] ?? [])); ?>
  <?php if ($pageSections !== ''): ?>
    <section class="section">
      <div class="container stack"><?= $pageSections ?></div>
    </section>
  <?php endif; ?>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
