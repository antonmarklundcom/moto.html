# PLAN.md — moto.html (sitio HTML + PHP de moto.com.py)

Estado: **v2, revisada con el propietario el 2026-09-30.** Mergear este PR arranca la construcción.

Qué es: el sitio de moto.com.py mientras la app Node.js (`antonmarklundcom/moto`) no se puede alojar. Es HTML + PHP 8.2
en hosting compartido de Hostinger, sin Node y sin base de datos. Se construye desde `antonmarklundcom/php-site-template`
con el módulo de mercado `py`.

**Objetivo único de esta etapa: la mayor cantidad posible de tráfico orgánico desde Google Paraguay, lo antes posible.**
Hoy no hay producto propio ni socio financiero, así que el sitio no vende nada y no promete nada. Rankea, responde
lo que la gente busca sobre motos y deja dos salidas: WhatsApp y un formulario de consulta. Los clasificados quedan
fuera.

**Sobre "decenas de miles de visitas por mes":** no hay datos de volumen confiables para Paraguay (`moto/SEO_ARCHITECTURE.md`
§11 lo advierte), así que este plan no promete un número. Lo que sí hace es cubrir a lo ancho las familias de
búsqueda con más volumen probable: modelo + precio o ficha, reparación, trámites y registro de conducir. Primero se
arma la infraestructura para medir (Search Console, GA4) y el catálogo se amplía en función de lo que muestren los datos.
Un dominio nuevo suele tardar meses en rankear. El plan acorta el arranque (todo indexable desde el día uno), pero no
puede saltearse ese tiempo.

---

## 1. Decisiones ya tomadas — no se reabren

