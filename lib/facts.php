<?php
/**
 * Sourced facts (PLAN D5, D6, D14).
 *
 * A HECHO CON FUENTE is
 *     ['value' => …, 'source' => ['label' => …, 'url' => 'https://…'], 'accessed' => 'YYYY-MM-DD']
 * plus optional keys: 'unit' (appended to a numeric value), 'note' (shown
 * after the value), and for prices 'condition' ('0km') and 'version'.
 * `source` may also be the list form ['label', 'url'].
 *
 * A BLOQUE SIN FUENTE is ['verify' => 'qué confirmar y dónde']. It can stand
 * wherever a fact, a paragraph, a list item, a section or a FAQ entry can; the
 * renderer omits it and verify.sh lists it in docs/verificar.md.
 *
 * Anything that is neither is treated as missing: never rendered as a fact.
 */

declare(strict_types=1);

/** Units for spec keys whose value the catalogue stores as a bare number. */
const SPEC_UNITS = ['cc' => 'cc'];

/** Days a published price stays visible after it was consulted (D6). */
const PRICE_MAX_AGE_DAYS = 120;

/**
 * Today as YYYY-MM-DD. APP_TODAY overrides it so tests can age a price.
 */
function today(): string
{
    $override = getenv('APP_TODAY');

    return is_string($override) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $override)
        ? $override
        : gmdate('Y-m-d');
}

/**
 * True for a ['verify' => …] block.
 */
function is_verify(mixed $item): bool
{
    return is_array($item) && array_key_exists('verify', $item);
}

/**
 * A list with every verify block removed, re-indexed.
 */
function visible(array $items): array
{
    return array_values(array_filter($items, static fn ($item) => !is_verify($item)));
}

/**
 * ['label' => …, 'url' => …] from either accepted form, or null.
 */
function fact_source(mixed $source): ?array
{
    if (!is_array($source)) {
        return null;
    }
    $label = $source['label'] ?? $source[0] ?? '';
    $url   = $source['url'] ?? $source[1] ?? '';

    if (!is_string($label) || trim($label) === '' || !is_string($url) || !preg_match('#^https?://\S+$#', $url)) {
        return null;
    }

    return ['label' => trim($label), 'url' => $url];
}

/**
 * A valid date (YYYY-MM-DD) that is not in the future.
 */
function fact_date_ok(mixed $date): bool
{
    if (!is_string($date)) {
        return false;
    }
    $d = DateTimeImmutable::createFromFormat('!Y-m-d', $date);

    return $d !== false && $d->format('Y-m-d') === $date && $date <= today();
}

/**
 * True when $fact is a complete hecho con fuente.
 */
function fact_ok(mixed $fact): bool
{
    if (!is_array($fact) || is_verify($fact)) {
        return false;
    }
    $value = $fact['value'] ?? null;
    if ($value === null || $value === '' || is_array($value)) {
        return false;
    }

    return fact_source($fact['source'] ?? null) !== null && fact_date_ok($fact['accessed'] ?? null);
}

/**
 * Whole days between the consultation and today.
 */
function fact_age_days(array $fact, ?string $today = null): ?int
{
    $from = DateTimeImmutable::createFromFormat('!Y-m-d', (string) ($fact['accessed'] ?? ''));
    $to   = DateTimeImmutable::createFromFormat('!Y-m-d', $today ?? today());
    if ($from === false || $to === false) {
        return null;
    }

    return (int) $from->diff($to)->format('%r%a');
}

/**
 * A price may be shown only while it is a complete fact consulted at most
 * PRICE_MAX_AGE_DAYS ago (D6). An older one hides itself until someone
 * re-verifies it and updates `accessed`.
 */
function price_is_current(mixed $fact, ?string $today = null): bool
{
    if (!is_array($fact) || !is_numeric($fact['value'] ?? null) || (int) $fact['value'] <= 0
        || !in_array(strtoupper((string) ($fact['currency'] ?? 'PYG')), ['PYG', 'USD'], true)) {
        return false;
    }
    $age = fact_age_days($fact, $today);
    if ($age === null || $age < 0 || $age > PRICE_MAX_AGE_DAYS) {
        return false;
    }
    $source = fact_source($fact['source'] ?? null);

    return $source !== null;
}

/**
 * The display text of a fact's value: numbers get the market's thousands
 * separator and the optional unit; strings are shown as written.
 */
function fact_value_text(array $fact, ?string $specKey = null): string
{
    $value = $fact['value'];
    if (!isset($fact['unit']) && $specKey !== null && (is_int($value) || is_float($value))) {
        $fact['unit'] = SPEC_UNITS[$specKey] ?? null;          // R1 stores cc as a bare int
    }
    if (is_int($value) || is_float($value)) {
        $text = number_format((float) $value, is_float($value) && floor($value) != $value ? 1 : 0, ',', '.');
    } else {
        $text = (string) $value;
    }
    if (!empty($fact['unit'])) {
        $text .= ' ' . $fact['unit'];
    }

    return $text;
}

/**
 * The visible label of a spec key: content/ui.php 'specs' first, then the key
 * itself made readable. A spec key R1 invents renders sensibly with no edit.
 */
function spec_label(string $key): string
{
    $label = ui('specs.' . $key);

    return $label !== '' ? $label : ucfirst(str_replace('_', ' ', $key));
}

/**
 * A price as text in its own currency: "Gs. 12.500.000" (fmt_money, D9) or
 * "US$ 3.990" for the few distributors that publish in dollars.
 */
function price_text(array $fact): string
{
    $currency = strtoupper((string) ($fact['currency'] ?? 'PYG'));

    return $currency === 'USD'
        ? 'US$ ' . number_format((float) $fact['value'], 0, ',', '.')
        : fmt_money((int) $fact['value']);
}

/**
 * Render one fact through partials/fact.php and return the HTML. '' when the
 * fact is incomplete (or an expired price): a missing fact shows nothing.
 *
 *   $kind     'spec' (value + source + date) or 'price' (D6 wording)
 *   $specKey  the catalogue spec key, for a unit a bare number lacks (cc)
 */
function fact_html(mixed $fact, string $kind = 'spec', ?string $specKey = null): string
{
    if ($kind === 'price' ? !price_is_current($fact) : !fact_ok($fact)) {
        return '';
    }

    ob_start();
    $factItem = $fact;
    $factKind = $kind;
    $factSpec = $specKey;
    require ROOT_DIR . '/partials/fact.php';

    return (string) ob_get_clean();
}
