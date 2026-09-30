<?php
/**
 * Escaping, URL and formatting helpers. Every value that reaches the page goes
 * through e() — or through inline(), which escapes first.
 */

declare(strict_types=1);

/**
 * Escape for HTML text and attribute context.
 */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * The site origin without a trailing slash. Falls back to the current request
 * host so local preview and a staging subdomain work with no config.php.
 */
function site_origin(): string
{
    $configured = cfg('SITE_URL');
    if ($configured !== null) {
        return rtrim($configured, '/');
    }

    $https = ($_SERVER['HTTPS'] ?? '') === 'on' || ($_SERVER['SERVER_PORT'] ?? '') === '443';
    $host  = $_SERVER['HTTP_HOST'] ?? (string) site('domain');

    return ($https ? 'https://' : 'http://') . $host;
}

/**
 * Normalise a site path: leading slash, no trailing slash (PLAN D3), no query.
 */
function clean_path(string $path): string
{
    $path = (string) parse_url($path, PHP_URL_PATH);
    $path = '/' . trim($path, '/');

    return $path;
}

/**
 * Absolute URL for a site path. Used for canonical, OG and the sitemap;
 * in-page links use the bare path.
 */
function url(string $path = '/'): string
{
    $path = clean_path($path);

    return site_origin() . ($path === '/' ? '/' : $path);
}

/**
 * Asset path with a cache-busting stamp taken from the file's mtime.
 */
function asset(string $path): string
{
    $path = '/' . ltrim($path, '/');
    $file = ROOT_DIR . $path;

    return is_file($file) ? $path . '?v=' . filemtime($file) : $path;
}

/**
 * Business facts from content/site.php. A value the owner has not supplied yet
 * is null, and every partial hides rather than inventing one.
 */
function site(?string $key = null)
{
    $site = content('site');

    return $key === null ? $site : ($site[$key] ?? null);
}

/**
 * A UI string from content/ui.php. Dot notation reaches into nested groups.
 */
function ui(string $key, string $default = ''): string
{
    $value = content('ui');
    foreach (explode('.', $key) as $segment) {
        if (!is_array($value) || !array_key_exists($segment, $value)) {
            return $default;
        }
        $value = $value[$segment];
    }

    return is_string($value) ? $value : $default;
}

/**
 * A static page record from content/pages.php, keyed by path.
 */
function page_meta(string $path): array
{
    return content('pages')[clean_path($path)] ?? content('pages')[$path] ?? [];
}

/**
 * The header/footer link trees from content/nav.php.
 */
function nav(?string $key = null)
{
    $nav = content('nav');

    return $key === null ? $nav : ($nav[$key] ?? []);
}

/**
 * True when $path is the page currently being rendered (aria-current).
 */
function is_current(string $path, string $currentPath): bool
{
    return clean_path($path) === clean_path($currentPath);
}

/**
 * A date as d/m/aaaa (PLAN D6: "consultado el 30/9/2026").
 */
function fmt_date_short(string $isoDate): string
{
    $d = DateTimeImmutable::createFromFormat('!Y-m-d', $isoDate);

    return $d === false ? $isoDate : $d->format('j/n/Y');
}

/**
 * Inline text: escaped, then two pieces of markup and nothing else —
 * [texto](/ruta) or [texto](https://…) for links, **texto** for emphasis.
 * Content files keep prose readable and ported guides keep their links.
 * An internal link to a page that does not exist (yet) renders as its text:
 * see link_live().
 *
 * A stray "[VERIFICAR…]" marker is cut out, never printed (D14): the content
 * should carry it as a ['verify' => …] block, and this is the safety net.
 */
function inline(string $text): string
{
    $text = preg_replace('/\s*\[VERIFICAR[^\]]*\]/iu', '', $text) ?? $text;
    $html = e($text);

    $html = preg_replace_callback(
        '/\[([^\]]+)\]\(((?:\/|https?:\/\/)[^)\s]*)\)/u',
        static function (array $m): string {
            $href     = html_entity_decode($m[2], ENT_QUOTES, 'UTF-8');
            $external = str_starts_with($href, 'http');
            if (!$external) {
                $parts = explode('#', $href, 2);
                if (!link_live($parts[0])) {
                    return $m[1];               // not built yet: text now, a link later
                }
                $href = clean_path($parts[0]) . (isset($parts[1]) ? '#' . $parts[1] : '');
            }

            return '<a href="' . e($href) . '"' . ($external ? ' rel="noopener"' : '') . '>' . $m[1] . '</a>';
        },
        $html
    ) ?? $html;

    return preg_replace('/\*\*(.+?)\*\*/u', '<strong>$1</strong>', $html) ?? $html;
}

/* ---------------------------------------------------------------- phones --- */

/**
 * Digits only.
 */
function phone_digits(?string $phone): string
{
    return preg_replace('/\D+/', '', (string) $phone) ?? '';
}

/**
 * A Paraguayan phone in E.164 (+595…), or null when it cannot be one (D9,
 * D11). Accepts what people type: 0981 123 456, 981123456, +595 981 123456,
 * 595981123456, 021 123 456.
 */
function phone_e164(?string $phone): ?string
{
    $raw    = trim((string) $phone);
    $digits = phone_digits($raw);

    if (str_starts_with($raw, '+') && !str_starts_with($digits, '595')) {
        return strlen($digits) >= 8 && strlen($digits) <= 15 ? '+' . $digits : null;   // foreign number
    }
    if (str_starts_with($digits, '00595')) {
        $digits = substr($digits, 2);
    }
    if (str_starts_with($digits, '595')) {
        $national = substr($digits, 3);
    } elseif (str_starts_with($digits, '0')) {
        $national = substr($digits, 1);
    } else {
        $national = $digits;
    }

    /* Paraguayan national numbers are 8–9 digits (mobile 9XX XXX XXX,
       Asunción 21 XXX XXX); anything else is not a number we can call back. */
    if (strlen($national) < 7 || strlen($national) > 10) {
        return null;
    }

    return '+595' . $national;
}

/* -------------------------------------------------------------- WhatsApp --- */

/**
 * The href of every WhatsApp CTA on the site (PLAN D10, ADR-07): the tracked
 * redirect /ir/wa/general, which logs the click and answers 302 to wa.me.
 * wa.me itself never appears in the HTML.
 *
 *   $texto  the prefilled message; names what the visitor was reading about
 *   $desde  the page the click came from; defaults to the page being rendered
 *
 * Null when no WhatsApp number is configured: callers fall back to
 * /contacto (PLAN §4.5) — contact_href() does exactly that.
 */
function wa_href(string $texto, ?string $desde = null): ?string
{
    if (wa_number() === null) {
        return null;
    }

    $desde = $desde ?? (string) ($GLOBALS['page']['path'] ?? '/');

    return '/ir/wa/general?' . http_build_query(
        ['texto' => mb_substr($texto, 0, 300), 'desde' => clean_path($desde)],
        '',
        '&',
        PHP_QUERY_RFC3986
    );
}

/**
 * wa_href(), or /contacto while there is no number.
 */
function contact_href(string $texto, ?string $desde = null): string
{
    return wa_href($texto, $desde) ?? '/contacto';
}

/**
 * The WhatsApp number as wa.me wants it (digits, country code first), or
 * null. Only /ir/wa/general and wa_href() read it.
 */
function wa_number(): ?string
{
    $e164 = phone_e164((string) site('whatsapp'));

    return $e164 === null ? null : ltrim($e164, '+');
}
