<?php declare(strict_types=1);

namespace Vendi\Dumper\Type;

final class Text extends GenericScalar
{
    public function __construct($value)
    {
        parent::__construct('string', $value);
    }
}
