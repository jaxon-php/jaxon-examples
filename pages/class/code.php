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
// Js options
$jaxon->setOptions(['lib' => ['uri' => '/js'], 'app' => ['minify' => false]], 'js');
