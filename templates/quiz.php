<?php
/**
 * The practice quiz block (PLAN D7, content/quiz.php), included by a guide's
 * body when the guide names a quiz. Works without JavaScript: each question
 * is a list of options and a <details> that reveals the answer and its
 * source. assets/js/tools/quiz.js (phase B5) may enhance it through the
 * data-quiz attributes. Renders nothing without a valid bank source.
 *
 *   $quizId  string  key in content/quiz.php
 */

declare(strict_types=1);

$quizRecord = content('quiz')[$quizId ?? ''] ?? null;
$quizSource = is_array($quizRecord) ? fact_source($quizRecord['source'] ?? null) : null;
$quizItems  = is_array($quizRecord) ? array_values(array_filter(
    visible((array) ($quizRecord['questions'] ?? [])),
    static fn ($q) => is_array($q) && !empty($q['q']) && is_array($q['options'] ?? null)
        && isset($q['options'][$q['answer'] ?? -1])
)) : [];

if ($quizSource !== null && $quizItems !== []):
?>
<section class="quiz" id="examen" data-quiz="<?= e((string) $quizId) ?>">
  <h2><?= e(ui('quiz.title')) ?></h2>
  <ol class="quiz__list">
    <?php foreach ($quizItems as $quizN => $quizQ): ?>
      <li class="quiz__item" data-quiz-answer="<?= e((string) (int) $quizQ['answer']) ?>">
        <p class="quiz__q"><?= e((string) $quizQ['q']) ?></p>
        <ol class="quiz__options" type="a">
          <?php foreach ($quizQ['options'] as $quizOption): ?>
            <li><?= e((string) $quizOption) ?></li>
          <?php endforeach; ?>
        </ol>
        <details>
          <summary><?= e(ui('quiz.answer')) ?></summary>
          <p><?= e(ui('quiz.correct')) ?> <strong><?= e((string) $quizQ['options'][(int) $quizQ['answer']]) ?></strong><?php if (!empty($quizQ['source'])): ?> (<?= e((string) $quizQ['source']) ?>)<?php endif; ?></p>
        </details>
      </li>
    <?php endforeach; ?>
  </ol>
  <p class="note"><?= e(ui('quiz.source')) ?> <a href="<?= e($quizSource['url']) ?>" rel="nofollow noopener"><?= e($quizSource['label']) ?></a><?php if (fact_date_ok($quizRecord['source']['accessed'] ?? null)): ?>, <?= e(ui('facts.accessed')) ?> <?= e(fmt_date_short((string) $quizRecord['source']['accessed'])) ?><?php endif; ?></p>
</section>
<?php
endif;
unset($quizId, $quizRecord, $quizSource, $quizItems, $quizN, $quizQ, $quizOption);
