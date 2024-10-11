<?php

namespace App\DTO;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use ReflectionClass;

class BaseDTO implements Arrayable
{
    public function toArray(): array
    {
        $properties = [];

        $reflection = new ReflectionClass($this);
        $props = $reflection->getProperties();

        foreach ($props as $prop) {
            $key = $prop->getName();
            $value = $prop->getValue($this);

            if ($value === NULL) {
                continue;
            }

            $properties[Str::snake($key)] = $value;
        }

        return $properties;
    }
}
