<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type\Scalar;

use Vendi\Dumper\Type\GenericScalar;

class Date extends GenericScalar
{
    public function __construct(?\DateTime $value)
    {
        parent::__construct('date', $value);
    }

    public function getValue()
    {
        return $this->value ? $this->value->format('Y-m-d') : null;
    }

    public static function create_from_string(?string $value) : self
    {
        if (!$value) {
            return new static(null);
        }

        return new static(\DateTime::createFromFormat('Ymd', str_replace('-', '', $value)));
    }
}
