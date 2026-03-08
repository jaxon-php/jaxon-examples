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

function ajaxDir(string $dir): string
{
    return dirname(__DIR__) . "/ajax/$dir";
}

function renderPage(string $page): void
{
    require __DIR__ . "/{$page}/code.php";

    // Request processing URI
    jaxon()->setOption('core.request.uri', "/ajax.php?exp={$page}");

    echo jaxon()->template()->render("examples::page.php", ['page' => $page]);
}
