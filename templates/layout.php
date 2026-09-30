<?php
/**
 * The frame every content template shares: head, header, breadcrumbs, the
 * rendered body, the lead form, the CTA band, footer. Lane-2 phases never
 * edit it; they fill content.
 *
 *   $page        array   lib/seo.php keys
 *   $layoutBody  string  page_body() output — printed as is; it is exactly what
 *                        the indexing gate measured
 *   $layoutForm  ?array  lead form options: formId, formSource, formModel,
 *                        formHeading. null for no form
 */

declare(strict_types=1);

/** @var array $page */
/** @var string $layoutBody */
$layoutForm = $layoutForm ?? null;

/* A crumb whose page does not exist yet (the /motos hub before T1, a brand
   before B1) is dropped from the visible trail AND the BreadcrumbList. */
$page['breadcrumbs'] = array_values(array_filter(
    (array) ($page['breadcrumbs'] ?? []),
    static fn (array $crumb): bool => link_live((string) $crumb['path'])
));

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">
  <div class="container content-page">
    <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
    <article class="content-body">
<?= $layoutBody ?>
    </article>
  </div>

  <?php if (is_array($layoutForm)): ?>
    <section class="section section--surface" id="consulta">
      <div class="container split split--top">
        <div class="stack">
          <p class="eyebrow"><?= e(ui('guide.delegate_eyebrow')) ?></p>
          <h2><?= e(ui('guide.delegate_title')) ?></h2>
          <p class="lead"><?= e(ui('guide.delegate_lead')) ?></p>
        </div>
        <div>
          <?php
          $formId      = (string) ($layoutForm['formId'] ?? 'pagina');
          $formSource  = $layoutForm['formSource'] ?? null;
          $formModel   = $layoutForm['formModel'] ?? '';
          $formHeading = $layoutForm['formHeading'] ?? ui('guide.delegate_form_heading');
          if ($formSource === null) {
              unset($formSource);
          }
          require ROOT_DIR . '/partials/lead-form.php';
          ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
