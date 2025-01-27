<?php

require __DIR__ . '/../../../includes/autoload.php';

use Jaxon\Jaxon;
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
        $xResponse->assign('div2', 'style.color', $sColor);
    }
}

$jaxon = jaxon();

$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('core.language', 'fr');
$jaxon->setOption('core.debug.on', false);
$jaxon->setOption('core.prefix.function', 'jaxon_');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Register functions
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'sayHello', ['class' => 'HelloWorld', 'alias' => 'helloWorld']);
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'setColor', ['class' => 'HelloWorld']);
