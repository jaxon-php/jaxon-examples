<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use function Jaxon\jaxon;

/*
    Function: helloWorld

    Modify the innerHTML of div1.
*/
function helloWorld($isCaps)
{
    if ($isCaps)
        $text = 'HELLO WORLD!';
    else
        $text = 'Hello World!';

    $xResponse = jaxon()->newResponse();
    $xResponse->assign('div1', 'innerHTML', $text);

    return $xResponse;
}

/*
    Function: setColor

    Modify the style.color of div1
*/
function setColor($sColor)
{
    $xResponse = jaxon()->newResponse();
    $xResponse->assign('div1', 'style.color', $sColor);

    return $xResponse;
}

$jaxon = jaxon();

// Js options
$jaxon->setOption('js.app.minify', false);
$jaxon->setOption('core.decode_utf8', true);

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Register functions
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'helloWorld', ['mode' => "'asynchronous'"]);
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'setColor', ['mode' => "'asynchronous'"]);
