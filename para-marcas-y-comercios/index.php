<?php
/**
 * For brands and shops (B3): short and honest, no plans, prices or traffic
 * numbers. Lead form type `comercial`.
 */

require __DIR__ . '/../lib/bootstrap.php';

$meta = page_meta('/para-marcas-y-comercios');
$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/para-marcas-y-comercios',
    'leadSlug'    => 'comercial',
    'breadcrumbs' => [['label' => $meta['title'], 'path' => '/para-marcas-y-comercios']],
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
        <p class="lead"><?= inline((string) $meta['lead']) ?></p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container split split--top">
      <div class="stack prose"><?= render_sections((array) $meta['sections']) ?></div>
      <div>
        <?php
        $formId = 'comercial';
        $formSource = 'comercial';
        $formHeading = 'Contanos qué representás';
        require ROOT_DIR . '/partials/lead-form.php';
        ?>
      </div>
    </div>
  </section>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
