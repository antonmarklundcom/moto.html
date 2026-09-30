# PLAN.md — moto.html (sitio HTML + PHP de moto.com.py)

Estado: **borrador para revisión del propietario** (PR del plan). Ninguna fase empieza hasta que este
PR se mergee y las preguntas abiertas de §8 tengan respuesta en `docs/decisions-needed.md`.

Qué es: el sitio de moto.com.py mientras la app Node.js (`antonmarklundcom/moto`) no se puede
alojar. HTML + PHP 8.2 en hosting compartido de Hostinger, sin Node, sin base de datos, construido
desde `antonmarklundcom/php-site-template` con el módulo de mercado `py`.

Tiene sólo dos trabajos: **(1) rankear en Google Paraguay para búsquedas de motos** y **(2) captar
leads de financiación y de contacto**. Los clasificados quedan fuera. Todo lo demás espera.

---

## 1. Decisiones ya tomadas — no se reabren

| # | Decisión | Fuente |
|---|---|---|
| D1 | Stack: static HTML + PHP 8.2, sin base de datos, sin Node en el servidor. Template `php-site-template`, mercado `py` (`lib/market/py.php`). | Pedido del propietario |
| D2 | **Las URLs son las de la app Node** (`moto/SEO_ARCHITECTURE.md` §1 y `moto/src/lib/seo/routes.ts`), con los mismos slugs de marca, modelo, ciudad y guía. Una URL publicada no cambia nunca. | Pedido del propietario; SEO §1 |
| D3 | **Sin barra final**: `/motos/honda`, no `/motos/honda/`. `/motos/honda/` → 301 a `/motos/honda`. Es lo que hace la app Node; el template trae la regla contraria y la fase F1 la invierte en `.htaccess`, `router.php` y `deploy/routes.php`. `www` → sin `www` (301), HTTPS. | SEO §1 |
| D4 | Marcas, modelos y ciudades salen **sólo** del catálogo de `moto/src/db/seed-data/` (`brands.ts`, `models.ts`, `cities.ts`) y de `moto/docs/research/catalog.md`. Sólo registros `isActive: true`: 7 marcas, 35 modelos. Nada fuera del catálogo. | Pedido; ADR-11 |
| D5 | Nada inventado: sin precios, fichas técnicas, conteos, reseñas, ratings, logos ni "N°1". Si falta la fuente: `[VERIFICAR: qué y dónde]`. Sin `AggregateRating` ni `Review` en JSON-LD. Sin logos de marca. | CLAUDE.md §3.1; ADR-10 |
| D6 | Español paraguayo con voseo en todo lo visible; `Gs. 12.500.000`; teléfono `0981 123 456` visible, `+595981123456` guardado. Botón principal: **"Escribir por WhatsApp"**. Botón de financiación: **"Quiero financiarla"**. Enviar formulario: **"Enviar consulta"**. | CONTENT_STRATEGY parte 1 |
| D7 | Los CTA de WhatsApp pasan por `/ir/wa/general?texto=…&desde=<ruta>` (misma forma que `paths.whatsappGeneral` de la app Node). Registra el clic en un archivo plano y responde 302 a `wa.me`; si el registro falla, redirige igual. Nunca `wa.me` en el HTML. `/ir/` en `Disallow` de robots. | ADR-07 |
| D8 | Leads: el formulario postea a `enviar.php`; el servidor **guarda primero** el lead en `logs/leads.jsonl` y después postea a VenderCRM con la key de `config.php`. Obligatorios `phone` e `idempotency_key = sha256(phone_e164 + "\|" + type + "\|" + YYYY-MM-DD-HH)` en UTC. Nunca `pipeline`, `stage`, `owner` ni `tag`. Se omiten los opcionales vacíos. `200 duplicate:true` es éxito. El visitante nunca ve un error del CRM. Honeypot en todo formulario. | INTEGRATIONS §2; ADR-25 |
| D9 | Tipos de lead: `financiacion` (conversión principal), `comercial` (marcas y comercios), `contacto` (general). `fields.tipo_lead` lleva el tipo. Los clics de WhatsApp no van al CRM. | INTEGRATIONS §2.5; ADR-08 |
| D10 | `SITE_NOINDEX` acepta `true \| content \| false`; ausente o inválido → `true` (falla cerrado). Lo lee `config.php` (o la variable de entorno). **Sólo el propietario lo cambia.** Arranca en `true`. | ADR-26 |
| D11 | La indexación es código (§2.3): una página por debajo de su umbral emite `noindex, follow` **y** sale de `sitemap.xml`, sola y de forma reversible. | CLAUDE.md §3.4; SEO §2.2 |
| D12 | **Todo texto escrito por una sesión nace `reviewed => false`** y por lo tanto `noindex`. El propietario revisa y cambia a `true` (con `reviewedBy`). Contenido con `[VERIFICAR]` no es indexable aunque esté revisado. | CONTENT_STRATEGY §1.7 |
| D13 | Texto legal: ninguna sesión lo escribe. No existe texto legal aprobado en `moto` (sólo marcadores "Texto en revisión legal"). `/terminos` y `/privacidad` copian **literal** ese marcador y quedan `noindex`. El descargo de financiación se copia literal de `moto/PRODUCT_SPEC.md` §2.3. | LEGAL §5 y §10 |
| D14 | Financiación: se explica cómo funciona; nunca se promete aprobación, tasa ni "sin informconf"; nunca "crédito preaprobado". El formulario pide rangos, no montos exactos de ingreso, y dice antes de enviar que el dato se deriva a un comercio o financiera. | LEGAL §2.1, §3.1; CONTENT_STRATEGY §1.5 |
| D15 | Diseño mínimo mobile-first, sin imágenes (salvo pedido explícito), **fuentes del sistema** (se quitan las web fonts del template), sin animaciones. Obligatorio: HTML semántico, un solo `h1`, `label` en cada input, foco visible, contraste AA, área táctil ≥ 44 px. Presupuesto: LCP < 2,5 s en móvil, CLS < 0,1, página < 150 KB sin imágenes. | ADR-15; SEO §10 |
| D16 | Proceso: `phased-autonomous-build`, perfil HTML+PHP del template. Un PR por fase, `./verify.sh` verde antes de cada PR. Nunca Fable en fases, subagentes, sesiones lanzadas ni Routines. | Pedido del propietario |
| D17 | `antonmarklundcom/moto` es de sólo lectura para este proyecto. Se copia de ahí; nunca se modifica. | Pedido del propietario |

