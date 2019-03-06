<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type\Scalar;

class Html extends Text
{
    public function __construct($value)
    {
        parent::__construct($value, false, 'html');
    }
}
