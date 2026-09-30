<?php
/**
 * The WhatsApp menu: ONE panel per page, opened by every [data-wa-trigger].
 * Options come from whatsapp_menu(): this page first, then the sources in
 * content/lead-values.php 'whatsappMenu', then "otra consulta". Each option is
 * a wa_href() link — never wa.me directly (D10).
 *
 * Progressive enhancement: the panel ships `hidden` and every trigger is an
 * ordinary link to this page's own prefill.
 */

declare(strict_types=1);

$waMenuOptions = array_values(array_filter(
    whatsapp_menu(),
    static fn (array $waOption) => $waOption['link'] !== null
));

if ($waMenuOptions === []) {
    return;   // no WhatsApp number configured — the triggers stay plain links
}
?>
<div class="wa-menu" id="wa-menu" data-wa-menu hidden>
  <div class="wa-menu__backdrop" data-wa-close aria-hidden="true"></div>

  <div class="wa-menu__panel" role="dialog" aria-labelledby="wa-menu-title">
    <div class="wa-menu__head">
      <p class="wa-menu__title" id="wa-menu-title"><?= e(ui('whatsapp.menu_title')) ?></p>
      <button class="wa-menu__close" type="button" data-wa-close
              aria-label="<?= e(ui('whatsapp.close_menu')) ?>">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <ul class="wa-menu__list">
      <?php foreach ($waMenuOptions as $waOption): ?>
        <li>
          <a class="wa-menu__option<?= $waOption['current'] ? ' wa-menu__option--current' : '' ?>"
             href="<?= e($waOption['link']) ?>" rel="nofollow"
             data-service="<?= e($waOption['slug']) ?>">
            <span class="wa-menu__label"><?= e($waOption['label']) ?></span>
            <span class="wa-menu__text"><?= e($waOption['text']) ?></span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <p class="wa-menu__note"><?= e(ui('whatsapp.menu_note')) ?></p>
  </div>
</div>
<?php
unset($waMenuOptions, $waOption);