---

## 2. Mapa de URLs y modelo de contenido

### 2.1 Todas las URLs

Prioridad de palabra clave: **A** = conversión / intención comercial alta, **B** = trámite y comparación, **C** = soporte.
"Gate" = regla de indexación de §2.3 que decide `index` o `noindex` + sitemap.

| URL | Página | Palabra clave objetivo (CONTENT_STRATEGY / SEO §11) | Prio | Gate | Fase |
|---|---|---|---|---|---|
| `/` | Home | `motos en paraguay`, `motos en cuotas paraguay` (apoyo) | A | estática | T1 |
| `/motos/en-cuotas` | **Motos en cuotas en Paraguay**: explicación, calculadora (ver §8 Q1), formulario de financiación | `motos en cuotas paraguay`, `motos en cuotas asunción`, `moto sin entrega paraguay`, `cuanto sale una moto en cuotas` | A | editorial ≥ 400 palabras | T1 |
| `/financiacion` | Ver §8 Q2 (recomendado: no se crea en esta etapa) | — | — | — | — |
| `/motos` | Índice de marcas del catálogo | `motos paraguay`, `marcas de motos paraguay` | B | editorial ≥ 250 | B1 |
| `/motos/{marca}` × 7 | Hub de marca: honda, yamaha, suzuki, bajaj, tvs, kenton, star | `motos {marca} paraguay`, `{marca} motos precio paraguay` | A | editorial ≥ 300 | B1 |
| `/motos/{marca}/{modelo}` × 35 | Modelo del catálogo (slugs exactos de `models.ts`, p. ej. `/motos/honda/xr-150`, `/motos/yamaha/ybr-125z`) | `{marca} {modelo} precio paraguay` | A | datos verificados + editorial ≥ 250 | B1 |
| `/motos/ciudad/{ciudad}` | Sólo ciudades con contenido real: asuncion, ciudad-del-este, encarnacion (las demás de `cities.ts` no generan URL: 404) | `motos en {ciudad}`, `motos en cuotas {ciudad}` | B | editorial ≥ 250 | B3 |
| `/guias` | Índice de guías | `guias motos paraguay` | C | estática | B2 |
| `/guias/comprar-moto-en-cuotas-en-paraguay` | Requisitos y funcionamiento de comprar en cuotas | `motos en cuotas paraguay` (apoya a `/motos/en-cuotas`, enlaza ahí) | A | guía | B2 |
| `/guias/papeles-de-una-moto-al-dia` | Cédula verde, chapa, papeles al día | `papeles moto paraguay`, `cédula verde moto` | A | guía | B2 |
| `/guias/como-transferir-una-moto-en-paraguay` | Transferencia de chapa | `transferencia de chapa moto paraguay` | A | guía | B2 |
| `/guias/como-comprar-tu-primera-moto` | **Nueva**: primera moto (enlaza a 0 km o usada y a cilindrada; no las duplica) | `comprar primera moto paraguay` [VERIFICAR: demanda en Search Console tras 60 días] | B | guía | B2 |
| `/guias/moto-0-km-o-usada` | 0 km o usada | `comprar moto 0km o usada` | B | guía | B2 |
| `/guias/125-150-o-200-cc-cual-elegir` | Cilindrada | `que cilindrada de moto elegir` | B | guía | B2 |
| `/guias/que-moto-conviene-para-trabajar` | Moto de trabajo vs ciudad, delivery (una sola página: anti-canibalización) | `mejor moto para delivery paraguay`, `moto para trabajar` | A | guía | B2 |
| `/guias/cuanto-cuesta-mantener-una-moto` | Mantenimiento | `mantenimiento moto costo` | B | guía | B2 |
| `/guias/como-comprar-una-moto-usada-sin-que-te-estafen` | Compra segura | `comprar moto usada paraguay` | B | guía | B2 |
| `/guias/que-revisar-antes-de-comprar-una-moto-usada` | Checklist | `que revisar moto usada` | B | guía | B2 |
| `/guias/seguro-contra-terceros-para-motos` | Seguro | `seguro moto paraguay` | B | guía | B2 |
| `/guias/cuanto-vale-mi-moto-usada` | Precio de una usada | `cuanto vale mi moto usada` | C | guía | B2 |
| `/guias/como-sacar-buenas-fotos-para-vender-tu-moto` | Vender | `como vender mi moto rapido` | C | guía | B2 |
| `/para-marcas-y-comercios` | Invitación a alianzas y planes, formulario tipo `comercial` (ver §8 Q3) | `publicidad motos paraguay` [VERIFICAR: demanda] | A (negocio) | estática | B3 |
| `/contacto` | Contacto general, formulario tipo `contacto` | — | C | estática | B3 |
| `/gracias` | Confirmación de un lead (siempre `noindex`, fuera del sitemap) | — | — | nunca | F1 |
| `/terminos`, `/privacidad` | Marcador literal de la app Node (siempre `noindex` hasta texto del abogado) | — | — | nunca | T0 |
| `/ir/wa/general` | Redirección rastreada a WhatsApp (302, `Disallow`) | — | — | nunca | F1 |
| `/sitemap.xml`, `/robots.txt` | Generados por PHP | — | — | — | F1 |
| `/404` | Documento de error | — | — | nunca | T0 |

