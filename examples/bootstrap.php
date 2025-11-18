<?php

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require dirname(__DIR__, 2) . '/vendor/autoload.php';
require_once dirname(__DIR__, 2) . '/jaxon-core/src/globals.php';
require_once __DIR__ . '/menu.php';

// Register the logger
jaxon()->setLogger(function() {
    $logFile = dirname(__DIR__) . '/logs/examples.log';
    return (new Logger('examples'))
        ->pushHandler(new StreamHandler($logFile, Level::Debug));
});

jaxon()->template()
    ->addNamespace('examples', __DIR__)
    ->addNamespace('templates', dirname(__DIR__) . '/templates');

// The pagination template must be declared to the view renderer.
jaxon()->view()->addNamespace('pagination',
    dirname(__DIR__) . '/templates/component/pagination', '.php', 'jaxon');

function configFile(string $file): string
{
    return dirname(__DIR__) . "/config/$file";
}

function classDir(string $dir): string
{
    return dirname(__DIR__) . "/classes/$dir";
}

function renderExample(string $name): void
{
    require __DIR__ . "/{$name}/code.php";

    // Request processing URI
    jaxon()->setOption('core.request.uri', "/ajax.php?exp={$name}");

    echo jaxon()->template()->render("examples::{$name}/page.php");
}
