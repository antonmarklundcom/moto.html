<?php
/**
 * /motos: brands and types, rendered from content/catalogo.php. A brand, type
 * or model is a link only once its page exists (link_live), so lane 2 pages
 * show up here with no edit.
 */

require __DIR__ . '/../lib/bootstrap.php';

$meta = page_meta('/motos');
$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/motos',
    'leadSlug'    => 'consulta',
    'breadcrumbs' => [['label' => 'Motos', 'path' => '/motos']],
];

$typeLabels = (array) ($meta['typeLabels'] ?? []);
$typeSlugs  = [];
foreach (modelos() as $m) {
    $typeSlugs[(string) ($m['category'] ?? '')] = true;
}
$typeSlugs = array_values(array_filter(
    array_keys($typeLabels),
    static fn (string $s): bool => isset($typeSlugs[$s])
));

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">
  <section class="page-hero">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <h1><?= e($meta['h1']) ?></h1>
        <p class="lead"><?= e($meta['lead']) ?></p>
      </div>
    </div>
  </section>

  <section class="section" id="marcas">
    <div class="container stack">
      <h2 class="d2">Marcas</h2>
      <div class="grid grid--3">
        <?php foreach (marcas() as $brandSlug => $brand): ?>
          <?php $brandPath = path_brand((string) $brandSlug); ?>
          <?php $brandTag = link_live($brandPath) ? 'a' : 'div'; ?>
          <<?= $brandTag ?> class="card<?= $brandTag === 'a' ? ' card--link' : '' ?>"<?= $brandTag === 'a' ? ' href="' . e($brandPath) . '"' : '' ?>>
            <h3 class="card-title"><?= e($brand['name']) ?></h3>
            <?php if (!empty($brand['distributor']['name'])): ?>
              <p class="card__text">Distribuidor: <?= e((string) $brand['distributor']['name']) ?></p>
            <?php endif; ?>
          </<?= $brandTag ?>>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php if ($typeSlugs !== []): ?>
  <section class="section" id="tipos">
    <div class="container stack">
      <h2 class="d2">Tipos de moto</h2>
      <div class="grid grid--3">
        <?php foreach ($typeSlugs as $typeSlug): ?>
          <?php $typePath = path_type($typeSlug); ?>
          <?php $typeTag = link_live($typePath) ? 'a' : 'div'; ?>
          <<?= $typeTag ?> class="card<?= $typeTag === 'a' ? ' card--link' : '' ?>"<?= $typeTag === 'a' ? ' href="' . e($typePath) . '"' : '' ?>>
            <h3 class="card-title"><?= e($typeLabels[$typeSlug]) ?></h3>
          </<?= $typeTag ?>>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php
  /* Models whose page exists, grouped by brand. Empty until lane 2 builds them. */
  $liveByBrand = [];
  foreach (modelos() as $modelKey => $m) {
      if (link_live(path_model((string) $modelKey))) {
          $liveByBrand[(string) $m['brand']][] = (string) $modelKey;
      }
  }
  ?>
  <?php if ($liveByBrand !== []): ?>
  <section class="section" id="modelos">
    <div class="container stack">
      <h2 class="d2">Modelos</h2>
      <?php foreach (marcas() as $brandSlug => $brand): ?>
        <?php if (isset($liveByBrand[(string) $brandSlug])): ?>
          <h3><?= e($brand['name']) ?></h3>
          <ul class="link-list">
            <?php foreach ($liveByBrand[(string) $brandSlug] as $modelKey): ?>
              <li><a href="<?= e(path_model($modelKey)) ?>"><?= e(modelo_name($modelKey)) ?></a></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endif; ?>

  <section class="section">
    <div class="container prose">
      <h2>¿Querés comprar en cuotas?</h2>
      <p>Leé <a href="/motos/en-cuotas">cómo funcionan las motos en cuotas en Paraguay</a> antes de elegir un plan.</p>
    </div>
  </section>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
