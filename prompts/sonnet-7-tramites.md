# Phase B5 — Trámites, ley y examen teórico. Sonnet session. Lane 2.

Read ONLY: this file, `PLAN.md` §1 (esp. D7), §2, §4, §6 (B5), §9, `docs/log/{F1,T1}.md`. From `antonmarklundcom/moto`
(read-only): `content/guias/{papeles-de-una-moto-al-dia,como-transferir-una-moto-en-paraguay}.md` (don't cannibalise).

Owns: `content/guias.php` (only a `/* == B5 == */` block, group `tramites`), `content/quiz.php`, `guias/<your slugs>/**`,
`assets/js/tools/quiz.js`, `tests/quiz.mjs`, `docs/log/B5.md`.

Lane 2 hard limits (PLAN §4.7, §4.9): no edits to `lib/`, `enviar.php`, `.htaccess`, `router.php`, header/footer,
template structure, tokens or content shapes. Every fact from a cited source (D5, D6); gaps are `verify` blocks (D14);
no page that fails the §2.3 gate gets created. Voseo; forbidden words PLAN §4.16. Never Fable (subagents Sonnet only).

Budget: ≤ 90 min.

Phase rules:
- Branch `phase/B5`. Guides from PLAN §2.1 trámites row. Amounts, requirements, offices and fines only from official
  sources (municipalities, ANTSV, laws) with `accessed` date; otherwise `verify` blocks.
- `examen-teorico-registro-de-conducir`: questions copied literally from an official, citable question bank or manual.
  No official material found → publish the guide without the quiz and log what was searched. Quiz is vanilla JS,
  progressive enhancement, answers checked client-side, source shown. Interaction script in `tests/quiz.mjs`.

Exit: guides pass the gate; quiz test passes (if built); verify green (3 modes); PR merged.

## After this phase
Follow `prompts/_handoff.md`. Spawn nothing.
