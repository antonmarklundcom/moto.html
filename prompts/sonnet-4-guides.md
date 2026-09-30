# Phase B2 — Guías de compra y precios. Sonnet session. Lane 2.

Read ONLY: this file, `PLAN.md` §1, §2, §3, §4, §6 (B2), §9, `docs/log/{F1,R1,T1}.md`. From `antonmarklundcom/moto`
(read-only): `content/guias/*.md`, `CONTENT_STRATEGY.md`.

Owns: `content/guias.php` (only a `/* == B2 == */` block, groups `compra` and `precios`), `guias/<your slugs>/**`,
`scripts/port-guides.php`, `docs/log/B2.md`.

Lane 2 hard limits (PLAN §4.7, §4.9): no edits to `lib/`, `enviar.php`, `.htaccess`, `router.php`, header/footer,
template structure, tokens or content shapes. Every fact from a cited source (D5, D6); gaps are `verify` blocks (D14);
no page that fails the §2.3 gate gets created. Voseo; forbidden words PLAN §4.16. Never Fable (subagents Sonnet only).

Budget: ≤ 90 min.

Phase rules:
- Branch `phase/B2`. Port the 12 guides with identical slug, title, meta description and text; only fix links to routes
  that don't exist here (log each). `[VERIFICAR]` → `verify` blocks.
- New: `como-comprar-tu-primera-moto` (≥ 900 words, links to 0 km/usada, cilindrada, cuotas guides; no repetition),
  `precios-de-motos-0-km-en-paraguay` and `motos-baratas-en-paraguay`: tables generated from `catalogo.php` at render
  (so they update themselves and hide expired prices), explicit criterion, dates visible.

Exit: 15 guide URLs pass the gate; verify green (3 modes); PR merged.

## After this phase
Follow `prompts/_handoff.md`. Spawn nothing.
