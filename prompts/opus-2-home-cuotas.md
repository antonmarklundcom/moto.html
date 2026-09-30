# Phase T1 — Home + motos en cuotas. Opus session. Lane 1 (last).

Read ONLY: this file, `PLAN.md` §1, §2.1, §2.3, §4, §5 (tabla + T1), §8, §9, `docs/log/T0.md`, `docs/log/F1.md`,
and `docs/decisions-needed.md` Q1–Q2. From `antonmarklundcom/moto` (read-only): `PRODUCT_SPEC.md` §2.3,
`CONTENT_STRATEGY.md` parte 1, `content/seo/en-cuotas.md`.

**Precondition:** Q1 and Q2 have an answer in `docs/decisions-needed.md` on main. If not: end now with a one-line
report (the watcher does not exist yet; Anton restarts this phase after answering).

Owns: `index.php`, `motos/en-cuotas/**`, `assets/js/tools/cuotas.js`, `content/tools.php`, `content/pages.php`
(keys `/` and `/motos/en-cuotas`, append-only), `content/lead-values.php` (financing keys, append-only),
`tests/cuotas.mjs`, `docs/log/T1.md`.

Budget: one session, ≤ 90 min.

Phase rules:
- Branch `phase/T1`. Home first, then `/motos/en-cuotas`, per PLAN §5.T1.
- Calculator exactly as the Q1 answer says. Money via `window.Market.fmtMoney` → `Gs. 12.500.000`. Works without
  JS for the form; the calculator is progressive enhancement.
- Financing disclaimer next to the button, copied literally from PRODUCT_SPEC §2.3. Form uses ranges (LEGAL §2.1)
  and says before sending that the data goes to a comercio or financiera.
- Ported text keeps its `[VERIFICAR]` markers and `reviewed => false`. No counts, no testimonials, no logos.
- One Lighthouse mobile run on `/motos/en-cuotas`: LCP < 2.5 s, CLS < 0.1.

Exit: verify green (3 modes); `tests/cuotas.mjs` passes; a no-JS POST from the form lands in `logs/leads.jsonl`
with `tipo_lead: financiacion`; Lighthouse numbers in the PR body; PR merged.

## After this phase
Follow `prompts/_handoff.md`. Create the watcher Routine (`prompts/_watcher.md`, hourly, Sonnet), then spawn ALL
lane 2 phases at once: `sonnet-3-brands-models.md`, `sonnet-4-guides.md`, `sonnet-5-cities-b2b.md` (Sonnet).
