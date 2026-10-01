# Informe de cierre — moto.html

`./verify.sh` PASS (3 modos, producción, leads) al cierre.

## Páginas construidas
| Grupo | Cantidad |
|---|---|
| Estáticas: `/`, `/motos`, `/motos/en-cuotas`, `/guias`, `/para-marcas-y-comercios`, `/contacto` | 6 |
| Marcas (B1a 7 + B1b 7) | 14 |
| Modelos (B1a 88 + B1b 24) | 112 |
| Guías de compra y precios (B2) | 15 |
| Guías de reparación (B4) | 20 |
| Guías de trámites y ley (B5) | 7 |
| Comparativas (B6) | 22 |
| Tipos (B6): naked, enduro-cross, scooter, cub | 4 |
| Ciudades (B3) | 0 |

URLs en el sitemap por modo: `true` = 0, `content` = 50, `false` = 200 en producción (209 con registros [DEV]).

## Lo que NO se construyó y por qué
- **Ciudades:** ninguna llega al mínimo de 250 palabras con fuente. Faltan sucursales y trámites locales con fuente.
- **Examen teórico (quiz):** no hay banco de preguntas oficial citable (D7). La guía lo dice.
- **8 modelos sin página** (no pasan el gate): Honda CB 500X, CG 110, CRF 250F, NX500, Rebel 500, X-ADV 750; Bajaj Dominar 400, Rouser NS 200.
- **Tipos touring, cuatriciclo, eléctrica, motocarro-carga:** sin pares comparables ni modelos publicados todavía.
- **Trámites:** 7 guías en vez de ~10, las que respaldan las fuentes.

## Antes de publicar (decisiones tuyas)
1. **Número de WhatsApp:** `content/site.php` tiene `whatsapp` en `null`. Mientras no lo pongas, los botones llevan a `/contacto`.
2. **Texto legal:** `/terminos` y `/privacidad` son marcador `noindex` hasta que el abogado entregue el texto.
3. **Multas y ley (B5):** las cifras salen de prensa, no de la escala oficial, y las fuentes se contradicen en el casco (10 u 11 jornales).
   Verificar Ley 5016/14 y la escala de Caminera antes de promocionar esas guías.
4. **Cuotas Kenton** de `/motos/en-cuotas`: vienen de resúmenes de búsqueda y no traen entrega ni cantidad de cuotas.
5. **Texto de modelos y guías de reparación:** es genérico por tipo de moto, sin cifras. Conviene una lectura editorial y, para
   los modelos, cargar los intervalos de service desde el manual (hay ~200 bloques `verify`, ver `docs/verificar.md`).
6. Los precios se ocultan solos a los 120 días; una página que sólo pasa por precio vuelve a `noindex` hasta re-verificarlo.

## Publicar en Hostinger (hPanel → Avanzado → Git)
1. Repo `antonmarklundcom/moto.html`, rama `main`, directorio `public_html`. Desplegar.
2. En el servidor, copiá `config.example.php` a `config.php` y completá: `SITE_URL` = `https://moto.com.py`,
   `SITE_NOINDEX` = `false`, `VENDERCRM_URL` y `VENDERCRM_API_KEY`, y `GA4_ID` si querés medir. `config.php` y `logs/` no se versionan.
3. Sitio en PHP 8.2 (no como app Node.js). Probá primero en el dominio temporal de Hostinger.
4. Corré `deploy/verify-live.sh` contra el dominio: confirma 403/404 en `content/`, `lib/`, `config.php`, https, www → apex y sitemap.
   La regla de barra final con LiteSpeed sólo se confirma ahí.
5. Recién entonces apuntá el dominio al sitio PHP y quitá la app Node.js.
6. Día uno: enviar `https://moto.com.py/sitemap.xml` a Search Console y activar GA4.

## Pendiente para una próxima tanda
Ciudades con fuente, quiz si aparece banco oficial, 48 modelos de `docs/research/proxima-tanda.json`, re-verificación de precios,
y revisar con Search Console a los 60 días qué familias de búsqueda rankean.
