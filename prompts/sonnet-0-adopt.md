# Phase T0 — Adoptar el template. Sonnet session. Lane 1.

Read ONLY: this file, `PLAN.md` §1, §2.1, §4, §5 (table + T0), §9, and the template `README.md` "Start a new site (T0)".
Execute under the autonomy protocol §4. Build nothing outside the plan.

Owns: `content/site.php`, `content/ui.php`, `content/nav.php`, `content/pages.php`, `assets/css/site.css` (tokens + font
rules), `assets/fonts/**` (delete), `partials/head.php` (preload lines only), `terminos/**`, `privacidad/**`, the template's
example content and route dirs (delete), `README.md`, `docs/log/T0.md`.

Budget: ≤ 30 min.

Phase rules:
- Branch `phase/T0`. README steps 2–20 with the values in PLAN §5.T0. Load the `php-site-template` skill.
- Delete `servicios/`, `precios/`, `segmentos/`, `blog/`, `herramientas/` and every `'example' => true` record with
  their `pages.php`/`nav.php`/`lead-values.php` references. Keep `enviar.php` working with one `consulta` source.
- System font stack (D16); `--accent-text` AA on `--bg` and `--surface`.
- `/terminos`, `/privacidad`: placeholder copied literally from `antonmarklundcom/moto` (read-only)
  `src/app/(public)/terminos/page.tsx` and `privacidad/page.tsx`; `noindex`.
- `ui.php` all voseo (D9). Do NOT touch routing, `lib/`, `enviar.php` internals or `verify.sh` (F1).

Exit: `./verify.sh` green on repo and unzipped `deploy/make-zip.sh` output; no example content left; PR merged.

## After this phase
Follow `prompts/_handoff.md`, but spawn TWO sessions at once: `prompts/opus-1-foundation.md` (Opus) and
`prompts/opus-1b-research.md` (Opus).
