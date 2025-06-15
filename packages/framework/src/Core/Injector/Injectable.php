<?php

namespace SteelStripe\Framework\Core\Injector;

use SteelStripe\Framework\Core\Injector\Injector;

trait Injectable
{
    public static function singleton(array $args = []): static
    {
        return Injector::inst()->get(static::class, $args);
    }

    public static function create(array $args = []): static
    {
        return Injector::inst()->create(static::class, $args);
    }
}