<?php

namespace Ext\Test;

class Test extends \Jaxon\App\FuncComponent
{
    public function sayHello(bool $isCaps, bool $bNotify = true)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $this->response()->assign('hello-text-two', 'innerHTML', $text);
        if(($bNotify))
            $this->response()->dialog()->success("hello-text-two text is now $text");
    }

    public function setColor(string $sColor, bool $bNotify = true)
    {
        $this->response()->assign('hello-text-two', 'style.color', $sColor);
        if(($bNotify))
            $this->response()->dialog()->success("hello-text-two color is now $sColor");
    }

    public function showDialog()
    {
        $buttons = [['title' => 'Close', 'class' => 'btn', 'click' => 'close']];
        $width = 300;
        $this->response()->dialog()->with('bootstrap5')->show("Modal Dialog",
            "This modal dialog is powered by Twitter Bootstrap!!", $buttons, compact('width'));
    }
}
