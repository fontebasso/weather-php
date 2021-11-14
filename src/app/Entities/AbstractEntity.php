<?php

namespace Fontebasso\Weather\Entities;

use Exception;
use ReflectionException;
use ReflectionProperty;

abstract class AbstractEntity
{
    /**
     * @throws Exception
     */
    public function __construct(array $raw = [])
    {
        foreach ($raw as $property => $value)
        {
            $this->{$property} = $this->cast($property, $value);
        }
    }

    public function __get(string $property)
    {
        return $this->{$property};
    }

    public function __set(string $property, $value)
    {
        $this->{$property} = $value;
    }

    /**
     * @throws ReflectionException
     * @throws Exception
     */
    private function cast($property, $value)
    {
        $reflection = new ReflectionProperty($this, $property);
        $type = $reflection->getType()->getName();

        return match ($type) {
            'int' => (int)$value,
            default => $value,
        };
    }

    public function __toString()
    {
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties();
        $data = [];
        foreach($properties as $property) {
            $data[$property->name] = $this->{$property->name};
        }
        return json_encode($data);
    }
}
