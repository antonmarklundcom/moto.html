<?php
/**
 * Article index. The body of each article lives in its own
 * /blog/<slug>/index.php, rendered through templates/article.php; this file is
 * the index that the blog listing, the sitemap and the route contract read.
 *
 *   slug         string   directory name under /blog/
 *   title        string   H1 and card title — may run longer than the <title>
 *   seoTitle     string   <title>, <= 41 chars so it fits the 60-char budget
 *                         with the ' | <site name>' suffix; '' falls back to title
 *   description  string   meta description, 120–155 chars, unique site-wide
 *   date         string   YYYY-MM-DD, publication date
 *   updated      ?string  YYYY-MM-DD, when meaningfully revised
 *   tags         string[] free-form
 *   service      ?string  slug of the service this article links to — it also
 *                         decides the article's WhatsApp prefill and tier
 */

declare(strict_types=1);

return [];
