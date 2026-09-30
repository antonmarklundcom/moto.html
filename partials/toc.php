<?php
/**
 * "En esta página": anchors to the page's sections (PLAN §2.4 — sitelinks,
 * better CTR). Only sections that actually rendered are listed.
 *
 *   $tocItems  array  [['id' => …, 'label' => …], …]
 */

declare(strict_types=1);

$tocItems = array_values(array_filter((array) ($tocItems ?? []), static fn ($t) => !empty($t['id']) && !empty($t['label'])));
if (count($tocItems) < 2) {
    unset($tocItems);
    return;
}
?>
<nav class="toc" aria-label="<?= e(ui('page.toc')) ?>" data-nocount>
  <p class="toc__title"><?= e(ui('page.toc')) ?></p>
  <ol>
    <?php foreach ($tocItems as $tocItem): ?>
      <li><a href="#<?= e($tocItem['id']) ?>"><?= e($tocItem['label']) ?></a></li>
    <?php endforeach; ?>
  </ol>
</nav>
<?php
unset($tocItems, $tocItem);
