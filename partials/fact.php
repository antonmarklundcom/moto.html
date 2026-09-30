<?php
/**
 * One sourced fact: the value, who published it and when we consulted it
 * (PLAN D5, D6). Called through fact_html() in lib/facts.php, which has
 * already checked the fact is complete — and, for a price, that it was
 * consulted at most 120 days ago; an expired price never reaches this file.
 *
 *   $factItem  array   a hecho con fuente (lib/facts.php)
 *   $factKind  string  'spec' | 'price'
 *   $factSpec  ?string the spec key (a unit for a bare number)
 *
 * Every figure in guaraníes on the site renders inside a [data-fact] element;
 * verify.sh fails on a "Gs." anywhere else.
 */

declare(strict_types=1);

$factSource = fact_source($factItem['source']);
$factDate   = fmt_date_short((string) $factItem['accessed']);
?>
<?php if ($factKind === 'price'): ?>
<span class="fact fact--price" data-fact="price">
  <strong class="fact__value"><?= e(price_text($factItem)) ?></strong><?php if (!empty($factItem['version'])): ?> <span class="fact__note">(<?= e((string) $factItem['version']) ?>)</span><?php endif; ?>
  <span class="fact__src"><?= e(ui('facts.price_by')) ?> <a href="<?= e($factSource['url']) ?>" rel="nofollow noopener"><?= e($factSource['label']) ?></a> — <?= e(ui('facts.accessed')) ?> <?= e($factDate) ?></span>
</span>
<?php else: ?>
<span class="fact" data-fact="spec">
  <span class="fact__value"><?= e(fact_value_text($factItem, $factSpec ?? null)) ?></span><?php if (!empty($factItem['note'])): ?> <span class="fact__note">(<?= e((string) $factItem['note']) ?>)</span><?php endif; ?>
  <span class="fact__src">(<a href="<?= e($factSource['url']) ?>" rel="nofollow noopener"><?= e($factSource['label']) ?></a>, <?= e(ui('facts.accessed')) ?> <?= e($factDate) ?>)</span>
</span>
<?php endif; ?>
<?php
unset($factSource, $factDate, $factSpec);
