<?php
/**
 * The lead value model. ONE record per source — every service slug, every tool
 * slug, every "¿qué necesita?" chip — plus the neutral default for pages that
 * are none of those.
 *
 * Nothing else on the site decides a tier, a conversion value or a WhatsApp
 * prefill: pages read this through lib/helpers.php's lead_value() and
 * whatsapp_text_for_page(), so retuning the model after a few weeks of GA4 data
 * is one edit here and no page changes.
 *
 * Record shape (every key required unless noted):
 *
 *   menuLabel     string   the short human name this source goes by in the
 *                          WhatsApp menu and in the CRM's `servicio` field. Page
 *                          titles are often frozen for SEO and too terse to read
 *                          as a menu option, which is why this exists
 *   need          string   key into ui('needs') — the chip this source maps to,
 *                          or a key in 'needLabels' below for sources with no
 *                          chip of their own
 *   tier          string   'A' | 'B' | 'C' — how much this source is worth
 *   whatsappText  string   the wa.me prefill. Names the service the visitor was
 *                          reading about — never a generic "consulta gratis"
 *   nextStep      string[] 2–3 lines shown after submit: what to have ready.
 *                          This is the second touch; it is worth reading
 *   crmTag        string   lands on the VenderCRM timeline as fields.etiqueta —
 *                          see the note on tags in enviar.php
 *   nextLink      ?array   optional ['path' => ..., 'label' => ...] tool or guide
 *                          offered alongside the thank-you text. The path must
 *                          resolve to a real route file; verify.sh checks it
 *
 * Adding a source: add a record keyed by its slug. Pages resolve by slug, so a
 * new guide or segment page joins the model by adding a key here.
 */

declare(strict_types=1);

/* The Google Ads conversion value per tier, in whole units of the market's
   currency (content/site.php 'market'). These are OPTIMISATION PROXIES, not
   revenue estimates: they exist so smart bidding favours a retainer lead over a
   calculator lead by roughly 10:1. Retune the ratio here, and re-scale the
   numbers when the site's market — and therefore its currency — changes. */
$tierValues = [
    'A' => 50000,
    'B' => 20000,
    'C' => 5000,
];

/* Labels for `need` keys that are not one of the form chips, so the CRM reads a
   sentence instead of a raw key. */
$needLabels = [
];

return [

    'tierValues' => $tierValues,
    'needLabels' => $needLabels,

    /* Which services the WhatsApp menu offers, in order, after the current
       page's own service. Keep it short: four is plenty. */
    'whatsappMenu' => ['consulta'],

    /* The record for a page that names no service: an article without one, a
       legal page, the homepage. Never null — every form resolves to something. */
    'default' => [
        'menuLabel'    => 'Consulta sobre motos',
        'need'         => 'consulta',
        'tier'         => 'C',
        'whatsappText' => 'Hola, quiero consultar por una moto.',
        'nextStep'     => [
            'Te respondemos dentro del siguiente día hábil.',
            'Tené a mano el modelo que te interesa, si ya lo elegiste.',
        ],
        'crmTag'       => 'consulta-general',
        'nextLink'     => null,
    ],

    /* One record per key in content/services.php. */
    'services' => [
        'consulta' => [
            'menuLabel'    => 'Consulta sobre motos',
            'need'         => 'consulta',
            'tier'         => 'B',
            'whatsappText' => 'Hola, quiero consultar por una moto.',
            'nextStep'     => [
                'Te respondemos dentro del siguiente día hábil.',
                'Tené a mano el modelo que te interesa, si ya lo elegiste.',
            ],
            'crmTag'       => 'consulta',
            'nextLink'     => null,
        ],
    ],

    /* One record per key in content/tools.php. This site has none. */
    'tools' => [],

    /* One record per chip in content/ui.php 'needs'. A lead from a page with no
       service of its own takes the tier of the chip the visitor picked. The
       single lead source for now is `consulta` (PLAN D11). */
    'needs' => [
        'consulta' => ['tier' => 'B', 'crmTag' => 'consulta', 'service' => 'consulta'],
        'otro'     => ['tier' => 'C', 'crmTag' => 'consulta-general', 'service' => null],
    ],
];
