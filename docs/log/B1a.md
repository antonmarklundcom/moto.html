# B1a — Marcas y modelos (primera mitad)

## Built
- 7 marcas (por `sortOrder`, mitad redondeada hacia arriba): Honda, Star, Yamaha, Suzuki, Bajaj, TVS, Kenton. Registros en `content/marcas.php` y `content/modelos.php` dentro de `/* == B1a == */`.
- 7 hubs `/motos/{marca}` (`motos/{marca}/index.php`) y 88 páginas de modelo `/motos/{marca}/{modelo}` (`motos/{marca}/{modelo}/index.php`), todas con ≥ 300 palabras renderizadas (550–900).
- Cada modelo: intro, mantenimiento, repuestos, qué revisar si es usada y FAQ de 4 preguntas; precio, ficha, consumo y versiones salen de `catalogo.php`. El botón de WhatsApp lo pone la plantilla con el modelo nombrado.
- Cada hub: tipos con enlaces a los modelos con ficha, distribuidor citado, guía de elección por tipo y FAQ.

## Decisions
- No hay página para 8 modelos que no pasan el gate (sin ≥ 3 specs con fuente ni precio vigente): honda/cb-500x, cg-110, crf-250f, nx500, rebel-500, x-adv-750 y bajaj/dominar-400, rouser-ns-200. Quedan en la lista del hub como texto.
- Sin manual citado no hay intervalos: mantenimiento con consejos generales sin cifras, y un `verify` por modelo para el intervalo.
- Las cifras del texto salen sólo del catálogo (cilindrada, qué specs tienen fuente, quién publicó el precio, distribuidor); ningún monto en Gs. fuera de un hecho.
- Los textos de los 87 modelos se compusieron por tipo de moto (naked, scooter, cub, enduro/cross, touring, cuatriciclo, eléctrica, motocarro) con datos del registro (refrigeración, alimentación, tipo de freno, hermanos de la marca) y variantes rotadas por modelo; un solo ejemplar (honda/cb1-125) y el hub de Honda están escritos a mano. Sin subagentes (la sesión no tenía herramienta para lanzarlos).
- Enlaces a guías de B2/B4 que aún no existen se renderizan como texto y se activan solos.

## Known issues
- El texto de los modelos de un mismo tipo se parece (consejos generales); mejora con los manuales: reemplazar los `verify` de mantenimiento por intervalos citados y sumar notas por modelo.
- Los 8 modelos sin página se activan sumando specs o un precio vigente en `catalogo.php` (R1) y creando su archivo de ruta.
- La distribución de Bajaj se cita de una nota de 2019 (hay `verify` para confirmar el distribuidor actual); sucursales por marca también en `verify`.
- Un precio con más de 120 días oculta el precio de la página sola (D6); los modelos que sólo pasan el gate por precio vuelven a `noindex` si vence.

Verification: los 7 hubs y los 88 modelos pasan el gate en modo `false`; `./verify.sh` no reporta fallas de B1a (las que quedan son de otras fases: comparativas, guías, presupuesto de peso).
