<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

class HelloWorld
{
    public function sayHello($isCaps, $bNotify = true)
    {
        $text = ($isCaps) ? 'HELLO WORLD!' : 'Hello World!';

        $xResponse = new Response();
        $xResponse->assign('div2', 'innerHTML', $text);
        if(($bNotify))
            $xResponse->dialog->success("div2 text is now $text");

        return $xResponse;
    }

    public function setColor($sColor, $bNotify = true)
    {
        $xResponse = new Response();
        $xResponse->assign('div2', 'style.color', $sColor);
        if(($bNotify))
            $xResponse->dialog->success("div2 color is now $sColor");
        
        return $xResponse;
    }

    public function showDialog()
    {
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('width' => 500);
        $xResponse->dialog->modal("Modal Dialog", "This modal dialog is powered by PgwJs!!", $buttons, $options);
        
        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->readConfigFile(__DIR__ . '/../../config/config.yaml', 'jaxon');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->register(Jaxon::CALLABLE_OBJECT, new HelloWorld());
