<?php

namespace SteelStripe\Framework\Core\Injector;

class ProxyFactory implements Factory
{
    private string $proxyNamespace = 'SteelStripe\\Proxies\\';
    private array $proxyCache = [];

    public function create(string $class, array $args = []): object
    {
        $proxyClass = $this->proxyNamespace . $class;

        // Check cache first
        if (!isset($this->proxyCache[$proxyClass])) {
            $this->proxyCache[$proxyClass] = class_exists($proxyClass);
        }

        return $this->proxyCache[$proxyClass] ? new $proxyClass(...$args) : new $class(...$args);
    }
}