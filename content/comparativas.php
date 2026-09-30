<?php
/**
 * Comparisons, /guias/{a}-vs-{b} (phase B6). Same segment, sourced specs on
 * BOTH models, explicit criterion, no invented "winner" (PLAN D5, D7).
 *
 * Key: "{modelo-a}-vs-{modelo-b}" — the two model slugs (not the brands).
 *
 *   a, b         string   "marca/modelo" keys in content/catalogo.php
 *   title        ?string  <title> override; default "{A} vs {B}: ficha y precio"
 *   description  ?string  120–160 chars, unique
 *   criterio     blocks   how they are compared (for whom, what matters)
 *   rows         string[] spec keys shown side by side, taken from catalogo.php;
 *                          a row renders only when BOTH models have that spec
 *                          with a source
 *   body         blocks   the comparison itself
 *   faq          array
 *   published    string   YYYY-MM-DD
 *   updated      string   YYYY-MM-DD
 *
 * Gate: >= 500 words AND >= 5 rows sourced on both models.
 */

declare(strict_types=1);

return [
];
