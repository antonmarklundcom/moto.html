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
/* Counts and ranges computed from content/catalogo.php as of 2026-10-01. */
return array (
  'naked' => 
  array (
    'name' => 'Naked',
    'description' => 'Modelos de naked en Paraguay: 45 fichas con la fuente de cada dato, qué mirar para elegir y comparativas sin ganador inventado.',
    'intro' => 
    array (
      0 => 'Naked es el nombre que se le da a la moto sin carenado: el motor, el cuadro y el escape quedan a la vista y la posición de manejo es erguida. En el catálogo de moto.com.py es la categoría más grande, y reúne desde las de 110 y 125 cc que mucha gente usa para ir al trabajo hasta modelos de mayor cilindrada.',
      1 => 'Esta página junta los modelos naked que tienen ficha en nuestro catálogo, con datos que publican los distribuidores y la fecha en que los consultamos. No hay una naked mejor que las demás: hay datos para ordenar las opciones según lo que le pidas a la moto.',
    ),
    'sections' => 
    array (
      0 => 
      array (
        'h2' => 'Qué mirar en la ficha',
        'id' => 'que-mirar',
        'body' => 
        array (
          0 => 'Para elegir una naked, estas son las filas de la ficha que más conviene mirar, siempre con el dato publicado por el distribuidor.',
          1 => 
          array (
            'list' => 
            array (
              0 => '**Cilindrada y potencia declarada:** definen el rango de uso. Una de 125 cc no se maneja como una de 300 cc, y la potencia que publica cada ficha no siempre está medida con el mismo régimen de giro.',
              1 => '**Peso y altura del asiento:** cuentan más de lo que parece si la usás en ciudad, si vas a estacionar seguido o si recién empezás.',
              2 => '**Frenos y arranque:** el freno delantero a disco o a tambor y el arranque eléctrico o a pedal figuran en la ficha y cambian el equipamiento de una moto a otra.',
              3 => '**Tanque:** a falta de dato de consumo, la capacidad del tanque es lo único que la ficha dice sobre cuánto vas a poder andar entre cargas.',
            ),
          ),
        ),
      ),
      1 => 
      array (
        'h2' => 'Lo que muestra el catálogo',
        'id' => 'catalogo',
        'body' => 
        array (
          0 => 'Hoy el catálogo tiene **45 modelos** de este tipo, de 11 marcas: Kenton (10), Star (7), Yamaha (6), TVS (6), Honda (3), Leopard (3), Buler (3), Suzuki (2), Bajaj (2), Taiga (2) y Triumph (1).',
          1 => 'En cilindrada, los modelos con dato publicado van de 110 cc a 847 cc (39 fichas con el dato).',
          2 => 'En peso, las fichas que lo publican van de 97 kg a 140 kg (10 fichas).',
          3 => 'En tanque, de 7,2 a 15 litros entre las 26 fichas que lo publican.',
          4 => 'Del total que publica el freno delantero (20 modelos), 13 declaran disco.',
          5 => 'Son datos de las fichas, no una medición propia, y sólo cuentan los modelos cuya ficha publica ese dato. En la página de cada modelo, cuando existe, figura cada cifra con quién la publica y la fecha.',
        ),
      ),
      2 => 
      array (
        'h2' => 'Comparativas de naked',
        'id' => 'comparativas',
        'body' => 
        array (
          0 => 'Estas comparaciones ponen lado a lado dos modelos de este tipo con los datos de ficha que tienen fuente en los dos. Ninguna elige ganador: explican en qué se diferencian y según qué criterio conviene cada uno.',
          1 => 
          array (
            'list' => 
            array (
              0 => '[Kenton Forza 150 vs Kenton GL 150 Pro](/guias/kenton-forza-150-vs-kenton-gl-150-pro)',
              1 => '[Kenton Classic 125 vs Yamaha YBR 125Z](/guias/kenton-classic-125-vs-yamaha-ybr-125z)',
              2 => '[Honda CB1 125 vs Kenton Classic 125](/guias/honda-cb1-125-vs-kenton-classic-125)',
              3 => '[Kenton GL 150 Pro vs Star Star 150](/guias/kenton-gl-150-pro-vs-star-star-150)',
              4 => '[Star NT-A 150 vs Star RX4 150](/guias/star-nt-a-150-vs-star-rx4-150)',
              5 => '[TVS Raider 125 vs Yamaha YBR 125Z](/guias/tvs-raider-125-vs-yamaha-ybr-125z)',
              6 => '[Kenton GL 150 vs Taiga TL150 CR1](/guias/kenton-gl-150-vs-taiga-tl150-cr1)',
              7 => '[Kenton GL 150 Pro vs Kenton GTR 150](/guias/kenton-gl-150-pro-vs-kenton-gtr-150)',
              8 => '[Kenton Forza 150 vs Taiga TL150 CR1](/guias/kenton-forza-150-vs-taiga-tl150-cr1)',
              9 => '[Kenton Forza 150 vs Leopard HT 150 BA](/guias/kenton-forza-150-vs-leopard-ht-150-ba)',
              10 => '[Kenton Stratta 200 vs TVS Ronin 225](/guias/kenton-stratta-200-vs-tvs-ronin-225)',
              11 => '[Kenton Stratta 200 vs Taiga TL200 Eclipse Pro Gen1](/guias/kenton-stratta-200-vs-taiga-tl200-eclipse-pro-gen1)',
            ),
          ),
        ),
      ),
      3 => 
      array (
        'h2' => 'Cómo elegir sin una respuesta única',
        'id' => 'como-elegir',
        'body' => 
        array (
          0 => 'No hay un modelo de este tipo que sirva para todos. Primero definí para qué la vas a usar y cuánto vas a andar por día; después descartá por los datos de la ficha que no se ajusten (altura del asiento, peso, tanque, frenos) y recién al final mirá el precio.',
          1 => 'Antes de comprar, andá a ver las que te quedaron: sentate, probá el freno y preguntá por la disponibilidad de repuestos y service en tu ciudad. Si el dato que te importa no figura en la ficha, pedilo por escrito al distribuidor en lugar de suponerlo.',
        ),
      ),
    ),
    'guides' => 
    array (
      0 => 'kenton-forza-150-vs-kenton-gl-150-pro',
      1 => 'kenton-classic-125-vs-yamaha-ybr-125z',
      2 => 'honda-cb1-125-vs-kenton-classic-125',
      3 => 'kenton-gl-150-pro-vs-star-star-150',
      4 => 'star-nt-a-150-vs-star-rx4-150',
      5 => 'tvs-raider-125-vs-yamaha-ybr-125z',
      6 => 'kenton-gl-150-vs-taiga-tl150-cr1',
      7 => 'kenton-gl-150-pro-vs-kenton-gtr-150',
      8 => 'kenton-forza-150-vs-taiga-tl150-cr1',
      9 => 'kenton-forza-150-vs-leopard-ht-150-ba',
      10 => 'kenton-stratta-200-vs-tvs-ronin-225',
      11 => 'kenton-stratta-200-vs-taiga-tl200-eclipse-pro-gen1',
      12 => 'como-comprar-tu-primera-moto',
      13 => 'moto-0-km-o-usada',
      14 => 'que-cilindrada-elegir',
      15 => 'motos-baratas-en-paraguay',
      16 => 'precios-de-motos-0-km-en-paraguay',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuántos modelos de naked tiene el catálogo?',
        'a' => 'Hoy tiene 45 modelos de este tipo, de 11 marcas. El catálogo crece a medida que sumamos fichas con fuente, y las que no tienen datos suficientes no se publican como página propia.',
      ),
      1 => 
      array (
        'q' => '¿Los precios de esta página son actuales?',
        'a' => 'Esta página no muestra precios. En la página de cada modelo figura el precio publicado por el distribuidor con la fecha en que lo consultamos, y deja de mostrarse pasados 120 días sin volver a verificarlo.',
      ),
      2 => 
      array (
        'q' => '¿Cuál es la mejor naked?',
        'a' => 'No hay una respuesta única: depende del uso, la altura, el presupuesto y el camino. Las comparativas de arriba explican en qué se diferencian dos modelos, según qué criterio, sin declarar ganador.',
      ),
    ),
    'updated' => '2026-10-01',
  ),
  'enduro-cross' => 
  array (
    'name' => 'Enduro y cross',
    'description' => 'Modelos de enduro y cross en Paraguay: 21 fichas con la fuente de cada dato, qué mirar para elegir y comparativas sin ganador inventado.',
    'intro' => 
    array (
      0 => 'Las motos de enduro y cross son las de suspensión larga, neumáticos tacos y asiento alto, pensadas para caminos de tierra y también para el uso diario en calles rotas. Por eso es una categoría que también se mira para el uso diario, no sólo para el deporte.',
      1 => 'Acá reunimos los modelos de este tipo que tienen ficha en el catálogo, con la fuente de cada dato. Lo que sigue explica qué mirar al compararlos y deja la decisión en tus manos: ninguna ficha dice cuál se adapta mejor a tu camino.',
    ),
    'sections' => 
    array (
      0 => 
      array (
        'h2' => 'Qué mirar en la ficha',
        'id' => 'que-mirar',
        'body' => 
        array (
          0 => 'En una enduro o una cross, estas son las filas de la ficha que más cambian el uso real.',
          1 => 
          array (
            'list' => 
            array (
              0 => '**Altura del asiento y peso:** una moto de suspensión larga es alta. Antes de decidir, sentate y comprobá que llegás al piso con comodidad.',
              1 => '**Neumáticos y frenos:** la medida de las cubiertas delantera y trasera y el freno a disco o a tambor figuran en la ficha y condicionan el uso en tierra y en asfalto.',
              2 => '**Cilindrada y potencia declarada:** una de 150 cc y una de 200 cc o más no tienen el mismo uso; la ficha te da el punto de partida.',
              3 => '**Tanque:** si salís a caminos lejos de una estación de servicio, la capacidad publicada pesa más que la potencia.',
            ),
          ),
        ),
      ),
      1 => 
      array (
        'h2' => 'Lo que muestra el catálogo',
        'id' => 'catalogo',
        'body' => 
        array (
          0 => 'Hoy el catálogo tiene **21 modelos** de este tipo, de 7 marcas: Honda (5), Kenton (5), Star (3), Yamaha (3), Taiga (3), Suzuki (1) y Triumph (1).',
          1 => 'En cilindrada, los modelos con dato publicado van de 123 cc a 644 cc (18 fichas con el dato).',
          2 => 'En peso, las fichas que lo publican van de 110 kg a 166 kg (8 fichas).',
          3 => 'En tanque, de 10,6 a 14 litros entre las 13 fichas que lo publican.',
          4 => 'Del total que publica el freno delantero (10 modelos), 9 declaran disco.',
          5 => 'Son datos de las fichas, no una medición propia, y sólo cuentan los modelos cuya ficha publica ese dato. En la página de cada modelo, cuando existe, figura cada cifra con quién la publica y la fecha.',
        ),
      ),
      2 => 
      array (
        'h2' => 'Comparativas de enduro y cross',
        'id' => 'comparativas',
        'body' => 
        array (
          0 => 'Estas comparaciones ponen lado a lado dos modelos de este tipo con los datos de ficha que tienen fuente en los dos. Ninguna elige ganador: explican en qué se diferencian y según qué criterio conviene cada uno.',
          1 => 
          array (
            'list' => 
            array (
              0 => '[Kenton DKR 150 vs Star SMX 150](/guias/kenton-dkr-150-vs-star-smx-150)',
              1 => '[Kenton Shark 150 vs Kenton Skua 150](/guias/kenton-shark-150-vs-kenton-skua-150)',
              2 => '[Kenton Skua 150 vs Star SMX 150](/guias/kenton-skua-150-vs-star-smx-150)',
              3 => '[Taiga Rally 250 vs Taiga TL250 CR5 GT](/guias/taiga-rally-250-vs-taiga-tl250-cr5-gt)',
            ),
          ),
        ),
      ),
      3 => 
      array (
        'h2' => 'Cómo elegir sin una respuesta única',
        'id' => 'como-elegir',
        'body' => 
        array (
          0 => 'No hay un modelo de este tipo que sirva para todos. Primero definí para qué la vas a usar y cuánto vas a andar por día; después descartá por los datos de la ficha que no se ajusten (altura del asiento, peso, tanque, frenos) y recién al final mirá el precio.',
          1 => 'Antes de comprar, andá a ver las que te quedaron: sentate, probá el freno y preguntá por la disponibilidad de repuestos y service en tu ciudad. Si el dato que te importa no figura en la ficha, pedilo por escrito al distribuidor en lugar de suponerlo.',
        ),
      ),
    ),
    'guides' => 
    array (
      0 => 'kenton-dkr-150-vs-star-smx-150',
      1 => 'kenton-shark-150-vs-kenton-skua-150',
      2 => 'kenton-skua-150-vs-star-smx-150',
      3 => 'taiga-rally-250-vs-taiga-tl250-cr5-gt',
      4 => 'como-comprar-tu-primera-moto',
      5 => 'moto-0-km-o-usada',
      6 => 'que-cilindrada-elegir',
      7 => 'como-comprar-una-moto-usada-sin-estafas',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuántos modelos de enduro y cross tiene el catálogo?',
        'a' => 'Hoy tiene 21 modelos de este tipo, de 7 marcas. El catálogo crece a medida que sumamos fichas con fuente, y las que no tienen datos suficientes no se publican como página propia.',
      ),
      1 => 
      array (
        'q' => '¿Los precios de esta página son actuales?',
        'a' => 'Esta página no muestra precios. En la página de cada modelo figura el precio publicado por el distribuidor con la fecha en que lo consultamos, y deja de mostrarse pasados 120 días sin volver a verificarlo.',
      ),
      2 => 
      array (
        'q' => '¿Cuál es la mejor enduro y cross?',
        'a' => 'No hay una respuesta única: depende del uso, la altura, el presupuesto y el camino. Las comparativas de arriba explican en qué se diferencian dos modelos, según qué criterio, sin declarar ganador.',
      ),
    ),
    'updated' => '2026-10-01',
  ),
  'scooter' => 
  array (
    'name' => 'Scooter',
    'description' => 'Modelos de scooter en Paraguay: 12 fichas con la fuente de cada dato, qué mirar para elegir y comparativas sin ganador inventado.',
    'intro' => 
    array (
      0 => 'La scooter es la moto de cuadro abierto y piso plano, con transmisión automática y espacio para guardar cosas bajo el asiento. Es la que mucha gente elige para moverse por la ciudad sin pensar en los cambios.',
      1 => 'En esta página están las scooters que tienen ficha en el catálogo, con los datos que publican los distribuidores. Sin ranking: lo que hacemos es ordenar los datos que sí tienen fuente para que decidas con ellos.',
    ),
    'sections' => 
    array (
      0 => 
      array (
        'h2' => 'Qué mirar en la ficha',
        'id' => 'que-mirar',
        'body' => 
        array (
          0 => 'En una scooter conviene mirar estas filas de la ficha, que son las que más cambian de un modelo a otro.',
          1 => 
          array (
            'list' => 
            array (
              0 => '**Tanque y altura del asiento:** una scooter con tanque chico obliga a cargar más seguido, y un asiento alto puede incomodar si tenés estatura baja.',
              1 => '**Peso:** pesa distinto de una a otra, y se nota al subirla al caballete o sacarla de un garaje.',
              2 => '**Frenos y neumáticos:** el freno delantero a disco y el tamaño de la rueda (que suele ser más chica que en una moto convencional) figuran en la ficha.',
              3 => '**Cilindrada y potencia declarada:** entre 110 y 170 cc el rango de uso cambia: ciudad con poca carga, o trayectos más largos.',
            ),
          ),
        ),
      ),
      1 => 
      array (
        'h2' => 'Lo que muestra el catálogo',
        'id' => 'catalogo',
        'body' => 
        array (
          0 => 'Hoy el catálogo tiene **12 modelos** de este tipo, de 4 marcas: Kenton (5), Honda (3), Star (3) y Taiga (1).',
          1 => 'En cilindrada, los modelos con dato publicado van de 109 cc a 745 cc (11 fichas con el dato).',
          2 => 'En peso, las fichas que lo publican van de 99 kg a 99 kg (1 fichas).',
          3 => 'En tanque, de 3,5 a 14,5 litros entre las 8 fichas que lo publican.',
          4 => 'Del total que publica el freno delantero (8 modelos), 7 declaran disco.',
          5 => 'Son datos de las fichas, no una medición propia, y sólo cuentan los modelos cuya ficha publica ese dato. En la página de cada modelo, cuando existe, figura cada cifra con quién la publica y la fecha.',
        ),
      ),
      2 => 
      array (
        'h2' => 'Comparativas de scooter',
        'id' => 'comparativas',
        'body' => 
        array (
          0 => 'Estas comparaciones ponen lado a lado dos modelos de este tipo con los datos de ficha que tienen fuente en los dos. Ninguna elige ganador: explican en qué se diferencian y según qué criterio conviene cada uno.',
          1 => 
          array (
            'list' => 
            array (
              0 => '[Kenton Bravo 125 vs Kenton Quick 125](/guias/kenton-bravo-125-vs-kenton-quick-125)',
              1 => '[Honda Navi 110 vs Kenton Bravo 125](/guias/honda-navi-110-vs-kenton-bravo-125)',
              2 => '[Kenton Quick 125 vs Kenton Spark 150](/guias/kenton-quick-125-vs-kenton-spark-150)',
            ),
          ),
        ),
      ),
      3 => 
      array (
        'h2' => 'Cómo elegir sin una respuesta única',
        'id' => 'como-elegir',
        'body' => 
        array (
          0 => 'No hay un modelo de este tipo que sirva para todos. Primero definí para qué la vas a usar y cuánto vas a andar por día; después descartá por los datos de la ficha que no se ajusten (altura del asiento, peso, tanque, frenos) y recién al final mirá el precio.',
          1 => 'Antes de comprar, andá a ver las que te quedaron: sentate, probá el freno y preguntá por la disponibilidad de repuestos y service en tu ciudad. Si el dato que te importa no figura en la ficha, pedilo por escrito al distribuidor en lugar de suponerlo.',
        ),
      ),
    ),
    'guides' => 
    array (
      0 => 'kenton-bravo-125-vs-kenton-quick-125',
      1 => 'honda-navi-110-vs-kenton-bravo-125',
      2 => 'kenton-quick-125-vs-kenton-spark-150',
      3 => 'como-comprar-tu-primera-moto',
      4 => 'moto-0-km-o-usada',
      5 => 'que-cilindrada-elegir',
      6 => 'motos-baratas-en-paraguay',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuántos modelos de scooter tiene el catálogo?',
        'a' => 'Hoy tiene 12 modelos de este tipo, de 4 marcas. El catálogo crece a medida que sumamos fichas con fuente, y las que no tienen datos suficientes no se publican como página propia.',
      ),
      1 => 
      array (
        'q' => '¿Los precios de esta página son actuales?',
        'a' => 'Esta página no muestra precios. En la página de cada modelo figura el precio publicado por el distribuidor con la fecha en que lo consultamos, y deja de mostrarse pasados 120 días sin volver a verificarlo.',
      ),
      2 => 
      array (
        'q' => '¿Cuál es la mejor scooter?',
        'a' => 'No hay una respuesta única: depende del uso, la altura, el presupuesto y el camino. Las comparativas de arriba explican en qué se diferencian dos modelos, según qué criterio, sin declarar ganador.',
      ),
    ),
    'updated' => '2026-10-01',
  ),
  'cub' => 
  array (
    'name' => 'Cub',
    'description' => 'Modelos de cub en Paraguay: 15 fichas con la fuente de cada dato, qué mirar para elegir y comparativas sin ganador inventado.',
    'intro' => 
    array (
      0 => 'La cub es la moto de cuadro bajo y cambios semiautomáticos, con embrague automático: no hay palanca de embrague. En el catálogo reúne modelos de 110 y 125 cc, entre otros.',
      1 => 'Armamos esta página con las cub que tienen ficha en el catálogo y con la fuente de cada dato. No decimos cuál es la mejor: te mostramos qué publica cada ficha para que compares con tu criterio.',
    ),
    'sections' => 
    array (
      0 => 
      array (
        'h2' => 'Qué mirar en la ficha',
        'id' => 'que-mirar',
        'body' => 
        array (
          0 => 'En una cub, estas son las filas de la ficha que más ayudan a decidir.',
          1 => 
          array (
            'list' => 
            array (
              0 => '**Cilindrada y potencia declarada:** entre 100 y 125 cc el rendimiento y el uso cambian. La ficha publica la cifra; no todas la miden igual.',
              1 => '**Transmisión y arranque:** cuántas velocidades declara, y si arranca con botón eléctrico, a pedal o con las dos opciones.',
              2 => '**Peso y tanque:** una cub liviana es cómoda en el día a día, y el tanque dice cuánto podés andar entre cargas.',
              3 => '**Neumáticos y frenos:** la medida y el tipo de freno delantero y trasero (tambor o disco) figuran en la ficha.',
            ),
          ),
        ),
      ),
      1 => 
      array (
        'h2' => 'Lo que muestra el catálogo',
        'id' => 'catalogo',
        'body' => 
        array (
          0 => 'Hoy el catálogo tiene **15 modelos** de este tipo, de 7 marcas: Kenton (4), Star (3), Buler (3), Leopard (2), Honda (1), Yamaha (1) y TVS (1).',
          1 => 'En cilindrada, los modelos con dato publicado van de 110 cc a 150 cc (14 fichas con el dato).',
          2 => 'En peso, las fichas que lo publican van de 90 kg a 100 kg (4 fichas).',
          3 => 'En tanque, de 3,5 a 4 litros entre las 4 fichas que lo publican.',
          4 => 'Del total que publica el freno delantero (5 modelos), 3 declaran disco.',
          5 => 'Son datos de las fichas, no una medición propia, y sólo cuentan los modelos cuya ficha publica ese dato. En la página de cada modelo, cuando existe, figura cada cifra con quién la publica y la fecha.',
        ),
      ),
      2 => 
      array (
        'h2' => 'Comparativas de cub',
        'id' => 'comparativas',
        'body' => 
        array (
          0 => 'Estas comparaciones ponen lado a lado dos modelos de este tipo con los datos de ficha que tienen fuente en los dos. Ninguna elige ganador: explican en qué se diferencian y según qué criterio conviene cada uno.',
          1 => 
          array (
            'list' => 
            array (
              0 => '[Leopard HB 125 Grand Tour vs Leopard HB1 110](/guias/leopard-hb-125-grand-tour-vs-leopard-hb1-110)',
              1 => '[Buler Urban 110 vs Leopard HB1 110](/guias/buler-urban-110-vs-leopard-hb1-110)',
              2 => '[Leopard HB1 110 vs Star Dax 110](/guias/leopard-hb1-110-vs-star-dax-110)',
            ),
          ),
        ),
      ),
      3 => 
      array (
        'h2' => 'Cómo elegir sin una respuesta única',
        'id' => 'como-elegir',
        'body' => 
        array (
          0 => 'No hay un modelo de este tipo que sirva para todos. Primero definí para qué la vas a usar y cuánto vas a andar por día; después descartá por los datos de la ficha que no se ajusten (altura del asiento, peso, tanque, frenos) y recién al final mirá el precio.',
          1 => 'Antes de comprar, andá a ver las que te quedaron: sentate, probá el freno y preguntá por la disponibilidad de repuestos y service en tu ciudad. Si el dato que te importa no figura en la ficha, pedilo por escrito al distribuidor en lugar de suponerlo.',
        ),
      ),
    ),
    'guides' => 
    array (
      0 => 'leopard-hb-125-grand-tour-vs-leopard-hb1-110',
      1 => 'buler-urban-110-vs-leopard-hb1-110',
      2 => 'leopard-hb1-110-vs-star-dax-110',
      3 => 'como-comprar-tu-primera-moto',
      4 => 'moto-0-km-o-usada',
      5 => 'que-cilindrada-elegir',
      6 => 'motos-baratas-en-paraguay',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => '¿Cuántos modelos de cub tiene el catálogo?',
        'a' => 'Hoy tiene 15 modelos de este tipo, de 7 marcas. El catálogo crece a medida que sumamos fichas con fuente, y las que no tienen datos suficientes no se publican como página propia.',
      ),
      1 => 
      array (
        'q' => '¿Los precios de esta página son actuales?',
        'a' => 'Esta página no muestra precios. En la página de cada modelo figura el precio publicado por el distribuidor con la fecha en que lo consultamos, y deja de mostrarse pasados 120 días sin volver a verificarlo.',
      ),
      2 => 
      array (
        'q' => '¿Cuál es la mejor cub?',
        'a' => 'No hay una respuesta única: depende del uso, la altura, el presupuesto y el camino. Las comparativas de arriba explican en qué se diferencian dos modelos, según qué criterio, sin declarar ganador.',
      ),
    ),
    'updated' => '2026-10-01',
  ),
);
