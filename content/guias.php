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
    /* == /B5 == */
];