| # | Decisión | Fuente |
|---|---|---|
| D1 | Stack: HTML + PHP 8.2 estático, sin base de datos. Template `php-site-template`, mercado `py`. | Propietario |
| D2 | **Las URLs son las de la app Node** (`moto/SEO_ARCHITECTURE.md` §1, `moto/src/lib/seo/routes.ts`), con los mismos slugs. Una URL publicada no cambia nunca. Sólo se suma una ruta que la app Node no tiene: `/para-marcas-y-comercios` (Q3). | Propietario; SEO §1 |
| D3 | **Sin barra final** (`/motos/honda`). Una URL con barra → 301 a la URL sin barra. `www` → apex, HTTPS. F1 invierte la regla del template. | SEO §1 |
| D4 | Catálogo: la base es la semilla de `moto/src/db/seed-data/` (7 marcas y 35 modelos activos, con los mismos slugs). **La fase R1 lo amplía a toda marca y modelo que se venda o se haya vendido en Paraguay**, con la misma vara de evidencia de `moto/docs/research/catalog.md`: aviso del distribuidor oficial, página de la marca en Paraguay o nota de prensa paraguaya. Un modelo sin esa fuente no entra. Los slugs nuevos siguen `slugify()` de `moto/src/lib/slug.ts` y evitan los reservados. | Propietario 2026-09-30 |
| D5 | Nada inventado. Toda cifra (precio, ficha técnica, arancel, multa, intervalo de service) sale de una fuente citada, con la fecha de consulta. Sin reseñas, ratings, logos, conteos ni "N°1". Sin `AggregateRating`, `Review` ni `Product`/`Offer` en JSON-LD: no vendemos, y un `Offer` diría lo contrario. | CLAUDE.md §3.1; ADR-10 |
| D6 | **Precios:** sólo el precio que publicó una fuente real, mostrado como "Precio publicado por {fuente} — consultado el {d/m/aaaa}". Nunca un precio estimado por nosotros. Un precio con más de 120 días desde la consulta **se oculta solo** (lo hace el código) hasta que se re-verifica. | D5 |
| D7 | **"Pruebas" / tests de motos:** no manejamos las motos, así que no hay "probamos la X". Hay fichas y comparativas armadas con datos de fuente y criterio explícito. "Test" también cubre el **examen teórico del registro de conducir**: sólo se construye si hay un banco de preguntas oficial citable (fase B5). | D5 |
| D8 | **Sin financiación ni promesas.** No hay calculadora de cuotas, formulario de financiación ni "te conseguimos". `/motos/en-cuotas` es informativa: explica cómo funcionan las cuotas y cita, con fecha, planes publicados por distribuidores. El descargo de `moto/PRODUCT_SPEC.md` §2.3 va literal si una página menciona derivar a alguien. | Propietario (Q1) |
| D9 | Español paraguayo con voseo en todo lo visible; `Gs. 12.500.000`; teléfono `0981 123 456` visible y `+595981123456` guardado. Botón principal: **"Escribir por WhatsApp"**. Enviar formulario: **"Enviar consulta"**. | CONTENT_STRATEGY parte 1 |
| D10 | WhatsApp: los CTA pasan por `/ir/wa/general?texto=…&desde=<ruta>` (misma forma que `paths.whatsappGeneral` de la app Node). El clic se registra en un archivo plano y se responde 302 a `wa.me`; si el registro falla, redirige igual. Nunca aparece `wa.me` en el HTML. `/ir/` va en `Disallow`. | ADR-07 |
| D11 | Leads: `enviar.php` guarda **primero** en `logs/leads.jsonl` y después postea a VenderCRM con la key de `config.php`. Obligatorios: `phone` e `idempotency_key = sha256(phone_e164 + "\|" + type + "\|" + YYYY-MM-DD-HH)` en UTC. Nunca `pipeline`, `stage`, `owner` ni `tag` (tampoco dentro de `fields`). Se omiten los opcionales vacíos. `200 duplicate:true` es éxito. El visitante nunca ve un error del CRM. Honeypot en todo formulario. Tipos: `consulta` (interés en un modelo o en comprar; opcional "¿te interesa en cuotas?" como dato, sin promesa) y `comercial` (marcas y comercios). | INTEGRATIONS §2; ADR-25 |
| D12 | `SITE_NOINDEX` acepta `true \| content \| false`. Ausente o inválido → `true` (falla cerrado). **El propietario decidió lanzar con `false`** (2026-09-30: "never block traffic for pages I wanna rank"). Queda en `config.php` del servidor, y sólo el propietario lo cambia. | ADR-26; propietario |
| D13 | **Indexación por código, sin revisión manual previa.** Una página que se construye es indexable si pasa el gate automático de §2.3. Si deja de pasarlo (por ejemplo, porque se ocultó un precio vencido y quedó fina), pasa sola a `noindex` y sale del sitemap, y vuelve cuando lo cumple de nuevo. Las fases no crean páginas que no pasen el gate: una página que no llega no se crea. | CLAUDE.md §3.4; propietario |
| D14 | **Los `[VERIFICAR…]` nunca se muestran.** En el contenido quedan como `['verify' => 'qué y dónde']` dentro del bloque que no tiene fuente. El render omite ese bloque, y `verify.sh` lista los pendientes en `docs/verificar.md`. Así una página se publica sin huecos visibles y sin inventar. | D5, D13 |
| D15 | Texto legal: ninguna sesión lo escribe. `/terminos` y `/privacidad` copian literal el marcador "Texto en revisión legal" de la app Node y quedan `noindex` hasta que el abogado entregue el texto. | LEGAL §5, §10 |
| D16 | Diseño mínimo mobile-first: sin imágenes (salvo pedido explícito), fuentes del sistema, sin animaciones. HTML semántico, un solo `h1`, `label` en cada input, foco visible, contraste AA, área táctil ≥ 44 px. Presupuesto: LCP < 2,5 s en móvil, CLS < 0,1, HTML + CSS + JS < 100 KB por página. | ADR-15; SEO §10 |
| D17 | Proceso: `phased-autonomous-build`, perfil HTML+PHP. Un PR por fase, `./verify.sh` verde antes de cada PR. **Nunca Fable** en fases, subagentes, sesiones lanzadas ni Routines. `antonmarklundcom/moto` es de sólo lectura. | Propietario |
| D18 | Una consulta, una página. La ficha técnica, el precio, el consumo, los repuestos y el "qué revisar si es usada" de un modelo viven **en la misma URL del modelo**, en secciones con `id`, y no en subpáginas. Así se concentra la autoridad y la migración no cambia nada. | SEO §2.3, §11 |

---

## 2. Mapa de URLs y modelo de contenido

### 2.1 Todas las URLs

Prioridad = intención y volumen probable. No hay datos medidos: se recalibra con Search Console a los 60 días.

