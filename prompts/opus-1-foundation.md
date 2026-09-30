# Phase F1 — Fundación. Opus session. Lane 1.

Read ONLY: this file, `PLAN.md` §1, §2 (all), §4, §5 (tabla + F1), §9, `docs/log/T0.md`. From
`antonmarklundcom/moto` (read-only): `INTEGRATIONS.md` §2, `SEO_ARCHITECTURE.md` §2–§3 and §6–§9,
`DECISIONS.md` ADR-07/08/25/26, `src/lib/hash.ts`. Execute under §4. Build nothing outside the plan.

Owns: `lib/**`, `.htaccess`, `router.php`, `deploy/routes.php`, `enviar.php`, `ir/**`, `gracias/**`, `sitemap.php`,
`robots.php`, `partials/**`, `templates/**`, `content/*.php` (shape headers + empty/`[DEV]` records only),
`config.example.php`, `verify.sh`, `tests/**`, `.gitignore`, `docs/log/F1.md`.

Budget: one session, ≤ 90 min. This phase writes the contract every later phase builds on: get it complete now.

Phase rules:
- Branch `phase/F1`. Do PLAN §5.F1 items 1–7 in order; WIP commit after each.
- Load `php-site-template` and `vendercrm-lead-capture`. The CRM contract is PLAN D8/D9 + INTEGRATIONS §2 —
  never send `pipeline`, `stage`, `owner`, `tag` (not even inside `fields`); omit empty optionals.
- `is_indexable()` is the single source for meta robots AND sitemap (PLAN §2.3). Write its tests first.
- `SITE_NOINDEX`: read `config.php` then `getenv`; anything but `content`/`false` → `true`.
- `/ir/wa/general`: logging failure must never block the 302. No `wa.me` anywhere else in rendered HTML.
- `[DEV]` example records for brand/model/city/guide exist so verify exercises the templates; exclude them from
  the deploy zip and the sitemap.
- If the content shape needs something PLAN §2.2 doesn't cover and guessing wrong forces a rewrite: §4.4.

Exit: `./verify.sh` green with `SITE_NOINDEX` = true, content and false; the four curl checks in PLAN §5.F1
"Salida" pass and are scripted in verify; deploy-zip verify green; PR merged.

## After this phase
Follow `prompts/_handoff.md`. Next: `prompts/opus-2-home-cuotas.md`, model Opus.
