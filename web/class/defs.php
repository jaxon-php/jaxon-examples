<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;
use Jaxon\Response\Manager as ResponseManager;

class HelloWorld
{
    public function sayHello($isCaps)
    {
        $text = (($isCaps) ? 'HELLO WORLD!' : 'Hello World!');
        $xResponse = new Response();
        $xResponse->assign('div2', 'innerHTML', $text);
        return $xResponse;
    }

    public function setColor($sColor)
    {
        $xResponse = new Response();
        $xResponse->assign('div2', 'style.color', $sColor);
        return $xResponse;
    }

    public function showError($sMessage)
    {
        $xResponse = new Response();
        $xResponse->assign('div2', 'innerHTML', $sMessage);
        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->readConfigFile(__DIR__ . '/../../config/class.php', 'lib');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

$xCallableObject = new HelloWorld();
$jaxon->register(Jaxon::CALLABLE_OBJECT, $xCallableObject, array(
    '*' => array('mode' => "'synchronous'"),
    'sayHello' => array('mode' => "'asynchronous'"),
));
$jaxon->register(Jaxon::PROCESSING_EVENT, Jaxon::PROCESSING_EVENT_INVALID, array($xCallableObject, 'showError'));
