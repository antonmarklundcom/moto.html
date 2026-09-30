# Phase L — Link pass. Sonnet session. Runs after B1, B2, B3 are merged (spawned by the watcher).

Read ONLY: this file, `PLAN.md` §1, §2, §4, §6.L, the phase table, §9, and `docs/log/{T1,B1,B2,B3}.md`.

Owns: cross-link keys in `content/*.php` (`related`, `links`, `guides`), `content/nav.php`, `KNOWN-ISSUES.md`,
`docs/closing-report.md`, `docs/log/L.md`, and the cross-cutting lines queued in `docs/decisions-needed.md`.

Budget: one session, ≤ 60 min.

Phase rules:
- Branch `phase/L`. Guide ↔ brand hub ↔ `/motos/en-cuotas` links with descriptive anchors; every guide ≥ 2 internal
  links; no main-nav links to pages that are `noindex` by threshold (SEO §8).
- Run verify under all three `SITE_NOINDEX` modes and record which URLs each mode puts in the sitemap.
- `docs/closing-report.md`: every page waiting for owner review (path, open `[VERIFICAR]` count), the §7 checklist,
  and the Hostinger upload steps from the template README.

Exit: verify green (3 modes); closing report committed; PR merged.

## After this phase
Disable the watcher Routine (`update_trigger enabled=false`, or `delete_trigger` if this session was not started by it),
then STOP with the closing report. Spawn nothing.
