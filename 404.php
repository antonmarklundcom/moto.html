<?php
/**
 * 404 page. Reached through ErrorDocument in .htaccess (and the matching
 * branch in router.php), and included by a template when its record does not
 * exist — hence the guard on ROOT_DIR.
 */

if (!defined('ROOT_DIR')) {
    require __DIR__ . '/lib/bootstrap.php';
}

if (!headers_sent()) {
    http_response_code(404);
}

$meta = page_meta('/404');
$page = [
    'title'       => $meta['title'] ?? '',
    'description' => $meta['description'] ?? '',
    'path'        => '/404',
    'noindex'     => true,
];

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">
  <section class="page-hero">
    <div class="container">
      <div class="page-hero__inner">
        <h1><?= e(ui('error404.title')) ?></h1>
        <p class="lead"><?= e(ui('error404.lead')) ?></p>
        <p><a href="/guias"><?= e(ui('nav.guides')) ?> →</a></p>
      </div>
    </div>
  </section>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
