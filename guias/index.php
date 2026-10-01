<?php
/**
 * The guides hub: every record in content/guias.php, in file order.
 */

require __DIR__ . '/../lib/bootstrap.php';

$meta = page_meta('/guias');
$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/guias',
    'breadcrumbs' => [['label' => ui('nav.guides'), 'path' => '/guias']],
];

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <p class="eyebrow"><?= e(ui('nav.guides')) ?></p>
        <h1><?= e($meta['h1']) ?></h1>
        <p class="lead"><?= e($meta['lead']) ?></p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <?php
      /* Only pages that pass the indexing gate are listed (PLAN §2.3.3), grouped
         by 'group'. Guides come from content/guias.php, comparisons from
         content/comparativas.php; new records appear with no edit here. */
      $groupInfo = (array) (page_meta('/motos')['guideGroups'] ?? []);
      $groupInfo['comparativa'] = ['label' => 'Comparativas', 'text' => 'Dos modelos del mismo segmento, lado a lado y con la fuente de cada dato.'];
      $byGroup = [];
      foreach (content('guias') as $listSlug => $listGuide) {
          if (is_array($listGuide) && gate_passes(path_guide((string) $listSlug))) {
              $byGroup[(string) ($listGuide['group'] ?? 'compra')][] = [
                  'path' => path_guide((string) $listSlug),
                  'name' => (string) ($listGuide['navLabel'] ?? $listGuide['title'] ?? $listSlug),
                  'text' => (string) ($listGuide['metaDescription'] ?? ''),
              ];
          }
      }
      foreach (content('comparativas') as $listSlug => $listCmp) {
          if (is_array($listCmp) && gate_passes(path_comparison((string) $listSlug))) {
              $byGroup['comparativa'][] = ['path' => path_comparison((string) $listSlug), 'name' => comparison_title((string) $listSlug), 'text' => ''];
          }
      }
      ?>
      <?php if ($byGroup === []): ?>
        <p class="lead"><?= e(ui('hub.empty')) ?></p>
      <?php else: ?>
        <ul class="link-list">
          <?php foreach ($groupInfo as $groupKey => $group): ?>
            <?php if (isset($byGroup[$groupKey])): ?>
              <li><a href="#<?= e($groupKey) ?>"><?= e($group['label']) ?></a></li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
        <?php foreach ($groupInfo as $groupKey => $group): ?>
          <?php if (!isset($byGroup[$groupKey])) { continue; } ?>
          <section class="stack" id="<?= e($groupKey) ?>">
            <h2 class="d2"><?= e($group['label']) ?></h2>
            <p class="lead"><?= e($group['text']) ?></p>
            <div class="grid grid--3">
              <?php foreach ($byGroup[$groupKey] as $item): ?>
                <a class="card card--link" href="<?= e($item['path']) ?>">
                  <h3 class="card-title"><?= e($item['name']) ?></h3>
                  <?php if ($item['text'] !== ''): ?><p class="card__text"><?= e($item['text']) ?></p><?php endif; ?>
                </a>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </section>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
