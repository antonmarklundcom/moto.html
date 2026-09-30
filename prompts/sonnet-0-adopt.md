# Phase T0 — Adoptar el template. Sonnet session. Lane 1.

Read ONLY: this file, `PLAN.md` §1, §2.1, §4, §5 (tabla de fases y T0), §9, and the template `README.md`
"Start a new site (T0)". Do not read the rest. Execute under the autonomy protocol §4. Build nothing outside the plan.

Owns (plus the §4.9 exceptions): `content/site.php`, `content/ui.php`, `content/nav.php`, `content/pages.php`,
`assets/css/site.css` (tokens block + font rules), `assets/fonts/**` (delete), `partials/head.php` (preload lines only),
`terminos/**`, `privacidad/**`, the template's example content and route dirs (delete), `README.md`, `docs/log/T0.md`.

Budget: one session, ≤ 30 min.

Phase rules:
- Branch `phase/T0` off latest main. Follow README steps 2–20 with the values in PLAN §5.T0.
- Load the `php-site-template` skill. Market `py`. Contact values stay `null`.
- Delete `servicios/`, `precios/`, `segmentos/`, `blog/`, `herramientas/` and every `'example' => true` record,
  plus their `pages.php`/`nav.php`/`lead-values.php` references. Keep `enviar.php` working (a `contacto` source).
- System font stack only (PLAN D15). AA contrast on `--accent-text` against `--bg` and `--surface`.
- `/terminos`, `/privacidad`: copy the placeholder copy literally from `antonmarklundcom/moto`
  `src/app/(public)/terminos/page.tsx` and `privacidad/page.tsx` (read-only repo). Mark both `noindex`.
- `ui.php`: every string in Paraguayan voseo (PLAN D6). No "Contactar", no "coche/carro/móvil/conducir".
- Do NOT touch routing, `lib/`, `enviar.php` internals or `verify.sh`: that is F1.

Exit: `./verify.sh` green on the repo and on the unzipped `deploy/make-zip.sh` output; no example content left
(`grep -rn "'example' => true" content/` empty); PR merged.

## After this phase
Follow `prompts/_handoff.md`. Next: `prompts/opus-1-foundation.md`, model Opus.
