<?php
/**
 * "Guías relacionadas": links to guides (and comparisons) by slug; slugs that
 * do not exist yet are skipped, never linked.
 *
 *   $linkSlugs  string[]
 *   $linkTitle  ?string  heading, defaults to ui('hubs.guides')
 */

declare(strict_types=1);

$glItems = [];
foreach ((array) ($linkSlugs ?? []) as $glSlug) {
    $glPath   = path_guide((string) $glSlug);
    $glRecord = content('guias')[$glSlug] ?? null;
    $glLabel  = is_array($glRecord)
        ? (string) ($glRecord['navLabel'] ?? $glRecord['title'] ?? $glSlug)
        : (isset(content('comparativas')[$glSlug]) ? comparison_title((string) $glSlug) : null);
    if ($glLabel !== null && link_live($glPath)) {
        $glItems[] = ['path' => $glPath, 'label' => $glLabel];
    }
}
if ($glItems !== []):
?>
<section id="guias-relacionadas">
  <h2><?= e($linkTitle ?? ui('hubs.guides')) ?></h2>
  <ul class="link-list">
    <?php foreach ($glItems as $glItem): ?>
      <li><a href="<?= e($glItem['path']) ?>"><?= e($glItem['label']) ?></a></li>
    <?php endforeach; ?>
  </ul>
</section>
<?php
endif;
unset($linkSlugs, $linkTitle, $glItems, $glItem, $glSlug, $glPath, $glRecord, $glLabel);
