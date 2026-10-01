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
    /* == B2 == */
    /* B2:ported:start */
    'moto-0-km-o-usada' => [
        'group' => 'compra',
        'title' => '¿Moto 0 km o usada? Qué conviene según tu caso',
        'navLabel' => '¿Moto 0 km o usada? Qué conviene según tu caso',
        'seoTitle' => '¿Moto 0 km o usada? Qué conviene según tu caso',
        'metaDescription' => '¿Comprar moto 0 km o usada? Compará presupuesto, garantía, cuotas, papeles, mantenimiento y reventa para decidir según tu caso.',
        'query' => 'comprar moto 0km o usada',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => '¿Moto 0 km o usada? Qué conviene según tu caso',
            'lead' => 'Presupuesto, garantía, cuotas, papeles, mantenimiento y reventa: los criterios para decidir si te conviene comprar una moto 0 km o una usada.',
        ],
        'intro' => [
            '¿Te conviene comprar una moto 0 km o una usada? Depende de cuánto podés gastar, para qué la vas a usar y cuánto riesgo estás dispuesto a asumir. No hay una respuesta que sirva para todos, y desconfiá de quien te diga lo contrario.',
            'En esta guía no te damos precios ni rankings. Te damos los seis criterios que conviene mirar y las preguntas que tenés que hacer en cada caso, para que decidas con tus propios números.',
        ],
        'sections' => [
            [
                'h2' => '1. Tu presupuesto real',
                'id' => 'tu-presupuesto-real',
                'body' => [
                    'Empezá por lo que podés gastar, no por la moto que te gusta.',
                    [
                        'list' => [
                            '**Si pagás al contado,** con la misma plata una usada te puede dar una moto de más cilindrada o de un tipo que en 0 km no te alcanza. Pero ese ahorro puede irse en arreglos si la moto no está bien.',
                            '**Si la sacás en cuotas,** lo que importa es la cuota que podés pagar todos los meses, incluso en un mes flojo.',
                            'En los dos casos, sumá lo que viene después de la compra: habilitación municipal, seguro, casco, combustible y mantenimiento. Tenés una guía para hacer esa cuenta en [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
                        ],
                    ],
                    'Para tener una idea con datos reales, compará lo que piden por el mismo modelo en las [motos nuevas](/guias/precios-de-motos-0-km-en-paraguay) y en las motos usadas.',
                ],
            ],
            [
                'h2' => '2. Garantía',
                'id' => 'garantia',
                'body' => [
                    'Es una de las diferencias más grandes entre comprar una moto 0 km o usada.',
                    [
                        'list' => [
                            '**En una 0 km,** preguntale al comercio qué garantía trae, por cuánto tiempo o cuántos kilómetros, qué cubre y qué no, y dónde se hacen los services. Pedí las condiciones por escrito y guardalas junto con la factura.',
                            'Fijate qué te pide la garantía para mantenerse vigente, por ejemplo hacer los services en fecha y en un taller autorizado. Si el taller autorizado más cercano queda lejos, sumá ese viaje a la cuenta.',
                            '**En una usada de un particular,** en general no vas a tener una garantía del vendedor como la de un comercio. Lo que te protege es revisarla bien antes de pagar.',
                            '**Si comprás una usada en un comercio,** preguntá si te dan algún tipo de garantía, qué cubre y pedila por escrito.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '3. Cuotas y financiación',
                'id' => 'cuotas-y-financiacion',
                'body' => [
                    [
                        'list' => [
                            'Si querés comprar en cuotas, mirá las [motos en cuotas](/motos/en-cuotas): ahí ves qué motos ofrece cada comercio con financiación, con la entrega y la cuota que ese comercio informa. Si te interesa una usada, preguntá en el comercio si también la financian.',
                            'Antes de firmar, pedí el **costo total** (entrega más todas las cuotas) y comparalo con el precio al contado. La diferencia es lo que pagás por financiarla.',
                            'Preguntá qué pasa si te atrasás con una cuota.',
                            'Si comprás una usada a un particular, acordá con él la forma de pago y no pagues nada, ni siquiera una seña, antes de ver la moto y los papeles.',
                        ],
                    ],
                    'moto.com.py no otorga créditos ni garantiza aprobación: la condición final la define el comercio o la financiera. Leé antes [cómo funciona comprar una moto en cuotas](/guias/comprar-moto-en-cuotas-en-paraguay).',
                ],
            ],
            [
                'h2' => '4. Papeles',
                'id' => 'papeles',
                'body' => [
                    [
                        'list' => [
                            '**En una 0 km,** el comercio te entrega la factura y los papeles de la moto. Preguntá quién hace la primera inscripción a tu nombre, cuánto tarda y si el costo está incluido en el precio.',
                            '**En una usada,** los papeles son el punto donde más problemas aparecen. Antes de pagar, confirmá que la moto esté a nombre de quien te la vende, que los números de chasis y motor coincidan con los papeles y que no tenga prenda. Leé [qué papeles tiene que tener una moto al día](/guias/papeles-de-una-moto-al-dia) y [cómo transferir una moto en Paraguay](/guias/como-transferir-una-moto-en-paraguay).',
                            'Si una moto usada está muy barata y "los papeles están en trámite", no sigas hasta ver los comprobantes.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '5. Mantenimiento y estado',
                'id' => 'mantenimiento-y-estado',
                'body' => [
                    [
                        'list' => [
                            '**Una 0 km** arranca sin desgaste: cubiertas, cadena y frenos nuevos. Los primeros gastos suelen ser los services de la garantía.',
                            '**Una usada** puede estar impecable o necesitar arreglos pronto. Antes de comprar, revisala con calma o llevala a un taller de tu confianza. Tenés una lista en [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
                            'Con una usada, preguntá qué mantenimiento se le hizo y en qué taller. Si hay comprobantes, mejor.',
                            'En los dos casos, fijate que haya repuestos y un taller que conozca el modelo en tu ciudad.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '6. Reventa',
                'id' => 'reventa',
                'body' => [
                    'Pensá en el día que la quieras vender:',
                    [
                        'list' => [
                            'Una moto de una marca y modelo que se ven seguido en la calle, con repuestos fáciles de conseguir, suele ser más fácil de vender.',
                            'Una moto con papeles en orden, mantenimiento con comprobantes y buen estado se vende más fácil, sea que la compraste 0 km o usada.',
                            'Para ver cómo se mueven los precios de un modelo, mirá cuánto piden por ese mismo modelo de distintos años en las motos usadas.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Comprar moto 0 km o usada: cómo decidir en tu caso',
                'id' => 'comprar-moto-0-km-o-usada-como-decidir-en-tu-cas',
                'body' => [
                    'Hacete estas preguntas y anotá las respuestas:',
                    [
                        'ol' => [
                            '**¿Cuánto puedo pagar por mes, contando todos los gastos, no sólo la cuota?**',
                            '**¿Necesito que la moto ande sin problemas desde el primer día,** por ejemplo porque la uso para trabajar? Ahí la garantía de una 0 km pesa más. Si es tu caso, leé [qué moto conviene para trabajar](/guias/que-moto-conviene-para-trabajar).',
                            '**¿Tengo a alguien que sepa de motos** para revisar una usada conmigo? Si no, la usada es más riesgosa.',
                            '**¿Puedo pagar al contado?** Si sí, una usada bien revisada puede rendirte más. Si no, fijate qué opciones en cuotas hay para la moto que buscás.',
                            '**¿Cuánto tiempo la pienso tener?** Si la vas a usar muchos años, lo que pagás de más por una 0 km se reparte en más tiempo.',
                        ],
                    ],
                    'Si la mayoría de tus respuestas apuntan a seguridad y previsibilidad, probablemente te convenga una 0 km. Si apuntan a gastar menos y tenés cómo revisar bien la moto, una usada puede ser una buena opción.',
                ],
            ],
            [
                'h2' => 'Seguí buscando',
                'id' => 'segui-buscando',
                'body' => [
                    [
                        'list' => [
                            'Mirá las [motos nuevas publicadas](/guias/precios-de-motos-0-km-en-paraguay) por los comercios.',
                            [
                                'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía moto-0-km-o-usada)',
                            ],
                            'Si te decidiste por financiarla, mirá las [motos en cuotas](/motos/en-cuotas).',
                            'Si no sabés qué cilindrada te sirve, leé [125, 150 o 200 cc: cuál elegir](/guias/125-150-o-200-cc-cual-elegir).',
                        ],
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    '125-150-o-200-cc-cual-elegir' => [
        'group' => 'compra',
        'title' => '125, 150 o 200 cc: cuál te sirve',
        'navLabel' => '125, 150 o 200 cc: cuál te sirve',
        'seoTitle' => '125, 150 o 200 cc: cuál te sirve',
        'metaDescription' => '125, 150 o 200 cc: cómo elegir la cilindrada de tu moto según el uso, el consumo, el precio y el registro. Criterios claros, sin vueltas.',
        'query' => 'que cilindrada de moto elegir',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => '125, 150 o 200 cc: cuál te sirve',
            'lead' => 'Cómo elegir la cilindrada según para qué vas a usar la moto: ciudad, ruta, dos personas, carga, consumo, precio y el registro que necesitás.',
        ],
        'intro' => [
            'Si no sabés qué cilindrada de moto elegir, no estás solo: es lo primero que mirás en una moto, y no hay una que sea "la mejor". Hay una que te sirve para lo que vas a hacer todos los días. Esta guía no compara modelos: te da criterios para que decidas vos entre 125, 150 o 200 cc, y te dice qué confirmar antes de comprar.',
            'Los datos técnicos cambian de un modelo a otro aunque tengan la misma cilindrada. Por eso, cada vez que haga falta un número, te decimos dónde buscarlo: la ficha técnica del fabricante, el manual o el comercio.',
        ],
        'sections' => [
            [
                'h2' => 'Qué cambia cuando sube la cilindrada',
                'id' => 'que-cambia-cuando-sube-la-cilindrada',
                'body' => [
                    'En términos generales, más cilindrada significa más fuerza para acelerar y sostener velocidad, pero también una moto más pesada, más cara y que gasta más. No es una regla exacta: dos motos de 150 cc pueden ser muy distintas según el tipo de moto, el peso y cómo está armado el motor.',
                    'Por eso conviene pensar primero en el uso y después en el número.',
                ],
            ],
            [
                'h2' => 'Si la usás en la ciudad',
                'id' => 'si-la-usas-en-la-ciudad',
                'body' => [
                    'Para ir y volver del trabajo, hacer mandados o moverte en el tránsito de Asunción y alrededores, lo que más pesa es que la moto sea liviana, fácil de estacionar y barata de mantener.',
                    [
                        'list' => [
                            'Una moto chica te cansa menos en el tráfico de todos los días.',
                            'Las motos tipo [cub](/motos/tipo/cub) y las [scooter](/motos/tipo/scooter) suelen estar pensadas para este uso. La cilindrada exacta varía según el modelo: fijate en la ficha de cada una.',
                            'Si hacés delivery o muchos kilómetros por día, el consumo y el costo de los repuestos importan más que la potencia. Mirá también [qué moto conviene para trabajar](/guias/que-moto-conviene-para-trabajar).',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Si salís a la ruta',
                'id' => 'si-salis-a-la-ruta',
                'body' => [
                    'Si vas a hacer tramos largos entre ciudades, una moto con más cilindrada suele sostener mejor la velocidad sin ir exigida todo el tiempo, y te deja más margen para pasar a un camión.',
                    [
                        'list' => [
                            'Las [motos naked](/motos/tipo/naked) de mediana cilindrada son una opción común para quien combina ciudad y ruta.',
                            'Si vas a andar por caminos de tierra o empedrado, mirá las [motos enduro y cross](/motos/tipo/enduro-cross): la suspensión y las cubiertas importan tanto como el motor.',
                            'Antes de salir a la ruta, respetá la señalización de velocidad de cada tramo y usá siempre el casco. Si tu moto no llega cómoda a la velocidad del tránsito de la ruta, es una señal de que te queda chica para ese uso.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Si van dos personas o llevás carga',
                'id' => 'si-van-dos-personas-o-llevas-carga',
                'body' => [
                    'Con acompañante o con carga, la moto trabaja más: tarda más en arrancar, frena distinto y el motor va más exigido.',
                    [
                        'list' => [
                            'Fijate en el manual o en la ficha técnica el peso máximo que admite la moto (piloto, acompañante y carga juntos). Si el comercio no lo tiene a mano, pedile que lo consulte con el representante de la marca.',
                            'Si vas a llevar acompañante seguido, probá la moto con dos personas antes de comprar.',
                            'Para carga pesada existen los [motocarros](/motos/tipo/motocarro-carga), que están pensados para eso.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'El consumo',
                'id' => 'el-consumo',
                'body' => [
                    'No te podemos dar un número confiable de consumo por cilindrada: depende del modelo, del estado del motor, de cómo manejás y de si vas en ciudad o en ruta. Pedí el consumo que declara el fabricante en la ficha técnica y preguntale al comercio o al vendedor cuánto gasta en el uso real. Tomalo como referencia, no como promesa.',
                ],
            ],
            [
                'h2' => 'El precio y los costos fijos',
                'id' => 'el-precio-y-los-costos-fijos',
                'body' => [
                    'La cilindrada influye en el precio de la moto, pero también en lo que pagás después.',
                    [
                        'list' => [
                            '**Precio de compra:** comparalo entre motos parecidas publicadas, no contra un número que escuchaste. Mirá las [motos nuevas](/guias/precios-de-motos-0-km-en-paraguay) y las motos usadas de la misma cilindrada y del mismo tipo.',
                            '**Habilitación municipal:** es un pago anual en la municipalidad. Antes de comprar, preguntá en la tuya cómo se calcula el monto para la moto que querés.',
                            '**Seguro:** pedí cotización en al menos dos aseguradoras con la marca, el modelo y el año exactos, y preguntá qué datos de la moto cambian el precio.',
                            '**Mantenimiento:** cubiertas, cadena y repuestos suelen ser más caros en motos más grandes. Tenés más detalle en [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
                        ],
                    ],
                    'Si la vas a sacar en cuotas, calculá la cuota junto con estos gastos fijos, no sola. Podés ver las [motos en cuotas](/motos/en-cuotas) y leer [cómo funciona comprar una moto en cuotas](/guias/comprar-moto-en-cuotas-en-paraguay). moto.com.py no otorga créditos ni garantiza aprobación: la condición la define el comercio o la financiera.',
                ],
            ],
            [
                'h2' => 'El registro que necesitás',
                'id' => 'el-registro-que-necesitas',
                'body' => [
                    'Antes de elegir, confirmá que tu registro te habilita para la moto que querés. Preguntalo en la oficina de registros de tu municipalidad, con la cilindrada de la moto anotada. Si todavía no tenés registro, preguntá ahí mismo qué necesitás para sacarlo. Si recién empezás a manejar, esto puede decidir la compra por vos.',
                ],
            ],
            [
                'h2' => 'Qué cilindrada de moto elegir: una forma simple de decidir',
                'id' => 'que-cilindrada-de-moto-elegir-una-forma-simple-d',
                'body' => [
                    [
                        'ol' => [
                            'Anotá para qué la vas a usar la mayor parte del tiempo, no el viaje que hacés una vez al año.',
                            'Anotá si vas a llevar acompañante o carga seguido.',
                            'Confirmá en la municipalidad que tu registro te habilita para esa moto.',
                            'Sumá precio, habilitación, seguro y mantenimiento.',
                            'Probá al menos dos motos de cilindradas distintas antes de decidir.',
                        ],
                    ],
                    'Si después de estos pasos seguís entre dos opciones, quedate con la que te resulte más cómoda de manejar en tu recorrido de todos los días. Es la que más vas a usar.',
                ],
            ],
            [
                'h2' => 'Seguí buscando',
                'id' => 'segui-buscando',
                'body' => [
                    [
                        'list' => [
                            'Mirá las [motos nuevas](/guias/precios-de-motos-0-km-en-paraguay) y compará fichas técnicas dentro de la misma cilindrada.',
                            'Si preferís una usada, fijate en las motos usadas publicadas y leé [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
                            'Si dudás entre nueva y usada, leé [moto 0 km o usada: qué conviene según tu caso](/guias/moto-0-km-o-usada).',
                        ],
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    'que-moto-conviene-para-trabajar' => [
        'group' => 'compra',
        'title' => 'Qué moto conviene para trabajar (delivery y ciudad)',
        'navLabel' => 'Qué moto conviene para trabajar (delivery y ciudad)',
        'seoTitle' => 'Qué moto conviene para trabajar (delivery y ciudad)',
        'metaDescription' => 'Qué moto conviene para delivery y trabajo en la ciudad: cómo comparar consumo, repuestos, talleres, carga, comodidad y cuotas antes de elegir.',
        'query' => 'mejor moto para delivery paraguay',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Qué moto conviene para trabajar (delivery y ciudad)',
            'lead' => 'Los criterios que importan cuando la moto es tu herramienta de trabajo: consumo, repuestos, taller cerca, carga, comodidad y cuota que podés pagar.',
        ],
        'intro' => [
            'Si buscás una moto para delivery en Paraguay, pensá que cada día que la moto está parada es un día que no cobrás. Por eso la pregunta no es cuál es la moto más linda, sino cuál te da menos problemas y te cuesta menos por kilómetro.',
            'No hay una "mejor moto para delivery" que sirva para todos: depende de cuántos kilómetros hacés, qué llevás, por dónde andás y cuánto podés pagar por mes. En esta guía no te vamos a dar un ranking; te damos los criterios para que compares vos, y te decimos a quién preguntarle cada dato.',
        ],
        'sections' => [
            [
                'h2' => 'Cómo elegir moto para delivery: los criterios que importan',
                'id' => 'como-elegir-moto-para-delivery-los-criterios-que',
                'body' => [
                    'Estos son los siete puntos que conviene mirar antes de decidir. Anotá lo que te respondan en cada comercio o taller, así comparás con números y no de memoria.',
                ],
            ],
            [
                'h2' => '1. Consumo de combustible',
                'id' => 'consumo-de-combustible',
                'body' => [
                    'Si hacés muchos kilómetros por día, el combustible es uno de los gastos que más vas a sentir. Anotalo junto con la cuota y el mantenimiento para ver cuál pesa más en tu caso.',
                    [
                        'list' => [
                            'Preguntá el consumo en kilómetros por litro y de dónde sale ese dato: de la ficha técnica del fabricante o de alguien que usa esa moto todos los días. Los dos números pueden ser bastante distintos.',
                            'Compará el consumo junto con lo que le vas a pedir a la moto. Si vas siempre cargado o salís seguido a la ruta, una moto chica va más exigida. Preguntale a un taller cómo se porta ese modelo con carga.',
                            'Si ya trabajás con una moto, anotá cuánto cargás por semana y cuántos kilómetros hacés. Es el mejor dato que vas a tener.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '2. Repuestos que se consigan',
                'id' => 'repuestos-que-se-consigan',
                'body' => [
                    'Una moto que se rompe un lunes tiene que estar andando el martes. Antes de elegir:',
                    [
                        'list' => [
                            'Preguntá en dos o tres casas de repuestos de tu ciudad si tienen pastillas de freno, kit de transmisión (cadena, piñón y corona), cubiertas y filtros para ese modelo, y a qué precio. Anotá las respuestas.',
                            'Preguntá también si hay repuestos alternativos (no originales) y qué diferencia de precio y duración tienen.',
                            'Desconfiá de un modelo que nadie en tu ciudad conoce, por más barato que sea.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '3. Un taller que la conozca',
                'id' => 'un-taller-que-la-conozca',
                'body' => [
                    'No alcanza con que haya repuestos: alguien tiene que saber arreglarla.',
                    [
                        'list' => [
                            'Preguntale al taller de tu confianza qué modelos atiende seguido y cuáles le cuestan.',
                            'Si es 0 km, preguntale al comercio dónde se hacen los services de la garantía y si hay un taller autorizado en tu ciudad o cerca. Si el más cercano queda lejos, sumá ese viaje a la cuenta.',
                            'Pedí las condiciones de la garantía por escrito y fijate si dicen algo sobre el uso comercial o de delivery. Si no lo dicen, preguntalo antes de firmar y pedí que la respuesta quede por escrito.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '4. Carga: qué vas a llevar',
                'id' => 'carga-que-vas-a-llevar',
                'body' => [
                    'Pensá en lo que llevás un día normal, no en el mejor día.',
                    [
                        'list' => [
                            '**Comida y paquetes chicos:** una moto tipo [cub o motoneta semiautomática](/motos/tipo/cub) o una [naked de uso urbano](/motos/tipo/naked) con portaequipaje y caja suele alcanzar. Fijate que el portaequipaje aguante la caja que te pide la aplicación o el comercio: la carga máxima figura en el manual o en la ficha técnica del modelo.',
                            '**Bultos, garrafas o mercadería:** ahí conviene mirar un [motocarro de carga](/motos/tipo/motocarro-carga), que está pensado para eso. Preguntá la capacidad de carga, y consultá en la municipalidad donde tramitás tu registro si para manejarlo te piden un registro distinto al que ya tenés.',
                            'No cargues más de lo que dice el fabricante: se gastan antes los frenos, la cadena y las cubiertas, y es peligroso.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '5. Comodidad para muchas horas',
                'id' => 'comodidad-para-muchas-horas',
                'body' => [
                    'Si vas a estar arriba de la moto ocho horas o más:',
                    [
                        'list' => [
                            'Probala antes. Sentate, fijate si llegás bien al piso y si el asiento te aguanta un rato.',
                            'Mirá la posición de manejo: si vas muy inclinado hacia adelante, al final del día lo vas a sentir.',
                            'Preguntá si el modelo trae arranque eléctrico y si los cambios son manuales o semiautomáticos. En el tráfico de la ciudad hace diferencia.',
                            'La suspensión importa si tus calles tienen empedrado o baches.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '6. La cuota que podés pagar',
                'id' => 'la-cuota-que-podes-pagar',
                'body' => [
                    'Muchos arrancan a trabajar con una moto en cuotas. Antes de firmar:',
                    [
                        'list' => [
                            'Pedí el **costo total**: entrega más todas las cuotas. Comparalo con el precio al contado.',
                            'Hacé la cuenta de lo que te queda por mes: lo que ganás, menos combustible, mantenimiento y la cuota. Si no cierra con un mes flojo, es mucha cuota.',
                            'Preguntá qué pasa si te atrasás un mes.',
                        ],
                    ],
                    'En las [motos en cuotas](/motos/en-cuotas) vas a ver las que publican los comercios con la entrega y la cuota que ellos informan. Nosotros no calculamos ni prometemos cuotas, no otorgamos créditos ni garantizamos la aprobación: la condición final la define el comercio o la financiera. Tenés más detalle en [cómo funciona comprar una moto en cuotas](/guias/comprar-moto-en-cuotas-en-paraguay).',
                ],
            ],
            [
                'h2' => '7. 0 km o usada',
                'id' => '0-km-o-usada',
                'body' => [
                    'Una usada cuesta menos al principio, pero si la vas a exprimir, fijate bien el estado del motor, la cadena y los frenos. Una 0 km trae garantía, pero una cuota más alta. No hay una respuesta única: hacé la cuenta con los números que te den. Si estás entre las dos, leé [moto 0 km o usada: qué conviene según tu caso](/guias/moto-0-km-o-usada).',
                ],
            ],
            [
                'h2' => 'Antes de salir a trabajar',
                'id' => 'antes-de-salir-a-trabajar',
                'body' => [
                    'Si la moto es tu herramienta, tenerla en regla también es parte del trabajo. Antes de tomar el primer pedido, revisá:',
                    [
                        'list' => [
                            'Los papeles de la moto y la habilitación municipal al día. Si no sabés cuáles son, mirá [qué papeles tiene que tener una moto al día](/guias/papeles-de-una-moto-al-dia).',
                            'Tu registro vigente. Si vas a cobrar por llevar cosas, consultá en la oficina de registros de tu municipalidad qué registro te corresponde para ese trabajo antes de empezar.',
                            'Un seguro que te cubra si tenés un accidente con otra persona. Podés pedir información en [seguros para motos](/guias/seguro-contra-terceros-para-motos).',
                            'Casco puesto, siempre, aunque sea una entrega de dos cuadras.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Seguí buscando',
                'id' => 'segui-buscando',
                'body' => [
                    [
                        'list' => [
                            'Si no sabés qué cilindrada te sirve, leé [125, 150 o 200 cc: cuál elegir](/guias/125-150-o-200-cc-cual-elegir).',
                            'Para calcular el gasto mensual, mirá [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
                            'Si vas por una usada, recorré las motos usadas publicadas y antes de ir a verla leé [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
                        ],
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    'como-comprar-una-moto-usada-sin-que-te-estafen' => [
        'group' => 'compra',
        'title' => 'Cómo comprar una moto usada sin que te estafen',
        'navLabel' => 'Cómo comprar una moto usada sin que te estafen',
        'seoTitle' => 'Cómo comprar una moto usada sin que te estafen',
        'metaDescription' => 'Cómo comprar una moto usada en Paraguay sin que te estafen: señales de fraude, cómo encontrarte con el vendedor y cómo pagar sin riesgo.',
        'query' => 'comprar moto usada paraguay',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Cómo comprar una moto usada sin que te estafen',
            'lead' => 'Las trampas más comunes al comprar una moto usada, cómo encontrarte con el vendedor sin riesgo y cómo pagar para no perder la plata.',
        ],
        'intro' => [
            'Una moto usada puede ser una buena compra, pero los clasificados de motos también atraen estafadores, y casi todas las estafas se repiten con el mismo libreto. Si lo conocés, lo ves venir.',
            'Una aclaración antes de empezar: moto.com.py no tiene las motos, no verifica su estado mecánico ni a nombre de quién están, y no interviene en los pagos.',
        ],
        'sections' => [
            [
                'h2' => 'La regla corta',
                'id' => 'la-regla-corta',
                'body' => [
                    'Antes de pagar: andá a ver la moto en persona, revisá que los papeles coincidan con el vendedor, no transfieras plata por adelantado y desconfiá de los precios muy por debajo de lo normal.',
                ],
            ],
            [
                'h2' => 'Las trampas más comunes',
                'id' => 'las-trampas-mas-comunes',
                'body' => [
                    '**El vendedor que "está en el exterior"**',
                    'Te dice que está en Brasil o en Argentina, que te manda la moto y que sólo tenés que señar primero. El precio suele ser bajísimo. No hay moto: hay alguien esperando tu transferencia. Si no podés ver la moto, no hay compra.',
                    '**La seña antes de ver la moto**',
                    '"Reservala con una transferencia, que hay otros interesados." El apuro es parte del truco. No mandes plata por una moto que no viste, aunque sea un monto chico.',
                    '**El precio anzuelo**',
                    'La publicación tiene un precio que llama la atención y, cuando escribís, aparece otro, o "esa ya se vendió pero tengo otra". Compará con motos usadas del mismo modelo y año: si una está muy por debajo del resto, preguntate por qué.',
                    '**La moto robada**',
                    'Suele venir sin papeles, con precio bajo, apuro por cerrar y fotos malas. Fijate que los números de chasis y de motor grabados en la moto sean iguales a los de los papeles; si están limados, repintados o no coinciden, no sigas. Antes de firmar, pedí el informe del Registro sobre la moto. Si tenés dudas sobre el origen de la moto, preguntá en la comisaría de tu zona cómo verificar si tiene denuncia de robo antes de pagar.',
                    '**Los papeles "en trámite"**',
                    'Transferencia pendiente, deuda de habilitación municipal o multas, y la promesa de que "eso se arregla después". Pedí ver los comprobantes; si no hay ninguno, puede que la moto no se pueda transferir limpia. Te lo explicamos en [qué papeles tiene que tener una moto al día](/guias/papeles-de-una-moto-al-dia).',
                    '**El que se hace pasar por comercio**',
                    'Alguien usa el nombre de un comercio conocido para darte confianza. Si alguien te dice que es de un comercio, comprobá por otro medio que sea de ese comercio antes de mandar plata.',
                    '**El falso crédito**',
                    'Te ofrecen financiación y te piden foto de tu cédula, datos bancarios o un pago por "gastos administrativos" antes de ver ningún contrato.',
                ],
            ],
            [
                'h2' => 'Cómo encontrarte con el vendedor',
                'id' => 'como-encontrarte-con-el-vendedor',
                'body' => [
                    [
                        'list' => [
                            '**De día y en un lugar con gente.** Nada de encuentros en lugares aislados o de noche.',
                            '**Acompañado,** y avisale a alguien a dónde vas.',
                            '**Con el dueño.** El que te muestra la moto tiene que ser el que figura en los papeles. Si "después te firma el dueño", desconfiá.',
                            '**Con alguien que sepa.** Si no entendés de mecánica, llevá a alguien que sí o pedí revisarla en un taller de tu confianza. Te sirve [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
                            '**Para probarla,** llevá tu casco y tu licencia, y manejala vos.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Cómo pagar',
                'id' => 'como-pagar',
                'body' => [
                    [
                        'ol' => [
                            '**Nunca antes de ver la moto y los papeles.** Ni seña, ni reserva, ni "para el flete".',
                            '**Pagá cuando se firma la compraventa,** no antes. El orden del trámite está en [cómo transferir una moto en Paraguay](/guias/como-transferir-una-moto-en-paraguay). Antes de ir, preguntale al escribano o al Registro qué documento hace falta para tu caso.',
                            '**Que el pago quede registrado.** Si pagás por transferencia, que la cuenta esté a nombre del dueño que figura en los papeles; si es otro nombre, pará. En efectivo, nunca en la calle.',
                            '**Pedí un recibo firmado** con los datos de la moto (chasis, motor y chapa) y guardá copia de todo.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Si algo no te cierra',
                'id' => 'si-algo-no-te-cierra',
                'body' => [
                    [
                        'list' => [
                            [
                                'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía como-comprar-una-moto-usada-sin-que-te-estafen)',
                            ],
                            'Si ya perdiste plata, hacé la denuncia cuanto antes y llevá las capturas de los mensajes y los comprobantes de pago. Podés empezar por la comisaría más cercana: ahí te dicen cómo sigue la denuncia.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Seguí buscando',
                'id' => 'segui-buscando',
                'body' => [
                    [
                        'list' => [
                            [
                                'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía como-comprar-una-moto-usada-sin-que-te-estafen)',
                            ],
                            'Si preferís comprar a un comercio, fijate en las [motos 0 km](/guias/precios-de-motos-0-km-en-paraguay).',
                            'Si no tenés el total, mirá las [motos en cuotas](/motos/en-cuotas).',
                        ],
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    'que-revisar-antes-de-comprar-una-moto-usada' => [
        'group' => 'compra',
        'title' => 'Qué revisar antes de comprar una moto usada (checklist)',
        'navLabel' => 'Qué revisar antes de comprar una moto usada (checklist)',
        'seoTitle' => 'Qué revisar antes de comprar una moto usada (checklist)',
        'metaDescription' => 'Qué revisar en una moto usada antes de comprarla: papeles, chasis y motor, arranque en frío, cadena, cubiertas, frenos y prueba. Checklist paso a paso.',
        'query' => 'que revisar moto usada',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Qué revisar antes de comprar una moto usada (checklist)',
            'lead' => 'Un checklist para llevar cuando vas a ver una moto usada: papeles, números de chasis y motor, arranque en frío, pérdidas, cadena, cubiertas, frenos y prueba de manejo.',
        ],
        'intro' => [
            'Una moto usada puede ser una buena compra o un problema caro. La diferencia casi siempre está en lo que revisaste antes de pagar. Este checklist te sirve para llevarlo en el celular cuando vas a ver una moto.',
            'No reemplaza a un mecánico: si no te sentís seguro, llevá a alguien de un taller de confianza. Y nosotros no revisamos el estado de las motos publicadas, así que la revisión la hacés vos.',
        ],
        'sections' => [
            [
                'h2' => 'Antes de ir',
                'id' => 'antes-de-ir',
                'body' => [
                    [
                        'list' => [
                            'Pedile al vendedor que **no encienda la moto antes de que llegues**. Querés verla arrancar en frío.',
                            'Pedile fotos de los papeles o, por lo menos, que te confirme que están a su nombre.',
                            'Acordá verla de día, en un lugar donde puedas mirarla con calma.',
                            'No mandes plata por adelantado para "reservarla". Leé [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '1. Los papeles',
                'id' => 'los-papeles',
                'body' => [
                    [
                        'list' => [
                            'Los papeles de la moto están a nombre de quien te la vende.',
                            'El nombre coincide con su cédula de identidad.',
                            'La habilitación municipal está al día.',
                            'No tiene prenda, embargo ni deudas pendientes. Eso se confirma con un informe del Registro de Automotores: preguntá en la oficina cómo pedirlo y cuánto cuesta hoy.',
                        ],
                    ],
                    'Tenés el detalle en [qué papeles tiene que tener una moto al día](/guias/papeles-de-una-moto-al-dia) y en [cómo transferir una moto en Paraguay](/guias/como-transferir-una-moto-en-paraguay).',
                ],
            ],
            [
                'h2' => '2. Números de chasis y de motor',
                'id' => 'numeros-de-chasis-y-de-motor',
                'body' => [
                    [
                        'list' => [
                            'El número de chasis grabado en el cuadro es igual al de los papeles.',
                            'El número de motor grabado en el motor es igual al de los papeles.',
                            'Ninguno de los dos está limado, repintado, soldado o tapado con calcomanías.',
                        ],
                    ],
                    'Si algo no coincide, no sigas, por más que el precio te guste. Si no encontrás dónde están grabados los números, el manual de la moto o un taller de la marca te lo muestran.',
                ],
            ],
            [
                'h2' => '3. Arranque en frío',
                'id' => 'arranque-en-frio',
                'body' => [
                    [
                        'list' => [
                            'Tocá el motor antes de encenderlo: tiene que estar frío.',
                            'Arranca sin tener que insistir mucho, con el arranque eléctrico y con la patada si la tiene.',
                            'El ralentí queda parejo, sin que se apague.',
                            'No hace ruidos metálicos, golpeteos ni chirridos raros.',
                            'No sale humo azulado ni humo blanco espeso y persistente por el escape.',
                        ],
                    ],
                    'Un motor que sólo arranca "si ya estaba caliente" merece una revisión en el taller antes de comprar.',
                ],
            ],
            [
                'h2' => '4. Pérdidas',
                'id' => 'perdidas',
                'body' => [
                    [
                        'list' => [
                            'No hay aceite debajo de la moto ni en el motor.',
                            'Las barras de la horquilla delantera están limpias, sin aceite (si tienen aceite, los retenes pueden estar gastados).',
                            'El amortiguador trasero no pierde.',
                            'No hay olor a nafta ni goteo cerca del tanque o del carburador.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '5. Cadena, corona y piñón',
                'id' => 'cadena-corona-y-pinon',
                'body' => [
                    [
                        'list' => [
                            'La cadena no está floja de más ni oxidada.',
                            'Los dientes de la corona no están puntiagudos ni torcidos.',
                            'Si tirás de la cadena hacia atrás en la corona y se separa mucho, está estirada.',
                        ],
                    ],
                    'Si hay que cambiar el kit de arrastre, es un gasto que conviene descontar del precio. Pedí el precio en una casa de repuestos o en un taller antes de cerrar el trato.',
                ],
            ],
            [
                'h2' => '6. Cubiertas',
                'id' => 'cubiertas',
                'body' => [
                    [
                        'list' => [
                            'Les queda dibujo, parejo en todo el ancho.',
                            'No tienen grietas, cortes ni bultos en los costados.',
                            'Fijate la fecha de fabricación grabada en el costado: una cubierta vieja se endurece aunque tenga dibujo. Si no sabés leer esa fecha, en una gomería te la leen en un minuto y te dicen si conviene cambiarla.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '7. Frenos',
                'id' => 'frenos',
                'body' => [
                    [
                        'list' => [
                            'La palanca y el pedal frenan firme, sin irse hasta el fondo.',
                            'Las pastillas o las cintas tienen material.',
                            'El disco no tiene surcos profundos ni está torcido.',
                            'Si tiene freno hidráulico, el líquido no está oscuro ni por debajo del mínimo.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '8. Suspensión y dirección',
                'id' => 'suspension-y-direccion',
                'body' => [
                    [
                        'list' => [
                            'Al apretar la moto adelante, la horquilla baja y sube suave, sin golpear.',
                            'Atrás pasa lo mismo con el amortiguador.',
                            'El manubrio gira de lado a lado sin trabarse ni hacer "clac" en el centro.',
                            'El cuadro no tiene soldaduras raras ni partes torcidas, señal de un choque.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '9. Parte eléctrica',
                'id' => 'parte-electrica',
                'body' => [
                    [
                        'list' => [
                            'Funcionan la luz baja, la alta, la de freno (con palanca y con pedal) y los giros.',
                            'Funciona la bocina.',
                            'El tablero marca: velocímetro, cuentakilómetros y testigos.',
                            'La batería arranca la moto sin quedarse corta.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '10. Kilometraje y estado general',
                'id' => 'kilometraje-y-estado-general',
                'body' => [
                    [
                        'list' => [
                            'Los kilómetros del tablero tienen sentido con el desgaste de puños, pedales, asiento y cubiertas.',
                            'El vendedor te muestra comprobantes de mantenimiento o te dice en qué taller se atendía.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => '11. Prueba de manejo',
                'id' => 'prueba-de-manejo',
                'body' => [
                    'Andá con casco y con tu registro, y con el vendedor presente.',
                    [
                        'list' => [
                            'Las marchas entran bien, sin saltar ni hacer ruido.',
                            'El embrague no patina: al acelerar, la moto responde y no sólo sube el ruido del motor.',
                            'Frena derecha, sin tirar para un lado.',
                            'Después de la prueba, volvé a mirar debajo por si aparecieron pérdidas.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Si algo no te cierra',
                'id' => 'si-algo-no-te-cierra',
                'body' => [
                    'Una falla no siempre significa "no la compres": puede ser un arreglo que se descuenta del precio. Lo que no se negocia son los papeles y los números de chasis y motor.',
                ],
            ],
            [
                'h2' => 'Seguí buscando',
                'id' => 'segui-buscando',
                'body' => [
                    [
                        'list' => [
                            [
                                'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía que-revisar-antes-de-comprar-una-moto-usada)',
                            ],
                            'Si preferís no arriesgar con una usada, fijate en las [motos nuevas](/guias/precios-de-motos-0-km-en-paraguay) o en las [motos en cuotas](/motos/en-cuotas).',
                        ],
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    'cuanto-vale-mi-moto-usada' => [
        'group' => 'compra',
        'title' => 'Cuánto vale mi moto usada: cómo ponerle un precio justo',
        'navLabel' => 'Cuánto vale mi moto usada: cómo ponerle un precio justo',
        'seoTitle' => 'Cuánto vale mi moto usada: cómo ponerle un precio justo',
        'metaDescription' => 'Cuánto vale mi moto usada: cómo calcular un precio justo comparando motos parecidas por marca, modelo, año y km, estado y papeles.',
        'query' => 'cuanto vale mi moto usada',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Cuánto vale mi moto usada: cómo ponerle un precio justo',
            'lead' => 'Un método simple para ponerle precio a tu moto usada comparando con motos parecidas publicadas, según estado, papeles y margen para negociar.',
        ],
        'intro' => [
            '"¿Cuánto vale mi moto usada?" es lo primero que te preguntás cuando decidís venderla. No hay un número único que sirva para todas: en la práctica, el precio lo define lo que los compradores están dispuestos a pagar por una moto como la tuya, hoy y en tu zona. Lo que sí podés hacer es llegar a un precio justo con un método ordenado.',
            'En esta guía no te damos precios de mercado ni porcentajes de cuánto pierde una moto por año, porque cambian según el modelo y el momento. Te damos los pasos para que lo calcules vos con datos reales.',
        ],
        'sections' => [
            [
                'h2' => 'Paso 1: juntá los datos de tu moto',
                'id' => 'paso-1-junta-los-datos-de-tu-moto',
                'body' => [
                    'Antes de comparar, tené a mano lo que el comprador te va a preguntar:',
                    [
                        'list' => [
                            '**Marca y modelo exactos**, como figuran en los papeles, no el nombre que le dicen en la calle.',
                            '**Año** del modelo.',
                            '**Kilometraje** que marca el tablero.',
                            '**Cilindrada.**',
                            '**Estado de los papeles:** si están a tu nombre, si la habilitación municipal está al día y si la moto tiene prenda. Si no sabés qué revisar, leé [qué papeles tiene que tener una moto al día](/guias/papeles-de-una-moto-al-dia).',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Paso 2: buscá motos parecidas publicadas',
                'id' => 'paso-2-busca-motos-parecidas-publicadas',
                'body' => [
                    'La mejor referencia es lo que piden hoy por motos como la tuya. Buscá avisos de motos usadas publicadas y filtrá:',
                    [
                        'ol' => [
                            '**Misma marca y modelo.** Una moto de otra marca con la misma cilindrada no te sirve como referencia directa.',
                            '**Año cercano.** Si no hay del mismo año, mirá uno o dos años para cada lado y tenelo en cuenta.',
                            '**Kilometraje parecido.** Dos motos del mismo año pueden valer distinto si una tiene mucho más uso.',
                        ],
                    ],
                    'Anotá los precios de todas las que encuentres, no sólo de una. Una sola publicación puede estar muy alta o muy baja por razones que no conocés. Si encontrás pocas, ampliá la búsqueda a todo el país o mirá también modelos muy parecidos de la misma marca, con cuidado.',
                    'Tené en cuenta que el precio publicado es lo que pide el vendedor, no lo que finalmente cobró. Es un punto de partida, no el valor final.',
                ],
            ],
            [
                'h2' => 'Paso 3: mirá el precio de la 0 km',
                'id' => 'paso-3-mira-el-precio-de-la-0-km',
                'body' => [
                    'Si el modelo todavía se vende nuevo, fijate cuánto piden los comercios en las [motos nuevas](/guias/precios-de-motos-0-km-en-paraguay). Te sirve como techo: si tu precio queda muy cerca del de la misma moto 0 km, con garantía y sin uso, es muy probable que el comprador prefiera la nueva.',
                ],
            ],
            [
                'h2' => 'Paso 4: ajustá por el estado de tu moto',
                'id' => 'paso-4-ajusta-por-el-estado-de-tu-moto',
                'body' => [
                    'Con los precios anotados, ubicá tu moto dentro de ese grupo. Pensá con honestidad en qué está mejor y en qué está peor que las otras:',
                    [
                        'list' => [
                            '**Motor y mantenimiento:** si arranca bien, no hace ruidos raros y tenés comprobantes de los services en un taller, suma.',
                            '**Cubiertas, cadena y frenos:** si hay que cambiarlos pronto, el comprador lo va a descontar.',
                            '**Estética:** raspones, plásticos rotos o el asiento gastado bajan el precio aunque la moto ande bien.',
                            '**Modificaciones:** un escape cambiado o piezas que no son originales no siempre suman; a muchos compradores les preocupan.',
                            '**Accesorios útiles** que incluís, como baúl, casco o alarma: pueden ayudarte a cerrar la venta, pero no esperes que el comprador los pague por su valor completo.',
                        ],
                    ],
                    'Si algo hay que arreglar, tenés dos caminos: arreglarlo antes de publicar, o bajar el precio y decirlo en la descripción. Lo que no conviene es esconderlo.',
                ],
            ],
            [
                'h2' => 'Paso 5: los papeles también tienen precio',
                'id' => 'paso-5-los-papeles-tambien-tienen-precio',
                'body' => [
                    'Una moto con los papeles al día y a nombre del vendedor se vende más fácil. Si la moto no está a tu nombre, tiene deudas en la municipalidad o tiene una prenda sin levantar, el comprador va a tener que hacer trámites y gastar plata, y lo va a tener en cuenta al ofrecer. Si tu moto tiene prenda, averiguá con quien te financió cómo levantarla antes de publicar.',
                    'Lo más simple es resolver los papeles antes y publicar con todo en regla. Así podés pedir un precio más cercano al de las motos parecidas que están en orden.',
                ],
            ],
            [
                'h2' => 'Paso 6: dejá un margen para negociar',
                'id' => 'paso-6-deja-un-margen-para-negociar',
                'body' => [
                    'Muchos compradores van a pedir un descuento. Decidí antes de publicar:',
                    [
                        'list' => [
                            '**El precio que publicás.**',
                            '**El mínimo que aceptás.** Anotalo y no lo cambies en medio de una charla por WhatsApp.',
                        ],
                    ],
                    'La diferencia entre los dos es tu margen. Si el precio publicado queda muy por encima de las motos parecidas, nadie te escribe; si queda muy por debajo, el comprador desconfía y piensa que algo anda mal con la moto o con los papeles.',
                    'Si aceptás otra moto como parte de pago o si el precio es negociable, marcalo en la descripción al publicar: te ahorra mensajes.',
                ],
            ],
            [
                'h2' => 'Cómo saber si el precio de tu moto usada está bien',
                'id' => 'como-saber-si-el-precio-de-tu-moto-usada-esta-bi',
                'body' => [
                    'Después de publicar, las consultas te dan una pista:',
                    [
                        'list' => [
                            'Si pasan los días y nadie te escribe, revisá el precio y las fotos comparando otra vez con las publicaciones parecidas.',
                            'Si te escriben muchos pero todos piden un descuento grande, puede que el precio esté alto para el estado de la moto.',
                            'Si te escriben muchísimos apenas publicás, puede que lo hayas puesto bajo.',
                        ],
                    ],
                    'Nadie te puede asegurar en cuánto tiempo se vende una moto. Lo que sí ayuda es un precio que se pueda explicar comparando con motos parecidas.',
                ],
            ],
            [
                'h2' => 'Publicá tu moto',
                'id' => 'publica-tu-moto',
                'body' => [
                    'Con el precio definido, sacale buenas fotos: leé [cómo sacar buenas fotos para vender tu moto](/guias/como-sacar-buenas-fotos-para-vender-tu-moto). Cuando la vendas, hacé la transferencia como corresponde con [cómo transferir una moto en Paraguay](/guias/como-transferir-una-moto-en-paraguay).',
                    [
                        'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía cuanto-vale-mi-moto-usada)',
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    'como-sacar-buenas-fotos-para-vender-tu-moto' => [
        'group' => 'compra',
        'title' => 'Cómo sacar buenas fotos para vender tu moto',
        'navLabel' => 'Cómo sacar buenas fotos para vender tu moto',
        'seoTitle' => 'Cómo sacar buenas fotos para vender tu moto',
        'metaDescription' => 'Cómo vender tu moto más rápido: fotos con buena luz, los ángulos que busca el comprador, una descripción clara y un precio honesto. Guía práctica.',
        'query' => 'como vender mi moto rapido',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Cómo sacar buenas fotos para vender tu moto',
            'lead' => 'Luz, ángulos y detalles que tenés que mostrar, más cómo escribir una buena descripción y poner un precio honesto para que te escriban compradores en serio.',
        ],
        'intro' => [
            'Si te preguntás cómo vender tu moto rápido, empezá por las fotos: cuando alguien busca una moto, es lo primero que ve. Si no se entiende cómo está la moto, pasa de largo aunque el precio sea bueno. Nadie puede prometerte que tu moto se venda en un plazo determinado, pero unas fotos claras, una descripción completa y un precio honesto hacen que te escriban compradores en serio y no curiosos.',
            'No necesitás una cámara profesional: alcanza con el celular, buena luz y un poco de paciencia.',
        ],
        'sections' => [
            [
                'h2' => 'Antes de sacar la primera foto',
                'id' => 'antes-de-sacar-la-primera-foto',
                'body' => [
                    [
                        'list' => [
                            '**Lavá la moto.** Barro, polvo o grasa hacen que parezca descuidada aunque no lo esté.',
                            '**Elegí un fondo ordenado:** una pared lisa, un portón o un espacio abierto. Sacá del cuadro baldes, bolsas y otras motos.',
                            '**Limpiá la lente del celular.** Una lente con marcas de dedos deja todo borroso.',
                            '**Enderezá el manubrio** y, si tiene caballete central, usalo para que la moto quede derecha.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'La luz',
                'id' => 'la-luz',
                'body' => [
                    [
                        'list' => [
                            'Sacá las fotos de día, con luz natural. A la mañana temprano o a la tarde la luz es más pareja.',
                            'Si el sol pega muy fuerte, poné la moto a la sombra: evitás reflejos y sombras duras.',
                            'No saques la foto contra el sol, porque la moto queda oscura.',
                            'Evitá el flash y las fotos de noche con la luz de la calle.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Las fotos que busca el comprador',
                'id' => 'las-fotos-que-busca-el-comprador',
                'body' => [
                    'Al publicar, las fotos van primero. Podés subir hasta 20 y **la primera es la portada**, la que aparece en el listado. Elegí para portada la foto más clara de la moto entera.',
                    'Estas son las fotos que no pueden faltar:',
                    [
                        'ol' => [
                            '**De costado, la moto entera.** Es la mejor portada: se ve el tipo de moto, el estado general y las cubiertas. Sacala a la altura del motor, no desde arriba.',
                            '**Del otro costado.** El comprador quiere ver los dos lados, sobre todo si uno tiene raspones.',
                            '**De frente**, con el faro y el guardabarros.',
                            '**De atrás**, con la luz trasera y la chapa.',
                            '**El tablero**, con el kilometraje que se lea bien. Si podés, con la moto encendida para que se vean las luces del tablero.',
                            '**El motor**, de cerca y del lado donde se ven mejor el cilindro y la cadena.',
                            '**Las cubiertas**, para que se vea cuánto dibujo les queda.',
                            '**Los detalles**: asiento, escape, frenos, y cualquier accesorio que suma.',
                        ],
                    ],
                    'Sacá las fotos con el celular en horizontal y con la moto ocupando casi todo el cuadro.',
                ],
            ],
            [
                'h2' => 'Mostrá lo que tiene, también lo malo',
                'id' => 'mostra-lo-que-tiene-tambien-lo-malo',
                'body' => [
                    'Si la moto tiene un raspón, un plástico roto o el asiento gastado, sacale una foto. El comprador lo va a ver igual cuando vaya, y si no lo mostraste antes, pierde la confianza y se va. Mostrarlo de entrada te ahorra viajes y regateos al final.',
                ],
            ],
            [
                'h2' => 'Fotos que no se pueden usar',
                'id' => 'fotos-que-no-se-pueden-usar',
                'body' => [
                    [
                        'list' => [
                            '**Fotos de otro sitio o de otra moto.** Tienen que ser fotos de tu moto. Las publicaciones con fotos tomadas de otro portal o con marca de agua ajena no se publican.',
                            '**Fotos de catálogo** de una moto usada. Muestran una moto nueva que no es la tuya, y el comprador se da cuenta en cuanto la ve.',
                            '**Fotos con tu número de teléfono escrito encima.**',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Una descripción que responda las preguntas',
                'id' => 'una-descripcion-que-responda-las-preguntas',
                'body' => [
                    'Una buena descripción te evita contestar lo mismo diez veces por WhatsApp. Aprovechá la descripción para contar:',
                    [
                        'list' => [
                            'Año, kilometraje y cilindrada, iguales a los de los papeles.',
                            'Si sos el primer dueño o cuántos tuvo.',
                            'Qué mantenimiento le hiciste y en qué taller, si lo sabés.',
                            'Qué tiene que arreglar, si tiene algo.',
                            'Si los papeles están al día y a tu nombre. Si no sabés qué papeles tiene que tener, leé [qué papeles tiene que tener una moto al día](/guias/papeles-de-una-moto-al-dia).',
                            'Por qué la vendés, si querés contarlo.',
                        ],
                    ],
                    [
                        'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía como-sacar-buenas-fotos-para-vender-tu-moto)',
                    ],
                ],
            ],
            [
                'h2' => 'Un precio honesto para vender tu moto más rápido',
                'id' => 'un-precio-honesto-para-vender-tu-moto-mas-rapido',
                'body' => [
                    'El precio es lo que más filtra. Antes de ponerlo, compará con motos parecidas publicadas en las motos usadas: buscá la misma marca y modelo, y fijate en las que tengan un año y un kilometraje cercanos a los de la tuya. Mirá varias, no una sola, y tené en cuenta el estado de cada una y si los papeles están al día. Tenés el método paso a paso en [cuánto vale mi moto usada](/guias/cuanto-vale-mi-moto-usada).',
                    [
                        'list' => [
                            'Un precio muy alto hace que nadie te escriba.',
                            'Un precio muy bajo despierta desconfianza: el comprador piensa que algo anda mal con la moto o con los papeles.',
                            'Si aceptás negociar o recibís otra moto como parte de pago, marcalo en la descripción: ahorra mensajes.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Antes de la visita',
                'id' => 'antes-de-la-visita',
                'body' => [
                    'Cuando alguien quiera ver la moto, tené los papeles a mano y acordá un lugar y un horario con luz de día. Si se concreta la venta, hacé la transferencia como corresponde: leé [cómo transferir una moto en Paraguay](/guias/como-transferir-una-moto-en-paraguay).',
                ],
            ],
            [
                'h2' => 'Publicá tu moto',
                'id' => 'publica-tu-moto',
                'body' => [
                    [
                        'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía como-sacar-buenas-fotos-para-vender-tu-moto)',
                    ],
                    [
                        'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía como-sacar-buenas-fotos-para-vender-tu-moto)',
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    'seguro-contra-terceros-para-motos' => [
        'group' => 'compra',
        'title' => 'Seguro contra terceros para motos: qué cubre',
        'navLabel' => 'Seguro contra terceros para motos: qué cubre',
        'seoTitle' => 'Seguro contra terceros para motos: qué cubre',
        'metaDescription' => 'Seguro contra terceros para motos en Paraguay: qué suele cubrir, qué no, en qué se diferencia de una cobertura amplia y qué preguntar antes de firmar.',
        'query' => 'seguro moto paraguay',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Seguro contra terceros para motos: qué cubre',
            'lead' => 'Qué suele cubrir un seguro contra terceros, en qué se diferencia de una cobertura más amplia y qué preguntarle a la aseguradora antes de firmar.',
        ],
        'intro' => [
            'Cuando comprás una moto en Paraguay, tarde o temprano aparece la pregunta del seguro. Mucha gente empieza por el seguro contra terceros, pero pocos saben bien qué cubre y qué no hasta el día que lo necesitan.',
            'Esta guía te explica cómo funciona este tipo de seguro para que llegues a la aseguradora sabiendo qué preguntar. No te recomendamos un seguro ni una aseguradora: cada póliza es distinta y lo que vale es lo que dice la tuya.',
        ],
        'sections' => [
            [
                'h2' => 'Qué es un seguro contra terceros',
                'id' => 'que-es-un-seguro-contra-terceros',
                'body' => [
                    'Un seguro contra terceros cubre, en general, los daños que vos le causás a otra persona o a sus cosas mientras manejás tu moto: por ejemplo, si chocás un auto o lastimás a un peatón. El "tercero" es el otro, no vos ni tu moto. Qué daños entran y hasta qué monto lo dice cada póliza.',
                    'Lo que un seguro contra terceros, en general, **no** está pensado para cubrir:',
                    [
                        'list' => [
                            'Los daños de tu propia moto en un choque.',
                            'El robo o el hurto de tu moto.',
                            'Tus propios gastos médicos si te lastimás.',
                        ],
                    ],
                    'Algunas pólizas pueden sumar coberturas extra, y otras no. Por eso lo primero es leer las condiciones de la póliza, no el folleto, y preguntar por cada uno de estos puntos.',
                ],
            ],
            [
                'h2' => 'En qué se diferencia de una cobertura más amplia',
                'id' => 'en-que-se-diferencia-de-una-cobertura-mas-amplia',
                'body' => [
                    'Una cobertura más amplia suma, además de los terceros, protección para tu propia moto: por ejemplo, daños por choque, robo o incendio, según el plan. El nombre comercial cambia de una aseguradora a otra; lo que importa es la lista de coberturas que figura en la póliza.',
                    'La diferencia práctica:',
                    [
                        'list' => [
                            '**Contra terceros:** protege tu bolsillo frente a lo que le hacés a otro. No te devuelve la moto si te la roban.',
                            '**Cobertura amplia:** protege también la moto. Preguntá cuánto más cuesta y si tiene condiciones como franquicia, antigüedad máxima de la moto o inspección previa, sobre todo si la moto es usada.',
                        ],
                    ],
                    'Si la compraste en cuotas, preguntá a la financiera o al comercio si te exigen algún seguro mientras la estás pagando, y cuál. Si ya lo incluyen en la cuota, pedí la póliza para saber qué cubre.',
                ],
            ],
            [
                'h2' => '¿Es obligatorio el seguro de moto en Paraguay?',
                'id' => 'es-obligatorio-el-seguro-de-moto-en-paraguay',
                'body' => [
                    'Si hay un seguro obligatorio vigente para motos es un dato legal, y los datos legales se confirman en la fuente. Antes de salir a manejar, consultá en la Superintendencia de Seguros del Banco Central del Paraguay o preguntale a tu aseguradora si hay un seguro obligatorio vigente para motos y qué te pueden pedir en un control de tránsito.',
                    'Sea obligatorio o no, la pregunta útil es otra: ¿podés pagar vos solo el daño si lastimás a alguien o chocás un auto? Si la respuesta es no, el seguro contra terceros es la cobertura que responde a ese riesgo.',
                ],
            ],
            [
                'h2' => 'Qué preguntarle a la aseguradora',
                'id' => 'que-preguntarle-a-la-aseguradora',
                'body' => [
                    'Antes de firmar, pedí las condiciones por escrito y preguntá:',
                    [
                        'ol' => [
                            '**¿Qué cubre exactamente?** Daños a otras personas, daños a cosas de otros, gastos médicos de terceros, y si hay algo para vos.',
                            '**¿Hasta qué monto?** Toda póliza tiene un tope. Preguntá el monto máximo por cada tipo de daño.',
                            '**¿Hay franquicia?** Es la parte del daño que pagás vos antes de que pague el seguro.',
                            '**¿Qué casos no cubre?** Preguntá, por ejemplo, qué pasa si manejás sin licencia, sin casco o con alcohol, y si cubre el uso de la moto para trabajar cuando la póliza es de uso particular. Si hacés delivery, decilo.',
                            '**¿Cómo se hace el reclamo?** A qué número llamás, en cuánto tiempo tenés que avisar y qué papeles te van a pedir.',
                            '**¿Cuánto cuesta y cómo se paga?** Si es anual, mensual o en cuotas, y qué pasa si te atrasás.',
                            '**¿La aseguradora está habilitada?** Pedile los datos de la empresa y confirmalos con la Superintendencia de Seguros del Banco Central del Paraguay antes de pagar.',
                        ],
                    ],
                    'No te guíes sólo por el precio: una póliza barata con un tope bajo o muchas exclusiones puede no servirte cuando la necesitás.',
                ],
            ],
            [
                'h2' => 'Cuánto cuesta',
                'id' => 'cuanto-cuesta',
                'body' => [
                    'No te podemos dar un número: depende de la aseguradora, del tipo de cobertura, de la moto (cilindrada, año, valor), del uso y a veces de la ciudad. Pedí dos o tres cotizaciones con la misma cobertura y los mismos topes para poder compararlas de verdad.',
                    'Cuando tengas el precio, pasalo a monto mensual y sumalo a tus otros gastos fijos: combustible, service y habilitación.',
                ],
            ],
            [
                'h2' => 'Si tenés un choque',
                'id' => 'si-tenes-un-choque',
                'body' => [
                    'Tené a mano el número de la aseguradora y los datos de tu póliza. Después de un choque, avisá a la aseguradora en el plazo que diga tu póliza y guardá todo lo que te sirva para el reclamo: fotos del lugar y de los vehículos, datos de la otra persona y de testigos. Qué papeles te pide cada aseguradora preguntalo al contratar, no el día del choque.',
                ],
            ],
            [
                'h2' => 'Cómo te ayudamos desde moto.com.py',
                'id' => 'como-te-ayudamos-desde-moto-com-py',
                'body' => [
                    [
                        'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía seguro-contra-terceros-para-motos)',
                    ],
                ],
            ],
            [
                'h2' => 'Seguí buscando',
                'id' => 'segui-buscando',
                'body' => [
                    [
                        'list' => [
                            'Si todavía estás eligiendo, mirá las [motos por marca y por tipo](/motos).',
                            'Si vas a comprar una moto usada o una [0 km](/guias/precios-de-motos-0-km-en-paraguay), preguntá por el seguro antes de cerrar: así sabés cuánto suma a lo que pagás por mes.',
                            'Si pensás comprar en cuotas, leé [cómo funciona comprar una moto en cuotas en Paraguay](/guias/comprar-moto-en-cuotas-en-paraguay).',
                            'Para sumar el seguro a tus gastos fijos, mirá [cuánto cuesta mantener una moto por mes](/guias/cuanto-cuesta-mantener-una-moto).',
                        ],
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    'comprar-moto-en-cuotas-en-paraguay' => [
        'group' => 'compra',
        'title' => 'Comprar una moto en cuotas en Paraguay: cómo funciona',
        'navLabel' => 'Comprar una moto en cuotas en Paraguay: cómo funciona',
        'seoTitle' => 'Comprar una moto en cuotas en Paraguay: cómo funciona',
        'metaDescription' => 'Cómo funciona comprar una moto en cuotas en Paraguay: entrega, cuotas, qué preguntar al comercio y cómo comparar el costo total con el contado.',
        'query' => 'motos en cuotas paraguay',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Comprar una moto en cuotas en Paraguay: cómo funciona',
            'lead' => 'Qué es la entrega, qué preguntar antes de ir al comercio, cómo calcular cuánto terminás pagando en total y qué mirar antes de firmar un plan en cuotas.',
        ],
        'intro' => [
            'Si no tenés el total para pagar una moto al contado, las motos en cuotas en Paraguay te permiten pagar una parte al principio y el resto de a poco. Acá te explicamos cómo funciona y cómo saber cuánto terminás pagando.',
            'Antes de seguir: moto.com.py no otorga créditos ni garantiza aprobación. Quien decide es el comercio o la financiera.',
        ],
        'sections' => [
            [
                'h2' => 'Motos en cuotas: cómo funcionan la entrega y las cuotas',
                'id' => 'motos-en-cuotas-como-funcionan-la-entrega-y-las-',
                'body' => [
                    'Los comercios suelen pedir una entrega y financiar el resto en cuotas. La entrega se paga al principio; las cuotas, cada mes durante el plazo acordado. En las publicaciones lo vas a ver escrito así: *Entrega Gs. X + N cuotas de Gs. Y*.',
                    'Preguntá quién te financia: si el crédito lo da el mismo comercio o una financiera o un banco con el que trabaja. Es importante porque con esa empresa vas a firmar el contrato y a ella le vas a pagar las cuotas.',
                    'Preguntá también si la moto va a quedar con alguna garantía a favor de quien te financia mientras pagás (por ejemplo, una prenda), qué significa eso si querés venderla o transferirla antes de terminar, y quién paga ese trámite.',
                ],
            ],
            [
                'h2' => 'Qué preguntar antes de ir',
                'id' => 'que-preguntar-antes-de-ir',
                'body' => [
                    'Cada comercio y cada financiera pone sus propios requisitos. Llamá o escribí antes de ir y preguntá qué te van a pedir. Estas son las preguntas que conviene hacer:',
                    [
                        'list' => [
                            '**Documento de identidad:** qué documento piden y si tiene que estar vigente.',
                            '**Comprobante de ingresos:** qué aceptan si sos empleado y qué aceptan si sos independiente.',
                            '**Comprobante de domicilio:** si lo piden y qué documento sirve.',
                            '**Garante o codeudor:** si te van a pedir uno y en qué casos.',
                            '**Historial de crédito:** si lo consultan y cómo lo tienen en cuenta.',
                            '**Edad y antigüedad laboral:** si piden una edad mínima o una antigüedad mínima en el trabajo.',
                        ],
                    ],
                    'Anotá las respuestas. Así llevás todo la primera vez y podés comparar lo que te pide cada lugar.',
                ],
            ],
            [
                'h2' => 'Cuánto pagás en total',
                'id' => 'cuanto-pagas-en-total',
                'body' => [
                    'La cuota sola no te dice cuánto cuesta la moto. Para saberlo, hacé esta cuenta con los números que te dé el comercio:',
                    '**Total en cuotas = entrega + (valor de la cuota × cantidad de cuotas)**',
                    'Después comparalo con el precio al contado de la misma moto:',
                    '**Costo de financiarla = total en cuotas − precio al contado**',
                    'Por ejemplo, si una moto cuesta *P* al contado y te ofrecen una entrega *E* más *N* cuotas de *C*, pagás en total *E + C × N*. Si eso es mayor que *P*, la diferencia es lo que te cuesta financiarla.',
                    'Tené en cuenta:',
                    [
                        'list' => [
                            '**Una cuota más baja no siempre es más barata.** Si son más cuotas, el total puede ser mayor. Compará siempre el total, no sólo la cuota.',
                            '**Preguntá qué incluye la cuota y qué se cobra aparte:** seguro, gastos de otorgamiento, trámites u otros cargos. Todo lo que se paga aparte sumalo al total antes de comparar.',
                            '**Pedí por escrito la tasa de interés y el costo total del crédito,** antes de firmar. Si comparás dos planes, compará los dos con los mismos datos.',
                            '**Preguntá si la cuota es fija** o si puede cambiar durante el plazo.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Antes de firmar',
                'id' => 'antes-de-firmar',
                'body' => [
                    [
                        'ol' => [
                            'Pedí el plan completo por escrito: entrega, cantidad de cuotas, valor de cada una y total.',
                            'Leé el contrato entero y preguntá qué pasa si te atrasás con una cuota: cuánto es el recargo y qué puede pasar con la moto.',
                            'Preguntá si podés adelantar cuotas o cancelar todo antes y si eso tiene algún costo.',
                            'Sumá a la cuota lo que cuesta tener la moto: combustible, seguro y mantenimiento. Te sirve [cuánto cuesta mantener una moto](/guias/cuanto-cuesta-mantener-una-moto).',
                            'Si la moto es usada, revisá los papeles igual que si la pagaras al contado: [qué papeles tiene que tener una moto al día](/guias/papeles-de-una-moto-al-dia).',
                        ],
                    ],
                    'Si algo del contrato no lo entendés, no firmes en el momento: llevátelo, leelo con calma y volvé con tus preguntas.',
                ],
            ],
            [
                'h2' => 'Cuidado con los falsos créditos',
                'id' => 'cuidado-con-los-falsos-creditos',
                'body' => [
                    'Desconfiá de quien te pide plata por adelantado para "aprobar" el crédito o tus datos bancarios antes de mostrarte un contrato. Más señales en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
                ],
            ],
            [
                'h2' => 'Cómo te ayuda moto.com.py',
                'id' => 'como-te-ayuda-moto-com-py',
                'body' => [
                    [
                        'list' => [
                            [
                                'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía comprar-moto-en-cuotas-en-paraguay)',
                            ],
                            [
                                'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía comprar-moto-en-cuotas-en-paraguay)',
                            ],
                        ],
                    ],
                    [
                        'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía comprar-moto-en-cuotas-en-paraguay)',
                    ],
                ],
            ],
            [
                'h2' => 'Seguí buscando',
                'id' => 'segui-buscando',
                'body' => [
                    [
                        'list' => [
                            'Mirá las [motos 0 km de comercios](/guias/precios-de-motos-0-km-en-paraguay) y las motos usadas.',
                        ],
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    'cuanto-cuesta-mantener-una-moto' => [
        'group' => 'compra',
        'title' => 'Cuánto cuesta mantener una moto por mes',
        'navLabel' => 'Cuánto cuesta mantener una moto por mes',
        'seoTitle' => 'Cuánto cuesta mantener una moto por mes',
        'metaDescription' => 'Cuánto cuesta mantener una moto por mes en Paraguay: combustible, service, aceite, cubiertas, cadena, habilitación y seguro. Calculá tu propio costo.',
        'query' => 'mantenimiento moto costo',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Cuánto cuesta mantener una moto por mes',
            'lead' => 'Los gastos de tener una moto, uno por uno, y una forma simple de calcular tu costo mensual con tus propios números antes de comprar.',
        ],
        'intro' => [
            'El precio de la moto es lo que pagás una vez. El costo de mantenimiento de la moto es lo que pagás todos los meses, y conviene calcularlo antes de comprar, sobre todo si la vas a pagar en cuotas o la usás para trabajar.',
            'No te vamos a dar precios: cambian seguido y dependen de tu ciudad, del modelo y del lugar donde compres. Te damos la lista de gastos, dónde conseguir cada dato y una forma de hacer tu propia cuenta. Los precios del momento pedíselos a un taller, a una casa de repuestos o al comercio donde comprás la moto.',
        ],
        'sections' => [
            [
                'h2' => 'Los gastos, uno por uno',
                'id' => 'los-gastos-uno-por-uno',
                'body' => [
                    '**Combustible**',
                    'Es el gasto que más depende de vos. Para calcularlo necesitás tres datos:',
                    [
                        'list' => [
                            '**Cuántos kilómetros hacés por mes.** Si no lo sabés, anotá el kilometraje del tablero hoy y otra vez dentro de una semana, y multiplicá la diferencia por cuatro.',
                            '**Cuántos kilómetros hace tu moto por litro.** Mirá la ficha técnica del fabricante, pero confirmalo con tu uso: llená el tanque, anotá el kilometraje, andá normalmente y la próxima vez que cargues dividí los kilómetros recorridos por los litros que cargaste.',
                            '**El precio del litro de nafta que usás.** Tomalo del surtidor de la estación donde cargás.',
                        ],
                    ],
                    '**Service**',
                    'El service periódico (revisión general, ajustes, limpieza) se hace cada tantos kilómetros o cada tantos meses, lo que pase primero. El intervalo está en el manual del propietario de tu modelo; si no lo tenés, pedíselo al comercio o a un taller que trabaje con esa marca. El precio del service preguntalo en el taller antes de dejar la moto.',
                    'Si la moto es 0 km, preguntá en el comercio qué services pide la garantía, cada cuánto hay que hacerlos y si tienen costo.',
                    '**Aceite**',
                    'El cambio de aceite es el gasto de mantenimiento más frecuente. Cada cuántos kilómetros se cambia y cuántos litros lleva lo dice el manual del propietario. Con ese dato, pedí en la casa de repuestos el precio del aceite que corresponde y en el taller el de la mano de obra.',
                    '**Cubiertas**',
                    'Las cubiertas se gastan según los kilómetros, el peso que llevás y el estado de las calles. Para saber cuánto te duran, anotá el kilometraje cuando ponés una cubierta nueva y otra vez cuando la cambiás. La medida está grabada en el costado de la cubierta: con ese dato pedí precio en la gomería o en la casa de repuestos.',
                    '**Cadena, piñón y corona**',
                    'Si tu moto es a cadena, el kit de transmisión se cambia completo cuando se gasta. Lubricar y tensar la cadena seguido lo hace durar más. Preguntá en el taller cuánto cuesta el kit con la colocación y anotá el kilometraje cuando lo cambiás, así sabés cuánto te dura a vos.',
                    '**Frenos y otros repuestos**',
                    'Pastillas o zapatas de freno, filtro de aire, bujía, lámparas. De a uno no parecen mucho, pero suman. Pedí en el taller que te digan cada cuánto conviene revisarlos en tu modelo y cuánto cuesta cada uno.',
                    'Guardá un poco cada mes para un imprevisto: una caída o una pieza que se rompe sin aviso.',
                    '**Habilitación municipal**',
                    'Es el pago anual a la municipalidad por la moto y la chapa. Preguntá en la municipalidad de tu ciudad cuánto te corresponde pagar y cuándo vence. Para el cálculo mensual, dividí el monto anual por 12.',
                    '**Seguro**',
                    'Si tenés o pensás contratar un seguro, sumá lo que pagás por él. Pedí una cotización a la aseguradora con la cobertura que te interesa. Si no sabés qué cubre cada tipo, leé [qué cubre un seguro contra terceros para motos](/guias/seguro-contra-terceros-para-motos).',
                    '**La cuota, si la estás pagando**',
                    'No es mantenimiento, pero sale del mismo bolsillo. Si compraste en cuotas, sumala para ver cuánto te cuesta la moto de verdad por mes.',
                ],
            ],
            [
                'h2' => 'Cómo calcular el costo de mantenimiento de tu moto por mes',
                'id' => 'como-calcular-el-costo-de-mantenimiento-de-tu-mo',
                'body' => [
                    'Agarrá papel o la calculadora del celular y seguí estos pasos:',
                    [
                        'ol' => [
                            '**Combustible por mes:** kilómetros por mes ÷ kilómetros por litro × precio del litro.',
                            '**Gastos por kilómetro:** para cada gasto que depende de lo que andás (aceite, cubiertas, kit de transmisión, frenos), dividí el precio por los kilómetros que dura. Sumá todo y multiplicalo por tus kilómetros del mes.',
                            '**Gastos por tiempo:** el service (si se hace por meses), la habilitación y el seguro. Pasá cada uno a monto mensual: si es anual, dividilo por 12.',
                            '**Reserva para imprevistos:** un monto fijo que decidás vos.',
                            '**Sumá los cuatro.** Ese es tu costo mensual sin la cuota. Si estás pagando la moto, sumala aparte.',
                        ],
                    ],
                    'Un ejemplo de cómo se arma, sin números: si hacés el doble de kilómetros que otra persona con la misma moto, tu gasto en combustible, aceite y cubiertas es más o menos el doble, pero la habilitación te cuesta lo mismo. Por eso quien trabaja con la moto tiene que mirar sobre todo los gastos por kilómetro.',
                    '**Dónde conseguir cada dato**',
                    [
                        'list' => [
                            '**Manual del propietario:** intervalos de service y de cambio de aceite, cantidad de aceite y medida de las cubiertas.',
                            '**Taller:** precio del service, de la mano de obra y de los repuestos que se cambian con más frecuencia.',
                            '**Casa de repuestos o gomería:** precio del aceite, de las cubiertas y del kit de transmisión.',
                            '**Estación de servicio:** precio del litro de nafta.',
                            '**Municipalidad:** monto y vencimiento de la habilitación.',
                            '**Aseguradora:** cotización del seguro.',
                        ],
                    ],
                    'Los precios cambian: repetí la cuenta cada tanto con los precios nuevos.',
                ],
            ],
            [
                'h2' => 'Qué hace que cueste más o menos',
                'id' => 'que-hace-que-cueste-mas-o-menos',
                'body' => [
                    [
                        'list' => [
                            '**La cilindrada y el modelo:** el consumo y el precio de los repuestos cambian de una moto a otra. Compará las fichas técnicas y pedí precio de los repuestos de los modelos que estás mirando. Si todavía no elegiste, te sirve [125, 150 o 200 cc: cuál elegir](/guias/125-150-o-200-cc-cual-elegir).',
                            '**Que haya repuestos en tu ciudad:** si hay que traerlos de lejos, pagás más y esperás más. Preguntá en el taller de tu zona si consigue repuestos para esa marca.',
                            '**Cómo la cuidás:** revisar la presión de las cubiertas, lubricar la cadena y no saltearte los cambios de aceite evita gastos grandes después.',
                            '**0 km o usada:** una usada puede venir con cosas para cambiar pronto. Preguntá qué se le hizo y cuándo.',
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Seguí buscando',
                'id' => 'segui-buscando',
                'body' => [
                    [
                        'list' => [
                            'Si estás comparando, mirá las motos usadas publicadas y preguntale al vendedor cuándo fue el último service.',
                            'En las [motos nuevas 0 km](/guias/precios-de-motos-0-km-en-paraguay) preguntale al comercio qué services pide la garantía y cuánto cuestan.',
                            'Si la moto es para trabajar, leé [qué moto conviene para delivery y ciudad](/guias/que-moto-conviene-para-trabajar).',
                        ],
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    'papeles-de-una-moto-al-dia' => [
        'group' => 'compra',
        'title' => 'Qué papeles tiene que tener una moto al día',
        'navLabel' => 'Qué papeles tiene que tener una moto al día',
        'seoTitle' => 'Qué papeles tiene que tener una moto al día',
        'metaDescription' => 'Qué papeles tiene que tener una moto usada al día en Paraguay, qué es la transferencia pendiente y qué riesgo corrés si comprás así.',
        'query' => 'papeles moto paraguay',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Qué papeles tiene que tener una moto al día',
            'lead' => 'Los documentos que tiene que tener una moto usada para comprarla tranquilo, qué significa "transferencia pendiente" y qué riesgo corrés si la aceptás así.',
        ],
        'intro' => [
            'Una moto con los papeles al día se transfiere, se asegura y se vuelve a vender sin problemas. Una con papeles pendientes te puede dejar con una moto que no podés poner a tu nombre. Antes de pagar, pedí ver cada documento.',
            'Los nombres de los documentos y los requisitos cambian: confirmalo en la oficina que corresponde antes de ir.',
        ],
        'sections' => [
            [
                'h2' => 'Los papeles que tenés que ver',
                'id' => 'los-papeles-que-tenes-que-ver',
                'body' => [
                    '**El título de la moto**',
                    'Es el documento que dice quién es el dueño. Tiene que estar a nombre de quien te la vende, y el nombre tiene que ser el mismo que el de su cédula de identidad.',
                    [
                        'verify' => 'nombre exacto del documento de propiedad de motos y cómo se distingue de la cédula del vehículo — fuente: Registro de Automotores (guía papeles-de-una-moto-al-dia)',
                    ],
                    '**La cédula de la moto**',
                    'Es el documento que se lleva con la moto al manejar. Fijate que los números de chasis y de motor que figuran ahí sean iguales a los grabados en la moto.',
                    [
                        'verify' => 'si el nombre de uso es "cédula verde" y si es obligatorio llevarla al manejar — fuente: Registro de Automotores (guía papeles-de-una-moto-al-dia)',
                    ],
                    '**La chapa**',
                    'Tiene que estar puesta, legible y coincidir con los papeles. Si falta, pedí el comprobante de la reposición.',
                    [
                        'verify' => 'formato vigente de la chapa de motos y dónde se tramita la reposición — fuente: Registro de Automotores (guía papeles-de-una-moto-al-dia)',
                    ],
                    '**La habilitación municipal**',
                    'Es el pago anual que se hace en la municipalidad. Pedí el comprobante del último año.',
                    [
                        'verify' => 'nombre del pago anual para motos, si la deuda sigue a la moto cuando cambia de dueño y si se exige saldarla para transferir — fuente: municipalidad de Asunción (guía papeles-de-una-moto-al-dia)',
                    ],
                    '**Las multas**',
                    'Preguntá si la moto tiene multas pendientes y pedí que te muestre dónde lo consultó.',
                    [
                        'verify' => 'dónde se consultan las multas de tránsito de una moto y si impiden la transferencia — fuente: municipalidad y Patrulla Caminera (guía papeles-de-una-moto-al-dia)',
                    ],
                    '**El seguro**',
                    'Si la moto tiene seguro, pedí la póliza vigente. Te lo explicamos en [seguro contra terceros para motos](/guias/seguro-contra-terceros-para-motos).',
                    [
                        'verify' => 'si el seguro contra terceros es obligatorio para motos y desde cuándo — fuente: ley vigente y Superintendencia de Seguros del BCP (guía papeles-de-una-moto-al-dia)',
                    ],
                    '**El informe del Registro**',
                    'No lo trae el vendedor: lo pedís vos. Te dice a nombre de quién está la moto y si tiene prendas, embargos o inhibiciones. Si la moto todavía se está pagando en cuotas, puede tener una prenda y no se transfiere libre hasta que se levante.',
                    [
                        'verify' => 'nombre del informe, si se pide en línea o en ventanilla, y el arancel vigente — fuente: Registro de Automotores (guía papeles-de-una-moto-al-dia)',
                    ],
                ],
            ],
            [
                'h2' => 'Qué significa "transferencia pendiente"',
                'id' => 'que-significa-transferencia-pendiente',
                'body' => [
                    'Es cuando la moto cambió de manos pero nunca se inscribió a nombre del nuevo dueño: los papeles dicen una persona y la moto la tiene otra. A veces se vendió dos o tres veces y sigue a nombre del primero.',
                    'Lo vas a escuchar como "la moto está a nombre de mi cuñado", "los papeles están en trámite" o "después te firma el dueño". Para transferirla a tu nombre vas a necesitar la firma de la persona que figura en los papeles, no la de quien te la vende.',
                    [
                        'verify' => 'si una venta con poder o autorización del titular es válida para transferir una moto y qué requisitos tiene — fuente: Registro de Automotores o un escribano (guía papeles-de-una-moto-al-dia)',
                    ],
                ],
            ],
            [
                'h2' => 'Qué riesgo corrés',
                'id' => 'que-riesgo-corres',
                'body' => [
                    [
                        'list' => [
                            '**Que no la puedas poner a tu nombre.** Si el titular no aparece, no quiere firmar o falleció, el trámite se complica o se traba.',
                            '**Heredar deudas.** Habilitación atrasada, multas o una prenda que no conocías.',
                            [
                                'verify' => 'qué deudas quedan asociadas a la moto y cuáles al titular — fuente: municipalidad y Registro de Automotores (guía papeles-de-una-moto-al-dia)',
                            ],
                            '**Que sea robada.** Las motos robadas suelen venir así: "en trámite" y con precio bajo. Más señales en [cómo comprar una moto usada sin que te estafen](/guias/como-comprar-una-moto-usada-sin-que-te-estafen).',
                            '**Problemas para asegurarla o venderla después.**',
                            [
                                'verify' => 'si las aseguradoras exigen que la moto esté a nombre del asegurado — fuente: dos aseguradoras (guía papeles-de-una-moto-al-dia)',
                            ],
                        ],
                    ],
                    'Si igual te interesa la moto, lo más seguro es que la compraventa la firme el titular que figura en los papeles y que pagues recién ahí. El paso a paso está en [cómo transferir una moto en Paraguay](/guias/como-transferir-una-moto-en-paraguay).',
                ],
            ],
            [
                'h2' => 'Checklist rápido',
                'id' => 'checklist-rapido',
                'body' => [
                    [
                        'ol' => [
                            'El título está a nombre de quien te vende y coincide con su cédula.',
                            'Los números de chasis y de motor de la moto son iguales a los de los papeles.',
                            'La chapa está puesta y coincide con los papeles.',
                            'La habilitación municipal está al día, con comprobante.',
                            'Pediste el informe del Registro y no tiene prendas ni embargos.',
                        ],
                    ],
                    [
                        'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía papeles-de-una-moto-al-dia)',
                    ],
                ],
            ],
            [
                'h2' => 'Seguí buscando',
                'id' => 'segui-buscando',
                'body' => [
                    [
                        'list' => [
                            [
                                'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía papeles-de-una-moto-al-dia)',
                            ],
                            'En las [motos 0 km](/guias/precios-de-motos-0-km-en-paraguay), los papeles de la primera inscripción los maneja el comercio.',
                            [
                                'verify' => 'confirmar con dos comercios que la primera inscripción la gestiona el comercio (guía papeles-de-una-moto-al-dia)',
                            ],
                            'Antes de ir a ver una moto, leé [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
                            [
                                'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía papeles-de-una-moto-al-dia)',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    'como-transferir-una-moto-en-paraguay' => [
        'group' => 'compra',
        'title' => 'Cómo transferir una moto en Paraguay: pasos y papeles',
        'navLabel' => 'Cómo transferir una moto en Paraguay: pasos y papeles',
        'seoTitle' => 'Cómo transferir una moto en Paraguay: pasos y papeles',
        'metaDescription' => 'Cómo transferir una moto en Paraguay: qué papeles pedir al vendedor, dónde se hace el trámite y qué revisar antes de pagar. Guía paso a paso.',
        'query' => 'transferencia de chapa moto paraguay',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Cómo transferir una moto en Paraguay: pasos y papeles',
            'lead' => 'Qué papeles pedir, en qué orden hacer el trámite y qué revisar antes de pagar, para que la moto quede a tu nombre sin sorpresas.',
        ],
        'intro' => [
            'Comprar una moto usada no termina cuando pagás: termina cuando la moto está a tu nombre. Mientras la transferencia no esté hecha, para los papeles la moto sigue siendo del vendedor, y eso te puede complicar si hay una multa, un accidente o si querés venderla más adelante.',
            'Esta guía te cuenta el orden del trámite y qué revisar en cada paso. Los montos y los requisitos cambian: confirmalo en la oficina antes de ir.',
        ],
        'sections' => [
            [
                'h2' => 'Antes de pagar: lo que tenés que ver',
                'id' => 'antes-de-pagar-lo-que-tenes-que-ver',
                'body' => [
                    'Pedile al vendedor los papeles de la moto y fijate que coincidan con la moto y con la persona:',
                    [
                        'list' => [
                            '**El título o la cédula de la moto** a nombre de quien te la vende.',
                            [
                                'verify' => 'nombre exacto del documento de propiedad de motos en el Registro de Automotores — fuente: sitio oficial del Registro (guía como-transferir-una-moto-en-paraguay)',
                            ],
                            '**La cédula de identidad del vendedor**, y que el nombre sea el mismo que figura en los papeles de la moto.',
                            '**Los números de chasis y de motor** grabados en la moto, iguales a los de los papeles. Si están limados, repintados o no coinciden, no sigas.',
                            '**La habilitación municipal al día** (lo que se paga cada año en la municipalidad).',
                            [
                                'verify' => 'si la deuda de habilitación pasa al comprador o se exige saldarla para transferir — fuente: municipalidad de Asunción (guía como-transferir-una-moto-en-paraguay)',
                            ],
                        ],
                    ],
                    'Si la moto tiene una prenda (porque todavía se está pagando en cuotas a una financiera), no se puede transferir libre hasta que se levante.',
                    [
                        'verify' => 'cómo se consulta si una moto tiene prenda o embargo y cuánto cuesta el informe — fuente: Registro de Automotores (guía como-transferir-una-moto-en-paraguay)',
                    ],
                ],
            ],
            [
                'h2' => 'Paso 1: el informe de la moto',
                'id' => 'paso-1-el-informe-de-la-moto',
                'body' => [
                    'Antes de firmar nada, pedí un informe del Registro sobre la moto: te dice a nombre de quién está y si tiene prendas, embargos o inhibiciones.',
                    [
                        'verify' => 'nombre del informe, si se pide en línea o en ventanilla, y el arancel vigente — fuente: Registro de Automotores (guía como-transferir-una-moto-en-paraguay)',
                    ],
                    'Si el informe no coincide con lo que te dijo el vendedor, no pagues.',
                ],
            ],
            [
                'h2' => 'Paso 2: la compraventa',
                'id' => 'paso-2-la-compraventa',
                'body' => [
                    'La transferencia se formaliza con un contrato de compraventa firmado por las dos partes.',
                    [
                        'verify' => 'si para motos se exige escritura ante escribano o alcanza con un formulario con firmas certificadas — fuente: Registro de Automotores o un escribano (guía como-transferir-una-moto-en-paraguay)',
                    ],
                    'Llevá a la firma:',
                    [
                        'list' => [
                            'Tu cédula y la del vendedor.',
                            'Los papeles originales de la moto.',
                            'El comprobante de la habilitación municipal.',
                            [
                                'verify' => 'si se exige para firmar (guía como-transferir-una-moto-en-paraguay)',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'h2' => 'Paso 3: la inscripción a tu nombre',
                'id' => 'paso-3-la-inscripcion-a-tu-nombre',
                'body' => [
                    'Con la compraventa firmada, la transferencia se inscribe en el Registro para que la moto quede a tu nombre.',
                    [
                        'verify' => 'plazo máximo para inscribir, arancel y oficinas habilitadas fuera de Asunción — fuente: Registro de Automotores (guía como-transferir-una-moto-en-paraguay)',
                    ],
                    'Hasta que tengas el papel nuevo a tu nombre, guardá la copia de la compraventa y el comprobante del trámite.',
                ],
            ],
            [
                'h2' => 'Paso 4: la municipalidad',
                'id' => 'paso-4-la-municipalidad',
                'body' => [
                    'Después de la inscripción, actualizá la habilitación en la municipalidad de tu ciudad para que la chapa y el pago anual queden a tu nombre.',
                    [
                        'verify' => 'si el cambio de titular en la municipalidad es automático o hay que hacerlo aparte — fuente: municipalidad (guía como-transferir-una-moto-en-paraguay)',
                    ],
                ],
            ],
            [
                'h2' => 'Cuánto cuesta',
                'id' => 'cuanto-cuesta',
                'body' => [
                    'No te podemos dar un número confiable: depende de los aranceles del Registro, de si interviene un escribano y de la municipalidad. Preguntá los costos antes de empezar y acordá con el vendedor quién paga qué.',
                    [
                        'verify' => 'aranceles vigentes del Registro y honorarios de referencia — fuente: Registro de Automotores (guía como-transferir-una-moto-en-paraguay)',
                    ],
                ],
            ],
            [
                'h2' => 'Señales para no seguir',
                'id' => 'senales-para-no-seguir',
                'body' => [
                    [
                        'list' => [
                            'El vendedor no es el que figura en los papeles y "después te firma el dueño".',
                            'Te pide una seña por transferencia antes de que veas la moto.',
                            '"Los papeles están en trámite" y no te muestra ningún comprobante.',
                            'El precio está muy por debajo de lo que piden por motos parecidas.',
                        ],
                    ],
                    [
                        'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía como-transferir-una-moto-en-paraguay)',
                    ],
                ],
            ],
            [
                'h2' => 'Seguí buscando',
                'id' => 'segui-buscando',
                'body' => [
                    [
                        'list' => [
                            [
                                'verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía como-transferir-una-moto-en-paraguay)',
                            ],
                            'Si preferís una moto 0 km, en las [motos nuevas](/guias/precios-de-motos-0-km-en-paraguay) el comercio se encarga de los papeles de la primera inscripción.',
                            [
                                'verify' => 'confirmar con dos comercios que la primera inscripción la gestiona el comercio (guía como-transferir-una-moto-en-paraguay)',
                            ],
                            'Antes de ir a ver una moto, leé [qué revisar antes de comprar una moto usada](/guias/que-revisar-antes-de-comprar-una-moto-usada).',
                        ],
                    ],
                ],
            ],
        ],
        'faq' => [],
        'links' => [
            [
                'path' => '/motos',
                'label' => 'Motos por marca y tipo',
            ],
            [
                'path' => '/guias/precios-de-motos-0-km-en-paraguay',
                'label' => 'Precios de motos 0 km publicados',
            ],
        ],
        'related' => [
            'como-comprar-tu-primera-moto',
        ],
        'quiz' => null,
        'sources' => [],
    ],
    /* B2:ported:end */
    /* B2:new:start */
    /* B2:new:end */
    /* == /B2 == */
    /* == B4 == */
    'moto-no-arranca' => [
        'group' => 'reparacion',
        'title' => 'Mi moto no arranca: qué revisar',
        'navLabel' => 'Mi moto no arranca',
        'seoTitle' => 'Mi moto no arranca: causas y qué revisar primero',
        'metaDescription' => 'La moto no arranca: las causas más comunes (nafta, batería, bujía, corte de encendido), qué podés revisar vos y cuándo llevarla al taller.',
        'query' => 'mi moto no arranca',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Mi moto no arranca: qué revisar antes de llamar al taller',
            'lead' => 'Una moto que no arranca casi siempre falla por algo simple: combustible, chispa, aire o una batería floja. Acá va el orden para revisarla.',
        ],
        'intro' => [
            'Salís a la mañana, apretás el botón o pateás el pedal y no pasa nada, o el motor gira pero no prende. Antes de pensar en lo peor, tené en cuenta que un motor de cuatro tiempos necesita tres cosas al mismo tiempo para arrancar: **combustible, chispa y aire**, y además algo que lo haga girar, que es la batería con el motor de arranque o tu pierna sobre el pedal. Si falta una sola, no arranca.',
            'Esta guía sigue el orden que usaría cualquier mecánico: primero lo que se revisa en un minuto y sin herramientas, después lo que lleva un poco más. No te damos tiempos ni medidas del fabricante porque cambian de un modelo a otro: para eso está el manual del propietario de tu moto.',
            ['verify' => 'Procedimiento de arranque en frío y en caliente de cada modelo (con o sin starter manual): confirmar en el manual del propietario del modelo.'],
        ],
        'sections' => [
            [
                'h2' => 'Primero, descartá lo más simple',
                'id' => 'lo-simple',
                'body' => [
                    'Parece una pavada, pero explica muchas llamadas a talleres. Revisá esto antes de nada:',
                    ['list' => [
                        '**El tanque tiene nafta.** Los indicadores de combustible de muchas motos son poco precisos. Mirá adentro del tanque con la tapa abierta.',
                        '**La llave de combustible está abierta.** Algunas motos tienen una canilla debajo del tanque con posiciones para abrir, cerrar y reserva.',
                        '**El interruptor de parada (kill switch) está en posición de marcha.** Es el botón rojo junto al puño derecho. Se pasa a apagar sin querer al estacionar o al lavar la moto.',
                        '**El caballete lateral está recogido y la moto está en punto muerto.** Muchas motos tienen un sensor que corta el encendido si hay una marcha puesta con el caballete bajado.',
                        '**El embrague está apretado**, si tu modelo lo exige para arrancar.',
                    ]],
                ],
            ],
            [
                'h2' => 'Síntoma 1: al apretar el botón no pasa nada o suena un clic',
                'id' => 'sin-giro',
                'body' => [
                    'Si el tablero no enciende o las luces se ven muy débiles, el problema casi seguro es eléctrico. Si el motor no gira y sólo oís un clic, la batería no entrega la fuerza suficiente al motor de arranque.',
                    ['list' => [
                        '**Batería descargada o vieja.** Es la causa más frecuente. Si la moto estuvo parada, se descargó sola. Mirá la guía de [batería de moto](/guias/bateria-de-moto) para saber cómo se revisa y cuándo se cambia.',
                        '**Bornes flojos o sulfatados.** Un polvo blanco o verdoso en los bornes impide el contacto. Con la moto apagada y la llave sacada, aflojá, limpiá con un cepillo y volvé a apretar.',
                        '**Fusible principal quemado.** Está en una caja cerca de la batería; el manual indica cuál es y de qué amperaje. Nunca pongas uno de más amperes: el fusible es la protección del cableado.',
                    ]],
                    'Si tu moto tiene pedal de arranque, probá con él. Si prende a pedal, el problema está en la batería o en el motor de arranque, no en el motor.',
                ],
            ],
            [
                'h2' => 'Síntoma 2: el motor gira pero no prende',
                'id' => 'gira-no-prende',
                'body' => [
                    'Acá la batería está bien, porque el motor gira con ganas. Falta combustible, chispa o aire.',
                    ['list' => [
                        '**Bujía mojada o sucia.** Si pateaste mucho con el starter puesto, el motor se ahoga: la bujía queda mojada de nafta y no hace chispa. Sacala, secala y volvé a probar. Más detalles en [bujía de moto](/guias/bujia-de-moto).',
                        '**Nafta vieja o con agua.** Una moto parada por meses deja la nafta degradada, y el agua se mete por la tapa del tanque cuando la moto queda a la intemperie. Si sospechás eso, leé [moto después de la lluvia](/guias/moto-despues-de-la-lluvia).',
                        '**Carburador tapado.** En las motos a carburador, la suciedad bloquea los conductos finos. Los síntomas están en [carburador sucio: síntomas](/guias/carburador-sucio-sintomas).',
                        '**Filtro de aire tapado.** Con el polvo de las calles de tierra se obstruye antes de lo que imaginás y ahoga el motor.',
                        '**Capuchón de bujía flojo.** Es el conector que lleva la chispa. Si está flojo o agrietado, no hay chispa. Se revisa a mano.',
                    ]],
                ],
            ],
            [
                'h2' => 'Síntoma 3: arranca y se apaga enseguida',
                'id' => 'se-apaga',
                'body' => [
                    'Si prende y a los pocos segundos muere, la causa suele ser la mezcla (carburador sucio, ralentí desajustado) o un corte de combustible. Lo desarrollamos en [la moto se apaga sola](/guias/moto-se-apaga-sola).',
                ],
            ],
            [
                'h2' => 'Qué podés revisar vos y qué no',
                'id' => 'vos-o-taller',
                'body' => [
                    'Podés hacer sin riesgo: mirar el tanque, la llave de combustible, el interruptor de parada, el caballete, el estado de los bornes, el capuchón de bujía y sacar la bujía para mirarla (con el motor frío). Todo eso necesita como mucho una llave de bujía, y la tiene casi cualquier kit de herramientas de la moto.',
                    'No lo hagas por tu cuenta: desarmar el carburador sin experiencia, abrir el motor de arranque, tocar el cableado del sistema de carga o probar la chispa poniendo la bujía contra el motor con la mano. Una descarga del encendido es fuerte y desagradable.',
                ],
            ],
            [
                'h2' => 'Cuándo llevarla al taller',
                'id' => 'taller',
                'body' => [
                    ['list' => [
                        'Revisaste lo simple, la batería está bien y la bujía hace chispa, pero igual no prende.',
                        'Huele fuerte a nafta o ves una pérdida debajo de la moto.',
                        'Se quemó el fusible dos veces seguidas: hay un cortocircuito que no se arregla cambiando el fusible.',
                        'El motor de arranque gira muy lento incluso con batería nueva o cargada.',
                    ]],
                    'Llevá la moto empujada o en un transporte, no la remolqués a velocidad. Y contale al mecánico qué hiciste y qué síntomas viste: ahorra tiempo de diagnóstico. Si no sabés a quién preguntar, [escribinos por contacto](/contacto) y te orientamos.',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'No arranques la moto en un garaje cerrado: el monóxido de carbono es inodoro y peligroso. No fumes ni uses fuego cerca del tanque o del carburador, y no pruebes la chispa cerca de la nafta derramada. Antes de tocar la batería o el cableado, sacá la llave.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Por qué mi moto no arranca después de lavarla?', 'a' => 'El agua puede mojar el capuchón de la bujía, los conectores o entrar al filtro de aire. Secá todo con un trapo, esperá y probá de nuevo.'],
            ['q' => '¿Se puede arrancar la moto empujándola?', 'a' => 'En muchas motos con embrague sí, pero no en las automáticas. Consultá el manual: en algunas puede dañar piezas, y si la batería está en mal estado conviene cargarla o cambiarla en vez de empujar.'],
            ['q' => '¿La moto necesita calentarse antes de salir?', 'a' => 'Un momento al ralentí ayuda a que el aceite circule, pero no hace falta dejarla mucho rato. El manual de tu modelo dice qué conviene.'],
        ],
        'links' => [
            ['path' => '/motos', 'label' => 'Todas las motos por marca y tipo'],
            ['path' => '/guias/service-de-moto-que-incluye', 'label' => 'Qué incluye un service de moto'],
        ],
        'related' => ['bateria-de-moto', 'bujia-de-moto', 'carburador-sucio-sintomas', 'moto-se-apaga-sola'],
        'quiz' => null,
        'sources' => [],
    ],
    'cada-cuanto-cambiar-el-aceite-de-la-moto' => [
        'group' => 'reparacion',
        'title' => 'Cada cuánto cambiar el aceite de la moto',
        'navLabel' => 'Cambio de aceite',
        'seoTitle' => 'Cada cuánto cambiar el aceite de la moto',
        'metaDescription' => 'Cada cuánto cambiar el aceite de la moto: de qué depende, dónde está el dato de tu modelo, cómo ver el estado del aceite y las señales de alerta.',
        'query' => 'cada cuánto cambiar aceite moto',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Cada cuánto cambiar el aceite de la moto',
            'lead' => 'No hay una cifra que sirva para todas las motos: el intervalo lo fija el fabricante de la tuya y depende de cómo la usás.',
        ],
        'intro' => [
            'Es la pregunta de mantenimiento que más se repite, y la respuesta honesta es que depende. Cada fabricante prueba su motor y escribe en el manual del propietario cada cuántos kilómetros o meses hay que cambiar el aceite y el filtro. Esa es la única cifra que vale para tu moto, y por eso acá no te damos una: te mostramos dónde encontrarla, qué la hace acortarse y cómo darte cuenta de que el aceite ya no da más.',
            ['verify' => 'Intervalo de cambio de aceite y de filtro por modelo del catálogo: confirmar en el manual del propietario o la ficha del distribuidor oficial; no se publica una cifra genérica.'],
        ],
        'sections' => [
            [
                'h2' => 'Dónde está el dato de tu moto',
                'id' => 'donde-esta-el-dato',
                'body' => [
                    'Buscalo en este orden:',
                    ['ol' => [
                        '**El manual del propietario**, en el capítulo de mantenimiento periódico. Suele haber una tabla con el intervalo en kilómetros y en meses.',
                        '**La libreta de service o la garantía**, si la moto es 0 km. Ahí figura qué services pide la garantía y cuándo.',
                        '**El comercio o distribuidor oficial de la marca.** Si perdiste el manual, pedí una copia o la ficha del modelo.',
                    ]],
                    'Fijate que el intervalo suele estar dado por kilómetros **o** por tiempo, lo que ocurra primero. Una moto que anda poco igual necesita cambio de aceite por el paso del tiempo, porque el aceite se degrada aunque no ruede.',
                ],
            ],
            [
                'h2' => 'Qué hace que el aceite se gaste antes',
                'id' => 'que-lo-acorta',
                'body' => [
                    'El intervalo del manual está pensado para un uso normal. Estas condiciones, muy comunes acá, castigan más al aceite y conviene preguntar en el taller si hay que adelantar el cambio:',
                    ['list' => [
                        '**Calor y tráfico lento**: andar en ciudad con el motor caliente y parado en los semáforos.',
                        '**Polvo y caminos de tierra**, que ensucian el aceite si el filtro de aire no está en buen estado.',
                        '**Viajes cortos repetidos**: el motor no llega a temperatura y se acumula humedad en el aceite.',
                        '**Carga pesada**, como el delivery con mochila o el trabajo con acompañante.',
                        '**Motos con muchos años de uso**, que pueden consumir un poco de aceite.',
                    ]],
                    'No inventes un intervalo propio más corto "por las dudas" sin preguntar: cambiar de más no hace daño al motor, pero sale plata, y el taller te puede orientar sobre qué es razonable para tu moto y tu uso.',
                ],
            ],
            [
                'h2' => 'Cómo mirar el estado del aceite vos mismo',
                'id' => 'como-mirar',
                'body' => [
                    'Aunque esté dentro del intervalo, mirá el aceite cada tanto. Con la moto sobre terreno plano y siguiendo lo que diga el manual (algunas se miran en frío y otras en caliente, con la moto derecha o en el caballete central):',
                    ['ol' => [
                        'Buscá la varilla o la mirilla de nivel. En muchas motos hay una mirilla de vidrio en el lateral del motor.',
                        'Mirá que el nivel esté entre las marcas de mínimo y máximo. Si está bajo, completá con el mismo tipo de aceite que usás (ver [qué aceite usar en la moto](/guias/que-aceite-usar-en-la-moto)).',
                        'Frotá una gota entre los dedos o sobre un papel blanco: si está muy negro y con partículas, o con aspecto de café con leche, hay un problema.',
                    ]],
                    'Un aceite oscuro no siempre es malo: el aceite limpia el motor y se oscurece. Lo que importa es el nivel, que no tenga partículas metálicas visibles y que no tenga agua.',
                ],
            ],
            [
                'h2' => 'Señales de que no podés esperar',
                'id' => 'senales',
                'body' => [
                    ['list' => [
                        'Aparece la luz de presión de aceite en el tablero: **apagá el motor** y no sigas manejando.',
                        'El motor suena más ruidoso o "golpea" de pronto.',
                        'Notás pérdida o mancha de aceite debajo de la moto.',
                        'El aceite tiene color lechoso (posible entrada de agua o líquido de refrigeración).',
                        'La moto empezó a sacar humo azulado: mirá [humo blanco o azul en la moto](/guias/humo-blanco-o-azul-moto).',
                    ]],
                ],
            ],
            [
                'h2' => 'Cambiarlo vos o en el taller',
                'id' => 'vos-o-taller',
                'body' => [
                    'Si hacés el cambio en casa, necesitás el aceite correcto, el filtro si tu modelo lo tiene, una bandeja para recoger el aceite viejo y el torque de apriete del tapón de drenaje, que figura en el manual: no lo calcules a ojo. Un tapón roscado de más puede arruinar la rosca del cárter, y uno flojo pierde aceite.',
                    'El aceite usado contamina: no lo tires al suelo ni a la cloaca. Guardalo en un envase cerrado y preguntá en el taller o en la estación de servicio si lo reciben.',
                    'Si no tenés práctica o herramientas, pedí que lo haga un taller. Es un trabajo corto. Y aprovechá para que revisen el filtro de aire y la cadena, como en un [service de moto](/guias/service-de-moto-que-incluye).',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'El motor y el aceite recién usados queman. Esperá a que baje la temperatura antes de abrir el tapón. Si derramás aceite sobre el piso, limpialo: es muy resbaloso. Y si el aceite llega a las cubiertas o a los frenos, limpialos antes de salir.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿El aceite se cambia aunque la moto casi no ande?', 'a' => 'Sí, el aceite también se degrada con el tiempo. El manual da el intervalo en kilómetros o en meses, lo que se cumpla primero.'],
            ['q' => '¿Siempre se cambia el filtro junto con el aceite?', 'a' => 'Depende del modelo. El manual indica cuándo se cambia el filtro y cada cuánto se limpia el colador, si tiene.'],
            ['q' => '¿Puedo mezclar aceites distintos para completar?', 'a' => 'Para una emergencia, sí, con un aceite de la misma especificación. Para el cambio completo usá el que pide tu manual.'],
        ],
        'links' => [
            ['path' => '/motos', 'label' => 'Motos por marca y tipo'],
            ['path' => '/guias/cuanto-cuesta-mantener-una-moto', 'label' => 'Cuánto cuesta mantener una moto'],
        ],
        'related' => ['que-aceite-usar-en-la-moto', 'service-de-moto-que-incluye', 'humo-blanco-o-azul-moto'],
        'quiz' => null,
        'sources' => [],
    ],
    'que-aceite-usar-en-la-moto' => [
        'group' => 'reparacion',
        'title' => 'Qué aceite usar en la moto',
        'navLabel' => 'Qué aceite usar',
        'seoTitle' => 'Qué aceite usar en la moto: cómo elegir el correcto',
        'metaDescription' => 'Qué aceite usar en la moto: cómo leer la viscosidad y la especificación, por qué importa si tiene embrague húmedo y dónde ver lo que pide tu modelo.',
        'query' => 'qué aceite usar en la moto',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Qué aceite usar en la moto',
            'lead' => 'El aceite correcto es el que pide el fabricante de tu moto. Te explicamos cómo leer las etiquetas para elegirlo sin equivocarte.',
        ],
        'intro' => [
            'En la góndola de una casa de repuestos hay muchos envases con siglas que parecen un código. Por suerte no hace falta entender toda la química: alcanza con saber qué dice el manual de tu moto y comparar con lo que dice el envase. Esta guía te enseña a leer esas siglas y por qué no sirve cualquier aceite, ni siquiera uno de auto.',
            ['verify' => 'Viscosidad y especificación (JASO, API) recomendadas para cada modelo del catálogo: confirmar en el manual del propietario o la ficha del fabricante.'],
        ],
        'sections' => [
            [
                'h2' => 'Primero, lo que dice tu manual',
                'id' => 'el-manual',
                'body' => [
                    'El manual del propietario indica tres datos: la **viscosidad** recomendada (algo como "10W-40", que es una sigla, no una receta que valga para todos), la **especificación o norma** que debe cumplir el aceite, y la **cantidad** que lleva el motor con y sin cambio de filtro. Anotalos en el celular o en la libreta de la moto.',
                    'Si no tenés el manual, pedí en el distribuidor oficial de la marca o en un taller que trabaje con ella el dato de tu modelo. No te guíes por lo que le sirve a la moto de un amigo: puede ser de otra cilindrada o tener otro sistema de embrague.',
                ],
            ],
            [
                'h2' => 'Cómo se lee el envase',
                'id' => 'como-leer',
                'body' => [
                    ['list' => [
                        '**Viscosidad (por ejemplo 10W-40).** Describe qué tan espeso es el aceite. El primer número con la W (de "winter") tiene que ver con cómo fluye en frío; el segundo, con cómo se comporta caliente. Usá la que pide el manual, no una más espesa "para que proteja más".',
                        '**Tipo de aceite**: mineral, semisintético o sintético. Cambia la base del aceite y su resistencia al calor. El manual dice si exige uno determinado; si no lo exige, preguntá en el taller cuál conviene para tu uso.',
                        '**Norma JASO MA / MA2 / MB.** Es una norma pensada para motos. Si tu moto tiene el embrague bañado en el mismo aceite del motor (la mayoría de las motos), buscá la norma que indica el manual. Un aceite de otra clase puede hacer patinar el embrague.',
                        '**Norma API (SL, SM, SN, etc.).** Indica el nivel de calidad del aceite. Mirá cuál pide tu manual.',
                    ]],
                ],
            ],
            [
                'h2' => 'Por qué no sirve el aceite de auto',
                'id' => 'aceite-de-auto',
                'body' => [
                    'Algunos aceites de auto llevan aditivos que reducen la fricción. Eso es bueno en un motor de auto, pero en una moto con embrague húmedo puede hacer que el embrague resbale y se desgaste. Además, en muchas motos el mismo aceite lubrica el motor, la caja de cambios y el embrague, y trabaja en condiciones más exigentes. Por eso conviene comprar el aceite específico para motos con la especificación que pide el manual.',
                    'Si dudás entre dos envases, fijate si dice "para motocicletas" o trae la norma JASO. Si el vendedor te dice "este sirve para todo", pedile que te muestre en el envase la norma que figura en tu manual.',
                ],
            ],
            [
                'h2' => 'Motos de dos tiempos, automáticas y otras',
                'id' => 'otros-casos',
                'body' => [
                    'Las motos de dos tiempos usan aceite para mezcla o inyección y no el mismo que las de cuatro tiempos. Las scooters automáticas suelen tener otros sistemas, como una transmisión CVT y un lubricante aparte para la caja reductora. Si tu moto es de alguno de esos tipos, no uses un aceite genérico: mirá el manual y preguntá en el taller de la marca. Las scooters de nuestro catálogo, por ejemplo, están agrupadas en [motos por tipo](/motos), y cada una puede tener sus propias indicaciones en la ficha del fabricante.',
                ],
            ],
            [
                'h2' => 'Cómo evitar un aceite falsificado o dudoso',
                'id' => 'comprar-bien',
                'body' => [
                    ['list' => [
                        'Comprá en una casa de repuestos conocida, y guardá el comprobante.',
                        'Desconfiá de un precio muy por debajo del resto del mismo envase.',
                        'Fijate que el envase esté cerrado, con el precinto intacto y la información impresa de forma nítida.',
                        'Si cambiás el aceite en un taller, pedí ver el envase que van a usar.',
                    ]],
                    'No damos precios porque cambian por marca, ciudad y casa de repuestos: pedí el presupuesto antes de comprar.',
                ],
            ],
            [
                'h2' => 'Cuándo consultar al taller',
                'id' => 'taller',
                'body' => [
                    'Preguntá si tu moto tiene muchos años de uso, si consume aceite, si trabajás a diario con carga o si tenés dudas sobre la especificación. También cuando el aceite cambia de color de golpe o notás [humo azul o blanco](/guias/humo-blanco-o-azul-moto). Para saber cada cuánto hay que cambiarlo, leé [cada cuánto cambiar el aceite de la moto](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto).',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'Un aceite equivocado puede hacer patinar el embrague en plena marcha. Si después de un cambio de aceite la moto acelera pero no avanza como antes, no la fuerces: volvé al taller. Y guardá los envases lejos de niños y animales.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Un aceite más caro es siempre mejor?', 'a' => 'No necesariamente. Lo importante es que cumpla la viscosidad y la norma del manual. Un sintético puede ser mejor para ciertos usos, pero preguntá en el taller antes de decidir.'],
            ['q' => '¿Puedo usar el mismo aceite en todas las motos de la familia?', 'a' => 'Sólo si el manual de cada una pide lo mismo. No lo supongas: verificalo modelo por modelo.'],
        ],
        'links' => [
            ['path' => '/motos', 'label' => 'Motos por marca y tipo'],
        ],
        'related' => ['cada-cuanto-cambiar-el-aceite-de-la-moto', 'embrague-de-moto', 'service-de-moto-que-incluye'],
        'quiz' => null,
        'sources' => [],
    ],
    'como-tensar-la-cadena-de-la-moto' => [
        'group' => 'reparacion',
        'title' => 'Cómo tensar y lubricar la cadena de la moto',
        'navLabel' => 'Tensar la cadena',
        'seoTitle' => 'Cómo tensar la cadena de la moto paso a paso',
        'metaDescription' => 'Cómo tensar la cadena de la moto: cómo medir la holgura, qué herramientas necesitás, cómo lubricarla y las señales de que ya hay que cambiarla.',
        'query' => 'cómo tensar la cadena de la moto',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Cómo tensar la cadena de la moto',
            'lead' => 'Una cadena floja o demasiado tensa se gasta rápido y puede soltarse. Se revisa en pocos minutos, y con calma lo hacés vos.',
        ],
        'intro' => [
            'La cadena de transmisión lleva la fuerza del motor a la rueda trasera. Trabaja expuesta al polvo, al barro y a la lluvia, así que es una de las piezas que más atención pide en las calles de tierra de acá. Un mantenimiento simple (limpiar, lubricar y regular la tensión) alarga la vida de la cadena, del piñón y de la corona, que se cambian juntos y son los repuestos del [kit de arrastre](/guias/kit-de-arrastre-de-moto).',
            'La holgura correcta (cuánto puede subir y bajar la cadena en el tramo medio) la define el fabricante en el manual de tu modelo. No te damos una medida porque cambia de moto en moto.',
            ['verify' => 'Holgura recomendada de la cadena y torque de la tuerca del eje trasero por modelo: confirmar en el manual del propietario.'],
        ],
        'sections' => [
            [
                'h2' => 'Cuándo revisar la tensión',
                'id' => 'cuando-revisar',
                'body' => [
                    ['list' => [
                        'Cada tanto, como hábito, por ejemplo al cargar nafta. El manual dice cada cuánto.',
                        'Después de andar por barro o polvo, o después de lavar la moto.',
                        'Cuando oís un traqueteo al soltar o acelerar, o notás tirones al cambiar de marcha.',
                        'Si la cadena se ve con óxido, rígida en algunos eslabones o con mucho juego.',
                    ]],
                ],
            ],
            [
                'h2' => 'Qué necesitás',
                'id' => 'herramientas',
                'body' => [
                    'Las herramientas del kit de la moto suelen alcanzar. Necesitás una llave para la tuerca del eje y otra para las contratuercas del tensor, un trapo, un limpiador de cadenas (o kerosene en poca cantidad según recomiende el taller), lubricante específico para cadenas y, si es posible, un caballete de taller para levantar la rueda trasera. Si no lo tenés, apoyá la moto sobre el caballete central o pedí que te ayuden a sostenerla.',
                ],
            ],
            [
                'h2' => 'Paso a paso',
                'id' => 'paso-a-paso',
                'body' => [
                    ['ol' => [
                        'Apagá el motor, dejá la moto en punto muerto y asegurala para que no se caiga.',
                        'Limpiá la cadena con un trapo y un limpiador adecuado. Sin suciedad es más fácil ver el estado real.',
                        'Con la moto estable, apretá la cadena hacia arriba y hacia abajo en el tramo del medio y mirá cuánto juego tiene. Compará con la medida de tu manual.',
                        'Si hay que regular, aflojá la tuerca del eje trasero lo justo para que la rueda pueda moverse.',
                        'Ajustá los tensores de los dos lados **en la misma medida**, usando las marcas de la basculante como guía. Si no queda alineada, la rueda trasera queda torcida y la cadena se gasta de un solo lado.',
                        'Verificá de nuevo la holgura, apretá la tuerca del eje con el torque que indica el manual y asegurá las contratuercas.',
                        'Lubricá la cadena (ver abajo) y girá la rueda para comprobar que gira libre y la cadena no roza.',
                    ]],
                ],
            ],
            [
                'h2' => 'Cómo lubricarla',
                'id' => 'lubricar',
                'body' => [
                    'Usá un lubricante hecho para cadenas de moto. No uses aceite usado ni grasa espesa: atrapan polvo y forman una pasta abrasiva. Aplicalo sobre la parte interior de la cadena, con la rueda girando despacio, y dejá que penetre antes de salir. Limpiá el exceso para que no salpique a la llanta ni a la cubierta trasera, porque eso afecta el agarre. Si hay llovizna o barro seco, limpiá antes de lubricar.',
                    'Las cadenas con retenes (de tipo O-ring) piden productos compatibles con esos retenes: leé lo que dice el envase o consultá en el taller.',
                ],
            ],
            [
                'h2' => 'Señales de que hay que cambiarla',
                'id' => 'cambiar',
                'body' => [
                    ['list' => [
                        'La cadena no se deja tensar bien: ya está en el límite de los tensores y sigue floja.',
                        'Eslabones rígidos que no se doblan o que se traban.',
                        'Dientes del piñón y de la corona con forma de gancho o muy afilados.',
                        'Óxido profundo o el lubricante no se adhiere.',
                    ]],
                    'La cadena, el piñón y la corona se cambian en conjunto: una cadena nueva sobre un piñón gastado se estira rápido. Más en [kit de arrastre de moto](/guias/kit-de-arrastre-de-moto).',
                ],
            ],
            [
                'h2' => 'Cuándo ir al taller',
                'id' => 'taller',
                'body' => [
                    'Andá si la rueda no queda alineada, si el eje no se deja ajustar, si la cadena salta o golpea la basculante, o si no tenés las llaves y el torque correcto. Hay motos con transmisión por cardán o correa, sin cadena, y en esas la guía no aplica. También consultá si la moto es scooter automática, que usa otra transmisión. Si necesitás una orientación, escribinos desde [contacto](/contacto).',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'Con el motor apagado y el pie lejos de la cadena. Nunca regules una cadena con el motor en marcha ni la limpies con la rueda girando por su cuenta. Una cadena que se suelta en marcha puede bloquear la rueda trasera o golpearte la pierna: si dudás, no salgas.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Una cadena muy tensa es mejor que una floja?', 'a' => 'No. Demasiado tensa fuerza el piñón, la corona y los rodamientos. Seguí la medida del manual.'],
            ['q' => '¿Puedo lavar la cadena con agua a presión?', 'a' => 'Mejor evitarlo: puede meter agua y arena en los eslabones. Limpiá con un trapo y un producto adecuado.'],
        ],
        'links' => [
            ['path' => '/motos', 'label' => 'Motos por marca y tipo'],
        ],
        'related' => ['kit-de-arrastre-de-moto', 'service-de-moto-que-incluye', 'moto-despues-de-la-lluvia'],
        'quiz' => null,
        'sources' => [],
    ],
    'kit-de-arrastre-de-moto' => [
        'group' => 'reparacion',
        'title' => 'Kit de arrastre de moto: cuándo cambiarlo',
        'navLabel' => 'Kit de arrastre',
        'seoTitle' => 'Kit de arrastre de moto: cuándo cambiarlo',
        'metaDescription' => 'Qué es el kit de arrastre de una moto (cadena, piñón y corona), por qué se cambia en conjunto y cómo saber si el tuyo ya no da más.',
        'query' => 'kit de arrastre moto',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Kit de arrastre de moto: qué es y cuándo cambiarlo',
            'lead' => 'Cadena, piñón y corona forman un conjunto que se gasta junto. Cambiar sólo una pieza suele salir caro a la larga.',
        ],
        'intro' => [
            'Cuando el taller te dice que hay que cambiar "el kit de arrastre" (también llamado kit de transmisión), se refiere a tres piezas: la **cadena**, el **piñón** (el engranaje chico que sale de la caja de cambios) y la **corona** (el engranaje grande de la rueda trasera). Las tres trabajan en contacto permanente y se desgastan a la vez. Si ponés una cadena nueva sobre un piñón o una corona gastados, la cadena nueva se estira rápido y perdés el cambio que hiciste.',
            'No te damos intervalos ni precios: dependen del modelo, de la calidad del kit y de cómo se use y cuide la moto. Lo que sí podés hacer es aprender las señales de desgaste y llevar un registro propio de cuántos kilómetros te dura cada kit.',
            ['verify' => 'Vida útil orientativa del kit por modelo y medida de la cadena (paso y cantidad de eslabones) de cada modelo del catálogo: confirmar en el manual o en la ficha del fabricante.'],
        ],
        'sections' => [
            [
                'h2' => 'Señales de que el kit está gastado',
                'id' => 'senales',
                'body' => [
                    ['list' => [
                        '**La cadena ya no se puede tensar** porque llegó al final del recorrido del tensor.',
                        '**Dientes en forma de gancho o de aleta de tiburón** en el piñón o la corona: en vez de ser simétricos, quedan puntiagudos y torcidos.',
                        '**Eslabones duros o torcidos**, o con óxido que no sale al lubricar.',
                        '**Ruido de golpeteo** en la transmisión al acelerar y soltar, o tirones en las marchas.',
                        '**La cadena se separa mucho de la corona** cuando tirás de ella hacia atrás en un punto de la rueda.',
                    ]],
                    'Si ves más de una de estas señales, no esperes a que se corte. Una cadena rota en marcha puede bloquear la rueda o dañar el cárter del motor.',
                ],
            ],
            [
                'h2' => 'Qué se cambia y qué no',
                'id' => 'que-se-cambia',
                'body' => [
                    'Lo correcto es cambiar las tres piezas a la vez. Hay talleres que cambian sólo cadena y piñón cuando la corona está en buen estado; la decisión la toma el mecánico mirando los dientes de la corona. Si el taller te propone cambiar sólo la cadena, preguntale por qué y pedí que te muestre el estado de los engranajes.',
                    'También hay que revisar el **retén del piñón** y el estado de la rueda trasera: si hay pérdidas de aceite, la cadena se ensucia y se gasta antes.',
                ],
            ],
            [
                'h2' => 'Cómo elegir el repuesto',
                'id' => 'elegir',
                'body' => [
                    'El kit tiene que ser **el de tu modelo**: la cantidad de dientes del piñón y la corona, y el paso de la cadena, están definidos por el fabricante. Comprá en una casa de repuestos con experiencia en tu marca y llevá, si podés, el kit viejo para compararlo. Los repuestos de las marcas con más presencia en Paraguay suelen conseguirse con facilidad; en motos menos comunes preguntá antes de comprar la moto o antes de desarmar. Mirá las motos del catálogo en [motos por marca](/motos).',
                    'Desconfiá de los kits de precio muy bajo sin marca: algunos usan acero blando y se estiran enseguida.',
                ],
            ],
            [
                'h2' => 'Cómo hacer que dure más',
                'id' => 'que-dure',
                'body' => [
                    ['list' => [
                        'Lubricá y tensá la cadena como indica [cómo tensar la cadena de la moto](/guias/como-tensar-la-cadena-de-la-moto).',
                        'Limpiá después del barro o la lluvia.',
                        'No acelerés a fondo con carga pesada cuando la cadena está floja.',
                        'Revisá la alineación de la rueda trasera después de cada ajuste.',
                    ]],
                ],
            ],
            [
                'h2' => 'Cuándo llevarla al taller',
                'id' => 'taller',
                'body' => [
                    'Cambiar el kit requiere desarmar la tapa del piñón, aflojar el eje trasero y ajustar con el torque del manual. Si no tenés herramientas ni práctica, es un trabajo para taller. Pedí el presupuesto por escrito, que te muestren las piezas viejas, y fijate que se cambien con la cadena nueva bien lubricada y alineada.',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'No manejes con una cadena muy gastada ni con eslabones trabados. Si se corta en marcha puede bloquear la rueda trasera. Tras un cambio de kit, probá la moto a baja velocidad en un lugar tranquilo antes de volver al tránsito.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cada cuántos kilómetros se cambia el kit de arrastre?', 'a' => 'No hay una cifra única: depende del modelo, del uso y del mantenimiento. Llevá tu propio registro de kilómetros entre cambios y consultá el manual.'],
            ['q' => '¿Se puede reutilizar un piñón viejo con una cadena nueva?', 'a' => 'No conviene: el desgaste de los dientes acorta la vida de la cadena nueva.'],
        ],
        'links' => [
            ['path' => '/guias/cuanto-cuesta-mantener-una-moto', 'label' => 'Cuánto cuesta mantener una moto'],
        ],
        'related' => ['como-tensar-la-cadena-de-la-moto', 'service-de-moto-que-incluye', 'moto-pierde-potencia'],
        'quiz' => null,
        'sources' => [],
    ],
    'bateria-de-moto' => [
        'group' => 'reparacion',
        'title' => 'Batería de moto: síntomas, cuidado y cambio',
        'navLabel' => 'Batería de moto',
        'seoTitle' => 'Batería de moto: síntomas, cuidado y cuándo cambiarla',
        'metaDescription' => 'Batería de moto descargada o vieja: cómo darte cuenta, cómo cuidarla, qué hacer si la moto estuvo parada y cuándo conviene cambiarla.',
        'query' => 'batería de moto no carga',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Batería de moto: síntomas, cuidado y cambio',
            'lead' => 'Si la moto arranca lento, el tablero parpadea o se apagan las luces, mirá primero la batería. Acá tenés cómo revisarla y cuidarla.',
        ],
        'intro' => [
            'La batería alimenta el motor de arranque, las luces, el tablero y la inyección en las motos que la tienen. Mientras el motor anda, un generador (alternador) la recarga. Cuando la batería falla, la moto puede no arrancar, arrancar con esfuerzo o apagarse con las luces encendidas. En motos con pedal de arranque, como muchas de uso diario en Paraguay, a veces ni te das cuenta del problema hasta que tenés que usar el botón.',
            'No damos tiempos de vida ni valores de voltaje porque dependen del tipo de batería y del modelo. Si tenés un multímetro, el manual o el taller te dicen qué valores esperar.',
            ['verify' => 'Tipo, capacidad (Ah) y medidas de la batería de cada modelo del catálogo, y valores de voltaje de carga: confirmar en el manual del propietario o la ficha del fabricante.'],
        ],
        'sections' => [
            [
                'h2' => 'Síntomas de una batería débil',
                'id' => 'sintomas',
                'body' => [
                    ['list' => [
                        'El motor de arranque gira lento o sólo hace un clic.',
                        'Las luces se ven apagadas con el motor al ralentí y mejoran al acelerar.',
                        'El tablero se reinicia o parpadea al apretar el botón de arranque.',
                        'La moto arranca bien en caliente pero no después de estar parada una noche.',
                        'El claxon suena débil.',
                    ]],
                    'Estos síntomas también pueden venir de un problema de carga (el alternador o el regulador) o de bornes flojos. Si cambiás la batería y el problema vuelve, el defecto está en otro lado.',
                ],
            ],
            [
                'h2' => 'Qué podés revisar vos',
                'id' => 'revisar',
                'body' => [
                    ['ol' => [
                        '**Los bornes.** Con la llave sacada, mirá que estén firmes y sin polvo blanco o verde. Si hay sulfatación, limpiá con un cepillo y apretá. Un poco de grasa protectora en los bornes ayuda a que no se vuelvan a sulfatar.',
                        '**El estado exterior.** Una carcasa hinchada, partida o con fugas es una batería para cambiar ya. No intentes repararla.',
                        '**El nivel de líquido**, sólo si la batería es de las que lo permiten (las selladas no se abren). Si está bajo, se rellena con agua destilada y no con agua de la canilla; el manual o el taller te dicen cómo.',
                        '**Con un multímetro**, mirá el voltaje en reposo y con el motor en marcha. Los valores correctos los dice el manual; si no los tenés, un taller los mide en pocos minutos.',
                    ]],
                ],
            ],
            [
                'h2' => 'Cuidados que alargan su vida',
                'id' => 'cuidados',
                'body' => [
                    ['list' => [
                        'Usá la moto con frecuencia: viajes muy cortos no alcanzan a recargarla.',
                        'Si va a quedar parada mucho tiempo, desconectala o usá un cargador de mantenimiento (ver [guardar la moto mucho tiempo](/guias/guardar-la-moto-mucho-tiempo)).',
                        'No dejes las luces ni accesorios (USB, alarma, luces extra) conectados con el motor apagado.',
                        'Si instalás accesorios eléctricos, pedí que el taller verifique que el sistema de carga lo soporta.',
                        'Con el calor, el líquido de las baterías abiertas se evapora más: revisá el nivel si es de las que lo permiten.',
                    ]],
                ],
            ],
            [
                'h2' => 'Cómo cargarla o reemplazarla',
                'id' => 'cargar-o-cambiar',
                'body' => [
                    'Una batería que se descargó una vez por un olvido, y es relativamente nueva, puede recuperarse con un cargador adecuado para baterías de moto, siguiendo la corriente de carga indicada en el manual del cargador y de la batería. Un cargador de auto puede ser demasiado fuerte y dañarla. Si se descarga seguido, está llegando al final de su vida.',
                    'Para reemplazarla, usá una del mismo tipo y capacidad que pide el manual de tu modelo. Hay baterías convencionales, selladas y de gel. Al cambiarla, desconectá primero el borne negativo y volvé a conectarlo al final. Pedí en la casa de repuestos la que corresponde por código de tu modelo, y no una "parecida". Si la batería vieja no sirve, no la tires a la basura común: tiene plomo y ácido. Llevala al comercio que vende las nuevas, que suele recibirlas.',
                ],
            ],
            [
                'h2' => 'Cuándo ir al taller',
                'id' => 'taller',
                'body' => [
                    'Si la batería es nueva y la moto igual no arranca, si se descarga en pocos días aunque no la uses, si ves humo o sentís olor a quemado, o si el regulador y el alternador parecen fallar (luces que brillan de más y se queman), llevala. Un mecánico mide si el sistema de carga entrega lo que debe. Mientras tanto, mirá [mi moto no arranca](/guias/moto-no-arranca) para descartar otras causas.',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'La batería contiene ácido y puede soltar gases inflamables al cargarse. Cargala en un lugar ventilado, sin chispas ni fuego cerca, con guantes y anteojos si la manipulás. No pongas en cortocircuito los bornes con una herramienta metálica, y nunca la abras.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Puedo arrancar la moto con cables de otra batería?', 'a' => 'Se puede en algunas motos, pero hay que respetar polaridad y no usar una batería de auto con el motor del auto en marcha. Si no estás seguro, no lo hagas: el manual o el taller te dicen si tu moto lo permite.'],
            ['q' => '¿Por qué se descarga la batería si la moto está parada?', 'a' => 'Todas las baterías pierden carga solas con el tiempo. Una moto sin uso necesita un cargador de mantenimiento o desconectar la batería.'],
        ],
        'links' => [
            ['path' => '/motos', 'label' => 'Motos por marca y tipo'],
        ],
        'related' => ['moto-no-arranca', 'guardar-la-moto-mucho-tiempo', 'moto-se-apaga-sola'],
        'quiz' => null,
        'sources' => [],
    ],
    'bujia-de-moto' => [
        'group' => 'reparacion',
        'title' => 'Bujía de moto: cómo leerla y cuándo cambiarla',
        'navLabel' => 'Bujía de moto',
        'seoTitle' => 'Bujía de moto: cómo leerla y cuándo cambiarla',
        'metaDescription' => 'Bujía de moto: cómo sacarla, qué te dice su color, cuándo cambiarla y por qué usar la que pide tu modelo. Guía simple y con seguridad.',
        'query' => 'bujía de moto cuándo cambiar',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Bujía de moto: cómo leerla y cuándo cambiarla',
            'lead' => 'Una bujía en mal estado hace que la moto arranque mal, falle y gaste más nafta. Es de las revisiones más baratas y más útiles.',
        ],
        'intro' => [
            'La bujía produce la chispa que enciende la mezcla de aire y nafta dentro del motor. Si está desgastada, sucia o es del tipo equivocado, la moto cuesta para arrancar, tironea o gasta más combustible. Además, la bujía es como una "ventana" al motor: su aspecto cuando la sacás da pistas sobre cómo está funcionando.',
            'Cada motor pide una bujía con una referencia concreta (código) y una separación de electrodos determinada. No damos esos datos porque cambian por modelo: están en el manual del propietario.',
            ['verify' => 'Código de bujía, separación de electrodos, torque de apriete e intervalo de cambio de cada modelo del catálogo: confirmar en el manual del propietario o la ficha del fabricante.'],
        ],
        'sections' => [
            [
                'h2' => 'Síntomas de una bujía en mal estado',
                'id' => 'sintomas',
                'body' => [
                    ['list' => [
                        'La moto cuesta arrancar, sobre todo en frío.',
                        'Falla o "tose" al acelerar.',
                        'Ralentí inestable o el motor se apaga al parar.',
                        'Gasta más nafta de lo habitual (ver [moto gasta mucha nafta](/guias/moto-gasta-mucha-nafta)).',
                        'Pierde fuerza en subidas (ver [moto pierde potencia](/guias/moto-pierde-potencia)).',
                    ]],
                ],
            ],
            [
                'h2' => 'Cómo sacarla y mirarla',
                'id' => 'sacar-y-mirar',
                'body' => [
                    ['ol' => [
                        'Con el motor **frío** y apagado, sacá el capuchón tirando de él (no del cable).',
                        'Soplá o limpiá alrededor de la bujía para que no caiga tierra al cilindro.',
                        'Aflojá con la llave de bujía de la moto, sin forzar en ángulo.',
                        'Mirá la punta: el aspecto te cuenta qué pasa.',
                    ]],
                    ['list' => [
                        '**Color marrón claro o grisáceo, seco:** normal, el motor trabaja bien.',
                        '**Negra, seca y con hollín:** mezcla rica o filtro de aire tapado; también por mucho uso en ciudad.',
                        '**Mojada de nafta:** el motor se ahogó o hay exceso de combustible.',
                        '**Mojada de aceite:** posible consumo de aceite; consultá al taller.',
                        '**Blanca, con aspecto de ceniza o con electrodos quemados:** mezcla pobre o motor muy caliente; no ignores este aspecto.',
                    ]],
                ],
            ],
            [
                'h2' => 'Limpiarla o cambiarla',
                'id' => 'limpiar-o-cambiar',
                'body' => [
                    'Una bujía con un poco de hollín puede limpiarse con un cepillo de alambre fino y soplando. Pero si tiene los electrodos redondeados o gastados, la cerámica rota o ya cumplió el período del manual, cambiala: es un repuesto de bajo costo comparado con lo que puede causar. Consultá la medida y el precio en la casa de repuestos con el código de tu modelo; no damos precios porque varían.',
                    'Cuando coloques la nueva, enroscala a mano al principio para no dañar la rosca del cabezal y terminá con la llave siguiendo el torque del manual. Un apriete excesivo rompe la rosca de aluminio, y uno flojo deja que la bujía se caliente demasiado y pierda compresión.',
                ],
            ],
            [
                'h2' => 'No cualquier bujía sirve',
                'id' => 'la-correcta',
                'body' => [
                    'Hay bujías de distinto grado térmico y largo de rosca. Una que sea más larga puede tocar el pistón, y una de grado térmico equivocado puede recalentarse o ensuciarse. Usá la que figura en tu manual. Si se trata de una moto con motor de dos tiempos o inyección, consultá antes. Las que se sacan de motos de otra cilindrada pueden parecer iguales y no serlo.',
                ],
            ],
            [
                'h2' => 'Cuándo ir al taller',
                'id' => 'taller',
                'body' => [
                    'Si al sacar la bujía ves aceite, residuos metálicos o la porcelana rota, si el motor sigue fallando con una bujía nueva, o si la rosca quedó dañada, llevala. También si la bujía vuelve a ensuciarse rápido: puede haber un problema de mezcla o de filtro. Antes de eso, repasá [carburador sucio: síntomas](/guias/carburador-sucio-sintomas) y [moto no arranca](/guias/moto-no-arranca).',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'No toques la bujía ni el capuchón con el motor en marcha: la chispa da una descarga fuerte. No saques la bujía con el motor caliente, porque la rosca de aluminio se puede dañar y te podés quemar. Evitá probar chispa cerca de nafta derramada.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cada cuánto se cambia la bujía?', 'a' => 'Lo dice el manual de tu modelo. No hay una cifra válida para todas las motos.'],
            ['q' => '¿Sirve una bujía de otra marca?', 'a' => 'Sí, mientras tenga la misma referencia técnica (tamaño de rosca, grado térmico, largo). Pedí en la casa de repuestos la equivalencia.'],
        ],
        'links' => [
            ['path' => '/motos', 'label' => 'Motos por marca y tipo'],
        ],
        'related' => ['moto-no-arranca', 'moto-gasta-mucha-nafta', 'moto-pierde-potencia'],
        'quiz' => null,
        'sources' => [],
    ],
    'pastillas-de-freno-moto' => [
        'group' => 'reparacion',
        'title' => 'Pastillas de freno de moto: desgaste y cambio',
        'navLabel' => 'Pastillas de freno',
        'seoTitle' => 'Pastillas de freno de moto: cuándo cambiarlas',
        'metaDescription' => 'Pastillas de freno de moto: cómo ver el desgaste, ruidos y señales de cambio, diferencia con las zapatas y por qué no conviene esperar.',
        'query' => 'pastillas de freno moto',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Pastillas de freno de moto: cómo ver el desgaste y cuándo cambiarlas',
            'lead' => 'Los frenos son lo último que conviene dejar para después. Revisá las pastillas seguido y cambialas antes de quedar sin material.',
        ],
        'intro' => [
            'Las pastillas de freno son la pieza que roza contra el disco para detener la moto. Se desgastan con cada frenada, y se gastan más rápido si manejás en ciudad con mucho tránsito, con carga o en bajadas largas. En motos con freno a tambor, en lugar de pastillas hay zapatas, que cumplen la misma función; muchas motos de baja cilindrada, comunes en Paraguay, tienen disco adelante y tambor atrás. Revisá en la ficha de tu modelo qué tipo de freno tiene cada rueda.',
            'El límite de desgaste y el torque de los tornillos los fija el fabricante: están en el manual. No ponemos cifras en esta guía.',
            ['verify' => 'Espesor mínimo del material de fricción, tipo de freno delantero y trasero y torque de las pinzas por modelo: confirmar en el manual del propietario o en la ficha técnica del fabricante.'],
        ],
        'sections' => [
            [
                'h2' => 'Señales de pastillas gastadas',
                'id' => 'senales',
                'body' => [
                    ['list' => [
                        '**Chirrido agudo o un rechinar metálico** al frenar. El metálico indica que ya se gastó el material y el soporte roza contra el disco.',
                        '**La palanca o el pedal llegan más cerca del puño** o más abajo que antes.',
                        '**La moto frena menos** o necesitás más distancia.',
                        '**Vibración** al frenar, que puede venir del disco alabeado.',
                        '**Mucho polvo oscuro** en la llanta cerca del freno.',
                    ]],
                    'Si notás cualquiera de estas señales, no sigas posponiendo la revisión.',
                ],
            ],
            [
                'h2' => 'Cómo mirar el desgaste vos mismo',
                'id' => 'mirar',
                'body' => [
                    'Con la moto apagada y estable, mirá la pinza (la pieza que abraza el disco) desde un costado, con una linterna si hace falta. Verás el material de fricción, de color gris o marrón, contra el disco. Muchas pastillas tienen una ranura o una marca de desgaste. Si el material casi desapareció o ves sólo la chapa metálica, hay que cambiarlas. Comparalo con lo que indica el manual.',
                    'Mirá también el disco: si tiene surcos profundos, está azulado por calor o muy desparejo, consultá en el taller. Y fijate que no haya pérdidas de líquido en la pinza o en las mangueras.',
                ],
            ],
            [
                'h2' => 'Qué más se mira junto con las pastillas',
                'id' => 'que-mas',
                'body' => [
                    ['list' => [
                        '**El líquido de frenos.** Absorbe humedad con el tiempo y pierde eficacia. El manual dice cada cuánto cambiarlo; con el calor y la lluvia de Paraguay conviene no descuidarlo.',
                        '**Las mangueras**, que no estén agrietadas ni hinchadas.',
                        '**El nivel del depósito**: baja a medida que se gastan las pastillas, pero una bajada brusca indica pérdida.',
                        '**Las zapatas del tambor**, si tu moto tiene freno trasero a tambor; el mecánico las mide y las ajusta.',
                    ]],
                ],
            ],
            [
                'h2' => 'Por qué conviene que lo haga el taller',
                'id' => 'taller',
                'body' => [
                    'Cambiar pastillas parece simple, pero hay que empujar los pistones de la pinza, limpiar, aplicar el lubricante en los lugares correctos (y nunca sobre el material de fricción) y apretar con el torque del manual. Después hay que bombear la palanca hasta que quede firme y probar a baja velocidad. Un error acá se paga en la frenada. Llevala al taller si no tenés experiencia, si hay pérdida de líquido, si la palanca queda esponjosa o si el freno queda trabado. Cuando vayas, aprovechá para pedir una revisión general, como en el [service de moto](/guias/service-de-moto-que-incluye).',
                    'No damos precios: pedí presupuesto de repuesto y mano de obra antes de dejar la moto. Usá las pastillas que corresponden a tu modelo y a tu tipo de uso.',
                ],
            ],
            [
                'h2' => 'Cuidados para que duren más',
                'id' => 'cuidados',
                'body' => [
                    ['list' => [
                        'Anticipá las frenadas en lugar de clavarlas.',
                        'Usá los dos frenos juntos, como se enseña en cualquier curso de manejo.',
                        'Después de lavar la moto o de pasar por barro, frená suavemente un par de veces para secar y limpiar.',
                        'En bajadas largas, ayudate con el freno motor para no recalentar.',
                    ]],
                    'Una buena presión en las cubiertas también ayuda: ver [presión de neumáticos de moto](/guias/presion-de-neumaticos-moto).',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'Si los frenos fallan o se sienten raros, no salgas. Después de cambiar pastillas, no te vayas sin probar la palanca y el pedal parado y la moto a baja velocidad. Nunca dejes aceite, grasa o líquido de frenos sobre el disco o las pastillas: arruina la frenada. El líquido de frenos daña la pintura y la piel.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuánto duran las pastillas de moto?', 'a' => 'Depende de cómo manejes, el peso y el tránsito. No hay una cifra única: revisalas con regularidad.'],
            ['q' => '¿Cambio también el disco?', 'a' => 'No siempre. El taller mide el espesor y el estado del disco y te dice si sigue dentro de lo que permite el fabricante.'],
        ],
        'links' => [
            ['path' => '/motos', 'label' => 'Motos por marca y tipo'],
        ],
        'related' => ['presion-de-neumaticos-moto', 'service-de-moto-que-incluye', 'moto-despues-de-la-lluvia'],
        'quiz' => null,
        'sources' => [],
    ],
    'presion-de-neumaticos-moto' => [
        'group' => 'reparacion',
        'title' => 'Presión de neumáticos de moto: cómo controlarla',
        'navLabel' => 'Presión de neumáticos',
        'seoTitle' => 'Presión de neumáticos de moto: cómo controlarla',
        'metaDescription' => 'Presión de neumáticos de moto: dónde ver la que pide tu modelo, cómo medirla en frío, qué pasa si falta o sobra aire y cada cuánto revisar.',
        'query' => 'presión de neumáticos moto',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Presión de neumáticos de moto: cómo controlarla',
            'lead' => 'La presión correcta mejora el agarre, el consumo y la duración de las cubiertas. Se mide en un minuto y es una de las revisiones más útiles.',
        ],
        'intro' => [
            'Las cubiertas son lo único que une la moto con el piso. Una presión incorrecta cambia cómo frena, cómo toma las curvas y cuánto dura la goma. Y como el aire se pierde de a poco, conviene controlarla seguido, también en las motos que no andan mucho.',
            'No te damos una cifra de presión porque varía por modelo, por cubierta y por la carga (con y sin acompañante). La que corresponde está en el manual del propietario y, en muchas motos, en una etiqueta pegada en el chasis o en la basculante.',
            ['verify' => 'Presión recomendada delantera y trasera, con y sin acompañante, de cada modelo del catálogo: confirmar en el manual del propietario o en la etiqueta de la moto.'],
        ],
        'sections' => [
            [
                'h2' => 'Dónde encontrar la presión de tu moto',
                'id' => 'donde',
                'body' => [
                    ['list' => [
                        'En el **manual del propietario**, en la sección de cubiertas o especificaciones.',
                        'En una **etiqueta** en la basculante, el chasis o debajo del asiento.',
                        'En el costado de la cubierta aparece una presión **máxima**: no es la que tenés que usar, es el límite de la cubierta. Usá la del manual.',
                    ]],
                    'Si cambiaste la medida de las cubiertas, consultá al taller o a la gomería qué presión corresponde.',
                ],
            ],
            [
                'h2' => 'Cómo medirla bien',
                'id' => 'medir',
                'body' => [
                    ['ol' => [
                        'Medí con las cubiertas **frías**: antes de salir o después de que la moto estuvo parada un rato. Al rodar se calientan y la presión sube.',
                        'Sacá el tapón de la válvula, apoyá el medidor derecho y leé.',
                        'Si falta, inflá de a poco y volvé a medir. Si sobra, soltá aire.',
                        'Volvé a poner el tapón: protege la válvula del polvo.',
                    ]],
                    'Tené un medidor propio, de los chicos de bolsillo, y comparalo de vez en cuando con el de la estación de servicio: algunos de las bombas están descalibrados.',
                ],
            ],
            [
                'h2' => 'Qué pasa si hay poco o demasiado aire',
                'id' => 'efectos',
                'body' => [
                    ['list' => [
                        '**Poca presión:** la moto se siente pesada y floja en las curvas, la cubierta se calienta más, se gasta de los bordes y la moto consume más nafta. También aumenta el riesgo de que se pinche o se salga del aro.',
                        '**Demasiada presión:** menos agarre, sobre todo con lluvia o en tierra, y la moto rebota sobre los pozos. Se gasta la parte central.',
                        '**Distinta entre ambas ruedas:** se nota en la dirección y en la frenada.',
                    ]],
                    'Con el calor intenso del verano, la presión sube más al andar: por eso se mide siempre en frío, sin "descargar" aire de una cubierta caliente para llegar a un número.',
                ],
            ],
            [
                'h2' => 'Revisá de paso el estado de la cubierta',
                'id' => 'estado',
                'body' => [
                    'Mientras medís, mirá la banda de rodamiento y los costados. Buscá clavos, piedras incrustadas, tajos, grietas o bultos, y fijate que el dibujo no esté liso. Cuándo cambiar la cubierta lo desarrollamos en [cubiertas de moto: cuándo cambiarlas](/guias/cubiertas-de-moto-cuando-cambiarlas). El manual o la propia cubierta tienen un indicador de desgaste.',
                    'En caminos de tierra y con lluvia, el estado de las cubiertas pesa más que casi cualquier otra cosa; sumá la revisión a la rutina antes de salir, junto a [las pastillas de freno](/guias/pastillas-de-freno-moto).',
                ],
            ],
            [
                'h2' => 'Cuándo ir a la gomería o al taller',
                'id' => 'taller',
                'body' => [
                    'Si una cubierta pierde aire seguido, si ves un bulto o una grieta, si hay vibración al andar o si sospechás de una llanta doblada, llevala. Una gomería de confianza también balancea las ruedas. No intentes parchar una cubierta con un tajo en el costado: ese daño no es reparable de forma segura.',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'No salgas con una cubierta muy baja ni con señales de daño. Con acompañante o carga, ajustá la presión como indica el manual. Al inflar, no te quedes frente a la cubierta ni la superes de la presión máxima del costado.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cada cuánto hay que medir la presión?', 'a' => 'Con regularidad y antes de viajes largos. Muchos talleres recomiendan hacerlo seguido porque el aire se pierde de a poco, aunque no hay pinchadura.'],
            ['q' => '¿Puedo inflar con nitrógeno?', 'a' => 'Se puede, pero no es obligatorio. Lo que importa es mantener la presión del manual.'],
        ],
        'links' => [
            ['path' => '/motos', 'label' => 'Motos por marca y tipo'],
        ],
        'related' => ['cubiertas-de-moto-cuando-cambiarlas', 'pastillas-de-freno-moto', 'moto-gasta-mucha-nafta'],
        'quiz' => null,
        'sources' => [],
    ],
    'carburador-sucio-sintomas' => [
        'group' => 'reparacion',
        'title' => 'Carburador sucio: síntomas y qué hacer',
        'navLabel' => 'Carburador sucio',
        'seoTitle' => 'Carburador sucio: síntomas y qué hacer',
        'metaDescription' => 'Carburador sucio en la moto: síntomas típicos (tirones, ralentí inestable, mala arrancada), causas, qué podés hacer y cuándo ir al taller.',
        'query' => 'carburador sucio síntomas moto',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Carburador sucio: síntomas y qué hacer',
            'lead' => 'Si tu moto es a carburador y tironea, se apaga o cuesta arrancar, la suciedad en los conductos es una de las primeras sospechas.',
        ],
        'intro' => [
            'El carburador mezcla aire y nafta en la proporción justa antes de mandarla al motor. Tiene conductos muy finos, y basta una partícula de suciedad, un poco de agua o nafta vieja convertida en barniz para que la mezcla salga mal. Es muy común en motos que estuvieron paradas, que cargan nafta de mala calidad o que andan por calles polvorientas. Las motos de inyección electrónica no tienen carburador, pero el principio es parecido con sus inyectores y filtros.',
            'Para saber si tu moto tiene carburador o inyección, mirá la ficha técnica. En el catálogo, por ejemplo, la Yamaha Crypton y la Yamaha YC Z 110 figuran con alimentación a carburador, mientras que otras como la Yamaha MT-07 figuran con inyección; consultá siempre la ficha de tu modelo en [motos por marca](/motos).',
            ['verify' => 'Alimentación (carburador o inyección) y ajustes de ralentí y de tornillo de mezcla de cada modelo: confirmar en el manual del propietario.'],
        ],
        'sections' => [
            [
                'h2' => 'Síntomas más comunes',
                'id' => 'sintomas',
                'body' => [
                    ['list' => [
                        'Cuesta arrancar, sobre todo en frío, o arranca y se apaga enseguida.',
                        'El ralentí es inestable: sube y baja o se ahoga al parar.',
                        'Tironea o titubea al acelerar.',
                        'Pierde fuerza y no responde como antes (ver [moto pierde potencia](/guias/moto-pierde-potencia)).',
                        'Gasta más nafta o huele a combustible sin quemar.',
                        'Largas explosiones o "petardeos" por el escape al soltar el acelerador.',
                    ]],
                    'Varios de estos síntomas también los provoca una bujía gastada, un filtro de aire tapado o una toma de aire por una junta rota. Por eso conviene descartar lo simple antes de abrir el carburador.',
                ],
            ],
            [
                'h2' => 'Causas probables',
                'id' => 'causas',
                'body' => [
                    ['list' => [
                        '**Nafta vieja.** Con el tiempo, parte de la nafta se evapora y deja un residuo pegajoso que tapa los surtidores.',
                        '**Agua o suciedad en el tanque**, que llega al carburador (ver [moto después de la lluvia](/guias/moto-despues-de-la-lluvia)).',
                        '**Filtro de aire en mal estado**, que deja pasar polvo o limita el aire.',
                        '**Moto parada por mucho tiempo** sin vaciar el carburador (ver [guardar la moto mucho tiempo](/guias/guardar-la-moto-mucho-tiempo)).',
                        '**Ajustes movidos** del ralentí o de la mezcla.',
                    ]],
                ],
            ],
            [
                'h2' => 'Qué podés hacer vos',
                'id' => 'vos',
                'body' => [
                    ['ol' => [
                        'Revisá la bujía (ver [bujía de moto](/guias/bujia-de-moto)): si está negra o mojada, la mezcla está mal.',
                        'Mirá el filtro de aire: si está tapado de polvo, limpialo o cambialo según indique el manual.',
                        'Usá nafta de una estación que te dé confianza y no dejes la moto con el tanque casi vacío por mucho tiempo.',
                        'Si la moto estuvo parada, vaciá la nafta vieja del tanque y del carburador (el manual indica el tornillo de drenaje) y cargá nafta fresca.',
                        'Algunos talleres recomiendan un aditivo limpiador de sistema de combustible. Preguntá en el taller si conviene en tu moto.',
                    ]],
                    'Evitá desarmar y regular el carburador sin experiencia: tiene surtidores diminutos que se dañan fácil, y una mala regulación puede empeorar el problema o recalentar el motor.',
                ],
            ],
            [
                'h2' => 'Cuándo llevarla al taller',
                'id' => 'taller',
                'body' => [
                    'La limpieza completa de un carburador implica desmontarlo, desarmarlo, limpiar cada conducto, cambiar juntas si hace falta y volver a sincronizarlo. Es trabajo de taller. Consultá cuando:',
                    ['list' => [
                        'Revisaste bujía, filtro y nafta y el problema sigue.',
                        'Hay pérdida de nafta por el carburador o por el tanque.',
                        'La moto se apaga sola con frecuencia (ver [la moto se apaga sola](/guias/moto-se-apaga-sola)).',
                        'No arranca ni con nafta nueva (ver [moto no arranca](/guias/moto-no-arranca)).',
                    ]],
                    'Pedí presupuesto antes de empezar. No damos precios porque cambian según el modelo y el taller.',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'La nafta es inflamable y sus vapores son nocivos. Trabajá al aire libre, sin chispas, cigarrillos ni calentadores cerca, y con el motor frío. Recogé la nafta que drenes en un recipiente adecuado y no la tires al suelo ni a un desagüe. Si hay pérdida de combustible, no arranques la moto.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cómo sé si mi moto tiene carburador?', 'a' => 'Mirá la ficha técnica o el manual. Si tiene inyección electrónica, figura así, y las motos antiguas o más simples suelen tener carburador.'],
            ['q' => '¿Un limpiador de carburador de aerosol alcanza?', 'a' => 'A veces alivia los síntomas, pero si hay suciedad en los surtidores hace falta limpiarlos bien en el taller.'],
        ],
        'links' => [
            ['path' => '/motos', 'label' => 'Motos por marca y tipo'],
        ],
        'related' => ['moto-no-arranca', 'moto-se-apaga-sola', 'moto-pierde-potencia', 'moto-gasta-mucha-nafta'],
        'quiz' => null,
        'sources' => [],
    ],
    'moto-recalienta' => [
        'group' => 'reparacion',
        'title' => 'Moto que recalienta: causas y qué hacer',
        'navLabel' => 'Moto recalienta',
        'seoTitle' => 'Moto que recalienta: causas y qué hacer',
        'metaDescription' => 'Qué hacer si tu moto se calienta de más: cómo actuar en el momento, causas (aceite, refrigeración, mezcla, calor) y cuándo llevarla al taller.',
        'query' => 'moto recalienta',
        'published' => '2026-10-01',
        'updated' => '2026-10-01',
        'hero' => [
            'h1' => 'Moto que recalienta: causas y qué hacer',
            'lead' => 'Un motor muy caliente puede dañarse en pocos minutos. Primero frená con calma; después buscá la causa.',
        ],
        'intro' => [
            'Con el calor de Paraguay y el tránsito lento, el recalentamiento es una consulta frecuente. Señales típicas: olor a quemado, el motor pierde fuerza o suena distinto, la luz o el indicador de temperatura se encienden (en las motos que lo tienen), o hay vapor. Hay motos refrigeradas por aire, por aire y aceite o por líquido: según el catálogo, algunas figuran de un tipo y otras de otro, y cada una tiene sus puntos de revisión. Mirá la ficha de la tuya.',
            ['verify' => 'Tipo de refrigeración, tipo y nivel de refrigerante y temperatura de funcionamiento de cada modelo: confirmar en el manual del propietario o en la ficha del fabricante.'],
        ],
        'sections' => [
            [
                'h2' => 'Qué hacer en el momento',
                'id' => 'en-el-momento',
                'body' => [
                    ['ol' => [
                        'Salí del tránsito con cuidado y detenete en un lugar seguro.',
                        'Apagá el motor. No lo dejes al ralentí "para que se enfríe": en una moto sin ventilador eso lo empeora.',
                        'Esperá a que se enfríe del todo antes de tocar nada. Puede llevar un buen rato.',
                        'Mirá si hay pérdidas de aceite o de líquido debajo de la moto.',
                        'Si tu moto es refrigerada por líquido y el depósito está bajo, completá con el refrigerante que indica el manual, **sólo con el motor frío**.',
                    ]],
                ],
            ],
            [
                'h2' => 'Causas más comunes',
                'id' => 'causas',
                'body' => [
                    ['list' => [
                        '**Poco aceite o aceite degradado.** En motos refrigeradas por aire, el aceite ayuda a sacar calor. Mirá [cada cuánto cambiar el aceite](/guias/cada-cuanto-cambiar-el-aceite-de-la-moto).',
                        '**Falta de refrigerante o pérdida**, en las motos refrigeradas por líquido; también un ventilador que no arranca o un radiador tapado de barro.',
                        '**Mezcla pobre**: carburador sucio o una entrada de aire que no debería (ver [carburador sucio](/guias/carburador-sucio-sintomas)).',
                        '**Ralentí largo con calor y poco aire**, como cuando quedás parado en el tránsito.',
                        '**Carga excesiva** o manejar a muy altas revoluciones mucho tiempo.',
                        '**Frenos o embrague arrastrando**, que generan fricción y calor.',
                        '**Aletas del motor cubiertas de barro** o suciedad, que impiden que el aire enfríe.',
                    ]],
                ],
            ],
            [
                'h2' => 'Qué podés revisar vos',
                'id' => 'revisar',
                'body' => [
                    'Con el motor frío: el nivel de aceite; el nivel de refrigerante si tu moto lo lleva; que el radiador y las aletas no estén tapados; que el ventilador gire cuando el motor se calienta (si tiene) y que las mangueras no tengan pérdidas. Mirá también si la moto arrastra el freno o si el embrague patina (ver [embrague de moto](/guias/embrague-de-moto)).',
                    'No hay que abrir la tapa del radiador con el motor caliente: el líquido sale a presión y quema.',
                ],
            ],
            [
                'h2' => 'Cómo prevenirlo',
                'id' => 'prevenir',
                'body' => [
                    ['list' => [
                        'Hacé el service como indica el manual, con aceite de la especificación correcta.',
                        'Evitá el ralentí prolongado: apagá el motor si vas a quedar parado mucho rato.',
                        'Limpiá las aletas o el radiador después del barro.',
                        'En días de mucho calor, llevá un poco más de atención al nivel de aceite y refrigerante.',
                        'Revisá la mezcla: un motor con la mezcla pobre se calienta más.',
                    ]],
                ],
            ],
            [
                'h2' => 'Cuándo ir al taller',
                'id' => 'taller',
                'body' => [
                    'Llevala si recalienta más de una vez, si perdés refrigerante o aceite, si el ventilador no funciona, si el motor sigue con olor a quemado después de enfriarse o si hay ruidos metálicos. Seguir andando con un motor recalentado puede deformar la tapa de cilindros o trabar el pistón, y esa reparación sale mucho más cara que revisarla a tiempo. Un [service de moto](/guias/service-de-moto-que-incluye) completo ayuda a detectar el problema antes.',
                ],
            ],
            [
                'h2' => 'Nota de seguridad',
                'id' => 'seguridad',
                'body' => [
                    ['note' => 'No abras la tapa del radiador ni el depósito con el motor caliente, y no tires agua fría sobre un motor muy caliente: puede agrietarlo. El silenciador y el motor queman: esperá a que enfríen antes de tocarlos.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Puedo seguir hasta el taller si recalienta?', 'a' => 'Mejor no. Si el motor está muy caliente, apagalo, dejalo enfriar y revisá lo básico. Si el problema sigue, llamá a un transporte.'],
            ['q' => '¿Las motos refrigeradas por aire recalientan más?', 'a' => 'Dependen más del flujo de aire y del aceite, así que sufren más en el tránsito lento y con calor. Cuidar el aceite y las aletas ayuda.'],
        ],
        'links' => [
            ['path' => '/motos', 'label' => 'Motos por marca y tipo'],
        ],
        'related' => ['cada-cuanto-cambiar-el-aceite-de-la-moto', 'carburador-sucio-sintomas', 'embrague-de-moto'],
        'quiz' => null,
        'sources' => [],
    ],
    /* == /B4 == */
    /* == B5 == */
    'registro-de-conducir-para-moto' => [
        'group'           => 'tramites',
        'title'           => 'Registro de conducir para moto en Paraguay',
        'navLabel'        => 'Registro de conducir para moto',
        'seoTitle'        => 'Registro de conducir para moto en Paraguay',
        'metaDescription' => 'Qué pide la licencia de conducir categoría motociclista en Paraguay: edad, documentos, exámenes, vigencia y renovación, con fuentes oficiales.',
        'query'           => 'registro de conducir moto paraguay',
        'published'       => '2026-10-01',
        'updated'         => '2026-10-01',
        'hero'            => [
            'h1'   => 'Registro de conducir para moto en Paraguay',
            'lead' => 'Qué te piden para sacar la licencia de motociclista, en qué orden se hace y cada cuánto se renueva.',
        ],
        'intro'           => [
            'Manejar una moto en la calle sin licencia no es sólo un problema de multa: si tenés un accidente, la falta de licencia te deja en una posición muy complicada. Por eso conviene sacar el registro antes de comprar la moto, no después.',
            'Esta guía junta lo que dicen la ley de tránsito y la municipalidad de Asunción sobre la licencia de **categoría motociclista**. Cada municipalidad tiene su propio trámite, así que usá esto como mapa y confirmá los detalles en la oficina de tu ciudad.',
            ['verify' => 'confirmar en la ANTSV si el registro de motociclista ya se emite con el formato nacional unificado y qué municipios lo emiten; fuente: antsv.gov.py'],
        ],
        'sections'        => [
            ['h2' => 'Qué habilita la categoría motociclista', 'id' => 'categoria', 'body' => [
                'La Ley 5016/14 Nacional de Tránsito y Seguridad Vial separa las licencias por categoría. La de motociclista habilita a manejar ciclomotores, motocicletas, triciclos y cuatriciclos con propulsión propia, además de las motocargas. Es decir: con el registro de auto no podés manejar una moto, y al revés.',
                'Si pensás usar la moto para trabajar, mirá también la guía de [habilitación de moto para delivery](/guias/habilitacion-de-moto-para-delivery), que explica qué documentos se suman al registro.',
            ]],
            ['h2' => 'Requisitos para sacarlo por primera vez', 'id' => 'requisitos', 'body' => [
                'Según el formulario de requisitos de la Municipalidad de Asunción (consultado el 1/10/2026), para una primera licencia de motociclista te piden:',
                ['list' => [
                    'Tener 18 años cumplidos.',
                    'Cédula de identidad vigente.',
                    'Comprobante de grupo sanguíneo, original, de un laboratorio o del Ministerio de Salud.',
                    'Certificado de vida y residencia vigente, original.',
                    'Certificado de la escuela de conducción, original.',
                    'Aprobar los exámenes psicofísico, teórico y práctico.',
                ]],
                'El trámite es presencial y para el examen práctico tenés que llevar una moto. Pensalo antes: si todavía no tenés moto propia, pedí prestada una que esté en regla, con sus papeles y con casco para vos.',
                ['verify' => 'costo vigente de la licencia nueva de motociclista en Asunción, con los derechos de examen; fuente: Municipalidad de Asunción, tarifario vigente'],
            ]],
            ['h2' => 'Los tres exámenes', 'id' => 'examenes', 'body' => [
                'El **examen psicofísico** evalúa que estés en condiciones físicas y mentales de manejar. El **examen teórico** lo determina y lo provee la ANTSV (Agencia Nacional de Tránsito y Seguridad Vial) y, según la ley, cubre conocimientos de conducción, señalización, legislación, accidentes y cómo prevenirlos, y nociones simples de mecánica y detección de fallas en los elementos de seguridad del vehículo. Para prepararte, leé la guía del [examen teórico del registro de conducir](/guias/examen-teorico-registro-de-conducir).',
                'El **examen práctico** se rinde en una moto. Preguntá en la municipalidad qué prueba te toman y qué moto aceptan, porque ese detalle no está en el formulario de requisitos que consultamos; ensayá antes los movimientos básicos: arrancar, frenar, señalizar y mantener el equilibrio a baja velocidad.',
            ]],
            ['h2' => 'Cuánto dura y cuándo se renueva', 'id' => 'vigencia', 'body' => [
                'La Ley 5016/14 dice que las licencias se otorgan por un máximo de cinco años y nunca por menos de uno. En cada renovación hay que aprobar de nuevo el examen psicofísico. Si el titular registra infracciones de tránsito, se vuelven a rendir el teórico y el práctico. Para mayores de 65 años la vigencia es anual.',
                'Renovar a tiempo te ahorra problemas: manejar con la licencia vencida es una infracción por sí sola. Lo vemos en [multas de tránsito para motos](/guias/multas-de-transito-para-motos).',
            ]],
            ['h2' => 'Orden recomendado para hacer el trámite', 'id' => 'orden', 'body' => [
                ['ol' => [
                    'Juntá la cédula, el grupo sanguíneo y la constancia de vida y residencia, que son los papeles más rápidos de conseguir.',
                    'Inscribite en una escuela de conducción habilitada y pedí el certificado cuando lo completes.',
                    'Pedí turno en la municipalidad que te corresponda y preguntá qué moto aceptan para el práctico.',
                    'Rendí el psicofísico, el teórico y el práctico, en el orden que te indiquen.',
                    'Guardá el comprobante hasta tener la licencia en la mano y anotá la fecha de vencimiento en tu teléfono.',
                ]],
                'Una moto sin papeles al día tampoco te sirve para el práctico ni para circular: repasá [la cédula verde de la moto](/guias/cedula-verde-de-moto) y [la chapa](/guias/chapa-de-moto).',
            ]],
            ['h2' => 'Errores comunes', 'id' => 'errores', 'body' => [
                ['list' => [
                    'Dejar vencer los comprobantes: el certificado de vida y residencia y el grupo sanguíneo se piden vigentes, y un papel viejo te manda de vuelta a empezar.',
                    'Ir a rendir sin haber practicado antes en una moto, con alguien que ya maneje y te corrija.',
                    'Asumir que lo que pide una municipalidad lo piden todas. Los requisitos y los costos pueden variar de un municipio a otro.',
                    'Dar plata a un "gestor" que promete el registro sin examen. Es lo contrario de lo que dice la ley, y manejar con una licencia irregular te deja sin cobertura si pasa algo.',
                ]],
            ]],
        ],
        'faq'             => [
            ['q' => '¿Desde qué edad se puede sacar el registro de motociclista?', 'a' => 'Desde los 18 años cumplidos, según el formulario de requisitos de la Municipalidad de Asunción.'],
            ['q' => '¿Cuánto dura la licencia?', 'a' => 'La Ley 5016/14 la otorga por un máximo de cinco años y nunca por menos de uno; para mayores de 65 años la vigencia es anual.'],
            ['q' => '¿Tengo que llevar una moto al examen?', 'a' => 'Sí: en Asunción el trámite es presencial y quien se presenta tiene que llevar el vehículo para el examen práctico.'],
            ['q' => '¿El registro de auto sirve para manejar moto?', 'a' => 'No. La categoría motociclista es una licencia distinta, con su propio examen práctico.'],
        ],
        'links'           => [
            ['path' => '/guias/examen-teorico-registro-de-conducir', 'label' => 'Examen teórico del registro de conducir'],
            ['path' => '/guias/casco-obligatorio-paraguay', 'label' => 'Casco obligatorio en Paraguay'],
            ['path' => '/motos', 'label' => 'Motos en Paraguay'],
        ],
        'related'         => ['examen-teorico-registro-de-conducir', 'multas-de-transito-para-motos', 'habilitacion-de-moto-para-delivery'],
        'quiz'            => null,
        'sources'         => [
            ['label' => 'Municipalidad de Asunción: licencia de conducir categoría motociclista, requisitos', 'url' => 'https://www.asuncion.gov.py/wp-content/uploads/2022/03/HABILITACION-LIC-CONDUCIR-CAT.-MOTOCICLISTA.pdf', 'accessed' => '2026-10-01'],
            ['label' => 'Ley 5016/14 Nacional de Tránsito y Seguridad Vial (BACN)', 'url' => 'https://www.bacn.gov.py/leyes-paraguayas/4418/ley-n-5016-nacional-de', 'accessed' => '2026-10-01'],
        ],
    ],
    'examen-teorico-registro-de-conducir' => [
        'group'           => 'tramites',
        'title'           => 'Examen teórico del registro de conducir: qué estudiar',
        'navLabel'        => 'Examen teórico del registro de conducir',
        'seoTitle'        => 'Examen teórico del registro de conducir: qué estudiar',
        'metaDescription' => 'Qué se evalúa en el examen teórico del registro de conducir en Paraguay, cómo estudiar y dónde conseguir el material oficial antes de rendir.',
        'query'           => 'examen teórico registro de conducir paraguay preguntas',
        'published'       => '2026-10-01',
        'updated'         => '2026-10-01',
        'hero'            => [
            'h1'   => 'Examen teórico del registro de conducir',
            'lead' => 'Qué se evalúa, cómo estudiar para motociclista y por qué acá no publicamos un cuestionario de práctica.',
        ],
        'intro'           => [
            'El examen teórico es la parte del registro que más gente subestima: se estudia en pocos días, pero reprobarlo significa volver a sacar turno. Si vas por la licencia de motociclista, además te conviene prestar atención a lo que cambia para quien va en dos ruedas.',
            'Antes de seguir, una aclaración honesta. Buscamos un banco de preguntas oficial que podamos citar textualmente y no pudimos abrir uno publicado por la ANTSV ni por una municipalidad. Por eso **no publicamos un cuestionario de práctica**: preferimos no inventar preguntas ni copiar las de sitios de terceros que no podemos verificar.',
        ],
        'sections'        => [
            ['h2' => 'Qué dice la ley que se evalúa', 'id' => 'contenido', 'body' => [
                'La Ley 5016/14 Nacional de Tránsito y Seguridad Vial establece que el examen teórico tiene que cubrir conocimientos de conducción, señalización, legislación, accidentes y modo de prevenirlos, y conocimientos simples de mecánica y detección de fallas sobre los elementos de seguridad del vehículo. Además dice que lo determina y lo provee la ANTSV.',
                'Dicho de otra forma, no es un examen de memoria sobre una sola cosa. Son cinco temas, y alcanza con que flojees en uno para que se complique.',
            ]],
            ['h2' => 'Cómo repartir el estudio', 'id' => 'estudio', 'body' => [
                ['list' => [
                    '**Señales y marcas del pavimento.** Es el tema más visual. Repasalo mirando las señales reales cuando vas por la calle: preguntate qué significa cada una antes de leerla.',
                    '**Legislación.** Prioridades de paso, velocidades máximas, documentos que hay que llevar y uso de casco. Para el casco tenés la guía de [casco obligatorio en Paraguay](/guias/casco-obligatorio-paraguay).',
                    '**Accidentes y prevención.** Distancia de seguridad, frenado con lluvia, visibilidad. En Paraguay sumá el polvo en caminos de tierra y los charcos que esconden pozos.',
                    '**Mecánica básica.** Frenos, luces, cubiertas, cadena. Si querés ir con ventaja, mirá nuestras guías de reparación y mantenimiento de la moto.',
                ]],
                ['verify' => 'material de estudio oficial para el examen teórico (manual o cuestionario) publicado por la ANTSV o por la municipalidad; fuente: antsv.gov.py y sitios municipales'],
            ]],
            ['h2' => 'Dónde conseguir el material oficial', 'id' => 'material', 'body' => [
                'La forma más segura es pedirlo donde vas a rendir. Las municipalidades que emiten el registro suelen indicar qué material usan, y la escuela de conducción donde hagas el curso te puede orientar: en Asunción el certificado de la escuela de conducción es un requisito para la licencia de motociclista.',
                'Si encontrás un cuestionario en internet, tomalo como práctica de ritmo y no como la verdad. Compará siempre cada respuesta con el texto de la ley o con el material de la municipalidad, porque las reglas se actualizan y hay sitios con preguntas viejas.',
            ]],
            ['h2' => 'El día del examen', 'id' => 'dia', 'body' => [
                ['ol' => [
                    'Llegá con la cédula de identidad y el resto de los papeles que te pidió la oficina. La lista de la licencia de motociclista está en [registro de conducir para moto](/guias/registro-de-conducir-para-moto).',
                    'Leé cada pregunta entera antes de mirar las opciones. Varias respuestas parecen correctas hasta que se lee el detalle.',
                    'Si dudás entre dos opciones, quedate con la que coincide con la ley y no con lo que hace la gente en la calle.',
                    'Si no aprobás, preguntá en la oficina cuándo podés volver a rendir y si tiene costo: eso depende del municipio.',
                ]],
                ['verify' => 'cantidad de preguntas, puntaje mínimo y plazo para repetir el examen teórico; fuente: ANTSV o municipalidad que lo toma'],
            ]],
            ['h2' => 'Después del teórico', 'id' => 'despues', 'body' => [
                'Para la categoría motociclista falta todavía el examen práctico y el psicofísico. Si la moto con la que vas a rendir no tiene los papeles en orden, resolvelo antes: hay una explicación sobre [la cédula verde de la moto](/guias/cedula-verde-de-moto) y otra sobre [la chapa](/guias/chapa-de-moto).',
                'Y recordá que aprobar el examen es el piso, no el techo: lo que más te protege en la calle es llevar casco, respetar las prioridades y manejar como si nadie te viera.',
            ]],
        ],
        'faq'             => [
            ['q' => '¿Qué se evalúa en el examen teórico?', 'a' => 'Según la Ley 5016/14: conducción, señalización, legislación, accidentes y su prevención, y mecánica simple sobre los elementos de seguridad del vehículo.'],
            ['q' => '¿Quién prepara el examen teórico?', 'a' => 'La ley dice que lo determina y lo provee la ANTSV.'],
            ['q' => '¿Hay un cuestionario de práctica en esta página?', 'a' => 'No. No encontramos un banco de preguntas oficial que podamos citar textualmente, y preferimos no publicar preguntas que no podamos verificar.'],
        ],
        'links'           => [
            ['path' => '/guias/registro-de-conducir-para-moto', 'label' => 'Registro de conducir para moto'],
            ['path' => '/guias/casco-obligatorio-paraguay', 'label' => 'Casco obligatorio en Paraguay'],
            ['path' => '/guias', 'label' => 'Todas las guías'],
        ],
        'related'         => ['registro-de-conducir-para-moto', 'casco-obligatorio-paraguay', 'multas-de-transito-para-motos'],
        'quiz'            => null,
        'sources'         => [
            ['label' => 'Ley 5016/14 Nacional de Tránsito y Seguridad Vial (BACN)', 'url' => 'https://www.bacn.gov.py/leyes-paraguayas/4418/ley-n-5016-nacional-de', 'accessed' => '2026-10-01'],
            ['label' => 'Municipalidad de Asunción: licencia de conducir categoría motociclista, requisitos', 'url' => 'https://www.asuncion.gov.py/wp-content/uploads/2022/03/HABILITACION-LIC-CONDUCIR-CAT.-MOTOCICLISTA.pdf', 'accessed' => '2026-10-01'],
        ],
    ],
    'casco-obligatorio-paraguay' => [
        'group'           => 'tramites',
        'title'           => 'Casco obligatorio en Paraguay: qué dice la ley',
        'navLabel'        => 'Casco obligatorio en Paraguay',
        'seoTitle'        => 'Casco obligatorio en Paraguay: qué dice la ley',
        'metaDescription' => 'Qué exige la Ley 5016/14 sobre el casco y el chaleco reflectivo para motos en Paraguay, cómo tiene que ser el casco y qué pasa si no lo llevás.',
        'query'           => 'casco obligatorio paraguay moto multa sin casco',
        'published'       => '2026-10-01',
        'updated'         => '2026-10-01',
        'hero'            => [
            'h1'   => 'Casco obligatorio en Paraguay',
            'lead' => 'Cómo tiene que ser el casco, qué más tenés que llevar puesto y qué pasa si la Caminera te para sin él.',
        ],
        'intro'           => [
            'En Paraguay el casco no es una recomendación: es una obligación de la ley de tránsito, y la llevan todos los ocupantes de la moto, no sólo quien maneja. Esta guía resume el artículo que la establece y lo que implica en la práctica.',
            'Los textos legales y las escalas de multas se actualizan. Usá esta guía para entender la regla y, antes de depender de un número, mirá la escala vigente de la Patrulla Caminera.',
        ],
        'sections'        => [
            ['h2' => 'Qué dice la Ley 5016/14', 'id' => 'ley', 'body' => [
                'El artículo 76 de la Ley 5016/14 Nacional de Tránsito y Seguridad Vial obliga a los ocupantes de motocicletas, ciclomotores, triciclones, cuatriciclones y motocargas a usar un casco reglamentario y normalizado que cubra toda la cabeza, excepto la cara.',
                'Según el mismo artículo, el casco tiene que cumplir tres condiciones más:',
                ['list' => [
                    'Llevar material reflectivo.',
                    'Tener grabado el número de chapa de la moto en la parte inferior externa.',
                    'Ir bien sujeto, con el barbijo o correa de retención abrochado.',
                ]],
                'También obliga a llevar puesto en todo momento un chaleco reflectivo aprobado o certificado según las normas vigentes.',
                ['verify' => 'texto vigente del artículo 76 tras las modificaciones posteriores a la Ley 5016/14 (por ejemplo la Ley 6842/2021, que modificó otros artículos de la misma ley); fuente: BACN'],
            ]],
            ['h2' => 'Qué hay que revisar en el casco que comprás', 'id' => 'casco', 'body' => [
                'A partir de lo que dice el artículo, antes de pagar un casco fijate en esto:',
                ['ol' => [
                    'Que cubra toda la cabeza menos la cara: un casco tipo gorra o "de obra" no cumple.',
                    'Que tenga material reflectivo visible, de día y de noche.',
                    'Que tenga un barbijo o correa que cierre firme. Un casco suelto en la cabeza no te protege y no cumple lo que pide la ley.',
                    'Que puedas grabarle la chapa de la moto, y hacerlo cuando ya tengas la chapa definitiva (en [la guía de la chapa](/guias/chapa-de-moto) está cómo se tramita).',
                    'Que te quede ajustado, sin holgura al mover la cabeza, y sin golpes ni rajaduras si es usado.',
                ]],
                'Un casco golpeado fuerte, aunque se vea bien por fuera, puede haber perdido la capacidad de absorber otro impacto. Si no sabés su historia, no lo compres usado.',
                ['verify' => 'norma técnica o certificación con la que se acredita que un casco es "normalizado" en Paraguay; fuente: INTN o reglamento de la Ley 5016/14'],
            ]],
            ['h2' => 'Qué pasa si no lo llevás', 'id' => 'sancion', 'body' => [
                'Según la escala de la Patrulla Caminera, cuando una moto circula sin casco protector se demora el vehículo y se puede seguir una vez que se paga la multa y se presenta un casco. Las multas se expresan en jornales mínimos y su monto en guaraníes cambia cuando se reajusta el salario mínimo, sin que cambie la cantidad de jornales de cada infracción.',
                ['verify' => 'cantidad de jornales y monto en guaraníes vigentes por circular sin casco o sin chaleco reflectivo; fuente: escala de multas vigente de la Patrulla Caminera / MOPC'],
                'En [multas de tránsito para motos](/guias/multas-de-transito-para-motos) juntamos las infracciones más frecuentes que se aplican a quien anda en moto.',
            ]],
            ['h2' => 'El casco en el calor y la lluvia', 'id' => 'clima', 'body' => [
                'En el verano paraguayo el casco incomoda, y la tentación es dejarlo en el codo en los trayectos cortos. Es justo ahí, cerca de casa, donde pasan muchos accidentes de ciudad. Si el calor te molesta, buscá uno con buena ventilación que igual cumpla lo que pide el artículo, en lugar de dejar de usarlo.',
                'Con lluvia, un casco con la visera rayada o empañada es un riesgo en sí mismo. Mantené la visera limpia y cambiala cuando se opaque. Si querés repasar cómo se maneja la moto después de la lluvia, tenés guías de mantenimiento en la sección de [guías](/guias).',
            ]],
            ['h2' => 'Casco, registro y examen', 'id' => 'registro', 'body' => [
                'El uso del casco forma parte de la legislación que se evalúa en el examen teórico. Si estás por sacar la licencia, leé [registro de conducir para moto](/guias/registro-de-conducir-para-moto) y [examen teórico del registro de conducir](/guias/examen-teorico-registro-de-conducir).',
            ]],
        ],
        'faq'             => [
            ['q' => '¿El casco es obligatorio también para el acompañante?', 'a' => 'Sí. El artículo 76 de la Ley 5016/14 se refiere a los ocupantes de la moto, no sólo a quien maneja.'],
            ['q' => '¿Cómo tiene que ser el casco?', 'a' => 'Reglamentario y normalizado, cubriendo toda la cabeza menos la cara, con material reflectivo, con la chapa grabada en la parte inferior externa y sujeto con el barbijo.'],
            ['q' => '¿Hace falta chaleco reflectivo?', 'a' => 'Sí: la misma ley pide llevar puesto en todo momento un chaleco reflectivo aprobado o certificado.'],
        ],
        'links'           => [
            ['path' => '/guias/multas-de-transito-para-motos', 'label' => 'Multas de tránsito para motos'],
            ['path' => '/guias/registro-de-conducir-para-moto', 'label' => 'Registro de conducir para moto'],
            ['path' => '/motos', 'label' => 'Motos en Paraguay'],
        ],
        'related'         => ['multas-de-transito-para-motos', 'chapa-de-moto', 'examen-teorico-registro-de-conducir'],
        'quiz'            => null,
        'sources'         => [
            ['label' => 'Ley 5016/14 Nacional de Tránsito y Seguridad Vial, art. 76 (BACN)', 'url' => 'https://www.bacn.gov.py/leyes-paraguayas/4418/ley-n-5016-nacional-de', 'accessed' => '2026-10-01'],
            ['label' => 'Patrulla Caminera: escala de multas (jornales)', 'url' => 'http://www.caminera.gov.py/application/files/9317/5136/7525/escala_mulas_julio2025.pdf', 'accessed' => '2026-10-01'],
        ],
    ],
    'multas-de-transito-para-motos' => [
        'group'           => 'tramites',
        'title'           => 'Multas de tránsito para motos en Paraguay',
        'navLabel'        => 'Multas de tránsito para motos',
        'seoTitle'        => 'Multas de tránsito para motos en Paraguay',
        'metaDescription' => 'Cómo funcionan las multas de tránsito para motos en Paraguay: se miden en jornales, qué infracciones demoran la moto y cómo evitarlas.',
        'query'           => 'multas de tránsito moto paraguay',
        'published'       => '2026-10-01',
        'updated'         => '2026-10-01',
        'hero'            => [
            'h1'   => 'Multas de tránsito para motos en Paraguay',
            'lead' => 'Cómo se calculan, cuáles son las infracciones más comunes en moto y qué hacer si te demoran la moto.',
        ],
        'intro'           => [
            'Las multas de tránsito en Paraguay no se fijan en guaraníes: se fijan en **jornales mínimos**, y el monto final cambia cada vez que se reajusta el salario mínimo. Por eso una cifra vieja que alguien te pasó por WhatsApp casi seguro ya no es la vigente.',
            'Acá encontrás la lógica del sistema y las infracciones que más le pegan a quien anda en moto. Los montos exactos los tenés que tomar siempre de la escala vigente de la Patrulla Caminera o de la municipalidad.',
        ],
        'sections'        => [
            ['h2' => 'Cómo se calcula una multa', 'id' => 'calculo', 'body' => [
                'La Patrulla Caminera publica una escala en la que cada infracción tiene una cantidad de jornales. Cuando el salario mínimo sube, se actualiza el valor del jornal y con él todos los montos, pero la cantidad de jornales de cada infracción se mantiene. Así lo explicó la prensa al informarse el último reajuste.',
                'Entonces para saber cuánto vas a pagar necesitás dos datos: cuántos jornales tiene la infracción y cuánto vale hoy el jornal. Con esos dos números, es una multiplicación.',
                'Por eso en esta guía no ponemos montos en guaraníes: quedarían desactualizados en la próxima suba del salario mínimo. Mirá siempre la fecha de la escala que estás consultando y desconfiá de cualquier cifra que no la tenga.',
                ['verify' => 'valor del jornal mínimo vigente y fecha de entrada en vigencia de la escala de multas; fuente: Patrulla Caminera / MOPC'],
            ]],
            ['h2' => 'Infracciones frecuentes en moto', 'id' => 'infracciones', 'body' => [
                'Según los medios que reprodujeron la escala de la Caminera, estas son infracciones donde la moto se demora hasta resolver la situación:',
                ['table' => [
                    'head' => ['Infracción', 'Cantidad de jornales', 'Qué pasa con la moto'],
                    'rows' => [
                        ['Circular con la licencia vencida', '10', 'Se demora'],
                        ['Entregar la moto a una persona sin licencia', '10', 'Se demora'],
                        ['No llevar la licencia consigo', '5', 'Se demora'],
                        ['Falta, vencimiento o no portar la habilitación del vehículo', '5', 'Se demora'],
                    ],
                ], 'caption' => 'Cantidad de jornales según la escala de la Patrulla Caminera, tal como la informó la prensa (revista Plus, 2/7/2026).'],
                'Los jornales de esta tabla vienen de un medio de prensa que reprodujo la escala y no del documento oficial, que no pudimos abrir. Verificalos en la escala de la Caminera antes de tomarlos como definitivos.',
                ['verify' => 'cantidad de jornales por circular sin casco o sin chaleco reflectivo (las fuentes consultadas discrepan); fuente: escala de multas vigente de la Patrulla Caminera'],
            ]],
            ['h2' => 'Si te demoran la moto', 'id' => 'demora', 'body' => [
                ['ol' => [
                    'Pedí al agente que te indique la infracción y el artículo en el que se basa.',
                    'Guardá una copia del acta o boleta, con la fecha, el lugar y el nombre del agente.',
                    'Preguntá dónde se abona y qué documentos tenés que presentar para recuperar la moto.',
                    'Si tu infracción es por un papel vencido, resolvelo en la oficina correspondiente antes de volver a circular. Mirá [la cédula verde](/guias/cedula-verde-de-moto) y [la chapa](/guias/chapa-de-moto).',
                ]],
                ['verify' => 'procedimiento y plazos para pagar o impugnar una multa de la Caminera; fuente: Patrulla Caminera'],
            ]],
            ['h2' => 'Cómo evitarlas', 'id' => 'evitar', 'body' => [
                ['list' => [
                    'Controlá la fecha de vencimiento de tu licencia y renovala antes. Está explicado en [registro de conducir para moto](/guias/registro-de-conducir-para-moto).',
                    'Llevá siempre con vos la licencia y los papeles de la moto, en una funda que aguante la lluvia.',
                    'Usá casco y chaleco reflectivo, también en trayectos cortos. Detalles en [casco obligatorio en Paraguay](/guias/casco-obligatorio-paraguay).',
                    'No le prestes la moto a alguien sin licencia: la infracción es tuya, no sólo de quien maneja.',
                    'Antes de comprar una moto usada, pedí que te muestren que no tiene multas pendientes. Mirá [qué papeles tiene que tener una moto al día](/guias/papeles-de-una-moto-al-dia).',
                ]],
            ]],
        ],
        'faq'             => [
            ['q' => '¿En qué se miden las multas de tránsito en Paraguay?', 'a' => 'En jornales mínimos. El monto en guaraníes cambia cuando se reajusta el salario mínimo, pero la cantidad de jornales de cada infracción se mantiene.'],
            ['q' => '¿Qué pasa si no llevo la licencia conmigo?', 'a' => 'Según la escala informada por la prensa, la moto se demora y la multa es de 5 jornales. Confirmalo en la escala vigente de la Caminera.'],
            ['q' => '¿Puedo prestar mi moto a alguien sin licencia?', 'a' => 'No te conviene: entregar el vehículo a una persona sin licencia es una infracción que, según la escala informada, tiene 10 jornales y demora la moto.'],
        ],
        'links'           => [
            ['path' => '/guias/casco-obligatorio-paraguay', 'label' => 'Casco obligatorio en Paraguay'],
            ['path' => '/guias/registro-de-conducir-para-moto', 'label' => 'Registro de conducir para moto'],
            ['path' => '/guias/papeles-de-una-moto-al-dia', 'label' => 'Papeles de una moto al día'],
        ],
        'related'         => ['casco-obligatorio-paraguay', 'registro-de-conducir-para-moto', 'cedula-verde-de-moto'],
        'quiz'            => null,
        'sources'         => [
            ['label' => 'Revista Plus: aumentan las sanciones de la Patrulla Caminera tras el reajuste salarial (2/7/2026)', 'url' => 'https://revistaplus.com.py/2026/07/02/aumentan-las-sanciones-de-la-patrulla-caminera-tras-el-reajuste-salarial/', 'accessed' => '2026-10-01'],
            ['label' => 'Patrulla Caminera: escala de multas (jornales)', 'url' => 'http://www.caminera.gov.py/application/files/9317/5136/7525/escala_mulas_julio2025.pdf', 'accessed' => '2026-10-01'],
            ['label' => 'Agencia IP: Caminera dio a conocer nuevos montos de multas', 'url' => 'https://www.ip.gov.py/ip/caminera-anuncia-nuevos-precios-de-multas-de-acuerdo-al-reajuste-del-salario-minimo/', 'accessed' => '2026-10-01'],
        ],
    ],
    'chapa-de-moto' => [
        'group'           => 'tramites',
        'title'           => 'Chapa de moto en Paraguay: la chapa Mercosur',
        'navLabel'        => 'Chapa de moto',
        'seoTitle'        => 'Chapa de moto en Paraguay: la chapa Mercosur',
        'metaDescription' => 'Cómo es la chapa Mercosur de las motos en Paraguay, desde cuándo rige, para qué motos aplica y cómo se canjea la chapa vieja, con fuentes.',
        'query'           => 'chapa de moto paraguay mercosur',
        'published'       => '2026-10-01',
        'updated'         => '2026-10-01',
        'hero'            => [
            'h1'   => 'Chapa de moto en Paraguay',
            'lead' => 'Cómo es la chapa Mercosur, a qué motos les toca y qué hacer si la tuya es de las anteriores.',
        ],
        'intro'           => [
            'La chapa es lo primero que ve la Caminera y lo primero que revisás vos cuando mirás una moto usada: tiene que estar puesta, legible y coincidir con los papeles. En Paraguay el sistema cambió en 2019 con la llegada de la chapa Mercosur, y todavía circulan motos con las dos versiones.',
            'Esta guía explica qué se sabe de la chapa de moto con fuentes públicas, y deja marcado lo que depende del Registro de Automotores y no pudimos confirmar.',
        ],
        'sections'        => [
            ['h2' => 'La chapa Mercosur en motos', 'id' => 'mercosur', 'body' => [
                'Paraguay empezó a emitir la chapa Mercosur el 1 de julio de 2019. Desde esa fecha, según la prensa y el propio Mercosur, todo vehículo y toda moto que se inscribe por primera vez en el Registro de Automotores recibe esa chapa.',
                'Para las motocicletas el formato es de tres números y cuatro letras, del estilo **123 ABCD**. Quien ya tenía chapa anterior puede canjearla: el trámite se hace con un formulario electrónico que provee la Dirección del Registro de Automotores, previa verificación física del vehículo.',
                ['verify' => 'si el canje de la chapa anterior por la Mercosur es obligatorio para las motos, el plazo y el arancel vigente; fuente: Dirección del Registro de Automotores (DRA)'],
            ]],
            ['h2' => 'Moto 0 km: quién gestiona la chapa', 'id' => 'cero-km', 'body' => [
                'En una moto nueva la inscripción en el Registro es la primera. Los registros que consultamos mencionan, para las motos importadas, el certificado de importación original con dos fotocopias autenticadas y una fotocopia autenticada de la cédula de identidad o del RUC del titular.',
                'La Ley 4980 modificó el régimen del registro de motocicletas y estableció normas para su circulación. Según el Poder Judicial, el vendedor queda habilitado a entregar la moto, la chapa y el formulario de modelo único de la Dirección del Registro de Automotores una vez efectuados los pagos correspondientes.',
                'Antes de pagar una moto 0 km, preguntá quién hace la inscripción y cuándo vas a tener la chapa definitiva en la mano. Si todavía no la tenés, pedí por escrito qué papel te dan para circular mientras tanto. Podés consultarnos por modelos en [motos](/motos).',
                ['verify' => 'qué documento habilita a circular mientras llega la chapa definitiva de una moto 0 km; fuente: Registro de Automotores y ley 4980'],
            ]],
            ['h2' => 'Qué revisar en la chapa de una moto usada', 'id' => 'usada', 'body' => [
                ['ol' => [
                    'Que esté puesta en la moto, firme y legible, con el formato que corresponde a su año de inscripción.',
                    'Que los números y letras coincidan exactamente con los de la cédula verde. Está explicada en [cédula verde de moto](/guias/cedula-verde-de-moto).',
                    'Que no haya signos de que fue cambiada o retocada: remaches nuevos en una chapa vieja, pintura corrida, un dobladillo distinto.',
                    'Que la chapa corresponda al titular que te vende, o que la cadena de dueños esté documentada. El resto de los papeles, en [qué papeles tiene que tener una moto al día](/guias/papeles-de-una-moto-al-dia).',
                ]],
                'Si la chapa se perdió o se la robaron, no compres hasta que el vendedor te muestre el trámite de reposición hecho.',
                ['verify' => 'procedimiento y requisitos para duplicar o reponer la chapa de una moto; fuente: Registro de Automotores'],
            ]],
            ['h2' => 'La chapa y el casco', 'id' => 'casco', 'body' => [
                'La chapa de la moto también aparece en el casco: la Ley 5016/14 pide que el casco lleve grabado el número de chapa en la parte inferior externa. Entonces, el casco que compres tiene que poder grabarse con tu chapa. Los detalles están en [casco obligatorio en Paraguay](/guias/casco-obligatorio-paraguay).',
            ]],
            ['h2' => 'La chapa y la habilitación municipal', 'id' => 'habilitacion', 'body' => [
                'La habilitación municipal de la moto es otro trámite, distinto del Registro de Automotores. La municipalidad de Asunción, por ejemplo, pide la cédula del automotor expedida por el Registro cuando la moto tiene chapa definitiva. Mirá la guía de [cédula verde de moto](/guias/cedula-verde-de-moto).',
            ]],
        ],
        'faq'             => [
            ['q' => '¿Desde cuándo hay chapa Mercosur en Paraguay?', 'a' => 'Se empezó a emitir el 1 de julio de 2019; desde entonces las motos que se inscriben por primera vez la reciben.'],
            ['q' => '¿Cómo es la chapa Mercosur de una moto?', 'a' => 'Tiene tres números y cuatro letras, por ejemplo 123 ABCD.'],
            ['q' => '¿Se puede cambiar una chapa vieja por la Mercosur?', 'a' => 'Existe un canje con un formulario electrónico de la Dirección del Registro de Automotores y verificación física del vehículo. Consultá los requisitos en el Registro.'],
        ],
        'links'           => [
            ['path' => '/guias/cedula-verde-de-moto', 'label' => 'Cédula verde de moto'],
            ['path' => '/guias/papeles-de-una-moto-al-dia', 'label' => 'Papeles de una moto al día'],
            ['path' => '/motos', 'label' => 'Motos en Paraguay'],
        ],
        'related'         => ['cedula-verde-de-moto', 'casco-obligatorio-paraguay', 'habilitacion-de-moto-para-delivery'],
        'quiz'            => null,
        'sources'         => [
            ['label' => 'Mercosur: en Paraguay los vehículos matriculados pueden canjear sus chapas por la Patente MERCOSUR', 'url' => 'https://www.mercosur.int/en-paraguay-los-vehiculos-matriculados-pueden-canjear-sus-chapas-por-la-patente-mercosur', 'accessed' => '2026-10-01'],
            ['label' => 'ABC Color: desde hoy comienzan a registrarse vehículos con la chapa Mercosur (1/7/2019)', 'url' => 'https://www.abc.com.py/nacionales/2019/07/01/desde-hoy-comienzan-a-registrarse-rodados-con-la-chapa-mercosur/', 'accessed' => '2026-10-01'],
            ['label' => 'Poder Judicial: nuevo procedimiento para el registro y circulación de motocicletas (Ley 4980)', 'url' => 'https://www.pj.gov.py/notas/28670-nuevo-procedimiento-para-el-registro-y-circulacion-de-motocicletas-y-vehiculos-similares', 'accessed' => '2026-10-01'],
            ['label' => 'Poder Judicial: requisitos para matriculación e inscripción', 'url' => 'https://www.pj.gov.py/descargar/ID3-682_requisitos_expedicion_documentos.pdf', 'accessed' => '2026-10-01'],
            ['label' => 'Ley 5016/14 Nacional de Tránsito y Seguridad Vial (BACN)', 'url' => 'https://www.bacn.gov.py/leyes-paraguayas/4418/ley-n-5016-nacional-de', 'accessed' => '2026-10-01'],
        ],
    ],
    'cedula-verde-de-moto' => [
        'group'           => 'tramites',
        'title'           => 'Cédula verde de moto: qué es y para qué sirve',
        'navLabel'        => 'Cédula verde de moto',
        'seoTitle'        => 'Cédula verde de moto: qué es y para qué sirve',
        'metaDescription' => 'Qué es la cédula verde de una moto en Paraguay, quién la emite, para qué trámites se pide y cómo revisarla antes de comprar una moto usada.',
        'query'           => 'cédula verde moto paraguay',
        'published'       => '2026-10-01',
        'updated'         => '2026-10-01',
        'hero'            => [
            'h1'   => 'Cédula verde de moto en Paraguay',
            'lead' => 'El documento que acredita la moto, quién lo emite, para qué te lo piden y cómo comprobar que es de verdad.',
        ],
        'intro'           => [
            'La cédula verde es el documento del automotor: la emite el Registro del Automotor y es el papel que te piden cuando habilitás la moto en la municipalidad. Si comprás una moto usada, es de lo primero que tenés que ver.',
            'Esta guía no repite la lista completa de papeles: eso lo tenés en [qué papeles tiene que tener una moto al día](/guias/papeles-de-una-moto-al-dia). Acá nos quedamos con la cédula verde en sí.',
        ],
        'sections'        => [
            ['h2' => 'Qué es y quién la emite', 'id' => 'que-es', 'body' => [
                'Según las fuentes que consultamos, la cédula verde la emite el Registro del Automotor. La municipalidad de Asunción la pide como cédula del automotor para habilitar vehículos con chapa definitiva, y para las motos que no son 0 km suma un informe de inspección técnica vehicular emitido por un centro habilitado.',
                'Los datos de identificación de la moto (chapa, chasis, motor) y los del titular figuran en ese documento, y por eso el vendedor tiene que mostrártela y vos compararla con la moto real.',
                ['verify' => 'nombre oficial del documento (cédula verde, cédula del automotor o título) y qué datos exactos contiene; fuente: Dirección del Registro de Automotores'],
            ]],
            ['h2' => 'La cédula verde digital', 'id' => 'digital', 'body' => [
                'El MITIC informó de un acuerdo interinstitucional con la Dirección del Registro de Automotores para que las personas puedan acceder a la cédula digital del automotor desde la aplicación Paraguay. Si ya la tenés en el celular, guardá además una captura o una copia en papel en un lugar seguro.',
                ['verify' => 'si la cédula digital reemplaza a la impresa ante la Patrulla Caminera y los agentes municipales; fuente: MITIC y Registro de Automotores'],
            ]],
            ['h2' => 'Cómo revisarla antes de comprar una moto usada', 'id' => 'revisar', 'body' => [
                ['ol' => [
                    'Pedí el documento original y mirá que no esté tachado, borrado o enmendado.',
                    'Compará el número de chasis y de motor impresos con los grabados en la moto. Si no coinciden, no sigas.',
                    'Verificá que la chapa sea la misma que lleva la moto. Mirá [la chapa de la moto](/guias/chapa-de-moto).',
                    'Confirmá que el nombre del titular sea el de quien te vende, con su cédula de identidad en la mano.',
                    'Preguntá si hay una prenda o un embargo. Un papel limpio no te dice si la moto está libre de deudas.',
                ]],
                'Una moto cuyo vendedor "tiene los papeles en trámite" y no te muestra la cédula es una señal de alerta. Es lo que explicamos en la guía de papeles.',
                ['verify' => 'cómo consultar si una moto tiene prenda o embargo y el costo del informe del Registro; fuente: Registro de Automotores'],
            ]],
            ['h2' => 'Para qué trámites te la van a pedir', 'id' => 'tramites', 'body' => [
                ['list' => [
                    '**Habilitación municipal de la moto.** Es un requisito de la municipalidad de Asunción para rodados con chapa definitiva.',
                    '**Transferencia.** El paso a paso está en nuestras guías de papeles; el procedimiento exacto depende del Registro.',
                    '**Controles en ruta.** Llevá siempre tus documentos. Lo que puede pasar si no los llevás está en [multas de tránsito para motos](/guias/multas-de-transito-para-motos).',
                ]],
                'Si trabajás con la moto (reparto, mensajería), leé [habilitación de moto para delivery](/guias/habilitacion-de-moto-para-delivery).',
            ]],
            ['h2' => 'Errores frecuentes con este documento', 'id' => 'errores', 'body' => [
                ['list' => [
                    'Aceptar una fotocopia o una foto del documento en lugar del original. Una copia no te dice si el original fue reemplazado o está en manos de otra persona.',
                    'Mirar sólo el nombre del titular y no los números de chasis y de motor, que son los que identifican a la moto.',
                    'Pagar la seña antes de ver el documento. Primero el papel, después el dinero.',
                    'Confiar en lo que te cuenta un conocido sobre el vendedor en vez de comprobarlo vos mismo con el documento a la vista.',
                ]],
                'Si algo no cierra, pedí un tiempo para consultar en el Registro del Automotor. Un vendedor honesto no te apura.',
            ]],
            ['h2' => 'Si la perdés o te la roban', 'id' => 'perdida', 'body' => [
                'Hacé la denuncia lo antes posible y guardá una copia. Después consultá en el Registro del Automotor cómo se pide un duplicado. Mientras no lo tengas, evitá circular con la moto: sin el documento, un control te puede demorar la moto.',
                ['verify' => 'requisitos y costo para obtener un duplicado de la cédula verde; fuente: Registro de Automotores'],
            ]],
        ],
        'faq'             => [
            ['q' => '¿Quién emite la cédula verde?', 'a' => 'El Registro del Automotor, según las fuentes oficiales y municipales que consultamos.'],
            ['q' => '¿Para qué trámite municipal se pide?', 'a' => 'La Municipalidad de Asunción la pide, como cédula del automotor, para habilitar vehículos con chapa definitiva.'],
            ['q' => '¿Existe una versión digital?', 'a' => 'Sí: el MITIC informó que se puede acceder a la cédula digital del automotor desde la aplicación Paraguay.'],
        ],
        'links'           => [
            ['path' => '/guias/chapa-de-moto', 'label' => 'Chapa de moto'],
            ['path' => '/guias/papeles-de-una-moto-al-dia', 'label' => 'Papeles de una moto al día'],
            ['path' => '/motos', 'label' => 'Motos en Paraguay'],
        ],
        'related'         => ['chapa-de-moto', 'multas-de-transito-para-motos', 'habilitacion-de-moto-para-delivery'],
        'quiz'            => null,
        'sources'         => [
            ['label' => 'Municipalidad de Asunción: requisitos para habilitación de motocicletas (rodados)', 'url' => 'https://www.asuncion.gov.py/wp-content/uploads/2022/03/Habilitacio%CC%80n-de-rodados-Motocicletas.pdf', 'accessed' => '2026-10-01'],
            ['label' => 'MITIC: ciudadanos podrán acceder a la cédula digital del automotor', 'url' => 'https://mitic.gov.py/tras-acuerdo-interinstitucional-ciudadanos-podran-acceder-a-la-cedula-digital-del-automotor/', 'accessed' => '2026-10-01'],
            ['label' => 'Poder Judicial: modificación de la Ley del Registro de Motocicletas y Vehículos Similares', 'url' => 'https://www.pj.gov.py/contenido/1456-modificacion-de-la-ley-del-registro-de-motocicletas-y-vehiculos-similares/1456', 'accessed' => '2026-10-01'],
        ],
    ],
    'habilitacion-de-moto-para-delivery' => [
        'group'           => 'tramites',
        'title'           => 'Habilitación de moto para delivery en Paraguay',
        'navLabel'        => 'Habilitación de moto para delivery',
        'seoTitle'        => 'Habilitación de moto para delivery en Paraguay',
        'metaDescription' => 'Qué papeles necesitás para hacer delivery en moto en Paraguay: licencia de motociclista, habilitación de la moto, casco, chaleco y documentos.',
        'query'           => 'habilitación moto delivery paraguay',
        'published'       => '2026-10-01',
        'updated'         => '2026-10-01',
        'hero'            => [
            'h1'   => 'Habilitación de moto para delivery en Paraguay',
            'lead' => 'Los papeles y el equipo que tenés que tener en regla para trabajar en moto, y lo que no pudimos confirmar.',
        ],
        'intro'           => [
            'Trabajar con la moto, sea con una app o con un comercio, te expone más: pasás más horas en la calle, con más controles y con más riesgo de accidente. Por eso los papeles tienen que estar al día antes del primer pedido, no después de la primera multa.',
            'Una aclaración: no encontramos una norma paraguaya que regule el delivery en moto con un registro propio, como el que existe en otros países. Lo que sigue son las reglas generales que se aplican a cualquier moto y a su conductor, y lo que depende de la plataforma o del comercio lo dejamos marcado.',
        ],
        'sections'        => [
            ['h2' => 'La licencia de motociclista', 'id' => 'licencia', 'body' => [
                'Para manejar una moto necesitás la licencia de categoría motociclista, que se pide desde los 18 años. Si todavía no la tenés, empezá por [registro de conducir para moto](/guias/registro-de-conducir-para-moto). Manejar con la licencia vencida o sin llevarla consigo es una infracción: lo contamos en [multas de tránsito para motos](/guias/multas-de-transito-para-motos).',
                ['verify' => 'si el reparto o la mensajería remunerada exige una categoría profesional distinta de la de motociclista; fuente: ANTSV o ley de tránsito'],
            ]],
            ['h2' => 'La habilitación de la moto', 'id' => 'habilitacion', 'body' => [
                'La habilitación de la moto se tramita en la municipalidad. En Asunción, para las motos con chapa definitiva piden la cédula del automotor emitida por el Registro y, si la moto no es 0 km, un informe de inspección técnica vehicular de un centro habilitado. Cada municipio tiene su propio trámite: consultá el tuyo.',
                'Una moto con la habilitación vencida o sin portarla también está en la escala de multas de la Caminera, con demora del vehículo. Para repasar el documento base, mirá [cédula verde de moto](/guias/cedula-verde-de-moto) y [chapa de moto](/guias/chapa-de-moto).',
                ['verify' => 'si una moto usada para reparto necesita una habilitación comercial o un seguro específico, además de la habilitación común; fuente: municipalidad y Superintendencia de Seguros'],
            ]],
            ['h2' => 'Casco y chaleco reflectivo', 'id' => 'equipo', 'body' => [
                'La ley de tránsito pide casco normalizado y chaleco reflectivo, y el casco tiene que llevar grabada la chapa de la moto. Si hacés delivery por la noche o con lluvia, es todavía más importante que se te vea. Todo el detalle está en [casco obligatorio en Paraguay](/guias/casco-obligatorio-paraguay).',
                'Si usás una caja o mochila de reparto, fijate que no tape la chapa ni las luces, y que no te corra el peso hacia atrás de modo que la moto se ponga inestable al frenar.',
            ]],
            ['h2' => 'Qué te puede pedir la plataforma o el comercio', 'id' => 'plataforma', 'body' => [
                'Las aplicaciones y los comercios suelen pedir documentos propios además de los legales: foto de la licencia y de la cédula verde, a veces un certificado de antecedentes. Esos requisitos los fija cada empresa y cambian, así que no los podemos dar como regla.',
                ['verify' => 'requisitos de registro de repartidores de las principales aplicaciones de delivery que operan en Paraguay; fuente: sitios de las propias empresas'],
                'Lo que sí podés hacer es tener un sobre con todo: licencia, cédula verde, habilitación y el comprobante de seguro si lo tenés, con copias digitales en el celular.',
                'Revisá la fecha de vencimiento de cada papel una vez por mes. Un documento vencido es lo que más seguido frena a quien trabaja con la moto, porque cada hora parada es plata que no entra.',
            ]],
            ['h2' => 'Mantenimiento y moto adecuada para trabajar', 'id' => 'moto', 'body' => [
                'Una moto de trabajo recorre muchos kilómetros: frenos, cubiertas y kit de arrastre se gastan más rápido. Revisalos con frecuencia y fijate en las guías de mantenimiento del sitio. Si estás por comprar una, mirá el catálogo de [motos](/motos).',
            ]],
        ],
        'faq'             => [
            ['q' => '¿Hace falta una licencia especial para hacer delivery en moto?', 'a' => 'No encontramos una norma que lo exija; para manejar una moto se pide la licencia de categoría motociclista. Confirmalo con la ANTSV o con tu municipalidad.'],
            ['q' => '¿Qué documentos tengo que llevar en la moto?', 'a' => 'La licencia, y los papeles de la moto: la cédula del automotor y la habilitación. Si no los portás, la Caminera puede demorar la moto.'],
            ['q' => '¿Es obligatorio el chaleco reflectivo?', 'a' => 'Sí, la Ley 5016/14 exige llevar puesto un chaleco reflectivo aprobado o certificado.'],
        ],
        'links'           => [
            ['path' => '/guias/registro-de-conducir-para-moto', 'label' => 'Registro de conducir para moto'],
            ['path' => '/guias/casco-obligatorio-paraguay', 'label' => 'Casco obligatorio en Paraguay'],
            ['path' => '/motos', 'label' => 'Motos en Paraguay'],
        ],
        'related'         => ['registro-de-conducir-para-moto', 'cedula-verde-de-moto', 'multas-de-transito-para-motos'],
        'quiz'            => null,
        'sources'         => [
            ['label' => 'Municipalidad de Asunción: requisitos para habilitación de motocicletas (rodados)', 'url' => 'https://www.asuncion.gov.py/wp-content/uploads/2022/03/Habilitacio%CC%80n-de-rodados-Motocicletas.pdf', 'accessed' => '2026-10-01'],
            ['label' => 'Ley 5016/14 Nacional de Tránsito y Seguridad Vial (BACN)', 'url' => 'https://www.bacn.gov.py/leyes-paraguayas/4418/ley-n-5016-nacional-de', 'accessed' => '2026-10-01'],
            ['label' => 'Revista Plus: aumentan las sanciones de la Patrulla Caminera (2/7/2026)', 'url' => 'https://revistaplus.com.py/2026/07/02/aumentan-las-sanciones-de-la-patrulla-caminera-tras-el-reajuste-salarial/', 'accessed' => '2026-10-01'],
        ],
    ],
    /* == /B5 == */
];
