<?php

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require dirname(__DIR__, 2) . '/vendor/autoload.php';
require_once dirname(__DIR__, 2) . '/jaxon-core/src/globals.php';

require_once __DIR__ . '/menu.php';
require_once __DIR__ . '/init.php';

// Register the logger
jaxon()->setLogger(function() {
    $logFile = dirname(__DIR__) . '/logs/examples.log';
    return (new Logger('examples'))
        ->pushHandler(new StreamHandler($logFile, Level::Debug));
});
