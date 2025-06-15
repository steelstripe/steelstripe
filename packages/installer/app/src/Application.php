<?php

namespace App;

// use SteelStripe\Framework\Application as BaseApplication;

class Application
// extends BaseApplication
{
    public function __construct()
    {
        // parent::__construct();

        // Register your application services here
        $this->registerServices();
    }

    protected function registerServices(): void
    {
        // Add your service registrations here
    }

    public function run()
    {
        // Run the application
        echo "Hello World";
    }
}