**Reservadas y no creadas ahora** (la app Node las define; se agregan sin romper nada): `/motos/tipo/{categoria}`,
`/motos/nuevas`, `/motos/usadas`, `/comercios`, `/comercios/{slug}`, `/seguros`, `/como-funciona`, `/publicar`,
`/aviso/*`, cruces marca × ciudad. `tipo`, `ciudad`, `nuevas`, `usadas`, `en-cuotas`, `page` son slugs reservados:
ninguna marca ni modelo puede usarlos (`moto/src/lib/slug.ts`).

**Los dos caminos de negocio caben sin cambiar URLs:** *promocionar motos nuevas* usa `/motos/{marca}/{modelo}`,
`/motos/nuevas` (reservada) y `/motos/en-cuotas`; *alianza con una marca grande* llena su hub `/motos/{marca}` y sus
modelos, y entra por `/para-marcas-y-comercios`. Ninguno necesita una ruta nueva.

### 2.2 Modelo de contenido (contrato; F1 lo escribe completo, nadie lo renombra después)

Contenido es dato: un archivo `content/*.php` por tipo, forma documentada en su cabecera, archivos de ruta de tres líneas.

| Archivo | Clave | Forma (resumen; la cabecera del archivo es la fuente) |
|---|---|---|
| `content/marcas.php` | slug | `name, sortOrder, distributor{name,source,accessed}, intro[] (párrafos), faq[{q,a}], reviewed, reviewedBy, sources[{label,url,accessed}]` |
| `content/modelos.php` | `marca/modelo` | `brand, name, slug, engineCc?, category?, facts[{label,value,source}]` (sólo con fuente), `intro[]`, `faq[]`, `reviewed`, `reviewedBy`, `sources[]` |
| `content/ciudades.php` | slug | `name, department, intro[], sections[{h2,body[]}], faq[], reviewed, reviewedBy, sources[]` |
| `content/guias.php` | slug | forma del template + `query, published, updated, reviewed, reviewedBy, links[]` (≥ 2 enlaces internos a listados/hubs) |
| `content/pages.php` | ruta | forma del template + `gate` (`static`, `never`, o un gate de §2.3) |
| `content/lead-values.php` | origen | forma del template + `leadType` (`financiacion`, `comercial`, `contacto`) |
| `content/site.php` | — | forma del template; `whatsapp`, `phone`, `email` en `null` hasta que el propietario los confirme |

### 2.3 La regla de indexación (código en `lib/indexing.php`, F1)

