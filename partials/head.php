<?php
/**
 * Opens the document: <head> metadata, JSON-LD and the skip link. Every page
 * sets $page (keys in lib/seo.php) and requires this, then partials/header.php.
 *
 * meta robots comes from page_robots() — the same is_indexable() decision
 * sitemap.php uses (PLAN §2.3), so the two cannot disagree. The canonical is
 * always the clean URL, whatever query string arrived.
 */

declare(strict_types=1);

/** @var array $page */
$page = $page ?? [];
$GLOBALS['page'] = $page;          // wa_href() and the lead helpers read it

$headRobots = page_robots($page);
$headRoute  = route_for_path((string) ($page['path'] ?? ''));
$headTitle  = seo_title($page);
$headDesc   = (string) ($page['description'] ?? '');
$headGa4    = cfg('GA4_ID', '');
$headAds    = cfg('ADS_ID', '');
$headLang   = market_locale();
?>
<!doctype html>
<html lang="<?= e($headLang) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($headTitle) ?></title>
<?php if ($headDesc !== ''): ?>
<meta name="description" content="<?= e($headDesc) ?>">
<?php endif; ?>
<?php if ($headRobots !== null): ?>
<meta name="robots" content="<?= e($headRobots) ?>">
<?php endif; ?>
<?php if ($headRoute !== null): ?>
<link rel="canonical" href="<?= e(seo_canonical($page)) ?>">
<?php endif; ?>

<meta property="og:type" content="<?= e($page['ogType'] ?? 'website') ?>">
<meta property="og:site_name" content="<?= e(site('name')) ?>">
<meta property="og:locale" content="<?= e(str_replace('-', '_', $headLang)) ?>">
<meta property="og:title" content="<?= e($headTitle) ?>">
<?php if ($headDesc !== ''): ?>
<meta property="og:description" content="<?= e($headDesc) ?>">
<?php endif; ?>
<meta property="og:url" content="<?= e(seo_canonical($page)) ?>">
<meta property="og:image" content="<?= e(seo_og_image($page)) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($headTitle) ?>">
<?php if ($headDesc !== ''): ?>
<meta name="twitter:description" content="<?= e($headDesc) ?>">
<?php endif; ?>
<meta name="twitter:image" content="<?= e(seo_og_image($page)) ?>">

<meta name="theme-color" content="#0b0f14">
<link rel="icon" href="<?= e(asset('/assets/img/favicon.svg')) ?>" type="image/svg+xml">
<link rel="stylesheet" href="<?= e(asset('/assets/css/site.css')) ?>">

<?php foreach (seo_jsonld($page) as $headBlock): ?>
<script type="application/ld+json"><?= json_ld($headBlock) ?></script>
<?php endforeach; ?>

<?php if ($headGa4 !== '' || $headAds !== ''): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= e($headGa4 !== '' ? $headGa4 : $headAds) ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  <?php if ($headGa4 !== ''): ?>gtag('config', '<?= e($headGa4) ?>');<?php endif; ?>
  <?php if ($headAds !== ''): ?>gtag('config', '<?= e($headAds) ?>');<?php endif; ?>
</script>
<?php endif; ?>
<?php if (cfg('VENDERCRM_URL') !== null): ?>
<script src="<?= e(rtrim((string) cfg('VENDERCRM_URL'), '/')) ?>/vc-attribution.js" defer></script>
<?php endif; ?>
</head>
<body data-ga4="<?= e($headGa4) ?>">
<a class="skip-link" href="#main"><?= e(ui('nav.skip')) ?></a>
<?php
unset($headRobots, $headRoute, $headTitle, $headDesc, $headGa4, $headAds, $headLang, $headBlock);
