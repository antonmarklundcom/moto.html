<?php
/**
 * Body of a guide: H1, lead, date, intro, TOC, sections, the quiz (B5's exam
 * guide), FAQ, "Seguí leyendo" links, related guides, sources.
 *
 *   $key  guide slug
 */

declare(strict_types=1);

/** @var string $key */
$g = content('guias')[$key] ?? null;
if (!is_array($g)) {
    return;
}
$sectionsHtml = render_sections((array) ($g['sections'] ?? []));
$toc = [];
foreach (visible((array) ($g['sections'] ?? [])) as $s) {
    if (is_array($s) && !empty($s['id']) && !empty($s['h2']) && render_sections([$s]) !== '') {
        $toc[] = ['id' => (string) $s['id'], 'label' => (string) $s['h2']];
    }
}
$faq = visible_faq((array) ($g['faq'] ?? []));
if ($faq !== []) {
    $toc[] = ['id' => 'preguntas', 'label' => ui('page.faq')];
}
$links = array_values(array_filter(
    (array) ($g['links'] ?? []),
    static fn ($l) => is_array($l) && !empty($l['path']) && !empty($l['label']) && link_live((string) $l['path'])
));
?>
<header class="content-head">
  <h1><?= e((string) ($g['hero']['h1'] ?? $g['title'])) ?></h1>
  <?php if (!empty($g['hero']['lead'])): ?>
    <p class="lead"><?= inline((string) $g['hero']['lead']) ?></p>
  <?php endif; ?>
  <?php if (!empty($g['updated']) && fact_date_ok($g['updated'])): ?>
    <p class="note" data-nocount><?= e(ui('page.updated')) ?> <?= e(fmt_date_long((string) $g['updated'])) ?></p>
  <?php endif; ?>
</header>

<?php if (!empty($g['intro'])): ?>
  <div class="prose"><?= render_blocks((array) $g['intro']) ?></div>
<?php endif; ?>

<?php $tocItems = $toc; require ROOT_DIR . '/partials/toc.php'; ?>

<?= $sectionsHtml ?>

<?php if (!empty($g['quiz'])): ?>
  <?php $quizId = (string) $g['quiz']; require ROOT_DIR . '/templates/quiz.php'; ?>
<?php endif; ?>

<?php $faqItems = $faq; require ROOT_DIR . '/partials/faq.php'; ?>

<?php if ($links !== []): ?>
<section id="seguir-leyendo">
  <h2><?= e(ui('hubs.guides')) ?></h2>
  <ul class="link-list">
    <?php foreach ($links as $l): ?>
      <li><a href="<?= e(clean_path((string) $l['path'])) ?>"><?= e((string) $l['label']) ?></a></li>
    <?php endforeach; ?>
  </ul>
</section>
<?php endif; ?>

<?php $linkSlugs = (array) ($g['related'] ?? []); $linkTitle = ui('guide.related'); require ROOT_DIR . '/partials/guide-links.php'; ?>

<?php $sourcesList = (array) ($g['sources'] ?? []); require ROOT_DIR . '/partials/sources.php'; ?>
