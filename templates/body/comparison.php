<?php
/**
 * Body of a comparison: H1, the criterion, the side-by-side table (only rows
 * sourced on BOTH models — comparison_rows()), the text, FAQ, links to both.
 * No invented winner (D7).
 *
 *   $key  "{a}-vs-{b}"
 */

declare(strict_types=1);

/** @var string $key */
$c = content('comparativas')[$key] ?? null;
if (!is_array($c)) {
    return;
}
$a    = (string) $c['a'];
$b    = (string) $c['b'];
$rows = comparison_rows($key);
?>
<header class="content-head">
  <h1><?= e(comparison_title($key)) ?></h1>
  <?php if (!empty($c['updated']) && fact_date_ok($c['updated'])): ?>
    <p class="note" data-nocount><?= e(ui('page.updated')) ?> <?= e(fmt_date_long((string) $c['updated'])) ?></p>
  <?php endif; ?>
</header>

<?= render_sections([['h2' => ui('compare.criterion'), 'id' => 'criterio', 'body' => (array) ($c['criterio'] ?? [])]]) ?>

<?php if ($rows !== []): ?>
<section id="ficha">
  <h2><?= e(ui('compare.table')) ?></h2>
  <div class="table-wrap">
    <table class="data-table spec-table">
      <thead><tr><th scope="col"><?= e(ui('compare.spec')) ?></th><th scope="col"><?= e(modelo_name($a)) ?></th><th scope="col"><?= e(modelo_name($b)) ?></th></tr></thead>
      <tbody>
        <?php foreach ($rows as $spec => [$fa, $fb]): ?>
          <tr><th scope="row"><?= e(spec_label((string) $spec)) ?></th><td><?= fact_html($fa) ?></td><td><?= fact_html($fb) ?></td></tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<?php endif; ?>

<section class="prose" id="comparacion">
<?= render_blocks((array) ($c['body'] ?? [])) ?>
</section>

<?php $faqItems = (array) ($c['faq'] ?? []); require ROOT_DIR . '/partials/faq.php'; ?>

<section id="modelos">
  <h2><?= e(ui('compare.models')) ?></h2>
  <ul class="link-list">
    <?php foreach ([$a, $b] as $side): ?>
      <li><?php if (link_live(path_model($side))): ?><a href="<?= e(path_model($side)) ?>"><?= e(modelo_name($side)) ?></a><?php else: ?><?= e(modelo_name($side)) ?><?php endif; ?></li>
    <?php endforeach; ?>
  </ul>
</section>
