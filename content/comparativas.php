<?php
/**
 * Comparisons, /guias/{a}-vs-{b} (phase B6). Same segment, sourced specs on
 * BOTH models, explicit criterion, no invented "winner" (PLAN D5, D7).
 *
 * Key: "{modelo-a}-vs-{modelo-b}" — the two model slugs (not the brands).
 *
 *   a, b         string   "marca/modelo" keys in content/catalogo.php
 *   title        ?string  <title> override; default "{A} vs {B}: ficha y precio"
 *   description  ?string  120–160 chars, unique
 *   criterio     blocks   how they are compared (for whom, what matters)
 *   rows         string[] spec keys shown side by side, taken from catalogo.php;
 *                          a row renders only when BOTH models have that spec
 *                          with a source
 *   body         blocks   the comparison itself
 *   faq          array
 *   published    string   YYYY-MM-DD
 *   updated      string   YYYY-MM-DD
 *
 * Gate: >= 500 words AND >= 5 rows sourced on both models.
 */

declare(strict_types=1);
/* Generated from content/catalogo.php (specs as of 2026-10-01); regenerate when the catalogue changes. */
return array (
  'forza-150-vs-gl-150-pro' => 
  array (
    'a' => 'kenton/forza-150',
    'b' => 'kenton/gl-150-pro',
    'description' => 'Kenton Forza 150 vs Kenton GL 150 Pro: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton Forza 150 y a la Kenton GL 150 Pro con los datos de ficha que publican Kenton y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (12 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'arranque',
      5 => 'alimentacion',
      6 => 'freno_del',
      7 => 'freno_tras',
      8 => 'neumatico_del',
      9 => 'neumatico_tras',
      10 => 'tanque',
      11 => 'peso',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (150 cc), alimentación (carburador), freno delantero (tambor), freno trasero (tambor) y neumático trasero (3,00×18). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si priorizás una moto más liviana:** según la ficha, la Kenton GL 150 Pro es la más liviana (100 kg contra 104 KG). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          1 => '**Si hacés muchos kilómetros entre cargas:** la Kenton GL 150 Pro publica el tanque más grande (13 litros contra 11 Litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          2 => '**Potencia:** la Kenton Forza 150 la publica como "8.5 kW / 8000 RPM" y la Kenton GL 150 Pro como "12 HP". Vienen en unidades o condiciones distintas, por eso no las ordenamos: pedí al distribuidor la cifra en la misma unidad antes de comparar.',
          3 => '**Arranque:** la Kenton Forza 150 declara eléctrico y Pedal y la Kenton GL 150 Pro eléctrico/Pedal. Si usás la moto todos los días, un arranque eléctrico evita depender del pedal.',
          4 => '**Transmisión:** la Kenton Forza 150 la publica como 5 velocidades y la Kenton GL 150 Pro como manual.',
          5 => '**Neumático delantero:** la Kenton Forza 150 monta 2.75×18 y la Kenton GL 150 Pro 2.75-17. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton Forza 150: "Motor OHV 150cc con distribución a varilla, 4 tiempos, mono cilíndrico, Refrigerado por aire". La Kenton GL 150 Pro: "Motor OHV 150cc con distribución a varilla, 4 tiempos, monocilíndrico, refrigerado por aire". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton Forza 150](/motos/kenton/forza-150), [Kenton GL 150 Pro](/motos/kenton/gl-150-pro)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton Forza 150 o la Kenton GL 150 Pro?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, transmisión, arranque y neumático delantero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'classic-125-vs-ybr-125z' => 
  array (
    'a' => 'kenton/classic-125',
    'b' => 'yamaha/ybr-125z',
    'description' => 'Kenton Classic 125 vs Yamaha YBR 125Z: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton Classic 125 y a la Yamaha YBR 125Z con los datos de ficha que publican Kenton y Chacomer y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (8 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'arranque',
      5 => 'freno_del',
      6 => 'freno_tras',
      7 => 'tanque',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en arranque (eléctrico). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si te importa la cilindrada declarada:** la Kenton Classic 125 figura con 125 cc y la Yamaha YBR 125Z con 123 cc; la Kenton Classic 125 tiene el motor más grande, que no es lo mismo que decir que rinde más.',
          1 => '**Si hacés muchos kilómetros entre cargas:** la Yamaha YBR 125Z publica el tanque más grande (14 L contra 9 LITROS). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          2 => '**Potencia:** la Kenton Classic 125 la publica como "10 HP" y la Yamaha YBR 125Z como "10.7 bHP". Vienen en unidades o condiciones distintas, por eso no las ordenamos: pedí al distribuidor la cifra en la misma unidad antes de comparar.',
          3 => '**Si el freno delantero es tu criterio:** la Kenton Classic 125 declara tambor y la Yamaha YBR 125Z disco 130 mm. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          4 => '**Si el freno trasero es tu criterio:** la Kenton Classic 125 declara tambor y la Yamaha YBR 125Z disco 130 mm. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          5 => '**Transmisión:** la Kenton Classic 125 la publica como manual y la Yamaha YBR 125Z como mecanica.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton Classic 125: "Motor OHV 125cc con distribución a varilla". La Yamaha YBR 125Z: "Monocilindrico, 4 tiempos, 2 valvulas, SOHC". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton Classic 125](/motos/kenton/classic-125), [Yamaha YBR 125Z](/motos/yamaha/ybr-125z)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton Classic 125 o la Yamaha YBR 125Z?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en cilindrada, potencia, transmisión y freno delantero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton y Chacomer; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'cb1-125-vs-classic-125' => 
  array (
    'a' => 'honda/cb1-125',
    'b' => 'kenton/classic-125',
    'description' => 'Honda CB1 125 vs Kenton Classic 125: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Honda CB1 125 y a la Kenton Classic 125 con los datos de ficha que publican Honda Motos Paraguay y Kenton y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (7 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'potencia',
      2 => 'transmision',
      3 => 'neumatico_del',
      4 => 'neumatico_tras',
      5 => 'tanque',
      6 => 'peso',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (125 cc). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si priorizás una moto más liviana:** según la ficha, la Kenton Classic 125 es la más liviana (97 KG contra 128 kg). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          1 => '**Si hacés muchos kilómetros entre cargas:** la Honda CB1 125 publica el tanque más grande (10 L contra 9 LITROS). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          2 => '**Si mirás la potencia declarada:** la Honda CB1 125 publica la cifra más alta (10.1 hp @ 8,500 rpm contra 10 HP). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
          3 => '**Transmisión:** la Honda CB1 125 la publica como 4 velocidades y la Kenton Classic 125 como manual.',
          4 => '**Neumático delantero:** la Honda CB1 125 monta 80/100-18 y la Kenton Classic 125 2.75-18. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
          5 => '**Neumático trasero:** la Honda CB1 125 monta 90/90-18 y la Kenton Classic 125 3.00-18. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
        ),
      ),
      3 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      4 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Honda CB1 125](/motos/honda/cb1-125), [Kenton Classic 125](/motos/kenton/classic-125)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      5 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Honda CB1 125 o la Kenton Classic 125?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, transmisión, neumático delantero y neumático trasero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Honda Motos Paraguay y Kenton; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'gl-150-pro-vs-star-150' => 
  array (
    'a' => 'kenton/gl-150-pro',
    'b' => 'star/star-150',
    'description' => 'Kenton GL 150 Pro vs Star Star 150: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton GL 150 Pro y a la Star Star 150 con los datos de ficha que publican Kenton y Star y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (8 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'freno_del',
      4 => 'freno_tras',
      5 => 'tanque',
      6 => 'peso',
      7 => 'altura_asiento',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (150 cc), freno delantero (tambor) y freno trasero (tambor). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si priorizás una moto más liviana:** según la ficha, la Kenton GL 150 Pro es la más liviana (100 kg contra 110 kg). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          1 => '**Si hacés muchos kilómetros entre cargas:** la Kenton GL 150 Pro publica el tanque más grande (13 litros contra 11 litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          2 => '**Si necesitás un asiento más bajo:** la Kenton GL 150 Pro declara la altura de asiento menor (750 mm contra 760 mm). Probá sentarte en las dos: la altura sola no dice cómo llegás al piso.',
          3 => '**Si mirás la potencia declarada:** la Kenton GL 150 Pro publica la cifra más alta (12 HP contra 11,56 HP / 8000 RPM). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton GL 150 Pro: "Motor OHV 150cc con distribución a varilla, 4 tiempos, monocilíndrico, refrigerado por aire". La Star Star 150: "4 tiempos, monocilíndrico". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton GL 150 Pro](/motos/kenton/gl-150-pro), [Star Star 150](/motos/star/star-150)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton GL 150 Pro o la Star Star 150?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, tanque, peso y altura del asiento, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton y Star; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'nt-a-150-vs-rx4-150' => 
  array (
    'a' => 'star/nt-a-150',
    'b' => 'star/rx4-150',
    'description' => 'Star NT-A 150 vs Star RX4 150: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Star NT-A 150 y a la Star RX4 150 con los datos de ficha que publican Star y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (7 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'potencia',
      2 => 'freno_del',
      3 => 'freno_tras',
      4 => 'neumatico_del',
      5 => 'neumatico_tras',
      6 => 'tanque',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (150 cc), freno delantero (disco) y freno trasero (tambor). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si hacés muchos kilómetros entre cargas:** la Star RX4 150 publica el tanque más grande (15 litros contra 14 litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          1 => '**Potencia:** la Star NT-A 150 la publica como "11 HP / 8500 RPM" y la Star RX4 150 como "11 HP". Vienen en unidades o condiciones distintas, por eso no las ordenamos: pedí al distribuidor la cifra en la misma unidad antes de comparar.',
          2 => '**Neumático delantero:** la Star NT-A 150 monta 2.75×18 y la Star RX4 150 2.75x18. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
          3 => '**Neumático trasero:** la Star NT-A 150 monta 90/90×18 y la Star RX4 150 3.00 x18. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
        ),
      ),
      3 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      4 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Star NT-A 150](/motos/star/nt-a-150), [Star RX4 150](/motos/star/rx4-150)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      5 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Star NT-A 150 o la Star RX4 150?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, neumático delantero, neumático trasero y tanque, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Star; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'raider-125-vs-ybr-125z' => 
  array (
    'a' => 'tvs/raider-125',
    'b' => 'yamaha/ybr-125z',
    'description' => 'TVS Raider 125 vs Yamaha YBR 125Z: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la TVS Raider 125 y a la Yamaha YBR 125Z con los datos de ficha que publican Chacomer y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (7 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'potencia',
      2 => 'transmision',
      3 => 'refrigeracion',
      4 => 'freno_del',
      5 => 'freno_tras',
      6 => 'tanque',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en refrigeración (aire). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si te importa la cilindrada declarada:** la TVS Raider 125 figura con 125 cc y la Yamaha YBR 125Z con 123 cc; la TVS Raider 125 tiene el motor más grande, que no es lo mismo que decir que rinde más.',
          1 => '**Si hacés muchos kilómetros entre cargas:** la Yamaha YBR 125Z publica el tanque más grande (14 L contra 10 L). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          2 => '**Potencia:** la TVS Raider 125 la publica como "12.73 HP" y la Yamaha YBR 125Z como "10.7 bHP". Vienen en unidades o condiciones distintas, por eso no las ordenamos: pedí al distribuidor la cifra en la misma unidad antes de comparar.',
          3 => '**Si el freno delantero es tu criterio:** la TVS Raider 125 declara disco 240 mm, pinza flotante 2 émbolos y la Yamaha YBR 125Z disco 130 mm. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          4 => '**Si el freno trasero es tu criterio:** la TVS Raider 125 declara tambor 130 SYNCRO SBT y la Yamaha YBR 125Z disco 130 mm. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          5 => '**Transmisión:** la TVS Raider 125 la publica como mecánico 5 velocidades y la Yamaha YBR 125Z como mecanica.',
        ),
      ),
      3 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      4 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([TVS Raider 125](/motos/tvs/raider-125), [Yamaha YBR 125Z](/motos/yamaha/ybr-125z)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      5 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la TVS Raider 125 o la Yamaha YBR 125Z?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en cilindrada, potencia, transmisión y freno delantero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Chacomer; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'gl-150-vs-tl150-cr1' => 
  array (
    'a' => 'kenton/gl-150',
    'b' => 'taiga/tl150-cr1',
    'description' => 'Kenton GL 150 vs Taiga TL150 CR1: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton GL 150 y a la Taiga TL150 CR1 con los datos de ficha que publican Kenton y Inverfin y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (7 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'freno_del',
      5 => 'freno_tras',
      6 => 'tanque',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (150 cc) y freno trasero (tambor). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si hacés muchos kilómetros entre cargas:** la Taiga TL150 CR1 publica el tanque más grande (14 litros contra 13 litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          1 => '**Si mirás la potencia declarada:** la Kenton GL 150 publica la cifra más alta (12 HP contra 11 HP). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
          2 => '**Si el freno delantero es tu criterio:** la Kenton GL 150 declara tambor y la Taiga TL150 CR1 disco. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          3 => '**Transmisión:** la Kenton GL 150 la publica como 5 velocidades con embrague y la Taiga TL150 CR1 como 5 velocidades manual con embrague.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton GL 150: "150 cc, 4 tiempos, refrigerado por aire". La Taiga TL150 CR1: "OHV 150 cc 4 tiempos". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton GL 150](/motos/kenton/gl-150), [Taiga TL150 CR1](/motos/taiga/tl150-cr1)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton GL 150 o la Taiga TL150 CR1?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, transmisión, freno delantero y tanque, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton y Inverfin; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'gl-150-pro-vs-gtr-150' => 
  array (
    'a' => 'kenton/gl-150-pro',
    'b' => 'kenton/gtr-150',
    'description' => 'Kenton GL 150 Pro vs Kenton GTR 150: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton GL 150 Pro y a la Kenton GTR 150 con los datos de ficha que publican Kenton y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (8 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'arranque',
      4 => 'freno_del',
      5 => 'freno_tras',
      6 => 'tanque',
      7 => 'peso',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (150 cc), freno delantero (tambor) y freno trasero (tambor). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si priorizás una moto más liviana:** según la ficha, la Kenton GL 150 Pro es la más liviana (100 kg contra 116 kg). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          1 => '**Si hacés muchos kilómetros entre cargas:** la Kenton GL 150 Pro publica el tanque más grande (13 litros contra 12 litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          2 => '**Si mirás la potencia declarada:** la Kenton GL 150 Pro publica la cifra más alta (12 HP contra 11.3 HP). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
          3 => '**Arranque:** la Kenton GL 150 Pro declara eléctrico/Pedal y la Kenton GTR 150 eléctrico. Si usás la moto todos los días, un arranque eléctrico evita depender del pedal.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton GL 150 Pro: "Motor OHV 150cc con distribución a varilla, 4 tiempos, monocilíndrico, refrigerado por aire". La Kenton GTR 150: "Motor OHV 150cc con distribución a varilla". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton GL 150 Pro](/motos/kenton/gl-150-pro), [Kenton GTR 150](/motos/kenton/gtr-150)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton GL 150 Pro o la Kenton GTR 150?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, arranque, tanque y peso, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'forza-150-vs-tl150-cr1' => 
  array (
    'a' => 'kenton/forza-150',
    'b' => 'taiga/tl150-cr1',
    'description' => 'Kenton Forza 150 vs Taiga TL150 CR1: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton Forza 150 y a la Taiga TL150 CR1 con los datos de ficha que publican Kenton y Inverfin y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (8 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'arranque',
      5 => 'freno_del',
      6 => 'freno_tras',
      7 => 'tanque',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (150 cc) y freno trasero (tambor). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si hacés muchos kilómetros entre cargas:** la Taiga TL150 CR1 publica el tanque más grande (14 litros contra 11 Litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          1 => '**Potencia:** la Kenton Forza 150 la publica como "8.5 kW / 8000 RPM" y la Taiga TL150 CR1 como "11 HP". Vienen en unidades o condiciones distintas, por eso no las ordenamos: pedí al distribuidor la cifra en la misma unidad antes de comparar.',
          2 => '**Si el freno delantero es tu criterio:** la Kenton Forza 150 declara tambor y la Taiga TL150 CR1 disco. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          3 => '**Arranque:** la Kenton Forza 150 declara eléctrico y Pedal y la Taiga TL150 CR1 eléctrico y a pedal. Si usás la moto todos los días, un arranque eléctrico evita depender del pedal.',
          4 => '**Transmisión:** la Kenton Forza 150 la publica como 5 velocidades y la Taiga TL150 CR1 como 5 velocidades manual con embrague.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton Forza 150: "Motor OHV 150cc con distribución a varilla, 4 tiempos, mono cilíndrico, Refrigerado por aire". La Taiga TL150 CR1: "OHV 150 cc 4 tiempos". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton Forza 150](/motos/kenton/forza-150), [Taiga TL150 CR1](/motos/taiga/tl150-cr1)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton Forza 150 o la Taiga TL150 CR1?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, transmisión, arranque y freno delantero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton y Inverfin; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'forza-150-vs-ht-150-ba' => 
  array (
    'a' => 'kenton/forza-150',
    'b' => 'leopard/ht-150-ba',
    'description' => 'Kenton Forza 150 vs Leopard HT 150 BA: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton Forza 150 y a la Leopard HT 150 BA con los datos de ficha que publican Kenton y Reimpex y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (7 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'arranque',
      5 => 'tanque',
      6 => 'peso',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (150 cc). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si priorizás una moto más liviana:** según la ficha, la Kenton Forza 150 es la más liviana (104 KG contra 120 kg). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          1 => '**Si hacés muchos kilómetros entre cargas:** la Leopard HT 150 BA publica el tanque más grande (12,6 L contra 11 Litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          2 => '**Potencia:** la Kenton Forza 150 la publica como "8.5 kW / 8000 RPM" y la Leopard HT 150 BA como "10 HP". Vienen en unidades o condiciones distintas, por eso no las ordenamos: pedí al distribuidor la cifra en la misma unidad antes de comparar.',
          3 => '**Arranque:** la Kenton Forza 150 declara eléctrico y Pedal y la Leopard HT 150 BA eléctrico/Pedal. Si usás la moto todos los días, un arranque eléctrico evita depender del pedal.',
          4 => '**Transmisión:** la Kenton Forza 150 la publica como 5 velocidades y la Leopard HT 150 BA como 5 velocidades, mecánico, cadena.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton Forza 150: "Motor OHV 150cc con distribución a varilla, 4 tiempos, mono cilíndrico, Refrigerado por aire". La Leopard HT 150 BA: "4 tiempos". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton Forza 150](/motos/kenton/forza-150), [Leopard HT 150 BA](/motos/leopard/ht-150-ba)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton Forza 150 o la Leopard HT 150 BA?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, transmisión, arranque y tanque, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton y Reimpex; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'ronin-225-vs-stratta-200' => 
  array (
    'a' => 'tvs/ronin-225',
    'b' => 'kenton/stratta-200',
    'description' => 'TVS Ronin 225 vs Kenton Stratta 200: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la TVS Ronin 225 y a la Kenton Stratta 200 con los datos de ficha que publican TVS Motor Paraguay y Classic Motos y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (7 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'potencia',
      2 => 'refrigeracion',
      3 => 'freno_del',
      4 => 'freno_tras',
      5 => 'neumatico_del',
      6 => 'neumatico_tras',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Las fichas no coinciden literalmente en ninguno de los datos que las dos publican, aunque pueden parecerse: mirá la tabla fila por fila.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si te importa la cilindrada declarada:** la TVS Ronin 225 figura con 225 cc y la Kenton Stratta 200 con 200 cc; la TVS Ronin 225 tiene el motor más grande, que no es lo mismo que decir que rinde más.',
          1 => '**Si mirás la potencia declarada:** la TVS Ronin 225 publica la cifra más alta (20.1 HP @ 7750 rpm contra 15 HP). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
          2 => '**Si el freno delantero es tu criterio:** la TVS Ronin 225 declara disco 300 mm con ABS de dos canales y la Kenton Stratta 200 disco. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          3 => '**Si el freno trasero es tu criterio:** la TVS Ronin 225 declara disco 240 mm y la Kenton Stratta 200 disco. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          4 => '**Refrigeración:** aceite en la TVS Ronin 225, aire en la Kenton Stratta 200.',
          5 => '**Neumático delantero:** la TVS Ronin 225 monta 110/70-17 sin cámara y la Kenton Stratta 200 100/80-17. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
          6 => '**Neumático trasero:** la TVS Ronin 225 monta 130/70-17 sin cámara y la Kenton Stratta 200 130/80-17. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
        ),
      ),
      3 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      4 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([TVS Ronin 225](/motos/tvs/ronin-225), [Kenton Stratta 200](/motos/kenton/stratta-200)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      5 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la TVS Ronin 225 o la Kenton Stratta 200?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en cilindrada, potencia, refrigeración y freno delantero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican TVS Motor Paraguay y Classic Motos; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'stratta-200-vs-tl200-eclipse-pro-gen1' => 
  array (
    'a' => 'kenton/stratta-200',
    'b' => 'taiga/tl200-eclipse-pro-gen1',
    'description' => 'Kenton Stratta 200 vs Taiga TL200 Eclipse Pro Gen1: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton Stratta 200 y a la Taiga TL200 Eclipse Pro Gen1 con los datos de ficha que publican Classic Motos y Inverfin y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo naked y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (8 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'potencia',
      2 => 'transmision',
      3 => 'arranque',
      4 => 'refrigeracion',
      5 => 'freno_del',
      6 => 'freno_tras',
      7 => 'tanque',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (200 cc), refrigeración (aire) y freno delantero (disco). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Tanque:** la Kenton Stratta 200 publica 13 L y la Taiga TL200 Eclipse Pro Gen1 13 LTS.',
          1 => '**Si mirás la potencia declarada:** la Kenton Stratta 200 publica la cifra más alta (15 HP contra 13,41 HP). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
          2 => '**Si el freno trasero es tu criterio:** la Kenton Stratta 200 declara disco y la Taiga TL200 Eclipse Pro Gen1 tambor. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          3 => '**Arranque:** la Kenton Stratta 200 declara eléctrico y la Taiga TL200 Eclipse Pro Gen1 eléctrico y a pedal. Si usás la moto todos los días, un arranque eléctrico evita depender del pedal.',
          4 => '**Transmisión:** la Kenton Stratta 200 la publica como manual 6 velocidades y la Taiga TL200 Eclipse Pro Gen1 como 6 velocidades.',
        ),
      ),
      3 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      4 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton Stratta 200](/motos/kenton/stratta-200), [Taiga TL200 Eclipse Pro Gen1](/motos/taiga/tl200-eclipse-pro-gen1)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      5 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de naked](/motos/tipo/naked).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton Stratta 200 o la Taiga TL200 Eclipse Pro Gen1?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, transmisión, arranque y freno trasero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Classic Motos y Inverfin; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'bravo-125-vs-quick-125' => 
  array (
    'a' => 'kenton/bravo-125',
    'b' => 'kenton/quick-125',
    'description' => 'Kenton Bravo 125 vs Kenton Quick 125: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton Bravo 125 y a la Kenton Quick 125 con los datos de ficha que publican Kenton y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo scooter y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (11 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'alimentacion',
      5 => 'freno_del',
      6 => 'freno_tras',
      7 => 'neumatico_del',
      8 => 'neumatico_tras',
      9 => 'tanque',
      10 => 'altura_asiento',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (125 cc), alimentación (carburador), freno delantero (disco), freno trasero (tambor) y neumático trasero (3.50-10). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si hacés muchos kilómetros entre cargas:** la Kenton Bravo 125 publica el tanque más grande (9.5 litros contra 4.5 litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          1 => '**Si necesitás un asiento más bajo:** la Kenton Quick 125 declara la altura de asiento menor (740 mm contra 770 mm). Probá sentarte en las dos: la altura sola no dice cómo llegás al piso.',
          2 => '**Si mirás la potencia declarada:** la Kenton Bravo 125 publica la cifra más alta (8.4 HP contra 7.24 HP). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
          3 => '**Transmisión:** la Kenton Bravo 125 la publica como automática y la Kenton Quick 125 como automática CVT.',
          4 => '**Neumático delantero:** la Kenton Bravo 125 monta 90/90-12 y la Kenton Quick 125 3.50-10. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton Bravo 125: "124.6 cc, monocilíndrico, 4 tiempos, refrigerado por aire". La Kenton Quick 125: "OHV 125 cc distribución a cadena, 4 tiempos, monocilíndrico, refrigerado por aire". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton Bravo 125](/motos/kenton/bravo-125), [Kenton Quick 125](/motos/kenton/quick-125)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de scooter](/motos/tipo/scooter).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton Bravo 125 o la Kenton Quick 125?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, transmisión, neumático delantero y tanque, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'bravo-125-vs-navi-110' => 
  array (
    'a' => 'kenton/bravo-125',
    'b' => 'honda/navi-110',
    'description' => 'Kenton Bravo 125 vs Honda Navi 110: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton Bravo 125 y a la Honda Navi 110 con los datos de ficha que publican Kenton y InfoNegocios y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo scooter y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (7 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'potencia',
      2 => 'transmision',
      3 => 'freno_del',
      4 => 'freno_tras',
      5 => 'neumatico_del',
      6 => 'neumatico_tras',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en transmisión (automática) y freno trasero (tambor). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si te importa la cilindrada declarada:** la Kenton Bravo 125 figura con 125 cc y la Honda Navi 110 con 109 cc; la Kenton Bravo 125 tiene el motor más grande, que no es lo mismo que decir que rinde más.',
          1 => '**Si mirás la potencia declarada:** la Kenton Bravo 125 publica la cifra más alta (8.4 HP contra 7.92 HP). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
          2 => '**Si el freno delantero es tu criterio:** la Kenton Bravo 125 declara disco y la Honda Navi 110 tambor. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          3 => '**Neumático delantero:** la Kenton Bravo 125 monta 90/90-12 y la Honda Navi 110 12 pulgadas. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
          4 => '**Neumático trasero:** la Kenton Bravo 125 monta 3.50-10 y la Honda Navi 110 10 pulgadas. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
        ),
      ),
      3 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      4 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton Bravo 125](/motos/kenton/bravo-125), [Honda Navi 110](/motos/honda/navi-110)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      5 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de scooter](/motos/tipo/scooter).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton Bravo 125 o la Honda Navi 110?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en cilindrada, potencia, freno delantero y neumático delantero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton y InfoNegocios; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'quick-125-vs-spark-150' => 
  array (
    'a' => 'kenton/quick-125',
    'b' => 'kenton/spark-150',
    'description' => 'Kenton Quick 125 vs Kenton Spark 150: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton Quick 125 y a la Kenton Spark 150 con los datos de ficha que publican Kenton y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo scooter y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (9 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'potencia',
      2 => 'transmision',
      3 => 'alimentacion',
      4 => 'freno_del',
      5 => 'freno_tras',
      6 => 'neumatico_del',
      7 => 'neumatico_tras',
      8 => 'tanque',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en alimentación (carburador) y freno delantero (disco). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si te importa la cilindrada declarada:** la Kenton Quick 125 figura con 125 cc y la Kenton Spark 150 con 150 cc; la Kenton Spark 150 tiene el motor más grande, que no es lo mismo que decir que rinde más.',
          1 => '**Si hacés muchos kilómetros entre cargas:** la Kenton Spark 150 publica el tanque más grande (14.5 litros contra 4.5 litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          2 => '**Si mirás la potencia declarada:** la Kenton Spark 150 publica la cifra más alta (10.5 HP contra 7.24 HP). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
          3 => '**Si el freno trasero es tu criterio:** la Kenton Quick 125 declara tambor y la Kenton Spark 150 disco. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          4 => '**Transmisión:** la Kenton Quick 125 la publica como automática CVT y la Kenton Spark 150 como manual.',
          5 => '**Neumático delantero:** la Kenton Quick 125 monta 3.50-10 y la Kenton Spark 150 120/70-12. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
          6 => '**Neumático trasero:** la Kenton Quick 125 monta 3.50-10 y la Kenton Spark 150 130/70-12. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
        ),
      ),
      3 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      4 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton Quick 125](/motos/kenton/quick-125), [Kenton Spark 150](/motos/kenton/spark-150)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      5 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de scooter](/motos/tipo/scooter).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton Quick 125 o la Kenton Spark 150?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en cilindrada, potencia, transmisión y freno trasero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'dkr-150-vs-smx-150' => 
  array (
    'a' => 'kenton/dkr-150',
    'b' => 'star/smx-150',
    'description' => 'Kenton DKR 150 vs Star SMX 150: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton DKR 150 y a la Star SMX 150 con los datos de ficha que publican Kenton y Star y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo enduro y cross y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (11 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'arranque',
      5 => 'freno_del',
      6 => 'freno_tras',
      7 => 'neumatico_del',
      8 => 'neumatico_tras',
      9 => 'tanque',
      10 => 'peso',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (150 cc), freno delantero (disco), freno trasero (tambor), neumático delantero (90/90-19) y tanque (12 LITROS). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si priorizás una moto más liviana:** según la ficha, la Star SMX 150 es la más liviana (110 kg contra 120 KG). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          1 => '**Si mirás la potencia declarada:** la Kenton DKR 150 publica la cifra más alta (11.8 HP contra 11 HP / 8500 RPM). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
          2 => '**Arranque:** la Kenton DKR 150 declara eléctrico y la Star SMX 150 eléctrico / Pedal. Si usás la moto todos los días, un arranque eléctrico evita depender del pedal.',
          3 => '**Transmisión:** la Kenton DKR 150 la publica como manual y la Star SMX 150 como manual 5 velocidades.',
          4 => '**Neumático trasero:** la Kenton DKR 150 monta 120/90-17 y la Star SMX 150 110/90-17. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton DKR 150: "Motor OHV 150cc con distribución a cadena". La Star SMX 150: "4 tiempos, monocilíndrico, refrigerado por aire, 2 válvulas". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton DKR 150](/motos/kenton/dkr-150), [Star SMX 150](/motos/star/smx-150)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de enduro y cross](/motos/tipo/enduro-cross).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton DKR 150 o la Star SMX 150?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, transmisión, arranque y neumático trasero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton y Star; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'shark-150-vs-skua-150' => 
  array (
    'a' => 'kenton/shark-150',
    'b' => 'kenton/skua-150',
    'description' => 'Kenton Shark 150 vs Kenton Skua 150: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton Shark 150 y a la Kenton Skua 150 con los datos de ficha que publican Kenton y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo enduro y cross y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (11 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'freno_del',
      5 => 'freno_tras',
      6 => 'neumatico_del',
      7 => 'neumatico_tras',
      8 => 'tanque',
      9 => 'peso',
      10 => 'altura_asiento',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en transmisión (manual – 5 cambios) y freno trasero (tambor). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si te importa la cilindrada declarada:** la Kenton Shark 150 figura con 149 cc y la Kenton Skua 150 con 150 cc; la Kenton Skua 150 tiene el motor más grande, que no es lo mismo que decir que rinde más.',
          1 => '**Si priorizás una moto más liviana:** según la ficha, la Kenton Shark 150 es la más liviana (110 Kg contra 115kg). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          2 => '**Tanque:** la Kenton Shark 150 publica 12 L y la Kenton Skua 150 12 litros.',
          3 => '**Si necesitás un asiento más bajo:** la Kenton Shark 150 declara la altura de asiento menor (860 mm contra 898mm). Probá sentarte en las dos: la altura sola no dice cómo llegás al piso.',
          4 => '**Si mirás la potencia declarada:** la Kenton Shark 150 publica la cifra más alta (11.5 HP contra 11 HP). Las fichas no siempre usan el mismo régimen de giro, así que tomá la diferencia como orientación.',
          5 => '**Si el freno delantero es tu criterio:** la Kenton Shark 150 declara disco y la Kenton Skua 150 tambor. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          6 => '**Neumático delantero:** la Kenton Shark 150 monta 90/90-19 y la Kenton Skua 150 2.75 – 21. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
          7 => '**Neumático trasero:** la Kenton Shark 150 monta 110/90-17 y la Kenton Skua 150 4.60 – 18. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton Shark 150: "Monocilíndrico, 4 tiempos, refrigeración por aire". La Kenton Skua 150: "Monocilíndrico, 4 tiempos, refrigeración por aire". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton Shark 150](/motos/kenton/shark-150), [Kenton Skua 150](/motos/kenton/skua-150)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de enduro y cross](/motos/tipo/enduro-cross).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton Shark 150 o la Kenton Skua 150?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en cilindrada, potencia, freno delantero y neumático delantero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'skua-150-vs-smx-150' => 
  array (
    'a' => 'kenton/skua-150',
    'b' => 'star/smx-150',
    'description' => 'Kenton Skua 150 vs Star SMX 150: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Kenton Skua 150 y a la Star SMX 150 con los datos de ficha que publican Kenton y Star y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo enduro y cross y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (10 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'freno_del',
      5 => 'freno_tras',
      6 => 'neumatico_del',
      7 => 'neumatico_tras',
      8 => 'tanque',
      9 => 'peso',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (150 cc), freno trasero (tambor) y tanque (12 litros). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si priorizás una moto más liviana:** según la ficha, la Star SMX 150 es la más liviana (110 kg contra 115kg). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          1 => '**Potencia:** la Kenton Skua 150 la publica como "11 HP" y la Star SMX 150 como "11 HP / 8500 RPM". Vienen en unidades o condiciones distintas, por eso no las ordenamos: pedí al distribuidor la cifra en la misma unidad antes de comparar.',
          2 => '**Si el freno delantero es tu criterio:** la Kenton Skua 150 declara tambor y la Star SMX 150 disco. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          3 => '**Transmisión:** la Kenton Skua 150 la publica como manual – 5 Cambios y la Star SMX 150 como manual 5 velocidades.',
          4 => '**Neumático delantero:** la Kenton Skua 150 monta 2.75 – 21 y la Star SMX 150 90/90-19. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
          5 => '**Neumático trasero:** la Kenton Skua 150 monta 4.60 – 18 y la Star SMX 150 110/90-17. Si cambiás cubiertas, la medida condiciona qué modelos de neumático conseguís.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Kenton Skua 150: "Monocilíndrico, 4 tiempos, refrigeración por aire". La Star SMX 150: "4 tiempos, monocilíndrico, refrigerado por aire, 2 válvulas". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Kenton Skua 150](/motos/kenton/skua-150), [Star SMX 150](/motos/star/smx-150)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de enduro y cross](/motos/tipo/enduro-cross).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Kenton Skua 150 o la Star SMX 150?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en potencia, transmisión, freno delantero y neumático delantero, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Kenton y Star; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'rally-250-vs-tl250-cr5-gt' => 
  array (
    'a' => 'taiga/rally-250',
    'b' => 'taiga/tl250-cr5-gt',
    'description' => 'Taiga Rally 250 vs Taiga TL250 CR5 GT: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Taiga Rally 250 y a la Taiga TL250 CR5 GT con los datos de ficha que publican Inverfin y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo enduro y cross y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (8 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'refrigeracion',
      5 => 'freno_del',
      6 => 'freno_tras',
      7 => 'tanque',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (223 cc), potencia (17,7 HP), refrigeración (aire con radiador de aceite), freno delantero (disco) y freno trasero (disco). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si hacés muchos kilómetros entre cargas:** la Taiga Rally 250 publica el tanque más grande (14 LTS contra 12 litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          1 => '**Transmisión:** la Taiga Rally 250 la publica como 6 cambios con embrague y la Taiga TL250 CR5 GT como 6 velocidades.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Taiga Rally 250: "OHC 250 cc 4 tiempos". La Taiga TL250 CR5 GT: "OHC 250 cc 4 tiempos". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Taiga Rally 250](/motos/taiga/rally-250), [Taiga TL250 CR5 GT](/motos/taiga/tl250-cr5-gt)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de enduro y cross](/motos/tipo/enduro-cross).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Taiga Rally 250 o la Taiga TL250 CR5 GT?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en transmisión y tanque, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Inverfin; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'hb-125-grand-tour-vs-hb1-110' => 
  array (
    'a' => 'leopard/hb-125-grand-tour',
    'b' => 'leopard/hb1-110',
    'description' => 'Leopard HB 125 Grand Tour vs Leopard HB1 110: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Leopard HB 125 Grand Tour y a la Leopard HB1 110 con los datos de ficha que publican Reimpex y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo cub y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (11 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'motor',
      2 => 'potencia',
      3 => 'transmision',
      4 => 'arranque',
      5 => 'alimentacion',
      6 => 'refrigeracion',
      7 => 'freno_del',
      8 => 'freno_tras',
      9 => 'tanque',
      10 => 'peso',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en transmisión (4 velocidades semiautomática, cadena), arranque (eléctrico/pedal), alimentación (carburador), refrigeración (aire), freno delantero (disco), freno trasero (tambor) y tanque (3.5 litros). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si te importa la cilindrada declarada:** la Leopard HB 125 Grand Tour figura con 125 cc y la Leopard HB1 110 con 110 cc; la Leopard HB 125 Grand Tour tiene el motor más grande, que no es lo mismo que decir que rinde más.',
          1 => '**Si priorizás una moto más liviana:** según la ficha, la Leopard HB1 110 es la más liviana (93 kg contra 98 kg). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          2 => '**Potencia:** la Leopard HB 125 Grand Tour la publica como "7.8 CV" y la Leopard HB1 110 como "6.5 HP". Vienen en unidades o condiciones distintas, por eso no las ordenamos: pedí al distribuidor la cifra en la misma unidad antes de comparar.',
        ),
      ),
      3 => '**El motor, tal como lo describe cada ficha.** La Leopard HB 125 Grand Tour: "4 tiempos". La Leopard HB1 110: "4 tiempos". Es la descripción del fabricante o distribuidor, que citamos tal cual en la tabla con su fuente.',
      4 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      5 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Leopard HB 125 Grand Tour](/motos/leopard/hb-125-grand-tour), [Leopard HB1 110](/motos/leopard/hb1-110)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      6 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de cub](/motos/tipo/cub).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Leopard HB 125 Grand Tour o la Leopard HB1 110?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en cilindrada, potencia y peso, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Reimpex; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'hb1-110-vs-urban-110' => 
  array (
    'a' => 'leopard/hb1-110',
    'b' => 'buler/urban-110',
    'description' => 'Leopard HB1 110 vs Buler Urban 110: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Leopard HB1 110 y a la Buler Urban 110 con los datos de ficha que publican Reimpex y Bristol y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo cub y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (7 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'transmision',
      2 => 'arranque',
      3 => 'freno_del',
      4 => 'freno_tras',
      5 => 'tanque',
      6 => 'peso',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (110 cc) y freno trasero (tambor). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si priorizás una moto más liviana:** según la ficha, la Buler Urban 110 es la más liviana (90 kg contra 93 kg). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          1 => '**Si hacés muchos kilómetros entre cargas:** la Buler Urban 110 publica el tanque más grande (4 litros contra 3.5 litros). Sin un dato de consumo no se puede convertir eso en kilómetros de autonomía, y no lo inventamos.',
          2 => '**Si el freno delantero es tu criterio:** la Leopard HB1 110 declara disco y la Buler Urban 110 tambor. Es una diferencia de equipamiento que se ve a simple vista en el local.',
          3 => '**Arranque:** la Leopard HB1 110 declara eléctrico/pedal y la Buler Urban 110 eléctrico y a pedal. Si usás la moto todos los días, un arranque eléctrico evita depender del pedal.',
          4 => '**Transmisión:** la Leopard HB1 110 la publica como 4 velocidades semiautomática, cadena y la Buler Urban 110 como semi automática.',
        ),
      ),
      3 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      4 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Leopard HB1 110](/motos/leopard/hb1-110), [Buler Urban 110](/motos/buler/urban-110)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      5 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de cub](/motos/tipo/cub).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Leopard HB1 110 o la Buler Urban 110?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en transmisión, arranque, freno delantero y tanque, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Reimpex y Bristol; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
  'dax-110-vs-hb1-110' => 
  array (
    'a' => 'star/dax-110',
    'b' => 'leopard/hb1-110',
    'description' => 'Star Dax 110 vs Leopard HB1 110: ficha lado a lado con la fuente de cada dato y en qué se diferencian, sin ganadora inventada.',
    'criterio' => 
    array (
      0 => 'Esta comparación pone lado a lado a la Star Dax 110 y a la Leopard HB1 110 con los datos de ficha que publican Star y Reimpex y que consultamos el 30 de septiembre de 2026. Las dos son motos de tipo cub y están en un rango de uso parecido, así que tiene sentido mirarlas juntas.',
      1 => 'No elegimos una ganadora. Cuál te conviene depende de lo que pese más para vos, y por eso cada observación de abajo dice con qué criterio se está mirando: peso, tanque, altura del asiento, frenos, potencia declarada. Si un criterio no aparece, es porque una de las dos fichas no publica ese dato.',
      2 => 'En la tabla entran sólo las filas con dato y fuente en las dos motos (6 filas). No completamos ni estimamos nada que la ficha no diga.',
    ),
    'rows' => 
    array (
      0 => 'cc',
      1 => 'arranque',
      2 => 'freno_del',
      3 => 'freno_tras',
      4 => 'tanque',
      5 => 'peso',
    ),
    'body' => 
    array (
      0 => '**Lo que tienen en común.** Según las fichas, las dos declaran el mismo valor en cilindrada (110 cc), arranque (eléctrico / Pedal), freno trasero (tambor) y tanque (3,5 litros). En esos puntos la elección no cambia nada, y lo que decide es lo que sigue.',
      1 => '**Dónde se separan, criterio por criterio.** Cada punto de la lista se lee por separado; ninguno alcanza por sí solo para decidir.',
      2 => 
      array (
        'list' => 
        array (
          0 => '**Si priorizás una moto más liviana:** según la ficha, la Leopard HB1 110 es la más liviana (93 kg contra 100 kg). Un peso menor se nota al maniobrar y al estacionar, y es un factor si manejás poco o recién empezás.',
          1 => '**Si el freno delantero es tu criterio:** la Star Dax 110 declara tambor y la Leopard HB1 110 disco. Es una diferencia de equipamiento que se ve a simple vista en el local.',
        ),
      ),
      3 => '**Lo que las fichas no permiten comparar.** Entre las dos no hay dato publicado y con fuente para comparar el consumo, la velocidad máxima, el torque y la autonomía. Son justo los datos que más influyen en el costo de uso, y preferimos dejarlos vacíos antes que repetir cifras de foros o de ficha de otro país.',
      4 => '**El precio.** No lo comparamos acá: un precio publicado vence y cambia según la sucursal y la forma de pago. En la página de cada modelo ([Star Dax 110](/motos/star/dax-110), [Leopard HB1 110](/motos/leopard/hb1-110)) figura el precio vigente con quién lo publica y la fecha de consulta, o la aclaración de que no hay uno publicado.',
      5 => '**Cómo cerrar la decisión.** Mirá las dos en persona, con el casco puesto: sentate, apoyá los pies, probá el freno y fijate qué tan cómoda es la posición. Preguntá en el local por la disponibilidad de repuestos y el service en tu ciudad, y pedí la ficha completa por escrito si algún dato que te importa no está en la tabla. Más motos de este tipo, en [la página de cub](/motos/tipo/cub).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuál conviene más, la Star Dax 110 o la Leopard HB1 110?',
        'a' => 'Depende de tu criterio. Esta comparación no elige ganadora: según la ficha, se diferencian en freno delantero y peso, y cada uno pesa distinto según cómo y cuánto uses la moto.',
      ),
      1 => 
      array (
        'q' => '¿De dónde salen los datos de la tabla?',
        'a' => 'De las fichas que publican Star y Reimpex; cada dato lleva su enlace y la fecha en que lo consultamos. Si una ficha no publica un dato, la fila no aparece.',
      ),
      2 => 
      array (
        'q' => '¿Dónde veo el precio de cada una?',
        'a' => 'En la página de cada modelo, con quién lo publica y cuándo lo consultamos. Si no hay un precio publicado vigente, lo decimos y te sugerimos consultar con el distribuidor.',
      ),
    ),
    'published' => '2026-10-01',
    'updated' => '2026-10-01',
  ),
);
