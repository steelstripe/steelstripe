<?php

// Define the base path (directory containing public folder)
define('BASE_PATH', dirname(__DIR__));

// Try to load autoloader from various possible locations
$autoloadPaths = [
    // Standalone installation
    BASE_PATH . '/vendor/autoload.php',
    // Monorepo installation
    BASE_PATH . '/../../vendor/autoload.php',
    // Alternative monorepo path
    BASE_PATH . '/../../../vendor/autoload.php'
];

$autoloader = null;
foreach ($autoloadPaths as $path) {
    if (file_exists($path)) {
        $autoloader = $path;
        break;
    }
}

if ($autoloader === null) {
    die('Could not find autoloader. Please run "composer install" first.');
}

require $autoloader;

// Initialize the application
$app = new App\Application();

// Run the application
$app->run();