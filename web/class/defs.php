<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;

class HelloWorld
{
    public function sayHello($isCaps)
    {
        $text = (($isCaps) ? 'HELLO WORLD!' : 'Hello World!');
        $xResponse = jaxon()->getResponse();
        $xResponse->assign('div2', 'innerHTML', $text);
        return $xResponse;
    }

    public function setColor($sColor)
    {
        $xResponse = jaxon()->getResponse();
        $xResponse->assign('div2', 'style.color', $sColor);
        return $xResponse;
    }

    public function showError($sMessage)
    {
        $xResponse = jaxon()->getResponse();
        $xResponse->assign('div2', 'innerHTML', $sMessage);
        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->callback()->before(function($target, &$end) {
    error_log('Target: ' . print_r($target, true));
});

$jaxon->app()->setup(__DIR__ . '/../../config/class.php');

// Request processing URI
// $jaxon->setOption('core.request.uri', 'ajax.php');

// $jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class, [
//     '*' => ['mode' => "'synchronous'"],
//     'sayHello' => ['mode' => "'asynchronous'"],
// ]);