| URL | Qué es | Familias de búsqueda | Prio | Fase |
|---|---|---|---|---|
| `/` | Home: marcas, tipos, guías más buscadas, WhatsApp | `motos paraguay` | A | T1 |
| `/motos` | Índice de marcas y tipos | `marcas de motos paraguay` | B | T1 |
| `/motos/{marca}` | Hub de marca: distribuidor (con fuente), todos sus modelos, dónde consultar | `motos {marca} paraguay`, `{marca} motos precios` | A | B1a/B1b |
| `/motos/{marca}/{modelo}` | **Motor de tráfico.** Una página por modelo con estas secciones: precio publicado (D6), ficha técnica con fuente, consumo y velocidad (sólo con fuente), mantenimiento del modelo, repuestos comunes, qué revisar si es usada, versiones, FAQ | `{modelo} precio paraguay`, `{modelo} ficha técnica`, `{modelo} 0km`, `{modelo} usada`, `{modelo} consumo`, `{modelo} repuestos` | A | B1a/B1b |
| `/motos/tipo/{categoria}` | Tipos con ≥ 3 modelos del catálogo (slugs de `categories.ts`: `scooter`, `naked`, `cub`, `enduro-cross`, `motocarro-carga`, `electrica`, …) | `scooter paraguay`, `motocarro precio paraguay`, `moto eléctrica paraguay` | A | B6 |
| `/motos/en-cuotas` | Cómo funcionan las cuotas y planes publicados por distribuidores, con fuente y fecha. Informativa (D8) | `motos en cuotas paraguay`, `moto sin entrega` | A | T1 |
| `/motos/ciudad/{ciudad}` | Sólo ciudades con información de fuente: sucursales de distribuidores y trámites locales | `motos en {ciudad}`, `concesionaria de motos {ciudad}` | B | B3 |
| `/guias` | Índice de guías por grupo | — | C | T1 |
| `/guias/{slug}` — **compra** (12 portadas de `moto/content/guias/` con su slug + `como-comprar-tu-primera-moto`) | 0 km o usada, cilindrada, trabajo/delivery, usada sin estafas, checklist, cuánto vale, fotos para vender, seguro, cuotas, papeles, transferencia | ver `query` de cada archivo | A/B | B2 |
| `/guias/{slug}` — **precios** | `precios-de-motos-0-km-en-paraguay` (tabla con cada precio publicado, fecha y fuente), `motos-baratas-en-paraguay` (los precios publicados más bajos, criterio explícito) | `precios de motos 0km paraguay`, `motos baratas paraguay` | A | B2 |
| `/guias/{slug}` — **reparación y mantenimiento** (~20) | Ej.: `moto-no-arranca`, `cada-cuanto-cambiar-el-aceite-de-la-moto`, `que-aceite-usar-en-la-moto`, `como-tensar-la-cadena-de-la-moto`, `kit-de-arrastre`, `bateria-de-moto`, `bujia-de-moto`, `pastillas-de-freno-moto`, `presion-de-neumaticos-moto`, `carburador-sucio-sintomas`, `moto-recalienta`, `humo-blanco-o-azul-moto`, `moto-gasta-mucha-nafta`, `embrague-de-moto`, `service-de-moto-que-incluye`, `moto-despues-de-la-lluvia`, `guardar-la-moto-mucho-tiempo` | `mi moto no arranca`, `cada cuánto cambiar aceite moto`, `{falla} moto` | A | B4 |
| `/guias/{slug}` — **trámites y ley** (~10) | `registro-de-conducir-para-moto`, `examen-teorico-registro-de-conducir` (**test interactivo**, D7), `casco-obligatorio-paraguay`, `multas-de-transito-para-motos`, `chapa-de-moto`, `cedula-verde-de-moto` (si no canibaliza a `papeles-de-una-moto-al-dia`, se enlaza a ella), `habilitacion-de-moto-para-delivery` | `registro de conducir moto paraguay`, `examen de manejo preguntas`, `multa sin casco` | A | B5 |
| `/guias/{a}-vs-{b}` — **comparativas** (~20) | Pares del mismo segmento con ficha de fuente en los dos modelos; criterio explícito y sin "ganador" inventado | `{modelo a} vs {modelo b}`, `{a} o {b}` | A | B6 |
| `/para-marcas-y-comercios` | Invitación breve a marcas, comercios y financieras, con formulario `comercial`. Sin planes ni precios | `publicidad motos paraguay` | C | B3 |
| `/contacto` | Formulario `consulta` + WhatsApp | — | C | B3 |
| `/gracias` | Confirmación de un lead (`noindex`, fuera del sitemap) | — | — | F1 |
| `/terminos`, `/privacidad` | Marcador literal (`noindex`) | — | — | T0 |
| `/ir/wa/general` | Redirección rastreada a WhatsApp (302, `Disallow`) | — | — | F1 |
| `/sitemap.xml`, `/robots.txt`, `/404` | Generados | — | — | F1 |

**Reservadas y no creadas ahora** (la app Node las define): `/motos/nuevas`, `/motos/usadas`, `/financiacion`, `/seguros`,
`/comercios`, `/comercios/{slug}`, `/como-funciona`, `/publicar`, `/aviso/*`, los cruces marca × ciudad y tipo × ciudad.
Slugs reservados para marca y modelo: `tipo`, `ciudad`, `nuevas`, `usadas`, `en-cuotas`, `page`.

**Los dos caminos de negocio futuros caben sin cambiar URLs.** *Promocionar motos nuevas* usa las páginas de modelo
(que ya rankean), `/motos/nuevas` y `/motos/en-cuotas`. *Una alianza con una marca grande* usa su hub `/motos/{marca}`
y sus modelos, y el primer contacto entra por `/para-marcas-y-comercios`. El tráfico que se construye ahora es el activo
que se ofrece después.

