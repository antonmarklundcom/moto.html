<?php
/**
 * [DEV] filler for the fixture records: paragraphs of plain, neutral Spanish
 * that pass every content rule, so a fixture can reach a gate's word count.
 * Not a content file (content() only loads names matching [a-z-]+).
 */

declare(strict_types=1);

if (!function_exists('dev_text')) {
    /**
     * Paragraphs totalling at least $words words. $topic makes each record's
     * text (and so its generated description) distinct.
     */
    function dev_text(string $topic, int $words): array
    {
        $sentences = [
            'Este párrafo de prueba existe para que la verificación recorra la plantilla de %s con un registro completo.',
            'Nada de lo que dice sobre %s es un dato real, y por eso nunca se publica fuera del modo de desarrollo.',
            'Cada sección de %s se arma con los mismos bloques que usan las páginas reales del sitio.',
            'Si una cifra no tiene fuente, el bloque queda oculto y la página de %s sigue siendo legible.',
            'La prueba cuenta las palabras del cuerpo renderizado de %s, sin el menú, el pie ni los bloques pendientes.',
            'Los enlaces internos de %s también se cuentan, porque la regla de indexación los pide.',
            'Quien lea esto en producción encontró un error: los registros de %s no deberían cargarse ahí.',
            'El texto repite ideas simples sobre %s a propósito, porque lo único que importa es su largo.',
        ];
        $out = [];
        $count = 0;
        $i = 0;
        while ($count < $words) {
            $paragraph = [];
            for ($j = 0; $j < 4 && $count < $words; $j++, $i++) {
                $sentence    = sprintf($sentences[$i % count($sentences)], $topic);
                $paragraph[] = $sentence;
                $count      += count(preg_split('/\s+/', $sentence));
            }
            $out[] = implode(' ', $paragraph);
        }

        return $out;
    }
}
