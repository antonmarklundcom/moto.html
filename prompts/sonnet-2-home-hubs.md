# Phase T1 — Home + hubs. Sonnet session. Lane 1 (last).

Read ONLY: this file, `PLAN.md` §1, §2.1, §2.3, §4, §5 (table + T1), §9, `docs/log/{T0,F1,R1}.md`. From
`antonmarklundcom/moto` (read-only): `content/seo/en-cuotas.md`, `CONTENT_STRATEGY.md` parte 1.

Precondition: F1 and R1 both merged. If not, end with a one-line report.

Owns: `index.php`, `motos/index.php`, `motos/en-cuotas/**`, `guias/index.php`, own keys in `content/pages.php` and
`content/lead-values.php` (append-only), `docs/log/T1.md`.

Budget: ≤ 60 min.

Phase rules:
- Branch `phase/T1`. Home: honest value line, brands and types from `catalogo.php`, most-searched guide groups, "Escribir por
  WhatsApp", `consulta` form. No counts, testimonials, logos.
- `/motos/en-cuotas`: informational only (D8), text ported from `en-cuotas.md` (its `[VERIFICAR]` → `verify` blocks),
  plus dated distributor plans only if R1 sourced them. No calculator, no financing form, no promises.
- `/guias` and `/motos` render from content arrays so lane 2 pages appear without edits here.
- One Lighthouse mobile run on `/`: LCP < 2.5 s, CLS < 0.1.

Exit: verify green (3 modes); Lighthouse numbers in PR body; PR merged.

## After this phase
Follow `prompts/_handoff.md`. Create the watcher Routine (`prompts/_watcher.md`, hourly, Sonnet), then spawn 4 lane 2
phases at once: `sonnet-3a-brands-models.md`, `sonnet-3b-brands-models.md`, `sonnet-4-guides.md`, `sonnet-6-repair.md`.
The watcher starts `sonnet-5-cities-b2b.md`, `sonnet-7-tramites.md`, `sonnet-8-types-compare.md` as slots free up.
