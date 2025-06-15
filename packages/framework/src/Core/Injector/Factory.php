<?php

namespace SteelStripe\Framework\Core\Injector;

interface Factory
{
    /**
     * Create a new instance of the specified class
     *
     * @param string $class The class to create
     * @param array $args Constructor arguments
     * @return object The created instance
     */
    public function create(string $class, array $args = []): object;
}