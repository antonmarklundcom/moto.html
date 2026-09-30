<?php
/**
 * Guides, /guias/{slug}. Shared by three lane-2 phases, each adding only its
 * own keys inside its own block: /* == B2 == *\/ (compra, precios),
 * /* == B4 == *\/ (reparacion), /* == B5 == *\/ (tramites). Comparisons are
 * NOT here: they live in content/comparativas.php.
 *
 * Key: the slug (the Node app's slug when the guide is ported, D2).
 *
 *   group            string   'compra' | 'precios' | 'reparacion' | 'tramites'
 *   title            string   the guide's name — breadcrumb and hub card
 *   navLabel         string   short label for the /guias hub
 *   seoTitle         string   <title>, <= 60 chars (suffix added only if it fits)
 *   metaDescription  string   120–160 chars, unique site-wide
 *   query            string   the search it answers ("mi moto no arranca")
 *   published        string   YYYY-MM-DD
 *   updated          string   YYYY-MM-DD — "Actualizado el", Article, sitemap lastmod
 *   hero             array    ['h1' => …, 'lead' => …]
 *   intro            blocks   before the first section (lib/render.php render_blocks():
 *                             paragraphs with [link](/ruta) and **bold**, list, ol,
 *                             note, table, ['fact' => hecho], ['price' => hecho],
 *                             ['verify' => 'qué y dónde'])
 *   sections         array    [['h2' => …, 'id' => …, 'body' => blocks], …] — the
 *                             TOC lists every section with an id that rendered
 *   faq              array    [['q' => …, 'a' => …], …] → FAQPage
 *   links            array    [['path' => '/motos/honda', 'label' => …], …] — "Seguí leyendo"
 *   related          string[] sibling guide slugs (cards at the foot)
 *   quiz             ?string  id in content/quiz.php (B5's exam guide)
 *   sources          array    [['label','url','accessed'], …] listed under "Fuentes"
 *
 * Gate: >= 600 rendered words AND >= 2 internal links (anywhere in the body:
 * inline links, links[], related[]).
 */

declare(strict_types=1);

return [
];
