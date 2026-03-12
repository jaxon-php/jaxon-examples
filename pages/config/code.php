<?php

class HelloWorld
{
    public function sayHello(bool $isCaps, bool $bNotify = true)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('hello-text-two', 'innerHTML', $text);
        if($bNotify)
            $xResponse->dialog()->success("hello-text-two text is now $text");
    }

    public function setColor(string $sColor, bool $bNotify = true)
    {
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('hello-text-two', 'style.color', $sColor);
        if($bNotify)
            $xResponse->dialog()->success("hello-text-two color is now $sColor");
    }

    public function showDialog()
    {
        $xResponse = jaxon()->newResponse();
        $buttons = [['title' => 'Close', 'class' => 'btn', 'click' => 'close']];
        $options = ['width' => 500];
        $xResponse->dialog()->show("Modal Dialog", "This modal dialog is powered by PgwJs!!", $buttons, $options);
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup(configFile('config.yaml'));
