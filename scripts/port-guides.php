<?php
/**
 * Phase B2: ports the 12 buying guides of the Node app (antonmarklundcom/moto,
 * content/guias/*.md, read-only) into content/guias.php.
 *
 *   php scripts/port-guides.php            print the PHP records and the fix log
 *   php scripts/port-guides.php --write    replace the region between
 *                                          `B2:ported:start` and `B2:ported:end`
 *                                          in content/guias.php (the rest of the
 *                                          file is never touched)
 *   php scripts/port-guides.php --routes   write guias/<slug>/index.php for all
 *                                          15 B2 guides
 *
 * Slug, title and meta description are copied verbatim. The body keeps the
 * source text; only the deviations listed in the three tables below are made,
 * each one counted and printed in the fix log (it ends up in docs/log/B2.md):
 *
 *   FIX_REPLACE  exact text swapped (the source mentions a function this site
 *                does not have: classifieds, a financing form, a verified-shop
 *                seal, a report button; PLAN D8 and the scope of §3)
 *   FIX_DROP     a paragraph or list item that only describes such a function
 *                becomes a ['verify' => …] block (omitted when rendered, listed
 *                in docs/verificar.md)
 *   LINKS        routes that do not exist here: remapped or turned into text
 *
 * [VERIFICAR: …] (PLAN D14): the tag is removed from the text and its content
 * becomes a ['verify' => …] block right after the paragraph or list item.
 */

declare(strict_types=1);

const ROOT = __DIR__ . '/..';

/** The 12 ported slugs, in the order they are written. */
const PORTED = [
    'moto-0-km-o-usada',
    '125-150-o-200-cc-cual-elegir',
    'que-moto-conviene-para-trabajar',
    'como-comprar-una-moto-usada-sin-que-te-estafen',
    'que-revisar-antes-de-comprar-una-moto-usada',
    'cuanto-vale-mi-moto-usada',
    'como-sacar-buenas-fotos-para-vender-tu-moto',
    'seguro-contra-terceros-para-motos',
    'comprar-moto-en-cuotas-en-paraguay',
    'cuanto-cuesta-mantener-una-moto',
    'papeles-de-una-moto-al-dia',
    'como-transferir-una-moto-en-paraguay',
];

/** The 3 guides written for this site (hand-written in content/guias.php). */
const NEW_GUIDES = [
    'como-comprar-tu-primera-moto',
    'precios-de-motos-0-km-en-paraguay',
    'motos-baratas-en-paraguay',
];

const DATE = '2026-10-01';

/** [needle, replacement]: exact text, applied to each source line. */
const FIX_REPLACE = [
    ['donde dice **[VERIFICAR]**, confirmalo', 'confirmalo'],
    ['*Entrega Gs. X + N cuotas de Gs. Y*', '*Entrega X + N cuotas de Y*'],
    ['Una aclaración antes de empezar: moto.com.py es una plataforma de publicación. Revisamos cada publicación antes de que salga y damos de baja lo que incumple, pero no tenemos las motos, no verificamos su estado mecánico ni a nombre de quién están, y no intermediamos pagos.',
     'Una aclaración antes de empezar: moto.com.py no tiene las motos, no verifica su estado mecánico ni a nombre de quién están, y no interviene en los pagos.'],
    [' En moto.com.py sólo los comercios verificados tienen página propia y sello. El sello quiere decir que verificamos que el comercio existe y que su contacto es real; no que verificamos las motos. Si alguien te dice que es de un comercio, buscalo en la [lista de comercios](/comercios) y escribile al número que figura ahí.',
     ' Si alguien te dice que es de un comercio, comprobá por otro medio que sea de ese comercio antes de mandar plata.'],
    [' Nuestro formulario de financiación no te pide cédula, número de cuenta ni ningún pago. Si alguien te pide eso en nombre de moto.com.py, no somos nosotros.', ''],
    [' Nuestro formulario no te pide cédula, número de cuenta ni ningún pago; si alguien te pide eso en nombre de moto.com.py, no somos nosotros.', ''],
    [' Si ves una publicación sospechosa en moto.com.py, usá el botón **Denunciar esta publicación** en la ficha.', ''],
    [' Te orientamos y te derivamos con el comercio o la financiera, que es quien decide.', ' Quien decide es el comercio o la financiera.'],
    [' Si querés que te contacten, dejá tus datos en [financiación](/financiacion).', ''],
    ['Si querés que te contacten, dejá tus datos en [financiación](/financiacion), y leé antes', 'Leé antes'],
    [' Mirá el [seguro para motos](/seguros).', ''],
    [' y en los [comercios con página propia](/comercios)', ''],
    [' Los datos de contacto van en los campos del formulario, no en las fotos ni en la descripción.', ''],
    ['El formulario te pide un mínimo de texto; aprovechalo para contar:', 'Aprovechá la descripción para contar:'],
    ['marcalo en el formulario', 'marcalo en la descripción'],
    ['Entrá a las [motos usadas publicadas](/motos/usadas) y filtrá:', 'Buscá avisos de motos usadas publicadas y filtrá:'],
    ['mirá las [motos publicadas en todo el país](/motos) y filtrá por tipo, marca o ciudad.', 'mirá las [motos por marca y por tipo](/motos).'],
];

