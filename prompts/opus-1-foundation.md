# Phase F1 — Fundación. Opus session. Lane 1, parallel with R1.

Read ONLY: this file, `PLAN.md` §1, §2 (all), §4, §5 (table + F1), §9, `docs/log/T0.md`. From `antonmarklundcom/moto`
(read-only): `INTEGRATIONS.md` §2, `SEO_ARCHITECTURE.md` §2–§3 and §6–§9, `DECISIONS.md` ADR-07/08/25/26, `src/lib/hash.ts`.

Owns: `lib/**`, `.htaccess`, `router.php`, `deploy/**`, `enviar.php`, `ir/**`, `gracias/**`, `sitemap.php`, `robots.php`,
`partials/**`, `templates/**`, shape headers of `content/*.php` (NOT `content/catalogo.php`: R1 owns it), `content/_dev/**`,
`config.example.php`, `verify.sh`, `tests/**`, `.gitignore`, `docs/log/F1.md`.

Budget: ≤ 90 min. This phase writes the contract every later phase builds on: complete it now.

Phase rules:
- Branch `phase/F1`. PLAN §5.F1 items 1–7 in order; WIP commit after each. Load `php-site-template`, `vendercrm-lead-capture`.
- `is_indexable()` is the single source for meta robots AND sitemap. Tests first (`tests/indexing.php`).
- Word counts on rendered main content only; `verify` blocks never render; prices > 120 days hidden (D6).
- `SITE_NOINDEX`: `config.php` then `getenv`; anything but `content`/`false` → `true`. `config.example.php` documents
  that the owner launches with `false` (D12).
- The catalogue loader must work with `content/catalogo.php` missing (R1 may merge after you).
- Shape gap where a wrong guess forces a rewrite → PLAN §4.4.

Exit: verify green in all three `SITE_NOINDEX` modes; the PLAN §5.F1 "Salida" checks scripted in verify; deploy-zip verify
green; PR merged.

## After this phase
Follow `prompts/_handoff.md`. If R1's PR is merged, spawn `prompts/sonnet-2-home-hubs.md` (Sonnet); otherwise spawn
nothing (R1 spawns it when it finishes).
