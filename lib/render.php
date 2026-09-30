<?php
/**
 * Page bodies and content blocks.
 *
 * Every content template is split in two:
 *   templates/<type>.php       the page: head, header, breadcrumbs, the body,
 *                              the lead form, the CTA band, footer
 *   templates/body/<type>.php  the BODY: the editorial main content only
 *
 * page_body() renders the body to a string, once per request. The page prints
 * that string; the indexing gate counts words and links in that same string.
 * So "words on the rendered main content, without nav, footer or verify
 * blocks" (PLAN §2.3) is literally what is measured — the gate cannot drift
 * from what a visitor sees.
 *
 * Inside a body, an element with data-nocount (a generated list of models, a
 * spec table) is visible but not counted as the page's own words; its links
 * still count.
 */

declare(strict_types=1);

/**
 * The rendered body of a content page. '' for a record that does not exist.
 */
function page_body(string $type, string $key): string
{
    static $memo = [];
    $id = $type . ':' . $key . ':' . app_env() . ':' . today();

    if (!array_key_exists($id, $memo)) {
        $file = ROOT_DIR . '/templates/body/' . preg_replace('/[^a-z]/', '', $type) . '.php';
        $memo[$id] = is_file($file) ? render_isolated($file, ['key' => $key]) : '';
    }

    return $memo[$id];
}

/**
 * Include a file with only $vars in scope and return its output.
 */
function render_isolated(string $file, array $vars): string
{
    ob_start();
    try {
        (static function (string $__file, array $__vars): void {
            extract($__vars, EXTR_SKIP);
            require $__file;
        })($file, $vars);
    } catch (Throwable $e) {
        ob_end_clean();
        throw $e;
    }

    return (string) ob_get_clean();
}

/* ------------------------------------------------------------ blocks ------- */

/**
 * Render a list of content blocks. A block is one of:
 *
 *   'texto'                                   a paragraph (inline() markup)
 *   ['list' => [texto, …]]                    bullet list
 *   ['ol' => [texto, …]]                      numbered list
 *   ['note' => texto]                         a muted note
 *   ['fact' => hecho, 'label' => texto]       one sourced fact, labelled
 *   ['price' => hecho, 'label' => texto]      one published price (D6)
 *   ['table' => ['head' => [..], 'rows' => [[..], ..]], 'caption' => texto]
 *   ['verify' => texto]                       omitted (D14)
 *
 * Items inside list, ol and table rows may themselves be verify blocks.
 * Unknown block shapes render nothing rather than half-render.
 */
function render_blocks(array $blocks): string
{
    $html = '';
    foreach ($blocks as $block) {
        if (is_verify($block)) {
            continue;
        }
        if (is_string($block)) {
            $text = inline($block);
            $html .= trim($text) === '' ? '' : '<p>' . $text . "</p>\n";
            continue;
        }
        if (!is_array($block)) {
            continue;
        }
        if (isset($block['list']) || isset($block['ol'])) {
            $tag   = isset($block['list']) ? 'ul' : 'ol';
            $items = array_filter(visible((array) ($block['list'] ?? $block['ol'])), 'is_string');
            if ($items !== []) {
                $html .= "<{$tag}>";
                foreach ($items as $item) {
                    $html .= '<li>' . inline($item) . '</li>';
                }
                $html .= "</{$tag}>\n";
            }
        } elseif (isset($block['note']) && is_string($block['note'])) {
            $html .= '<p class="note">' . inline($block['note']) . "</p>\n";
        } elseif (isset($block['fact']) || isset($block['price'])) {
            $kind = isset($block['price']) ? 'price' : 'spec';
            $fact = fact_html($block['price'] ?? $block['fact'], $kind);
            if ($fact !== '') {
                $label = isset($block['label']) ? '<strong>' . inline((string) $block['label']) . ':</strong> ' : '';
                $html .= '<p>' . $label . $fact . "</p>\n";
            }
        } elseif (isset($block['table']['rows'])) {
            $rows = array_filter(visible((array) $block['table']['rows']), 'is_array');
            if ($rows !== []) {
                $html .= '<div class="table-wrap"><table class="data-table">';
                if (!empty($block['caption'])) {
                    $html .= '<caption>' . inline((string) $block['caption']) . '</caption>';
                }
                if (!empty($block['table']['head'])) {
                    $html .= '<thead><tr>';
                    foreach ((array) $block['table']['head'] as $cell) {
                        $html .= '<th scope="col">' . inline((string) $cell) . '</th>';
                    }
                    $html .= '</tr></thead>';
                }
                $html .= '<tbody>';
                foreach ($rows as $row) {
                    $html .= '<tr>';
                    foreach ($row as $cell) {
                        $html .= '<td>' . (is_array($cell) ? fact_html($cell, isset($cell['condition']) ? 'price' : 'spec')
                                                          : inline((string) $cell)) . '</td>';
                    }
                    $html .= '</tr>';
                }
                $html .= "</tbody></table></div>\n";
            }
        }
    }

    return $html;
}

