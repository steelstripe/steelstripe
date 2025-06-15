<?php

namespace SteelStripe\Framework\Cli\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use SteelStripe\Framework\Core\Injector\Injector;

class GenerateProxiesCommand extends Command
{
    protected function configure(): void
    {
        $this->setName('generate:proxies')
            ->setDescription('Generate proxy classes for classes that need them');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (!defined('BASE_PATH')) {
            throw new \RuntimeException('BASE_PATH constant is not defined');
        }

        $proxyPath = BASE_PATH . '/proxies';

        // Get all classes that need proxies
        $classes = $this->findClassesNeedingProxies();

        foreach ($classes as $class) {
            $output->writeln("Generating proxy for {$class}...");

            // Create proxy class
            $proxyClass = $this->generateProxyClass($class);

            // Create directory structure
            $path = str_replace('\\', '/', $class);
            $dir = dirname($proxyPath . '/' . $path);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            // Write proxy class to file
            file_put_contents($proxyPath . '/' . $path . '.php', $proxyClass);
        }

        $output->writeln('Proxy generation complete!');
        return Command::SUCCESS;
    }

    private function findClassesNeedingProxies(): array
    {
        // This is where you would implement your logic to find classes that need proxies
        // For example, you could:
        // 1. Look for classes with a specific interface or trait
        // 2. Look for classes with a specific annotation
        // 3. Look for classes in specific directories
        // For now, we'll return an empty array
        return [
            Injector::class,
        ];
    }

    private function generateProxyClass(string $class): string
    {
        $parts = explode('\\', $class);
        $className = array_pop($parts);
        $proxyNamespace = 'SteelStripe\\Proxies\\' . implode('\\', $parts);

        $code = "<?php\n\n";
        $code .= "namespace {$proxyNamespace};\n\n";
        $code .= "use SteelStripe\\Framework\\Core\\Proxy\\ProxyTrait;\n\n";
        $code .= "class {$className} extends \\{$class}\n";
        $code .= "{\n";
        $code .= "    use ProxyTrait;\n";
        $code .= "}\n";

        return $code;
    }
}