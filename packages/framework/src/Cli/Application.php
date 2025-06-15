<?php

namespace SteelStripe\Framework\Cli;

use SteelStripe\Framework\Core\Injector\Injectable;
use SteelStripe\Framework\Cli\Command\GenerateProxiesCommand;
use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    use Injectable;

    public function __construct()
    {
        parent::__construct('SteelStripe CLI', '1.0.0');

        // Add commands
        $this->add(new GenerateProxiesCommand());
    }
}