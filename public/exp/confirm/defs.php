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
    }

    public function setColor(string $sColor)
    {
        $xResponse = jaxon()->newResponse();

        $xResponse->confirm(function($xResp) {
            $xResp->sleep(50);
        }, 'Sleep for 5 seconds?');

        $xResponse->assign('div2', 'style.color', $sColor);
    }

    public function showError($sMessage)
    {
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'innerHTML', $sMessage);
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup(__DIR__ . '/../../../config/class.php');
$jaxon->app()->setOption('dialogs.default.confirm', 'cute');

// Js options
$jaxon->setOption('core.language', 'fr');
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.minify', false);

// Request processing URI
// $jaxon->setOption('core.request.uri', 'ajax.php');
