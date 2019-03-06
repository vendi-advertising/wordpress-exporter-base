<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type;

abstract class GenericScalar extends GenericType
{
    protected $value_type;

    protected $value;

    public function __construct(string $value_type, $value)
    {
        $this->value_type = $value_type;
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getValueType()
    {
        return $this->value_type;
    }

    public function jsonSerialize()
    {
        $ret = [
            'type' => $this->getValueType(),
            'value' => $this->getValue(),
        ];

        return $ret;
    }
}
