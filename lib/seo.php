<?php
/**
 * Head metadata and JSON-LD (PLAN §2.4). partials/head.php renders whatever
 * these return; pages only populate the $page array.
 *
 * $page keys (all optional except title and path):
 *   title         string  page title; the ' | moto.com.py' suffix is added only
 *                         while the whole <title> stays <= 60 characters
 *   description   string  meta description, 120–160 characters, unique site-wide
 *   path          string  '/motos/honda' — canonical path, NO trailing slash (D3)
 *   ogImage       string  path or absolute URL; defaults to the site OG image
 *   ogType        string  'website' (default) or 'article'
 *   noindex       bool    force noindex (the gate decides everything else)
 *   breadcrumbs   array   [['label' => …, 'path' => …], …] without Inicio →
 *                         visible trail AND BreadcrumbList
 *   faq           array   visible_faq() output → FAQPage (only real, visible FAQ)
 *   article       array   ['headline','datePublished','dateModified'] → Article
 *   leadSlug      string  the lead source (content/lead-values.php)
 *   whatsappText  string  the WhatsApp prefill naming what the page is about
 *
 * Never emitted, anywhere (D5; verify.sh fails on them): AggregateRating,
 * Review, ratingValue, Product/Offer, priceValidUntil. We sell nothing and have
 * no reviews.
 */

declare(strict_types=1);

const TITLE_MAX = 60;

/**
 * The full <title>: the page's title plus ' | <site name>' when that still
 * fits in TITLE_MAX characters.
 */
function seo_title(array $page): string
{
    $title = trim((string) ($page['title'] ?? ''));
    $name  = trim((string) (site('name') ?? ''));

    if ($title === '') {
        return $name;
    }
    if ($name === '' || str_contains($title, $name)) {
        return $title;
    }
    $full = $title . ' | ' . $name;

    return mb_strlen($full) <= TITLE_MAX ? $full : $title;
}

/**
 * Canonical URL: always the clean URL, whatever query string arrived.
 */
function seo_canonical(array $page): string
{
    return url((string) ($page['path'] ?? '/'));
}

/**
 * Absolute URL of the social preview image.
 */
function seo_og_image(array $page): string
{
    $image = $page['ogImage'] ?? '/assets/img/og-default.png';

    return str_starts_with($image, 'http') ? $image : site_origin() . $image;
}

/**
 * Encode a JSON-LD block for a <script> tag; `<` is escaped so the payload can
 * never close the script element.
 */
function json_ld(array $data): string
{
    return (string) json_encode(
        $data,
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_PRETTY_PRINT
    );
}

/**
 * The organisation, from content/site.php. Unsupplied fields are omitted.
 */
function jsonld_organization(): array
{
    $types = array_values(array_filter((array) site('schemaType')));

    $data = [
        '@context' => 'https://schema.org',
        '@type'    => $types !== [] ? $types : ['Organization'],
        '@id'      => url('/') . '#organization',
        'name'     => (string) site('name'),
        'url'      => url('/'),
        'logo'     => site_origin() . '/assets/img/favicon.svg',
    ];

    if (site('description')) {
        $data['description'] = site('description');
    }
    if (site('email')) {
        $data['email'] = site('email');
    }
    if (site('phone')) {
        $data['telephone'] = site('phone');
    }
    $socials = array_values(array_filter((array) site('socials')));
    if ($socials !== []) {
        $data['sameAs'] = $socials;
    }

    return $data;
}

/**
 * The site itself. No SearchAction: the site has no search.
 */
function jsonld_website(): array
{
    return [
        '@context'   => 'https://schema.org',
        '@type'      => 'WebSite',
        '@id'        => url('/') . '#website',
        'name'       => (string) site('name'),
        'url'        => url('/'),
        'inLanguage' => market_locale(),
        'publisher'  => ['@id' => url('/') . '#organization'],
    ];
}

/**
 * BreadcrumbList, rooted at the home page. null without crumbs.
 */
function jsonld_breadcrumbs(array $crumbs): ?array
{
    if ($crumbs === []) {
        return null;
    }

    $items = [];
    $all   = array_merge([['label' => ui('nav.home', 'Inicio'), 'path' => '/']], $crumbs);
    foreach ($all as $i => $crumb) {
        $items[] = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $crumb['label'],
            'item'     => url($crumb['path']),
        ];
    }

    return ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $items];
}

/**
 * FAQPage from visible_faq() output — only questions the page shows.
 */
function jsonld_faq(array $faq): ?array
{
    $items = [];
    foreach (visible_faq($faq) as $entry) {
        $items[] = [
            '@type'          => 'Question',
            'name'           => $entry['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags(inline($entry['a']))],
        ];
    }

    return $items === [] ? null : ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $items];
}

/**
 * Article, for guides and comparisons.
 */
function jsonld_article(array $article, array $page): ?array
{
    if ($article === []) {
        return null;
    }

    $data = [
        '@context'         => 'https://schema.org',
        '@type'            => 'Article',
        'headline'         => mb_substr((string) ($article['headline'] ?? $page['title'] ?? ''), 0, 110),
        'mainEntityOfPage' => seo_canonical($page),
        'author'           => ['@type' => 'Organization', 'name' => (string) site('name'), 'url' => url('/')],
        'publisher'        => ['@id' => url('/') . '#organization'],
        'image'            => seo_og_image($page),
        'inLanguage'       => market_locale(),
    ];
    foreach (['datePublished', 'dateModified', 'description'] as $key) {
        if (!empty($article[$key])) {
            $data[$key] = $article[$key];
        }
    }

    return $data;
}

/**
 * Every JSON-LD block the page emits, in order.
 */
function seo_jsonld(array $page): array
{
    $blocks = [jsonld_organization(), jsonld_website()];

    foreach ([
        jsonld_breadcrumbs($page['breadcrumbs'] ?? []),
        jsonld_faq($page['faq'] ?? []),
        jsonld_article($page['article'] ?? [], $page),
    ] as $block) {
        if ($block !== null) {
            $blocks[] = $block;
        }
    }

    return $blocks;
}

/**
 * A description of 120–160 characters from a preferred text and a fallback
 * built from the record: the preferred one if it fits, else the fallback cut
 * at a word boundary. Templates use it so a record without its own
 * description still gets a unique, well-sized one.
 */
function seo_description(?string $preferred, string $fallback): string
{
    $preferred = trim((string) $preferred);
    if ($preferred !== '' && mb_strlen($preferred) >= 120 && mb_strlen($preferred) <= 160) {
        return $preferred;
    }
    $text = $preferred !== '' ? $preferred : $fallback;
    if (mb_strlen($text) > 160) {
        $cut  = mb_substr($text, 0, 157);
        $text = rtrim(mb_substr($cut, 0, (int) mb_strrpos($cut, ' ')), ' ,;:.') . '…';
    }

    return $text;
}
