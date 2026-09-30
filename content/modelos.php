<?php
/**
 * Model pages, /motos/{marca}/{modelo} — the editorial half, and the site's
 * traffic engine (PLAN §2.1, D18: price, specs, consumption, maintenance,
 * parts, "used" checklist, versions and FAQ on ONE URL, in sections with ids).
 * Specs and prices render from content/catalogo.php and are never retyped
 * here. Written by B1a/B1b, each inside its own /* == B1x == *\/ block.
 *
 * Key: "marca/modelo", exactly as in content/catalogo.php 'modelos'.
 *
 *   title         ?string  <title> override; default "{Marca} {Modelo}: precio en
 *                           Paraguay y ficha técnica" (no price in titles: it expires)
 *   description   ?string  120–160 chars, unique; default built from the record
 *   intro         blocks   under the H1
 *   mantenimiento blocks   #mantenimiento — intervals only with a manual as source
 *                          (['fact' => hecho]); otherwise general advice, no numbers
 *   repuestos     blocks   #repuestos
 *   revisarUsada  blocks   #usada — what to check on a used unit
 *   faq           array    [['q','a'], …]
 *   updated       string   YYYY-MM-DD
 *
 * Gate: >= 300 rendered words AND (>= 3 specs with a source OR a price
 * consulted <= 120 days ago). The spec table does count as words; the TOC
 * does not.
 */

declare(strict_types=1);

return [
];