`is_indexable(string $path): bool` decide para cada página y lo usan **a la vez** `partials/head.php` (meta robots)
y `sitemap.php` (inclusión). Una sola función: no pueden discrepar.

1. `SITE_NOINDEX` = `true` (o ausente/inválido) → todo `noindex`, sitemap vacío de URLs indexables.
2. `SITE_NOINDEX` = `content` → sólo guías, `/guias` y páginas estáticas pueden indexarse; marcas, modelos, ciudades
   y `/motos/en-cuotas` `noindex`.
3. `SITE_NOINDEX` = `false` → rige el umbral por tipo:

| Tipo | Umbral para indexar (todas las condiciones) |
|---|---|
| Guía | `reviewed` + `reviewedBy` + ≥ 600 palabras + sin `[VERIFICAR` + ≥ 2 enlaces internos |
| Marca | `reviewed` + ≥ 300 palabras propias + sin `[VERIFICAR` + `distributor.source` |
| Modelo | `reviewed` + ≥ 250 palabras propias + ≥ 1 `facts` con fuente + sin `[VERIFICAR` |
| Ciudad | `reviewed` + ≥ 250 palabras propias específicas de esa ciudad + sin `[VERIFICAR` |
| `/motos/en-cuotas` | `reviewed` + ≥ 400 palabras + sin `[VERIFICAR` |
| Estática (`/`, `/motos`, `/guias`, `/para-marcas-y-comercios`, `/contacto`) | sin `[VERIFICAR` en el texto visible |
| `never` (`/gracias`, `/terminos`, `/privacidad`, `/404`) | nunca |

Además: toda URL con query string es `noindex, follow` con canonical a la URL limpia. Un `noindex` jamás está en
el sitemap. La navegación principal no enlaza en masa páginas `noindex` (SEO §8): los hubs listan modelos
como enlaces contextuales, no en el menú. `verify.sh` comprueba las tres cosas.

Consecuencia deliberada: al terminar la construcción **todo el sitio está `noindex`** (D10 + D12). Se gana página
por página: el propietario revisa un texto, pone `reviewed => true`, y con `SITE_NOINDEX=content|false` esa
página entra sola al sitemap.

### 2.4 SEO técnico (F1 salvo indicación)

- `sitemap.xml`: sólo URLs indexables, `lastmod` real (`updated` del contenido, nunca la fecha de hoy), sin `priority` ni `changefreq`.
- `robots.txt` como SEO §3.4, adaptado: `Disallow: /ir/`, `/enviar.php`, `/gracias`, `Sitemap: <SITE_URL>/sitemap.xml`.
- Canonical absoluto en toda página (desde `SITE_URL`). Open Graph y Twitter completos (sin imagen hasta que haya una real).
- JSON-LD: `Organization` + `WebSite` global (sin `SearchAction`: no hay búsqueda); `BreadcrumbList` en toda página
  profunda; `Article` en guías; `FAQPage` **sólo** si la página tiene `faq` real y `reviewed`. Todo dato del JSON-LD
  visible en la página. `verify.sh` falla si aparece `AggregateRating`, `Review`, `ratingValue` o `priceValidUntil`.
- Títulos ≤ 60 caracteres y descripciones 120–160, únicos en todo el sitio (verify ya lo hace; se ajusta el rango).
- Migas de pan visibles en toda página profunda.
- Atribución: `<script src="{VENDERCRM_URL}/vc-attribution.js" defer>` sólo si `VENDERCRM_URL` está configurado; `enviar.php` lee la cookie `vc_attr`.

---

## 3. Alcance

**Núcleo (esta construcción):** home, `/motos/en-cuotas` con calculadora y formulario de financiación, índice de
marcas, 7 hubs de marca, 35 páginas de modelo (`noindex` hasta datos verificados), 3 páginas de ciudad, 13 guías
(12 portadas desde `moto/content/guias/` con el mismo slug + 1 nueva), `/para-marcas-y-comercios` con formulario
comercial, contacto, gracias, legales-marcador, `/ir/wa/`, sitemap, robots, indexación por código.

**Reutilización desde `moto` (sólo lectura):** las 12 guías (`content/guias/*.md`, ~12.000 palabras, casi todas sin
`[VERIFICAR]`; dos con 11–12 marcas pendientes), el texto de `content/seo/en-cuotas.md` (469 palabras, borrador),
el catálogo y su investigación con fuentes (`docs/research/catalog.md`). Se portan con su texto; los enlaces a rutas
que acá no existen (`/publicar`, `/seguros`, `/comercios`, `/motos/usadas`…) se reescriben a una ruta existente o
se quitan, y se anota en el log de la fase.

**Fuera de alcance:** clasificados, publicar, fichas `/aviso/*`, comercios, buscador, categorías, cruces, login,
admin, pagos, imágenes, boletín. Van al Backlog (§10).

