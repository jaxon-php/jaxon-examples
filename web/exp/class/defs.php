<?php

require(dirname(__DIR__) . '/autoload.php');

use function Jaxon\jaxon;

class HelloWorld
{
    public function sayHello(bool $isCaps)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'innerHTML', $text);
        return $xResponse;
    }

    public function setColor(string $sColor)
    {
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'style.color', $sColor);
        return $xResponse;
    }

    public function showError($sMessage)
    {
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'innerHTML', $sMessage);
        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup(__DIR__ . '/../../../config/class.php');

// Js options
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.minify', false);
