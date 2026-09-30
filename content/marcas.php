<?php
/**
 * Brand hub pages, /motos/{marca} — the editorial half. The facts (name,
 * distributor, models) live in content/catalogo.php (phase R1); this file adds
 * only words. Written by B1a/B1b, each inside its own /* == B1x == *\/ block.
 *
 * Key: the brand slug, exactly as in content/catalogo.php 'marcas'.
 *
 *   title        ?string  <title> override; default "Motos {Marca} en Paraguay"
 *   description  ?string  meta description, 120–160 chars, unique site-wide;
 *                          default built from the brand and its models
 *   intro        blocks   paragraphs under the H1 (lib/render.php render_blocks():
 *                          strings with [link](/ruta) and **bold**, lists,
 *                          ['fact' => hecho], ['verify' => …])
 *   sections     array    [['h2' => …, 'id' => ?, 'body' => blocks], …]
 *   faq          array    [['q' => …, 'a' => …], …] — real questions only → FAQPage
 *   updated      string   YYYY-MM-DD, the sitemap lastmod
 *
 * Gate (PLAN §2.3): >= 300 rendered words AND the catalogue's distributor with
 * a source. The list of models is generated and does not count as words.
 */

declare(strict_types=1);

return [
];
