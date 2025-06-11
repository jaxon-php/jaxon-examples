<?php

use Jaxon\Jaxon;

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
        $xResponse->assign('div2', 'style.color', $sColor);
    }
}

$jaxon = jaxon();

$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('core.language', 'fr');
$jaxon->setOption('core.debug.on', false);
$jaxon->setOption('core.prefix.function', 'jaxon_');

// Register functions
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'sayHello', ['class' => 'HelloWorld', 'alias' => 'helloWorld']);
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'setColor', ['class' => 'HelloWorld']);