### 2.2 Modelo de contenido (contrato: F1 lo escribe completo, nadie lo renombra después)

Contenido es dato. Hay un archivo `content/*.php` por tipo, con la forma documentada en su cabecera, y los archivos de
ruta tienen tres líneas. Un **hecho con fuente** tiene la forma `['value' => …, 'source' => ['label','url'], 'accessed' => 'YYYY-MM-DD']`.
Un **bloque sin fuente** es `['verify' => 'qué confirmar y dónde']`, y el render lo omite (D14).

| Archivo | Clave | Forma (resumen) | Escribe |
|---|---|---|---|
| `content/catalogo.php` | `marcas[slug]`, `modelos["marca/modelo"]` | Marcas: `name, distributor{name, source, accessed}, sortOrder`. Modelos: `brand, name, slug, category, years?, specs{cc, potencia, torque, transmision, arranque, freno_del, freno_tras, tanque, peso, …: hecho con fuente}, prices[hecho con fuente + condition 0km]`, `versions[]`, `sources[]` | R1 |
| `content/marcas.php` | slug | `intro[]` (párrafos), `sections[{h2, body[]}]`, `faq[{q, a}]`, `updated` | B1a/B1b |
| `content/modelos.php` | `marca/modelo` | `intro[]`, `mantenimiento[]`, `repuestos[]`, `revisarUsada[]`, `faq[]`, `updated` (el texto editorial se apoya en `catalogo.php` y no repite cifras sin fuente) | B1a/B1b |
| `content/tipos.php` | slug | `intro[]`, `sections[]`, `faq[]`, `updated` | B6 |
| `content/comparativas.php` | `a-vs-b` | `a, b, criterio, rows[spec]` (tomados de `catalogo.php`), `body[]`, `faq[]`, `updated` | B6 |
| `content/ciudades.php` | slug | `name, department, intro[], sections[], faq[], sources[], updated` | B3 |
| `content/guias.php` | slug | Forma del template + `group` (`compra`, `precios`, `reparacion`, `tramites`, `comparativa`), `query, published, updated, links[]` | B2, B4, B5 |
| `content/quiz.php` | id | `questions[{q, options[], answer, source}]`, `source{label, url, accessed}` | B5 |
| `content/pages.php`, `content/lead-values.php` | ruta / origen | Forma del template + `gate` / `leadType` | todas, sólo agregando |

### 2.3 El gate de indexación (código en `lib/indexing.php`, F1)

`is_indexable(string $path): bool` es una sola función, y la usan a la vez `partials/head.php` (meta robots) y
`sitemap.php`, así que no pueden discrepar.

1. `SITE_NOINDEX` = `true`, ausente o inválido → todo `noindex`. `content` → sólo guías y estáticas. `false` → rige la tabla.
2. Tabla. Las palabras se cuentan sobre el texto **renderizado**, sin navegación, pie ni bloques `verify`:

| Tipo | Indexable si |
|---|---|
| Modelo | ≥ 300 palabras renderizadas **y** ≥ 3 specs con fuente **o** un precio vigente (D6) |
| Marca | ≥ 300 palabras y distribuidor con fuente |
| Tipo, ciudad | ≥ 250 palabras propias y ≥ 3 enlaces a modelos o guías indexables |
| Comparativa | ≥ 500 palabras y ≥ 5 filas de spec con fuente en **los dos** modelos |
| Guía | ≥ 600 palabras y ≥ 2 enlaces internos |
| Estática (`/`, `/motos`, `/guias`, `/motos/en-cuotas`, `/para-marcas-y-comercios`, `/contacto`) | siempre |
| `never` (`/gracias`, `/terminos`, `/privacidad`, `/404`) | nunca |

3. Toda URL con query string es `noindex, follow`, con canonical a la URL limpia. Un `noindex` nunca aparece en el sitemap.
   La navegación principal no enlaza páginas `noindex`. `verify.sh` comprueba las tres reglas en los tres modos.

### 2.4 SEO técnico (F1)

- `sitemap.xml` sólo con URLs indexables. `lastmod` real (el `updated` del contenido). Sin `priority` ni `changefreq`.
- `robots.txt` (SEO §3.4 adaptado): `Disallow: /ir/`, `/enviar.php`, `/gracias`; `Sitemap: <SITE_URL>/sitemap.xml`.
- Canonical absoluto, Open Graph y Twitter completos. Títulos ≤ 60 caracteres y descripciones 120–160, únicos en todo el sitio.
  Plantilla para modelo: `{Marca} {Modelo}: precio en Paraguay y ficha técnica` (el precio no va en el título: vence).
- JSON-LD: `Organization` + `WebSite` global; `BreadcrumbList` en toda página profunda; `Article` en guías y comparativas;
  `FAQPage` sólo con FAQ real visible; `Quiz` no (no hay rich result y no suma). `verify.sh` falla si aparece
  `AggregateRating`, `Review`, `ratingValue`, `Offer` o `priceValidUntil`.
