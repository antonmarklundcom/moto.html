<?php
/**
 * robots.txt (PLAN §2.4, moto SEO §3.4 adapted), served at /robots.txt by
 * .htaccess and router.php. Query-string pages are NOT blocked here: they
 * carry noindex + a clean canonical, and blocking them would hide that.
 */

declare(strict_types=1);

require __DIR__ . '/lib/bootstrap.php';

header('Content-Type: text/plain; charset=utf-8');
?>
User-agent: *
Allow: /
Disallow: /ir/
Disallow: /enviar.php
Disallow: /gracias

Sitemap: <?= url('/sitemap.xml') ?>