---

## 4. Protocolo de autonomía

1. Trabajá hasta que pasen todos los criterios de salida de la fase; no pidas permiso para trabajo dentro del plan.
2. Un PR por fase: rama `phase/<id>` desde `main` actualizado; creá, mirá y mergeá el PR cuando esté verde. Un build rojo es siempre trabajo de la propia sesión. Lane 2 no espera a otras fases de lane 2, sólo a lane 1.
3. Problemas menores no bloqueantes → sección "Known issues" de `docs/log/<fase>.md`; seguí. El link pass promueve a `KNOWN-ISSUES.md` sólo lo que siga abierto y cruce fases.
4. Parar y preguntar SÓLO por: una credencial faltante sin degradación posible, o una decisión de fundación (forma del contenido, URLs, regla de indexación, contrato del CRM, texto legal, dinero) donde adivinar mal obliga a reescribir. Todo lo demás: elegí razonablemente, anotalo en el log, seguí. "Preguntar" = agregar la pregunta con opciones A/B y recomendación a `docs/decisions-needed.md`, commit, push, fin de la sesión. Nunca esperar la respuesta dentro de la sesión.
5. Valores de config faltantes nunca bloquean: se documentan en `config.example.php` y el sitio degrada (sin WhatsApp configurado, los CTA van a `/contacto`; sin CRM, el lead queda en `logs/leads.jsonl`).
6. Todo prompt es re-ejecutable: mirá qué existe en la rama y seguí desde el primer criterio no cumplido. Commit a la rama de la fase al menos cada 30 minutos (los WIP valen; el PR se mergea con squash).
7. Límites de lane 2: nada de fundación (`lib/*`, `enviar.php`, `.htaccess`, `router.php`, `partials/header.php`, `partials/footer.php`, estructura de `templates/*.php`, bloque `:root` de tokens, formas de contenido). Workaround + nota en Backlog.
8. **Costo de modelo:** Fable nunca se usa en fases, subagentes, sesiones lanzadas, watcher ni Routines. La tabla de fases sólo nombra Opus y Sonnet. Si una sesión cree que hace falta Fable, escribe el motivo en `docs/decisions-needed.md` y termina.
9. **Propiedad de archivos:** una fase sólo escribe en su bloque **Owns**, más: su `docs/log/<fase>.md`, un bloque `/* == <fase> == */` nuevo al final de `assets/css/site.css`, y una línea en `docs/decisions-needed.md` si necesita algo transversal. Ante conflictos de `git merge main`: gana main, re-aplicá tu cambio encima, re-corré verify. Nunca edites fuera de tu Owns para resolver un conflicto.
10. **Traspaso:** una fase termina cuando pasan cuatro puertas: PR mergeado verde; checklist de salida; auditoría previa (UN re-run de `./verify.sh` en main + UNA relectura adversarial del diff mergeado, hallazgos en UN commit); log de fase commiteado. Después seguí `prompts/_handoff.md`.
11. **Log de fase** `docs/log/<fase>.md`: ≤ 12 líneas "Built", ≤ 8 "Decisions", ≤ 8 "Known issues", una línea "Verification: verify green on <commit>". Agregá la línea índice en §9.
12. **Lectura de orientación:** el prompt, §1, §4, las secciones propias, la tabla de fases, el índice de §9 y los logs de las fases de "Depends on". Nada más.
13. **Tope de pulido:** UNA pasada de capturas (≤ 5 páginas × 2 anchos), UN Lighthouse sólo si el criterio de salida nombra un número, UNA pasada de interacción guardada en `tests/` sólo para fases con JS. Cuando pasan los criterios, se abre el PR en ese mismo turno; las mejoras van al Backlog.
14. Las capturas viven en el artefacto de CI, nunca en git (`docs/screenshots/` está ignorado).
15. Las decisiones viajan por archivos, nunca por mensajes a una sesión en curso.
16. **Reglas de contenido que verify comprueba:** sin `wa.me` fuera de `/ir/wa/`; sin `coche|carro|móvil|conducir|checar|Contactar|motocicleta` en texto visible (salvo legal); sin "N°1", "número 1", "más de [0-9]"; montos sólo con `fmt_money()`/`Gs.`; un solo `<h1>` por página; todo `input` con `label`.

---

## 5. Lane 1 — fundación (secuencial)

### Tabla de fases

