# Catálogo ampliado — investigación R1

Fase R1 de `PLAN.md` (§1 D4–D7, §2.2, §4.18). Consulta: **2026-09-30** en todos los hechos. Salida:
`content/catalogo.php`, generado por `php docs/research/build-catalogo.php` a partir del registro de investigación
`docs/research/catalogo/*.json` (un archivo por grupo de marcas y por pasada, con las búsquedas hechas y lo descartado).
`php docs/research/check-catalogo.php` es el control de salida (ver §6).

## 0. Método (§4.18) — leer antes que el resto

- **El entorno no abre páginas.** `curl` y `WebFetch` a cualquier dominio de interés (`hondamotos.com.py`,
  `kenton.com.py`, `chacomer.com.py`, `abc.com.py`, `classicmotos.com.py`…) devuelven 403 del proxy de egreso
  (`EGRESS_BLOCKED`), igual que en la fase R0 de `moto` (`moto/docs/research/catalog.md` §0). Todo hecho de este catálogo se
  leyó a través de `WebSearch`, que devuelve el título, la URL y un resumen del texto real de la página. Cada entrada de
  `sources` lleva `method: 'snippet'`; ninguna dice `page`.
- **Primera pasada (5 agentes, sin filtro de dominio)** por grupo de marcas. Resultado: 138 modelos, pero con un defecto
  serio: los resúmenes mezclan fichas de otros países (Ecuador, Argentina, México) cuando la búsqueda no está acotada. Por
  eso la mayoría de las specs de Honda se descartaron en esa misma pasada.
- **Segunda pasada (3 agentes) con `allowed_domains` restringido a dominios paraguayos** (sitio de la marca en Paraguay,
  distribuidor, comercios `.com.py`, prensa paraguaya). Una cifra sólo cuenta si el resumen la ata a una URL de ese
  dominio y al modelo exacto; esa URL es la fuente del hecho.
- **Curaduría Opus** sobre las dos pasadas (§4 de este documento): se quitó toda cifra ambigua, todo precio que no fuera
  un precio 0 km vigente y toda URL cuyo título no nombra al modelo.
- **Rótulo visible.** El `label` de un hecho es el nombre del publicador derivado del dominio (`Chacomer`, `Kenton`,
  `Honda Motos Paraguay`, `Classic Motos`…), porque el render lo muestra como "Precio publicado por {fuente}". El rótulo
  libre de la investigación queda en `sources[].note`.
- **Confianza.** Un resumen de búsqueda es un escalón por debajo de leer la página. Las cifras que quedaron son las que
  el resumen atribuía de forma explícita; aun así, una sesión con acceso de red debería re-confirmar precios contra la
  página viva (Backlog: re-verificación mensual de precios).

## 1. Resultado

**14 marcas, 120 modelos** (los 35 modelos activos de la semilla de `moto`, con sus slugs idénticos, más 85 nuevos).
83 modelos tienen al menos un precio 0 km publicado; 76 tienen ≥ 3 specs con fuente. 41 modelos más quedaron en la
**próxima tanda** (§5) por el tope de 120 del prompt. Categorías (slugs de `categories.ts`):

`naked` 45, `enduro-cross` 21, `scooter` 12, `cub` 12, `touring` 11, `cuatriciclo` 7, `electrica` 6, `motocarro-carga` 5, `custom-chopper` 1.

## 2. Marcas y distribuidores

