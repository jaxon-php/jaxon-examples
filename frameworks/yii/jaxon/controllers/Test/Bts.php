<?php

namespace Jaxon\App\Test;

use Jaxon\Request\Factory as xr;
use Jaxon\Yii\Controller as JaxonController;

class Bts extends JaxonController
{
    public function sayHello($isCaps, $bNotify = true)
    {
        $html = $this->view->render('test/hello', ['isCaps' => $isCaps]);
        $this->response->assign('div2', 'innerHTML', $html);
        if(($bNotify))
        {
            $message = $this->view->render('test/message', [
                'element' => 'div2',
                'attr' => 'text',
                'value' => $html,
            ]);
            $this->response->dialog->success($message);
        }
    
        return $this->response;
    }

    public function setColor($sColor, $bNotify = true)
    {
        $this->response->assign('div2', 'style.color', $sColor);
        if(($bNotify))
        {
            $message = $this->view->render('test/message', [
                'element' => 'div2',
                'attr' => 'color',
                'value' => $sColor,
            ]);
            $this->response->dialog->success($message);
        }
    
        return $this->response;
    }

    public function showDialog()
    {
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('width' => 400);
        $html = $this->view->render('test/credit', ['library' => 'Twitter Bootstrap']);
        $this->response->dialog->show("Modal Dialog", $html, $buttons, $options);
    
        return $this->response;
    }
}