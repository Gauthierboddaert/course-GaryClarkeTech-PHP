<?php

class Container implements \Psr\Container\ContainerInterface
{

    public function get(string $id): mixed
    {
        // TODO: Implement get() method.
    }

    public function has(string $id): bool
    {
        return true;
    }

    public function add(string $value, string $class): void {

    }
}