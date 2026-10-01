# moto.html — moto.com.py

Sitio de moto.com.py en HTML + PHP 8.2 para hosting compartido de Hostinger. Sin Node, sin base de datos.
Construido desde `php-site-template`, mercado `py`. Objetivo: tráfico orgánico desde Google Paraguay.

- Plan y decisiones: `PLAN.md`. Cierre de la construcción y pasos de publicación: `docs/closing-report.md`.
- El contenido es dato: `content/*.php` (la forma de cada archivo está en su cabecera). Un archivo de ruta son tres líneas.
- `./verify.sh` es la compuerta: lint, arranca el sitio en los tres modos de `SITE_NOINDEX` y en producción, comprueba
  cada URL, el gate de indexación, el formulario de leads y las reglas de contenido.
- Nada inventado: toda cifra lleva fuente y fecha; lo que no tiene fuente va en bloques `verify` que nunca se muestran
  (lista en `docs/verificar.md`).
