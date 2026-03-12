<?php

namespace App\Test;

class Test extends \Jaxon\App\FuncComponent
{
    public function sayHello(bool $isCaps, bool $bNotify = true)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $this->response()->assign('hello-text-one', 'innerHTML', $text);
        if(($bNotify))
            $this->response()->dialog()->success("hello-text-one text is now $text");
    }

    public function setColor(string $sColor, bool $bNotify = true)
    {
        $this->response()->assign('hello-text-one', 'style.color', $sColor);
        if(($bNotify))
            $this->response()->dialog()->success("hello-text-one color is now $sColor");
    }

    public function showDialog()
    {
        $buttons = [['title' => 'Close', 'class' => 'btn', 'click' => 'close']];
        $options = ['maxWidth' => 400];
        $this->response()->dialog()->with('bootbox')->show("Modal Dialog",
            "This modal dialog is powered by Bootbox!!", $buttons, $options);
    }
}
