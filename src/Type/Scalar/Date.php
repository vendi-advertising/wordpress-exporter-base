<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type\Scalar;

use Vendi\Dumper\Type\GenericScalar;

final class Date extends GenericScalar
{
    public function __construct(?\DateTime $value)
    {
        parent::__construct('date', $value);
    }

    public function getValue()
    {
        return $this->value ? $this->value->toString('Y-m-d') : null;
    }

    public static function create_from_string(?string $value) : self
    {
        if (!$value) {
            return new self(null);
        }

        return new self(\DateTime::createFromFormat('Ymd', str_replace('-', '', $value)));
    }
}
