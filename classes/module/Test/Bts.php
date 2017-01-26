<?php

namespace Jaxon\App\Test;

use Jaxon\Module\Controller;

class Bts extends Controller
{
    public function sayHello($isCaps, $bNotify = true)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';
    
        $this->response->assign('div2', 'innerHTML', $text);
        if(($bNotify))
            $this->response->dialog->success("div2 text is now $text");
    
        return $this->response;
    }
    
    public function setColor($sColor, $bNotify = true)
    {
        $this->response->assign('div2', 'style.color', $sColor);
        if(($bNotify))
            $this->response->dialog->success("div2 color is now $sColor");
    
        return $this->response;
    }
    
    public function showDialog()
    {
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $width = 300;
        $this->response->dialog->show("Modal Dialog", "This modal dialog is powered by Twitter Bootstrap!!", $buttons, compact('width'));
    
        return $this->response;
    }
}
