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
    /* == B1b == */
    'bmw-motorrad/g-310-gs' => [
        'intro' => [
            'La **BMW Motorrad G 310 GS** es una moto pensada para rutas largas y para cargar más peso que una urbana, y en nuestro catálogo figura como moto de turismo y aventura. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La BMW Motorrad G 310 GS es de la marca [BMW Motorrad](/motos/bmw-motorrad); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una BMW Motorrad G 310 GS dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del BMW Motorrad G 310 GS. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la BMW Motorrad G 310 GS (distribuidor oficial bmw-motorrad); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la BMW Motorrad G 310 GS, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Zapatas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/bmw-motorrad); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una BMW Motorrad G 310 GS usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la BMW Motorrad G 310 GS en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la BMW Motorrad G 310 GS?',
                'a' => 'En la página de [BMW Motorrad](/motos/bmw-motorrad) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la BMW Motorrad G 310 GS?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una BMW Motorrad G 310 GS usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'triumph/scrambler-400x' => [
        'intro' => [
            'La **Triumph Scrambler 400X** es una moto de suspensión larga y postura alta, pensada para combinar asfalto con caminos de tierra, y en nuestro catálogo figura como moto de uso mixto (enduro/cross). Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Triumph Scrambler 400X es de la marca [Triumph](/motos/triumph); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Triumph Scrambler 400X dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Triumph Scrambler 400X. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Triumph Scrambler 400X (distribuidor oficial triumph); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Triumph Scrambler 400X, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Zapatas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/triumph); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Triumph Scrambler 400X usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Triumph Scrambler 400X en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Triumph Scrambler 400X?',
                'a' => 'En la página de [Triumph](/motos/triumph) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Triumph Scrambler 400X?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Triumph Scrambler 400X usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'triumph/speed-400' => [
        'intro' => [
            'La **Triumph Speed 400** es una moto de uso diario, con el motor a la vista y una postura erguida, y en nuestro catálogo figura como moto naked, sin carenado. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Triumph Speed 400 es de la marca [Triumph](/motos/triumph); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Triumph Speed 400 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Triumph Speed 400. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Triumph Speed 400 (distribuidor oficial triumph); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Triumph Speed 400, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Zapatas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/triumph); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Triumph Speed 400 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Triumph Speed 400 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Triumph Speed 400?',
                'a' => 'En la página de [Triumph](/motos/triumph) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Triumph Speed 400?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Triumph Speed 400 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'taiga/mawi-125' => [
        'intro' => [
            'La **Taiga Mawi 125** es una moto de transmisión automática, sin palanca de cambios, pensada para la ciudad, y en nuestro catálogo figura como moto scooter. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Taiga Mawi 125 es de la marca [Taiga](/motos/taiga); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Taiga Mawi 125 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Al ser automática (transmisión CVT), no tiene palanca de cambios, pero la correa y los rodillos se gastan con el uso. Si notás tirones, ruidos al acelerar o que la moto pierde fuerza, pedí que se revise el sistema de transmisión en un taller de confianza.',
            'Con freno de disco, las pastillas son lo primero que se gasta: mirá su espesor y escuchá si rechinan. Más en la guía de [pastillas de freno](/guias/pastillas-de-freno-moto).',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Taiga Mawi 125. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Taiga Mawi 125 (distribuidor oficial taiga); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Taiga Mawi 125, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Correa de transmisión y rodillos.',
                    'Pastillas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/taiga); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Taiga Mawi 125 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que acelere sin tirones y sin ruido en la transmisión.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Taiga Mawi 125 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Taiga Mawi 125?',
                'a' => 'En la página de [Taiga](/motos/taiga) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Taiga Mawi 125?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Taiga Mawi 125 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'taiga/motocarro-tl200zh-3' => [
        'intro' => [
            'La **Taiga Motocarro TL200ZH-3** es un vehículo de tres ruedas con caja, pensado para llevar mercadería y no tanto para pasear, y en nuestro catálogo figura como moto motocarro de carga. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Taiga Motocarro TL200ZH-3 es de la marca [Taiga](/motos/taiga); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Un motocarro trabaja con carga y casi siempre por caminos malos, así que el mantenimiento se parece más al de una herramienta de trabajo que al de una moto de paseo. Lo más importante es no pasarse del peso para el que está pensado y repartir bien la carga en la caja.',
            'Revisá seguido el aceite del motor, la cadena o el cardán según corresponda, los frenos, el estado de los neumáticos y los puntos de apoyo de la caja. Con el polvo de los caminos de tierra, el filtro de aire se tapa antes de lo que uno cree: mirarlo cada tanto es barato y evita desgaste del motor.',
            'Si tu motocarro tiene reversa, probala de vez en cuando para que no se trabe por falta de uso. Y cuidá la caja del óxido, sobre todo en los rincones donde se junta agua después de la lluvia.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Taiga Motocarro TL200ZH-3. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Taiga Motocarro TL200ZH-3 (distribuidor oficial taiga); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para un motocarro que trabaja todos los días, lo que importa es poder reparar rápido y que el vehículo no pase semanas parado. Preguntá al distribuidor qué repuestos tiene en stock y tené a mano los que más se gastan.',
            [
                'list' => [
                    'Filtro de aire y de aceite.',
                    'Cadena o cardán, según el modelo, y sus juegos de juntas.',
                    'Pastillas o zapatas de freno.',
                    'Cubiertas de la medida del modelo, incluida la de auxilio si corresponde.',
                    'Amortiguadores, bujes y resortes de la caja.',
                    'Lámparas, fusibles y cables de luces.',
                ],
            ],
            'Anotá el número de motor y de chasis desde el primer día: te lo van a pedir en cualquier casa de repuestos para entregarte la pieza correcta.',
        ],
        'revisarUsada' => [
            'Comprar una Taiga Motocarro TL200ZH-3 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Estado de la caja de carga: óxido, soldaduras, golpes y el techo si lo tiene.',
                    'Que la reversa y los cambios entren sin saltos.',
                    'Suspensión trasera y neumáticos: un motocarro usado muchas veces viene con las cubiertas cansadas y los amortiguadores vencidos por el sobrepeso.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Taiga Motocarro TL200ZH-3 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Taiga Motocarro TL200ZH-3?',
                'a' => 'En la página de [Taiga](/motos/taiga) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Taiga Motocarro TL200ZH-3?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Taiga Motocarro TL200ZH-3 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'taiga/rally-250' => [
        'intro' => [
            'La **Taiga Rally 250** es una moto de suspensión larga y postura alta, pensada para combinar asfalto con caminos de tierra, y en nuestro catálogo figura como moto de uso mixto (enduro/cross). Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Taiga Rally 250 es de la marca [Taiga](/motos/taiga); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Taiga Rally 250 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Con freno de disco, las pastillas son lo primero que se gasta: mirá su espesor y escuchá si rechinan. Más en la guía de [pastillas de freno](/guias/pastillas-de-freno-moto).',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Taiga Rally 250. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Taiga Rally 250 (distribuidor oficial taiga); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Taiga Rally 250, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Pastillas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/taiga); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Taiga Rally 250 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Taiga Rally 250 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Taiga Rally 250?',
                'a' => 'En la página de [Taiga](/motos/taiga) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Taiga Rally 250?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Taiga Rally 250 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'taiga/tl150-cr1' => [
        'intro' => [
            'La **Taiga TL150 CR1** es una moto de uso diario, con el motor a la vista y una postura erguida, y en nuestro catálogo figura como moto naked, sin carenado. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Taiga TL150 CR1 es de la marca [Taiga](/motos/taiga); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Taiga TL150 CR1 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Según la ficha, combina freno de disco con freno de tambor atrás. El disco se controla por el espesor de las pastillas; el tambor, por el recorrido de la palanca o el pedal y por las zapatas. Ambos se ensucian con barro y agua, así que limpialos y probá que frenen parejo.',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Taiga TL150 CR1. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Taiga TL150 CR1 (distribuidor oficial taiga); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Taiga TL150 CR1, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Pastillas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/taiga); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Taiga TL150 CR1 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Taiga TL150 CR1 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Taiga TL150 CR1?',
                'a' => 'En la página de [Taiga](/motos/taiga) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Taiga TL150 CR1?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Taiga TL150 CR1 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'taiga/tl200-eclipse-pro-gen1' => [
        'intro' => [
            'La **Taiga TL200 Eclipse Pro Gen1** es una moto de uso diario, con el motor a la vista y una postura erguida, y en nuestro catálogo figura como moto naked, sin carenado. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Taiga TL200 Eclipse Pro Gen1 es de la marca [Taiga](/motos/taiga); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Taiga TL200 Eclipse Pro Gen1 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Según la ficha, combina freno de disco con freno de tambor atrás. El disco se controla por el espesor de las pastillas; el tambor, por el recorrido de la palanca o el pedal y por las zapatas. Ambos se ensucian con barro y agua, así que limpialos y probá que frenen parejo.',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Taiga TL200 Eclipse Pro Gen1. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Taiga TL200 Eclipse Pro Gen1 (distribuidor oficial taiga); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Taiga TL200 Eclipse Pro Gen1, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Pastillas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/taiga); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Taiga TL200 Eclipse Pro Gen1 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Taiga TL200 Eclipse Pro Gen1 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Taiga TL200 Eclipse Pro Gen1?',
                'a' => 'En la página de [Taiga](/motos/taiga) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Taiga TL200 Eclipse Pro Gen1?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Taiga TL200 Eclipse Pro Gen1 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'taiga/tl200-rally' => [
        'intro' => [
            'La **Taiga TL200 Rally** es una moto de suspensión larga y postura alta, pensada para combinar asfalto con caminos de tierra, y en nuestro catálogo figura como moto de uso mixto (enduro/cross). Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Taiga TL200 Rally es de la marca [Taiga](/motos/taiga); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Taiga TL200 Rally dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Con freno de disco, las pastillas son lo primero que se gasta: mirá su espesor y escuchá si rechinan. Más en la guía de [pastillas de freno](/guias/pastillas-de-freno-moto).',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Taiga TL200 Rally. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Taiga TL200 Rally (distribuidor oficial taiga); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Taiga TL200 Rally, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Pastillas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/taiga); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Taiga TL200 Rally usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Taiga TL200 Rally en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Taiga TL200 Rally?',
                'a' => 'En la página de [Taiga](/motos/taiga) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Taiga TL200 Rally?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Taiga TL200 Rally usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'taiga/tl250-cr5-gt' => [
        'intro' => [
            'La **Taiga TL250 CR5 GT** es una moto de suspensión larga y postura alta, pensada para combinar asfalto con caminos de tierra, y en nuestro catálogo figura como moto de uso mixto (enduro/cross). Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Taiga TL250 CR5 GT es de la marca [Taiga](/motos/taiga); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Taiga TL250 CR5 GT dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Con freno de disco, las pastillas son lo primero que se gasta: mirá su espesor y escuchá si rechinan. Más en la guía de [pastillas de freno](/guias/pastillas-de-freno-moto).',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Taiga TL250 CR5 GT. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Taiga TL250 CR5 GT (distribuidor oficial taiga); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Taiga TL250 CR5 GT, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Pastillas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/taiga); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Taiga TL250 CR5 GT usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Taiga TL250 CR5 GT en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Taiga TL250 CR5 GT?',
                'a' => 'En la página de [Taiga](/motos/taiga) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Taiga TL250 CR5 GT?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Taiga TL250 CR5 GT usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'leopard/hb-125-grand-tour' => [
        'intro' => [
            'La **Leopard HB 125 Grand Tour** es una moto de cambios semiautomáticos, sin palanca de embrague, de las que se ven a diario en el trabajo y en el reparto, y en nuestro catálogo figura como moto cub. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Leopard HB 125 Grand Tour es de la marca [Leopard](/motos/leopard); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Leopard HB 125 Grand Tour dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Este modelo trabaja con carburador, según la ficha. Después de varias semanas parada, la nafta vieja puede ensuciarlo y hacer que cueste arrancar: no la dejes guardada con el tanque a medias y, si notás que ahoga o se apaga en ralentí, llevala a un taller antes de que empeore. Más detalle en la guía de [carburador sucio](/guias/carburador-sucio-sintomas).',
            'Según la ficha, combina freno de disco con freno de tambor atrás. El disco se controla por el espesor de las pastillas; el tambor, por el recorrido de la palanca o el pedal y por las zapatas. Ambos se ensucian con barro y agua, así que limpialos y probá que frenen parejo.',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Leopard HB 125 Grand Tour. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Leopard HB 125 Grand Tour (distribuidor oficial leopard); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Leopard HB 125 Grand Tour, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Pastillas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/leopard); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Leopard HB 125 Grand Tour usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Leopard HB 125 Grand Tour en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Leopard HB 125 Grand Tour?',
                'a' => 'En la página de [Leopard](/motos/leopard) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Leopard HB 125 Grand Tour?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Leopard HB 125 Grand Tour usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'leopard/hb1-110' => [
        'intro' => [
            'La **Leopard HB1 110** es una moto de cambios semiautomáticos, sin palanca de embrague, de las que se ven a diario en el trabajo y en el reparto, y en nuestro catálogo figura como moto cub. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Leopard HB1 110 es de la marca [Leopard](/motos/leopard); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Leopard HB1 110 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Este modelo trabaja con carburador, según la ficha. Después de varias semanas parada, la nafta vieja puede ensuciarlo y hacer que cueste arrancar: no la dejes guardada con el tanque a medias y, si notás que ahoga o se apaga en ralentí, llevala a un taller antes de que empeore. Más detalle en la guía de [carburador sucio](/guias/carburador-sucio-sintomas).',
            'Según la ficha, combina freno de disco con freno de tambor atrás. El disco se controla por el espesor de las pastillas; el tambor, por el recorrido de la palanca o el pedal y por las zapatas. Ambos se ensucian con barro y agua, así que limpialos y probá que frenen parejo.',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Leopard HB1 110. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Leopard HB1 110 (distribuidor oficial leopard); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Leopard HB1 110, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Pastillas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/leopard); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Leopard HB1 110 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Leopard HB1 110 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Leopard HB1 110?',
                'a' => 'En la página de [Leopard](/motos/leopard) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Leopard HB1 110?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Leopard HB1 110 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'leopard/ht-150-ba' => [
        'intro' => [
            'La **Leopard HT 150 BA** es una moto de uso diario, con el motor a la vista y una postura erguida, y en nuestro catálogo figura como moto naked, sin carenado. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Leopard HT 150 BA es de la marca [Leopard](/motos/leopard); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Leopard HT 150 BA dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Leopard HT 150 BA. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Leopard HT 150 BA (distribuidor oficial leopard); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Leopard HT 150 BA, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Zapatas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/leopard); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Leopard HT 150 BA usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Leopard HT 150 BA en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Leopard HT 150 BA?',
                'a' => 'En la página de [Leopard](/motos/leopard) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Leopard HT 150 BA?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Leopard HT 150 BA usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'leopard/ht-200-ba' => [
        'intro' => [
            'La **Leopard HT 200 BA** es una moto de uso diario, con el motor a la vista y una postura erguida, y en nuestro catálogo figura como moto naked, sin carenado. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Leopard HT 200 BA es de la marca [Leopard](/motos/leopard); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Leopard HT 200 BA dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Según la ficha, combina freno de disco con freno de tambor atrás. El disco se controla por el espesor de las pastillas; el tambor, por el recorrido de la palanca o el pedal y por las zapatas. Ambos se ensucian con barro y agua, así que limpialos y probá que frenen parejo.',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Leopard HT 200 BA. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Leopard HT 200 BA (distribuidor oficial leopard); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Leopard HT 200 BA, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Pastillas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/leopard); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Leopard HT 200 BA usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Leopard HT 200 BA en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Leopard HT 200 BA?',
                'a' => 'En la página de [Leopard](/motos/leopard) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Leopard HT 200 BA?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Leopard HT 200 BA usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'leopard/kh-200' => [
        'intro' => [
            'La **Leopard KH 200** es una moto de uso diario, con el motor a la vista y una postura erguida, y en nuestro catálogo figura como moto naked, sin carenado. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Leopard KH 200 es de la marca [Leopard](/motos/leopard); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Leopard KH 200 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Es de refrigeración por aire, así que depende del flujo de aire y del aceite para sacar calor del motor. En el tráfico lento con calor fuerte conviene no exigirla de más y mantener el aceite al día.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Leopard KH 200. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Leopard KH 200 (distribuidor oficial leopard); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Leopard KH 200, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Zapatas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/leopard); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Leopard KH 200 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Leopard KH 200 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Leopard KH 200?',
                'a' => 'En la página de [Leopard](/motos/leopard) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Leopard KH 200?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Leopard KH 200 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'super-soco/tc-wanderer' => [
        'intro' => [
            'La **Super Soco TC Wanderer** es una moto que va con motor eléctrico y batería, sin nafta, sin aceite de motor y sin bujía, y en nuestro catálogo figura como moto eléctrica. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Super Soco TC Wanderer es de la marca [Super Soco](/motos/super-soco); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'En una eléctrica desaparecen el cambio de aceite del motor y la bujía, pero aparecen otros cuidados. El que más importa es la batería: cargala con el cargador que corresponde al modelo, evitá dejarla totalmente descargada por semanas y no la expongas al sol fuerte ni al agua acumulada.',
            'Seguí revisando lo mecánico, que es igual que en cualquier moto: frenos, neumáticos, suspensión, luces y los bornes y conectores, que con la humedad y el polvo del verano se ensucian. Después de un día de lluvia fuerte, secá bien la zona de la batería y los conectores antes de guardar la moto.',
            'Los datos de la batería y del motor que tenemos con fuente están en la ficha técnica. Los plazos de garantía, los ciclos de carga y cualquier intervalo de revisión dependen del fabricante y del distribuidor: pedilos por escrito al comprar.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Super Soco TC Wanderer. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Super Soco TC Wanderer (distribuidor oficial super-soco); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Los repuestos de una eléctrica dependen mucho más del distribuidor que los de una moto a nafta, porque la batería, el controlador y el motor no son piezas que se consigan en cualquier casa de repuestos. Antes de comprar, preguntá qué piezas tiene en stock el distribuidor y cuánto tarda en traer una que falte.',
            [
                'list' => [
                    'Cargador original de repuesto.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Pastillas o zapatas de freno.',
                    'Espejos, palancas, lámparas y fusibles.',
                    'Conectores y cables de la batería.',
                ],
            ],
            'Los repuestos que se rompen con las caídas (espejos, palancas, carcasas) son los mismos que en cualquier moto y se resuelven más rápido. Guardá siempre la factura y los datos del modelo y del número de serie para pedir piezas por WhatsApp o en el taller.',
        ],
        'revisarUsada' => [
            'Comprar una Super Soco TC Wanderer usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Estado de la batería: pedí que te muestren cuánto carga y cuánto dura en un recorrido real, y que traiga el cargador original.',
                    'Humedad o corrosión en los conectores y bajo el asiento, señal de que la moto se mojó.',
                    'Que el motor responda parejo al acelerar, sin cortes ni ruidos raros.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Super Soco TC Wanderer en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Super Soco TC Wanderer?',
                'a' => 'En la página de [Super Soco](/motos/super-soco) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Super Soco TC Wanderer?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Super Soco TC Wanderer usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'super-soco/tc-wanderer-pro' => [
        'intro' => [
            'La **Super Soco TC Wanderer Pro** es una moto que va con motor eléctrico y batería, sin nafta, sin aceite de motor y sin bujía, y en nuestro catálogo figura como moto eléctrica. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Super Soco TC Wanderer Pro es de la marca [Super Soco](/motos/super-soco); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'En una eléctrica desaparecen el cambio de aceite del motor y la bujía, pero aparecen otros cuidados. El que más importa es la batería: cargala con el cargador que corresponde al modelo, evitá dejarla totalmente descargada por semanas y no la expongas al sol fuerte ni al agua acumulada.',
            'Seguí revisando lo mecánico, que es igual que en cualquier moto: frenos, neumáticos, suspensión, luces y los bornes y conectores, que con la humedad y el polvo del verano se ensucian. Después de un día de lluvia fuerte, secá bien la zona de la batería y los conectores antes de guardar la moto.',
            'Los datos de la batería y del motor que tenemos con fuente están en la ficha técnica. Los plazos de garantía, los ciclos de carga y cualquier intervalo de revisión dependen del fabricante y del distribuidor: pedilos por escrito al comprar.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Super Soco TC Wanderer Pro. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Super Soco TC Wanderer Pro (distribuidor oficial super-soco); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Los repuestos de una eléctrica dependen mucho más del distribuidor que los de una moto a nafta, porque la batería, el controlador y el motor no son piezas que se consigan en cualquier casa de repuestos. Antes de comprar, preguntá qué piezas tiene en stock el distribuidor y cuánto tarda en traer una que falte.',
            [
                'list' => [
                    'Cargador original de repuesto.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Pastillas o zapatas de freno.',
                    'Espejos, palancas, lámparas y fusibles.',
                    'Conectores y cables de la batería.',
                ],
            ],
            'Los repuestos que se rompen con las caídas (espejos, palancas, carcasas) son los mismos que en cualquier moto y se resuelven más rápido. Guardá siempre la factura y los datos del modelo y del número de serie para pedir piezas por WhatsApp o en el taller.',
        ],
        'revisarUsada' => [
            'Comprar una Super Soco TC Wanderer Pro usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Estado de la batería: pedí que te muestren cuánto carga y cuánto dura en un recorrido real, y que traiga el cargador original.',
                    'Humedad o corrosión en los conectores y bajo el asiento, señal de que la moto se mojó.',
                    'Que el motor responda parejo al acelerar, sin cortes ni ruidos raros.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Super Soco TC Wanderer Pro en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Super Soco TC Wanderer Pro?',
                'a' => 'En la página de [Super Soco](/motos/super-soco) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Super Soco TC Wanderer Pro?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Super Soco TC Wanderer Pro usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'yadea/c-umi' => [
        'intro' => [
            'La **Yadea C-UMI** es una moto que va con motor eléctrico y batería, sin nafta, sin aceite de motor y sin bujía, y en nuestro catálogo figura como moto eléctrica. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Yadea C-UMI es de la marca [Yadea](/motos/yadea); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'En una eléctrica desaparecen el cambio de aceite del motor y la bujía, pero aparecen otros cuidados. El que más importa es la batería: cargala con el cargador que corresponde al modelo, evitá dejarla totalmente descargada por semanas y no la expongas al sol fuerte ni al agua acumulada.',
            'Seguí revisando lo mecánico, que es igual que en cualquier moto: frenos, neumáticos, suspensión, luces y los bornes y conectores, que con la humedad y el polvo del verano se ensucian. Después de un día de lluvia fuerte, secá bien la zona de la batería y los conectores antes de guardar la moto.',
            'Los datos de la batería y del motor que tenemos con fuente están en la ficha técnica. Los plazos de garantía, los ciclos de carga y cualquier intervalo de revisión dependen del fabricante y del distribuidor: pedilos por escrito al comprar.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Yadea C-UMI. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Yadea C-UMI (distribuidor oficial yadea); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Los repuestos de una eléctrica dependen mucho más del distribuidor que los de una moto a nafta, porque la batería, el controlador y el motor no son piezas que se consigan en cualquier casa de repuestos. Antes de comprar, preguntá qué piezas tiene en stock el distribuidor y cuánto tarda en traer una que falte.',
            [
                'list' => [
                    'Cargador original de repuesto.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Pastillas o zapatas de freno.',
                    'Espejos, palancas, lámparas y fusibles.',
                    'Conectores y cables de la batería.',
                ],
            ],
            'Los repuestos que se rompen con las caídas (espejos, palancas, carcasas) son los mismos que en cualquier moto y se resuelven más rápido. Guardá siempre la factura y los datos del modelo y del número de serie para pedir piezas por WhatsApp o en el taller.',
        ],
        'revisarUsada' => [
            'Comprar una Yadea C-UMI usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Estado de la batería: pedí que te muestren cuánto carga y cuánto dura en un recorrido real, y que traiga el cargador original.',
                    'Humedad o corrosión en los conectores y bajo el asiento, señal de que la moto se mojó.',
                    'Que el motor responda parejo al acelerar, sin cortes ni ruidos raros.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Yadea C-UMI en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Yadea C-UMI?',
                'a' => 'En la página de [Yadea](/motos/yadea) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Yadea C-UMI?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Yadea C-UMI usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'buler/cobra-125' => [
        'intro' => [
            'La **Buler Cobra 125** es una moto de uso diario, con el motor a la vista y una postura erguida, y en nuestro catálogo figura como moto naked, sin carenado. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Buler Cobra 125 es de la marca [Buler](/motos/buler); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Buler Cobra 125 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Buler Cobra 125. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Buler Cobra 125 (distribuidor oficial buler); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Buler Cobra 125, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Zapatas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/buler); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Buler Cobra 125 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Buler Cobra 125 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Buler Cobra 125?',
                'a' => 'En la página de [Buler](/motos/buler) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Buler Cobra 125?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Buler Cobra 125 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'buler/cub-110' => [
        'intro' => [
            'La **Buler Cub 110** es una moto de cambios semiautomáticos, sin palanca de embrague, de las que se ven a diario en el trabajo y en el reparto, y en nuestro catálogo figura como moto cub. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Buler Cub 110 es de la marca [Buler](/motos/buler); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Buler Cub 110 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Buler Cub 110. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Buler Cub 110 (distribuidor oficial buler); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Buler Cub 110, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Zapatas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/buler); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Buler Cub 110 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Buler Cub 110 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Buler Cub 110?',
                'a' => 'En la página de [Buler](/motos/buler) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Buler Cub 110?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Buler Cub 110 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'buler/faiter-se-150' => [
        'intro' => [
            'La **Buler Faiter SE 150** es una moto de uso diario, con el motor a la vista y una postura erguida, y en nuestro catálogo figura como moto naked, sin carenado. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Buler Faiter SE 150 es de la marca [Buler](/motos/buler); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Buler Faiter SE 150 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Con freno de disco, las pastillas son lo primero que se gasta: mirá su espesor y escuchá si rechinan. Más en la guía de [pastillas de freno](/guias/pastillas-de-freno-moto).',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Buler Faiter SE 150. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Buler Faiter SE 150 (distribuidor oficial buler); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Buler Faiter SE 150, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Pastillas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/buler); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Buler Faiter SE 150 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Buler Faiter SE 150 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Buler Faiter SE 150?',
                'a' => 'En la página de [Buler](/motos/buler) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Buler Faiter SE 150?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Buler Faiter SE 150 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'buler/urban-110' => [
        'intro' => [
            'La **Buler Urban 110** es una moto de cambios semiautomáticos, sin palanca de embrague, de las que se ven a diario en el trabajo y en el reparto, y en nuestro catálogo figura como moto cub. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Buler Urban 110 es de la marca [Buler](/motos/buler); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Buler Urban 110 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Buler Urban 110. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Buler Urban 110 (distribuidor oficial buler); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Buler Urban 110, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Zapatas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/buler); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Buler Urban 110 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Buler Urban 110 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Buler Urban 110?',
                'a' => 'En la página de [Buler](/motos/buler) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Buler Urban 110?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Buler Urban 110 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'buler/vx-cub-110' => [
        'intro' => [
            'La **Buler VX Cub 110** es una moto de cambios semiautomáticos, sin palanca de embrague, de las que se ven a diario en el trabajo y en el reparto, y en nuestro catálogo figura como moto cub. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Buler VX Cub 110 es de la marca [Buler](/motos/buler); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Buler VX Cub 110 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Buler VX Cub 110. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Buler VX Cub 110 (distribuidor oficial buler); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Buler VX Cub 110, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Zapatas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/buler); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Buler VX Cub 110 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Buler VX Cub 110 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Buler VX Cub 110?',
                'a' => 'En la página de [Buler](/motos/buler) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Buler VX Cub 110?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Buler VX Cub 110 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    'buler/work-125' => [
        'intro' => [
            'La **Buler Work 125** es una moto de uso diario, con el motor a la vista y una postura erguida, y en nuestro catálogo figura como moto naked, sin carenado. Esta página reúne lo que publicaron fuentes con nombre sobre el modelo: la ficha técnica y el precio, cada dato con su fuente y su fecha de consulta, y le suma consejos de uso y de compra usada que sirven para cualquier moto de esta clase.',
            'No manejamos las motos ni las vendemos: no vas a encontrar acá un «la probamos» ni un precio armado por nosotros. Si una cifra no tiene fuente, no la mostramos. Por eso algunas secciones son más cortas que otras, y está bien que así sea.',
            'La Buler Work 125 es de la marca [Buler](/motos/buler); en esa página ves quién la distribuye en Paraguay y qué otros modelos tiene el catálogo. Si querés confirmar disponibilidad, color o precio al día, escribinos por WhatsApp con el nombre del modelo y te orientamos hacia dónde consultar.',
        ],
        'mantenimiento' => [
            'Una Buler Work 125 dura más y te deja menos tirado si repetís lo básico a tiempo: aceite del motor, filtro de aire, cadena limpia y bien tensada, frenos y neumáticos en buen estado. El calor y el polvo de Paraguay castigan sobre todo al filtro de aire, a la cadena y al aceite, así que conviene mirarlos más seguido en época seca.',
            'Revisá el nivel de aceite con la moto en plano y siempre antes de un viaje largo. Ante cualquier pérdida o ruido nuevo, no esperes al próximo service.',
            'Para la cadena, la guía de [kit de arrastre](/guias/kit-de-arrastre-de-moto) explica cuándo se cambian juntos cadena, piñón y corona.',
            'Los intervalos exactos (cuántos kilómetros entre cambios de aceite, cada cuánto el filtro, qué torque lleva cada tornillo) los define el manual del propietario del Buler Work 125. No los publicamos porque todavía no tenemos ese manual como fuente: pedilo al distribuidor o a un taller autorizado. Para armar un presupuesto general, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
            [
                'verify' => 'Intervalos de mantenimiento del manual del propietario de la Buler Work 125 (distribuidor oficial buler); no hay manual citable todavía.',
            ],
        ],
        'repuestos' => [
            'Para la Buler Work 125, lo que conviene tener a mano son los repuestos de desgaste, que son los que más se cambian en cualquier moto de su clase. Cuando vayas a comprar uno, llevá el número de motor y de chasis, o mejor todavía la pieza vieja, para evitar errores de medida.',
            [
                'list' => [
                    'Filtro de aire y filtro de aceite.',
                    'Bujía de la medida que indique el manual.',
                    'Kit de arrastre (cadena, piñón y corona).',
                    'Zapatas de freno.',
                    'Cables de embrague, acelerador y freno.',
                    'Cubiertas y cámaras de la medida del modelo.',
                    'Lámparas, fusibles y batería.',
                    'Palancas y espejos, que son lo que primero se rompe en una caída.',
                ],
            ],
            'Para saber dónde conseguirlos, empezá por el distribuidor que figura en la página de [la marca](/motos/buler); para lo más común también hay casas de repuestos en cualquier ciudad grande. Más sobre la batería en la guía de [batería de moto](/guias/bateria-de-moto) y sobre la bujía en la de [bujía de moto](/guias/bujia-de-moto).',
        ],
        'revisarUsada' => [
            'Comprar una Buler Work 125 usada puede ser una buena decisión si sabés qué mirar antes de pagar. Esta lista sirve como punto de partida; la versión completa está en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
            [
                'list' => [
                    'Papeles al día y a nombre de quien te la vende: cédula verde, chapa y que los números de chasis y de motor coincidan con los documentos. Si hay dudas, mirá [papeles de una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    'Que no tenga golpes serios: horquilla torcida, manubrio descentrado, marcas de arrastre en el motor o en los costados.',
                    'Pérdidas de aceite o de líquidos debajo del motor y alrededor de los retenes.',
                    'Que arranque en frío al primer o segundo intento, sin humo azul o blanco persistente.',
                    'Que los cambios entren suaves, sin saltos ni ruidos, y que el embrague o la transmisión no patine.',
                    'Cadena, piñón y corona sin dientes gastados, y cubiertas con dibujo parejo y sin grietas.',
                    'Frenos que frenen parejo, luces, bocina, tablero y kilometraje coherente con el desgaste general.',
                    'Una prueba de manejo corta, y, si podés, que la mire un mecánico de confianza antes de cerrar.',
                ],
            ],
            'Si te van a pedir seña o entrega antes de ver la moto, no la des: es la forma más común de estafa. Más consejos en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
        ],
        'faq' => [
            [
                'q' => '¿Cuánto cuesta la Buler Work 125 en Paraguay?',
                'a' => 'Mirá la sección de precio de esta página: mostramos sólo el precio que publicó una fuente real, con la fuente y la fecha en que lo consultamos. Si no hay un precio publicado, no mostramos ninguno ni lo estimamos. Para el valor al día, consultá por WhatsApp o directamente al distribuidor.',
            ],
            [
                'q' => '¿Dónde se consigue la Buler Work 125?',
                'a' => 'En la página de [Buler](/motos/buler) figura el distribuidor en Paraguay, con la fuente de ese dato. Para confirmar si tienen el modelo disponible, escribinos por WhatsApp o consultales directamente.',
            ],
            [
                'q' => '¿Cada cuánto hay que hacer el service de la Buler Work 125?',
                'a' => 'Depende del manual del propietario del modelo, y todavía no lo tenemos como fuente, así que no ponemos una cifra. Pedile el plan de mantenimiento al distribuidor o a un taller autorizado.',
            ],
            [
                'q' => '¿Qué conviene revisar si compro una Buler Work 125 usada?',
                'a' => 'Papeles al día, números de chasis y motor, pérdidas de aceite, cadena y frenos, estado de las cubiertas y una prueba de manejo. La lista completa está en la sección «Qué revisar si es usada».',
            ],
        ],
        'updated' => '2026-10-01',
    ],
    /* == /B1b == */
];
