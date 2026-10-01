<?php
/**
 * Homepage (phase T1): an honest value line, brands and types from
 * content/catalogo.php, the guide groups that have pages, WhatsApp and the
 * consulta form. No counts, testimonials or logos.
 */

require __DIR__ . '/lib/bootstrap.php';

$meta = page_meta('/');
$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/',
    'leadSlug'    => 'consulta',
];
$homeWhatsapp = wa_href(whatsapp_text_for_page($page), '/');

$hub        = page_meta('/motos');
$typeLabels = (array) ($hub['typeLabels'] ?? []);
$usedTypes  = [];
foreach (modelos() as $m) {
    $usedTypes[(string) ($m['category'] ?? '')] = true;
}
$homeGroups = [];                       // guide groups with at least one live guide
foreach (content('guias') as $gSlug => $g) {
    if (is_array($g) && gate_passes(path_guide((string) $gSlug))) {
        $homeGroups[(string) ($g['group'] ?? 'compra')] = true;
    }
}

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">
  <section class="hero hero--home">
    <div class="container">
      <div class="hero__copy">
        <span class="pill"><span class="pill__dot" aria-hidden="true"></span><?= e(ui('home.eyebrow')) ?></span>
        <h1><?= e(ui('home.h1_lead')) ?><span class="accent"><?= e(ui('home.h1_accent')) ?></span></h1>
        <p class="lead hero__lead"><?= e(ui('home.lead')) ?></p>
        <div class="btn-row">
          <?php if ($homeWhatsapp !== null): ?>
            <a class="btn btn--whatsapp" href="<?= e($homeWhatsapp) ?>" rel="nofollow" data-service="consulta"><?= e(ui('cta.whatsapp_long')) ?></a>
          <?php endif; ?>
          <a class="btn btn--secondary" href="/motos"><?= e(ui('nav.all_services')) ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="marcas">
    <div class="container stack">
      <p class="eyebrow"><?= e(ui('home.services_eyebrow')) ?></p>
      <h2 class="d2"><?= e(ui('home.services_title')) ?></h2>
      <p class="lead"><?= e(ui('home.services_lead')) ?></p>
      <ul class="link-list">
        <?php foreach (marcas() as $brandSlug => $brand): ?>
          <li><?php if (link_live(path_brand((string) $brandSlug))): ?><a href="<?= e(path_brand((string) $brandSlug)) ?>"><?= e($brand['name']) ?></a><?php else: ?><?= e($brand['name']) ?><?php endif; ?></li>
        <?php endforeach; ?>
      </ul>
      <h3>Por tipo de moto</h3>
      <ul class="link-list">
        <?php foreach ($typeLabels as $typeSlug => $typeLabel): ?>
          <?php if (isset($usedTypes[$typeSlug])): ?>
            <li><?php if (link_live(path_type($typeSlug))): ?><a href="<?= e(path_type($typeSlug)) ?>"><?= e($typeLabel) ?></a><?php else: ?><?= e($typeLabel) ?><?php endif; ?></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
      <p class="more-link"><a href="/motos">Ver todas las marcas y tipos</a> · <a href="/motos/en-cuotas">Cómo funcionan las cuotas</a></p>
    </div>
  </section>

  <section class="section" id="por-que">
    <div class="container prose">
      <h2>Datos con fuente y fecha</h2>
      <p>Cada precio y cada dato de ficha técnica que ves acá viene de una fuente que podés abrir, con la fecha en que la consultamos. Si no encontramos un dato publicado, no lo inventamos: lo dejamos afuera. Tampoco vendemos motos ni financiamos: te mostramos información y, si querés, te respondemos por WhatsApp.</p>
    </div>
  </section>

  <?php if ($homeGroups !== []): ?>
  <section class="section" id="guias">
    <div class="container stack">
      <h2 class="d2">Las guías más buscadas</h2>
      <div class="grid grid--3">
        <?php foreach ((array) ($hub['guideGroups'] ?? []) as $groupKey => $group): ?>
          <?php if (isset($homeGroups[$groupKey])): ?>
            <a class="card card--link" href="/guias#<?= e($groupKey) ?>">
              <h3 class="card-title"><?= e($group['label']) ?></h3>
              <p class="card__text"><?= e($group['text']) ?></p>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <p class="more-link"><a href="/guias">Ver todas las guías</a></p>
    </div>
  </section>
  <?php endif; ?>

  <section class="section" id="contacto">
    <div class="container split">
      <div class="stack">
        <p class="eyebrow"><?= e(ui('cta_band.eyebrow')) ?></p>
        <h2 class="d2"><?= e(ui('cta_band.title')) ?></h2>
        <div class="prose"><p><?= e(ui('cta_band.lead')) ?></p></div>
      </div>
      <div>
        <?php
        $formId      = 'home';
        $formSource  = 'consulta';
        $formHeading = '';
        require ROOT_DIR . '/partials/lead-form.php';
        ?>
      </div>
    </div>
  </section>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
