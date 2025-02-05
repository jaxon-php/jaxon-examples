<?php

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
    }

    public function setColor(string $sColor, bool $bNotify = true)
    {
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'style.color', $sColor);
        if(($bNotify))
            $xResponse->dialog->success("div2 color is now $sColor");
    }

    public function showDialog()
    {
        $xResponse = jaxon()->newResponse();
        $buttons = [['title' => 'Close', 'class' => 'btn', 'click' => 'close']];
        $options = ['width' => 500];
        $xResponse->dialog->show("Modal Dialog", "This modal dialog is powered by PgwJs!!", $buttons, $options);
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup($configDir . '/config.yaml');
