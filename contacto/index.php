<?php
/**
 * Contact: the business's own details (only the ones content/site.php actually
 * has) plus the lead form. A no-JS lead lands on /gracias; a rejected one
 * (no valid phone) comes back here with ?error=1.
 */

require __DIR__ . '/../lib/bootstrap.php';

$meta = page_meta('/contacto');
$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/contacto',
    'leadSlug'    => 'consulta',
    'breadcrumbs' => [['label' => ui('nav.contact'), 'path' => '/contacto']],
];

$hasError = isset($_GET['error']);

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <p class="eyebrow"><?= e(ui('contact.eyebrow')) ?></p>
        <h1><?= e(ui('contact.title')) ?></h1>
        <p class="lead"><?= e(ui('contact.lead')) ?></p>
      </div>
    </div>
  </section>

  <section class="section" id="solicitar">
    <div class="container split split--top">

      <div class="stack">
        <?php if ($hasError): ?>
          <p class="form-status form-status--error" role="alert">
            <strong><?= e(ui('form.error_title')) ?></strong>
            <?= e(ui('form.error_text')) ?>
          </p>
        <?php endif; ?>

        <ul class="contact-list">
          <?php if (site('phone')): ?>
            <li>
              <span class="contact-list__label"><?= e(ui('contact.phone')) ?></span>
              <a href="tel:+<?= e(phone_digits(site('phone'))) ?>"><?= e(site('phone')) ?></a>
            </li>
          <?php endif; ?>
          <?php if (site('email')): ?>
            <li>
              <span class="contact-list__label"><?= e(ui('contact.email')) ?></span>
              <a href="mailto:<?= e(site('email')) ?>"><?= e(site('email')) ?></a>
            </li>
          <?php endif; ?>
          <?php if (site('street') || site('city')): ?>
            <li>
              <span class="contact-list__label"><?= e(ui('contact.address')) ?></span>
              <?= e(trim(implode(', ', array_filter([site('street'), site('city'), site('country')])), ', ')) ?>
            </li>
          <?php endif; ?>
          <?php if (site('hours')): ?>
            <li>
              <span class="contact-list__label"><?= e(ui('contact.hours')) ?></span>
              <?= e(site('hours')) ?>
            </li>
          <?php endif; ?>
        </ul>

        <?php $contactWhatsapp = wa_href(whatsapp_text_for_page()); ?>
        <?php if ($contactWhatsapp !== null): ?>
          <div class="btn-row">
            <a class="btn btn--whatsapp" href="<?= e($contactWhatsapp) ?>" rel="nofollow">
              <?= e(ui('cta.whatsapp_long')) ?>
            </a>
          </div>
        <?php endif; ?>

        <h2><?= e(ui('contact.expect')) ?></h2>
        <ul class="checklist">
          <?php foreach (content('ui')['contact']['steps'] as $contactStep): ?>
            <li><span><?= e($contactStep) ?></span></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <?php
        $formId = 'contacto';
        require ROOT_DIR . '/partials/lead-form.php';
        ?>
      </div>

    </div>
  </section>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
