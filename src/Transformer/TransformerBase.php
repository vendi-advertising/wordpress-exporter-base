<?php

declare(strict_types=1);

namespace Vendi\Dumper\Transformer;

abstract class TransformerBase
{
    final public function remove_whitespace_from_html(string $html) : string
    {
        return preg_replace('~>\s+<~', '><', $html);
    }
    
    final public function fix_html(string $html) : string
    {
        $html = str_replace('<br /></strong>', '</strong><br />', $html);
        $html = str_replace('<b>', '<strong>', $html);
        $html = str_replace('</b>', '</strong>', $html);

        return $html;
    }
}