/**
 * Render [['h2' => …, 'id' => …?, 'body' => blocks], …]. A section whose body
 * renders to nothing is dropped WITH its heading: a heading over a hole is
 * exactly what D14 forbids.
 */
function render_sections(array $sections, string $headingTag = 'h2'): string
{
    $html = '';
    foreach ($sections as $section) {
        if (!is_array($section) || is_verify($section)) {
            continue;
        }
        $body = render_blocks((array) ($section['body'] ?? []));
        if (trim($body) === '') {
            continue;
        }
        $id    = !empty($section['id']) ? ' id="' . e((string) $section['id']) . '"' : '';
        $html .= '<section class="prose"' . $id . '>'
               . (!empty($section['h2']) ? "<{$headingTag}>" . inline((string) $section['h2']) . "</{$headingTag}>" : '')
               . $body . "</section>\n";
    }

    return $html;
}

/**
 * The FAQ entries that can be shown: complete q + a, verify blocks dropped.
 * The same list feeds the visible block and FAQPage JSON-LD.
 */
function visible_faq(array $faq): array
{
    return array_values(array_filter(
        visible($faq),
        static fn ($item) => is_array($item)
            && is_string($item['q'] ?? null) && trim($item['q']) !== ''
            && is_string($item['a'] ?? null) && trim($item['a']) !== ''
    ));
}

/* ------------------------------------------------------- measurement ------- */

/**
 * Parse a body fragment. Returns the <div> that wraps it.
 */
function body_dom(string $html): ?DOMElement
{
    $doc = new DOMDocument();
    $prev = libxml_use_internal_errors(true);
    $doc->loadHTML('<?xml encoding="UTF-8"><div id="__body">' . $html . '</div>', LIBXML_NONET);
    libxml_clear_errors();
    libxml_use_internal_errors($prev);

    $el = $doc->getElementById('__body');

    return $el instanceof DOMElement ? $el : null;
}

/**
 * Words in rendered HTML: letters/digits runs, skipping script, style and
 * every data-nocount subtree.
 */
function body_words(string $html): int
{
    $root = body_dom($html);
    if ($root === null) {
        return 0;
    }
    $xpath = new DOMXPath($root->ownerDocument);
    foreach (iterator_to_array($xpath->query('.//script|.//style|.//*[@data-nocount]', $root)) as $node) {
        $node->parentNode?->removeChild($node);
    }

    /* Text nodes joined with spaces: "<p>tres</p><p>cuatro</p>" is two words,
       not "trescuatro". */
    $text = '';
    foreach ($xpath->query('.//text()', $root) as $node) {
        $text .= ' ' . $node->nodeValue;
    }

    return preg_match_all('/[\p{L}\p{N}]+(?:[.,\'’-][\p{L}\p{N}]+)*/u', $text);
}

/**
 * Distinct internal link targets in rendered HTML: site paths only, cleaned
 * of query and fragment, excluding the /ir/ redirects.
 */
function body_links(string $html): array
{
    $root = body_dom($html);
    if ($root === null) {
        return [];
    }
    $links = [];
    foreach ($root->getElementsByTagName('a') as $a) {
        $href = $a->getAttribute('href');
        if (!str_starts_with($href, '/') || str_starts_with($href, '//') || str_starts_with($href, '/ir/')) {
            continue;
        }
        $links[clean_path($href)] = true;
    }

    return array_keys($links);
}
