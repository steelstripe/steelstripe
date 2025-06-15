<?php

namespace SteelStripe\Framework\Core\Injector;

class Injector
{
    private static ?Injector $instance = null;
    /** @var array<string, Factory> */
    private array $factories = [];
    private array $singletons = [];
    private Factory $defaultFactory;

    public function __construct(Factory $factory)
    {
        $this->defaultFactory = $factory;
    }

    public static function inst(): self
    {
        if (self::$instance === null) {
            $factory = new ProxyFactory();
            self::$instance = $factory->create(self::class, [$factory]);
        }
        return self::$instance;
    }

    public function register(string $class, Factory $factory): void
    {
        $this->factories[$class] = $factory;
    }

    public function create(string $class, array $args = []): object
    {
        // Check if we have a custom factory
        if (isset($this->factories[$class])) {
            return $this->factories[$class]->create($class, $args);
        }

        // Use default factory
        return $this->defaultFactory->create($class, $args);
    }

    public function get(string $class, array $args = []): object
    {
        // Check if we have a singleton instance
        if (isset($this->singletons[$class])) {
            return $this->singletons[$class];
        }

        // Create new instance and store as singleton
        $instance = $this->create($class, $args);
        $this->singletons[$class] = $instance;
        return $instance;
    }
}
