<?php
/**
 * Body of a model page. Sections carry ids (D18) and the TOC lists the ones
 * that rendered. Measured by the indexing gate: keep editorial output here
 * and chrome in templates/layout.php.
 *
 *   $key  "marca/modelo"
 */

declare(strict_types=1);

/** @var string $key */
$m = modelo($key);
if ($m === null) {
    return;
}
$edit   = content('modelos')[$key] ?? [];
$name   = modelo_name($key);
$brand  = marca((string) $m['brand']);
$specs  = modelo_sourced_specs($key);
$prices = modelo_current_prices($key);

/* Consumption, top speed and range get their own section (PLAN §2.1): they
   are separate searches ("{modelo} consumo"). */
$usageKeys  = ['consumo', 'velocidad_max', 'velocidad_maxima', 'autonomia'];
$usage      = array_intersect_key($specs, array_flip($usageKeys));
$fichaSpecs = array_diff_key($specs, $usage);

$sections = [];
ob_start();
?>
<section id="precio" class="prose">
  <h2><?= e(ui('model.price')) ?></h2>
  <?php if ($prices !== []): ?>
    <ul class="price-list">
      <?php foreach ($prices as $price): ?>
        <li><?= !empty($price['condition']) ? '<span class="price-list__cond">' . e(str_replace('0km', '0 km', (string) $price['condition'])) . '</span> ' : '' ?><?= fact_html($price, 'price') ?></li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p><?= e(ui('model.no_price')) ?></p>
  <?php endif; ?>
</section>
<?php
$sections['precio'] = [ui('model.price'), (string) ob_get_clean()];

foreach (['ficha' => [ui('model.specs'), $fichaSpecs], 'consumo' => [ui('model.consumption'), $usage]] as $id => [$label, $rows]) {
    if ($rows === []) {
        continue;
    }
    ob_start();
    ?>
<section id="<?= e($id) ?>">
  <h2><?= e($label) ?></h2>
  <div class="table-wrap">
    <table class="data-table spec-table">
      <tbody>
        <?php foreach ($rows as $specKey => $fact): ?>
          <tr><th scope="row"><?= e(spec_label((string) $specKey)) ?></th><td><?= fact_html($fact, 'spec', (string) $specKey) ?></td></tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
    <?php
    $sections[$id] = [$label, (string) ob_get_clean()];
}

foreach ([
    'mantenimiento' => [ui('model.maintenance'), 'mantenimiento'],
    'repuestos'     => [ui('model.parts'), 'repuestos'],
    'usada'         => [ui('model.used'), 'revisarUsada'],
] as $id => [$label, $field]) {
    $html = render_sections([['h2' => $label, 'id' => $id, 'body' => (array) ($edit[$field] ?? [])]]);
    if ($html !== '') {
        $sections[$id] = [$label, $html];
    }
}

$versions = render_blocks([['list' => array_filter((array) ($m['versions'] ?? []), 'is_string')]]);
if ($versions !== '') {
    $sections['versiones'] = [ui('model.versions'), '<section id="versiones" class="prose"><h2>' . e(ui('model.versions')) . '</h2>' . $versions . '</section>'];
}

$faq = visible_faq((array) ($edit['faq'] ?? []));
$toc = [];
foreach ($sections as $id => [$label]) {
    $toc[] = ['id' => $id, 'label' => $label];
}
if ($faq !== []) {
    $toc[] = ['id' => 'preguntas', 'label' => ui('page.faq')];
}
?>
<header class="content-head">
  <p class="eyebrow"><?= e((string) ($brand['name'] ?? '')) ?><?= !empty($m['years']) ? ' · ' . e((string) $m['years']) : '' ?></p>
  <h1><?= e(sprintf(ui('model.h1'), $name)) ?></h1>
  <?php if (!empty($edit['intro'])): ?>
    <div class="prose"><?= render_blocks((array) $edit['intro']) ?></div>
  <?php endif; ?>
</header>

<?php $tocItems = $toc; require ROOT_DIR . '/partials/toc.php'; ?>

<?php foreach ($sections as [, $html]): ?>
<?= $html ?>
<?php endforeach; ?>

<?php $faqItems = $faq; require ROOT_DIR . '/partials/faq.php'; ?>

<?php require ROOT_DIR . '/partials/sources.php'; ?>

<?php if (link_live(path_brand((string) $m['brand']))): ?>
  <p class="more-link"><a href="<?= e(path_brand((string) $m['brand'])) ?>"><?= e(sprintf(ui('model.brand_link'), (string) ($brand['name'] ?? $m['brand']))) ?> →</a></p>
<?php endif; ?>