- Migas de pan visibles. Índice de secciones con anclas en páginas de modelo y en guías largas (más sitelinks, mejor CTR).
- `enviar.php` lee la cookie `vc_attr` si `VENDERCRM_URL` está configurado. GA4 por `GA4_ID` (el template ya lo soporta).

---

## 3. Alcance

**Núcleo:**
- home, `/motos`, `/motos/en-cuotas` informativa, `/guias`
- todas las marcas y todos los modelos del catálogo ampliado
- tipos
- ~20 comparativas
- 15 guías de compra y precios
- ~20 de reparación
- ~10 de trámites, con el examen teórico interactivo si hay fuente oficial
- ciudades con fuente, `/para-marcas-y-comercios`, contacto
- `/ir/wa/`, formularios `consulta` y `comercial`
- sitemap, robots, gate de indexación

Estimación de volumen de páginas: 100–200 URLs indexables. Depende de cuántos modelos confirme R1.

**Reutilización desde `moto` (sólo lectura):** las 12 guías de `content/guias/` (texto portado sin reescribir, y sus `[VERIFICAR]`
pasan a bloques `verify`), `content/seo/en-cuotas.md`, el catálogo y su investigación.

**Fuera de alcance:** clasificados, publicar, fichas `/aviso/*`, buscador, login, admin, pagos, imágenes, financiación,
calculadoras de cuota, planes de precio para comercios.

---

## 4. Protocolo de autonomía

1. Trabajá hasta que pasen todos los criterios de salida de la fase. No pidas permiso para trabajo que está dentro del plan.
2. Un PR por fase: rama `phase/<id>` desde `main` actualizado; creá el PR, miralo y mergealo cuando esté verde. Un build rojo es siempre trabajo de la propia sesión. Lane 2 no espera a otras fases de lane 2.
3. Los problemas menores van a "Known issues" de `docs/log/<fase>.md`, y se sigue.
4. Parar y preguntar SÓLO por una credencial faltante sin degradación posible o por una decisión de fundación (forma del contenido, URLs, gate, contrato del CRM, texto legal) donde adivinar mal obligue a reescribir. Preguntar = opciones A/B con recomendación en `docs/decisions-needed.md`, commit, push y fin de la sesión.
5. Un valor de config faltante nunca bloquea. Sin WhatsApp configurado, los CTA van a `/contacto`; sin CRM, el lead queda en `logs/leads.jsonl`.
6. Todo prompt es re-ejecutable: se sigue desde el primer criterio no cumplido. Commit a la rama cada ≤ 30 min.
7. Límites de lane 2: nada de fundación (`lib/*`, `enviar.php`, `.htaccess`, `router.php`, header y footer, estructura de `templates/*.php`, tokens, formas de contenido). Si hace falta, workaround + nota en Backlog.
8. **Nunca Fable** en fases, subagentes, sesiones lanzadas, watcher ni Routines. La tabla de fases sólo nombra Opus y Sonnet.
9. Propiedad de archivos: cada fase escribe sólo en su **Owns**, más su log, un bloque `/* == <fase> == */` al final de `assets/css/site.css` y claves nuevas al final de `pages.php` y `lead-values.php`. Ante un conflicto de merge gana main: re-aplicá tu cambio encima.
10. Traspaso: `prompts/_handoff.md` (cuatro puertas: PR verde mergeado, checklist, una auditoría, log).
11. Log `docs/log/<fase>.md`: ≤ 12 líneas "Built", ≤ 8 "Decisions", ≤ 8 "Known issues", una línea "Verification". Agregar la línea índice en §9.
12. Lectura de orientación: sólo lo que nombra el prompt.
13. Tope de pulido: una pasada de capturas y un Lighthouse sólo si la salida pide un número. Cuando pasan los criterios, se abre el PR en ese mismo turno.
14. Las capturas van al artefacto de CI, nunca a git.
15. Las decisiones viajan por archivos, nunca por mensajes a una sesión en curso.
16. **Reglas de contenido que comprueba verify:**
    - sin `wa.me` fuera de `/ir/wa/`
    - sin `coche|carro|móvil|conducir|checar|Contactar` en texto visible
    - sin "N°1", "número 1", "el mejor portal" ni "más de [0-9]"
    - toda cifra en Gs. sale de un hecho con fuente
    - un solo `<h1>` y `label` en cada `input`
    - ningún `[VERIFICAR` renderizado
