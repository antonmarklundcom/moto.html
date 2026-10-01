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
    'bajaj/boxer-150' => array (
      'intro' => 
      array (
        0 => 'La Bajaj Boxer 150 es una moto naked, es decir, de las que no llevan carenado completo que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos: tipo de motor. El precio 0 km que figura abajo lo publicó Tupi, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Asunción Motor Sport S.A. (AMS) según la fuente citada en [la página de la marca](/motos/bajaj).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Bajaj Boxer 150, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Bajaj Boxer 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Bajaj Boxer 150, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            1 => 'Kit de arrastre (cadena, piñón y corona).',
            2 => 'Pastillas o zapatas de freno.',
            3 => 'Filtro de aire y filtro de aceite.',
            4 => 'Bujía y batería.',
            5 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Bajaj Boxer 150 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            1 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            2 => 'Probá el arranque en frío y escuchá ruidos raros.',
            3 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            4 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Bajaj Boxer 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Tupi) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la Bajaj Boxer 150?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Bajaj en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Asunción Motor Sport S.A. (AMS) (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Bajaj Boxer 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
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
    'honda/cb160f' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Honda CB160F, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo de 162 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: freno delantero, freno trasero y velocidad máxima. El precio 0 km que figura abajo lo publicó Classic Motos, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye DIESA S.A. según la fuente citada en [la página de la marca](/motos/honda).',
        3 => 'Si todavía estás comparando, mirá también [Honda CB1 125](/motos/honda/cb1-125), [Honda XR 250 Tornado](/motos/honda/xr-250-tornado) y [Honda DIO 110](/motos/honda/dio-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Honda CB160F, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Honda CB160F (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Honda CB160F:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cables de embrague y de acelerador.',
            1 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            2 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            3 => 'Kit de arrastre (cadena, piñón y corona).',
            4 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            5 => 'Filtro de aire y filtro de aceite.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Honda CB160F usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            1 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            2 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            3 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            4 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            5 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Honda CB160F en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Classic Motos) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Honda CB160F?',
          'a' => 'Según la ficha técnica de esta página, tiene 162 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Honda en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es DIESA S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Honda CB160F usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'honda/dio-110' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos del Honda DIO 110, esta página te ahorra vueltas: se trata de un scooter. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si lo encontrás usado.',
        1 => 'Con fuente tenemos estos datos: tipo de arranque. El precio 0 km que figura abajo lo publicó Honda Motos Paraguay, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye DIESA S.A. según la fuente citada en [la página de la marca](/motos/honda).',
        3 => 'Si todavía estás comparando, mirá también [Honda Navi 110](/motos/honda/navi-110), [Honda CB160F](/motos/honda/cb160f) y [Honda NX190](/motos/honda/nx190).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un scooter como el Honda DIO 110 no lleva cadena: tiene una transmisión automática que también se desgasta y que el taller debe revisar en cada service. Fuera de eso, cuidá el aceite, el filtro de aire, la bujía, los frenos y las cubiertas, que en ruedas chicas se gastan rápido.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Honda DIO 110 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en el Honda DIO 110:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio, que en scooter se gastan más rápido.',
            1 => 'Cable del acelerador.',
            2 => 'Lámparas y luces de giro.',
            3 => 'Espejos y carenados, que son lo primero que se rompe en una caída.',
            4 => 'Correa de transmisión y rodillos del variador, según el modelo.',
            5 => 'Pastillas o zapatas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con el Honda DIO 110 usado, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá luces, luces de giro, bocina y el asiento con su cierre.',
            1 => 'Revisá el escape y que no haya humo azul o blanco al acelerar.',
            2 => 'Pedí que la arranquen en frío y escuchá la transmisión automática: tirones o vibraciones al acelerar son mala señal.',
            3 => 'Revisá las cubiertas, que en ruedas chicas se gastan rápido, y los frenos.',
            4 => 'Buscá golpes en los carenados y en el piso, y roturas en los plásticos.',
            5 => 'Fijate que la batería arranque sin problemas y que el motor de arranque responda.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Honda DIO 110 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Honda Motos Paraguay) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica del Honda DIO 110?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Honda en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es DIESA S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Honda DIO 110 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'honda/navi-110' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos del Honda Navi 110, esta página te ahorra vueltas: se trata de un scooter de 109 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si lo encontrás usado.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tipo de arranque, freno delantero, freno trasero y peso. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye DIESA S.A. según la fuente citada en [la página de la marca](/motos/honda).',
        3 => 'Si todavía estás comparando, mirá también [Honda DIO 110](/motos/honda/dio-110), [Honda NX190](/motos/honda/nx190) y [Honda Wave 110S](/motos/honda/wave).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un scooter como el Honda Navi 110 no lleva cadena: tiene una transmisión automática que también se desgasta y que el taller debe revisar en cada service. Fuera de eso, cuidá el aceite, el filtro de aire, la bujía, los frenos y las cubiertas, que en ruedas chicas se gastan rápido.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Honda Navi 110 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en el Honda Navi 110:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            1 => 'Filtro de aire y filtro de aceite.',
            2 => 'Bujía y batería.',
            3 => 'Cubiertas, en la medida que figura en la ficha técnica, que en scooter se gastan más rápido.',
            4 => 'Cable del acelerador.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás el Honda Navi 110 usado, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá el escape y que no haya humo azul o blanco al acelerar.',
            1 => 'Pedí que la arranquen en frío y escuchá la transmisión automática: tirones o vibraciones al acelerar son mala señal.',
            2 => 'Revisá las cubiertas, que en ruedas chicas se gastan rápido, y los frenos.',
            3 => 'Buscá golpes en los carenados y en el piso, y roturas en los plásticos.',
            4 => 'Fijate que la batería arranque sin problemas y que el motor de arranque responda.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Honda Navi 110 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, DIESA S.A, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Honda Navi 110?',
          'a' => 'Según la ficha técnica de esta página, tiene 109 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Honda en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es DIESA S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Honda Navi 110 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'honda/nx190' => array (
      'intro' => 
      array (
        0 => 'La Honda NX190 es una moto de tipo enduro o cross de 184 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: freno delantero, freno trasero, tanque de combustible, tipo de motor y alimentación. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye DIESA S.A. según la fuente citada en [la página de la marca](/motos/honda).',
        3 => 'Si todavía estás comparando, mirá también [Honda XR 150L](/motos/honda/xr-150), [Honda XR 190L](/motos/honda/xr-190) y [Honda Navi 110](/motos/honda/navi-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo enduro o cross como la Honda NX190 sufre más que una de calle: polvo en el filtro de aire, barro en la cadena y golpes en la suspensión. Después de salir a tierra o de una lluvia, lavala, secala y revisá cadena, filtro de aire y tornillos flojos.',
        1 => 'La alimentación es por inyección electrónica: es poco lo que se hace en casa, pero conviene cargar combustible de buena calidad y llevarla a un taller que pueda leer el sistema si se enciende alguna luz de falla.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Honda NX190 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Honda NX190:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Palancas de freno y de embrague de repuesto.',
            2 => 'Retenes y aceite de la horquilla, según el manual.',
            3 => 'Protectores y manoplas.',
            4 => 'Kit de arrastre (cadena, piñón y corona), de lo más exigido en tierra.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Honda NX190 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá la cadena, el piñón y la corona.',
            1 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            2 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            3 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            4 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Honda NX190 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, DIESA S.A, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Honda NX190?',
          'a' => 'Según la ficha técnica de esta página, tiene 184 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Honda en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es DIESA S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Honda NX190 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'honda/wave' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Honda Wave 110S, esta página te ahorra vueltas: se trata de una moto de tipo cub de 110 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: transmisión, tipo de arranque y refrigeración. El precio 0 km que figura abajo lo publicó Classic Motos, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye DIESA S.A. según la fuente citada en [la página de la marca](/motos/honda).',
        3 => 'Si todavía estás comparando, mirá también [Honda CB160F](/motos/honda/cb160f), [Honda DIO 110](/motos/honda/dio-110) y [Honda Navi 110](/motos/honda/navi-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Las motos tipo cub, como la Honda Wave 110S, se destacan por tener una mecánica simple, y eso se traduce en un mantenimiento sencillo: aceite a tiempo, filtro de aire limpio, bujía, cadena tensada y lubricada, y frenos al día. Si la usás para trabajar todos los días, no te saltees el service.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Honda Wave 110S (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Honda Wave 110S:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Kit de arrastre (cadena, piñón y corona).',
            1 => 'Pastillas o zapatas de freno.',
            2 => 'Filtro de aire y filtro de aceite.',
            3 => 'Bujía y batería.',
            4 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            5 => 'Cables de embrague y de acelerador.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Honda Wave 110S usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá luces, luces de giro y bocina.',
            1 => 'Preguntá si se usó para reparto o carga, y cuántos dueños tuvo.',
            2 => 'Mirá la cadena y el piñón: son lo primero que se gasta en una moto de trabajo.',
            3 => 'Pedí que la arranquen en frío y escuchá ruidos del motor.',
            4 => 'Probá que los cambios entren suaves y que el embrague no patine.',
            5 => 'Revisá frenos y cubiertas: una moto de trabajo suele tener muchos kilómetros.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Honda Wave 110S en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Classic Motos) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Honda Wave 110S?',
          'a' => 'Según la ficha técnica de esta página, tiene 110 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Honda en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es DIESA S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Honda Wave 110S usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'honda/xr-150' => array (
      'intro' => 
      array (
        0 => 'La Honda XR 150L es una moto de tipo enduro o cross de 150 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Honda Motos Paraguay y Classic Motos, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye DIESA S.A. según la fuente citada en [la página de la marca](/motos/honda).',
        3 => 'Si todavía estás comparando, mirá también [Honda NX190](/motos/honda/nx190), [Honda XR 190L](/motos/honda/xr-190) y [Honda Wave 110S](/motos/honda/wave).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo enduro o cross como la Honda XR 150L sufre más que una de calle: polvo en el filtro de aire, barro en la cadena y golpes en la suspensión. Después de salir a tierra o de una lluvia, lavala, secala y revisá cadena, filtro de aire y tornillos flojos.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Honda XR 150L (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Honda XR 150L:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Retenes y aceite de la horquilla, según el manual.',
            1 => 'Protectores y manoplas.',
            2 => 'Kit de arrastre (cadena, piñón y corona), de lo más exigido en tierra.',
            3 => 'Pastillas o zapatas de freno.',
            4 => 'Filtro de aire, que se cambia con más frecuencia si salís a caminos de tierra.',
            5 => 'Filtro de aceite y bujía.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Honda XR 150L usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá torceduras en el manubrio, el cuadro y las llantas, señales de caídas fuertes.',
            1 => 'Mirá el filtro de aire: si está sucio o roto, el motor pudo haber tragado polvo.',
            2 => 'Probá que los frenos frenen parejo y que las cubiertas tengan taco.',
            3 => 'Revisá la cadena, el piñón y la corona.',
            4 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Honda XR 150L en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Honda Motos Paraguay y Classic Motos) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Honda XR 150L?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Honda en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es DIESA S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Honda XR 150L usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'honda/xr-190' => array (
      'intro' => 
      array (
        0 => 'La Honda XR 190L es una moto de tipo enduro o cross que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'De la ficha técnica todavía no tenemos datos con fuente, así que no los completamos con suposiciones. El precio 0 km que figura abajo lo publicó Classic Motos, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye DIESA S.A. según la fuente citada en [la página de la marca](/motos/honda).',
        3 => 'Si todavía estás comparando, mirá también [Honda NX190](/motos/honda/nx190), [Honda XR 150L](/motos/honda/xr-150) y [Honda CB160F](/motos/honda/cb160f).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo enduro o cross como la Honda XR 190L sufre más que una de calle: polvo en el filtro de aire, barro en la cadena y golpes en la suspensión. Después de salir a tierra o de una lluvia, lavala, secala y revisá cadena, filtro de aire y tornillos flojos.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Honda XR 190L (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Honda XR 190L:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Palancas de freno y de embrague de repuesto.',
            1 => 'Retenes y aceite de la horquilla, según el manual.',
            2 => 'Protectores y manoplas.',
            3 => 'Kit de arrastre (cadena, piñón y corona), de lo más exigido en tierra.',
            4 => 'Pastillas o zapatas de freno.',
            5 => 'Filtro de aire, que se cambia con más frecuencia si salís a caminos de tierra.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Honda XR 190L usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Probá que los frenos frenen parejo y que las cubiertas tengan taco.',
            1 => 'Revisá la cadena, el piñón y la corona.',
            2 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            3 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            4 => 'Preguntá si se usó en competencia o en trabajo de campo.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Honda XR 190L en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Classic Motos) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la Honda XR 190L?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Honda en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es DIESA S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Honda XR 190L usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'honda/xr-250-tornado' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Honda XR 250 Tornado, esta página junta lo que se sabe: es una moto de tipo enduro o cross de 249 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, transmisión y refrigeración. El precio 0 km que figura abajo lo publicó Classic Motos, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye DIESA S.A. según la fuente citada en [la página de la marca](/motos/honda).',
        3 => 'Si todavía estás comparando, mirá también [Honda XR 150L](/motos/honda/xr-150), [Honda XR 190L](/motos/honda/xr-190) y [Honda CB1 125](/motos/honda/cb1-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Si la Honda XR 250 Tornado sale a caminos de tierra, el mantenimiento tiene que ser más estricto: filtro de aire limpio (el polvo entra por ahí), cadena lubricada, frenos sin barro, y aceite al día. La suspensión y las cubiertas también se revisan más seguido.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Honda XR 250 Tornado (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Honda XR 250 Tornado:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aceite y bujía.',
            1 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            2 => 'Palancas de freno y de embrague de repuesto.',
            3 => 'Retenes y aceite de la horquilla, según el manual.',
            4 => 'Protectores y manoplas.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Honda XR 250 Tornado usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá la cadena, el piñón y la corona.',
            1 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            2 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            3 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            4 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
            5 => 'Buscá torceduras en el manubrio, el cuadro y las llantas, señales de caídas fuertes.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Honda XR 250 Tornado en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Classic Motos) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Honda XR 250 Tornado?',
          'a' => 'Según la ficha técnica de esta página, tiene 249 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Honda en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es DIESA S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Honda XR 250 Tornado usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/blitz-110' => array (
      'intro' => 
      array (
        0 => 'La Kenton Blitz 110 es una moto de tipo cub de 110 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia y tipo de motor. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Blitz 125 Sport](/motos/kenton/blitz-125-sport), [Kenton Fusion 125](/motos/kenton/fusion-125) y [Kenton E-Kenton Next V1](/motos/kenton/e-kenton-next-v1).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Kenton Blitz 110 el mantenimiento es de rutina: nivel de aceite, filtro de aire, cadena, frenos y cubiertas. Cuanto más trabaja la moto (reparto, ida y vuelta al trabajo), más seguido hay que mirar la cadena, que se alarga con el uso.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Blitz 110 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Kenton Blitz 110, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Pastillas o zapatas de freno.',
            1 => 'Filtro de aire y filtro de aceite.',
            2 => 'Bujía y batería.',
            3 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            4 => 'Cables de embrague y de acelerador.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Kenton Blitz 110 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá pérdidas de aceite y golpes que indiquen caídas.',
            1 => 'Comprobá luces, luces de giro y bocina.',
            2 => 'Preguntá si se usó para reparto o carga, y cuántos dueños tuvo.',
            3 => 'Mirá la cadena y el piñón: son lo primero que se gasta en una moto de trabajo.',
            4 => 'Pedí que la arranquen en frío y escuchá ruidos del motor.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Blitz 110 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton Blitz 110?',
          'a' => 'Según la ficha técnica de esta página, tiene 110 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Blitz 110 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/blitz-125-sport' => array (
      'intro' => 
      array (
        0 => 'La Kenton Blitz 125 Sport es una moto de tipo cub de 125 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Blitz 110](/motos/kenton/blitz-110), [Kenton Fusion 125](/motos/kenton/fusion-125) y [Kenton Volkano 125](/motos/kenton/volkano-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Kenton Blitz 125 Sport el mantenimiento es de rutina: nivel de aceite, filtro de aire, cadena, frenos y cubiertas. Cuanto más trabaja la moto (reparto, ida y vuelta al trabajo), más seguido hay que mirar la cadena, que se alarga con el uso.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Blitz 125 Sport (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Kenton Blitz 125 Sport, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro.',
            3 => 'Pedal de arranque o de cambios, si la moto los lleva.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Kenton Blitz 125 Sport usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá pérdidas de aceite y golpes que indiquen caídas.',
            1 => 'Comprobá luces, luces de giro y bocina.',
            2 => 'Preguntá si se usó para reparto o carga, y cuántos dueños tuvo.',
            3 => 'Mirá la cadena y el piñón: son lo primero que se gasta en una moto de trabajo.',
            4 => 'Pedí que la arranquen en frío y escuchá ruidos del motor.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Blitz 125 Sport en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton Blitz 125 Sport?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Blitz 125 Sport usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/bravo-125' => array (
      'intro' => 
      array (
        0 => 'El Kenton Bravo 125 es un scooter de 125 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, freno delantero, freno trasero, tanque de combustible y tipo de motor. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Road Power 170](/motos/kenton/road-power-170), [Kenton Spark 150](/motos/kenton/spark-150) y [Kenton Fusion 135](/motos/kenton/fusion-135).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un scooter como el Kenton Bravo 125 no lleva cadena: tiene una transmisión automática que también se desgasta y que el taller debe revisar en cada service. Fuera de eso, cuidá el aceite, el filtro de aire, la bujía, los frenos y las cubiertas, que en ruedas chicas se gastan rápido.',
        1 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        2 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton Bravo 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario el Kenton Bravo 125, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Correa de transmisión y rodillos del variador, según el modelo.',
            1 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            2 => 'Filtro de aire y filtro de aceite.',
            3 => 'Bujía y batería.',
            4 => 'Cubiertas, en la medida que figura en la ficha técnica, que en scooter se gastan más rápido.',
            5 => 'Cable del acelerador.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con el Kenton Bravo 125 usado, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá luces, luces de giro, bocina y el asiento con su cierre.',
            1 => 'Revisá el escape y que no haya humo azul o blanco al acelerar.',
            2 => 'Pedí que la arranquen en frío y escuchá la transmisión automática: tirones o vibraciones al acelerar son mala señal.',
            3 => 'Revisá las cubiertas, que en ruedas chicas se gastan rápido, y los frenos.',
            4 => 'Buscá golpes en los carenados y en el piso, y roturas en los plásticos.',
            5 => 'Fijate que la batería arranque sin problemas y que el motor de arranque responda.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Bravo 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Bravo 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Bravo 125 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/bull-200' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos del Kenton Bull 200, esta página te ahorra vueltas: se trata de un cuatriciclo de 200 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si lo encontrás usado.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: freno delantero y freno trasero. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Quest ATV 500 4x4](/motos/kenton/quest-atv-500-4x4), [Kenton Volkano 125](/motos/kenton/volkano-125) y [Kenton Classic 150](/motos/kenton/classic-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un cuatriciclo como el Kenton Bull 200 trabaja con barro, tierra y agua, así que el lavado y el engrase importan más que en una moto de calle. Revisá aceite, filtro de aire, frenos, cubiertas, rótulas y bujes con frecuencia, y el estado de la transmisión.',
        1 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Kenton Bull 200 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para el Kenton Bull 200, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Lámparas y fusibles.',
            1 => 'Cables de acelerador y de freno.',
            2 => 'Pastillas de freno.',
            3 => 'Filtro de aire y filtro de aceite.',
            4 => 'Bujía y batería.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con el Kenton Bull 200 usado, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá marcas de vuelco en el cuadro, los guardabarros y el manubrio.',
            1 => 'Escuchá el motor y la transmisión, y fijate si hay pérdidas de aceite.',
            2 => 'Comprobá que el marcha atrás y los cambios funcionen, si el modelo los tiene.',
            3 => 'Pedí los papeles al día y los números de chasis y de motor.',
            4 => 'Preguntá si trabajó en el campo, con barro o con carga.',
            5 => 'Revisá luces, tablero y cableado.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Bull 200 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Bull 200?',
          'a' => 'Según la ficha técnica de esta página, tiene 200 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Bull 200 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/classic-125' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Kenton Classic 125, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo de 125 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tipo de arranque, freno delantero, freno trasero y tanque de combustible. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton GL 125](/motos/kenton/gl-125), [Kenton GL 150](/motos/kenton/gl-150) y [Kenton Transporter 210 HD](/motos/kenton/transporter-210-hd).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Kenton Classic 125, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Kenton Classic 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Kenton Classic 125, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Kit de arrastre (cadena, piñón y corona).',
            1 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            2 => 'Filtro de aire y filtro de aceite.',
            3 => 'Bujía y batería.',
            4 => 'Cubiertas, en la medida que figura en la ficha técnica.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Kenton Classic 125 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            1 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            2 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            3 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            4 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            5 => 'Probá el arranque en frío y escuchá ruidos raros.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Classic 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton Classic 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Classic 125 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/classic-150' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Kenton Classic 150, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 150 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, tipo de arranque, tanque de combustible, tipo de motor y refrigeración. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton GTR 200 LTD](/motos/kenton/gtr-200-ltd), [Kenton Stratta 200](/motos/kenton/stratta-200) y [Kenton Symphony 125S](/motos/kenton/symphony-125s).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Kenton Classic 150, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Kenton Classic 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Kenton Classic 150, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            1 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            2 => 'Kit de arrastre (cadena, piñón y corona).',
            3 => 'Pastillas o zapatas de freno.',
            4 => 'Filtro de aire y filtro de aceite.',
            5 => 'Bujía y batería.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton Classic 150 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            1 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            2 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            3 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            4 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Classic 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton Classic 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Classic 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/dkr-150' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Kenton DKR 150, esta página junta lo que se sabe: es una moto de tipo enduro o cross de 150 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tipo de arranque, freno delantero, freno trasero y tanque de combustible. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Skua 150](/motos/kenton/skua-150), [Kenton DKR 200](/motos/kenton/dkr-200) y [Kenton Forza 150](/motos/kenton/forza-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Si la Kenton DKR 150 sale a caminos de tierra, el mantenimiento tiene que ser más estricto: filtro de aire limpio (el polvo entra por ahí), cadena lubricada, frenos sin barro, y aceite al día. La suspensión y las cubiertas también se revisan más seguido.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton DKR 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Kenton DKR 150, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aceite y bujía.',
            1 => 'Cubiertas, en la medida que figura en la ficha técnica.',
            2 => 'Palancas de freno y de embrague de repuesto.',
            3 => 'Retenes y aceite de la horquilla, según el manual.',
            4 => 'Protectores y manoplas.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Kenton DKR 150 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            1 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            2 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            3 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
            4 => 'Buscá torceduras en el manubrio, el cuadro y las llantas, señales de caídas fuertes.',
            5 => 'Mirá el filtro de aire: si está sucio o roto, el motor pudo haber tragado polvo.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton DKR 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton DKR 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton DKR 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/dkr-200' => array (
      'intro' => 
      array (
        0 => 'La Kenton DKR 200 es una moto de tipo enduro o cross de 200 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, freno delantero, freno trasero, tanque de combustible y refrigeración. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton DKR 150](/motos/kenton/dkr-150), [Kenton Shark 150](/motos/kenton/shark-150) y [Kenton Quest 200](/motos/kenton/quest-200).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo enduro o cross como la Kenton DKR 200 sufre más que una de calle: polvo en el filtro de aire, barro en la cadena y golpes en la suspensión. Después de salir a tierra o de una lluvia, lavala, secala y revisá cadena, filtro de aire y tornillos flojos.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton DKR 200 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Kenton DKR 200:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Palancas de freno y de embrague de repuesto.',
            2 => 'Retenes y aceite de la horquilla, según el manual.',
            3 => 'Protectores y manoplas.',
            4 => 'Kit de arrastre (cadena, piñón y corona), de lo más exigido en tierra.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton DKR 200 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            1 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            2 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            3 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
            4 => 'Buscá torceduras en el manubrio, el cuadro y las llantas, señales de caídas fuertes.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton DKR 200 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton DKR 200?',
          'a' => 'Según la ficha técnica de esta página, tiene 200 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton DKR 200 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/e-kenton-next-v1' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Kenton E-Kenton Next V1, esta página junta lo que se sabe: es una moto eléctrica, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos: potencia y velocidad máxima. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton E-Kenton Next V5](/motos/kenton/e-kenton-next-v5), [Kenton E-Kenton Next V3](/motos/kenton/e-kenton-next-v3) y [Kenton GL 125](/motos/kenton/gl-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Kenton E-Kenton Next V1, el mantenimiento gira en torno a la batería y la carga: usá el cargador original, evitá dejarla descargada por semanas y cuidala del calor. El resto (frenos, cubiertas, suspensión y luces) se revisa como en cualquier moto.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton E-Kenton Next V1 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Kenton E-Kenton Next V1:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Lámparas y luces de giro.',
            1 => 'Espejos y palancas.',
            2 => 'Fusibles y conectores.',
            3 => 'Batería y cargador, que son lo central en una moto eléctrica.',
            4 => 'Pastillas o zapatas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton E-Kenton Next V1 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Preguntá por la garantía de la batería y si se puede reponer.',
            1 => 'Revisá que el cargador sea el original y esté en buen estado.',
            2 => 'Probá frenos, cubiertas y suspensión.',
            3 => 'Comprobá luces, tablero y que no haya cables expuestos.',
            4 => 'Pedí los papeles al día.',
            5 => 'Pedí que te muestren la autonomía real en un recorrido corto y cómo responde la batería.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton E-Kenton Next V1 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la Kenton E-Kenton Next V1?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton E-Kenton Next V1 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/e-kenton-next-v3' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Kenton E-Kenton Next V3, esta página te ahorra vueltas: se trata de una moto eléctrica. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos: velocidad máxima. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton E-Kenton Next V1](/motos/kenton/e-kenton-next-v1), [Kenton E-Kenton Next V5](/motos/kenton/e-kenton-next-v5) y [Kenton Forza 150](/motos/kenton/forza-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Kenton E-Kenton Next V3, el mantenimiento gira en torno a la batería y la carga: usá el cargador original, evitá dejarla descargada por semanas y cuidala del calor. El resto (frenos, cubiertas, suspensión y luces) se revisa como en cualquier moto.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton E-Kenton Next V3 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Kenton E-Kenton Next V3:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Lámparas y luces de giro.',
            2 => 'Espejos y palancas.',
            3 => 'Fusibles y conectores.',
            4 => 'Batería y cargador, que son lo central en una moto eléctrica.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Kenton E-Kenton Next V3 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá que el cargador sea el original y esté en buen estado.',
            1 => 'Probá frenos, cubiertas y suspensión.',
            2 => 'Comprobá luces, tablero y que no haya cables expuestos.',
            3 => 'Pedí los papeles al día.',
            4 => 'Pedí que te muestren la autonomía real en un recorrido corto y cómo responde la batería.',
            5 => 'Preguntá por la garantía de la batería y si se puede reponer.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton E-Kenton Next V3 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la Kenton E-Kenton Next V3?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton E-Kenton Next V3 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/e-kenton-next-v5' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Kenton E-Kenton Next V5, esta página te ahorra vueltas: se trata de una moto eléctrica. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'De la ficha técnica todavía no tenemos datos con fuente, así que no los completamos con suposiciones. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton E-Kenton Next V1](/motos/kenton/e-kenton-next-v1), [Kenton E-Kenton Next V3](/motos/kenton/e-kenton-next-v3) y [Kenton Fusion 135](/motos/kenton/fusion-135).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Kenton E-Kenton Next V5, el mantenimiento gira en torno a la batería y la carga: usá el cargador original, evitá dejarla descargada por semanas y cuidala del calor. El resto (frenos, cubiertas, suspensión y luces) se revisa como en cualquier moto.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton E-Kenton Next V5 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Kenton E-Kenton Next V5, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Fusibles y conectores.',
            1 => 'Batería y cargador, que son lo central en una moto eléctrica.',
            2 => 'Pastillas o zapatas de freno.',
            3 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            4 => 'Lámparas y luces de giro.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton E-Kenton Next V5 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Pedí que te muestren la autonomía real en un recorrido corto y cómo responde la batería.',
            1 => 'Preguntá por la garantía de la batería y si se puede reponer.',
            2 => 'Revisá que el cargador sea el original y esté en buen estado.',
            3 => 'Probá frenos, cubiertas y suspensión.',
            4 => 'Comprobá luces, tablero y que no haya cables expuestos.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton E-Kenton Next V5 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la Kenton E-Kenton Next V5?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton E-Kenton Next V5 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/forza-150' => array (
      'intro' => 
      array (
        0 => 'La Kenton Forza 150 es una moto naked, es decir, de las que no llevan carenado completo de 150 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tipo de arranque, freno delantero, freno trasero y tanque de combustible. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Classic 125](/motos/kenton/classic-125), [Kenton Classic 150](/motos/kenton/classic-150) y [Kenton Transporter 210 HD](/motos/kenton/transporter-210-hd).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Kenton Forza 150, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        2 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton Forza 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Kenton Forza 150, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            1 => 'Filtro de aire y filtro de aceite.',
            2 => 'Bujía y batería.',
            3 => 'Cubiertas, en la medida que figura en la ficha técnica.',
            4 => 'Cables de embrague y de acelerador.',
            5 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Kenton Forza 150 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            1 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            2 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            3 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            4 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            5 => 'Probá el arranque en frío y escuchá ruidos raros.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Forza 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton Forza 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Forza 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/fusion-125' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Kenton Fusion 125, esta página junta lo que se sabe: es una moto de tipo cub de 125 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Blitz 125 Sport](/motos/kenton/blitz-125-sport), [Kenton Fusion 135](/motos/kenton/fusion-135) y [Kenton E-Kenton Next V1](/motos/kenton/e-kenton-next-v1).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Kenton Fusion 125 el mantenimiento es de rutina: nivel de aceite, filtro de aire, cadena, frenos y cubiertas. Cuanto más trabaja la moto (reparto, ida y vuelta al trabajo), más seguido hay que mirar la cadena, que se alarga con el uso.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Fusion 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Kenton Fusion 125, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro.',
            3 => 'Pedal de arranque o de cambios, si la moto los lleva.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton Fusion 125 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate el estado del cuadro y del escape, sobre todo si estuvo mucho en la calle.',
            1 => 'Buscá pérdidas de aceite y golpes que indiquen caídas.',
            2 => 'Comprobá luces, luces de giro y bocina.',
            3 => 'Preguntá si se usó para reparto o carga, y cuántos dueños tuvo.',
            4 => 'Mirá la cadena y el piñón: son lo primero que se gasta en una moto de trabajo.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Fusion 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton Fusion 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Fusion 125 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/fusion-135' => array (
      'intro' => 
      array (
        0 => 'La Kenton Fusion 135 es una moto de tipo cub que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'De la ficha técnica todavía no tenemos datos con fuente, así que no los completamos con suposiciones. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Blitz 110](/motos/kenton/blitz-110), [Kenton Blitz 125 Sport](/motos/kenton/blitz-125-sport) y [Kenton Skua 150](/motos/kenton/skua-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Kenton Fusion 135 el mantenimiento es de rutina: nivel de aceite, filtro de aire, cadena, frenos y cubiertas. Cuanto más trabaja la moto (reparto, ida y vuelta al trabajo), más seguido hay que mirar la cadena, que se alarga con el uso.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Fusion 135 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Kenton Fusion 135, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cables de embrague y de acelerador.',
            1 => 'Lámparas y luces de giro.',
            2 => 'Pedal de arranque o de cambios, si la moto los lleva.',
            3 => 'Kit de arrastre (cadena, piñón y corona).',
            4 => 'Pastillas o zapatas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Kenton Fusion 135 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Preguntá si se usó para reparto o carga, y cuántos dueños tuvo.',
            1 => 'Mirá la cadena y el piñón: son lo primero que se gasta en una moto de trabajo.',
            2 => 'Pedí que la arranquen en frío y escuchá ruidos del motor.',
            3 => 'Probá que los cambios entren suaves y que el embrague no patine.',
            4 => 'Revisá frenos y cubiertas: una moto de trabajo suele tener muchos kilómetros.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Fusion 135 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la Kenton Fusion 135?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Fusion 135 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/gl-125' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Kenton GL 125, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 125 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: transmisión, tipo de arranque y refrigeración. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton GL 150 Pro](/motos/kenton/gl-150-pro), [Kenton GTR 150](/motos/kenton/gtr-150) y [Kenton Spark 150](/motos/kenton/spark-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Kenton GL 125, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Kenton GL 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Kenton GL 125, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            3 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
            5 => 'Pastillas o zapatas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton GL 125 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            1 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            2 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            3 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            4 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton GL 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton GL 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton GL 125 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/gl-150' => array (
      'intro' => 
      array (
        0 => 'La Kenton GL 150 es una moto naked, es decir, de las que no llevan carenado completo de 150 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, freno delantero, freno trasero, tanque de combustible y peso. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton GTR 150 LTD](/motos/kenton/gtr-150-ltd), [Kenton GTR 200 LTD](/motos/kenton/gtr-200-ltd) y [Kenton Quest ATV 500 4x4](/motos/kenton/quest-atv-500-4x4).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Kenton GL 150, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Kenton GL 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Kenton GL 150, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que figura en la ficha técnica.',
            3 => 'Cables de embrague y de acelerador.',
            4 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton GL 150 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            1 => 'Probá el arranque en frío y escuchá ruidos raros.',
            2 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            3 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            4 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton GL 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton GL 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton GL 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/gl-150-pro' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Kenton GL 150 Pro, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo de 150 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tipo de arranque, freno delantero, freno trasero y tanque de combustible. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton GTR 150](/motos/kenton/gtr-150), [Kenton GTR 150 LTD](/motos/kenton/gtr-150-ltd) y [Kenton Fusion 125](/motos/kenton/fusion-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Kenton GL 150 Pro, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        2 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton GL 150 Pro (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Kenton GL 150 Pro, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            1 => 'Filtro de aire y filtro de aceite.',
            2 => 'Bujía y batería.',
            3 => 'Cubiertas, en la medida que figura en la ficha técnica.',
            4 => 'Cables de embrague y de acelerador.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton GL 150 Pro usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            1 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            2 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            3 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            4 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton GL 150 Pro en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton GL 150 Pro?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton GL 150 Pro usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/gtr-150' => array (
      'intro' => 
      array (
        0 => 'La Kenton GTR 150 es una moto naked, es decir, de las que no llevan carenado completo de 150 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, tipo de arranque, freno delantero, freno trasero, tanque de combustible y peso. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton GTR 150 LTD](/motos/kenton/gtr-150-ltd), [Kenton GTR 200 LTD](/motos/kenton/gtr-200-ltd) y [Kenton Bull 200](/motos/kenton/bull-200).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Kenton GTR 150, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Kenton GTR 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Kenton GTR 150:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            3 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton GTR 150 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            1 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            2 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            3 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            4 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            5 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton GTR 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton GTR 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton GTR 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/gtr-150-ltd' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Kenton GTR 150 LTD, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo de 150 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, freno delantero, freno trasero, tanque de combustible, peso y tipo de motor. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton GL 150 Pro](/motos/kenton/gl-150-pro), [Kenton GTR 150](/motos/kenton/gtr-150) y [Kenton Transporter 210 HD](/motos/kenton/transporter-210-hd).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Kenton GTR 150 LTD, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton GTR 150 LTD (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Kenton GTR 150 LTD:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            3 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
            5 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton GTR 150 LTD usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            1 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            2 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            3 => 'Probá el arranque en frío y escuchá ruidos raros.',
            4 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton GTR 150 LTD en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton GTR 150 LTD?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton GTR 150 LTD usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/gtr-200-ltd' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Kenton GTR 200 LTD, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 200 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia y tanque de combustible. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Classic 150](/motos/kenton/classic-150), [Kenton Forza 150](/motos/kenton/forza-150) y [Kenton Symphony 125S](/motos/kenton/symphony-125s).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Kenton GTR 200 LTD, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton GTR 200 LTD (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Kenton GTR 200 LTD:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            3 => 'Cables de embrague y de acelerador.',
            4 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            5 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Kenton GTR 200 LTD usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            1 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            2 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            3 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            4 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            5 => 'Probá el arranque en frío y escuchá ruidos raros.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton GTR 200 LTD en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton GTR 200 LTD?',
          'a' => 'Según la ficha técnica de esta página, tiene 200 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton GTR 200 LTD usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/quest-200' => array (
      'intro' => 
      array (
        0 => 'El Kenton Quest 200 es un cuatriciclo de 200 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Volkano 125](/motos/kenton/volkano-125), [Kenton Volkano 150 Off Road](/motos/kenton/volkano-150-off-road) y [Kenton Transporter 150 HD](/motos/kenton/transporter-150-hd).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En el Kenton Quest 200, después de cada salida por el campo o el monte, conviene lavar, secar y mirar frenos, cubiertas y tornillería. El filtro de aire se tapa rápido con polvo, y la transmisión pide lubricación según el manual.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Quest 200 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario el Kenton Quest 200, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cables de acelerador y de freno.',
            1 => 'Pastillas o zapatas de freno.',
            2 => 'Filtro de aire y filtro de aceite.',
            3 => 'Bujía y batería.',
            4 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            5 => 'Rótulas, bujes y guardapolvos.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar el Kenton Quest 200 usado, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Preguntá si trabajó en el campo, con barro o con carga.',
            1 => 'Revisá luces, tablero y cableado.',
            2 => 'Revisá rótulas, bujes y fuelles: el barro los gasta rápido.',
            3 => 'Mirá los frenos y las cubiertas.',
            4 => 'Buscá marcas de vuelco en el cuadro, los guardabarros y el manubrio.',
            5 => 'Escuchá el motor y la transmisión, y fijate si hay pérdidas de aceite.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Quest 200 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Quest 200?',
          'a' => 'Según la ficha técnica de esta página, tiene 200 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Quest 200 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/quest-300-4x4' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando el Kenton Quest 300 4x4, esta página junta lo que se sabe: es un cuatriciclo de 300 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Volkano 150 Off Road](/motos/kenton/volkano-150-off-road), [Kenton Volkano 250 Off Road](/motos/kenton/volkano-250-off-road) y [Kenton Quick 125](/motos/kenton/quick-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En el Kenton Quest 300 4x4, después de cada salida por el campo o el monte, conviene lavar, secar y mirar frenos, cubiertas y tornillería. El filtro de aire se tapa rápido con polvo, y la transmisión pide lubricación según el manual.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Quest 300 4x4 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para el Kenton Quest 300 4x4, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            3 => 'Rótulas, bujes y guardapolvos.',
            4 => 'Cadena o elementos de transmisión, según el modelo.',
            5 => 'Lámparas y fusibles.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar el Kenton Quest 300 4x4 usado, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Pedí los papeles al día y los números de chasis y de motor.',
            1 => 'Preguntá si trabajó en el campo, con barro o con carga.',
            2 => 'Revisá luces, tablero y cableado.',
            3 => 'Revisá rótulas, bujes y fuelles: el barro los gasta rápido.',
            4 => 'Mirá los frenos y las cubiertas.',
            5 => 'Buscá marcas de vuelco en el cuadro, los guardabarros y el manubrio.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Quest 300 4x4 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Quest 300 4x4?',
          'a' => 'Según la ficha técnica de esta página, tiene 300 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Quest 300 4x4 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/quest-atv-500-4x4' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando el Kenton Quest ATV 500 4x4, esta página junta lo que se sabe: es un cuatriciclo de 500 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Volkano 150 Off Road](/motos/kenton/volkano-150-off-road), [Kenton Volkano 250 Off Road](/motos/kenton/volkano-250-off-road) y [Kenton Shark 150](/motos/kenton/shark-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un cuatriciclo como el Kenton Quest ATV 500 4x4 trabaja con barro, tierra y agua, así que el lavado y el engrase importan más que en una moto de calle. Revisá aceite, filtro de aire, frenos, cubiertas, rótulas y bujes con frecuencia, y el estado de la transmisión.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Quest ATV 500 4x4 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario el Kenton Quest ATV 500 4x4, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            3 => 'Rótulas, bujes y guardapolvos.',
            4 => 'Cadena o elementos de transmisión, según el modelo.',
            5 => 'Lámparas y fusibles.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás el Kenton Quest ATV 500 4x4 usado, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Mirá los frenos y las cubiertas.',
            1 => 'Buscá marcas de vuelco en el cuadro, los guardabarros y el manubrio.',
            2 => 'Escuchá el motor y la transmisión, y fijate si hay pérdidas de aceite.',
            3 => 'Comprobá que el marcha atrás y los cambios funcionen, si el modelo los tiene.',
            4 => 'Pedí los papeles al día y los números de chasis y de motor.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Quest ATV 500 4x4 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Quest ATV 500 4x4?',
          'a' => 'Según la ficha técnica de esta página, tiene 500 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Quest ATV 500 4x4 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/quick-125' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos del Kenton Quick 125, esta página te ahorra vueltas: se trata de un scooter de 125 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si lo encontrás usado.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, freno delantero, freno trasero, tanque de combustible y tipo de motor. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Bravo 125](/motos/kenton/bravo-125), [Kenton Road Power 170](/motos/kenton/road-power-170) y [Kenton GTR 200 LTD](/motos/kenton/gtr-200-ltd).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un scooter como el Kenton Quick 125 no lleva cadena: tiene una transmisión automática que también se desgasta y que el taller debe revisar en cada service. Fuera de eso, cuidá el aceite, el filtro de aire, la bujía, los frenos y las cubiertas, que en ruedas chicas se gastan rápido.',
        1 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        2 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton Quick 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario el Kenton Quick 125, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Lámparas y luces de giro.',
            1 => 'Espejos y carenados, que son lo primero que se rompe en una caída.',
            2 => 'Correa de transmisión y rodillos del variador, según el modelo.',
            3 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            4 => 'Filtro de aire y filtro de aceite.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar el Kenton Quick 125 usado, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá luces, luces de giro, bocina y el asiento con su cierre.',
            1 => 'Revisá el escape y que no haya humo azul o blanco al acelerar.',
            2 => 'Pedí que la arranquen en frío y escuchá la transmisión automática: tirones o vibraciones al acelerar son mala señal.',
            3 => 'Revisá las cubiertas, que en ruedas chicas se gastan rápido, y los frenos.',
            4 => 'Buscá golpes en los carenados y en el piso, y roturas en los plásticos.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Quick 125 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, Chacomer S.A.E, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Quick 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Quick 125 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/road-power-170' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando el Kenton Road Power 170, esta página junta lo que se sabe: es un scooter de 170 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, freno delantero, freno trasero, tanque de combustible y alimentación. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Quick 125](/motos/kenton/quick-125), [Kenton Spark 150](/motos/kenton/spark-150) y [Kenton Bull 200](/motos/kenton/bull-200).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En el Kenton Road Power 170 lo habitual es revisar la transmisión automática (variador, correa y rodillos, en la mayoría de los scooters) junto con el aceite, el filtro de aire y los frenos. El calor y el tránsito de Asunción hacen que conviene no postergar el service.',
        1 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        2 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton Road Power 170 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para el Kenton Road Power 170, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cable del acelerador.',
            1 => 'Lámparas y luces de giro.',
            2 => 'Espejos y carenados, que son lo primero que se rompe en una caída.',
            3 => 'Correa de transmisión y rodillos del variador, según el modelo.',
            4 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            5 => 'Filtro de aire y filtro de aceite.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar el Kenton Road Power 170 usado, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Pedí que la arranquen en frío y escuchá la transmisión automática: tirones o vibraciones al acelerar son mala señal.',
            1 => 'Revisá las cubiertas, que en ruedas chicas se gastan rápido, y los frenos.',
            2 => 'Buscá golpes en los carenados y en el piso, y roturas en los plásticos.',
            3 => 'Fijate que la batería arranque sin problemas y que el motor de arranque responda.',
            4 => 'Mirá si hay pérdidas de aceite o de líquido debajo de la moto.',
            5 => 'Probá la suspensión: la moto no debería golpear ni rebotar de más.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Road Power 170 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Road Power 170?',
          'a' => 'Según la ficha técnica de esta página, tiene 170 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Road Power 170 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/shark-150' => array (
      'intro' => 
      array (
        0 => 'La Kenton Shark 150 es una moto de tipo enduro o cross de 149 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, freno delantero, freno trasero, tanque de combustible y peso. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Shark 200](/motos/kenton/shark-200), [Kenton Skua 150](/motos/kenton/skua-150) y [Kenton E-Kenton Next V5](/motos/kenton/e-kenton-next-v5).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Si la Kenton Shark 150 sale a caminos de tierra, el mantenimiento tiene que ser más estricto: filtro de aire limpio (el polvo entra por ahí), cadena lubricada, frenos sin barro, y aceite al día. La suspensión y las cubiertas también se revisan más seguido.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton Shark 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Kenton Shark 150, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Kit de arrastre (cadena, piñón y corona), de lo más exigido en tierra.',
            1 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            2 => 'Filtro de aire, que se cambia con más frecuencia si salís a caminos de tierra.',
            3 => 'Filtro de aceite y bujía.',
            4 => 'Cubiertas, en la medida que figura en la ficha técnica.',
            5 => 'Palancas de freno y de embrague de repuesto.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Kenton Shark 150 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Probá que los frenos frenen parejo y que las cubiertas tengan taco.',
            1 => 'Revisá la cadena, el piñón y la corona.',
            2 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            3 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            4 => 'Preguntá si se usó en competencia o en trabajo de campo.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Shark 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton Shark 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 149 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Shark 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/shark-200' => array (
      'intro' => 
      array (
        0 => 'La Kenton Shark 200 es una moto de tipo enduro o cross de 200 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, tipo de arranque, freno delantero, freno trasero, tanque de combustible y altura del asiento. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Skua 150](/motos/kenton/skua-150), [Kenton DKR 150](/motos/kenton/dkr-150) y [Kenton Bravo 125](/motos/kenton/bravo-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Si la Kenton Shark 200 sale a caminos de tierra, el mantenimiento tiene que ser más estricto: filtro de aire limpio (el polvo entra por ahí), cadena lubricada, frenos sin barro, y aceite al día. La suspensión y las cubiertas también se revisan más seguido.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton Shark 200 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Kenton Shark 200, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            1 => 'Filtro de aire, que se cambia con más frecuencia si salís a caminos de tierra.',
            2 => 'Filtro de aceite y bujía.',
            3 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            4 => 'Palancas de freno y de embrague de repuesto.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Kenton Shark 200 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
            1 => 'Buscá torceduras en el manubrio, el cuadro y las llantas, señales de caídas fuertes.',
            2 => 'Mirá el filtro de aire: si está sucio o roto, el motor pudo haber tragado polvo.',
            3 => 'Probá que los frenos frenen parejo y que las cubiertas tengan taco.',
            4 => 'Revisá la cadena, el piñón y la corona.',
            5 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Shark 200 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton Shark 200?',
          'a' => 'Según la ficha técnica de esta página, tiene 200 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Shark 200 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/skua-150' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Kenton Skua 150, esta página te ahorra vueltas: se trata de una moto de tipo enduro o cross de 150 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, freno delantero, freno trasero, tanque de combustible y peso. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton DKR 200](/motos/kenton/dkr-200), [Kenton Shark 150](/motos/kenton/shark-150) y [Kenton Quest 200](/motos/kenton/quest-200).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Si la Kenton Skua 150 sale a caminos de tierra, el mantenimiento tiene que ser más estricto: filtro de aire limpio (el polvo entra por ahí), cadena lubricada, frenos sin barro, y aceite al día. La suspensión y las cubiertas también se revisan más seguido.',
        1 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        2 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton Skua 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Kenton Skua 150, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Palancas de freno y de embrague de repuesto.',
            1 => 'Retenes y aceite de la horquilla, según el manual.',
            2 => 'Protectores y manoplas.',
            3 => 'Kit de arrastre (cadena, piñón y corona), de lo más exigido en tierra.',
            4 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Kenton Skua 150 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            1 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
            2 => 'Buscá torceduras en el manubrio, el cuadro y las llantas, señales de caídas fuertes.',
            3 => 'Mirá el filtro de aire: si está sucio o roto, el motor pudo haber tragado polvo.',
            4 => 'Probá que los frenos frenen parejo y que las cubiertas tengan taco.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Skua 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton Skua 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Skua 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/spark-150' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando el Kenton Spark 150, esta página junta lo que se sabe: es un scooter de 150 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tipo de arranque, freno delantero, freno trasero y tanque de combustible. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Bravo 125](/motos/kenton/bravo-125), [Kenton Quick 125](/motos/kenton/quick-125) y [Kenton Volkano 125](/motos/kenton/volkano-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En el Kenton Spark 150 lo habitual es revisar la transmisión automática (variador, correa y rodillos, en la mayoría de los scooters) junto con el aceite, el filtro de aire y los frenos. El calor y el tránsito de Asunción hacen que conviene no postergar el service.',
        1 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton Spark 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario el Kenton Spark 150, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que figura en la ficha técnica, que en scooter se gastan más rápido.',
            3 => 'Cable del acelerador.',
            4 => 'Lámparas y luces de giro.',
            5 => 'Espejos y carenados, que son lo primero que se rompe en una caída.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar el Kenton Spark 150 usado, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá golpes en los carenados y en el piso, y roturas en los plásticos.',
            1 => 'Fijate que la batería arranque sin problemas y que el motor de arranque responda.',
            2 => 'Mirá si hay pérdidas de aceite o de líquido debajo de la moto.',
            3 => 'Probá la suspensión: la moto no debería golpear ni rebotar de más.',
            4 => 'Comprobá luces, luces de giro, bocina y el asiento con su cierre.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Spark 150 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, Chacomer S.A.E, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Spark 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Spark 150 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/stratta-200' => array (
      'intro' => 
      array (
        0 => 'La Kenton Stratta 200 es una moto naked, es decir, de las que no llevan carenado completo de 200 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tipo de arranque, freno delantero, freno trasero y tanque de combustible. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton GL 125](/motos/kenton/gl-125), [Kenton GL 150](/motos/kenton/gl-150) y [Kenton Blitz 125 Sport](/motos/kenton/blitz-125-sport).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Kenton Stratta 200, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Kenton Stratta 200 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Kenton Stratta 200, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que figura en la ficha técnica.',
            3 => 'Cables de embrague y de acelerador.',
            4 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Kenton Stratta 200 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            1 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            2 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            3 => 'Probá el arranque en frío y escuchá ruidos raros.',
            4 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Kenton Stratta 200 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Kenton Stratta 200?',
          'a' => 'Según la ficha técnica de esta página, tiene 200 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Kenton Stratta 200 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/symphony-125s' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos del Kenton Symphony 125S, esta página te ahorra vueltas: se trata de un scooter de 125 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si lo encontrás usado.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Bravo 125](/motos/kenton/bravo-125), [Kenton Quick 125](/motos/kenton/quick-125) y [Kenton GL 150 Pro](/motos/kenton/gl-150-pro).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En el Kenton Symphony 125S lo habitual es revisar la transmisión automática (variador, correa y rodillos, en la mayoría de los scooters) junto con el aceite, el filtro de aire y los frenos. El calor y el tránsito de Asunción hacen que conviene no postergar el service.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Symphony 125S (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para el Kenton Symphony 125S, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio, que en scooter se gastan más rápido.',
            1 => 'Cable del acelerador.',
            2 => 'Lámparas y luces de giro.',
            3 => 'Espejos y carenados, que son lo primero que se rompe en una caída.',
            4 => 'Correa de transmisión y rodillos del variador, según el modelo.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar el Kenton Symphony 125S usado, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate que la batería arranque sin problemas y que el motor de arranque responda.',
            1 => 'Mirá si hay pérdidas de aceite o de líquido debajo de la moto.',
            2 => 'Probá la suspensión: la moto no debería golpear ni rebotar de más.',
            3 => 'Comprobá luces, luces de giro, bocina y el asiento con su cierre.',
            4 => 'Revisá el escape y que no haya humo azul o blanco al acelerar.',
            5 => 'Pedí que la arranquen en frío y escuchá la transmisión automática: tirones o vibraciones al acelerar son mala señal.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Symphony 125S en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Symphony 125S?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Symphony 125S usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/transporter-150-hd' => array (
      'intro' => 
      array (
        0 => 'El Kenton Transporter 150 HD es un motocarro de carga de 150 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Transporter 210 HD](/motos/kenton/transporter-210-hd), [Kenton Transporter 180](/motos/kenton/transporter-180) y [Kenton Quest 300 4x4](/motos/kenton/quest-300-4x4).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un motocarro de carga como el Kenton Transporter 150 HD trabaja con peso, y eso exige más atención a los frenos, la suspensión, las cubiertas y la transmisión. Revisá aceite, filtro de aire y frenos con frecuencia, y no lo uses por encima de la carga que indica el fabricante.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Transporter 150 HD (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario el Kenton Transporter 150 HD, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Pastillas o zapatas de freno.',
            1 => 'Filtro de aire y filtro de aceite.',
            2 => 'Bujía y batería.',
            3 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio, que trabajan con carga.',
            4 => 'Amortiguadores y elásticos, que sufren con el peso.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar el Kenton Transporter 150 HD usado, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá pérdidas de aceite y ruidos en la transmisión.',
            1 => 'Preguntá qué tipo de carga llevó y por cuánto tiempo.',
            2 => 'Comprobá luces y que las luces de giro funcionen.',
            3 => 'Pedí los papeles al día y comprobá los números de chasis y de motor.',
            4 => 'Revisá el cuadro por fisuras o soldaduras raras.',
            5 => 'Revisá el estado de la caja de carga, el piso y los amarres.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Transporter 150 HD en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Transporter 150 HD?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Transporter 150 HD usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/transporter-180' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando el Kenton Transporter 180, esta página junta lo que se sabe: es un motocarro de carga de 180 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Transporter 150 HD](/motos/kenton/transporter-150-hd), [Kenton Transporter 210 HD](/motos/kenton/transporter-210-hd) y [Kenton Skua 150](/motos/kenton/skua-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un motocarro de carga como el Kenton Transporter 180 trabaja con peso, y eso exige más atención a los frenos, la suspensión, las cubiertas y la transmisión. Revisá aceite, filtro de aire y frenos con frecuencia, y no lo uses por encima de la carga que indica el fabricante.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Transporter 180 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para el Kenton Transporter 180, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio, que trabajan con carga.',
            3 => 'Amortiguadores y elásticos, que sufren con el peso.',
            4 => 'Cadena u otros elementos de la transmisión, según el modelo.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con el Kenton Transporter 180 usado, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá el estado de la caja de carga, el piso y los amarres.',
            1 => 'Mirá frenos, cubiertas y amortiguadores: trabajan con peso.',
            2 => 'Buscá pérdidas de aceite y ruidos en la transmisión.',
            3 => 'Preguntá qué tipo de carga llevó y por cuánto tiempo.',
            4 => 'Comprobá luces y que las luces de giro funcionen.',
            5 => 'Pedí los papeles al día y comprobá los números de chasis y de motor.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Transporter 180 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Transporter 180?',
          'a' => 'Según la ficha técnica de esta página, tiene 180 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Transporter 180 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/transporter-210-hd' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos del Kenton Transporter 210 HD, esta página te ahorra vueltas: se trata de un motocarro de carga de 210 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si lo encontrás usado.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Transporter 180](/motos/kenton/transporter-180), [Kenton Transporter 150 HD](/motos/kenton/transporter-150-hd) y [Kenton DKR 150](/motos/kenton/dkr-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un motocarro de carga como el Kenton Transporter 210 HD trabaja con peso, y eso exige más atención a los frenos, la suspensión, las cubiertas y la transmisión. Revisá aceite, filtro de aire y frenos con frecuencia, y no lo uses por encima de la carga que indica el fabricante.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Transporter 210 HD (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para el Kenton Transporter 210 HD, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio, que trabajan con carga.',
            3 => 'Amortiguadores y elásticos, que sufren con el peso.',
            4 => 'Cadena u otros elementos de la transmisión, según el modelo.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con el Kenton Transporter 210 HD usado, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá el cuadro por fisuras o soldaduras raras.',
            1 => 'Revisá el estado de la caja de carga, el piso y los amarres.',
            2 => 'Mirá frenos, cubiertas y amortiguadores: trabajan con peso.',
            3 => 'Buscá pérdidas de aceite y ruidos en la transmisión.',
            4 => 'Preguntá qué tipo de carga llevó y por cuánto tiempo.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Transporter 210 HD en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Transporter 210 HD?',
          'a' => 'Según la ficha técnica de esta página, tiene 210 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Transporter 210 HD usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/volkano-125' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos del Kenton Volkano 125, esta página te ahorra vueltas: se trata de un cuatriciclo de 125 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si lo encontrás usado.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Quest 300 4x4](/motos/kenton/quest-300-4x4), [Kenton Quest ATV 500 4x4](/motos/kenton/quest-atv-500-4x4) y [Kenton Blitz 110](/motos/kenton/blitz-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En el Kenton Volkano 125, después de cada salida por el campo o el monte, conviene lavar, secar y mirar frenos, cubiertas y tornillería. El filtro de aire se tapa rápido con polvo, y la transmisión pide lubricación según el manual.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Volkano 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario el Kenton Volkano 125, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Lámparas y fusibles.',
            1 => 'Cables de acelerador y de freno.',
            2 => 'Pastillas o zapatas de freno.',
            3 => 'Filtro de aire y filtro de aceite.',
            4 => 'Bujía y batería.',
            5 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar el Kenton Volkano 125 usado, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Mirá los frenos y las cubiertas.',
            1 => 'Buscá marcas de vuelco en el cuadro, los guardabarros y el manubrio.',
            2 => 'Escuchá el motor y la transmisión, y fijate si hay pérdidas de aceite.',
            3 => 'Comprobá que el marcha atrás y los cambios funcionen, si el modelo los tiene.',
            4 => 'Pedí los papeles al día y los números de chasis y de motor.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Volkano 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Volkano 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Volkano 125 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/volkano-150-off-road' => array (
      'intro' => 
      array (
        0 => 'El Kenton Volkano 150 Off Road es un cuatriciclo de 150 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Bull 200](/motos/kenton/bull-200), [Kenton Quest 200](/motos/kenton/quest-200) y [Kenton Fusion 125](/motos/kenton/fusion-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En el Kenton Volkano 150 Off Road, después de cada salida por el campo o el monte, conviene lavar, secar y mirar frenos, cubiertas y tornillería. El filtro de aire se tapa rápido con polvo, y la transmisión pide lubricación según el manual.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Volkano 150 Off Road (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario el Kenton Volkano 150 Off Road, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Rótulas, bujes y guardapolvos.',
            2 => 'Cadena o elementos de transmisión, según el modelo.',
            3 => 'Lámparas y fusibles.',
            4 => 'Cables de acelerador y de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar el Kenton Volkano 150 Off Road usado, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá marcas de vuelco en el cuadro, los guardabarros y el manubrio.',
            1 => 'Escuchá el motor y la transmisión, y fijate si hay pérdidas de aceite.',
            2 => 'Comprobá que el marcha atrás y los cambios funcionen, si el modelo los tiene.',
            3 => 'Pedí los papeles al día y los números de chasis y de motor.',
            4 => 'Preguntá si trabajó en el campo, con barro o con carga.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Volkano 150 Off Road en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Volkano 150 Off Road?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Volkano 150 Off Road usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'kenton/volkano-250-off-road' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando el Kenton Volkano 250 Off Road, esta página junta lo que se sabe: es un cuatriciclo de 250 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Kenton y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/kenton).',
        3 => 'Si todavía estás comparando, mirá también [Kenton Volkano 125](/motos/kenton/volkano-125), [Kenton Volkano 150 Off Road](/motos/kenton/volkano-150-off-road) y [Kenton DKR 200](/motos/kenton/dkr-200).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En el Kenton Volkano 250 Off Road, después de cada salida por el campo o el monte, conviene lavar, secar y mirar frenos, cubiertas y tornillería. El filtro de aire se tapa rápido con polvo, y la transmisión pide lubricación según el manual.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Kenton Volkano 250 Off Road (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para el Kenton Volkano 250 Off Road, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cables de acelerador y de freno.',
            1 => 'Pastillas o zapatas de freno.',
            2 => 'Filtro de aire y filtro de aceite.',
            3 => 'Bujía y batería.',
            4 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás el Kenton Volkano 250 Off Road usado, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Escuchá el motor y la transmisión, y fijate si hay pérdidas de aceite.',
            1 => 'Comprobá que el marcha atrás y los cambios funcionen, si el modelo los tiene.',
            2 => 'Pedí los papeles al día y los números de chasis y de motor.',
            3 => 'Preguntá si trabajó en el campo, con barro o con carga.',
            4 => 'Revisá luces, tablero y cableado.',
            5 => 'Revisá rótulas, bujes y fuelles: el barro los gasta rápido.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Kenton Volkano 250 Off Road en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Kenton y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Kenton Volkano 250 Off Road?',
          'a' => 'Según la ficha técnica de esta página, tiene 250 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Kenton en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Kenton Volkano 250 Off Road usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/150-x' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Star 150-X, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo de 150 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia. El precio 0 km que figura abajo lo publicó Alex S.A., y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star RX4 150](/motos/star/rx4-150), [Star Star 125](/motos/star/star-125) y [Star New Desert 150](/motos/star/new-desert-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Star 150-X, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Star 150-X (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Star 150-X, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cables de embrague y de acelerador.',
            1 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            2 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            3 => 'Kit de arrastre (cadena, piñón y corona).',
            4 => 'Pastillas o zapatas de freno.',
            5 => 'Filtro de aire y filtro de aceite.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Star 150-X usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            1 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            2 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            3 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            4 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star 150-X en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Alex S.A.) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star 150-X?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star 150-X usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/a1-110' => array (
      'intro' => 
      array (
        0 => 'El Star A1 110 es un scooter de 110 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, transmisión, tipo de arranque, tanque de combustible y refrigeración. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star Magic 125](/motos/star/magic-125), [Star Genius 125](/motos/star/genius-125) y [Star Star 125](/motos/star/star-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En el Star A1 110 lo habitual es revisar la transmisión automática (variador, correa y rodillos, en la mayoría de los scooters) junto con el aceite, el filtro de aire y los frenos. El calor y el tránsito de Asunción hacen que conviene no postergar el service.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Star A1 110 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para el Star A1 110, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Correa de transmisión y rodillos del variador, según el modelo.',
            1 => 'Pastillas o zapatas de freno.',
            2 => 'Filtro de aire y filtro de aceite.',
            3 => 'Bujía y batería.',
            4 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio, que en scooter se gastan más rápido.',
            5 => 'Cable del acelerador.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás el Star A1 110 usado, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Pedí que la arranquen en frío y escuchá la transmisión automática: tirones o vibraciones al acelerar son mala señal.',
            1 => 'Revisá las cubiertas, que en ruedas chicas se gastan rápido, y los frenos.',
            2 => 'Buscá golpes en los carenados y en el piso, y roturas en los plásticos.',
            3 => 'Fijate que la batería arranque sin problemas y que el motor de arranque responda.',
            4 => 'Mirá si hay pérdidas de aceite o de líquido debajo de la moto.',
            5 => 'Probá la suspensión: la moto no debería golpear ni rebotar de más.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Star A1 110 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, Alex S.A, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Star A1 110?',
          'a' => 'Según la ficha técnica de esta página, tiene 110 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Star A1 110 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/dax-110' => array (
      'intro' => 
      array (
        0 => 'La Star Dax 110 es una moto de tipo cub de 110 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: tipo de arranque, freno delantero, freno trasero, tanque de combustible, peso y altura del asiento. El precio 0 km que figura abajo lo publicó Alex S.A., y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star XRM 150](/motos/star/xrm-150), [Star Dax-A 110](/motos/star/dax-a-110) y [Star Star 200](/motos/star/star-200).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Star Dax 110 el mantenimiento es de rutina: nivel de aceite, filtro de aire, cadena, frenos y cubiertas. Cuanto más trabaja la moto (reparto, ida y vuelta al trabajo), más seguido hay que mirar la cadena, que se alarga con el uso.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Star Dax 110 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Star Dax 110, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Bujía y batería.',
            1 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            2 => 'Cables de embrague y de acelerador.',
            3 => 'Lámparas y luces de giro.',
            4 => 'Pedal de arranque o de cambios, si la moto los lleva.',
            5 => 'Kit de arrastre (cadena, piñón y corona).',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Star Dax 110 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Preguntá si se usó para reparto o carga, y cuántos dueños tuvo.',
            1 => 'Mirá la cadena y el piñón: son lo primero que se gasta en una moto de trabajo.',
            2 => 'Pedí que la arranquen en frío y escuchá ruidos del motor.',
            3 => 'Probá que los cambios entren suaves y que el embrague no patine.',
            4 => 'Revisá frenos y cubiertas: una moto de trabajo suele tener muchos kilómetros.',
            5 => 'Fijate el estado del cuadro y del escape, sobre todo si estuvo mucho en la calle.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star Dax 110 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Alex S.A.) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star Dax 110?',
          'a' => 'Según la ficha técnica de esta página, tiene 110 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star Dax 110 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/dax-a-110' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Star Dax-A 110, esta página te ahorra vueltas: se trata de una moto de tipo cub de 110 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: freno delantero. El precio 0 km que figura abajo lo publicó Alex S.A., y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star Dax 110](/motos/star/dax-110), [Star XRM 150](/motos/star/xrm-150) y [Star RX4 150](/motos/star/rx4-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Star Dax-A 110 el mantenimiento es de rutina: nivel de aceite, filtro de aire, cadena, frenos y cubiertas. Cuanto más trabaja la moto (reparto, ida y vuelta al trabajo), más seguido hay que mirar la cadena, que se alarga con el uso.',
        1 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Star Dax-A 110 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Star Dax-A 110, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Pastillas de freno.',
            1 => 'Filtro de aire y filtro de aceite.',
            2 => 'Bujía y batería.',
            3 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            4 => 'Cables de embrague y de acelerador.',
            5 => 'Lámparas y luces de giro.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Star Dax-A 110 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá luces, luces de giro y bocina.',
            1 => 'Preguntá si se usó para reparto o carga, y cuántos dueños tuvo.',
            2 => 'Mirá la cadena y el piñón: son lo primero que se gasta en una moto de trabajo.',
            3 => 'Pedí que la arranquen en frío y escuchá ruidos del motor.',
            4 => 'Probá que los cambios entren suaves y que el embrague no patine.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star Dax-A 110 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Alex S.A.) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star Dax-A 110?',
          'a' => 'Según la ficha técnica de esta página, tiene 110 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star Dax-A 110 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/fxz-150' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Star FXZ 150, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 150 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia. El precio 0 km que figura abajo lo publicó Alex S.A., y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star Star 150](/motos/star/star-150), [Star Star 200](/motos/star/star-200) y [Star Dax 110](/motos/star/dax-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Star FXZ 150, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Star FXZ 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Star FXZ 150:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Kit de arrastre (cadena, piñón y corona).',
            1 => 'Pastillas o zapatas de freno.',
            2 => 'Filtro de aire y filtro de aceite.',
            3 => 'Bujía y batería.',
            4 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Star FXZ 150 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            1 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            2 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            3 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            4 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star FXZ 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Alex S.A.) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star FXZ 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star FXZ 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/genius-125' => array (
      'intro' => 
      array (
        0 => 'El Star Genius 125 es un scooter de 125 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, freno delantero, freno trasero y tanque de combustible. El precio 0 km que figura abajo lo publicó Alex S.A., y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star Magic 125](/motos/star/magic-125), [Star A1 110](/motos/star/a1-110) y [Star SMX 150](/motos/star/smx-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un scooter como el Star Genius 125 no lleva cadena: tiene una transmisión automática que también se desgasta y que el taller debe revisar en cada service. Fuera de eso, cuidá el aceite, el filtro de aire, la bujía, los frenos y las cubiertas, que en ruedas chicas se gastan rápido.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Star Genius 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en el Star Genius 125:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Lámparas y luces de giro.',
            1 => 'Espejos y carenados, que son lo primero que se rompe en una caída.',
            2 => 'Correa de transmisión y rodillos del variador, según el modelo.',
            3 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            4 => 'Filtro de aire y filtro de aceite.',
            5 => 'Bujía y batería.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con el Star Genius 125 usado, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá golpes en los carenados y en el piso, y roturas en los plásticos.',
            1 => 'Fijate que la batería arranque sin problemas y que el motor de arranque responda.',
            2 => 'Mirá si hay pérdidas de aceite o de líquido debajo de la moto.',
            3 => 'Probá la suspensión: la moto no debería golpear ni rebotar de más.',
            4 => 'Comprobá luces, luces de giro, bocina y el asiento con su cierre.',
            5 => 'Revisá el escape y que no haya humo azul o blanco al acelerar.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Star Genius 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Alex S.A.) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Star Genius 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Star Genius 125 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/magic-125' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando el Star Magic 125, esta página junta lo que se sabe: es un scooter de 125 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, freno delantero, freno trasero y tanque de combustible. El precio 0 km que figura abajo lo publicó Alex S.A., y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star Genius 125](/motos/star/genius-125), [Star A1 110](/motos/star/a1-110) y [Star XVR 200](/motos/star/xvr-200).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Un scooter como el Star Magic 125 no lleva cadena: tiene una transmisión automática que también se desgasta y que el taller debe revisar en cada service. Fuera de eso, cuidá el aceite, el filtro de aire, la bujía, los frenos y las cubiertas, que en ruedas chicas se gastan rápido.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Star Magic 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en el Star Magic 125:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            1 => 'Filtro de aire y filtro de aceite.',
            2 => 'Bujía y batería.',
            3 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio, que en scooter se gastan más rápido.',
            4 => 'Cable del acelerador.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con el Star Magic 125 usado, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate que la batería arranque sin problemas y que el motor de arranque responda.',
            1 => 'Mirá si hay pérdidas de aceite o de líquido debajo de la moto.',
            2 => 'Probá la suspensión: la moto no debería golpear ni rebotar de más.',
            3 => 'Comprobá luces, luces de giro, bocina y el asiento con su cierre.',
            4 => 'Revisá el escape y que no haya humo azul o blanco al acelerar.',
            5 => 'Pedí que la arranquen en frío y escuchá la transmisión automática: tirones o vibraciones al acelerar son mala señal.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale el Star Magic 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Alex S.A.) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene el Star Magic 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro el Star Magic 125 usado?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/new-desert-150' => array (
      'intro' => 
      array (
        0 => 'La Star New Desert 150 es una moto de tipo enduro o cross de 150 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia. El precio 0 km que figura abajo lo publicó Alex S.A., y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star SMX 150](/motos/star/smx-150), [Star XVR 200](/motos/star/xvr-200) y [Star Dax 110](/motos/star/dax-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo enduro o cross como la Star New Desert 150 sufre más que una de calle: polvo en el filtro de aire, barro en la cadena y golpes en la suspensión. Después de salir a tierra o de una lluvia, lavala, secala y revisá cadena, filtro de aire y tornillos flojos.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Star New Desert 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Star New Desert 150:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Pastillas o zapatas de freno.',
            1 => 'Filtro de aire, que se cambia con más frecuencia si salís a caminos de tierra.',
            2 => 'Filtro de aceite y bujía.',
            3 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            4 => 'Palancas de freno y de embrague de repuesto.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Star New Desert 150 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá la cadena, el piñón y la corona.',
            1 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            2 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            3 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            4 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
            5 => 'Buscá torceduras en el manubrio, el cuadro y las llantas, señales de caídas fuertes.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star New Desert 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Alex S.A.) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star New Desert 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star New Desert 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/nt-a-150' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Star NT-A 150, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 150 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, freno delantero, freno trasero, tanque de combustible, neumático delantero y neumático trasero. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star Star 150](/motos/star/star-150), [Star Star 200](/motos/star/star-200) y [Star XVR 200](/motos/star/xvr-200).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Star NT-A 150, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Star NT-A 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Star NT-A 150, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Bujía y batería.',
            1 => 'Cubiertas, en la medida que figura en la ficha técnica.',
            2 => 'Cables de embrague y de acelerador.',
            3 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            4 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            5 => 'Kit de arrastre (cadena, piñón y corona).',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Star NT-A 150 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            1 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            2 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            3 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            4 => 'Probá el arranque en frío y escuchá ruidos raros.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star NT-A 150 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, Alex S.A, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star NT-A 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star NT-A 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/rx4-150' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Star RX4 150, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo de 150 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, freno delantero, freno trasero, tanque de combustible y neumático delantero. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star Star 200](/motos/star/star-200), [Star 150-X](/motos/star/150-x) y [Star A1 110](/motos/star/a1-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Star RX4 150, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Star RX4 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Star RX4 150, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que figura en la ficha técnica.',
            3 => 'Cables de embrague y de acelerador.',
            4 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Star RX4 150 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            1 => 'Probá el arranque en frío y escuchá ruidos raros.',
            2 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            3 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            4 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            5 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star RX4 150 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, Alex S.A, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star RX4 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star RX4 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/smx-150' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Star SMX 150, esta página te ahorra vueltas: se trata de una moto de tipo enduro o cross de 150 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tipo de arranque, freno delantero, freno trasero y tanque de combustible. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star XVR 200](/motos/star/xvr-200), [Star New Desert 150](/motos/star/new-desert-150) y [Star Star 125](/motos/star/star-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo enduro o cross como la Star SMX 150 sufre más que una de calle: polvo en el filtro de aire, barro en la cadena y golpes en la suspensión. Después de salir a tierra o de una lluvia, lavala, secala y revisá cadena, filtro de aire y tornillos flojos.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Star SMX 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Star SMX 150:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que figura en la ficha técnica.',
            1 => 'Palancas de freno y de embrague de repuesto.',
            2 => 'Retenes y aceite de la horquilla, según el manual.',
            3 => 'Protectores y manoplas.',
            4 => 'Kit de arrastre (cadena, piñón y corona), de lo más exigido en tierra.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Star SMX 150 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            1 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            2 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
            3 => 'Buscá torceduras en el manubrio, el cuadro y las llantas, señales de caídas fuertes.',
            4 => 'Mirá el filtro de aire: si está sucio o roto, el motor pudo haber tragado polvo.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star SMX 150 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, Alex S.A, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star SMX 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star SMX 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/star-125' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Star Star 125, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo de 125 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, freno delantero, freno trasero y tanque de combustible. El precio 0 km que figura abajo lo publicó Alex S.A., y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star Star 200](/motos/star/star-200), [Star 150-X](/motos/star/150-x) y [Star Magic 125](/motos/star/magic-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Star Star 125, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Star Star 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Star Star 125:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Bujía y batería.',
            1 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            2 => 'Cables de embrague y de acelerador.',
            3 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            4 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            5 => 'Kit de arrastre (cadena, piñón y corona).',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Star Star 125 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Probá el arranque en frío y escuchá ruidos raros.',
            1 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            2 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            3 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            4 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star Star 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Alex S.A.) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star Star 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star Star 125 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/star-150' => array (
      'intro' => 
      array (
        0 => 'La Star Star 150 es una moto naked, es decir, de las que no llevan carenado completo de 150 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, freno delantero, freno trasero, tanque de combustible, peso y tipo de motor. El precio 0 km que figura abajo lo publicó Alex S.A., y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star 150-X](/motos/star/150-x), [Star FXZ 150](/motos/star/fxz-150) y [Star Genius 125](/motos/star/genius-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Star Star 150, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Star Star 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Star Star 150:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Kit de arrastre (cadena, piñón y corona).',
            1 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            2 => 'Filtro de aire y filtro de aceite.',
            3 => 'Bujía y batería.',
            4 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            5 => 'Cables de embrague y de acelerador.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Star Star 150 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            1 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            2 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            3 => 'Probá el arranque en frío y escuchá ruidos raros.',
            4 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            5 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star Star 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Alex S.A.) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star Star 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star Star 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/star-200' => array (
      'intro' => 
      array (
        0 => 'La Star Star 200 es una moto naked, es decir, de las que no llevan carenado completo de 200 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, transmisión, tipo de arranque, tanque de combustible y refrigeración. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star 150-X](/motos/star/150-x), [Star FXZ 150](/motos/star/fxz-150) y [Star A1 110](/motos/star/a1-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Star Star 200, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Star Star 200 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Star Star 200:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            3 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Star Star 200 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Probá el arranque en frío y escuchá ruidos raros.',
            1 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            2 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            3 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            4 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            5 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star Star 200 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, Alex S.A, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star Star 200?',
          'a' => 'Según la ficha técnica de esta página, tiene 200 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star Star 200 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/xrm-150' => array (
      'intro' => 
      array (
        0 => 'La Star XRM 150 es una moto de tipo cub de 150 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, transmisión, tipo de motor y refrigeración. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star Dax-A 110](/motos/star/dax-a-110), [Star Dax 110](/motos/star/dax-110) y [Star Star 200](/motos/star/star-200).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Star XRM 150 el mantenimiento es de rutina: nivel de aceite, filtro de aire, cadena, frenos y cubiertas. Cuanto más trabaja la moto (reparto, ida y vuelta al trabajo), más seguido hay que mirar la cadena, que se alarga con el uso.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Star XRM 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Star XRM 150, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            3 => 'Cables de embrague y de acelerador.',
            4 => 'Lámparas y luces de giro.',
            5 => 'Pedal de arranque o de cambios, si la moto los lleva.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Star XRM 150 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Probá que los cambios entren suaves y que el embrague no patine.',
            1 => 'Revisá frenos y cubiertas: una moto de trabajo suele tener muchos kilómetros.',
            2 => 'Fijate el estado del cuadro y del escape, sobre todo si estuvo mucho en la calle.',
            3 => 'Buscá pérdidas de aceite y golpes que indiquen caídas.',
            4 => 'Comprobá luces, luces de giro y bocina.',
            5 => 'Preguntá si se usó para reparto o carga, y cuántos dueños tuvo.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star XRM 150 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, Alex S.A, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star XRM 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 150 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star XRM 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'star/xvr-200' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Star XVR 200, esta página junta lo que se sabe: es una moto de tipo enduro o cross de 200 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, transmisión, tipo de arranque, tipo de motor y refrigeración. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Alex S.A. según la fuente citada en [la página de la marca](/motos/star).',
        3 => 'Si todavía estás comparando, mirá también [Star New Desert 150](/motos/star/new-desert-150), [Star SMX 150](/motos/star/smx-150) y [Star XRM 150](/motos/star/xrm-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Si la Star XVR 200 sale a caminos de tierra, el mantenimiento tiene que ser más estricto: filtro de aire limpio (el polvo entra por ahí), cadena lubricada, frenos sin barro, y aceite al día. La suspensión y las cubiertas también se revisan más seguido.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Star XVR 200 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Star XVR 200, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aceite y bujía.',
            1 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            2 => 'Palancas de freno y de embrague de repuesto.',
            3 => 'Retenes y aceite de la horquilla, según el manual.',
            4 => 'Protectores y manoplas.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Star XVR 200 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Mirá el filtro de aire: si está sucio o roto, el motor pudo haber tragado polvo.',
            1 => 'Probá que los frenos frenen parejo y que las cubiertas tengan taco.',
            2 => 'Revisá la cadena, el piñón y la corona.',
            3 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            4 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Star XVR 200 en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, Alex S.A, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Star XVR 200?',
          'a' => 'Según la ficha técnica de esta página, tiene 200 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Star en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Alex S.A. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Star XVR 200 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'suzuki/dr-650' => array (
      'intro' => 
      array (
        0 => 'La Suzuki DR 650 es una moto de tipo enduro o cross de 644 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tipo de arranque, tanque de combustible, peso y tipo de motor. El precio 0 km que figura abajo lo publicó Suzuki Motos Paraguay, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/suzuki).',
        3 => 'Si todavía estás comparando, mirá también [Suzuki V-Strom 1050](/motos/suzuki/v-strom-1050), [Suzuki V-Strom 250](/motos/suzuki/v-strom-250) y [Suzuki V-Strom 650](/motos/suzuki/v-strom-650).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo enduro o cross como la Suzuki DR 650 sufre más que una de calle: polvo en el filtro de aire, barro en la cadena y golpes en la suspensión. Después de salir a tierra o de una lluvia, lavala, secala y revisá cadena, filtro de aire y tornillos flojos.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Suzuki DR 650 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Suzuki DR 650:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Palancas de freno y de embrague de repuesto.',
            2 => 'Retenes y aceite de la horquilla, según el manual.',
            3 => 'Protectores y manoplas.',
            4 => 'Kit de arrastre (cadena, piñón y corona), de lo más exigido en tierra.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Suzuki DR 650 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá la cadena, el piñón y la corona.',
            1 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            2 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            3 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            4 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Suzuki DR 650 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Suzuki Motos Paraguay) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Suzuki DR 650?',
          'a' => 'Según la ficha técnica de esta página, tiene 644 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Suzuki en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Suzuki DR 650 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'suzuki/gixxer-150' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Suzuki Gixxer 150, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 155 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: transmisión, tipo de arranque, tanque de combustible, refrigeración y alimentación. El precio 0 km que figura abajo lo publicó Suzuki Motos Paraguay, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/suzuki).',
        3 => 'Si todavía estás comparando, mirá también [Suzuki Gixxer 250](/motos/suzuki/gixxer-250), [Suzuki DR 650](/motos/suzuki/dr-650) y [Suzuki V-Strom 1050](/motos/suzuki/v-strom-1050).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Suzuki Gixxer 150, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'La alimentación es por inyección electrónica: es poco lo que se hace en casa, pero conviene cargar combustible de buena calidad y llevarla a un taller que pueda leer el sistema si se enciende alguna luz de falla.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Suzuki Gixxer 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Suzuki Gixxer 150, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            1 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            2 => 'Kit de arrastre (cadena, piñón y corona).',
            3 => 'Pastillas o zapatas de freno.',
            4 => 'Filtro de aire y filtro de aceite.',
            5 => 'Bujía y batería.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Suzuki Gixxer 150 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            1 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            2 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            3 => 'Probá el arranque en frío y escuchá ruidos raros.',
            4 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            5 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Suzuki Gixxer 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Suzuki Motos Paraguay) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Suzuki Gixxer 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 155 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Suzuki en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Suzuki Gixxer 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'suzuki/gixxer-250' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Suzuki Gixxer 250, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 249 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: transmisión, tipo de arranque, tanque de combustible, refrigeración y alimentación. El precio 0 km que figura abajo lo publicó Suzuki Motos Paraguay, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/suzuki).',
        3 => 'Si todavía estás comparando, mirá también [Suzuki Gixxer 150](/motos/suzuki/gixxer-150), [Suzuki DR 650](/motos/suzuki/dr-650) y [Suzuki V-Strom 1050](/motos/suzuki/v-strom-1050).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Suzuki Gixxer 250, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'La ficha indica refrigeración por aceite, así que el aceite del motor cumple un doble trabajo: cambialo a tiempo y con el tipo que indica el manual.',
        2 => 'La alimentación es por inyección electrónica: es poco lo que se hace en casa, pero conviene cargar combustible de buena calidad y llevarla a un taller que pueda leer el sistema si se enciende alguna luz de falla.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Suzuki Gixxer 250 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Suzuki Gixxer 250, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            3 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Suzuki Gixxer 250 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            1 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            2 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            3 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            4 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Suzuki Gixxer 250 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Suzuki Motos Paraguay) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Suzuki Gixxer 250?',
          'a' => 'Según la ficha técnica de esta página, tiene 249 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Suzuki en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Suzuki Gixxer 250 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'suzuki/v-strom-1050' => array (
      'intro' => 
      array (
        0 => 'La Suzuki V-Strom 1050 es una moto de tipo touring de 1037 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: tipo de motor. El precio 0 km que figura abajo lo publicó Suzuki Motos Paraguay, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/suzuki).',
        3 => 'Si todavía estás comparando, mirá también [Suzuki V-Strom 250](/motos/suzuki/v-strom-250), [Suzuki V-Strom 650](/motos/suzuki/v-strom-650) y [Suzuki Gixxer 150](/motos/suzuki/gixxer-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo touring como la Suzuki V-Strom 1050 suele usarse para distancias largas, y eso pide revisar antes de cada viaje: aceite, cadena, frenos, cubiertas y luces. Los intervalos de service dependen de cada modelo y se toman siempre del manual del propietario.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Suzuki V-Strom 1050 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Suzuki V-Strom 1050, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujías y batería.',
            2 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            3 => 'Líquido de frenos y, si lleva, líquido refrigerante.',
            4 => 'Lámparas y fusibles.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Suzuki V-Strom 1050 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Si lleva frenos con ABS, hacé revisar el sistema en un taller de confianza.',
            1 => 'Pedí los papeles al día y la procedencia.',
            2 => 'Preguntá por accesorios agregados, y si están bien instalados.',
            3 => 'Pedí el historial de service: en una moto de viaje, los kilómetros y el cuidado importan mucho.',
            4 => 'Revisá la cadena, el piñón y la corona, y las cubiertas.',
            5 => 'Buscá pérdidas de aceite o de líquido refrigerante.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Suzuki V-Strom 1050 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Suzuki Motos Paraguay) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Suzuki V-Strom 1050?',
          'a' => 'Según la ficha técnica de esta página, tiene 1037 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Suzuki en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Suzuki V-Strom 1050 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'suzuki/v-strom-250' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Suzuki V-Strom 250, esta página junta lo que se sabe: es una moto de tipo touring de 249 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: tipo de arranque, tanque de combustible, peso y altura del asiento. El precio 0 km que figura abajo lo publicó Suzuki Motos Paraguay, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/suzuki).',
        3 => 'Si todavía estás comparando, mirá también [Suzuki V-Strom 650](/motos/suzuki/v-strom-650), [Suzuki V-Strom 800](/motos/suzuki/v-strom-800) y [Suzuki Gixxer 150](/motos/suzuki/gixxer-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Con la Suzuki V-Strom 250 conviene armar la costumbre de revisar antes de salir de viaje: nivel de aceite, tensión y lubricación de la cadena, estado de las cubiertas y de los frenos. En rutas con calor, sumá una mirada a las luces y a la batería.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Suzuki V-Strom 250 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Suzuki V-Strom 250, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Líquido de frenos y, si lleva, líquido refrigerante.',
            2 => 'Lámparas y fusibles.',
            3 => 'Protectores de manos y de motor, para caídas.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
            5 => 'Pastillas o zapatas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Suzuki V-Strom 250 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Pedí el historial de service: en una moto de viaje, los kilómetros y el cuidado importan mucho.',
            1 => 'Revisá la cadena, el piñón y la corona, y las cubiertas.',
            2 => 'Buscá pérdidas de aceite o de líquido refrigerante.',
            3 => 'Probá los frenos y la suspensión, y fijate que el equipo eléctrico y las luces funcionen.',
            4 => 'Comprobá que no tenga golpes ocultos en el cuadro y en el escape.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Suzuki V-Strom 250 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Suzuki Motos Paraguay) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Suzuki V-Strom 250?',
          'a' => 'Según la ficha técnica de esta página, tiene 249 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Suzuki en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Suzuki V-Strom 250 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'suzuki/v-strom-650' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Suzuki V-Strom 650, esta página te ahorra vueltas: se trata de una moto de tipo touring de 645 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: tanque de combustible y tipo de motor. El precio 0 km que figura abajo lo publicó Suzuki Motos Paraguay, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/suzuki).',
        3 => 'Si todavía estás comparando, mirá también [Suzuki V-Strom 800](/motos/suzuki/v-strom-800), [Suzuki V-Strom 1050](/motos/suzuki/v-strom-1050) y [Suzuki Gixxer 150](/motos/suzuki/gixxer-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo touring como la Suzuki V-Strom 650 suele usarse para distancias largas, y eso pide revisar antes de cada viaje: aceite, cadena, frenos, cubiertas y luces. Los intervalos de service dependen de cada modelo y se toman siempre del manual del propietario.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Suzuki V-Strom 650 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Suzuki V-Strom 650, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Líquido de frenos y, si lleva, líquido refrigerante.',
            1 => 'Lámparas y fusibles.',
            2 => 'Protectores de manos y de motor, para caídas.',
            3 => 'Kit de arrastre (cadena, piñón y corona).',
            4 => 'Pastillas o zapatas de freno.',
            5 => 'Filtro de aire y filtro de aceite.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Suzuki V-Strom 650 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Pedí los papeles al día y la procedencia.',
            1 => 'Preguntá por accesorios agregados, y si están bien instalados.',
            2 => 'Pedí el historial de service: en una moto de viaje, los kilómetros y el cuidado importan mucho.',
            3 => 'Revisá la cadena, el piñón y la corona, y las cubiertas.',
            4 => 'Buscá pérdidas de aceite o de líquido refrigerante.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Suzuki V-Strom 650 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Suzuki Motos Paraguay) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Suzuki V-Strom 650?',
          'a' => 'Según la ficha técnica de esta página, tiene 645 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Suzuki en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Suzuki V-Strom 650 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'suzuki/v-strom-800' => array (
      'intro' => 
      array (
        0 => 'La Suzuki V-Strom 800 es una moto de tipo touring de 776 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'De la ficha técnica sólo tenemos con fuente la cilindrada, así que no completamos el resto con suposiciones. El precio 0 km que figura abajo lo publicó Suzuki Motos Paraguay, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/suzuki).',
        3 => 'Si todavía estás comparando, mirá también [Suzuki V-Strom 1050](/motos/suzuki/v-strom-1050), [Suzuki V-Strom 250](/motos/suzuki/v-strom-250) y [Suzuki Gixxer 250](/motos/suzuki/gixxer-250).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo touring como la Suzuki V-Strom 800 suele usarse para distancias largas, y eso pide revisar antes de cada viaje: aceite, cadena, frenos, cubiertas y luces. Los intervalos de service dependen de cada modelo y se toman siempre del manual del propietario.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Suzuki V-Strom 800 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la Suzuki V-Strom 800, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Líquido de frenos y, si lleva, líquido refrigerante.',
            1 => 'Lámparas y fusibles.',
            2 => 'Protectores de manos y de motor, para caídas.',
            3 => 'Kit de arrastre (cadena, piñón y corona).',
            4 => 'Pastillas o zapatas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Suzuki V-Strom 800 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá la cadena, el piñón y la corona, y las cubiertas.',
            1 => 'Buscá pérdidas de aceite o de líquido refrigerante.',
            2 => 'Probá los frenos y la suspensión, y fijate que el equipo eléctrico y las luces funcionen.',
            3 => 'Comprobá que no tenga golpes ocultos en el cuadro y en el escape.',
            4 => 'Si lleva frenos con ABS, hacé revisar el sistema en un taller de confianza.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Suzuki V-Strom 800 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Suzuki Motos Paraguay) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Suzuki V-Strom 800?',
          'a' => 'Según la ficha técnica de esta página, tiene 776 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Suzuki en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Suzuki V-Strom 800 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'tvs/apache-rtr-160-2v' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la TVS Apache RTR 160 2V, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'De la ficha técnica todavía no tenemos datos con fuente, así que no los completamos con suposiciones. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/tvs).',
        3 => 'Si todavía estás comparando, mirá también [TVS HLX 150](/motos/tvs/hlx-150), [TVS HLX 150 F](/motos/tvs/hlx-150-f) y [TVS Neo NX 110](/motos/tvs/neo-nx-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la TVS Apache RTR 160 2V, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de TVS Apache RTR 160 2V (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la TVS Apache RTR 160 2V, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            3 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la TVS Apache RTR 160 2V usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            1 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            2 => 'Probá el arranque en frío y escuchá ruidos raros.',
            3 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            4 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            5 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la TVS Apache RTR 160 2V en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la TVS Apache RTR 160 2V?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye TVS en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la TVS Apache RTR 160 2V usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'tvs/hlx-150' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la TVS HLX 150, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'De la ficha técnica todavía no tenemos datos con fuente, así que no los completamos con suposiciones. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/tvs).',
        3 => 'Si todavía estás comparando, mirá también [TVS Raider 125](/motos/tvs/raider-125), [TVS Ronin 225](/motos/tvs/ronin-225) y [TVS Neo NX 110](/motos/tvs/neo-nx-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la TVS HLX 150, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de TVS HLX 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la TVS HLX 150, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cables de embrague y de acelerador.',
            1 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            2 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            3 => 'Kit de arrastre (cadena, piñón y corona).',
            4 => 'Pastillas o zapatas de freno.',
            5 => 'Filtro de aire y filtro de aceite.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la TVS HLX 150 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            1 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            2 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            3 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            4 => 'Probá el arranque en frío y escuchá ruidos raros.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la TVS HLX 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la TVS HLX 150?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye TVS en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la TVS HLX 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'tvs/hlx-150-f' => array (
      'intro' => 
      array (
        0 => 'La TVS HLX 150 F es una moto naked, es decir, de las que no llevan carenado completo de 148 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: transmisión. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/tvs).',
        3 => 'Si todavía estás comparando, mirá también [TVS Raider 125](/motos/tvs/raider-125), [TVS Ronin 225](/motos/tvs/ronin-225) y [TVS Neo NX 110](/motos/tvs/neo-nx-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la TVS HLX 150 F, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de TVS HLX 150 F (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la TVS HLX 150 F:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            3 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
            5 => 'Pastillas o zapatas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la TVS HLX 150 F usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            1 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            2 => 'Probá el arranque en frío y escuchá ruidos raros.',
            3 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            4 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            5 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la TVS HLX 150 F en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la TVS HLX 150 F?',
          'a' => 'Según la ficha técnica de esta página, tiene 148 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye TVS en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la TVS HLX 150 F usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'tvs/neo-nx-110' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la TVS Neo NX 110, esta página junta lo que se sabe: es una moto de tipo cub de 110 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia y torque. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/tvs).',
        3 => 'Si todavía estás comparando, mirá también [TVS Stryker 125](/motos/tvs/stryker-125), [TVS Apache RTR 160 2V](/motos/tvs/apache-rtr-160-2v) y [TVS HLX 150](/motos/tvs/hlx-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Las motos tipo cub, como la TVS Neo NX 110, se destacan por tener una mecánica simple, y eso se traduce en un mantenimiento sencillo: aceite a tiempo, filtro de aire limpio, bujía, cadena tensada y lubricada, y frenos al día. Si la usás para trabajar todos los días, no te saltees el service.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de TVS Neo NX 110 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la TVS Neo NX 110, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Lámparas y luces de giro.',
            1 => 'Pedal de arranque o de cambios, si la moto los lleva.',
            2 => 'Kit de arrastre (cadena, piñón y corona).',
            3 => 'Pastillas o zapatas de freno.',
            4 => 'Filtro de aire y filtro de aceite.',
            5 => 'Bujía y batería.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la TVS Neo NX 110 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Buscá pérdidas de aceite y golpes que indiquen caídas.',
            1 => 'Comprobá luces, luces de giro y bocina.',
            2 => 'Preguntá si se usó para reparto o carga, y cuántos dueños tuvo.',
            3 => 'Mirá la cadena y el piñón: son lo primero que se gasta en una moto de trabajo.',
            4 => 'Pedí que la arranquen en frío y escuchá ruidos del motor.',
            5 => 'Probá que los cambios entren suaves y que el embrague no patine.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la TVS Neo NX 110 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la TVS Neo NX 110?',
          'a' => 'Según la ficha técnica de esta página, tiene 110 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye TVS en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la TVS Neo NX 110 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'tvs/raider-125' => array (
      'intro' => 
      array (
        0 => 'La TVS Raider 125 es una moto naked, es decir, de las que no llevan carenado completo de 125 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, freno delantero, freno trasero, tanque de combustible y refrigeración. El precio 0 km que figura abajo lo publicó Tupi y Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/tvs).',
        3 => 'Si todavía estás comparando, mirá también [TVS Stryker 125](/motos/tvs/stryker-125), [TVS Apache RTR 160 2V](/motos/tvs/apache-rtr-160-2v) y [TVS Neo NX 110](/motos/tvs/neo-nx-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la TVS Raider 125, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de TVS Raider 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la TVS Raider 125:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            1 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            2 => 'Kit de arrastre (cadena, piñón y corona).',
            3 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            4 => 'Filtro de aire y filtro de aceite.',
            5 => 'Bujía y batería.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la TVS Raider 125 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            1 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            2 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            3 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            4 => 'Probá el arranque en frío y escuchá ruidos raros.',
            5 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la TVS Raider 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Tupi y Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la TVS Raider 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 125 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye TVS en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la TVS Raider 125 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'tvs/ronin-225' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la TVS Ronin 225, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 225 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, freno delantero, freno trasero, refrigeración y neumático delantero. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/tvs).',
        3 => 'Si todavía estás comparando, mirá también [TVS Apache RTR 160 2V](/motos/tvs/apache-rtr-160-2v), [TVS HLX 150](/motos/tvs/hlx-150) y [TVS Neo NX 110](/motos/tvs/neo-nx-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la TVS Ronin 225, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'La ficha indica refrigeración por aceite, así que el aceite del motor cumple un doble trabajo: cambialo a tiempo y con el tipo que indica el manual.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de TVS Ronin 225 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Para la TVS Ronin 225, esta es la lista corta de repuestos comunes:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que figura en la ficha técnica.',
            3 => 'Cables de embrague y de acelerador.',
            4 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            5 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la TVS Ronin 225 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            1 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            2 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            3 => 'Probá el arranque en frío y escuchá ruidos raros.',
            4 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            5 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la TVS Ronin 225 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la TVS Ronin 225?',
          'a' => 'Según la ficha técnica de esta página, tiene 225 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye TVS en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la TVS Ronin 225 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'tvs/stryker-125' => array (
      'intro' => 
      array (
        0 => 'La TVS Stryker 125 es una moto naked, es decir, de las que no llevan carenado completo que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos: freno delantero y freno trasero. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/tvs).',
        3 => 'Si todavía estás comparando, mirá también [TVS HLX 150](/motos/tvs/hlx-150), [TVS HLX 150 F](/motos/tvs/hlx-150-f) y [TVS Neo NX 110](/motos/tvs/neo-nx-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la TVS Stryker 125, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Al menos uno de los frenos es a tambor según la ficha: se revisan las zapatas y el ajuste del juego de la palanca o del pedal.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de TVS Stryker 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la TVS Stryker 125, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Kit de arrastre (cadena, piñón y corona).',
            1 => 'Zapatas o pastillas de freno, según el freno que lleve cada rueda.',
            2 => 'Filtro de aire y filtro de aceite.',
            3 => 'Bujía y batería.',
            4 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            5 => 'Cables de embrague y de acelerador.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la TVS Stryker 125 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Probá el arranque en frío y escuchá ruidos raros.',
            1 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            2 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            3 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            4 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            5 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la TVS Stryker 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la TVS Stryker 125?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye TVS en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la TVS Stryker 125 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/crypton' => array (
      'intro' => 
      array (
        0 => 'La Yamaha Crypton es una moto de tipo cub de 110 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: transmisión, tipo de motor, refrigeración, alimentación y neumático delantero. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha MT-03](/motos/yamaha/mt-03), [Yamaha MT-07](/motos/yamaha/mt-07) y [Yamaha MT-09](/motos/yamaha/mt-09).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En la Yamaha Crypton el mantenimiento es de rutina: nivel de aceite, filtro de aire, cadena, frenos y cubiertas. Cuanto más trabaja la moto (reparto, ida y vuelta al trabajo), más seguido hay que mirar la cadena, que se alarga con el uso.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Yamaha Crypton (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Yamaha Crypton:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cables de embrague y de acelerador.',
            1 => 'Lámparas y luces de giro.',
            2 => 'Pedal de arranque o de cambios, si la moto los lleva.',
            3 => 'Kit de arrastre (cadena, piñón y corona).',
            4 => 'Pastillas o zapatas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Yamaha Crypton usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá luces, luces de giro y bocina.',
            1 => 'Preguntá si se usó para reparto o carga, y cuántos dueños tuvo.',
            2 => 'Mirá la cadena y el piñón: son lo primero que se gasta en una moto de trabajo.',
            3 => 'Pedí que la arranquen en frío y escuchá ruidos del motor.',
            4 => 'Probá que los cambios entren suaves y que el embrague no patine.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha Crypton en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Yamaha Crypton?',
          'a' => 'Según la ficha técnica de esta página, tiene 110 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha Crypton usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/mt-03' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Yamaha MT-03, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo de 321 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, transmisión, tipo de arranque, tanque de combustible y tipo de motor. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha YC-Z 110](/motos/yamaha/yc-z-110), [Yamaha MT-07](/motos/yamaha/mt-07) y [Yamaha Ténéré 700](/motos/yamaha/tenere-700).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Yamaha MT-03, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Según la ficha, el motor es de refrigeración líquida: además del aceite, hay que controlar el nivel y el estado del líquido refrigerante y mirar que el radiador esté limpio.',
        2 => 'La alimentación es por inyección electrónica: es poco lo que se hace en casa, pero conviene cargar combustible de buena calidad y llevarla a un taller que pueda leer el sistema si se enciende alguna luz de falla.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Yamaha MT-03 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Yamaha MT-03, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            1 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            2 => 'Kit de arrastre (cadena, piñón y corona).',
            3 => 'Pastillas o zapatas de freno.',
            4 => 'Filtro de aire y filtro de aceite.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Yamaha MT-03 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            1 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            2 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            3 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            4 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            5 => 'Probá el arranque en frío y escuchá ruidos raros.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha MT-03 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Yamaha MT-03?',
          'a' => 'Según la ficha técnica de esta página, tiene 321 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha MT-03 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/mt-07' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Yamaha MT-07, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 689 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, transmisión, tipo de arranque y alimentación. El precio 0 km que figura abajo lo publicó Chacomer y Yamaha Paraguay, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha MT-09](/motos/yamaha/mt-09), [Yamaha YBR125E](/motos/yamaha/ybr-125e) y [Yamaha XTZ 250](/motos/yamaha/xtz-250).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Yamaha MT-07, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'La alimentación es por inyección electrónica: es poco lo que se hace en casa, pero conviene cargar combustible de buena calidad y llevarla a un taller que pueda leer el sistema si se enciende alguna luz de falla.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Yamaha MT-07 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Yamaha MT-07, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            3 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
            5 => 'Pastillas o zapatas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Yamaha MT-07 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            1 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            2 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            3 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            4 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            5 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha MT-07 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer y Yamaha Paraguay) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Yamaha MT-07?',
          'a' => 'Según la ficha técnica de esta página, tiene 689 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha MT-07 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/mt-09' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Yamaha MT-09, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 847 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, transmisión, tipo de arranque y alimentación. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha MT-07](/motos/yamaha/mt-07), [Yamaha YBR125E](/motos/yamaha/ybr-125e) y [Yamaha XTZ 125](/motos/yamaha/xtz-125).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Yamaha MT-09, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'La alimentación es por inyección electrónica: es poco lo que se hace en casa, pero conviene cargar combustible de buena calidad y llevarla a un taller que pueda leer el sistema si se enciende alguna luz de falla.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Yamaha MT-09 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Yamaha MT-09:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire y filtro de aceite.',
            1 => 'Bujía y batería.',
            2 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            3 => 'Cables de embrague y de acelerador.',
            4 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Yamaha MT-09 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            1 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            2 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            3 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            4 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            5 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha MT-09 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Yamaha MT-09?',
          'a' => 'Según la ficha técnica de esta página, tiene 847 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha MT-09 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/tenere-700' => array (
      'intro' => 
      array (
        0 => 'La Yamaha Ténéré 700 es una moto de tipo touring que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'De la ficha técnica todavía no tenemos datos con fuente, así que no los completamos con suposiciones. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha YBR125E](/motos/yamaha/ybr-125e), [Yamaha YBR 125Z](/motos/yamaha/ybr-125z) y [Yamaha YC-Z 110](/motos/yamaha/yc-z-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo touring como la Yamaha Ténéré 700 suele usarse para distancias largas, y eso pide revisar antes de cada viaje: aceite, cadena, frenos, cubiertas y luces. Los intervalos de service dependen de cada modelo y se toman siempre del manual del propietario.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Yamaha Ténéré 700 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Yamaha Ténéré 700, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Protectores de manos y de motor, para caídas.',
            1 => 'Kit de arrastre (cadena, piñón y corona).',
            2 => 'Pastillas o zapatas de freno.',
            3 => 'Filtro de aire y filtro de aceite.',
            4 => 'Bujías y batería.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Yamaha Ténéré 700 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Comprobá que no tenga golpes ocultos en el cuadro y en el escape.',
            1 => 'Si lleva frenos con ABS, hacé revisar el sistema en un taller de confianza.',
            2 => 'Pedí los papeles al día y la procedencia.',
            3 => 'Preguntá por accesorios agregados, y si están bien instalados.',
            4 => 'Pedí el historial de service: en una moto de viaje, los kilómetros y el cuidado importan mucho.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha Ténéré 700 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la Yamaha Ténéré 700?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha Ténéré 700 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/xtz-125' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Yamaha XTZ 125, esta página te ahorra vueltas: se trata de una moto de tipo enduro o cross de 123 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: transmisión, tanque de combustible, peso, tipo de motor y refrigeración. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha XTZ 150](/motos/yamaha/xtz-150), [Yamaha XTZ 250](/motos/yamaha/xtz-250) y [Yamaha YC-Z 110](/motos/yamaha/yc-z-110).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Si la Yamaha XTZ 125 sale a caminos de tierra, el mantenimiento tiene que ser más estricto: filtro de aire limpio (el polvo entra por ahí), cadena lubricada, frenos sin barro, y aceite al día. La suspensión y las cubiertas también se revisan más seguido.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        3 => 
        array (
          'verify' => 'Intervalos de service de Yamaha XTZ 125 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Yamaha XTZ 125, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Filtro de aire, que se cambia con más frecuencia si salís a caminos de tierra.',
            1 => 'Filtro de aceite y bujía.',
            2 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            3 => 'Palancas de freno y de embrague de repuesto.',
            4 => 'Retenes y aceite de la horquilla, según el manual.',
            5 => 'Protectores y manoplas.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Yamaha XTZ 125 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            1 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            2 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
            3 => 'Buscá torceduras en el manubrio, el cuadro y las llantas, señales de caídas fuertes.',
            4 => 'Mirá el filtro de aire: si está sucio o roto, el motor pudo haber tragado polvo.',
            5 => 'Probá que los frenos frenen parejo y que las cubiertas tengan taco.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha XTZ 125 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Yamaha XTZ 125?',
          'a' => 'Según la ficha técnica de esta página, tiene 123 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha XTZ 125 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/xtz-150' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Yamaha XTZ 150, esta página te ahorra vueltas: se trata de una moto de tipo enduro o cross de 149 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, tanque de combustible, peso, refrigeración y alimentación. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha XTZ 250](/motos/yamaha/xtz-250), [Yamaha XTZ 125](/motos/yamaha/xtz-125) y [Yamaha MT-09](/motos/yamaha/mt-09).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Una moto de tipo enduro o cross como la Yamaha XTZ 150 sufre más que una de calle: polvo en el filtro de aire, barro en la cadena y golpes en la suspensión. Después de salir a tierra o de una lluvia, lavala, secala y revisá cadena, filtro de aire y tornillos flojos.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'La alimentación es por inyección electrónica: es poco lo que se hace en casa, pero conviene cargar combustible de buena calidad y llevarla a un taller que pueda leer el sistema si se enciende alguna luz de falla.',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Yamaha XTZ 150 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Si vas a usar a diario la Yamaha XTZ 150, tené en cuenta estos repuestos de desgaste:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Retenes y aceite de la horquilla, según el manual.',
            1 => 'Protectores y manoplas.',
            2 => 'Kit de arrastre (cadena, piñón y corona), de lo más exigido en tierra.',
            3 => 'Pastillas o zapatas de freno.',
            4 => 'Filtro de aire, que se cambia con más frecuencia si salís a caminos de tierra.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Yamaha XTZ 150 usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Probá que los frenos frenen parejo y que las cubiertas tengan taco.',
            1 => 'Revisá la cadena, el piñón y la corona.',
            2 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            3 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            4 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            5 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha XTZ 150 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Yamaha XTZ 150?',
          'a' => 'Según la ficha técnica de esta página, tiene 149 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha XTZ 150 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/xtz-250' => array (
      'intro' => 
      array (
        0 => 'La Yamaha XTZ 250 es una moto de tipo enduro o cross que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'De la ficha técnica todavía no tenemos datos con fuente, así que no los completamos con suposiciones. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha XTZ 150](/motos/yamaha/xtz-150), [Yamaha XTZ 125](/motos/yamaha/xtz-125) y [Yamaha Ténéré 700](/motos/yamaha/tenere-700).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Si la Yamaha XTZ 250 sale a caminos de tierra, el mantenimiento tiene que ser más estricto: filtro de aire limpio (el polvo entra por ahí), cadena lubricada, frenos sin barro, y aceite al día. La suspensión y las cubiertas también se revisan más seguido.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Yamaha XTZ 250 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Yamaha XTZ 250:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Retenes y aceite de la horquilla, según el manual.',
            1 => 'Protectores y manoplas.',
            2 => 'Kit de arrastre (cadena, piñón y corona), de lo más exigido en tierra.',
            3 => 'Pastillas o zapatas de freno.',
            4 => 'Filtro de aire, que se cambia con más frecuencia si salís a caminos de tierra.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Yamaha XTZ 250 usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Probá que los frenos frenen parejo y que las cubiertas tengan taco.',
            1 => 'Revisá la cadena, el piñón y la corona.',
            2 => 'Escuchá el motor en frío y en caliente, y fijate si humea o pierde aceite.',
            3 => 'Pedí los papeles al día y compará los números de chasis y de motor.',
            4 => 'Preguntá si se usó en competencia o en trabajo de campo.',
            5 => 'Revisá la suspensión y las botellas de la horquilla: pérdidas de aceite son frecuentes en motos que salieron a tierra.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha XTZ 250 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Dónde veo la ficha técnica de la Yamaha XTZ 250?',
          'a' => 'En la tabla de ficha técnica de esta página, con la fuente y la fecha de consulta de cada dato. Los datos que no tienen fuente no se muestran.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha XTZ 250 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/ybr-125e' => array (
      'intro' => 
      array (
        0 => 'La Yamaha YBR125E es una moto naked, es decir, de las que no llevan carenado completo de 124 cc que figura en nuestro catálogo de motos que se consiguen en Paraguay. Acá reunimos su ficha técnica con la fuente de cada dato, el precio cuando una fuente real lo publicó y lo que conviene saber antes de preguntar por ella.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, torque, transmisión y tanque de combustible. Todavía no hay un precio vigente publicado por una fuente, y no lo calculamos por nuestra cuenta.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha MT-09](/motos/yamaha/mt-09), [Yamaha YBR 125Z](/motos/yamaha/ybr-125z) y [Yamaha XTZ 250](/motos/yamaha/xtz-250).',
      ),
      'mantenimiento' => 
      array (
        0 => 'En una moto de calle como la Yamaha YBR125E, el service se reduce a lo básico: aceite del motor a tiempo, filtro de aire limpio, bujía en buen estado, cadena tensada y lubricada, frenos y cubiertas revisados. Con el polvo y la lluvia de acá, la cadena es lo que más cuidado pide.',
        1 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        2 => 
        array (
          'verify' => 'Intervalos de service de Yamaha YBR125E (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Yamaha YBR125E:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Bujía y batería.',
            1 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            2 => 'Cables de embrague y de acelerador.',
            3 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            4 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Si encontrás la Yamaha YBR125E usada, desconfiá del precio demasiado bueno y revisá con calma antes de mover plata. Una lista corta para empezar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Probá el arranque en frío y escuchá ruidos raros.',
            1 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            2 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            3 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            4 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            5 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha YBR125E en Paraguay?',
          'a' => 'Todavía no hay un precio vigente publicado por una fuente real, y no lo estimamos nosotros. Escribinos por WhatsApp o consultá con el distribuidor, Chacomer S.A.E, para saber el precio actual.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Yamaha YBR125E?',
          'a' => 'Según la ficha técnica de esta página, tiene 124 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha YBR125E usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/ybr-125z' => array (
      'intro' => 
      array (
        0 => 'Si buscás datos de la Yamaha YBR 125Z, esta página te ahorra vueltas: se trata de una moto naked, es decir, de las que no llevan carenado completo de 123 cc. Abajo tenés el precio publicado (si hay uno vigente), la ficha técnica, consejos de mantenimiento y una lista de qué revisar si la encontrás usada.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tipo de arranque, freno delantero, freno trasero y tanque de combustible. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha MT-09](/motos/yamaha/mt-09), [Yamaha YBR125E](/motos/yamaha/ybr-125e) y [Yamaha Ténéré 700](/motos/yamaha/tenere-700).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Yamaha YBR 125Z, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'Con freno a disco, según la ficha, el control es sobre el espesor de las pastillas y el nivel y la limpieza del líquido de frenos (ver [las pastillas de freno](/guias/pastillas-de-freno-moto)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Yamaha YBR 125Z (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Yamaha YBR 125Z:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cables de embrague y de acelerador.',
            1 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            2 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            3 => 'Kit de arrastre (cadena, piñón y corona).',
            4 => 'Pastillas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Antes de comprar la Yamaha YBR 125Z usada, no te apures: revisá, preguntá y compará con lo que publica el comercio oficial. Algunos puntos para mirar:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            1 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
            2 => 'Buscá pérdidas de aceite en el motor y en las botellas de la horquilla.',
            3 => 'Probá el arranque en frío y escuchá ruidos raros.',
            4 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha YBR 125Z en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Yamaha YBR 125Z?',
          'a' => 'Según la ficha técnica de esta página, tiene 123 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha YBR 125Z usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
        ),
      ),
      'updated' => '2026-10-01',
    ),
    'yamaha/yc-z-110' => array (
      'intro' => 
      array (
        0 => 'Si estás mirando la Yamaha YC-Z 110, esta página junta lo que se sabe: es una moto naked, es decir, de las que no llevan carenado completo de 110 cc, tiene ficha técnica con fuente y, cuando existe, el precio publicado por un comercio paraguayo. Todo lo demás es orientación práctica para comprar y mantener.',
        1 => 'Con fuente tenemos estos datos, además de la cilindrada: potencia, transmisión, tanque de combustible, refrigeración y alimentación. El precio 0 km que figura abajo lo publicó Chacomer, y se muestra con la fecha de consulta. Es un precio publicado, no una oferta nuestra, y puede haber cambiado: confirmalo con el comercio.',
        2 => 'No vendemos motos ni las probamos: si querés consultar disponibilidad, colores o formas de pago, escribinos por WhatsApp con el botón de la página y el mensaje ya sale con el nombre del modelo. En Paraguay la marca la distribuye Chacomer S.A.E. según la fuente citada en [la página de la marca](/motos/yamaha).',
        3 => 'Si todavía estás comparando, mirá también [Yamaha YBR 125Z](/motos/yamaha/ybr-125z), [Yamaha MT-03](/motos/yamaha/mt-03) y [Yamaha XTZ 150](/motos/yamaha/xtz-150).',
      ),
      'mantenimiento' => 
      array (
        0 => 'Para una moto naked como la Yamaha YC-Z 110, lo que más se nota es la rutina corta: mirar el nivel de aceite seguido, limpiar y lubricar la cadena después de lluvia o tierra, y no dejar que el filtro de aire se tape. Es mantenimiento que muchos hacen en casa y otros dejan en el taller de confianza.',
        1 => 'Según la ficha, el motor se refrigera por aire: sin radiador ni líquido, pero con una exigencia mayor en el calor y en el tránsito lento, así que mirá el nivel de aceite más seguido en el verano.',
        2 => 'La alimentación es por carburador: si la moto pasa mucho tiempo parada o carga nafta de mala calidad, puede ensuciarse, y conviene que alguien de confianza lo limpie y lo regule (ver [síntomas de un carburador sucio](/guias/carburador-sucio-sintomas)).',
        3 => 'Los intervalos exactos (cada cuántos kilómetros va el aceite, el filtro o la bujía) los fija el manual del propietario de la moto, y todavía no tenemos ese manual citado, así que no los inventamos. Mientras tanto, mirá [qué incluye un service](/guias/service-de-moto-que-incluye), [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto) y [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
        4 => 
        array (
          'verify' => 'Intervalos de service de Yamaha YC-Z 110 (aceite, filtros, bujía, transmisión): tomar del manual del propietario o de la ficha del distribuidor oficial.',
        ),
      ),
      'repuestos' => 
      array (
        0 => 'Los repuestos que se gastan primero son siempre los mismos, y conviene saber cuáles antes de que fallen en la Yamaha YC-Z 110:',
        1 => 
        array (
          'list' => 
          array (
            0 => 'Cubiertas, en la medida que indique el manual del modelo o el comercio.',
            1 => 'Cables de embrague y de acelerador.',
            2 => 'Lámparas y luces de giro, que se rompen con facilidad si la moto se cae.',
            3 => 'Espejos y palancas, que son lo primero que se golpea en una caída.',
            4 => 'Kit de arrastre (cadena, piñón y corona).',
            5 => 'Pastillas o zapatas de freno.',
          ),
        ),
        2 => 'Pedí el repuesto con el nombre completo del modelo y el año, y fijate si es original o alternativo. La disponibilidad por zona y el precio los confirma el comercio o el taller, no nosotros: no publicamos precios de repuestos sin fuente.',
      ),
      'revisarUsada' => 
      array (
        0 => 'Con la Yamaha YC-Z 110 usada, estos puntos te evitan sorpresas:',
        1 => 
        array (
          'ol' => 
          array (
            0 => 'Revisá que los frenos frenen parejo y que las cubiertas no estén cuarteadas.',
            1 => 'Fijate en las palancas, el manubrio y los espejos: un golpe de caída suele dejar marcas.',
            2 => 'Comprobá que las luces, las luces de giro y la bocina funcionen.',
            3 => 'Mirá el tanque por dentro, si podés: óxido o suciedad hablan del cuidado que tuvo.',
            4 => 'Fijate que la moto no se tuerza al soltar el manubrio en marcha lenta.',
            5 => 'Mirá la cadena y el piñón: juego excesivo o dientes afilados indican poco cuidado.',
          ),
        ),
        2 => 'Hay más puntos en la guía de [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada). Para no caer en estafas, leé también [cómo comprar una usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen), y tené a mano [los papeles de una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto](/guias/como-transferir-una-moto-en-paraguay). Si podés, llevá a un mecánico de confianza.',
      ),
      'faq' => 
      array (
        0 => 
        array (
          'q' => '¿Cuánto sale la Yamaha YC-Z 110 en Paraguay?',
          'a' => 'El precio que publicó una fuente real figura en la sección de precio de esta página, con quién lo publicó (Chacomer) y la fecha de consulta. Es un precio publicado, no una oferta nuestra: confirmalo con el comercio antes de decidir.',
        ),
        1 => 
        array (
          'q' => '¿Qué cilindrada tiene la Yamaha YC-Z 110?',
          'a' => 'Según la ficha técnica de esta página, tiene 110 cc. En la tabla de arriba figura cada dato con su fuente y la fecha de consulta.',
        ),
        2 => 
        array (
          'q' => '¿Quién distribuye Yamaha en Paraguay?',
          'a' => 'Según la fuente que citamos en la página de la marca, el distribuidor es Chacomer S.A.E. (la red de venta puede cambiar: confirmalo con el comercio).',
        ),
        3 => 
        array (
          'q' => '¿Qué tengo que revisar si compro la Yamaha YC-Z 110 usada?',
          'a' => 'Los papeles al día, el estado de la transmisión, los frenos, las cubiertas y si hay pérdidas de aceite o golpes de caída. Tenés la lista completa en la sección de arriba y en la guía sobre qué revisar antes de comprar una moto usada.',
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
