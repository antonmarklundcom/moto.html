<?php
/**
 * The lead model (PLAN D11). ONE record per lead source, plus the neutral
 * default. enviar.php, /gracias, the forms and every WhatsApp CTA read it
 * through lib/leads.php; nothing else decides a lead's type, tier or copy.
 *
 *   sources[slug]   a lead source. A page names its source with 'leadSlug'
 *                   (content/pages.php or the template's $page), a form with
 *                   $formSource. Record keys:
 *     leadType      'consulta' | 'comercial' — sent as fields.tipo_lead and part
 *                   of the idempotency key. Resolved SERVER-SIDE from the slug:
 *                   a posted type is never read
 *     menuLabel     short name in the WhatsApp menu and in fields.origen
 *     need          chip key in content/ui.php 'needs'
 *     tier          'A' | 'B' | 'C' — the Ads bidding proxy (tierValues)
 *     whatsappText  the WhatsApp prefill (a model page overrides it with the
 *                   model's own text)
 *     nextStep      string[] shown after submit, on the form and on /gracias
 *     nextLink      ?['path' => …, 'label' => …]
 *   needs[chip]     ['tier' => …, 'source' => slug|null] for each form chip
 *   whatsappMenu    source slugs offered in the WhatsApp menu after the page's own
 *
 * Never a tag, pipeline, stage or owner (D11): routing lives in the CRM.
 * Phases add sources at the end of 'sources'.
 */

declare(strict_types=1);

return [

    /* Ads conversion value per tier, in guaraníes. Bidding proxies, not revenue. */
    'tierValues' => [
        'A' => 50000,
        'B' => 20000,
        'C' => 5000,
    ],

    'needLabels' => [],

    'whatsappMenu' => ['consulta'],

    'default' => [
        'leadType'     => 'consulta',
        'menuLabel'    => 'Consulta sobre motos',
        'need'         => 'consulta',
        'tier'         => 'C',
        'whatsappText' => 'Hola, quiero consultar por una moto.',
        'nextStep'     => [
            'Te respondemos dentro del siguiente día hábil.',
            'Tené a mano el modelo que te interesa, si ya lo elegiste.',
        ],
        'nextLink'     => null,
    ],

    'sources' => [
        'consulta' => [
            'leadType'     => 'consulta',
            'menuLabel'    => 'Consulta sobre motos',
            'need'         => 'consulta',
            'tier'         => 'B',
            'whatsappText' => 'Hola, quiero consultar por una moto.',
            'nextStep'     => [
                'Te respondemos dentro del siguiente día hábil.',
                'Tené a mano el modelo que te interesa, si ya lo elegiste.',
            ],
            'nextLink'     => null,
        ],
        'comercial' => [
            'leadType'     => 'comercial',
            'menuLabel'    => 'Marcas y comercios',
            'need'         => 'otro',
            'tier'         => 'A',
            'whatsappText' => 'Hola, les escribo por una marca o un comercio de motos.',
            'nextStep'     => [
                'Te respondemos dentro del siguiente día hábil.',
                'Si podés, contanos qué marca o comercio representás.',
            ],
            'nextLink'     => null,
        ],
    ],

    'needs' => [
        'consulta' => ['tier' => 'B', 'source' => 'consulta'],
        'otro'     => ['tier' => 'C', 'source' => null],
    ],
];
