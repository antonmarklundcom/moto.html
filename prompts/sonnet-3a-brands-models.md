# Phase B1a — Marcas y modelos, first half (rounded up) of the brands. Sonnet session. Lane 2.

Read ONLY: this file, `PLAN.md` §1, §2, §4, §5 (table), §6 (B1), §9, `docs/log/{F1,R1,T1}.md`. From `antonmarklundcom/moto`
(read-only): `CONTENT_STRATEGY.md` parte 1.

Your brands: sort `content/catalogo.php` brands by `sortOrder`; you take the first half (rounded up). B1b takes the others.

Owns: your brands' records in `content/marcas.php` and `content/modelos.php` (inside a `/* == B1a == */` block),
`motos/<your brand>/**`, `docs/log/B1a.md`.

Lane 2 hard limits (PLAN §4.7, §4.9): no edits to `lib/`, `enviar.php`, `.htaccess`, `router.php`, header/footer,
template structure, tokens or content shapes. Every fact from a cited source (D5, D6); gaps are `verify` blocks (D14);
no page that fails the §2.3 gate gets created. Voseo; forbidden words PLAN §4.16. Never Fable (subagents Sonnet only).

Budget: ≤ 90 min.

Phase rules:
- Branch `phase/B1a`. Page sections per PLAN §6 B1 and §2.1; specs and prices render from `catalogo.php`, never retyped.
- Exemplar first (one hub + one model), check it, then fan out one Sonnet subagent per brand (§4.17). One verify, one PR.
- Maintenance intervals only with a manual source; otherwise general advice without numbers.
- WhatsApp CTA via `wa_href()` with the model named in the text.

Exit: every model of your brands has a page that passes the §2.3 gate (list any that could not, and why, in the log);
verify green (3 modes); PR merged.

## After this phase
Follow `prompts/_handoff.md`. Spawn nothing.
