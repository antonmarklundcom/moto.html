# Phase B3 — Ciudades, marcas y comercios, contacto. Sonnet session. Lane 2, parallel with B1, B2.

Read ONLY: this file, `PLAN.md` §1, §2, §4, §6.B3, the phase table, §9, `docs/log/F1.md`, `docs/log/T1.md`,
and `docs/decisions-needed.md` Q3. From `antonmarklundcom/moto` (read-only): `src/db/seed-data/cities.ts`,
`docs/research/catalog.md`, `DATA_SEEDING.md` §2, `CONTENT_STRATEGY.md` parte 1.

**Precondition:** Q3 answered. If not, build the cities and `/contacto`, skip the B2B page, log it, and still merge.

Owns: `content/ciudades.php`, `motos/ciudad/**`, the B2B page route dir named by Q3, `contacto/**`,
`content/pages.php` and `content/lead-values.php` (own keys, append-only), `docs/log/B3.md`.

Lane 2 hard limits: no edits to `lib/`, `enviar.php`, `.htaccess`, `router.php`, header/footer, template structure,
tokens or content shapes.

Budget: one session, ≤ 90 min.

Phase rules:
- Branch `phase/B3`. Cities: asuncion, ciudad-del-este, encarnacion only; a city without ≥ 250 words of real,
  sourced, city-specific content is not created (log it).
- B2B page: honest ("estamos arrancando"), no plan prices, no traffic numbers, no partner logos; form type
  `comercial`. MONETIZATION changes escalate (§4.4).
- `/contacto`: form type `contacto` + "Escribir por WhatsApp" via `wa_href()`.

Exit: the created URLs return 200; a no-JS POST of each form lands in `logs/leads.jsonl` with the right
`tipo_lead`; verify green; PR merged.

## After this phase
Follow `prompts/_handoff.md`. Spawn nothing.