| Marca | Distribuidor | Fuente | Modelos | Con precio | Con ≥ 3 specs |
|---|---|---|---|---|---|
| Honda (`honda`) | DIESA S.A. | [ABC Color](https://www.abc.com.py/empresariales/2025/03/15/diesa-presento-las-nuevas-motos-honda-nx190-y-cb190r-20/) | 16 | 7 | 6 |
| Star (`star`) | Alex S.A. | [ABC Color](https://www.abc.com.py/empresariales/2025/07/10/star-la-motocicleta-que-acompana-en-todo-lo-que-uno-se-propone/) | 16 | 9 | 12 |
| Yamaha (`yamaha`) | Chacomer S.A.E. | [Yamaha Motor Paraguay](http://yamaha-motor.com.py/producto/51/xtz-150) | 12 | 9 | 10 |
| Suzuki (`suzuki`) | Chacomer S.A.E. | [ABC Color](https://www.abc.com.py/empresariales/2025/01/14/suzuki-motos-regresa-a-paraguay-con-chacomer/) | 7 | 7 | 5 |
| Bajaj (`bajaj`) | Asunción Motor Sport S.A. (AMS) | [La Nación](https://www.lanacion.com.py/negocios_edicion_impresa/2019/01/12/bajaj-llego-al-paraguay-y-busca-ser-lider-en-el-segmento-de-motos/) | 3 | 1 | 0 |
| TVS (`tvs`) | Chacomer S.A.E. | [TVS Motor Paraguay](https://paraguay.tvsmotor.com/en/) | 7 | 7 | 3 |
| Kenton (`kenton`) | Chacomer S.A.E. | [Chacomer](https://www.chacomer.com.py/moto/kenton.html) | 38 | 35 | 22 |
| BMW Motorrad (`bmw-motorrad`) | Garden Automotores S.A. | [La Nación](https://www.lanacion.com.py/negocios_edicion_impresa/2018/03/26/bmw-motorrad-paraguay-lanzo-la-nueva-g-310-gs/) | 3 | 0 | 3 |
| CFMoto (`cfmoto`) | IMAG | [CFMoto Paraguay](https://www.cfmoto.com.py/motos.php) | 1 | 0 | 1 |
| Triumph (`triumph`) | Mecauto S.A. | [Triumph Motorcycles](https://www.triumph-motorcycles.co/triumph-hub-page/paraguay) | 1 | 0 | 1 |
| Taiga (`taiga`) | Inverfin | [Inverfin](https://inverfin.com.py/collections/taiga) | 7 | 5 | 7 |
| Leopard (`leopard`) | Reimpex | [Reimpex](https://www.reimpex.com.py/leopard) | 6 | 0 | 6 |
| Super Soco (`super-soco`) | Quantum Motors | [InfoNegocios](https://infonegocios.com.py/infomotor/donde-conseguir-motos-electricas-tipo-scooter-en-paraguay-aca-tenes-unas-opciones) | 2 | 2 | 0 |
| Yadea (`yadea`) | Quantum Motors | [InfoNegocios](https://infonegocios.com.py/infomotor/donde-conseguir-motos-electricas-tipo-scooter-en-paraguay-aca-tenes-unas-opciones) | 1 | 1 | 0 |

Notas por marca (del registro de investigación; las cifras de mercado son de la fuente, no verificadas):
- **Honda:** DIESA S.A. confirmado por prensa (ABC 2025-03-15, La Nación 2025-04-04). `hondamotos.com.py` publica fichas en
  PDF (`/uploads/products/<n>.pdf`) que no se pudieron leer: son la primera fuente a abrir con otra red.
- **Kenton:** marca de Chacomer fabricada en Paraguay; `kenton.com.py` publica precio contado y "cuotas desde" por modelo.
- **Star:** marca de Alex S.A., ensamblada en Paraguay; `star.com.py` no publica precio ("Ver precio"); los precios salen de
  `alex.com.py`.
- **Taiga / Leopard:** marcas de ensamble nacional (Inverfin y Reimpex, planta en Luque). Un resumen de búsqueda atribuye a
  la prensa que Taiga, Kenton y Leopard dominan el mercado y que ~98 % de las motos vendidas son de fabricación nacional:
  **no se usa como dato** (no se leyó el artículo).
- **Suzuki:** Chacomer desde enero de 2025 (ABC 2025-01-14); importador anterior Censu S.A. Precios en US$ en
  `suzukimotos.com.py`.
- **Bajaj:** AMS confirmado (La Nación 2019-01-12), pero sin precio ni ficha vigentes en dominios paraguayos; los precios de
  lanzamiento de 2019 se descartaron (§4).
- **Super Soco / Yadea:** Quantum Motors (`tuquantum.com.py`), según InfoNegocios.

## 3. Modelos incluidos

| Modelo | Categoría | Specs con fuente | Precio 0 km publicado |
|---|---|---|---|
| `honda/cb-500x` | touring | 0 | — |
| `honda/cb1-125` | naked | 8 | Gs. 13.950.000 (Classic Motos) |
| `honda/cb160f` | naked | 4 | Gs. 19.105.000 (Classic Motos) |
| `honda/cg-110` | naked | 0 | — |
| `honda/crf-250f` | enduro-cross | 0 | — |
| `honda/dio-110` | scooter | 1 | Gs. 10.725.000 (Honda Motos Paraguay) |
| `honda/navi-110` | scooter | 0 | — |
| `honda/nx190` | enduro-cross | 6 | — |
| `honda/nx500` | touring | 1 | — |
| `honda/rebel-500` | custom-chopper | 0 | — |
| `honda/wave` | cub | 4 | Gs. 16.150.000 (Classic Motos) |
| `honda/x-adv-750` | scooter | 2 | — |
| `honda/xr-150` | enduro-cross | 1 | Gs. 20.267.000 (Honda Motos Paraguay); Gs. 21.500.000 (Classic Motos) |
| `honda/xr-190` | enduro-cross | 0 | Gs. 26.500.000 (Classic Motos) |
| `honda/xr-250-tornado` | enduro-cross | 5 | Gs. 49.300.000 (Classic Motos) |
| `honda/xr-650l` | enduro-cross | 4 | — |
| `star/150-x` | naked | 2 | Gs. 6.800.000 (Alex S.A.) |
| `star/dax-110` | cub | 7 | Gs. 5.400.000 (Alex S.A.) |
| `star/dax-a-110` | cub | 2 | Gs. 5.900.000 (Alex S.A.) |
| `star/fxz-150` | naked | 2 | Gs. 9.500.000 (Alex S.A.) |
| `star/genius-125` | scooter | 5 | Gs. 6.600.000 (Alex S.A.) |
| `star/magic-125` | scooter | 5 | Gs. 6.900.000 (Alex S.A.) |
| `star/new-desert-150` | enduro-cross | 2 | Gs. 8.500.000 (Alex S.A.) |
| `star/nt-a-150` | naked | 7 | — |
| `star/rx4-150` | naked | 8 | — |
| `star/smx-150` | enduro-cross | 11 | — |
| `star/star-125` | naked | 5 | Gs. 5.650.000 (Alex S.A.) |
| `star/star-150` | naked | 8 | Gs. 5.800.000 (Alex S.A.) |
| `star/super-carga-200` | motocarro-carga | 4 | — |
| `star/tr-5-150` | naked | 3 | — |
| `star/xpro-150` | naked | 3 | — |
| `star/xvr-200` | enduro-cross | 7 | — |
| `yamaha/crypton` | cub | 6 | Gs. 13.990.000 (Chacomer) |
| `yamaha/fz-25` | naked | 4 | — |
| `yamaha/mt-03` | naked | 9 | US$ 7.900 (Chacomer) |
| `yamaha/mt-07` | naked | 6 | US$ 11.870 (Chacomer); US$ 11.627 (Chacomer); US$ 11.900 (Yamaha Paraguay) |
| `yamaha/mt-09` | naked | 6 | US$ 14.900 (Chacomer) |
| `yamaha/tenere-700` | touring | 0 | US$ 16.300 (Chacomer); US$ 16.300 (Chacomer) |
| `yamaha/xtz-125` | enduro-cross | 6 | Gs. 21.210.000 (Chacomer) |
| `yamaha/xtz-150` | enduro-cross | 8 | Gs. 25.000.000 (Chacomer); Gs. 25.000.000 (Chacomer) |
| `yamaha/xtz-250` | enduro-cross | 0 | — |
| `yamaha/ybr-125e` | naked | 5 | — |
| `yamaha/ybr-125z` | naked | 9 | Gs. 16.800.000 (Chacomer) |
| `yamaha/yc-z-110` | naked | 6 | Gs. 11.500.000 (Chacomer) |
| `suzuki/dr-650` | enduro-cross | 9 | US$ 8.990 (Suzuki Motos Paraguay) |
| `suzuki/gixxer-150` | naked | 6 | Gs. 17.899.000 (Suzuki Motos Paraguay) |
| `suzuki/gixxer-250` | naked | 6 | Gs. 27.170.000 (Suzuki Motos Paraguay) |
| `suzuki/v-strom-1050` | touring | 2 | US$ 16.990 (Suzuki Motos Paraguay) |
| `suzuki/v-strom-250` | touring | 5 | US$ 4.990 (Suzuki Motos Paraguay) |
| `suzuki/v-strom-650` | touring | 3 | US$ 10.990 (Suzuki Motos Paraguay) |
| `suzuki/v-strom-800` | touring | 1 | US$ 13.990 (Suzuki Motos Paraguay) |
| `bajaj/boxer-150` | naked | 1 | Gs. 7.489.000 (Tupi) |
| `bajaj/dominar-400` | touring | 0 | — |
| `bajaj/rouser-ns-200` | naked | 0 | — |
| `tvs/apache-rtr-160-2v` | naked | 0 | Gs. 14.111.000 (Chacomer); Gs. 14.111.000 (Chacomer) |
| `tvs/hlx-150` | naked | 0 | Gs. 9.402.000 (Chacomer) |
| `tvs/hlx-150-f` | naked | 2 | Gs. 10.077.000 (Chacomer) |
| `tvs/neo-nx-110` | cub | 3 | Gs. 7.555.000 (Chacomer) |
| `tvs/raider-125` | naked | 8 | Gs. 12.375.000 (Tupi); Gs. 12.484.968 (Chacomer) |
| `tvs/ronin-225` | naked | 8 | Gs. 26.203.000 (Chacomer); Gs. 26.203.000 (Chacomer) |
| `tvs/stryker-125` | naked | 2 | Gs. 10.349.000 (Chacomer) |
| `kenton/blitz-110` | cub | 3 | Gs. 6.279.000 (Kenton); Gs. 6.789.000 (Kenton); Gs. 7.074.000 (Kenton) |
| `kenton/blitz-125-sport` | cub | 1 | Gs. 7.513.000 (Kenton); Gs. 7.513.000 (Chacomer) |
| `kenton/bravo-125` | scooter | 11 | Gs. 8.700.000 (Kenton) |
| `kenton/bravo-150` | scooter | 3 | — |
| `kenton/bull-200` | cuatriciclo | 3 | Gs. 13.610.000 (Chacomer) |
| `kenton/classic-125` | naked | 11 | Gs. 6.505.000 (Kenton) |
| `kenton/classic-150` | naked | 6 | Gs. 6.685.000 (Chacomer) |
| `kenton/dkr-150` | enduro-cross | 11 | Gs. 10.939.000 (Kenton) |
| `kenton/dkr-200` | enduro-cross | 7 | Gs. 12.047.000 (Kenton); Gs. 12.047.000 (Chacomer) |
| `kenton/e-kenton-next-v1` | electrica | 2 | Gs. 7.282.000 (Kenton); Gs. 7.282.000 (Chacomer) |
| `kenton/e-kenton-next-v3` | electrica | 1 | Gs. 8.092.000 (Kenton); Gs. 8.092.000 (Chacomer) |
| `kenton/e-kenton-next-v5` | electrica | 0 | Gs. 8.506.000 (Kenton); Gs. 8.506.000 (Chacomer) |
| `kenton/forza-150` | naked | 12 | Gs. 7.489.000 (Kenton) |
| `kenton/fusion-125` | cub | 1 | Gs. 7.641.000 (Kenton); Gs. 7.641.000 (Chacomer) |
| `kenton/fusion-135` | cub | 0 | Gs. 7.780.000 (Kenton); Gs. 7.780.000 (Kenton) |
| `kenton/gl-125` | naked | 4 | Gs. 6.618.000 (Kenton); Gs. 6.618.000 (Chacomer) |
| `kenton/gl-150` | naked | 10 | Gs. 7.489.000 (Kenton) |
| `kenton/gl-150-pro` | naked | 13 | Gs. 7.715.000 (Kenton) |
| `kenton/gtr-150` | naked | 8 | Gs. 9.063.000 (Kenton) |
| `kenton/gtr-150-ltd` | naked | 7 | Gs. 9.556.000 (Kenton); Gs. 9.764.000 (Kenton) |
| `kenton/gtr-200-ltd` | naked | 3 | Gs. 10.833.000 (Kenton); Gs. 10.833.000 (Chacomer) |
| `kenton/quest-200` | cuatriciclo | 1 | Gs. 22.600.000 (Kenton); Gs. 22.600.000 (Chacomer) |
| `kenton/quest-300-4x4` | cuatriciclo | 1 | Gs. 38.974.000 (Kenton) |
| `kenton/quest-atv-500-4x4` | cuatriciclo | 1 | Gs. 47.571.000 (Kenton) |
| `kenton/quick-125` | scooter | 11 | — |
| `kenton/road-power-170` | scooter | 10 | Gs. 9.500.000 (Kenton); Gs. 9.500.000 (Chacomer) |
| `kenton/shark-150` | enduro-cross | 11 | Gs. 9.981.000 (Kenton) |
| `kenton/shark-200` | enduro-cross | 7 | Gs. 10.621.000 (Chacomer) |
| `kenton/skua-150` | enduro-cross | 12 | Gs. 9.189.000 (Kenton) |
| `kenton/spark-150` | scooter | 10 | — |
| `kenton/stratta-200` | naked | 13 | Gs. 13.350.000 (Chacomer) |
| `kenton/symphony-125s` | scooter | 1 | Gs. 12.500.000 (Kenton) |
| `kenton/transporter-150-hd` | motocarro-carga | 1 | Gs. 17.984.000 (Kenton); Gs. 17.984.000 (Chacomer) |
| `kenton/transporter-180` | motocarro-carga | 1 | Gs. 18.880.000 (Kenton) |
| `kenton/transporter-210-hd` | motocarro-carga | 1 | Gs. 22.330.000 (Kenton); Gs. 22.330.000 (Chacomer) |
| `kenton/volkano-125` | cuatriciclo | 1 | Gs. 11.202.000 (Kenton); Gs. 11.202.000 (Chacomer) |
| `kenton/volkano-150-off-road` | cuatriciclo | 1 | Gs. 16.900.000 (Kenton); Gs. 16.900.000 (Kenton) |
| `kenton/volkano-250-off-road` | cuatriciclo | 1 | Gs. 18.685.000 (Kenton); Gs. 18.685.000 (Chacomer) |
| `bmw-motorrad/g-310-gs` | touring | 5 | — |
| `bmw-motorrad/g-310-r` | naked | 4 | — |
| `bmw-motorrad/r-1300-gs` | touring | 3 | — |
| `cfmoto/450mt` | touring | 3 | — |
| `triumph/speed-400` | naked | 5 | — |
| `taiga/mawi-125` | scooter | 8 | — |
| `taiga/motocarro-tl200zh-3` | motocarro-carga | 6 | Gs. 16.810.000 (Gonzalez Gimenez); Gs. 16.810.000 (Inverfin) |
| `taiga/rally-250` | enduro-cross | 10 | Gs. 12.750.000 (Inverfin) |
| `taiga/tl150-cr1` | naked | 9 | — |
| `taiga/tl200-eclipse-pro-gen1` | naked | 9 | Gs. 8.364.000 (Inverfin) |
| `taiga/tl200-rally` | enduro-cross | 9 | Gs. 11.950.000 (Inverfin) |
| `taiga/tl250-cr5-gt` | enduro-cross | 9 | Gs. 14.995.000 (Inverfin) |
| `leopard/hb-125-grand-tour` | cub | 11 | — |
| `leopard/hb1-110` | cub | 11 | — |
| `leopard/hb1-125` | cub | 3 | — |
| `leopard/ht-150-ba` | naked | 8 | — |
| `leopard/ht-200-ba` | naked | 9 | — |
| `leopard/kh-200` | naked | 5 | — |
| `super-soco/tc-wanderer` | electrica | 2 | Gs. 25.500.000 (Quantum Motors) |
| `super-soco/tc-wanderer-pro` | electrica | 2 | Gs. 37.000.000 (Quantum Motors) |
| `yadea/c-umi` | electrica | 1 | Gs. 7.600.000 (Quantum Motors) |

**Modelos semilla que todavía no pasan el gate de modelo** (§2.3: ni 3 specs con fuente ni precio vigente): `honda/cb-500x`,
`honda/cg-110`, `honda/crf-250f`, `honda/navi-110`, `honda/nx500`, `honda/rebel-500`, `honda/x-adv-750`,
`yamaha/xtz-250`, `bajaj/dominar-400`, `bajaj/rouser-ns-200`. Siguen en el catálogo (son la semilla, D4), pero B1a/B1b
no crean su página hasta que aparezcan datos (D13). Son la primera tarea de la próxima sesión con acceso de red.

## 4. Lo descartado y por qué

Criterio general: sin fuente paraguaya no hay modelo (D4); sin atribución explícita a una URL paraguaya y al modelo exacto no hay cifra (D5); sólo precios 0 km vigentes, nunca cuotas, promociones ni precios de lanzamiento viejos (D6).

**Decisiones de curaduría (Opus):**

- `bajaj/boxer-150 prices` — 2019 launch prices from La Nación — not a current published price; accessed date would present them as fresh (D6)
- `bajaj/rouser-ns-200 prices` — 2019 launch prices from La Nación — not a current published price; accessed date would present them as fresh (D6)
- `bajaj/dominar-400 prices` — 2019 launch prices from La Nación — not a current published price; accessed date would present them as fresh (D6)
- `honda/msx125-grom` — only evidence is the summary of an old multi-model DIESA ad (#92967) or a hondamotos.com.py URL whose title names another model; moved to próxima tanda
- `honda/cb650r` — only evidence is the summary of an old multi-model DIESA ad (#92967) or a hondamotos.com.py URL whose title names another model; moved to próxima tanda
- `honda/nc750x` — only evidence is the summary of an old multi-model DIESA ad (#92967) or a hondamotos.com.py URL whose title names another model; moved to próxima tanda
- `kenton/bravo-150 price` — same figure as Bravo 125 in the snippet — likely misattributed
- `kenton/spark-150 price 16000000` — about twice the rest of the Kenton 125–150 range and flagged implausible by the round-2 pass; re-check on kenton.com.py
- `kenton/spark-125 price 15800000` — about twice the rest of the Kenton 125–150 range and flagged implausible by the round-2 pass; re-check on kenton.com.py
- `honda/xr-190 tanque 12 L` — summary cited hondamotos and classicmotos together; source URL uncertain
- `yamaha/fz-25 price 27170000` — FZ-25 figure equals the Gixxer 250 price to the guaraní (misattribution suspected); R 1300 GS "desde" figure is from a March 2024 launch article, not a current price
- `bmw-motorrad/r-1300-gs price 27990` — FZ-25 figure equals the Gixxer 250 price to the guaraní (misattribution suspected); R 1300 GS "desde" figure is from a March 2024 launch article, not a current price
- `taiga/mawi-125 price 5980000` — promotional price (Mawi) or implausible vs. the rest of the Taiga range (TL150 CR1); needs a regular price seen on the page
- `taiga/tl150-cr1 price 18990000` — promotional price (Mawi) or implausible vs. the rest of the Taiga range (TL150 CR1); needs a regular price seen on the page
- `leopard/hb1-125 potencia 7.5 HP, transmision 4 velocidades` — snippet mixed HB1 110 and HB1 125
- `yamaha/fz-25 price 27.170.000` — read from a yamaha.com.py listing page and identical to the Suzuki Gixxer 250 price — likely misattributed by the search summary
- `yamaha/xtz-250 price 39.643.695` — round 2 got a different chacomer figure on each run (39.226.950 / 40.258.890); none is reliable
- `honda/msx125-grom`, `cb650r`, `nc750x` (1ª pasada) — la única evidencia era el resumen de un aviso viejo de DIESA con muchos modelos. En la 2ª pasada Grom y NC750X aparecieron con página propia en `hondamotos.com.py` (título con el modelo exacto) y volvieron; quedaron en la próxima tanda por no tener cifras. CB650R no apareció (la URL `/CB650R/54` es la H'Ness CB350).
- `honda/africa-twin-adventure` — fusionado en `honda/africa-twin` como versión "Adventure".
- Marcas con distribuidor pero sin modelo con evidencia: **Harley-Davidson** (sólo un aviso usado), **Zontes** (sólo Facebook). KTM, Kawasaki, Voge, Triumph (salvo Speed 400), Royal Enfield, Ducati y Benelli tienen modelos, pero sin cifras: quedaron en la próxima tanda y su marca sale del catálogo hasta que tengan un modelo.

**Descartes de los agentes de investigación** (resumidos del registro):

- `Bajaj Pulsar NS 125/160/200, N160, Dominar 250, Platina, RE motocarro` — No Paraguayan product page/press found; only Argentine/Peruvian/Colombian/Ecuadorian pages and a Scribd catalog of unclear origin. (`bajaj-tvs-intl.json`)
- `TVS Ntorq, Apache Sport` — Not found on Chacomer/Tupi/paraguay.tvsmotor.com results. (`bajaj-tvs-intl.json`)
- `TVS Apache RTR 160 2V specs` — Only Indian/Nepali spec pages; left out. (`bajaj-tvs-intl.json`)
- `Bajaj seed specs (Boxer/Rouser/Dominar)` — Only Argentine/other-country spec sources found; omitted per rule. (`bajaj-tvs-intl.json`)
- `KTM models` — Distributor AMS confirmed but only used-bike classifieds found for models. (`bajaj-tvs-intl.json`)
- `Kawasaki models` — Distributor Metalcar confirmed; no model-level data retrieved. (`bajaj-tvs-intl.json`)
- `Zontes, Voge, Triumph, Harley-Davidson models` — Brand/distributor confirmed, no model evidence retrieved in time. (`bajaj-tvs-intl.json`)
- `Husqvarna` — No Paraguayan distributor found (only one used Vitpilen classified). (`bajaj-tvs-intl.json`)
- `Keeway` — No official Paraguayan distributor found. (`bajaj-tvs-intl.json`)
- `Hero` — No Paraguayan distributor or evidence found. (`bajaj-tvs-intl.json`)
- `Haojue` — Only retailers (Motos Genesis, Classic Motos) found, no official distributor designation. (`bajaj-tvs-intl.json`)
- `Motomel, Zanella, Gilera, Corven, Mondial, Italika` — Only Argentine results; no Paraguayan distributor found. (`bajaj-tvs-intl.json`)
- `cg-150-titan` — No Paraguayan evidence; only Brazil/Argentina pages and a generic TikTok/MercadoLibre result (`honda.json`)
- `cb-125 (seed)` — Covered by cb1-125; no separate Paraguayan CB 125 evidence (`honda.json`)
- `CBR 500R, CBR 1000, CRF1100L (as separate entries)` — Named only in DIESA clasipar ad summary; CRF1100 = Africa Twin covered; CBR models not verified (`honda.json`)
- `Specs for most models` — Search summaries mixed regional sources; omitted rather than guess (`honda.json`)
- `Rebel 500 price Gs 38.7-43.9M` — from marketbook.com.py listing summary, not clearly 0km official (`honda.json`)
- `Star NK 150, SK 110` — No product page found in search results under those names. (`kenton-star.json`)
- `Kenton Warrior, TR, Speed, Cargo` — No Paraguayan evidence found for those names. (`kenton-star.json`)
- `Radam` — Press (ABC, Ultima Hora) confirms local assembler Metalúrgica Fernández (Capiatá) but no official distributor page or model page found; model names only seen in classifieds (`other.json`)
- `Sunra` — Snippet said distributed by Import Center in Paraguay but no Paraguayan source page found (`other.json`)
- `Mondial, Mitsui, Buler, Kawaki/Lifan, Shineray, Jincheng, Winner, Daelim, Sundown, Dayun, Luojia, Nakamura, Yumbo, Rouser, Niu` — Not investigated beyond Mondial (no Paraguayan distributor found); no Paraguayan evidence gathered in this round (`other.json`)
- `Cuatriciclos (Hisun, Ventura, Kymco)` — Only Argentine Mercado Libre listings found; no Paraguayan source (`other.json`)
- `Leopard HT 150 price Gs. 4.800.000 / cuotas 449.000` — From TikTok/classified-type sources, not qualifying; HT 150 also not priced by Reimpex (`other.json`)
- `Taiga Mawi 125 and TL150 CR1 prices` — Ambiguous/conflicting figures in snippets; dropped (`other.json`)
- `hondamotos.com.py pages/PDFs via WebFetch` — EGRESS_BLOCKED; search summaries for 31.pdf, 58.pdf, CB-300-F-TWISTER/52 gave no figures (`r2-honda.json`)
- `Navi 109 cc / 104 kg` — summary mixed Navi/34.pdf results, model variant ambiguous (Navi vs Navi 110) (`r2-honda.json`)
- `Prices for CB 300F, CB190R, NX500, Rebel, X-ADV, Africa Twin, XR300, XR650L, Navi` — no Gs. price in any allowed-domain summary (`r2-honda.json`)
- `Harley-Davidson models` — harleyparaguay.com product found (Road Glide 2020) is a used-bike listing; no 0 km model page found (`r2-imports.json`)
- `Zontes models` — no Paraguayan page naming a model found (`r2-imports.json`)
- `Benelli 752S price Gs. 5.980.000` — implausible vs 'habitual' Gs. 8.193.000 in snippet, likely installment/promo artefact (`r2-imports.json`)
- `Chacomer prices for TVS HLX 150 F, Stryker 125, Neo NX 110; XTZ 250` — snippets gave conflicting values across repeated queries (`r2-imports.json`)
- `Yamaha MT-07 'US$ 341', YBR125E 'Gs 376.000', Suzuki V-Strom 650 'PYG 450.500'` — clearly not bike prices (accessory/installment artefacts) (`r2-imports.json`)
- `Bajaj Boxer 150 price Gs. 13.100.000` — conflicted with Tupi product page value 7.489.000; used the latter (`r2-imports.json`)
- `Bajaj Dominar 400 / Rouser NS 200 specs and current price; bajaj.com.py pages` — bajaj.com.py only indexes Pulsar 150; no figures found (`r2-imports.json`)
- `Suzuki V-Strom prices, potencia` — suzukimotos.com.py pages/PDFs not readable through search (`r2-imports.json`)
- `Royal Enfield, Ducati specs/prices` — reimpex/ducati.com.py snippets showed no figures (`r2-imports.json`)
- `Super Soco TC Wanderer / Yadea C-Umi extra specs/prices` — No Paraguay-domain result (classicmotos, tupi, gonzalezgimenez, quantum) returned these models; Classic Motos lists Yadea G5 (new model candidate, not researched). (`r2-local.json`)
- `Kenton Spark 125 price 15.800.000` — implausible vs. other 125s; snippet likely mismatched (`r2-local.json`)
- `Kenton Elegance / Joy 110 prices` — snippets inconsistent (399.000 cuota vs 9.990.000; 126.055 for Joy) (`r2-local.json`)
- `Star NT-A, RX4, TR-5, XPRO 200, New Desert 200, Star 200, A1 110` — snippets returned no specs/prices tied to the model (`r2-local.json`)
- `Taiga HB/other Leopard KH 200 prices, HB 110 Luxury specs` — not in snippets (`r2-local.json`)
- `Yamaha NMAX, XMAX, Aerox, Ray ZR, YZF-R3` — Only Brazil/Colombia/Mexico results; no Paraguayan page found (`yamaha-suzuki.json`)
- `Yamaha YZF-R6, DT125` — Only Chacomer spare-part listings found, not bikes (`yamaha-suzuki.json`)
- `Yamaha Fazer/FZ-S, YBR 150, Crux, YZ, Grizzly/Kodiak` — No Paraguayan evidence found in searches (`yamaha-suzuki.json`)
- `Suzuki GN 125, EN 125, Burgman, GSX-8S, Hayabusa, AX 100` — No Paraguayan evidence found (GN125 only Peru) (`yamaha-suzuki.json`)
- `XTZ 150 specs, V-Strom 650 specs, XTZ 250 specs, XTZ 125 specs` — Snippets aggregated non-Paraguayan sources; dropped per bar (`yamaha-suzuki.json`)

## 5. Próxima tanda

41 modelos con evidencia de venta en Paraguay pero sin precio y con < 3 specs: quedan fuera por el tope de 120 modelos
del prompt y porque no pasarían el gate de §2.3. Lista completa con sus fuentes: `docs/research/proxima-tanda.json`
(la genera el build). Para sumarlos: agregar cifras al JSON de su marca y volver a correr el build.

| Modelo | Categoría | Specs | Fuente de inclusión |
|---|---|---|---|
| `benelli/752s` | naked | 2 | https://inverfin.com.py/collections/benelli |
| `ducati/desertx` | touring | 0 | https://infonegocios.com.py/conosur/ducati-acelera-en-paraguay-imag-registra-un-centenar-de-motocicletas-vendidas-desde-el-2020 |
| `ducati/multistrada` | touring | 0 | https://infonegocios.com.py/conosur/ducati-acelera-en-paraguay-imag-registra-un-centenar-de-motocicletas-vendidas-desde-el-2020 |
| `ducati/scrambler` | naked | 0 | https://infonegocios.com.py/conosur/ducati-acelera-en-paraguay-imag-registra-un-centenar-de-motocicletas-vendidas-desde-el-2020 |
| `honda/africa-twin` | touring | 0 | https://www.abc.com.py/empresariales/2026/04/18/honda-presenta-la-africa-twin-2026-con-diseno-iconico/ |
| `honda/cb-300f-twister` | naked | 0 | https://hondamotos.com.py/productos/CB-300-F-TWISTER/52 |
| `honda/cb190r` | naked | 1 | https://hondamotos.com.py/uploads/products/31.pdf |
| `honda/cb350-hness` | custom-chopper | 0 | https://www.lanacion.com.py/negocios_edicion_impresa/2024/05/22/diesa-presento-a-la-honda-xl-750-transalp-y-a-la-cb-350-hness/ |
| `honda/msx125-grom` | naked | 0 | https://hondamotos.com.py/productos/CB190R/35 |
| `honda/nc750x` | touring | 0 | https://hondamotos.com.py/productos/CB500X/5 |
| `honda/trx-250` | cuatriciclo | 0 | https://hondamotos.com.py/productos/TRX-250-4X2-MANUAL/45 |
| `honda/xl-750-transalp` | touring | 0 | https://www.lanacion.com.py/negocios_edicion_impresa/2024/05/22/diesa-presento-a-la-honda-xl-750-transalp-y-a-la-cb-350-hness/ |
| `honda/xr-300-tornado` | enduro-cross | 0 | https://www.classicmotos.com.py/producto/xr-300-tornado/ |
| `kawasaki/ninja-zx-4r` | deportiva | 2 | https://paraguay.kawasaki-la.com/es-la/motocicleta/ninja/supersport/ninja-zx-4r |
| `kenton/elegance` | scooter | 0 | https://www.chacomer.com.py/motocicleta-scooter-kenton-elegance.html |
| `kenton/joy-110` | cub | 0 | https://www.tupi.com.py/producto/MKP053172/MOTO-KENTON-JOY-110-ROJO- |
| `kenton/spark-125` | scooter | 1 | https://kenton.com.py/moto/spark-125/ |
| `ktm/790-adventure` | touring | 0 | https://infonegocios.com.py/infomotor/1-de-las-10-nuevas-ktm-790-adventure-del-mundo-se-encuentra-disponible-en-paraguay |
| `leopard/hb-110-luxury` | cub | 0 | https://www.reimpex.com.py/leopard/4/hb-110-luxury |
| `royal-enfield/bear-650` | naked | 0 | https://royalenfieldpy.com/motos/ |
| `royal-enfield/classic-350` | custom-chopper | 0 | https://royalenfieldpy.com/motos/ |
| `royal-enfield/himalayan-450` | touring | 0 | https://royalenfieldpy.com/motos/ |
| `royal-enfield/meteor-350` | custom-chopper | 0 | https://royalenfieldpy.com/motos/ |
| `royal-enfield/shotgun-650` | custom-chopper | 0 | https://royalenfieldpy.com/motos/ |
| `royal-enfield/super-meteor-650` | custom-chopper | 0 | https://royalenfieldpy.com/motos/ |
| `star/a1-110` | scooter | 1 | https://star.com.py/producto/SK110-A1-CKD/motoneta-a1-110cc |
| `star/new-desert-200` | enduro-cross | 1 | https://star.com.py/producto/SK200-BR-CKD/new-desert-200cc |
| `star/star-200` | naked | 1 | https://star.com.py/producto/STAR200-CKD/motocicleta-star-200-200cc |
| `star/xpro-200` | naked | 1 | https://star.com.py/producto/XPRO200-R-CKD/xpro-200cc |
| `star/xrm-150` | cub | 1 | https://star.com.py/producto/XRM150-CKD/xrm-150 |
| `triumph/scrambler-400x` | enduro-cross | 0 | https://mecauto.com.py/triumph/scrambler400x/ |
| `triumph/speed-twin` | naked | 0 | https://www.mecauto.com.py/triumph/speedtwinn/ |
| `triumph/tiger-1200` | touring | 0 | https://www.mecauto.com.py/triumph/tiger1200/ |
| `triumph/tiger-900` | touring | 0 | https://www.mecauto.com.py/triumph/tiger900/ |
| `triumph/trident-660` | naked | 0 | https://www.mecauto.com.py/triumph/trident660/ |
| `voge/300-ds` | enduro-cross | 0 | https://voge.com.py/motos/300-ds/ |
| `voge/300-rally` | enduro-cross | 0 | https://voge.com.py/motos/300-rally/ |
| `voge/625-dsx` | touring | 0 | https://voge.com.py/motos/625-dsx/ |
| `voge/ds-525x` | touring | 0 | https://voge.com.py/motos/ds-525x/ |
| `voge/ds-900x` | touring | 0 | https://voge.com.py/motos/ds-900x/ |
| `voge/ds800x-rally` | touring | 0 | https://voge.com.py/motos/ds800x-rally/ |

Otras pistas no investigadas (sin tiempo en esta fase): **Buler** (Bristol, `bristol.com.py/buler`, 110–250 cc),
Yadea G5 (Classic Motos), Leopard HB 110 Intelligence, Honda Biz / Pop / PCX / Elite (no hay página en
`hondamotos.com.py` que los nombre), Bajaj Pulsar 150 (indexado en `bajaj.com.py`), Mitsui, Shineray, Lifan/Kawaki.

## 6. Cuotas publicadas (sólo como dato para `/motos/en-cuotas`, T1)

No son precios y no van a `prices` (D6, D8). Fuente = la página del modelo indicada; consulta 2026-09-30, vía resumen de
búsqueda.

- `kenton/classic-125`: Cuotas desde Gs. 279.000 (source: https://kenton.com.py/moto/classic-125/)
- `kenton/gl-150`: Cuotas desde Gs. 299.000 (source: https://kenton.com.py/moto/gl-150/)
- `kenton/gl-150-pro`: Cuotas desde Gs. 279.000 (source: https://kenton.com.py/moto/gl-150-pro/)
- `kenton/gtr-150`: Cuotas desde Gs. 359.000 (source: https://kenton.com.py/moto/gtr-150/)
- `kenton/gtr-150-ltd`: Cuotas desde Gs. 409.000 (source: https://kenton.com.py/moto/gtr-150-ltd/)
- `kenton/gtr-200-ltd`: Cuotas desde Gs. 459.000 (source: https://kenton.com.py/moto/gtr-200-ltd/)
- `kenton/blitz-125-sport`: Cuotas desde Gs. 339.000 (source: https://kenton.com.py/moto/blitz-125-sport/)
- `kenton/dkr-150`: Cuotas desde Gs. 499.000 (source: https://kenton.com.py/moto/dakar-150/)
- `kenton/dkr-200`: Cuotas desde Gs. 549.000 (source: https://kenton.com.py/moto/dakar-200/)
- `kenton/spark-150`: Cuotas desde Gs. 575.000 (source: https://kenton.com.py/moto/spark150/)
- `kenton/spark-125`: Cuotas desde Gs. 565.000 (source: https://kenton.com.py/moto/spark-125/)
- `kenton/bravo-150`: Cuotas desde Gs. 345.000 (source: https://kenton.com.py/moto/bravo-150/)
- `kenton/bravo-125`: Cuotas desde Gs. 345.000 (source: https://kenton.com.py/moto/bravo-125/)
- `kenton/road-power-170`: Cuotas desde Gs. 339.000 (source: https://kenton.com.py/moto/road-power-170/)
- `kenton/fusion-135`: Cuotas desde Gs. 349.000 (source: https://kenton.com.py/moto/fusion-135/)
- `kenton/transporter-150-hd`: Cuotas desde Gs. 845.000 (source: https://kenton.com.py/moto/transporter-150-hd/)
- `kenton/transporter-180`: Cuotas desde Gs. 931.000 (source: https://kenton.com.py/familia/motocargas/)
- `kenton/transporter-210-hd`: Cuotas desde Gs. 1.049.000 (source: https://kenton.com.py/moto/transporter-210-hd/)
- `kenton/e-kenton-next-v1`: Cuotas desde Gs. 212.000 (source: https://kenton.com.py/moto/e-kenton-next-v1/)
- `kenton/e-kenton-next-v3`: Cuotas desde Gs. 235.000 (source: https://kenton.com.py/moto/e-kenton-next-v3/)
- `kenton/e-kenton-next-v5`: Cuotas desde Gs. 245.000 (source: https://kenton.com.py/moto/e-kenton-next-v5/)
- Suzuki (`suzukimotos.com.py`, páginas de cada modelo): V-Strom 250 desde US$ 158, V-Strom 650 desde US$ 349, V-Strom 800
  desde US$ 444, V-Strom 1050 desde US$ 539, DR 650 desde US$ 285, Gixxer 150 desde Gs. 685.000, Gixxer 250 desde
  Gs. 1.040.000 por mes.
- DIESA (avisos en Clasipar, fecha del aviso desconocida): CG 110 desde Gs. 308.000, Navi 110 desde Gs. 389.000,
  CB1 125 desde Gs. 452.000, XR150L desde Gs. 684.000 — re-confirmar antes de citar.

## 7. Control de salida

`php docs/research/check-catalogo.php` carga `content/catalogo.php` y falla si una marca no tiene distribuidor con fuente,
si un modelo no tiene fuente, categoría válida o slug legal, si **una spec o un precio no es un hecho con fuente** (label,
URL http(s) y fecha `accessed`), si un modelo trae un campo fuera de la forma de §2.2, o si falta una de las 7 marcas o de los
35 modelos activos de la semilla.

