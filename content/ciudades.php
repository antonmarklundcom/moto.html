<?php
/**
 * City pages, /motos/ciudad/{slug} (phase B3). Only cities with sourced
 * information: distributor branches and local procedures.
 *
 * Key: the city slug (slugify of the name: `asuncion`, `ciudad-del-este`, …).
 *
 *   name         string   "Ciudad del Este"
 *   department   string   "Alto Paraná"
 *   title        ?string  <title> override; default "Motos en {name}: dónde comprar y trámites"
 *   description  ?string  120–160 chars, unique
 *   intro        blocks
 *   sections     array    [['h2', 'id'?, 'body' => blocks], …]
 *   models       string[] "marca/modelo" keys to list (e.g. sold by a local branch)
 *   guides       string[] guide slugs to link
 *   faq          array
 *   sources      array    [['label' => …, 'url' => …, 'accessed' => 'YYYY-MM-DD'], …]
 *   updated      string   YYYY-MM-DD
 *
 * Gate: >= 250 own words AND >= 3 links to models or guides that pass their gate.
 */

declare(strict_types=1);

return [
];
