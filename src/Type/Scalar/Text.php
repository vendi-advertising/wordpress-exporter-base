<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type\Scalar;

use Vendi\Dumper\Type\GenericScalar;

class Text extends GenericScalar
{
    public function __construct($value, bool $trim = true, string $valueType = 'string')
    {
        if ($trim && \is_string($value)) {
            $value = trim('' . $value);
        }
        parent::__construct($valueType, $value);
    }
}
