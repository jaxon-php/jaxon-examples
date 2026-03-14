<?php

use Jaxon\Jaxon;

/*
    Function: helloWorld

    Modify the innerHTML of hello-text.
*/
function helloWorld(bool $isCaps)
{
    $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
    $xResponse = jaxon()->newResponse();
    $xResponse->assign('hello-text', 'innerHTML', $text);
}

/*
    Function: setColor

    Modify the style.color of hello-text
*/
function setColor(string $sColor)
{
    $xResponse = jaxon()->newResponse();
    $xResponse->assign('hello-text', 'style.color', $sColor);
}

$jaxon = jaxon();

// Js options
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.minify', false);
$jaxon->setOption('core.decode_utf8', true);

// Register functions
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'helloWorld', ['mode' => "'asynchronous'"]);
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'setColor', ['mode' => "'asynchronous'"]);
