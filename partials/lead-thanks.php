<?php
/**
 * The thank-you: what happens next and what to have ready. Rendered inline in
 * the form (hidden until assets/js/lead-form.js reveals it) and on /gracias
 * for the no-JS path, from the same content/lead-values.php record.
 *
 *   $thanksLead    array   a lead_value() record
 *   $thanksHidden  bool    render with `hidden` (the JS path)
 *   $thanksAttrs   string  extra attributes for the wrapper, already escaped
 */

declare(strict_types=1);

$thanksLead   = $thanksLead ?? lead_value(null);
$thanksHidden = $thanksHidden ?? false;
$thanksAttrs  = $thanksAttrs ?? '';
$thanksWa     = wa_href((string) $thanksLead['whatsappText']);
$thanksSteps  = (array) ($thanksLead['nextStep'] ?? []);
$thanksLink   = $thanksLead['nextLink'] ?? null;
?>
<div class="thanks" role="status" <?= $thanksAttrs ?><?= $thanksHidden ? ' hidden' : '' ?>>
  <p class="thanks__title"><?= e(ui('form.success_title')) ?></p>

  <?php if ($thanksSteps !== []): ?>
    <p class="thanks__next"><?= e(ui('form.thanks_next')) ?></p>
    <ul class="thanks__steps">
      <?php foreach ($thanksSteps as $thanksStep): ?>
        <li><?= e($thanksStep) ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <div class="thanks__actions">
    <?php if ($thanksWa !== null): ?>
      <a class="btn btn--whatsapp" href="<?= e($thanksWa) ?>" rel="nofollow"
         data-service="<?= e((string) ($thanksLead['slug'] ?? '')) ?>"><?= e(ui('cta.whatsapp_long')) ?></a>
    <?php endif; ?>
    <?php if (is_array($thanksLink) && !empty($thanksLink['path'])): ?>
      <a class="btn btn--secondary" href="<?= e($thanksLink['path']) ?>"><?= e($thanksLink['label'] ?? '') ?></a>
    <?php endif; ?>
  </div>
</div>
<?php
unset($thanksLead, $thanksHidden, $thanksAttrs, $thanksWa, $thanksSteps, $thanksLink, $thanksStep);
