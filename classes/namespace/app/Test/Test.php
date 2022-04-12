<?php

namespace App\Test;

use Jaxon\Response\Response;

class Test extends \Jaxon\App\CallableClass
{
    public function sayHello($isCaps, $bNotify = true)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';

        $this->response->assign('div1', 'innerHTML', $text);
        if(($bNotify))
            $this->response->dialog->success("div1 text is now $text");

        return $this->response;
    }

    public function setColor($sColor, $bNotify = true)
    {
        $this->response->assign('div1', 'style.color', $sColor);
        if(($bNotify))
            $this->response->dialog->success("div1 color is now $sColor");

        return $this->response;
    }

    public function showDialog()
    {
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('maxWidth' => 400);
        $this->response->dialog->with('pgwjs')
            ->show("Modal Dialog", "This modal dialog is powered by PgwModal!!", $buttons, $options);

        return $this->response;
    }
}
