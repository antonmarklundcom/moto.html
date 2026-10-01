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
    /* == B1a == */
    'honda' => array (
      'description' => 'Motos Honda en Paraguay: qué modelos del catálogo tienen ficha y precio publicado, quién las distribuye y cómo elegir según el uso.',
      'intro' => 
      array (
        0 => 'Quien busca una Honda en Paraguay suele preguntar modelo por modelo: cuánto sale, qué ficha técnica tiene y si se consiguen los repuestos. Esta página reúne los modelos Honda que figuran en nuestro catálogo, cada uno con su propia ficha y con los datos que publicó una fuente real, con la fecha en que los consultamos.',
        1 => 'No vendemos motos ni inventamos precios: cuando un dato no tiene fuente, no lo mostramos. Lo que sí hacemos es ordenar lo que se sabe para que llegues a la concesionaria con las preguntas claras. Si querés consultar por un modelo en particular, usá el botón de WhatsApp de cada ficha y el mensaje ya sale con el nombre de la moto.',
      ),
      'sections' => 
      array (
        0 => 
        array (
          'h2' => 'Cómo se organizan los modelos Honda del catálogo',
          'id' => 'tipos',
          'body' => 
          array (
            0 => 'Los modelos de la lista de arriba se reparten en varios tipos de moto, y conviene mirarlos así antes de comparar precios. Una moto de trabajo y una de paseo largo no se juzgan con el mismo criterio.',
            1 => 
            array (
              'list' => 
              array (
                0 => '**Naked y de calle:** [CB1 125](/motos/honda/cb1-125) y [CB160F](/motos/honda/cb160f), dos motos de calle del catálogo.',
                1 => '**Scooter:** [Navi 110](/motos/honda/navi-110) y [DIO 110](/motos/honda/dio-110), dos scooters del catálogo.',
                2 => '**Cub:** la [Wave 110S](/motos/honda/wave), el modelo cub del catálogo.',
                3 => '**Enduro y cross:** [XR 150L](/motos/honda/xr-150), [XR 190L](/motos/honda/xr-190), [XR 250 Tornado](/motos/honda/xr-250-tornado) y [NX190](/motos/honda/nx190), para caminos de tierra y para el campo.',
              ),
            ),
            2 => 'Algunos modelos de mayor cilindrada, como la CB 500X, la NX500, la Rebel 500, la CRF 250F y la X-ADV 750, figuran en el catálogo pero todavía no tienen una ficha con datos suficientes. No publicamos una página hasta tener fuentes: apenas las sumemos, aparecen en la lista.',
          ),
        ),
        1 => 
        array (
          'h2' => 'Quién distribuye Honda en Paraguay y dónde consultar',
          'id' => 'distribuidor',
          'body' => 
          array (
            0 => 'El distribuidor que figura en nuestra fuente es DIESA S.A., que aparece citado en la presentación de la NX190 y la CB190R en ABC Color. La distribución oficial de una marca puede cambiar con los años, por eso la fuente y la fecha de consulta van siempre a la vista, arriba de esta página.',
            1 => 'Para saber disponibilidad, colores y formas de pago de un modelo concreto, lo más directo es preguntar en una concesionaria o en el distribuidor. Podés escribirnos primero por WhatsApp: te ayudamos a ordenar la consulta, pero el precio final y la entrega los define siempre el comercio.',
            2 => 
            array (
              'verify' => 'Sucursales y teléfonos de la red oficial de Honda en Paraguay: confirmar en el sitio de DIESA S.A. o de Honda Motos Paraguay.',
            ),
          ),
        ),
        2 => 
        array (
          'h2' => 'Qué mirar al elegir una Honda',
          'id' => 'elegir',
          'body' => 
          array (
            0 => 'Antes de comparar modelos, definí para qué la vas a usar. Si es para ir y volver del trabajo por la ciudad, pesan más la comodidad, el consumo y que el taller de tu barrio conozca la moto. Si vas a salir a caminos de tierra, importan la altura, los frenos y los neumáticos. Si trabajás con ella todo el día, buscá una moto simple, con repuestos fáciles de conseguir.',
            1 => 'Después mirá tres cosas en cada ficha: la cilindrada, los frenos y el tipo de arranque. Compará siempre con la misma vara, y desconfiá de cualquier precio que no diga quién lo publicó ni cuándo.',
            2 => 'Si pensás en una usada, leé primero nuestra guía para [no caer en una estafa al comprar una moto usada](/guias/como-comprar-una-moto-usada-sin-que-te-estafen) y la lista de [qué revisar antes de comprar](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para cuidar la moto después, tenés las guías de [service](/guias/service-de-moto-que-incluye) y de [cambio de aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto).',
          ),
        ),
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Quién distribuye Honda en Paraguay?',
          'a' => 'Según la nota de ABC Color que citamos, DIESA S.A. Confirmá siempre con la concesionaria, porque la red puede cambiar.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo el precio de una Honda?',
          'a' => 'En la ficha de cada modelo, en la sección de precio, cuando una fuente real lo publicó. Siempre figura quién lo publicó y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Por qué no aparecen todos los modelos Honda con ficha?',
          'a' => 'Porque no publicamos una ficha sin datos con fuente. Los modelos sin datos suficientes quedan en la lista, sin enlace, hasta que los sumemos.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    /* == /B1a == */
];
