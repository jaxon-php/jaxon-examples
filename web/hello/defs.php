<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

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
        
    $xResponse = new Response();
    $xResponse->assign('div1', 'innerHTML', $text);
    // This is to test the javascript console error logging
    $xResponse->script('var test = null; alert(test.haha)');

    return $xResponse;
}

/*
    Function: setColor

    Modify the style.color of div1
*/
function setColor($sColor)
{
    $xResponse = new Response();
    $xResponse->assign('div1', 'style.color', $sColor);

    return $xResponse;
}

$jaxon = jaxon();

// Js options
$jaxon->setOption('js.lib.uri', '/exp/js/lib');
$jaxon->setOption('js.app.minify', false);

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Register functions
$jaxon->register(Jaxon::USER_FUNCTION, 'helloWorld', array('mode' => "'synchronous'"));
$jaxon->register(Jaxon::USER_FUNCTION, 'setColor', array('mode' => "'synchronous'"));
