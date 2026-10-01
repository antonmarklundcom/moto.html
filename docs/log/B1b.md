# B1b — Marcas y modelos (2ª mitad)

## Built
- 7 hubs de marca en `content/marcas.php` (bloque `/* == B1b == */`): bmw-motorrad, triumph, taiga, leopard, super-soco, yadea, buler (sortOrder 103 a 115 de `catalogo.php`).
- 24 páginas de modelo en `content/modelos.php` (mismo bloque): intro, mantenimiento, repuestos, qué revisar si es usada y FAQ.
- 31 archivos de ruta de tres líneas: `motos/<marca>/index.php` y `motos/<marca>/<modelo>/index.php`.
- Specs y precios salen de `catalogo.php` (no se reescribe ninguna cifra); el texto editorial no lleva números.
- Total: 31 páginas, todas indexables con `SITE_NOINDEX=false` (hubs 390 a 440 palabras).

## Decisions
- Mantenimiento: consejo general sin cifras; los intervalos van en un bloque `verify` por modelo (no hay manual citable).
- Texto condicionado por las specs de la ficha (carburador, freno de tambor/disco, aire, CVT) para que las páginas de una misma categoría no sean idénticas.
- Hubs de marca sin afirmaciones de mercado ni de origen de fabricación (R1 las descartó por falta de fuente).
- Los enlaces a guías todavía no creadas se renderizan como texto (`link_live()`) y se activan solos.
- Generado con un script de scratchpad (no versionado) en vez de subagentes: mismo molde para las 24 páginas.

## Known issues
- Los modelos con 1 o 2 specs (Buler, Super Soco, Yadea) pasan el gate por el precio publicado: si vence (120 días) pasan a `noindex`.
- Intervalos de service de los 24 modelos pendientes en `docs/verificar.md`.
- El texto de intro y de usada es compartido por categoría con variaciones: conviene diferenciarlo con datos de manual cuando haya fuente.

Verification: `./verify.sh` falla sólo en `tests/content.php` por registros de otras fases (comparativas, guías); las 31 páginas pasan las reglas de contenido y el gate en los 3 modos.
