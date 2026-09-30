<?php
/**
 * The service pages, keyed by slug. THIS SHAPE IS THE CONTRACT: a site fills the
 * empty keys and may add optional ones, but never renames or removes a key.
 * README.md ("Content model") documents it.
 *
 *   path             string   URL, always with a trailing slash. On a rebuild,
 *                             an existing URL is frozen for SEO — never change one.
 *   title            string   the page's own concept, used as the H1 fallback
 *   navLabel         string   short label for the mega-menu and the footer
 *   cluster          string   key into ui('clusters')
 *   parent           ?string  slug of the sub-hub this page sits under, if any
 *   seoTitle         string   <title> without the ' | <site name>' suffix,
 *                             <= 42 chars so the full title stays under 60
 *   metaDescription  string   120–155 chars, unique across the whole site
 *   hero             array    eyebrow, h1, h2, lead
 *   includes         string[] the "qué incluye" checklist
 *   excludes         string[] the "qué no incluye" checklist (optional)
 *   weNeed           string[] the "qué necesitamos de usted" checklist (optional)
 *   sections         array    [['h2' => ..., 'body' => [paragraph, ...],
 *                              'items' => [['title' => ..., 'text' => ...]]], ...]
 *   benefits         array    [['title' => ..., 'text' => ...], ...]
 *   faq              array    [['q' => ..., 'a' => ...], ...] → FAQPage JSON-LD
 *   cta              array    label (the button text)
 *   related          string[] sibling service slugs shown as cards
 *   guides           string[] guide slugs (content/guias.php)
 *   articles         string[] article slugs (content/blog.php)
 *   toolLinks        array    [['path' => ..., 'label' => ..., 'text' => ...], ...]
 *
 * Every service slug also needs a record in content/lead-values.php — verify.sh
 * fails the build when one is missing, because a service page whose form is not
 * in the lead value model quietly sends untagged leads.
 */

declare(strict_types=1);

/* The single lead source T0 keeps (PLAN D11, `consulta`): it lets verify.sh's
   lead-routing fixtures and enviar.php resolve a slug while the catalogue has
   no model pages yet. It has no page of its own — its path is /contacto/ — and
   F1 replaces this record when the model/brand content shapes land. */
return [
    'consulta' => [
        'path'            => '/contacto/',
        'title'           => 'Consulta sobre motos',
        'navLabel'        => 'Consulta sobre motos',
        'cluster'         => 'motos',
        'parent'          => null,
        'seoTitle'        => 'Consulta sobre motos',
        'metaDescription' => 'Escribinos por WhatsApp o dejanos tus datos y te respondemos dentro del '
                           . 'siguiente día hábil.',
        'hero'            => ['eyebrow' => 'Contacto', 'h1' => 'Consulta sobre motos', 'h2' => '', 'lead' => ''],
        'includes'        => [],
        'sections'        => [],
        'benefits'        => [],
        'faq'             => [],
        'cta'             => ['label' => 'Enviar consulta', 'whatsappText' => ''],
        'related'         => [],
        'guides'          => [],
        'articles'        => [],
        'toolLinks'       => [],
    ],
];
