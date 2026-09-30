<?php
/**
 * /gracias — where a lead lands without JavaScript (enviar.php answers 303
 * here). Never indexable (content/pages.php gate 'never'), never in the
 * sitemap, Disallowed in robots.txt. ?tipo=comercial shows that type's
 * next steps; anything else shows the consulta ones.
 */

require __DIR__ . '/../lib/bootstrap.php';

$meta       = page_meta('/gracias');
$thanksType = ($_GET['tipo'] ?? '') === 'comercial' ? 'comercial' : 'consulta';

$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/gracias',
    'noindex'     => true,
    'leadSlug'    => $thanksType,
];

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">
  <section class="page-hero">
    <div class="container">
      <div class="page-hero__inner">
        <h1><?= e($meta['h1']) ?></h1>
        <p class="lead"><?= e(ui('gracias.lead')) ?></p>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container stack">
      <?php
        $thanksLead = lead_value($thanksType);
        require ROOT_DIR . '/partials/lead-thanks.php';
      ?>
      <p><a href="/guias"><?= e(ui('gracias.back')) ?> →</a></p>
    </div>
  </section>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
