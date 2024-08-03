<?php

require(__DIR__ . '/../../../vendor/autoload.php');
require_once(__DIR__ . '/../../../vendor/jaxon-php/jaxon-dialogs/src/start.php');

use Jaxon\Jaxon;
use function Jaxon\jaxon;

class HelloWorld
{
    public function sayHello(bool $isCaps, bool $bNotify = true)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'innerHTML', $text);
        if(($bNotify))
            $xResponse->dialog->success("div2 text is now $text");

        return $xResponse;
    }

    public function setColor(string $sColor, bool $bNotify = true)
    {
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'style.color', $sColor);
        if(($bNotify))
            $xResponse->dialog->success("div2 color is now $sColor");

        return $xResponse;
    }

    public function showDialog()
    {
        $xResponse = jaxon()->newResponse();
        $buttons = [['title' => 'Close', 'class' => 'btn', 'click' => 'close']];
        $options = ['width' => 500];
        $xResponse->dialog->show("Modal Dialog", "This modal dialog is powered by PgwJs!!", $buttons, $options);

        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->config(__DIR__ . '/../../../config/config.yaml', 'jaxon');

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
