# Phase B2 — Guías. Sonnet session. Lane 2, parallel with B1, B3.

Read ONLY: this file, `PLAN.md` §1, §2, §3, §4, §6.B2, the phase table, §9, `docs/log/F1.md`, `docs/log/T1.md`.
From `antonmarklundcom/moto` (read-only): `content/guias/*.md`, `CONTENT_STRATEGY.md`.

Owns: `content/guias.php`, `guias/**`, `scripts/port-guides.php`, `content/pages.php` (`/guias`, append-only),
`docs/log/B2.md`.

Lane 2 hard limits: no edits to `lib/`, `enviar.php`, `.htaccess`, `router.php`, header/footer, template structure,
tokens or content shapes.

Budget: one session, ≤ 90 min.

Phase rules:
- Branch `phase/B2`. Port the 12 guides with identical slugs, titles, meta descriptions and text. Do not rewrite
  them; only fix links to routes that do not exist here (log each change) and keep every `[VERIFICAR]`.
- New guide `como-comprar-tu-primera-moto` (≥ 900 words, voseo, no invented figures, links per PLAN §6.B2).
- Every guide: `reviewed => false`, `published`/`updated` dates visible, ≥ 2 internal links, `Article` JSON-LD;
  FAQPage only when the guide has a real FAQ.

Exit: 14 URLs (`/guias` + 13) return 200; word counts in the PR body; verify green; PR merged.

## After this phase
Follow `prompts/_handoff.md`. Spawn nothing.
