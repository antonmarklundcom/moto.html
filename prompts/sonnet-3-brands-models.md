# Phase B1 — Marcas y modelos. Sonnet session. Lane 2, parallel with B2, B3.

Read ONLY: this file, `PLAN.md` §1, §2, §4, §6.B1, the phase table, §9, `docs/log/F1.md`, `docs/log/T1.md`.
From `antonmarklundcom/moto` (read-only): `src/db/seed-data/brands.ts`, `models.ts`, `docs/research/catalog.md`,
`CONTENT_STRATEGY.md` parte 1.

Owns: `content/marcas.php`, `content/modelos.php`, `motos/index.php`, `motos/<brand>/**` for the 7 catalog brands
(never `motos/en-cuotas/**` or `motos/ciudad/**`), `content/pages.php` (`/motos`, append-only), `docs/log/B1.md`.

Lane 2 hard limits: no edits to `lib/`, `enviar.php`, `.htaccess`, `router.php`, header/footer, template structure,
tokens or content shapes. Workaround + Backlog note instead.

Budget: one session, ≤ 90 min.

Phase rules:
- Branch `phase/B1`. Only `isActive: true` records: 7 brands, 35 models, slugs copied exactly.
- Brand intro ≥ 300 words from catalog sources only; model pages carry no price and no invented spec.
  Unsourced claim → `[VERIFICAR: qué y dónde]`. Everything `reviewed => false`.
- Build `/motos/honda` + `/motos/honda/xr-150` as exemplars, then fan out the rest as parallel Sonnet subagents
  (`fable-directs-sonnet-builds` §Fan-out; never Fable). One verify, one PR.
- Model CTAs link to `/motos/en-cuotas?modelo=<brand>/<model>` (form preselect) and WhatsApp via `wa_href()`.

Exit: 43 URLs (index + 7 + 35) return 200 in verify; all `noindex` and out of the sitemap under every mode until
reviewed; no model page shows a price; verify green; PR merged.

## After this phase
Follow `prompts/_handoff.md`. Spawn nothing.
