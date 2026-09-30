<?php
/**
 * A generated list of catalogue models, linked where the page exists. Not
 * counted as the page's own words (data-nocount); its links do count.
 *
 *   $models  array  "marca/modelo" => record (modelos() output)
 */

declare(strict_types=1);

$mlModels = (array) ($models ?? []);
if ($mlModels !== []):
?>
<section id="modelos">
  <h2><?= e(ui('hubs.models')) ?></h2>
  <ul class="link-list" data-nocount>
    <?php foreach ($mlModels as $mlKey => $mlRecord): ?>
      <li><?php if (link_live(path_model((string) $mlKey))): ?><a href="<?= e(path_model((string) $mlKey)) ?>"><?= e(modelo_name((string) $mlKey)) ?></a><?php else: ?><?= e(modelo_name((string) $mlKey)) ?><?php endif; ?></li>
    <?php endforeach; ?>
  </ul>
</section>
<?php
endif;
unset($mlModels, $mlKey, $mlRecord);
