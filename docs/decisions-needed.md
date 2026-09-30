# Decisiones pendientes del propietario

Formato: pregunta, opciones A/B, recomendación. El propietario responde con la letra debajo de
"Respuesta". Una entrada sin respuesta bloquea sólo la fase que la nombra.

---

## Q1 — Calculadora de cuotas vs. LEGAL_AND_COMPLIANCE §3.1 — RESPONDIDA

El pedido incluye "una calculadora de cuotas". `moto/LEGAL_AND_COMPLIANCE.md` §3.1 dice, hasta que responda
el abogado: "**Nunca** calculamos ni publicamos una cuota propia", y CONTENT_STRATEGY §1.5 prohíbe "cuotas
calculadas por nosotros presentadas como oferta". Las dos cosas no pueden cumplirse tal cual.

- **A (recomendada) — calculadora de costo total.** El visitante escribe lo que le informó un comercio:
  entrega, monto de la cuota, cantidad de cuotas y, si lo tiene, el precio de contado. La página muestra
  el total a pagar (entrega + cuota × cantidad) y cuánto cuesta financiar (total − contado). No usa tasas,
  no muestra "tu cuota", no sugiere montos. Es exactamente el cálculo que ya explica el texto de
  `moto/content/seo/en-cuotas.md`, y ayuda a comparar ofertas reales. Al lado, el formulario "Quiero financiarla".
- **B — calculadora de cuota estimada con tasa.** El visitante pone precio, entrega, plazo y una tasa;
  la página estima la cuota. Rankea mejor para "cuanto sale una moto en cuotas", pero publica una cuota
  calculada por nosotros: contradice §3.1 hasta que el abogado lo habilite.

Respuesta: **ninguna de las dos** (propietario, 2026-09-30): sin calculadora ni promesas financieras; no hay datos ni socio. `/motos/en-cuotas` queda informativa (PLAN D8).

---

## Q2 — ¿Dónde vive la financiación? — RESPONDIDA

La app Node tiene dos URLs: `/motos/en-cuotas` (listado + texto, título "Motos en cuotas en Paraguay") y
`/financiacion` (landing del formulario). Sin inventario, las dos apuntarían a la misma búsqueda.

- **A (recomendada)** — sólo `/motos/en-cuotas`: texto + calculadora + formulario. `/financiacion` no se crea
  ahora; la app Node la suma al migrar sin romper nada. Una consulta, una página (SEO §11).
- **B** — también `/financiacion` como landing corta del formulario (para CTA y anuncios), con texto propio
  distinto para no canibalizar.

Respuesta: **A** (propietario, 2026-09-30).

---

## Q3 — URL de "Para marcas y comercios" — RESPONDIDA

La app Node no define una página de venta a marcas y comercios. `/comercios` está reservada para el
índice de comercios.

- **A (recomendada)** — `/para-marcas-y-comercios`. URL nueva, descriptiva; al migrar se suma a
  `moto/src/lib/seo/routes.ts` (un cambio de URL en `moto` se escala allá).
- **B** — `/comercios`. Coincide con la app Node, pero cuando haya índice de comercios esta página tendría
  que moverse (301) o convivir con él.

Respuesta: **A** (propietario, 2026-09-30), con prioridad baja: el foco es tráfico, no alianzas.

---

## Q4 — Indexación al lanzar — RESPONDIDA

Respuesta del propietario (2026-09-30): "never block traffic for pages I wanna rank. Focus on traffic asap."
→ `SITE_NOINDEX=false` al lanzar, sin revisión manual previa; gate automático de calidad (PLAN D12, D13, §2.3).
