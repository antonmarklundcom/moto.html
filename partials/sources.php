<?php
/**
 * "Fuentes": everything a page consulted, with the date (D5). Not counted as
 * the page's own words.
 *
 *   $sourcesList  array  [['label','url','accessed'], …]; defaults to the
 *                        model's catalogue sources when a model body sets $m
 */

declare(strict_types=1);

$sourcesList = array_values(array_filter(
    (array) ($sourcesList ?? ($m['sources'] ?? [])),
    static fn ($s) => is_array($s) && fact_source($s) !== null
));
if ($sourcesList !== []):
?>
<section class="sources" id="fuentes" data-nocount>
  <h2><?= e(ui('facts.sources')) ?></h2>
  <ul>
    <?php foreach ($sourcesList as $sourcesItem): ?>
      <?php $sourcesLink = fact_source($sourcesItem); ?>
      <li><a href="<?= e($sourcesLink['url']) ?>" rel="nofollow noopener"><?= e($sourcesLink['label']) ?></a><?php if (!empty($sourcesItem['accessed']) && fact_date_ok($sourcesItem['accessed'])): ?>, <?= e(ui('facts.accessed')) ?> <?= e(fmt_date_short((string) $sourcesItem['accessed'])) ?><?php endif; ?></li>
    <?php endforeach; ?>
  </ul>
</section>
<?php
endif;
unset($sourcesList, $sourcesItem, $sourcesLink);