/** Needle in a (post-replacement) source line: the whole paragraph or item becomes a verify block. */
const FIX_DROP = [
    'filtrá por tu ciudad',
    'Denunciar esta publicación',
    'Quiero financiarla',
    'podés filtrar por entrega y cuota máxima',
    'Te contactamos para orientarte',
    'te derivamos con una aseguradora',
    'botón **Escribir por WhatsApp** de la publicación',
    'Revisamos cada publicación antes de que salga en el sitio',
    '(/publicar)',
];

/**
 * Text added to a ported guide so it clears the §2.3 gate (600 rendered words)
 * once its [VERIFICAR] details are hidden. Process advice only: no figure, no
 * requirement and no name of an office. [slug => ['before' => section id, 'section' => section]]
 */
const EXTRA_SECTIONS = [
    'como-transferir-una-moto-en-paraguay' => [
        'before'  => 'senales-para-no-seguir',
        'section' => [
            'h2'   => 'Cómo ordenar el trámite',
            'id'   => 'como-ordenar-el-tramite',
            'body' => [
                'Armá una carpeta, de papel o en el celular, con todo lo del trámite: fotos de los papeles que te mostró el vendedor, copia de la compraventa, los comprobantes de cada pago y el nombre de quien te atendió en cada oficina. Si algo sale mal, esa carpeta es lo que te permite explicar qué pasó y cuándo.',
                'Hacé las preguntas por escrito siempre que se pueda y guardá las respuestas. Si alguien te dice un monto o un plazo de palabra, pedí que te lo confirmen en un comprobante, y desconfiá de quien te ofrece arreglar el trámite por fuera de la oficina a cambio de un pago extra.',
                'No avances un paso si el anterior quedó dudoso: es más fácil frenar antes de pagar que reclamar después. Si necesitás una mano, un escribano o un gestor de confianza puede ordenarte los papeles; pedile que te detalle por escrito qué hace y cuánto cobra.',
            ],
        ],
    ],
];

/** Link target => new target, or null for "keep the words, drop the link". */
const LINKS = [
    '/motos/nuevas'  => '/guias/precios-de-motos-0-km-en-paraguay',
    '/seguros'       => '/guias/seguro-contra-terceros-para-motos',
    '/motos/usadas'  => null,
    '/financiacion'  => null,
    '/publicar'      => null,
    '/comercios'     => null,
];

/* ------------------------------------------------------------------ parse -- */

function slugify_id(string $heading): string
{
    $s = mb_strtolower($heading);
    $s = strtr($s, ['á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ü' => 'u', 'ñ' => 'n']);
    $s = preg_replace('/^\d+\.\s*/', '', $s) ?? $s;
    $s = trim((string) preg_replace('/[^a-z0-9]+/', '-', $s), '-');

    return substr($s, 0, 48);
}

/** @param array<string,int> $log */
function fix_line(string $line, array &$log, string $slug): ?string
{
    foreach (FIX_REPLACE as [$needle, $to]) {
        if (str_contains($line, $needle)) {
            $line = str_replace($needle, $to, $line);
            $k = ($to === '' ? 'cut' : 'replace') . ': ' . mb_substr($needle, 0, 70);
            $log[$slug . ' | ' . $k] = ($log[$slug . ' | ' . $k] ?? 0) + 1;
        }
    }
    foreach (FIX_DROP as $needle) {
        if (str_contains($line, $needle)) {
            $log[$slug . ' | drop: ' . $needle] = ($log[$slug . ' | drop: ' . $needle] ?? 0) + 1;

            return null;
        }
    }
    $plain = preg_replace('/(?<!\*)\*(?!\*)([^*\n]+?)(?<!\*)\*(?!\*)/u', '$1', $line, -1, $nItalics);
    if ($nItalics > 0) {
        $line = (string) $plain;
        $log[$slug . ' | single-asterisk italics shown as plain text (no italic block)'] = ($log[$slug . ' | single-asterisk italics shown as plain text (no italic block)'] ?? 0) + $nItalics;
    }
    $line = (string) preg_replace_callback('/\[([^\]]+)\]\((\/[^)\s]*)\)/u', static function (array $m) use (&$log, $slug): string {
        $path = $m[2];
        if (!array_key_exists($path, LINKS)) {
            return $m[0];
        }
        $to = LINKS[$path];
        $k  = $slug . ' | link ' . $path . ' -> ' . ($to ?? 'texto');
        $log[$k] = ($log[$k] ?? 0) + 1;

        return $to === null ? $m[1] : '[' . $m[1] . '](' . $to . ')';
    }, $line);

    return $line;
}

