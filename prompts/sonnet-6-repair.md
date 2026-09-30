# Phase B4 — Reparación y mantenimiento. Sonnet session. Lane 2.

Read ONLY: this file, `PLAN.md` §1, §2, §4, §6 (B4), §9, `docs/log/{F1,T1}.md`. From `antonmarklundcom/moto`
(read-only): `CONTENT_STRATEGY.md` parte 1, `content/guias/cuanto-cuesta-mantener-una-moto.md` (don't cannibalise it).

Owns: `content/guias.php` (only a `/* == B4 == */` block, group `reparacion`), `guias/<your slugs>/**`, `docs/log/B4.md`.

Lane 2 hard limits (PLAN §4.7, §4.9): no edits to `lib/`, `enviar.php`, `.htaccess`, `router.php`, header/footer,
template structure, tokens or content shapes. Every fact from a cited source (D5, D6); gaps are `verify` blocks (D14);
no page that fails the §2.3 gate gets created. Voseo; forbidden words PLAN §4.16. Never Fable (subagents Sonnet only).

Budget: ≤ 90 min.

Phase rules:
- Branch `phase/B4`. The ~20 slugs listed in PLAN §2.1 (adjust names to how people search; one query, one page).
- Shape: symptom → probable causes → what you can check yourself → when to go to the taller → safety note.
  No workshop prices, torques or intervals without a cited source (manufacturer manual).
- Links to model pages where the advice applies (by category/engine type from `catalogo.php`) + ≥ 2 related guides.
- Exemplar first, then fan out in batches of 5 guides per Sonnet subagent (§4.17).

Exit: ~20 guides each ≥ 600 words passing the gate; verify green (3 modes); PR merged.

## After this phase
Follow `prompts/_handoff.md`. Spawn nothing.
