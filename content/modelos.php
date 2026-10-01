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
    /* == B1a == */
    'honda/cb1-125' => array (
      'intro' => 
      array (
        0 => 'La Honda CB1 125 es una moto naked de 125 cc, de calle. En esta página tenés su ficha técnica con la fuente de cada dato, el precio 0 km que publicó un comercio paraguayo y todo lo que conviene saber antes de preguntar por ella.',
        1 => 'No probamos las motos: lo que ves sale de fuentes publicadas, con fecha. Si querés confirmar disponibilidad o colores, escribinos por WhatsApp desde el botón de abajo y el mensaje ya lleva el nombre del modelo.',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para el service de una moto de esta cilindrada rige la misma lógica que para cualquier moto de calle de aire: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, y frenos revisados. Los intervalos exactos en kilómetros son los que fija el manual del propietario del modelo, y todavía no los tenemos citados acá, así que no los inventamos.',
        1 => 'Mientras tanto, estas guías te sirven de base: [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cómo tensar la cadena](/guias/como-tensar-la-cadena-de-la-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de la CB1 125 (aceite, filtros, bujía, cadena): tomar del manual del propietario de Honda Motos Paraguay.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que más se gastan en una moto de calle de este tipo son siempre los mismos, y conviene saber cuáles son antes de que fallen:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Kit de arrastre (cadena, piñón y corona), que se gasta más rápido con polvo, barro y lluvia.',
            1 => 'Pastillas de freno delanteras y traseras.',
            2 => 'Filtro de aire y filtro de aceite, que se cambian en cada service.',
            3 => 'Bujía y batería, sobre todo si la moto pasa semanas parada.',
            4 => 'Cubiertas, en la medida que figura en la ficha técnica de arriba.',
          ),
        ),
        2 => 'Pedí siempre el repuesto por el código del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona la confirma el comercio, no nosotros.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si la encontrás usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Pedí los papeles al día y compará el número de chasis y de motor con los del documento.',
            1 => 'Mirá el kit de arrastre: cadena con juego excesivo o dientes del piñón afilados indican poco cuidado.',
            2 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            3 => 'Probá el arranque en frío y escuchá ruidos raros en el motor.',
            4 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Honda CB1 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de arriba, con el comercio y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la CB1 125?',
          'a' => 'La ficha técnica de arriba indica la cilindrada con su fuente. Es una moto de 125 cc.',
        ),
        2 => 
        array (
          'q' => '¿Se consiguen repuestos de la CB1 125?',
          'a' => 'Los desgastables comunes, como kit de arrastre, pastillas y filtros, son los que primero conviene tener a mano. La disponibilidad exacta la confirma el comercio o el taller.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    /* == /B1a == */
];
