<?php
/**
 * FAQ block. Native <details>, so it works without JS.
 *
 *   $faqItems  array   raw faq entries; verify blocks and incomplete entries
 *                      are dropped by visible_faq() — the same function that
 *                      feeds FAQPage JSON-LD, so the two cannot drift
 *   $faqTitle  string  heading, defaults to ui('page.faq')
 *   $faqId     string  section id, defaults to 'preguntas'
 */

declare(strict_types=1);

$faqVisible = visible_faq((array) ($faqItems ?? []));
if ($faqVisible !== []):
?>
<section class="faq-block" id="<?= e($faqId ?? 'preguntas') ?>">
  <h2><?= e($faqTitle ?? ui('page.faq')) ?></h2>
  <div class="faq mt-4">
    <?php foreach ($faqVisible as $faqItem): ?>
      <details>
        <summary><?= e($faqItem['q']) ?></summary>
        <p><?= inline($faqItem['a']) ?></p>
      </details>
    <?php endforeach; ?>
  </div>
</section>
<?php
endif;
unset($faqItems, $faqTitle, $faqId, $faqVisible, $faqItem);