17. **Fan-out:** con N ≥ 4 páginas de la misma forma se construye primero un ejemplar y se revisa; el resto se reparte en subagentes Sonnet en paralelo (`fable-directs-sonnet-builds` §Fan-out). Un verify y un PR.
18. **Investigación:** el entorno puede no abrir páginas directo (así pasó en `moto`, `docs/research/catalog.md` §0). Se usa `WebSearch`/`WebFetch` y se registra qué se leyó y cómo. Si una cifra aparece sólo en un snippet de búsqueda, se cita igual con esa aclaración en `sources`. Sin fuente, no hay cifra.

---

## 5. Fases

| Fase | Lane | Modelo | Prompt | Owns | Depende de |
|---|---|---|---|---|---|
| T0 Adoptar | 1 | Sonnet | `sonnet-0-adopt.md` | `content/site.php`, `ui.php`, `nav.php`, `pages.php`, tokens y fuentes de `site.css`, `assets/fonts/**`, preloads de `partials/head.php`, `terminos/**`, `privacidad/**`, borrado de ejemplos, `README.md` | — |
| F1 Fundación | 1 | **Opus** | `opus-1-foundation.md` | `lib/**`, `.htaccess`, `router.php`, `deploy/**`, `enviar.php`, `ir/**`, `gracias/**`, `sitemap.php`, `robots.php`, `partials/**`, `templates/**`, cabeceras de forma de `content/*.php` (salvo `catalogo.php`, que es de R1), `content/_dev/**`, `config.example.php`, `verify.sh`, `tests/**` | T0 |
| R1 Catálogo | 1 (paralela a F1) | **Opus** | `opus-1b-research.md` | `content/catalogo.php`, `docs/research/**` | T0 |
| T1 Home + hubs | 1 (última) | Sonnet | `sonnet-2-home-hubs.md` | `index.php`, `motos/index.php`, `motos/en-cuotas/**`, `guias/index.php`, sus claves en `pages.php` | F1, R1 |
| B1a Marcas y modelos (1ª mitad) | 2 | Sonnet | `sonnet-3a-brands-models.md` | `content/marcas.php` y `content/modelos.php` (sólo sus marcas), `motos/{sus marcas}/**` | F1, R1 |
| B1b Marcas y modelos (2ª mitad) | 2 | Sonnet | `sonnet-3b-brands-models.md` | ídem para la otra mitad | F1, R1 |
| B2 Guías de compra y precios | 2 | Sonnet | `sonnet-4-guides.md` | `content/guias.php` (grupos `compra`, `precios`), `guias/{sus slugs}/**`, `scripts/port-guides.php` | F1, R1 |
| B3 Ciudades, comercios, contacto | 2 | Sonnet | `sonnet-5-cities-b2b.md` | `content/ciudades.php`, `motos/ciudad/**`, `para-marcas-y-comercios/**`, `contacto/**` | F1, R1 |
| B4 Reparación y mantenimiento | 2 | Sonnet | `sonnet-6-repair.md` | `content/guias.php` (grupo `reparacion`), `guias/{sus slugs}/**` | F1 |
| B5 Trámites, ley y examen | 2 | Sonnet | `sonnet-7-tramites.md` | `content/guias.php` (grupo `tramites`), `content/quiz.php`, `guias/{sus slugs}/**`, `assets/js/tools/quiz.js` | F1 |
| B6 Tipos y comparativas | 2 | Sonnet | `sonnet-8-types-compare.md` | `content/tipos.php`, `content/comparativas.php`, `motos/tipo/**`, `guias/*-vs-*/**` | F1, R1 |
| L Link pass | — | Sonnet | `sonnet-9-link-pass.md` | claves de enlaces cruzados en `content/*.php`, `content/nav.php`, `KNOWN-ISSUES.md`, `docs/closing-report.md` | todas |

`content/guias.php` es compartido entre B2, B4 y B5: cada fase agrega sólo sus claves, en su propio bloque delimitado
`/* == B<n> == */`. Mitades de B1: las marcas de `catalogo.php` ordenadas por `sortOrder`. B1a toma la primera mitad
(redondeando hacia arriba) y B1b el resto.

Modelos: Opus = `claude-opus-5-5`, Sonnet = `claude-sonnet-5-5` (re-verificar en la skill `claude-api` al lanzar).
Orden de arranque: T0 → F1 y R1 en paralelo → T1 (la lanza la segunda de las dos en terminar) → B1a, B1b, B2, B3,
B4, B5 y B6 (4 a la vez; el watcher lanza el resto) → L.

### T0 — Adoptar (Sonnet, ≤ 30 min)
Los 20 pasos del README del template, con estos valores:
- `name` "moto.com.py", `domain` "moto.com.py" (confirmar, §7), `slug` "moto-com-py", `market` "py", `schemaType` `['Organization']`, contacto `null`.
- Se borran los ejemplos y las rutas `servicios/`, `precios/`, `segmentos/`, `blog/`, `herramientas/`, con sus claves.
- Fuentes del sistema (se borran las web fonts). Paleta de alto contraste.
- `/terminos` y `/privacidad`: marcador literal de `moto/src/app/(public)/{terminos,privacidad}/page.tsx`, `noindex`.
- `ui.php` entero en voseo.
- No se toca el routing.

