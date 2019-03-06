<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type\Scalar;

use Vendi\Dumper\Type\GenericScalar;

final class Text extends GenericScalar
{
    public function __construct($value, bool $trim = true)
    {
        if ($trim && \is_string($value)) {
            $value = trim('' . $value);
        }
        parent::__construct('string', $value);
    }
}
