# Phase L — Link pass. Sonnet session. After every lane 2 PR is merged (spawned by the watcher).

Read ONLY: this file, `PLAN.md` §1, §2, §4, §6 (L), §7, the phase table, §9, and every `docs/log/*.md` of lane 2.

Owns: cross-link keys in `content/*.php` (`related`, `links`, `guides`), `content/nav.php`, `KNOWN-ISSUES.md`,
`docs/closing-report.md`, `docs/verificar.md` (ordering only), `docs/log/L.md`.

Budget: ≤ 60 min.

Phase rules:
- Branch `phase/L`. Links: model ↔ type ↔ comparisons ↔ repair guides ↔ brand ↔ trámites, descriptive anchors; no nav
  links to `noindex` pages.
- Verify under all three `SITE_NOINDEX` modes; record sitemap URL counts per mode in the closing report.
- `docs/closing-report.md`: pages built per group, pending `verify` items by page, the §7 checklist, upload + Search
  Console steps (submit sitemap on day one).

Exit: verify green (3 modes); closing report committed; PR merged.

## After this phase
Disable the watcher Routine (`update_trigger enabled=false`, or `delete_trigger` if not started by it), then STOP with the
closing report. Spawn nothing.
