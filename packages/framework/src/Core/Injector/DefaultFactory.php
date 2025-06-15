<?php

namespace SteelStripe\Framework\Core\Injector;

class DefaultFactory implements Factory
{
    public function create(string $class, array $args = []): object
    {
        return new $class(...$args);
    }
}