<?php
/**
 * Segment landing pages: one page per rubro (sector) or per situation, rendered
 * by templates/segment.php. One 3-line route file per slug.
 *
 * A segment page does not carry its own tier or WhatsApp message — it presets
 * the visitor into the real service that anchors its bundle ('leadSlug', an
 * existing key in content/lead-values.php's 'services'), so the lead form, the
 * WhatsApp CTA and the CRM tag all resolve through the one lead value model
 * rather than a second copy of it.
 *
 * Record shape:
 *
 *   path             string   URL, trailing slash
 *   navLabel         string   short label for the homepage rubros band
 *   seoTitle         string   <title> without the site suffix, <= 42 chars
 *   metaDescription  string   120–155 chars, unique site-wide
 *   hero             array    eyebrow, h1, lead
 *   leadSlug         string   the bundle's highest-value service slug
 *   bundle           string[] service slugs shown as the "lo que armamos" grid
 *   traps            array    [['title' => ..., 'text' => ...], ...] — the
 *                             mistakes that cost this segment money (no stats)
 *   sections         array    optional prose blocks, same shape as
 *                             content/services.php's 'sections'
 *   weNeed           string[] "qué necesitamos de usted" checklist
 *   faq              array    [['q' => ..., 'a' => ...], ...], 3–5 items
 *
 * Adding a segment: add a record here and a 3-line route file. deploy/routes.php
 * and sitemap.php already read this file, so the new page joins the route
 * contract and the sitemap by existing.
 */

declare(strict_types=1);

return [];
