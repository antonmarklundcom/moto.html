<?php
/**
 * Site header: wordmark, primary nav and the two action pills. Every link
 * comes from content/nav.php.
 *
 * The main navigation never links a page the indexing gate would noindex
 * (PLAN §2.3.3): a nav entry whose route fails gate_passes() is skipped. A
 * page that starts passing its gate appears in the nav on the next request.
 */

declare(strict_types=1);

/* Prefixed locals: an include shares the caller's scope. */
$navCurrentPath = (string) ($page['path'] ?? '/');
$navWhatsapp    = wa_href(whatsapp_text_for_page());
$navLeadSlug    = current_lead_slug() ?? '';
$navItems       = array_values(array_filter(
    (array) nav('primary'),
    static fn (array $item): bool => gate_passes((string) $item['path'])
));
?>
<header class="site-header" data-header>
  <div class="container site-header__bar">

    <a class="wordmark" href="/">
      <span class="wordmark__mark" aria-hidden="true"></span>
      <span class="wordmark__text"><?= e(site('domain') ?: site('name')) ?></span>
    </a>

    <button class="nav-toggle" type="button"
            data-nav-toggle
            aria-expanded="false"
            aria-controls="site-nav"
            data-label-open="<?= e(ui('nav.menu')) ?>"
            data-label-close="<?= e(ui('nav.close')) ?>"><?= e(ui('nav.menu')) ?></button>

    <div class="site-header__nav" id="site-nav" data-nav>
      <ul class="site-nav">
        <?php foreach ($navItems as $navItem): ?>
          <li>
            <a href="<?= e($navItem['path']) ?>"
               <?= is_current($navItem['path'], $navCurrentPath) ? 'aria-current="page"' : '' ?>><?= e($navItem['label']) ?></a>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="nav-drawer-cta">
        <a class="btn btn--whatsapp" href="<?= e($navWhatsapp ?? '/contacto') ?>"
           <?= $navWhatsapp ? 'rel="nofollow" data-wa-trigger aria-controls="wa-menu" aria-expanded="false"' : '' ?>
           data-service="<?= e($navLeadSlug) ?>">
          <?= e($navWhatsapp ? ui('cta.whatsapp_long') : ui('cta.contact')) ?>
        </a>
        <a class="btn btn--primary" href="/contacto"><?= e(ui('cta.quote')) ?></a>
      </div>
    </div>

    <div class="site-header__actions">
      <a class="btn btn--secondary" href="<?= e($navWhatsapp ?? '/contacto') ?>"
         <?= $navWhatsapp ? 'rel="nofollow" data-wa-trigger aria-controls="wa-menu" aria-expanded="false"' : '' ?>
         data-service="<?= e($navLeadSlug) ?>">
        <?= e($navWhatsapp ? ui('cta.whatsapp') : ui('cta.contact')) ?>
      </a>
      <a class="btn btn--primary" href="/contacto"><?= e(ui('cta.quote')) ?></a>
    </div>

  </div>
</header>
<?php
unset($navCurrentPath, $navWhatsapp, $navLeadSlug, $navItems, $navItem);
