<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type\Scalar;

use Vendi\Dumper\Type\GenericScalar;

final class DateTime extends GenericScalar
{
    public function __construct(?\DateTime $value)
    {
        parent::__construct('date', $value);
    }

    public function getValue()
    {
        return $this->value ? $this->value->format('Y-m-d H:i') : null;
    }

    public static function create_from_string(?string $value) : self
    {
        if (!$value) {
            return new self(null);
        }

        return new self(\DateTime::createFromFormat('Ymd H:i:s', str_replace('-', '', $value)));
    }
}