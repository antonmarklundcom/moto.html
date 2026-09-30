# Phase R1 — Catálogo ampliado. Opus session. Lane 1, parallel with F1.

Read ONLY: this file, `PLAN.md` §1 (esp. D4–D7), §2.2, §4 (esp. §4.18), §5 (table + R1), `docs/log/T0.md`. From
`antonmarklundcom/moto` (read-only): `src/db/seed-data/{brands,models,categories}.ts`, `docs/research/catalog.md`,
`src/lib/slug.ts`.

Owns: `content/catalogo.php`, `docs/research/**`, `docs/log/R1.md`.

Budget: ≤ 90 min. Research quality decides every model page: evidence over volume.

Phase rules:
- Branch `phase/R1`. Start from the seed (7 brands, 35 active models, identical slugs). Then find every brand with sales
  in Paraguay (official distributors, `.com.py` brand sites, Paraguayan press) and their models, 0 km and used market.
- Inclusion bar = D4. Each spec and price is a sourced fact with `accessed` date (D5, D6). Record method per §4.18.
- Slugs: `slugify()` rules, never reserved words, never change an existing seed slug.
- Category per model from `categories.ts` slugs only.
- Write `content/catalogo.php` with its shape header exactly per PLAN §2.2 (if F1 is merged, match
  `content/_dev/catalogo.php` and the loader). Over 120 models: prioritise those with price + specs; list the rest under
  "próxima tanda" in `docs/research/catalogo.md`.
- WIP commit every 30 min: research is the phase most likely to be cut off.

Exit: `content/catalogo.php` lints and loads (`php -r`); every model has ≥ 1 source; zero unsourced numbers
(scripted check in the PR body); `docs/research/catalogo.md` lists brands found, models per brand, what was rejected and why;
PR merged (verify green if F1 is already on main).

## After this phase
Follow `prompts/_handoff.md`. If F1's PR is merged, spawn `prompts/sonnet-2-home-hubs.md` (Sonnet); otherwise spawn nothing.
