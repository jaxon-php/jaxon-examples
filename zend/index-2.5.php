<?php

$rootDir = realpath(__DIR__ . '/../../frw/zend-2.5');

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
// chdir(dirname(__DIR__));
chdir($rootDir);

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

// Setup autoloading
require $rootDir . '/init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require $rootDir . '/config/application.config.php')->run();
