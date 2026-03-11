<?php

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

function renderCodeSource(string $page): string
{
    return highlight_file(__DIR__ . "/$page/code.php", true);
}

function renderPageSource(string $page): string
{
    return highlight_file(__DIR__ . "/$page/page.php", true);
}

function renderPage(string $page): void
{
    require __DIR__ . "/{$page}/code.php";

    // Request processing URI
    jaxon()->setOption('core.request.uri', "/ajax.php?exp={$page}");

    echo jaxon()->template()->render("examples::page.php", ['page' => $page]);
}
