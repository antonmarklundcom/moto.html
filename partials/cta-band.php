<?php
/**
 * The closing band on every content page: "Enviar consulta" and WhatsApp.
 *
 *   $ctaTitle  string  defaults to ui('cta_band.title')
 *   $ctaLead   string  defaults to ui('cta_band.lead')
 *
 * The WhatsApp prefill is this page's own (whatsapp_text_for_page()), through
 * the tracked redirect (D10).
 */

declare(strict_types=1);

$ctaTitle = $ctaTitle ?? ui('cta_band.title');
$ctaLead  = $ctaLead ?? ui('cta_band.lead');
$ctaLink  = wa_href(whatsapp_text_for_page());
?>
<section class="section section--ink">
  <div class="container stack">
    <p class="eyebrow"><?= e(ui('cta_band.eyebrow')) ?></p>
    <h2 class="d2"><?= e($ctaTitle) ?></h2>
    <p class="lead"><?= e($ctaLead) ?></p>
    <div class="btn-row">
      <?php if ($ctaLink !== null): ?>
        <a class="btn btn--whatsapp" href="<?= e($ctaLink) ?>" rel="nofollow"
           data-service="<?= e(current_lead_slug() ?? '') ?>"><?= e(ui('cta.whatsapp_long')) ?></a>
      <?php endif; ?>
      <a class="btn btn--primary" href="/contacto"><?= e(ui('cta.consult')) ?></a>
    </div>
  </div>
</section>
<?php
unset($ctaTitle, $ctaLead, $ctaLink);
