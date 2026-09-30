<?php
/**
 * Pricing plans, rendered by /precios/index.php. A price is shown only when the
 * business has supplied a real figure: until then the plan lists its scope and
 * the CTA is a quotation. Never a placeholder number, never a foreign currency.
 *
 *   name      string   plan name
 *   audience  string   who it is for, one line
 *   price     ?int     price per month in whole units of the market's currency
 *                      (fmt_money() formats it), or null to hide the figure
 *   includes  string[] scope lines
 *   featured  bool     highlighted card
 */

declare(strict_types=1);

return [];
