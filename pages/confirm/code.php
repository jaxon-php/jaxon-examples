<?php

class HelloWorld
{
    public function sayHello(bool $isCaps)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('hello-text', 'innerHTML', $text);
    }

    public function setColor(string $sColor)
    {
        $xResponse = jaxon()->newResponse();

        $xResponse->confirm(function($xResp) {
            $xResp->sleep(50);
        }, 'Sleep for 5 seconds?');

        $xResponse->assign('hello-text', 'style.color', $sColor);
    }

    public function showError($sMessage)
    {
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('hello-text', 'innerHTML', $sMessage);
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup(configFile('class.php'));
$jaxon->setAppOption('dialogs.default.confirm', 'cute');

// Js options
$jaxon->setOption('core.language', 'fr');
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.minify', false);
