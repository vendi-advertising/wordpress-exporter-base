<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type;

abstract class GenericComplex extends GenericType
{
    protected $values = [];

    public function set_value(string $name, GenericType $value)
    {
        $this->values[$name] = $value;
    }

    public function get_values_for_serialization() : array
    {
        $ret = [];

        foreach ($this->values as $name => $value) {
            $ret[$name] = $value->jsonSerialize();
        }

        return $ret;
    }

    public function jsonSerialize()
    {
        $classname = explode('\\', get_class($this));
        $classname = end($classname);

        $ret = [
            'object' => $classname,
            'values' => $this->get_values_for_serialization(),
        ];

        return $ret;
    }
}
