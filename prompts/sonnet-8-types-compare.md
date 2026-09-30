# Phase B6 — Tipos y comparativas. Sonnet session. Lane 2.

Read ONLY: this file, `PLAN.md` §1, §2, §4, §6 (B6), §9, `docs/log/{F1,R1,T1}.md`.

Owns: `content/tipos.php`, `content/comparativas.php`, `motos/tipo/**`, `guias/*-vs-*/**`, `docs/log/B6.md`.

Lane 2 hard limits (PLAN §4.7, §4.9): no edits to `lib/`, `enviar.php`, `.htaccess`, `router.php`, header/footer,
template structure, tokens or content shapes. Every fact from a cited source (D5, D6); gaps are `verify` blocks (D14);
no page that fails the §2.3 gate gets created. Voseo; forbidden words PLAN §4.16. Never Fable (subagents Sonnet only).

Budget: ≤ 90 min.

Phase rules:
- Branch `phase/B6`. `/motos/tipo/<slug>` for every category with ≥ 3 catalogue models (slugs from `categories.ts`).
- ~20 comparisons: pairs in the same segment where both models have ≥ 5 sourced specs; prefer pairs of the brands with most
  models and entry segment (110–150 cc) first. Table rendered from `catalogo.php`; text explains who each suits by the data;
  no winner without an explicit criterion. Slug `<marca-modelo>-vs-<marca-modelo>`, alphabetical order, one page per pair.
- Exemplar first, then fan out (§4.17).

Exit: type pages and comparisons pass the gate; verify green (3 modes); PR merged.

## After this phase
Follow `prompts/_handoff.md`. Spawn nothing.