| Fase | Lane | Modelo | Prompt | Secciones | Owns | Depende de |
|---|---|---|---|---|---|---|
| T0 Adoptar | 1 | Sonnet | `prompts/sonnet-0-adopt.md` | §1, §2.1, §5.T0 | `content/site.php`, `content/ui.php`, `content/nav.php`, `content/pages.php`, `assets/css/site.css` (tokens), `assets/fonts/**` (borrar), `partials/head.php` (preloads), `terminos/**`, `privacidad/**`, borrado de ejemplos del template, `README.md` | — |
| F1 Fundación | 1 | **Opus** | `prompts/opus-1-foundation.md` | §1, §2, §5.F1 | `lib/**`, `.htaccess`, `router.php`, `deploy/routes.php`, `enviar.php`, `ir/**`, `gracias/**`, `sitemap.php`, `robots.php`, `partials/**`, `templates/**`, `content/*.php` (cabeceras de forma + registros vacíos), `config.example.php`, `verify.sh`, `tests/**` | T0 |
| T1 Home + cuotas | 1 | **Opus** | `prompts/opus-2-home-cuotas.md` | §1, §2.1, §5.T1, §8 Q1–Q2 | `index.php`, `motos/en-cuotas/**`, `assets/js/tools/cuotas.js`, `content/tools.php`, `content/pages.php` (`/`, `/motos/en-cuotas`), `content/lead-values.php` (financiación) | F1 |
| B1 Marcas y modelos | 2 | Sonnet | `prompts/sonnet-3-brands-models.md` | §1, §2, §6.B1 | `content/marcas.php`, `content/modelos.php`, `motos/index.php`, `motos/{marca}/**` (excepto `motos/en-cuotas/**` y `motos/ciudad/**`) | F1 |
| B2 Guías | 2 | Sonnet | `prompts/sonnet-4-guides.md` | §1, §2, §6.B2 | `content/guias.php`, `guias/**`, `scripts/port-guides.php` | F1 |
| B3 Ciudades + comercios + contacto | 2 | Sonnet | `prompts/sonnet-5-cities-b2b.md` | §1, §2, §6.B3 | `content/ciudades.php`, `motos/ciudad/**`, `para-marcas-y-comercios/**`, `contacto/**`, `content/lead-values.php` (comercial, contacto) | F1 |
| L Link pass | — | Sonnet | `prompts/sonnet-9-link-pass.md` | §1, §2, §6.L | enlaces cruzados en `content/*.php`, `content/nav.php`, `KNOWN-ISSUES.md`, `docs/closing-report.md` | B1, B2, B3 |

`content/lead-values.php` y `content/pages.php` son compartidos: cada fase sólo **agrega** sus propias claves al final
(append-only); la clave de otra fase no se toca.

Modelos: Opus = `claude-opus-5-5`, Sonnet = `claude-sonnet-5-5` (re-verificar en la skill `claude-api` al lanzar).

### T0 — Adoptar el template (Sonnet, ≤ 30 min)

Los 20 pasos del README del template, con estas decisiones: `name` "moto.com.py", `domain` "moto.com.py"
[VERIFICAR: dominio final con el propietario, §7], `slug` "moto-com-py", `market` "py", `schemaType` `['Organization']`,
contacto todo `null`. Borrar todo el contenido de ejemplo, `precios/`, `servicios/`, `segmentos/`, `blog/`,
`herramientas/` (la app Node no tiene esas rutas; sus claves en `pages.php` y `nav.php` también). Tokens: paleta
sobria de alto contraste, **fuentes del sistema** (borrar `assets/fonts/`, los `@font-face` y los preloads).
`/terminos` y `/privacidad`: copiar literal el marcador de `moto/src/app/(public)/terminos|privacidad/page.tsx`
(`noindex`). `ui.php` completo en voseo paraguayo (D6). verify verde. No tocar routing: eso es F1.

### F1 — Fundación (Opus, ≤ 90 min)

