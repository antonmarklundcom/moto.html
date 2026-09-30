<?php
/**
 * /privacidad/ — marcador literal "Texto en revisión legal" (PLAN D15). noindex until
 * the lawyer delivers the text; the copy lives in content/pages.php.
 */

require __DIR__ . '/../lib/bootstrap.php';

$path = '/privacidad/';
$meta = page_meta($path);

$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => $path,
    'noindex'     => true,
    'breadcrumbs' => [['label' => $meta['title'], 'path' => $path]],
];

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">
  <section class="page-hero">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <h1><?= e($meta['h1']) ?></h1>
        <p class="lead"><?= e($meta['lead']) ?></p>
        <p>Si tenés una consulta mientras tanto, <a href="/contacto/">escribinos</a>.</p>
      </div>
    </div>
  </section>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