### F1 — Fundación (Opus, ≤ 90 min)
1. Routing sin barra final (D3) en `.htaccess`, `router.php` y `deploy/routes.php`.
2. `lib/indexing.php` (§2.3), con tests de los tres modos y de cada umbral. Render de hechos con fuente (`partials/fact.php`: valor, fuente y fecha) y ocultamiento automático de precios con más de 120 días (D6). Omisión de bloques `verify` (D14). `verify.sh` escribe `docs/verificar.md`.
3. `/ir/wa/general` (D10) y el helper `wa_href()`, usado por todos los partials de WhatsApp.
4. `enviar.php` (D11):
   - `leadType` server-side
   - teléfono en E.164 `+595`
   - clave idempotente server-side
   - `logs/leads.jsonl` antes del CRM
   - `source: "site:moto-com-py"` y `fields.tipo_lead`
   - omitir vacíos, sin tag
   - redirección sin JS a `/gracias`
5. Plantillas `brand`, `model`, `type`, `city`, `comparison`, `guide` (con `group`) y `quiz`, y todas las formas de §2.2, con un registro `[DEV]` cada una que verify recorre y el zip de deploy excluye. Los registros `[DEV]` viven en `content/_dev/*.php` y el cargador los suma sólo fuera del zip. **`content/catalogo.php` es de R1**: F1 no lo crea. Su cargador tolera que falte, y su `[DEV]` va en `content/_dev/catalogo.php`.
6. SEO técnico de §2.4.
7. `verify.sh`: reglas de §4.16, coherencia entre meta robots y sitemap, JSON-LD prohibido, los tres modos de `SITE_NOINDEX`, y un POST degradado que escriba `leads.jsonl` con la clave esperada.

Salida:
- verify verde en los tres modos
- `/motos/` → 301 a `/motos`
- `/ir/wa/general?texto=x` → 302 y línea en el log
- POST sin CRM → `leads.jsonl` + 303 a `/gracias`
- honeypot → 303 sin nada enviado

### R1 — Catálogo ampliado (Opus, ≤ 90 min, en paralelo con F1)
- Arranca de la semilla de `moto` (7 marcas, 35 modelos, mismos slugs).
- Investiga toda marca con venta en Paraguay (distribuidores oficiales, sitios `.com.py` de las marcas, prensa paraguaya) y sus modelos, 0 km y del mercado de usadas, con la vara de D4.
- Por modelo: la categoría y todas las specs que publique la ficha oficial, con fuente y fecha.
- Precios 0 km sólo si un distribuidor o la marca los publica, con fuente y fecha.
- Entrega `content/catalogo.php` exactamente en la forma de §2.2, con la cabecera que documenta la forma (si F1 ya está mergeada, se contrasta con `content/_dev/catalogo.php` y el cargador) y `docs/research/catalogo.md` con el razonamiento y lo descartado.
- Si hay > 120 modelos, prioriza por presencia de precio y ficha y deja el resto en la sección "próxima tanda" del doc.

### T1 — Home + hubs (Sonnet, ≤ 60 min)
- Home, `/motos`, `/guias` (índice que se llena solo desde `guias.php`) y `/motos/en-cuotas` informativa, con el texto portado de `moto/content/seo/en-cuotas.md` y los planes publicados por distribuidores que haya en las fuentes de R1, con fecha.
- WhatsApp y formulario `consulta` en la home y en en-cuotas.
- Al terminar: crea el watcher y lanza lane 2.

---

## 6. Lane 2 — contenido (Sonnet, en paralelo)

Todas las páginas: voseo, hechos sólo con fuente (D5, D6), bloques `verify` para lo que falte, ángulo paraguayo
(calor, polvo, lluvia, caminos de tierra, repuestos que se consiguen, trámites locales) y ≥ 2 enlaces internos.
Ninguna fase crea una página que no pase el gate de §2.3.

- **B1a / B1b — Marcas y modelos.**
  - Hub de marca: ≥ 300 palabras; distribuidor, todos sus modelos agrupados por tipo y dónde consultar.
  - Modelo: intro, bloque de precio (D6), ficha técnica desde `catalogo.php`, mantenimiento (intervalos sólo con fuente, si no un consejo general sin cifras), repuestos que conviene tener, qué revisar si es usada, FAQ tomada del propio texto y CTA "Escribir por WhatsApp" con el modelo en el mensaje.
  - Un ejemplar por fase y después fan-out por marca.
