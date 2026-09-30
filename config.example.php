<?php
/**
 * Configuration defaults. On the server, copy to config.php and fill in:
 *
 *     cp config.example.php config.php
 *
 * config.php is gitignored and never committed; a Hostinger Git pull never
 * touches it (PLAN D19). Every value is optional: the site renders and the
 * lead form still accepts submissions when they are empty. A value missing
 * from config.php is read from the process environment, then from here.
 */

declare(strict_types=1);

return [
    // Absolute origin, no trailing slash: 'https://moto.com.py'. Used for
    // canonical URLs, Open Graph and the sitemap. Falls back to the request host.
    'SITE_URL' => '',

    // Indexing (PLAN D12, ADR-26). Only the owner changes it.
    //   'true'    — or empty, or anything unknown: every page noindex, empty sitemap
    //   'content' — static pages and guides indexable; everything else noindex
    //   'false'   — the per-page gate decides (lib/indexing.php)
    // The owner decided to LAUNCH WITH 'false' (2026-09-30: "never block traffic
    // for pages I wanna rank"): set 'SITE_NOINDEX' => 'false' in config.php on the
    // server. It stays empty here so a server without config.php fails closed.
    'SITE_NOINDEX' => '',

    // VenderCRM (Sitios → moto.com.py; a key for this site only). Without both
    // values leads stay in logs/leads.jsonl and the visitor still gets the
    // thank-you (degraded mode, enviar.php).
    'VENDERCRM_URL'     => '',
    'VENDERCRM_API_KEY' => '',

    // Optional lead notification email through Resend. LEAD_FROM must be on a
    // domain verified in Resend (SPF + DKIM in the DNS).
    'RESEND_API_KEY' => '',
    'LEAD_NOTIFY_TO' => '',                       // e.g. 'hola@moto.com.py'
    'LEAD_FROM'      => '',                       // e.g. 'moto.com.py <no-reply@moto.com.py>'

    // Analytics. assets/js/analytics.js is a no-op until GA4_ID is set.
    'GA4_ID' => '',
    'ADS_ID' => '',
];