1. **Routing sin barra final** (D3): `.htaccess` + `router.php` + `deploy/routes.php` + todo `path` en `content/`. Directorio con barra → 301 a sin barra; servir `index.php` del directorio sin barra; `www` → apex.
2. **`lib/indexing.php`** (§2.3): `site_indexing_mode()`, `is_indexable($path)`, conteo de palabras propias, detector de `[VERIFICAR`. Usado por `head.php` y `sitemap.php`. Tests en `tests/indexing.php` para los tres modos y cada umbral.
3. **`/ir/wa/general`** (D7): `ir/wa/general/index.php`; valida `texto` (≤ 200) y `desde` (ruta interna); añade una línea JSON a `logs/wa-clicks.jsonl` con `@`-supresión y `try`; 302 a `wa.me/<site.whatsapp>?text=…`; sin número configurado → 302 a `/contacto`. Helper `wa_href($texto)` que todo partial usa; `whatsapp-menu.php`, `whatsapp-fab.php`, `cta-band.php`, `header.php` pasan a usarlo.
4. **`enviar.php`** (D8, D9): `leadType` resuelto server-side desde `lead-values.php`; normalizar teléfono a E.164 `+595…` (`lib/market/py.php`); `idempotency_key = hash('sha256', "$e164|$type|" . gmdate('Y-m-d-H'))` siempre server-side; escribir `logs/leads.jsonl` **antes** del CRM; payload de INTEGRATIONS §2.5 con `source: "site:moto-com-py"`, `fields.tipo_lead`, rangos del formulario de financiación; omitir vacíos; 201/200-duplicate = éxito; timeout 10 s; redirección sin JS a `/gracias?t=<tipo>`. `crmTag` deja de viajar (D8: nunca `tag`, tampoco dentro de `fields`).
5. **Plantillas nuevas**: `templates/brand.php`, `templates/model.php`, `templates/city.php`, `templates/hub.php` sobre los partials existentes, y las formas de contenido de §2.2 con un registro de ejemplo `[DEV]` cada una que verify recorre y el zip de deploy excluye.
6. **SEO técnico** de §2.4: robots, sitemap por `is_indexable`, canonical, OG, JSON-LD (Organization/WebSite, BreadcrumbList, Article, FAQPage condicional).
7. **`verify.sh`**: reglas de §4.16 + meta robots ↔ sitemap coherentes para cada ruta + ningún JSON-LD prohibido + tres modos de `SITE_NOINDEX` (corre la suite con cada uno) + `enviar.php` en modo degradado escribe `leads.jsonl` con la clave idempotente esperada.

Salida: verify verde en los tres modos; `curl -I /motos/` → 301 a `/motos`; `/ir/wa/general?texto=x` → 302 con línea en el log; un POST al handler sin CRM → línea en `leads.jsonl` y 303 a `/gracias`; un POST con honeypot → 303 sin línea de CRM.

### T1 — Home + motos en cuotas (Opus, ≤ 90 min)

- **Home** (`/`): `h1` y propuesta de valor honesta ("Encontrá tu moto y averiguá cómo pagarla en cuotas"), bloque principal hacia `/motos/en-cuotas` ("Quiero financiarla"), las 7 marcas (enlaces a hubs), 4–6 guías prioridad A, CTA "Escribir por WhatsApp". Sin conteos, sin testimonios, sin logos.
- **`/motos/en-cuotas`**: título SEO "Motos en cuotas en Paraguay — entrega y cuota mensual"; texto portado de `moto/content/seo/en-cuotas.md` (conserva sus `[VERIFICAR]`); calculadora según la respuesta a §8 Q1; formulario de financiación con los campos de PRODUCT_SPEC §2.3 (nombre, teléfono, ciudad, entrega disponible en rangos, plazo deseado, recibo de sueldo / independiente, moto de interés con selector del catálogo) y el descargo **literal** junto al botón; FAQ sólo con preguntas cuyas respuestas estén en el texto.
- Script de interacción de la calculadora en `tests/cuotas.mjs`. Lighthouse móvil una vez: LCP < 2,5 s, CLS < 0,1.
- Al terminar: crear el watcher y lanzar B1, B2, B3 a la vez (`prompts/_handoff.md`).

---

## 6. Lane 2 — contenido (Sonnet, en paralelo)

Límites duros para toda fase de lane 2: §4.7 y §4.9. Todo texto nuevo nace `reviewed => false` (D12).

### B1 — Marcas y modelos
`content/marcas.php` y `content/modelos.php` generados desde `moto/src/db/seed-data/*.ts` (sólo activos; slugs
idénticos) y `moto/docs/research/catalog.md` (distribuidor, fuentes con fecha de acceso). `/motos` índice. Por marca:
intro ≥ 300 palabras **sólo con hechos de las fuentes del catálogo** (distribuidor, modelos del catálogo, dónde
consultar) + qué preguntar al comercio + enlace a `/motos/en-cuotas` y a guías relevantes; lo que no tenga fuente,
`[VERIFICAR]`. Por modelo: nombre, cilindrada si el catálogo la trae con fuente, marca, qué verificar, CTA de
financiación con el modelo preseleccionado; **sin precio, sin ficha técnica inventada**; queda `noindex` (sin
`facts` verificados). Las 35 páginas con la misma plantilla: exemplar primero, luego fan-out con subagentes Sonnet.

### B2 — Guías
Script `scripts/port-guides.php` (o manual) que lleva los 12 `.md` de `moto/content/guias/` a `content/guias.php`
con el mismo slug, título, `meta_description` y `query`; secciones `##` → `sections`. Enlaces a rutas inexistentes
reescritos (§3). Guía nueva `como-comprar-tu-primera-moto` (≥ 900 palabras, enlaza a `moto-0-km-o-usada`,
`125-150-o-200-cc-cual-elegir`, `comprar-moto-en-cuotas-en-paraguay`, `/motos/en-cuotas`; no repite su contenido).
`/guias` índice. Fechas `published`/`updated` visibles.