- **B2 — Compra y precios.**
  - Porta las 12 guías de `moto` con slug, título y texto idénticos; sólo corrige enlaces a rutas que no existen acá.
  - Guías nuevas: `como-comprar-tu-primera-moto`, `precios-de-motos-0-km-en-paraguay` (tabla generada desde `catalogo.php`, así se actualiza sola) y `motos-baratas-en-paraguay` (criterio: los precios 0 km publicados más bajos, con fecha).
- **B3 — Ciudades, comercios, contacto.**
  - Ciudades con información de fuente (sucursales citadas en la investigación). Una ciudad sin 250 palabras reales no se crea.
  - `/para-marcas-y-comercios`: breve y honesta ("estamos arrancando"), sin planes, precios ni números de tráfico, con formulario `comercial`.
  - `/contacto`.
- **B4 — Reparación y mantenimiento.** ~20 guías de §2.1: síntoma → causas probables → qué revisar vos → cuándo ir al taller. Sin precios de taller salvo con fuente, sin torques ni intervalos salvo del manual con fuente. Cada guía enlaza a los modelos donde aplica.
- **B5 — Trámites, ley y examen.**
  - ~10 guías. Montos, requisitos y oficinas sólo con fuente oficial (municipalidades, ANTSV, leyes vigentes) y fecha; si no, bloque `verify`.
  - `examen-teorico-registro-de-conducir` como test interactivo (JS, sin dependencias, funciona sin conexión después de cargar), con preguntas tomadas **literalmente** de un material oficial citable. Si no hay material oficial, se publica la guía sin test y se anota.
- **B6 — Tipos y comparativas.** Páginas `/motos/tipo/*` para tipos con ≥ 3 modelos. ~20 comparativas `{a}-vs-{b}` entre modelos del mismo segmento con ≥ 5 specs de fuente en los dos: tabla generada, texto que explica para quién conviene cada una según los datos y ningún ganador sin criterio.
- **L — Link pass.** Enlaces cruzados (modelo ↔ tipo ↔ comparativas ↔ guías de reparación ↔ marca), nav y pie finales, sitemap revisado en los tres modos, `docs/verificar.md` ordenado por página, `KNOWN-ISSUES.md`, `docs/closing-report.md` con los pasos de subida y Search Console. Desactiva el watcher.

---

## 7. Lo que sólo el propietario puede dar

| Ítem | Dónde va | Sin él |
|---|---|---|
| Dominio final y `SITE_URL` | `content/site.php`, `config.php` | canonical desde el host de la petición |
| `SITE_NOINDEX=false` en el `config.php` del servidor (D12) | hPanel | el código falla cerrado: todo `noindex` |
| **Google Search Console**: verificar el dominio y enviar `/sitemap.xml` el día de la subida | Search Console | Google tarda más en descubrir el sitio y no hay datos de consultas |
| `GA4_ID` (opcional) | `config.php` | sin analítica de visitas (los leads y los clics de WhatsApp se registran igual) |
| Número de WhatsApp | `content/site.php` | los CTA van a `/contacto` |
| `VENDERCRM_URL` + `VENDERCRM_API_KEY` exclusiva de este sitio | `config.php` | los leads quedan sólo en `logs/leads.jsonl` |
| Texto legal del abogado | `/terminos`, `/privacidad` | marcador `noindex` |
| Subida a Hostinger (zip, `config.php`, PHP 8.2 + curl) | hPanel | — |
| Resolver pendientes de `docs/verificar.md` cuando quiera sumar datos | `content/*.php` | esos bloques siguen ocultos |

## 8. Preguntas abiertas

Ninguna. Q1–Q3 fueron respondidas el 2026-09-30 (`docs/decisions-needed.md`).

## 9. Índice de logs de construcción

| Fase | PR | Log |
|---|---|---|
| Plan | [antonmarklundcom/moto.html#1](https://github.com/antonmarklundcom/moto.html/pull/1) | — |

## 10. Backlog

- `/motos/nuevas` y `/motos/usadas` (hay textos en `moto/content/seo/`; son listados y todavía no hay inventario).
- `/seguros` y `/financiacion`: sólo con un socio y con la respuesta del abogado a LEGAL §3.
- Guías por marca (CONTENT_STRATEGY §2.4 fase 2) y por ciudad según Search Console.
- Segunda tanda del catálogo (lo que R1 deje en "próxima tanda").
- Re-verificación mensual de precios (Routine Sonnet que re-consulta las fuentes y actualiza `accessed`), para que los precios no se oculten por vencidos.
- Directorio de distribuidores oficiales (`/comercios`, sólo datos públicos y sin logos), después de la migración o con acuerdo.
- Cloudflare Turnstile si llega spam. Reintento de leads fallidos con un cron de Hostinger.
- Migración a la app Node: exportar `logs/*.jsonl`, sumar `/para-marcas-y-comercios`, `/guias/*-vs-*` y el catálogo ampliado a `moto` (escalado allá).
