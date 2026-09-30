<?php
/**
 * The lead model (PLAN D11). content/lead-values.php is the single source for
 * a lead's type, tier, WhatsApp prefill and thank-you text; enviar.php,
 * /gracias, the forms and the WhatsApp CTAs all read it through here.
 *
 * Two lead types reach VenderCRM, as fields.tipo_lead:
 *   consulta   interest in a model or in buying (optionally "en cuotas", as a
 *              data point — never a promise, D8)
 *   comercial  brands, dealers and lenders (/para-marcas-y-comercios)
 */

declare(strict_types=1);

const LEAD_TYPES = ['consulta', 'comercial'];

/**
 * One resolved lead-value record for a source slug, or the neutral default
 * (slug null) when the slug is unknown or null.
 */
function lead_value(?string $slug = null): array
{
    $model  = content('lead-values');
    $record = $model['sources'][$slug ?? ''] ?? null;

    if (!is_array($record)) {
        return $model['default'] + ['slug' => null];
    }

    return $record + ['slug' => $slug];
}

/**
 * The record for a form chip ("¿Qué necesitás?"): a lead from a page with no
 * source of its own takes the chip's tier and borrows its source's copy.
 */
function lead_value_for_need(string $need): array
{
    $model = content('lead-values');
    $chip  = $model['needs'][$need] ?? null;

    if (!is_array($chip)) {
        return lead_value(null);
    }

    $record = lead_value($chip['source'] ?? null);

    return ['tier' => $chip['tier'], 'need' => $need] + $record;
}

/**
 * The lead type of a source slug, always one of LEAD_TYPES. Decided here,
 * server-side; nothing a visitor posts can change it.
 */
function lead_type_for(?string $slug): string
{
    $type = (string) (lead_value($slug)['leadType'] ?? 'consulta');

    return in_array($type, LEAD_TYPES, true) ? $type : 'consulta';
}

/**
 * The Google Ads conversion value for a tier, in guaraníes. A bidding proxy,
 * not a revenue estimate.
 */
function lead_tier_value(string $tier): int
{
    return (int) (content('lead-values')['tierValues'][$tier] ?? 0);
}

/**
 * The human label for a `need` key.
 */
function lead_need_label(string $need): string
{
    return ui('needs.' . $need) ?: (string) (content('lead-values')['needLabels'][$need] ?? $need);
}

/**
 * The short name a source goes by in the WhatsApp menu and the CRM.
 */
function lead_label(string $slug): string
{
    return (string) (lead_value($slug)['menuLabel'] ?? $slug);
}

/**
 * The lead source of the page being rendered: $page['leadSlug'], else its
 * content/pages.php record's 'leadSlug', else null (the neutral default).
 */
function current_lead_slug(?array $page = null): ?string
{
    $page = $page ?? ($GLOBALS['page'] ?? []);

    if (!empty($page['leadSlug'])) {
        return (string) $page['leadSlug'];
    }
    $meta = page_meta((string) ($page['path'] ?? ''));

    return !empty($meta['leadSlug']) ? (string) $meta['leadSlug'] : null;
}

/**
 * The WhatsApp prefill for the page being rendered. A page that is about one
 * thing (a model, a guide) sets $page['whatsappText'] naming it; otherwise its
 * lead source's text.
 */
function whatsapp_text_for_page(?array $page = null): string
{
    $page = $page ?? ($GLOBALS['page'] ?? []);

    if (!empty($page['whatsappText'])) {
        return (string) $page['whatsappText'];
    }

    return (string) lead_value(current_lead_slug($page))['whatsappText'];
}

/**
 * The WhatsApp menu options: this page first, then content/lead-values.php
 * 'whatsappMenu', then "otra consulta". Each: slug, label, text, link, current.
 * Links are wa_href() redirects; empty when no number is configured.
 */
function whatsapp_menu(?array $page = null): array
{
    $page  = $page ?? ($GLOBALS['page'] ?? []);
    $model = content('lead-values');

    $options = [[
        'slug'    => (string) current_lead_slug($page),
        'label'   => ui('whatsapp.this_page'),
        'text'    => whatsapp_text_for_page($page),
        'current' => true,
    ]];
    foreach ((array) $model['whatsappMenu'] as $slug) {
        $record = lead_value($slug);
        if ($record['slug'] === null || $record['whatsappText'] === $options[0]['text']) {
            continue;
        }
        $options[] = ['slug' => $slug, 'label' => lead_label($slug), 'text' => $record['whatsappText'], 'current' => false];
    }
    $options[] = [
        'slug'    => '',
        'label'   => ui('whatsapp.other'),
        'text'    => $model['default']['whatsappText'],
        'current' => false,
    ];

    $seen = [];
    $out  = [];
    foreach ($options as $option) {
        if (isset($seen[$option['text']])) {
            continue;
        }
        $seen[$option['text']] = true;
        $option['link'] = wa_href($option['text'], (string) ($page['path'] ?? '/'));
        $out[] = $option;
    }

    return $out;
}

/**
 * The lead's idempotency key (ADR-25):
 *     sha256(phone_e164 + "|" + type + "|" + YYYY-MM-DD-HH), hour in UTC.
 * A double click or a retry within the hour replays the same lead; the same
 * person asking again tomorrow, or asking something of another type, is a
 * new lead.
 */
function lead_idempotency_key(string $phoneE164, string $type, ?DateTimeImmutable $at = null): string
{
    if (!preg_match('/^\+\d{8,15}$/', $phoneE164)) {
        throw new InvalidArgumentException("lead_idempotency_key: not E.164: {$phoneE164}");
    }
    $at = ($at ?? new DateTimeImmutable('now'))->setTimezone(new DateTimeZone('UTC'));

    return hash('sha256', $phoneE164 . '|' . $type . '|' . $at->format('Y-m-d-H'));
}
