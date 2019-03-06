<?php

declare(strict_types=1);

namespace Vendi\Dumper\Transformer;

abstract class TransformerBase
{
    final public function remove_whitespace_from_html(string $html) : string
    {
        return preg_replace('~>\s+<~', '><', $html);
    }
}
