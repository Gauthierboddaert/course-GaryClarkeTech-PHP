<?php

namespace Gauthier\Framework\Container;

use Gauthier\Framework\Container\Exception\ContainerException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $services = [];

    public function get(string $id): mixed
    {
        return $this->services[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }

    public
    function add(string $value, ?string $class = null): void
    {
        if (null === $class) {
            if (!class_exists($value)) {
                throw new ContainerException("Class $value does not exist");
            }
            $class = $value;
        }

        $this->services[$value] = $class;
    }
}

