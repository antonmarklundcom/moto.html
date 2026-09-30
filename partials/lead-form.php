<?php
/**
 * The lead form (PLAN D11). Posts to /enviar.php, which logs the lead to
 * logs/leads.jsonl and then forwards it to VenderCRM.
 *
 * Progressive enhancement: an ordinary form. Without JS the POST answers 303
 * to /gracias; with assets/js/lead-form.js it shows the same thank-you inline.
 *
 * Optional variables a caller sets before requiring this partial:
 *   $formId       string  names this form in fields.formulario ('contacto', 'modelo', …)
 *   $formSource   string  lead source slug in content/lead-values.php 'sources'
 *                         ('consulta' | 'comercial'); defaults to the page's own.
 *                         The LEAD TYPE comes from that record, server-side —
 *                         the form never posts a type
 *   $formModel    string  the model the visitor was reading about → fields.modelo
 *   $formNeed     string  pre-selected chip
 *   $formHeading  string  visible heading ('' for none)
 *
 * Named $form* on purpose: an include shares the caller's scope.
 */

declare(strict_types=1);

$formId      = $formId ?? 'contacto';
$formSource  = $formSource ?? (current_lead_slug() ?? 'consulta');
$formType    = lead_type_for($formSource);
$formLead    = lead_value($formSource);
$formModel   = mb_substr((string) ($formModel ?? ''), 0, 120);
$formNeed    = $formNeed ?? '';
$formHeading = $formHeading ?? ui('form.legend');
$formPage    = (string) ($page['path'] ?? '/');
$formUid     = preg_replace('/[^a-z0-9-]/', '-', strtolower($formId));
$formUtm     = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid'];
?>
<form class="lead-form" action="/enviar.php" method="post" data-lead-form>

  <?php if ($formHeading !== ''): ?>
    <h2 class="card-title"><?= e($formHeading) ?></h2>
  <?php endif; ?>

  <div class="lead-form__row">
    <label class="field" for="<?= e($formUid) ?>-name">
      <span><?= e(ui('form.name')) ?></span>
      <input id="<?= e($formUid) ?>-name" type="text" name="name" autocomplete="name" maxlength="200" required>
    </label>
    <label class="field" for="<?= e($formUid) ?>-phone">
      <span><?= e(ui('form.phone')) ?></span>
      <input id="<?= e($formUid) ?>-phone" type="tel" name="phone" inputmode="tel" autocomplete="tel"
             maxlength="30" placeholder="<?= e(ui('form.phone_hint')) ?>" required>
    </label>
  </div>

  <div class="lead-form__row">
    <label class="field" for="<?= e($formUid) ?>-email">
      <span><?= e(ui('form.email')) ?></span>
      <input id="<?= e($formUid) ?>-email" type="email" name="email" autocomplete="email" maxlength="320">
    </label>
    <?php if ($formType === 'comercial'): ?>
      <label class="field" for="<?= e($formUid) ?>-company">
        <span><?= e(ui('form.company')) ?></span>
        <input id="<?= e($formUid) ?>-company" type="text" name="company" autocomplete="organization" maxlength="200">
      </label>
    <?php endif; ?>
  </div>

  <?php if ($formType === 'consulta'): ?>
    <fieldset class="field">
      <legend><?= e(ui('form.need')) ?></legend>
      <div class="chip-row">
        <?php foreach ((array) content('ui')['needs'] as $formKey => $formLabel): ?>
          <input class="chip-radio" type="radio" name="need"
                 id="<?= e($formUid . '-need-' . $formKey) ?>" value="<?= e($formKey) ?>"
                 <?= $formNeed === $formKey ? 'checked' : '' ?>>
          <label class="chip" for="<?= e($formUid . '-need-' . $formKey) ?>"><?= e($formLabel) ?></label>
        <?php endforeach; ?>
      </div>
    </fieldset>

    <div class="field field--check">
      <input id="<?= e($formUid) ?>-cuotas" type="checkbox" name="cuotas" value="si">
      <label for="<?= e($formUid) ?>-cuotas"><?= e(ui('form_extra.cuotas')) ?></label>
    </div>
  <?php endif; ?>

  <label class="field" for="<?= e($formUid) ?>-message">
    <span><?= e(ui('form.message')) ?></span>
    <textarea id="<?= e($formUid) ?>-message" name="message" rows="3" maxlength="5000"
              placeholder="<?= e(ui('form.message_hint')) ?>"></textarea>
  </label>

  <!-- Honeypot: bots fill it, people never see it (INTEGRATIONS §2.7.4). -->
  <div class="honeypot" aria-hidden="true">
    <label for="<?= e($formUid) ?>-website">Website</label>
    <input id="<?= e($formUid) ?>-website" type="text" name="website" tabindex="-1" autocomplete="off">
  </div>

  <input type="hidden" name="form_id" value="<?= e($formId) ?>">
  <input type="hidden" name="source" value="<?= e($formSource) ?>">
  <input type="hidden" name="source_page" value="<?= e($formPage) ?>">
  <?php if ($formModel !== ''): ?>
    <input type="hidden" name="modelo" value="<?= e($formModel) ?>">
  <?php endif; ?>
  <?php foreach ($formUtm as $formKey): ?>
    <?php if (!empty($_GET[$formKey]) && is_string($_GET[$formKey])): ?>
      <input type="hidden" name="<?= e($formKey) ?>" value="<?= e(mb_substr($_GET[$formKey], 0, 200)) ?>">
    <?php endif; ?>
  <?php endforeach; ?>

  <button class="btn btn--primary" type="submit" data-submit
          data-sending="<?= e(ui('form.sending')) ?>"><?= e(ui('form.submit')) ?></button>

  <p class="note">
    <?= e(ui('form.privacy_note')) ?>
    <a href="/privacidad" rel="nofollow"><?= e(ui('nav.privacy')) ?></a>.
  </p>

  <?php
    $thanksLead   = $formLead;
    $thanksHidden = true;
    $thanksAttrs  = 'data-form-ok tabindex="-1"';
    require ROOT_DIR . '/partials/lead-thanks.php';
  ?>

  <p class="form-status form-status--error" data-form-error hidden role="alert">
    <strong><?= e(ui('form.error_title')) ?></strong>
    <?= e(ui('form.error_text')) ?>
  </p>
</form>
<?php
unset(
    $formId, $formSource, $formType, $formLead, $formModel, $formNeed, $formHeading,
    $formPage, $formUid, $formUtm, $formKey, $formLabel
);
