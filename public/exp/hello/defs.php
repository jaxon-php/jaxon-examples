<?php

require __DIR__ . '/../../../includes/autoload.php';

use Jaxon\Jaxon;
use function Jaxon\jaxon;

/*
    Function: helloWorld

    Modify the innerHTML of div1.
*/
function helloWorld(bool $isCaps)
{
    $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
    $xResponse = jaxon()->newResponse();
    $xResponse->assign('div1', 'innerHTML', $text);
}

/*
    Function: setColor

    Modify the style.color of div1
*/
function setColor(string $sColor)
{
    $xResponse = jaxon()->newResponse();
    $xResponse->assign('div1', 'style.color', $sColor);
}

$jaxon = jaxon();

// Js options
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.minify', false);
$jaxon->setOption('core.decode_utf8', true);

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Register functions
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'helloWorld', ['mode' => "'asynchronous'"]);
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'setColor', ['mode' => "'asynchronous'"]);
