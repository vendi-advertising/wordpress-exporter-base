<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type\Scalar;

use Vendi\Dumper\Type\GenericScalar;

class DateTime extends GenericScalar
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
            return new static(null);
        }

        $ret = \DateTime::createFromFormat('Ymd H:i:s', str_replace('-', '', $value));
        if (!$ret instanceof \DateTime) {
            $ret = \DateTime::createFromFormat('Ymd', str_replace('-', '', $value));
            if (!$ret instanceof \DateTime) {
                throw new \Exception('Invalid date-like value: ' . $value);
            }
        }

        return new static($ret);
    }
}
