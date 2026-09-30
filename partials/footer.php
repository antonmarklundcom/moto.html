<?php
/**
 * Site footer, the floating WhatsApp button and the closing scripts. Every
 * list comes from content/nav.php and content/site.php; an empty list renders
 * nothing at all. Footer links, like the header's, skip any page the gate
 * would noindex — except the legal row, which must always be reachable.
 */

declare(strict_types=1);

$footGroups = [ui('nav.firm') => (array) nav('firm')];
?>
<footer class="site-footer">
  <div class="container">
    <div class="site-footer__cols">

      <div>
        <a class="wordmark wordmark--sm" href="/">
          <span class="wordmark__mark" aria-hidden="true"></span>
          <span class="wordmark__text"><?= e(site('domain') ?: site('name')) ?></span>
        </a>
        <p class="site-footer__blurb mt-3"><?= e(ui('footer.blurb')) ?></p>
      </div>

      <?php foreach ($footGroups as $footTitle => $footLinks): ?>
        <?php $footLinks = array_filter($footLinks, static fn (array $l): bool => gate_passes((string) $l['path'])); ?>
        <?php if ($footLinks === []) { continue; } ?>
        <div>
          <h2><?= e($footTitle) ?></h2>
          <ul>
            <?php foreach ($footLinks as $footLink): ?>
              <li><a href="<?= e($footLink['path']) ?>"><?= e($footLink['label']) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>

      <?php if (site('phone') || site('email') || nav('socials') !== []): ?>
        <div>
          <h2><?= e(ui('footer.contact')) ?></h2>
          <ul>
            <?php if (site('phone')): ?>
              <li><a href="tel:+<?= e(phone_digits(site('phone'))) ?>"><?= e(site('phone')) ?></a></li>
            <?php endif; ?>
            <?php if (site('email')): ?>
              <li><a href="mailto:<?= e(site('email')) ?>"><?= e(site('email')) ?></a></li>
            <?php endif; ?>
            <?php foreach ((array) nav('socials') as $footSocial): ?>
              <li><a href="<?= e($footSocial) ?>" rel="noopener me"><?= e(parse_url($footSocial, PHP_URL_HOST) ?: $footSocial) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

    </div>

    <div class="site-footer__legal">
      <span>&copy; <?= date('Y') ?> <?= e(site('name')) ?>. <?= e(ui('footer.rights')) ?></span>
      <?php foreach ((array) nav('legal') as $footLegal): ?>
        <a href="<?= e($footLegal['path']) ?>" rel="nofollow"><?= e($footLegal['label']) ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</footer>

<?php require ROOT_DIR . '/partials/whatsapp-fab.php'; ?>

<script src="<?= e(asset('/assets/js/analytics.js')) ?>" defer></script>
<script src="<?= e(asset('/assets/js/site.js')) ?>" defer></script>
<script src="<?= e(asset('/assets/js/whatsapp-menu.js')) ?>" defer></script>
<script src="<?= e(asset('/assets/js/lead-form.js')) ?>" defer></script>
</body>
</html>
<?php
unset($footGroups, $footTitle, $footLinks, $footLink, $footSocial, $footLegal);
