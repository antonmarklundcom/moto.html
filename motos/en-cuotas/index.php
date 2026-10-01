<?php
/**
 * /motos/en-cuotas: informational only (PLAN D8). How instalments work and
 * the dated plans a source published. No calculator, no financing form, no
 * promise. Text and the sourced table live in content/pages.php.
 */

require __DIR__ . '/../../lib/bootstrap.php';

$meta = page_meta('/motos/en-cuotas');
$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/motos/en-cuotas',
    'leadSlug'    => 'consulta',
    'breadcrumbs' => [
        ['label' => 'Motos', 'path' => '/motos'],
        ['label' => 'En cuotas', 'path' => '/motos/en-cuotas'],
    ],
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
    <div class="container stack"><?= render_sections((array) $meta['sections']) ?></div>
  </section>

  <section class="section" id="consulta">
    <div class="container split">
      <div class="stack">
        <h2 class="d2"><?= e(ui('cta_band.title')) ?></h2>
        <div class="prose"><p><?= e(ui('cta_band.lead')) ?></p></div>
        <?php $cuotasWhatsapp = wa_href('Hola, quiero consultar por una moto en cuotas.', '/motos/en-cuotas'); ?>
        <?php if ($cuotasWhatsapp !== null): ?>
          <div class="btn-row">
            <a class="btn btn--whatsapp" href="<?= e($cuotasWhatsapp) ?>" rel="nofollow" data-service="consulta"><?= e(ui('cta.whatsapp_long')) ?></a>
          </div>
        <?php endif; ?>
      </div>
      <div>
        <?php
        $formId      = 'en-cuotas';
        $formSource  = 'consulta';
        $formHeading = '';
        require ROOT_DIR . '/partials/lead-form.php';
        ?>
      </div>
    </div>
  </section>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
