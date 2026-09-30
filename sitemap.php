<?php
/**
 * sitemap.xml (PLAN §2.4), served at /sitemap.xml by .htaccess and router.php.
 *
 * Exactly the paths is_indexable() accepts — the same decision partials/head.php
 * uses for meta robots — so a noindex page can never be listed. lastmod is the
 * content's own `updated` date, omitted when there is none (never today's
 * date). No priority, no changefreq.
 */

declare(strict_types=1);

require __DIR__ . '/lib/bootstrap.php';

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', "\n";
foreach (sitemap_paths() as $smPath) {
    $smLastmod = route_lastmod($smPath);
    echo '  <url><loc>', e(url($smPath)), '</loc>',
        $smLastmod !== null ? '<lastmod>' . e($smLastmod) . '</lastmod>' : '',
        "</url>\n";
}
echo "</urlset>\n";