/** Split a line into its text and the [VERIFICAR…] notes it carried. */
function split_verify(string $line): array
{
    $notes = [];
    $text  = preg_replace_callback('/\s*\*{0,2}\[VERIFICAR(?::\s*([^\]]*))?\]\*{0,2}/u', static function (array $m) use (&$notes): string {
        $notes[] = trim($m[1] ?? '') !== '' ? trim($m[1]) : 'confirmar el dato';

        return '';
    }, $line);

    return [trim((string) $text), $notes];
}

/** Turn a source line's text into blocks: the text, then one verify block per note. */
function line_blocks(string $text, array $notes, string $slug): array
{
    $out = [$text];
    foreach ($notes as $n) {
        $out[] = ['verify' => $n . ' (guía ' . $slug . ')'];
    }

    return $out;
}

function drop_block(string $slug): array
{
    return ['verify' => 'Texto de la app Node que describe una función que este sitio no tiene (clasificados, formulario de financiación, sello de comercios o botón de denuncia): reescribir o dejar fuera (guía ' . $slug . ')'];
}

function parse_guide(string $file, array &$log): array
{
    $raw = (string) file_get_contents($file);
    if (!preg_match('/\A---\n(.*?)\n---\n(.*)\z/s', $raw, $m)) {
        throw new RuntimeException("No front matter: {$file}");
    }
    $meta = [];
    foreach (explode("\n", $m[1]) as $l) {
        if (preg_match('/^(\w+):\s*(.*)$/', $l, $mm)) {
            $meta[$mm[1]] = $mm[2];
        }
    }
    $slug  = $meta['slug'];
    $lines = explode("\n", trim($m[2]));

    $intro    = [];
    $sections = [];
    $cur      = null;                       // index into $sections, or null for the intro
    $push     = static function (array $blocks) use (&$intro, &$sections, &$cur): void {
        foreach ($blocks as $b) {
            if ($cur === null) {
                $intro[] = $b;
            } else {
                $sections[$cur]['body'][] = $b;
            }
        }
    };

    $i = 0;
    $n = count($lines);
    while ($i < $n) {
        $line = rtrim($lines[$i]);
        if ($line === '') {
            $i++;
            continue;
        }
        if (str_starts_with($line, '## ')) {
            $title = trim(substr($line, 3));
            $sections[] = ['h2' => $title, 'id' => slugify_id($title), 'body' => []];
            $cur = array_key_last($sections);
            $i++;
            continue;
        }
        if (str_starts_with($line, '### ')) {
            $push(['**' . trim(substr($line, 4)) . '**']);   // no h3 block exists: a bold lead-in
            $i++;
            continue;
        }
        if (preg_match('/^(- |\d+\. )/', $line)) {
            $ordered = (bool) preg_match('/^\d+\. /', $line);
            $items   = [];
            while ($i < $n && preg_match($ordered ? '/^\d+\. (.*)$/' : '/^- (.*)$/', rtrim($lines[$i]), $im)) {
                $fixed = fix_line($im[1], $log, $slug);
                if ($fixed === null) {
                    $items[] = drop_block($slug);
                } else {
                    [$text, $notes] = split_verify($fixed);
                    foreach (line_blocks($text, $notes, $slug) as $b) {
                        $items[] = $b;
                    }
                }
                $i++;
            }
            $push([[$ordered ? 'ol' : 'list' => $items]]);
            continue;
        }
        // A paragraph: consecutive plain lines.
        $para = [];
        while ($i < $n && trim($lines[$i]) !== '' && !preg_match('/^(#{2,3} |- |\d+\. )/', $lines[$i])) {
            $para[] = trim($lines[$i]);
            $i++;
        }
        $fixed = fix_line(implode(' ', $para), $log, $slug);
        if ($fixed === null) {
            $push([drop_block($slug)]);
        } else {
            [$text, $notes] = split_verify($fixed);
            $push(line_blocks($text, $notes, $slug));
        }
    }

    if (isset(EXTRA_SECTIONS[$slug])) {
        $extra = EXTRA_SECTIONS[$slug];
        $at    = count($sections);
        foreach ($sections as $idx => $sec) {
            if ($sec['id'] === $extra['before']) {
                $at = $idx;
                break;
            }
        }
        array_splice($sections, $at, 0, [$extra['section']]);
        $log[$slug . ' | added section: ' . $extra['section']['h2']] = 1;
    }

    return [$slug, $meta, $intro, $sections];
}

