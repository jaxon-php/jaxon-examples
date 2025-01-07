<?php

namespace Ext\Test;

class Test extends \Jaxon\App\CallableClass
{
    public function sayHello(bool $isCaps, bool $bNotify = true)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $this->response->assign('div2', 'innerHTML', $text);
        if(($bNotify))
            $this->response->dialog->success("div2 text is now $text");
    }

    public function setColor(string $sColor, bool $bNotify = true)
    {
        $this->response->assign('div2', 'style.color', $sColor);
        if(($bNotify))
            $this->response->dialog->success("div2 color is now $sColor");
    }

    public function showDialog()
    {
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $width = 300;
        $this->response->dialog->with('bootstrap')->show("Modal Dialog",
            "This modal dialog is powered by Twitter Bootstrap!!", $buttons, compact('width'));
    }
}
