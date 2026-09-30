<?php
/**
 * Homepage. F1 keeps it minimal and working on the new foundation; phase T1
 * owns it and replaces it with the real home (brands, types, most-read
 * guides, WhatsApp).
 */

require __DIR__ . '/lib/bootstrap.php';

$meta = page_meta('/');
$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/',
    'leadSlug'    => 'consulta',
];
$homeWhatsapp = wa_href(whatsapp_text_for_page($page), '/');

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">
  <section class="hero hero--home">
    <div class="container">
      <div class="hero__copy">
        <span class="pill"><span class="pill__dot" aria-hidden="true"></span><?= e(ui('home.eyebrow')) ?></span>
        <h1><?= e(ui('home.h1_lead')) ?><span class="accent"><?= e(ui('home.h1_accent')) ?></span></h1>
        <p class="lead hero__lead"><?= e(ui('home.lead')) ?></p>
        <div class="btn-row">
          <?php if ($homeWhatsapp !== null): ?>
            <a class="btn btn--whatsapp" href="<?= e($homeWhatsapp) ?>" rel="nofollow" data-service="consulta"><?= e(ui('cta.whatsapp_long')) ?></a>
          <?php endif; ?>
          <a class="btn btn--secondary" href="/guias"><?= e(ui('nav.guides')) ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="contacto">
    <div class="container split">
      <div class="stack">
        <p class="eyebrow"><?= e(ui('cta_band.eyebrow')) ?></p>
        <h2 class="d2"><?= e(ui('cta_band.title')) ?></h2>
        <div class="prose"><p><?= e(ui('cta_band.lead')) ?></p></div>
      </div>
      <div>
        <?php
        $formId      = 'home';
        $formSource  = 'consulta';
        $formHeading = '';
        require ROOT_DIR . '/partials/lead-form.php';
        ?>
      </div>
    </div>
  </section>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
