<?php

$rootDir = realpath(__DIR__ . '/../../frw/zend-2.3');

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
// chdir(dirname(__DIR__));
chdir($rootDir);

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Setup autoloading
require $rootDir . '/init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require $rootDir . '/config/application.config.php')->run();
