# Phase B3 — Ciudades, marcas y comercios, contacto. Sonnet session. Lane 2.

Read ONLY: this file, `PLAN.md` §1, §2, §4, §6 (B3), §9, `docs/log/{F1,R1,T1}.md`, `docs/research/catalogo.md`. From
`antonmarklundcom/moto` (read-only): `src/db/seed-data/cities.ts`, `DATA_SEEDING.md` §2, `CONTENT_STRATEGY.md` parte 1.

Owns: `content/ciudades.php`, `motos/ciudad/**`, `para-marcas-y-comercios/**`, `contacto/**`, own keys in
`content/pages.php` and `content/lead-values.php` (append-only), `docs/log/B3.md`.

Lane 2 hard limits (PLAN §4.7, §4.9): no edits to `lib/`, `enviar.php`, `.htaccess`, `router.php`, header/footer,
template structure, tokens or content shapes. Every fact from a cited source (D5, D6); gaps are `verify` blocks (D14);
no page that fails the §2.3 gate gets created. Voseo; forbidden words PLAN §4.16. Never Fable (subagents Sonnet only).

Budget: ≤ 60 min.

Phase rules:
- Branch `phase/B3`. Cities from `cities.ts` slugs only, and only those with ≥ 250 words of real sourced city-specific
  content (distributor branches, local offices); skipped cities are logged.
- `/para-marcas-y-comercios`: short, honest, no plans/prices/traffic numbers/logos, form type `comercial`.
- `/contacto`: form type `consulta` + WhatsApp.

Exit: created URLs pass the gate; no-JS POST of each form lands in `logs/leads.jsonl` with the right `tipo_lead`;
verify green; PR merged.

## After this phase
Follow `prompts/_handoff.md`. Spawn nothing.