/* ----------------------------------------------------------------- export -- */

function php_value(mixed $v, int $depth): string
{
    $pad  = str_repeat('    ', $depth);
    $pad1 = str_repeat('    ', $depth + 1);
    if (is_string($v)) {
        return "'" . str_replace(["\\", "'"], ["\\\\", "\\'"], $v) . "'";
    }
    if ($v === null) {
        return 'null';
    }
    if (!is_array($v)) {
        return var_export($v, true);
    }
    if ($v === []) {
        return '[]';
    }
    $isList = array_is_list($v);
    $out    = "[\n";
    foreach ($v as $k => $item) {
        $out .= $pad1 . ($isList ? '' : php_value((string) $k, 0) . ' => ') . php_value($item, $depth + 1) . ",\n";
    }

    return $out . $pad . ']';
}

/** Which other B2 guides a guide links to (for "Seguí leyendo"), up to 3. */
function related_of(array $intro, array $sections, string $self): array
{
    $json = json_encode([$intro, $sections], JSON_UNESCAPED_UNICODE) ?: '';
    preg_match_all('#\]\(/guias/([a-z0-9-]+)\)#', $json, $m);
    $found = array_values(array_unique(array_filter($m[1], static fn ($s) => $s !== $self && in_array($s, array_merge(PORTED, NEW_GUIDES), true))));

    return array_slice($found, 0, 3);
}

function build(string $srcDir, array &$log): string
{
    $out = '';
    foreach (PORTED as $slug) {
        [$s, $meta, $intro, $sections] = parse_guide($srcDir . '/' . $slug . '.md', $log);
        if ($s !== $slug) {
            throw new RuntimeException("Slug mismatch in {$slug}");
        }
        $related = related_of($intro, $sections, $slug);
        if ($slug !== 'como-comprar-tu-primera-moto' && count($related) < 3) {
            $related[] = 'como-comprar-tu-primera-moto';
        }
        $record = [
            'group'           => 'compra',
            'title'           => $meta['title'],
            'navLabel'        => $meta['title'],
            'seoTitle'        => $meta['title'],
            'metaDescription' => $meta['meta_description'],
            'query'           => $meta['query'],
            'published'       => DATE,
            'updated'         => DATE,
            'hero'            => ['h1' => $meta['title'], 'lead' => $meta['excerpt']],
            'intro'           => $intro,
            'sections'        => $sections,
            'faq'             => [],
            'links'           => [
                ['path' => '/motos', 'label' => 'Motos por marca y tipo'],
                ['path' => '/guias/precios-de-motos-0-km-en-paraguay', 'label' => 'Precios de motos 0 km publicados'],
            ],
            'related'         => array_slice(array_values(array_unique($related)), 0, 3),
            'quiz'            => null,
            'sources'         => [],
        ];
        $out .= '    ' . php_value($slug, 0) . ' => ' . php_value($record, 1) . ",\n";
    }

    return $out;
}

/* ------------------------------------------------------------------- main -- */

$srcDir = getenv('MOTO_GUIAS') ?: '/home/user/antonmarklundcom/moto/content/guias';
$argvs  = array_slice($argv, 1);
$log    = [];

if (in_array('--routes', $argvs, true)) {
    foreach (array_merge(PORTED, NEW_GUIDES) as $slug) {
        $dir = ROOT . '/guias/' . $slug;
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        file_put_contents($dir . '/index.php',
            "<?php require __DIR__ . '/../../lib/bootstrap.php';\n\$key = '{$slug}';\nrequire ROOT_DIR . '/templates/guide.php';\n");
        echo "route guias/{$slug}\n";
    }
    exit(0);
}

$code = build($srcDir, $log);

if (in_array('--write', $argvs, true)) {
    $target = ROOT . '/content/guias.php';
    $file   = (string) file_get_contents($target);
    $start  = '/* B2:ported:start */';
    $end    = '/* B2:ported:end */';
    $a = strpos($file, $start);
    $b = strpos($file, $end);
    if ($a === false || $b === false || $b < $a) {
        fwrite(STDERR, "Markers not found in content/guias.php\n");
        exit(1);
    }
    $new = substr($file, 0, $a + strlen($start)) . "\n" . $code . '    ' . substr($file, $b);
    file_put_contents($target, $new);
    echo "written: " . count(PORTED) . " records\n";
} else {
    echo $code;
}

ksort($log);
fwrite(STDERR, "FIX LOG\n");
foreach ($log as $k => $c) {
    fwrite(STDERR, "  {$c}x {$k}\n");
}
