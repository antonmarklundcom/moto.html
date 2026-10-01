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
    'bajaj' => array (
      'description' => 'Motos Bajaj en Paraguay: el modelo del catálogo con ficha y precio publicado, quién distribuyó la marca y cómo elegir según el uso.',
      'intro' => 
      array (
        0 => 'Bajaj tiene tres modelos en nuestro catálogo, y por ahora sólo uno tiene datos suficientes para su propia ficha. Esta página reúne los 3 modelos de Bajaj que figuran en el catálogo, con los datos que publicó una fuente real, cada uno con la fecha en que lo consultamos.',
        1 => 'No vendemos motos ni inventamos precios: cuando un dato no tiene fuente, no lo mostramos. Lo que hacemos es ordenar lo que se sabe para que llegues a la concesionaria con las preguntas claras. Si querés consultar por un modelo, usá el botón de WhatsApp: el mensaje ya sale con el nombre de la moto.',
      ),
      'sections' => 
      array (
        0 => 
        array (
          'h2' => 'Cómo se organizan los modelos Bajaj del catálogo',
          'id' => 'tipos',
          'body' => 
          array (
            0 => 'Los modelos de Bajaj del catálogo se reparten en varios tipos. Mirarlos por tipo ayuda a comparar con la misma vara: una moto de trabajo y una de paseo no se juzgan igual.',
            1 => 
            array (
              'list' => 
              array (
                0 => '**Naked y de calle:** [Boxer 150](/motos/bajaj/boxer-150), Rouser NS 200.',
                1 => '**Touring:** Dominar 400.',
              ),
            ),
            2 => 'Los modelos Dominar 400 y Rouser NS 200 figuran en el catálogo, pero todavía no tienen datos suficientes con fuente para una ficha propia. No publicamos una página sin fuentes: cuando las sumemos, aparecen en la lista.',
          ),
        ),
        1 => 
        array (
          'h2' => 'Quién distribuye Bajaj en Paraguay y dónde consultar',
          'id' => 'distribuidor',
          'body' => 
          array (
            0 => 'El distribuidor de Bajaj que figura en nuestra fuente es Asunción Motor Sport S.A. (AMS), y está citado arriba de esta página con su fecha de consulta. La fuente que citamos es una nota de La Nación de 2019 sobre la llegada de Bajaj a Paraguay, que nombra a Asunción Motor Sport S.A. (AMS) como la empresa a cargo. Es una fuente de hace varios años: la distribución puede haber cambiado, y por eso conviene confirmarla con el comercio.',
            1 => 'Para saber disponibilidad, colores y formas de pago de un modelo, lo más directo es preguntar en una concesionaria o en el distribuidor. Podés escribirnos por WhatsApp para ordenar la consulta, pero el precio final, la entrega y la financiación los define siempre el comercio.',
            2 => 
            array (
              'verify' => 'Distribuidor actual de Bajaj en Paraguay: confirmar en el sitio de la marca o con el comercio, porque la fuente es de 2019.',
            ),
            3 => 
            array (
              'verify' => 'Sucursales y teléfonos de la red oficial de Bajaj en Paraguay: confirmar en el sitio del distribuidor.',
            ),
          ),
        ),
        2 => 
        array (
          'h2' => 'Qué mirar al elegir una moto Bajaj',
          'id' => 'elegir',
          'body' => 
          array (
            0 => 'Antes de comparar modelos, definí para qué la vas a usar. Una moto para ir y volver del trabajo en la ciudad se elige distinto que una para salir a caminos de tierra o para trabajar todo el día.',
            1 => 'Para la ciudad y el uso diario suelen alcanzar las naked: mirá la cilindrada, los frenos y el tipo de arranque, y comprobá que el taller de tu zona conozca el modelo.',
            2 => 'Las de tipo touring están pensadas para distancias largas: revisá la cilindrada, el tanque y el equipamiento que figura en la ficha, y pensá en el costo de mantenerlas.',
            3 => 'Si pensás en una usada, leé primero [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen) y [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para decidir la cilindrada, mirá [125, 150 o 200 cc: cuál elegir](/guias/125-150-o-200-cc-cual-elegir), y para cuidar la moto después, [qué incluye un service](/guias/service-de-moto-que-incluye).',
          ),
        ),
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Quién distribuye Bajaj en Paraguay?',
          'a' => 'Según la fuente que citamos arriba, Asunción Motor Sport S.A. (AMS). Confirmalo siempre con la concesionaria, porque la red puede cambiar.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo el precio de una moto Bajaj?',
          'a' => 'En la ficha de cada modelo, en la sección de precio, cuando una fuente real lo publicó. Siempre figura quién lo publicó y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Por qué no todos los modelos Bajaj tienen ficha?',
          'a' => 'Porque no publicamos una ficha sin datos con fuente. Los modelos sin datos suficientes quedan en la lista, sin enlace, hasta que los sumemos.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
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
            2 => 'Algunos modelos, como la CB 500X, la CG 110, la NX500, la Rebel 500, la CRF 250F y la X-ADV 750, figuran en el catálogo pero todavía no tienen una ficha con datos suficientes. No publicamos una página hasta tener fuentes: apenas las sumemos, aparecen en la lista.',
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
          'h2' => 'Qué mirar al elegir una moto Honda',
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
    'kenton' => array (
      'description' => 'Motos Kenton en Paraguay: modelos del catálogo con ficha y precio publicado, quién distribuye la marca y cómo elegir según el uso.',
      'intro' => 
      array (
        0 => 'Kenton es, por lejos, la marca con más modelos en nuestro catálogo: va desde motos de trabajo hasta cuatriciclos, motocarros y eléctricas. Esta página reúne los 37 modelos de Kenton que figuran en el catálogo, con los datos que publicó una fuente real, cada uno con la fecha en que lo consultamos.',
        1 => 'No vendemos motos ni inventamos precios: cuando un dato no tiene fuente, no lo mostramos. Lo que hacemos es ordenar lo que se sabe para que llegues a la concesionaria con las preguntas claras. Si querés consultar por un modelo, usá el botón de WhatsApp: el mensaje ya sale con el nombre de la moto.',
      ),
      'sections' => 
      array (
        0 => 
        array (
          'h2' => 'Cómo se organizan los modelos Kenton del catálogo',
          'id' => 'tipos',
          'body' => 
          array (
            0 => 'Los modelos de Kenton del catálogo se reparten en varios tipos. Mirarlos por tipo ayuda a comparar con la misma vara: una moto de trabajo y una de paseo no se juzgan igual.',
            1 => 
            array (
              'list' => 
              array (
                0 => '**Naked y de calle:** [Classic 125](/motos/kenton/classic-125), [Classic 150](/motos/kenton/classic-150), [Forza 150](/motos/kenton/forza-150), [GL 125](/motos/kenton/gl-125), [GL 150](/motos/kenton/gl-150), [GL 150 Pro](/motos/kenton/gl-150-pro), [GTR 150](/motos/kenton/gtr-150), [GTR 150 LTD](/motos/kenton/gtr-150-ltd), [GTR 200 LTD](/motos/kenton/gtr-200-ltd), [Stratta 200](/motos/kenton/stratta-200).',
                1 => '**Scooters:** [Bravo 125](/motos/kenton/bravo-125), [Quick 125](/motos/kenton/quick-125), [Road Power 170](/motos/kenton/road-power-170), [Spark 150](/motos/kenton/spark-150), [Symphony 125S](/motos/kenton/symphony-125s).',
                2 => '**Cub:** [Blitz 110](/motos/kenton/blitz-110), [Blitz 125 Sport](/motos/kenton/blitz-125-sport), [Fusion 125](/motos/kenton/fusion-125), [Fusion 135](/motos/kenton/fusion-135).',
                3 => '**Enduro y cross:** [DKR 150](/motos/kenton/dkr-150), [DKR 200](/motos/kenton/dkr-200), [Shark 150](/motos/kenton/shark-150), [Shark 200](/motos/kenton/shark-200), [Skua 150](/motos/kenton/skua-150).',
                4 => '**Cuatriciclos:** [Bull 200](/motos/kenton/bull-200), [Quest 200](/motos/kenton/quest-200), [Quest 300 4x4](/motos/kenton/quest-300-4x4), [Quest ATV 500 4x4](/motos/kenton/quest-atv-500-4x4), [Volkano 125](/motos/kenton/volkano-125), [Volkano 150 Off Road](/motos/kenton/volkano-150-off-road), [Volkano 250 Off Road](/motos/kenton/volkano-250-off-road).',
                5 => '**Motocarros de carga:** [Transporter 150 HD](/motos/kenton/transporter-150-hd), [Transporter 180](/motos/kenton/transporter-180), [Transporter 210 HD](/motos/kenton/transporter-210-hd).',
                6 => '**Eléctricas:** [E-Kenton Next V1](/motos/kenton/e-kenton-next-v1), [E-Kenton Next V3](/motos/kenton/e-kenton-next-v3), [E-Kenton Next V5](/motos/kenton/e-kenton-next-v5).',
              ),
            ),
          ),
        ),
        1 => 
        array (
          'h2' => 'Quién distribuye Kenton en Paraguay y dónde consultar',
          'id' => 'distribuidor',
          'body' => 
          array (
            0 => 'El distribuidor de Kenton que figura en nuestra fuente es Chacomer S.A.E., y está citado arriba de esta página con su fecha de consulta. La fuente que citamos es la página de Kenton en el sitio de Chacomer, que figura como distribuidor. Los precios que mostramos en cada ficha figuran con quién los publicó, que en la mayoría de los casos es Kenton o Chacomer, y con su fecha de consulta.',
            1 => 'Para saber disponibilidad, colores y formas de pago de un modelo, lo más directo es preguntar en una concesionaria o en el distribuidor. Podés escribirnos por WhatsApp para ordenar la consulta, pero el precio final, la entrega y la financiación los define siempre el comercio.',
            2 => 
            array (
              'verify' => 'Sucursales y teléfonos de la red oficial de Kenton en Paraguay: confirmar en el sitio del distribuidor.',
            ),
          ),
        ),
        2 => 
        array (
          'h2' => 'Qué mirar al elegir una moto Kenton',
          'id' => 'elegir',
          'body' => 
          array (
            0 => 'Antes de comparar modelos, definí para qué la vas a usar. Una moto para ir y volver del trabajo en la ciudad se elige distinto que una para salir a caminos de tierra o para trabajar todo el día.',
            1 => 'Para la ciudad y el uso diario suelen alcanzar las naked: mirá la cilindrada, los frenos y el tipo de arranque, y comprobá que el taller de tu zona conozca el modelo.',
            2 => 'Los scooters tienen transmisión automática: son cómodos en el tránsito, pero conviene preguntar por el servicio de la transmisión y por las cubiertas, que en ruedas chicas se gastan más rápido.',
            3 => 'Las motos tipo cub son las clásicas de trabajo: mecánica simple y repuestos de desgaste fáciles de conseguir. Si las vas a usar todo el día, pesan más el consumo y el mantenimiento que la potencia.',
            4 => 'Las de tipo enduro o cross se piensan para caminos de tierra y para el campo: fijate en los frenos, la suspensión y las cubiertas, y calculá que el polvo exige cuidar el filtro de aire.',
            5 => 'Si pensás en una usada, leé primero [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen) y [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para decidir la cilindrada, mirá [125, 150 o 200 cc: cuál elegir](/guias/125-150-o-200-cc-cual-elegir), y para cuidar la moto después, [qué incluye un service](/guias/service-de-moto-que-incluye).',
          ),
        ),
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos arriba, Chacomer S.A.E.. Confirmalo siempre con la concesionaria, porque la red puede cambiar.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo el precio de una moto Kenton?',
          'a' => 'En la ficha de cada modelo, en la sección de precio, cuando una fuente real lo publicó. Siempre figura quién lo publicó y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Por qué no todos los modelos Kenton tienen ficha?',
          'a' => 'Todos los modelos del catálogo tienen ficha. Si falta algún dato en una, es porque todavía no tiene fuente.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star' => array (
      'description' => 'Motos Star en Paraguay: modelos del catálogo con ficha y precio publicado, quién distribuye la marca y cómo elegir según el uso.',
      'intro' => 
      array (
        0 => 'Star es una de las marcas que más modelos tiene en nuestro catálogo de motos que se consiguen en Paraguay. Esta página reúne los 16 modelos de Star que figuran en el catálogo, con los datos que publicó una fuente real, cada uno con la fecha en que lo consultamos.',
        1 => 'No vendemos motos ni inventamos precios: cuando un dato no tiene fuente, no lo mostramos. Lo que hacemos es ordenar lo que se sabe para que llegues a la concesionaria con las preguntas claras. Si querés consultar por un modelo, usá el botón de WhatsApp: el mensaje ya sale con el nombre de la moto.',
      ),
      'sections' => 
      array (
        0 => 
        array (
          'h2' => 'Cómo se organizan los modelos Star del catálogo',
          'id' => 'tipos',
          'body' => 
          array (
            0 => 'Los modelos de Star del catálogo se reparten en varios tipos. Mirarlos por tipo ayuda a comparar con la misma vara: una moto de trabajo y una de paseo no se juzgan igual.',
            1 => 
            array (
              'list' => 
              array (
                0 => '**Naked y de calle:** [150-X](/motos/star/150-x), [FXZ 150](/motos/star/fxz-150), [NT-A 150](/motos/star/nt-a-150), [RX4 150](/motos/star/rx4-150), [Star 125](/motos/star/star-125), [Star 150](/motos/star/star-150), [Star 200](/motos/star/star-200).',
                1 => '**Scooters:** [A1 110](/motos/star/a1-110), [Genius 125](/motos/star/genius-125), [Magic 125](/motos/star/magic-125).',
                2 => '**Cub:** [Dax 110](/motos/star/dax-110), [Dax-A 110](/motos/star/dax-a-110), [XRM 150](/motos/star/xrm-150).',
                3 => '**Enduro y cross:** [New Desert 150](/motos/star/new-desert-150), [SMX 150](/motos/star/smx-150), [XVR 200](/motos/star/xvr-200).',
              ),
            ),
          ),
        ),
        1 => 
        array (
          'h2' => 'Quién distribuye Star en Paraguay y dónde consultar',
          'id' => 'distribuidor',
          'body' => 
          array (
            0 => 'El distribuidor de Star que figura en nuestra fuente es Alex S.A., y está citado arriba de esta página con su fecha de consulta. La fuente que citamos para la distribución es una nota de ABC Color sobre Star en Paraguay, que nombra a Alex S.A. como distribuidor. Alex S.A. también aparece como publicador de precios de varios modelos de la marca en la sección de precio de cada ficha.',
            1 => 'Para saber disponibilidad, colores y formas de pago de un modelo, lo más directo es preguntar en una concesionaria o en el distribuidor. Podés escribirnos por WhatsApp para ordenar la consulta, pero el precio final, la entrega y la financiación los define siempre el comercio.',
            2 => 
            array (
              'verify' => 'Sucursales y teléfonos de la red oficial de Star en Paraguay: confirmar en el sitio del distribuidor.',
            ),
          ),
        ),
        2 => 
        array (
          'h2' => 'Qué mirar al elegir una moto Star',
          'id' => 'elegir',
          'body' => 
          array (
            0 => 'Antes de comparar modelos, definí para qué la vas a usar. Una moto para ir y volver del trabajo en la ciudad se elige distinto que una para salir a caminos de tierra o para trabajar todo el día.',
            1 => 'Para la ciudad y el uso diario suelen alcanzar las naked: mirá la cilindrada, los frenos y el tipo de arranque, y comprobá que el taller de tu zona conozca el modelo.',
            2 => 'Los scooters tienen transmisión automática: son cómodos en el tránsito, pero conviene preguntar por el servicio de la transmisión y por las cubiertas, que en ruedas chicas se gastan más rápido.',
            3 => 'Las motos tipo cub son las clásicas de trabajo: mecánica simple y repuestos de desgaste fáciles de conseguir. Si las vas a usar todo el día, pesan más el consumo y el mantenimiento que la potencia.',
            4 => 'Las de tipo enduro o cross se piensan para caminos de tierra y para el campo: fijate en los frenos, la suspensión y las cubiertas, y calculá que el polvo exige cuidar el filtro de aire.',
            5 => 'Si pensás en una usada, leé primero [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen) y [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para decidir la cilindrada, mirá [125, 150 o 200 cc: cuál elegir](/guias/125-150-o-200-cc-cual-elegir), y para cuidar la moto después, [qué incluye un service](/guias/service-de-moto-que-incluye).',
          ),
        ),
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos arriba, Alex S.A.. Confirmalo siempre con la concesionaria, porque la red puede cambiar.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo el precio de una moto Star?',
          'a' => 'En la ficha de cada modelo, en la sección de precio, cuando una fuente real lo publicó. Siempre figura quién lo publicó y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Por qué no todos los modelos Star tienen ficha?',
          'a' => 'Todos los modelos del catálogo tienen ficha. Si falta algún dato en una, es porque todavía no tiene fuente.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'suzuki' => array (
      'description' => 'Motos Suzuki en Paraguay: modelos del catálogo con ficha y precio publicado, quién distribuye la marca y cómo elegir según el uso.',
      'intro' => 
      array (
        0 => 'Suzuki tiene en nuestro catálogo modelos de calle, de enduro y de tipo touring. Esta página reúne los 7 modelos de Suzuki que figuran en el catálogo, con los datos que publicó una fuente real, cada uno con la fecha en que lo consultamos.',
        1 => 'No vendemos motos ni inventamos precios: cuando un dato no tiene fuente, no lo mostramos. Lo que hacemos es ordenar lo que se sabe para que llegues a la concesionaria con las preguntas claras. Si querés consultar por un modelo, usá el botón de WhatsApp: el mensaje ya sale con el nombre de la moto.',
        2 => 'Varios modelos de Suzuki tienen el precio publicado en dólares (US$) y no en guaraníes. Lo mostramos tal como lo publicó la fuente, sin convertirlo, porque el tipo de cambio cambia todos los días.',
      ),
      'sections' => 
      array (
        0 => 
        array (
          'h2' => 'Cómo se organizan los modelos Suzuki del catálogo',
          'id' => 'tipos',
          'body' => 
          array (
            0 => 'Los modelos de Suzuki del catálogo se reparten en varios tipos. Mirarlos por tipo ayuda a comparar con la misma vara: una moto de trabajo y una de paseo no se juzgan igual.',
            1 => 
            array (
              'list' => 
              array (
                0 => '**Naked y de calle:** [Gixxer 150](/motos/suzuki/gixxer-150), [Gixxer 250](/motos/suzuki/gixxer-250).',
                1 => '**Enduro y cross:** [DR 650](/motos/suzuki/dr-650).',
                2 => '**Touring:** [V-Strom 1050](/motos/suzuki/v-strom-1050), [V-Strom 250](/motos/suzuki/v-strom-250), [V-Strom 650](/motos/suzuki/v-strom-650), [V-Strom 800](/motos/suzuki/v-strom-800).',
              ),
            ),
          ),
        ),
        1 => 
        array (
          'h2' => 'Quién distribuye Suzuki en Paraguay y dónde consultar',
          'id' => 'distribuidor',
          'body' => 
          array (
            0 => 'El distribuidor de Suzuki que figura en nuestra fuente es Chacomer S.A.E., y está citado arriba de esta página con su fecha de consulta. La fuente que citamos es una nota de ABC Color con el título «Suzuki Motos regresa a Paraguay con Chacomer», que nombra a Chacomer S.A.E. como la empresa a cargo de la marca. Como la distribución puede cambiar, confirmá siempre con la concesionaria.',
            1 => 'Para saber disponibilidad, colores y formas de pago de un modelo, lo más directo es preguntar en una concesionaria o en el distribuidor. Podés escribirnos por WhatsApp para ordenar la consulta, pero el precio final, la entrega y la financiación los define siempre el comercio.',
            2 => 
            array (
              'verify' => 'Sucursales y teléfonos de la red oficial de Suzuki en Paraguay: confirmar en el sitio del distribuidor.',
            ),
          ),
        ),
        2 => 
        array (
          'h2' => 'Qué mirar al elegir una moto Suzuki',
          'id' => 'elegir',
          'body' => 
          array (
            0 => 'Antes de comparar modelos, definí para qué la vas a usar. Una moto para ir y volver del trabajo en la ciudad se elige distinto que una para salir a caminos de tierra o para trabajar todo el día.',
            1 => 'Para la ciudad y el uso diario suelen alcanzar las naked: mirá la cilindrada, los frenos y el tipo de arranque, y comprobá que el taller de tu zona conozca el modelo.',
            2 => 'Las de tipo enduro o cross se piensan para caminos de tierra y para el campo: fijate en los frenos, la suspensión y las cubiertas, y calculá que el polvo exige cuidar el filtro de aire.',
            3 => 'Las de tipo touring están pensadas para distancias largas: revisá la cilindrada, el tanque y el equipamiento que figura en la ficha, y pensá en el costo de mantenerlas.',
            4 => 'Si pensás en una usada, leé primero [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen) y [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para decidir la cilindrada, mirá [125, 150 o 200 cc: cuál elegir](/guias/125-150-o-200-cc-cual-elegir), y para cuidar la moto después, [qué incluye un service](/guias/service-de-moto-que-incluye).',
          ),
        ),
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Quién distribuye Suzuki en Paraguay?',
          'a' => 'Según la fuente que citamos arriba, Chacomer S.A.E.. Confirmalo siempre con la concesionaria, porque la red puede cambiar.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo el precio de una moto Suzuki?',
          'a' => 'En la ficha de cada modelo, en la sección de precio, cuando una fuente real lo publicó. Siempre figura quién lo publicó y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Por qué no todos los modelos Suzuki tienen ficha?',
          'a' => 'Todos los modelos del catálogo tienen ficha. Si falta algún dato en una, es porque todavía no tiene fuente.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'tvs' => array (
      'description' => 'Motos TVS en Paraguay: modelos del catálogo con ficha y precio publicado, quién distribuye la marca y cómo elegir según el uso.',
      'intro' => 
      array (
        0 => 'TVS figura en nuestro catálogo con modelos de calle y de tipo cub. Esta página reúne los 7 modelos de TVS que figuran en el catálogo, con los datos que publicó una fuente real, cada uno con la fecha en que lo consultamos.',
        1 => 'No vendemos motos ni inventamos precios: cuando un dato no tiene fuente, no lo mostramos. Lo que hacemos es ordenar lo que se sabe para que llegues a la concesionaria con las preguntas claras. Si querés consultar por un modelo, usá el botón de WhatsApp: el mensaje ya sale con el nombre de la moto.',
      ),
      'sections' => 
      array (
        0 => 
        array (
          'h2' => 'Cómo se organizan los modelos TVS del catálogo',
          'id' => 'tipos',
          'body' => 
          array (
            0 => 'Los modelos de TVS del catálogo se reparten en varios tipos. Mirarlos por tipo ayuda a comparar con la misma vara: una moto de trabajo y una de paseo no se juzgan igual.',
            1 => 
            array (
              'list' => 
              array (
                0 => '**Naked y de calle:** [Apache RTR 160 2V](/motos/tvs/apache-rtr-160-2v), [HLX 150](/motos/tvs/hlx-150), [HLX 150 F](/motos/tvs/hlx-150-f), [Raider 125](/motos/tvs/raider-125), [Ronin 225](/motos/tvs/ronin-225), [Stryker 125](/motos/tvs/stryker-125).',
                1 => '**Cub:** [Neo NX 110](/motos/tvs/neo-nx-110).',
              ),
            ),
          ),
        ),
        1 => 
        array (
          'h2' => 'Quién distribuye TVS en Paraguay y dónde consultar',
          'id' => 'distribuidor',
          'body' => 
          array (
            0 => 'El distribuidor de TVS que figura en nuestra fuente es Chacomer S.A.E., y está citado arriba de esta página con su fecha de consulta. Según el sitio de TVS Motor Paraguay que citamos, la marca la distribuye Chacomer S.A.E. Mirá la fecha de consulta que figura arriba: es la última vez que lo comprobamos.',
            1 => 'Para saber disponibilidad, colores y formas de pago de un modelo, lo más directo es preguntar en una concesionaria o en el distribuidor. Podés escribirnos por WhatsApp para ordenar la consulta, pero el precio final, la entrega y la financiación los define siempre el comercio.',
            2 => 
            array (
              'verify' => 'Sucursales y teléfonos de la red oficial de TVS en Paraguay: confirmar en el sitio del distribuidor.',
            ),
          ),
        ),
        2 => 
        array (
          'h2' => 'Qué mirar al elegir una moto TVS',
          'id' => 'elegir',
          'body' => 
          array (
            0 => 'Antes de comparar modelos, definí para qué la vas a usar. Una moto para ir y volver del trabajo en la ciudad se elige distinto que una para salir a caminos de tierra o para trabajar todo el día.',
            1 => 'Para la ciudad y el uso diario suelen alcanzar las naked: mirá la cilindrada, los frenos y el tipo de arranque, y comprobá que el taller de tu zona conozca el modelo.',
            2 => 'Las motos tipo cub son las clásicas de trabajo: mecánica simple y repuestos de desgaste fáciles de conseguir. Si las vas a usar todo el día, pesan más el consumo y el mantenimiento que la potencia.',
            3 => 'Si pensás en una usada, leé primero [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen) y [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para decidir la cilindrada, mirá [125, 150 o 200 cc: cuál elegir](/guias/125-150-o-200-cc-cual-elegir), y para cuidar la moto después, [qué incluye un service](/guias/service-de-moto-que-incluye).',
          ),
        ),
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Quién distribuye TVS en Paraguay?',
          'a' => 'Según la fuente que citamos arriba, Chacomer S.A.E.. Confirmalo siempre con la concesionaria, porque la red puede cambiar.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo el precio de una moto TVS?',
          'a' => 'En la ficha de cada modelo, en la sección de precio, cuando una fuente real lo publicó. Siempre figura quién lo publicó y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Por qué no todos los modelos TVS tienen ficha?',
          'a' => 'Todos los modelos del catálogo tienen ficha. Si falta algún dato en una, es porque todavía no tiene fuente.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha' => array (
      'description' => 'Motos Yamaha en Paraguay: modelos del catálogo con ficha y precio publicado, quién distribuye la marca y cómo elegir según el uso.',
      'intro' => 
      array (
        0 => 'Yamaha reúne en nuestro catálogo desde motos de uso diario hasta modelos de mayor cilindrada. Esta página reúne los 11 modelos de Yamaha que figuran en el catálogo, con los datos que publicó una fuente real, cada uno con la fecha en que lo consultamos.',
        1 => 'No vendemos motos ni inventamos precios: cuando un dato no tiene fuente, no lo mostramos. Lo que hacemos es ordenar lo que se sabe para que llegues a la concesionaria con las preguntas claras. Si querés consultar por un modelo, usá el botón de WhatsApp: el mensaje ya sale con el nombre de la moto.',
        2 => 'Varios modelos de Yamaha tienen el precio publicado en dólares (US$) y no en guaraníes. Lo mostramos tal como lo publicó la fuente, sin convertirlo, porque el tipo de cambio cambia todos los días.',
      ),
      'sections' => 
      array (
        0 => 
        array (
          'h2' => 'Cómo se organizan los modelos Yamaha del catálogo',
          'id' => 'tipos',
          'body' => 
          array (
            0 => 'Los modelos de Yamaha del catálogo se reparten en varios tipos. Mirarlos por tipo ayuda a comparar con la misma vara: una moto de trabajo y una de paseo no se juzgan igual.',
            1 => 
            array (
              'list' => 
              array (
                0 => '**Naked y de calle:** [MT-03](/motos/yamaha/mt-03), [MT-07](/motos/yamaha/mt-07), [MT-09](/motos/yamaha/mt-09), [YBR125E](/motos/yamaha/ybr-125e), [YBR 125Z](/motos/yamaha/ybr-125z), [YC-Z 110](/motos/yamaha/yc-z-110).',
                1 => '**Cub:** [Crypton](/motos/yamaha/crypton).',
                2 => '**Enduro y cross:** [XTZ 125](/motos/yamaha/xtz-125), [XTZ 150](/motos/yamaha/xtz-150), [XTZ 250](/motos/yamaha/xtz-250).',
                3 => '**Touring:** [Ténéré 700](/motos/yamaha/tenere-700).',
              ),
            ),
          ),
        ),
        1 => 
        array (
          'h2' => 'Quién distribuye Yamaha en Paraguay y dónde consultar',
          'id' => 'distribuidor',
          'body' => 
          array (
            0 => 'El distribuidor de Yamaha que figura en nuestra fuente es Chacomer S.A.E., y está citado arriba de esta página con su fecha de consulta. Según la página de Yamaha Motor Paraguay que citamos, la marca la distribuye Chacomer S.A.E. Los precios de cada ficha figuran con quién los publicó y con su fecha de consulta.',
            1 => 'Para saber disponibilidad, colores y formas de pago de un modelo, lo más directo es preguntar en una concesionaria o en el distribuidor. Podés escribirnos por WhatsApp para ordenar la consulta, pero el precio final, la entrega y la financiación los define siempre el comercio.',
            2 => 
            array (
              'verify' => 'Sucursales y teléfonos de la red oficial de Yamaha en Paraguay: confirmar en el sitio del distribuidor.',
            ),
          ),
        ),
        2 => 
        array (
          'h2' => 'Qué mirar al elegir una moto Yamaha',
          'id' => 'elegir',
          'body' => 
          array (
            0 => 'Antes de comparar modelos, definí para qué la vas a usar. Una moto para ir y volver del trabajo en la ciudad se elige distinto que una para salir a caminos de tierra o para trabajar todo el día.',
            1 => 'Para la ciudad y el uso diario suelen alcanzar las naked: mirá la cilindrada, los frenos y el tipo de arranque, y comprobá que el taller de tu zona conozca el modelo.',
            2 => 'Las motos tipo cub son las clásicas de trabajo: mecánica simple y repuestos de desgaste fáciles de conseguir. Si las vas a usar todo el día, pesan más el consumo y el mantenimiento que la potencia.',
            3 => 'Las de tipo enduro o cross se piensan para caminos de tierra y para el campo: fijate en los frenos, la suspensión y las cubiertas, y calculá que el polvo exige cuidar el filtro de aire.',
            4 => 'Las de tipo touring están pensadas para distancias largas: revisá la cilindrada, el tanque y el equipamiento que figura en la ficha, y pensá en el costo de mantenerlas.',
            5 => 'Si pensás en una usada, leé primero [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen) y [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para decidir la cilindrada, mirá [125, 150 o 200 cc: cuál elegir](/guias/125-150-o-200-cc-cual-elegir), y para cuidar la moto después, [qué incluye un service](/guias/service-de-moto-que-incluye).',
          ),
        ),
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos arriba, Chacomer S.A.E.. Confirmalo siempre con la concesionaria, porque la red puede cambiar.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo el precio de una moto Yamaha?',
          'a' => 'En la ficha de cada modelo, en la sección de precio, cuando una fuente real lo publicó. Siempre figura quién lo publicó y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Por qué no todos los modelos Yamaha tienen ficha?',
          'a' => 'Todos los modelos del catálogo tienen ficha. Si falta algún dato en una, es porque todavía no tiene fuente.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    /* == /B1a == */
    /* == B1b == */
    'bmw-motorrad' => [
        'intro' => [
            'Esta es la página de **BMW Motorrad** en moto.com.py, el sitio donde juntamos motos que se venden o se vendieron en Paraguay, con datos que tienen fuente y fecha. Acá no vendemos motos ni inventamos precios: mostramos lo que publicó una fuente real y te decimos dónde preguntar el resto.',
            'El catálogo de BMW Motorrad es corto por ahora. Incluimos sólo los modelos para los que encontramos una fuente que los vincule con el mercado paraguayo, y por eso la lista de abajo es breve. Si buscás otro modelo de la marca, escribinos por WhatsApp con el nombre exacto y lo revisamos.',
        ],
        'sections' => [
            [
                'h2' => 'Cómo usar esta página',
                'body' => [
                    'Arriba ves quién distribuye la marca en Paraguay, con el enlace a la fuente que lo respalda. Abajo está la lista de modelos del catálogo; cada uno tiene su propia página con ficha técnica y, cuando una fuente lo publica, el precio con su fecha de consulta.',
                    'Los precios de motos de esta gama cambian con el tipo de cambio y con el equipamiento de cada unidad. Por eso nunca tomes un número viejo como definitivo: antes de decidir, pedile al distribuidor una cotización por escrito, con fecha y qué incluye.',
                ],
            ],
            [
                'h2' => 'Qué preguntar antes de comprar',
                'body' => [
                    'Cuando consultes por una moto de una marca importada, conviene tener claras algunas cosas antes de ir al local o escribir. Anotalas y pedí las respuestas por escrito.',
                    [
                        'list' => [
                            'Si la moto está en stock en Paraguay o hay que pedirla, y cuánto tarda.',
                            'Qué cubre la garantía y en qué talleres se hace el service.',
                            'Qué documentos entrega el distribuidor y cómo queda la moto para la chapa y la cédula.',
                            'Cuánto cuesta el primer service y qué repuestos de desgaste tiene el distribuidor en depósito.',
                            'Si hay una entrega y un plan de cuotas publicado: mirá [motos en cuotas](/motos/en-cuotas) para entender cómo funcionan.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Si buscás una moto usada de esta marca',
                'body' => [
                    'Una moto importada usada puede ser una buena compra, pero exige más cuidado con los papeles y con el origen de la unidad. Fijate que los números de chasis y de motor coincidan con la documentación y que el service se haya hecho en un taller que pueda mostrar comprobantes.',
                    'Para el resto de la revisión, la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada) te sirve como lista. Y si tenés dudas, escribinos por WhatsApp.',
                ],
            ],
        ],
        'faq' => [
            [
                'q' => '¿Quién distribuye BMW Motorrad en Paraguay?',
                'a' => 'El distribuidor figura arriba, en esta página, con el enlace a la fuente que lo respalda y la fecha en que la consultamos.',
            ],
            [
                'q' => '¿Por qué hay pocos modelos de BMW Motorrad en el catálogo?',
                'a' => 'Porque sólo incluimos los modelos que una fuente vincula con el mercado paraguayo. Si falta uno, escribinos por WhatsApp con el nombre y lo revisamos.',
            ],
            [
                'q' => '¿Muestran el precio de las motos de la marca?',
                'a' => 'Sólo si una fuente real lo publica, con su fecha de consulta. Si no hay precio publicado, preferimos no mostrar ninguno antes que inventarlo.',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'triumph' => [
        'intro' => [
            'Esta es la página de **Triumph** en moto.com.py, un sitio que reúne motos de las marcas que se venden en Paraguay, con datos que tienen fuente y fecha. No vendemos motos: te mostramos lo que publicaron fuentes reales y te ayudamos a consultar el resto.',
            'El catálogo de Triumph incluye por ahora dos modelos de la misma familia de media cilindrada. Los datos salen de las fuentes que citamos en cada página; cuando una fuente no publica un dato, no lo completamos por nuestra cuenta.',
        ],
        'sections' => [
            [
                'h2' => 'Qué ofrece cada ficha',
                'body' => [
                    'Cada modelo tiene su propia página con la ficha técnica y las fuentes de cada dato, el precio publicado cuando una fuente lo da, consejos de mantenimiento sin cifras inventadas, repuestos que conviene tener y una lista de qué revisar si la comprás usada.',
                    'Las dos motos comparten el motor y gran parte de la ficha, y se diferencian por el tipo de uso para el que fueron pensadas. Leé las dos páginas con calma y fijate en la postura, la altura y el uso que le vas a dar antes de decidir.',
                ],
            ],
            [
                'h2' => 'Dónde consultar',
                'body' => [
                    'El distribuidor de la marca en Paraguay figura arriba, con el enlace a su fuente. Es la primera puerta para confirmar disponibilidad, precio al día, colores, garantía y servicio técnico.',
                    'Si preferís que te orientemos, escribinos por WhatsApp con el nombre del modelo. No te prometemos nada: te decimos qué datos tenemos y a quién preguntarle lo que falta.',
                ],
            ],
            [
                'h2' => 'Antes de decidir',
                'body' => [
                    'Una moto de esta clase requiere pensar más allá del precio de la moto. Preguntá por el costo del service en el taller oficial, por la disponibilidad de repuestos en el país y por la garantía. Los repuestos de una marca importada pueden tardar más en llegar que los de una moto de uso masivo, y eso pesa si la usás todos los días.',
                    'Si todavía no tenés claro qué cilindrada o tipo de moto te conviene, mirá la guía de [125, 150 o 200 cc](/guias/125-150-o-200-cc-cual-elegir) y la de [moto 0 km o usada](/guias/moto-0-km-o-usada).',
                ],
            ],
        ],
        'faq' => [
            [
                'q' => '¿Quién distribuye Triumph en Paraguay?',
                'a' => 'El distribuidor figura arriba, en esta página, con su fuente y la fecha de consulta.',
            ],
            [
                'q' => '¿Qué modelos de Triumph hay en el catálogo?',
                'a' => 'Los que aparecen en la lista de modelos de esta página. Si falta uno que buscás, escribinos por WhatsApp con el nombre exacto.',
            ],
            [
                'q' => '¿Los precios de Triumph están publicados?',
                'a' => 'Sólo mostramos un precio si una fuente real lo publica, con fecha. Si no hay uno, consultá el valor al día con el distribuidor.',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'taiga' => [
        'intro' => [
            'Esta es la página de **Taiga** en moto.com.py. Reunimos los modelos de la marca que figuran con datos en fuentes paraguayas: ficha técnica, precio publicado cuando existe y consejos para el día a día. No vendemos motos ni armamos precios propios.',
            'El catálogo de Taiga mezcla motos de uso urbano, modelos de uso mixto para caminos de tierra, un scooter y un motocarro de carga. Cada uno tiene su página, con los datos que pudimos respaldar con una fuente y la fecha de consulta.',
        ],
        'sections' => [
            [
                'h2' => 'Cómo elegir dentro de la marca',
                'body' => [
                    'Antes de mirar el precio, pensá en el uso. Si andás por ciudad con asfalto, un modelo naked o un scooter alcanza. Si hacés caminos de tierra o rutas con baches, conviene uno de uso mixto, con suspensión más larga. Y si necesitás llevar mercadería, el motocarro es otra categoría con otras reglas de mantenimiento.',
                    'Comparar dos modelos es más fácil si mirás los mismos datos en las dos fichas: cilindrada, potencia, frenos, tanque y transmisión. La guía de [125, 150 o 200 cc](/guias/125-150-o-200-cc-cual-elegir) ayuda a ordenar la decisión.',
                ],
            ],
            [
                'h2' => 'Dónde consultar',
                'body' => [
                    'El distribuidor que figura arriba, con el enlace a su fuente, es el lugar para confirmar si el modelo está disponible, qué colores hay y cuál es el precio al día. Los precios que mostramos son los que una fuente publicó en una fecha concreta, no una promesa.',
                    'Si querés una mano, escribinos por WhatsApp con el nombre del modelo. Te orientamos sobre qué preguntar y a quién.',
                ],
            ],
            [
                'h2' => 'Mantenimiento y repuestos',
                'body' => [
                    'En cualquier moto que va a trabajar o a rodar por caminos de tierra, el polvo y el calor son los enemigos: filtro de aire, cadena y aceite. Cada página de modelo tiene consejos generales sin cifras inventadas; los intervalos exactos están en el manual de cada modelo.',
                    'Si estás pensando en usada, mirá la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada) y la de [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                ],
            ],
        ],
        'faq' => [
            [
                'q' => '¿Quién distribuye Taiga en Paraguay?',
                'a' => 'El distribuidor figura arriba, en esta página, con el enlace a la fuente y la fecha en que la consultamos.',
            ],
            [
                'q' => '¿Qué tipos de moto tiene Taiga en el catálogo?',
                'a' => 'Naked para uso diario, modelos de uso mixto para caminos de tierra, un scooter y un motocarro de carga. La lista completa está en esta página.',
            ],
            [
                'q' => '¿Los precios de Taiga son actuales?',
                'a' => 'Cada precio muestra quién lo publicó y cuándo lo consultamos. Si pasa demasiado tiempo desde esa fecha, el precio se oculta solo hasta que se vuelva a verificar.',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'leopard' => [
        'intro' => [
            'Esta es la página de **Leopard** en moto.com.py. Reunimos los modelos de la marca que encontramos con datos en fuentes paraguayas, para que compares fichas técnicas y sepas a quién consultar. No vendemos motos: mostramos lo que publicaron fuentes con nombre.',
            'El catálogo de Leopard incluye motos tipo cub, para el uso diario y el trabajo, y motos naked de mayor cilindrada. Cada modelo tiene su página con los datos respaldados y consejos de mantenimiento y de compra usada.',
        ],
        'sections' => [
            [
                'h2' => 'Cub y naked: qué cambia',
                'body' => [
                    'Las cub tienen cambios semiautomáticos y no llevan palanca de embrague, y por eso son muy usadas en el trabajo, el reparto y los trayectos cortos. Las naked son motos de cambios manuales, con postura erguida, pensadas para más versatilidad y, en general, más cilindrada.',
                    'Si todavía dudás entre una y otra, la guía de [qué moto conviene para trabajar](/guias/que-moto-conviene-para-trabajar) te ayuda a ordenar prioridades: costo de uso, carga, distancia diaria y tipo de camino.',
                ],
            ],
            [
                'h2' => 'Dónde consultar',
                'body' => [
                    'El distribuidor figura arriba, con el enlace a la fuente que lo respalda. Con él podés confirmar disponibilidad, colores, garantía y precio al día. Los precios de este sitio salen de fuentes con fecha y no son una oferta.',
                    'También podés escribirnos por WhatsApp con el nombre del modelo. Te contamos qué datos tenemos y qué te conviene preguntar.',
                ],
            ],
            [
                'h2' => 'Mantenimiento básico',
                'body' => [
                    'En cualquier moto de uso diario, lo que más se nota es la falta de atención a lo simple: aceite, filtro de aire, cadena limpia y tensada, frenos y neumáticos. Con el polvo y el calor, conviene revisar esos puntos más seguido de lo que parece necesario.',
                    'Las páginas de cada modelo explican qué repuestos conviene tener a mano y qué mirar si la comprás usada; los intervalos exactos los marca el manual de cada modelo. Para calcular el gasto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
                ],
            ],
        ],
        'faq' => [
            [
                'q' => '¿Quién distribuye Leopard en Paraguay?',
                'a' => 'El distribuidor figura arriba, en esta página, con su fuente y la fecha de consulta.',
            ],
            [
                'q' => '¿Qué diferencia hay entre una cub y una naked?',
                'a' => 'La cub tiene cambios semiautomáticos, sin palanca de embrague. La naked tiene cambios manuales con embrague y suele tener más cilindrada.',
            ],
            [
                'q' => '¿Hay precios publicados de Leopard?',
                'a' => 'Sólo mostramos un precio si una fuente real lo publica con fecha. Si no figura en la ficha, consultá el valor al día con el distribuidor.',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'super-soco' => [
        'intro' => [
            'Esta es la página de **Super Soco** en moto.com.py. La marca fabrica motos eléctricas, y en el catálogo figuran los modelos que tienen precio publicado por una fuente en Paraguay. No vendemos motos: mostramos lo que publicó la fuente y te contamos qué mirar antes de comprar una eléctrica.',
            'Una moto eléctrica funciona distinto de una a nafta: no tiene tanque ni bujía, la energía sale de una batería que se carga en un enchufe, y el mantenimiento del motor es mucho menor. A cambio, la batería es la pieza que más pesa en la decisión.',
        ],
        'sections' => [
            [
                'h2' => 'Qué mirar en una moto eléctrica',
                'body' => [
                    'Antes de comparar precios, mirá estos puntos. Son los que más cambian la experiencia diaria y los que menos se notan en una foto.',
                    [
                        'list' => [
                            'La batería: tipo, capacidad y cuánto cuesta reemplazarla cuando se gasta.',
                            'El tiempo de carga y dónde vas a cargarla: en casa, en el trabajo o en la calle.',
                            'La garantía de la batería y del motor, que conviene pedir por escrito.',
                            'El servicio técnico en el país: quién la repara y con qué repuestos.',
                            'Si el modelo es para ciudad o también para ruta: la velocidad que publica la fuente está en la ficha de cada uno.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Dónde consultar',
                'body' => [
                    'El distribuidor que figura arriba, con la fuente que lo respalda, es quien puede confirmar disponibilidad, garantía, repuestos y el precio vigente. Los precios de este sitio son los que una fuente publicó en una fecha concreta y no se actualizan solos: miralos siempre junto con su fecha.',
                    'Si querés una orientación, escribinos por WhatsApp con el nombre del modelo y te decimos qué datos tenemos y qué preguntar.',
                ],
            ],
            [
                'h2' => 'Si pensás en una usada',
                'body' => [
                    'En una eléctrica usada, el estado de la batería es lo que define el valor. Pedí probarla en un recorrido real, mirá cuánto carga y cuánto dura, y asegurate de que venga con el cargador original. Revisá también los papeles: la guía de [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) explica qué pedir.',
                ],
            ],
        ],
        'faq' => [
            [
                'q' => '¿Quién distribuye Super Soco en Paraguay?',
                'a' => 'El distribuidor figura arriba, con el enlace a la fuente y la fecha de consulta.',
            ],
            [
                'q' => '¿Qué ventaja tiene una moto eléctrica?',
                'a' => 'No usa nafta ni aceite de motor y su mantenimiento mecánico es menor. A cambio, depende de una batería que se carga y que a la larga hay que reemplazar.',
            ],
            [
                'q' => '¿Cuánto cuestan los modelos de Super Soco?',
                'a' => 'Cada ficha muestra el precio que publicó una fuente, con su fecha de consulta. Si el dato es viejo, se oculta hasta que se verifique de nuevo.',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'yadea' => [
        'intro' => [
            'Esta es la página de **Yadea** en moto.com.py. La marca fabrica motos y scooters eléctricos, y en el catálogo figura el modelo que tiene precio publicado por una fuente en Paraguay. No vendemos motos: mostramos lo que publicó esa fuente y te contamos qué mirar antes de comprar una eléctrica.',
            'Una moto eléctrica se carga en un enchufe y no usa nafta, bujía ni aceite de motor. Eso simplifica el mantenimiento, pero la batería pasa a ser la pieza más importante del vehículo, tanto por su costo como por su duración.',
        ],
        'sections' => [
            [
                'h2' => 'Qué mirar antes de comprar',
                'body' => [
                    'Más allá del precio, hay datos que hacen la diferencia en el uso diario. Pedilos al distribuidor y guardá las respuestas por escrito.',
                    [
                        'list' => [
                            'Tipo y capacidad de la batería, y cuánto cuesta reemplazarla.',
                            'Cuánto tarda la carga completa y si el cargador viene incluido.',
                            'La garantía de la batería y del motor.',
                            'Qué taller se ocupa del servicio y qué repuestos tiene en el país.',
                            'Para qué recorrido está pensado el modelo: ciudad, trabajo o ruta.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Dónde consultar',
                'body' => [
                    'El distribuidor figura arriba, con el enlace a la fuente que lo respalda. Él puede confirmar disponibilidad, colores, garantía y el precio al día. El precio que mostramos es el que publicó una fuente en una fecha concreta, y se oculta solo cuando pasa demasiado tiempo sin verificarse.',
                    'Si querés una mano, escribinos por WhatsApp con el nombre del modelo.',
                ],
            ],
            [
                'h2' => 'Uso diario y cuidado de la batería',
                'body' => [
                    'Una buena rutina de carga alarga la vida de la batería: cargala con el cargador que corresponde, evitá dejarla vacía durante semanas y no la dejes al sol fuerte ni en un lugar donde se acumule agua. En épocas de lluvia, secá los conectores antes de guardar la moto.',
                    'Para comparar con motos a nafta de uso urbano, mirá la guía de [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
                ],
            ],
        ],
        'faq' => [
            [
                'q' => '¿Quién distribuye Yadea en Paraguay?',
                'a' => 'El distribuidor figura arriba, con el enlace a la fuente y la fecha de consulta.',
            ],
            [
                'q' => '¿Qué mantenimiento necesita una moto eléctrica?',
                'a' => 'No lleva cambio de aceite de motor ni bujía, pero sí frenos, neumáticos, suspensión y el cuidado de la batería y de los conectores.',
            ],
            [
                'q' => '¿El precio de Yadea es actual?',
                'a' => 'La ficha muestra el precio que publicó una fuente con su fecha de consulta; si es muy viejo, se oculta hasta que se verifique de nuevo.',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'buler' => [
        'intro' => [
            'Esta es la página de **Buler** en moto.com.py. Reunimos los modelos de la marca que encontramos con datos en fuentes paraguayas: precio publicado cuando existe, ficha técnica con fuente y consejos para el uso diario. No vendemos motos ni armamos precios propios.',
            'El catálogo de Buler tiene motos tipo cub y naked de baja cilindrada, de las que se usan para ir al trabajo, hacer mandados y repartir. Cada modelo tiene su página y algunos aparecen con versiones, por ejemplo con ruedas de rayos o de aleación.',
        ],
        'sections' => [
            [
                'h2' => 'Cómo comparar los modelos',
                'body' => [
                    'Los modelos de la marca se parecen entre sí, así que conviene mirar tres cosas: el tipo de moto (cub o naked), la cilindrada y la versión de las ruedas. Las ruedas de rayos aguantan bien los caminos malos y se reparan fácil; las de aleación son más prolijas y requieren más cuidado con los golpes.',
                    'Si todavía no sabés qué cilindrada te conviene, la guía de [125, 150 o 200 cc](/guias/125-150-o-200-cc-cual-elegir) te ayuda a decidir según tu uso y tu presupuesto.',
                ],
            ],
            [
                'h2' => 'Dónde consultar',
                'body' => [
                    'El distribuidor figura arriba, con el enlace a la fuente que lo respalda. Con él podés confirmar disponibilidad, colores, garantía y precio al día. Los precios de esta página son los que publicó una fuente en una fecha concreta, y se ocultan solos cuando pasa demasiado tiempo.',
                    'Si querés que te orientemos, escribinos por WhatsApp con el nombre del modelo.',
                ],
            ],
            [
                'h2' => 'Para el trabajo y el reparto',
                'body' => [
                    'Una moto que trabaja todos los días necesita lo básico bien cuidado: aceite, filtro de aire, cadena y frenos. El polvo de los caminos y el calor castigan esos puntos, así que revisalos seguido. Para tener una idea del gasto, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto), y para elegir según el trabajo, [qué moto conviene para trabajar](/guias/que-moto-conviene-para-trabajar).',
                ],
            ],
        ],
        'faq' => [
            [
                'q' => '¿Quién distribuye Buler en Paraguay?',
                'a' => 'El distribuidor figura arriba, con el enlace a la fuente y la fecha de consulta.',
            ],
            [
                'q' => '¿Qué versiones tienen los modelos de Buler?',
                'a' => 'Algunos aparecen con ruedas de rayos o de aleación. Cada ficha muestra las versiones que figuran en la fuente.',
            ],
            [
                'q' => '¿Los precios de Buler están al día?',
                'a' => 'Cada precio muestra quién lo publicó y cuándo lo consultamos, y se oculta solo si pasa demasiado tiempo sin verificarse.',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    /* == /B1b == */
];
