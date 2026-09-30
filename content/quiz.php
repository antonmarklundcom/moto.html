<?php
/**
 * Practice questions for the driving licence theory exam (phase B5, PLAN D7).
 * Built ONLY from an official, citable question bank: questions copied
 * literally, each with its source. A guide shows a quiz by naming its id in
 * content/guias.php 'quiz'; templates/quiz.php renders it (works without JS;
 * assets/js/tools/quiz.js, B5, may enhance it).
 *
 * Key: the quiz id.
 *
 *   source     array  ['label' => …, 'url' => …, 'accessed' => 'YYYY-MM-DD'] — the bank
 *   questions  array  [['q' => …, 'options' => [texto, …], 'answer' => <index into
 *                      options>, 'source' => ?texto (article/page in the bank)], …]
 *
 * No Quiz JSON-LD (no rich result, PLAN §2.4). A quiz without a valid source
 * renders nothing.
 */

declare(strict_types=1);

return [
];
