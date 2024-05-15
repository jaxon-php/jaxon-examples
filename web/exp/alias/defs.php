<?php

require(__DIR__ . '/../../../vendor/autoload.php');

use Jaxon\Jaxon;use Jaxon\Response\Response;
use function Jaxon\jaxon;

class HelloWorld
{
    public function sayHello($isCaps)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';

        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'innerHTML', $text);

        return $xResponse;
    }

    public function setColor($sColor)
    {
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'style.color', $sColor);

        return $xResponse;
    }
}

$jaxon = jaxon();

$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('core.debug.on', false);
$jaxon->setOption('core.prefix.function', 'jaxon_');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Register functions
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'sayHello', ['class' => 'HelloWorld', 'alias' => 'helloWorld']);
$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'setColor', ['class' => 'HelloWorld']);