### B3 — Ciudades, marcas y comercios, contacto
Ciudades asuncion, ciudad-del-este, encarnacion: ≥ 250 palabras específicas de la ciudad, sólo con hechos con fuente
(p. ej. sucursales de distribuidores citadas en `catalog.md`); lo demás `[VERIFICAR]`; si no se llega a contenido
real, la página no se crea y se anota. `/para-marcas-y-comercios`: qué ofrece el sitio a marcas y comercios hoy,
honesto ("estamos arrancando", DATA_SEEDING §2 A), sin precios de planes (MONETIZATION exige escalar), formulario
`comercial` (nombre, empresa, teléfono, tipo: marca / comercio / financiera / otro, mensaje). `/contacto` con
formulario `contacto`.

### L — Link pass (Sonnet, tras mergear B1–B3)
Enlaces cruzados guía ↔ hub ↔ en-cuotas con anclaje descriptivo (cada guía ≥ 2 enlaces internos), navegación y pie
finales, migas, revisión del sitemap en los tres modos, promoción de issues a `KNOWN-ISSUES.md`, borrar el watcher,
`docs/closing-report.md` con la lista de páginas que esperan revisión del propietario para ser indexables.

---

## 7. Lo que sólo el propietario puede dar

| Ítem | Dónde va | Primera fase que lo nota | Sin él |
|---|---|---|---|
| Dominio final y `SITE_URL` (¿moto.com.py? ¿staging?) | `content/site.php`, `config.php` | T0 | canonical desde el host de la petición |
| Número de WhatsApp del negocio | `content/site.php` `whatsapp` | F1 | los CTA van a `/contacto` |
| `VENDERCRM_URL` + `VENDERCRM_API_KEY` (key exclusiva de este sitio, VenderCRM → Sitios) | `config.php` en el servidor | F1 | leads sólo en `logs/leads.jsonl` |
| Revisión de textos (`reviewed => true`, `reviewedBy`) y resolución de `[VERIFICAR]` | `content/*.php` | después de L | todo queda `noindex` |
| Cambio de `SITE_NOINDEX` a `content` o `false` | `config.php` | después de L | todo `noindex` |
| Texto legal del abogado (`/terminos`, `/privacidad`) | lo pega el propietario | antes de quitar `SITE_NOINDEX` | marcador `noindex` |
| Respuesta del abogado a LEGAL §3 (derivar leads a financieras) | — | antes de firmar con una financiera | sólo orientación, sin acuerdos |
| Subida a Hostinger (zip, `config.php`, PHP 8.2 + curl) | hPanel | después de L | — |

---

## 8. Preguntas abiertas para el propietario (bloquean T1; el resto del plan no)

Detalle con opciones A/B en `docs/decisions-needed.md`.

- **Q1 — Calculadora de cuotas vs. LEGAL §3.1** ("nunca calculamos ni publicamos una cuota propia"). Recomendado **A**:
  calculadora de *costo total*: el visitante escribe la entrega, la cuota y la cantidad de cuotas que le informó un
  comercio (y el contado, si lo tiene) y ve el total a pagar y cuánto le cuesta financiar. No usa tasa, no muestra
  "tu cuota". B: calculadora con tasa estimada → contradice §3.1 hasta que opine el abogado.
- **Q2 — ¿Dónde vive la financiación?** Recomendado **A**: sólo `/motos/en-cuotas` (texto + calculadora + formulario);
  `/financiacion` no se crea ahora (una consulta, una página) y la app Node la agrega después. B: también
  `/financiacion` como landing corta del formulario.
- **Q3 — URL de "Para marcas y comercios".** Recomendado **A**: `/para-marcas-y-comercios` (nueva; la app Node la tiene
  que sumar al migrar). B: `/comercios`, que la app Node reserva para el índice de comercios → choque futuro.

## 9. Índice de logs de construcción

| Fase | PR | Log |
|---|---|---|
| Plan | (este PR) | — |

## 10. Backlog

- `/motos/tipo/{categoria}` (p. ej. `motocarro-carga` para trabajo), `/motos/nuevas`, `/motos/usadas`: textos de `moto/content/seo/` listos, pero son listados sin inventario.
- `/seguros` (hay guía de seguro; la landing necesita LEGAL §3).
- `/como-funciona` (lo redacta el abogado según LEGAL §5).
- Guías por marca (CONTENT_STRATEGY §2.4 fase 2).
- Cloudflare Turnstile si llega spam real.
- Reintento de leads fallidos al CRM (INTEGRATIONS §2.8) con un cron de Hostinger sobre `logs/leads.jsonl`.
- Migración a la app Node: exportar `logs/leads.jsonl` y `logs/wa-clicks.jsonl`; sumar `/para-marcas-y-comercios` a `routes.ts` (escalado en `moto`).
