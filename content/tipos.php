<?php
/**
 * Type hubs, /motos/tipo/{categoria} (phase B6). Only categories with >= 3
 * models in content/catalogo.php get a record.
 *
 * Key: the category slug as used in catalogo.php models' 'category'
 * (`scooter`, `naked`, `cub`, `enduro-cross`, `motocarro-carga`, `electrica`, …).
 *
 *   name         string   "Scooter" — the visible name
 *   title        ?string  <title> override; default "{name}: modelos y precios en Paraguay"
 *   description  ?string  120–160 chars, unique
 *   intro        blocks
 *   sections     array    [['h2', 'id'?, 'body' => blocks], …]
 *   guides       string[] guide slugs to link under "Guías relacionadas"
 *   faq          array
 *   updated      string   YYYY-MM-DD
 *
 * Gate: >= 250 words of its own (the generated model list is not counted)
 * AND >= 3 links to models or guides that pass their own gate.
 */

declare(strict_types=1);

return [
];
