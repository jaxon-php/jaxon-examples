<?php

namespace Jaxon\App\Test;

use Jaxon\Request\Factory as xr;
use Jaxon\Laravel\Controller as JaxonController;

class Pgw extends JaxonController
{
    public function sayHello($isCaps, $bNotify = true)
    {
        $html = $this->view->render('test/hello', ['isCaps' => $isCaps]);
        $this->response->assign('div1', 'innerHTML', $html);
        if(($bNotify))
        {
            $message = $this->view->render('test/message')
                ->with('element', 'div1')
                ->with('attr', 'text')
                ->with('value', $html);
            $this->response->dialog->success($message);
        }
    
        return $this->response;
    }
    
    public function setColor($sColor, $bNotify = true)
    {
        $this->response->assign('div1', 'style.color', $sColor);
        if(($bNotify))
        {
            $message = $this->view->render('test/message')
                ->with('element', 'div1')
                ->with('attr', 'color')
                ->with('value', $sColor);
            $this->response->dialog->success($message);
        }
    
        return $this->response;
    }
    
    public function showDialog()
    {
        $this->response->dialog->setModalLibrary('pgwjs');

        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('maxWidth' => 400);
        $html = $this->view->render('test/credit')->with('library', 'PgwModal');
        $this->response->dialog->show("Modal Dialog", $html, $buttons, $options);
    
        return $this->response;
    }
}
