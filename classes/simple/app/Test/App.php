<?php

class App extends \Jaxon\App\FuncComponent
{
    public function sayHello(bool $isCaps, bool $bNotify = true)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';

        $this->response->assign('div1', 'innerHTML', $text);
        if(($bNotify))
            $this->response->dialog->success("div1 text is now $text");
    }

    public function setColor(string $sColor, bool $bNotify = true)
    {
        $this->response->assign('div1', 'style.color', $sColor);
        if(($bNotify))
            $this->response->dialog->success("div1 color is now $sColor");
    }

    public function showDialog()
    {
        $buttons = [['title' => 'Close', 'class' => 'btn', 'click' => 'close']];
        $options = ['maxWidth' => 400];
        $this->response->dialog->with('bootbox')
            ->show("Modal Dialog", "This modal dialog is powered by Bootbox!!", $buttons, $options);
    }
}
