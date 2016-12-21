<?php

namespace Jaxon\App\Test;

use Jaxon\Request\Factory as xr;
use Jaxon\AjaxBundle\Controller as JaxonController;

class Pgw extends JaxonController
{
    public function sayHello($isCaps, $bNotify = true)
    {
        $html = $this->view->render('test/hello.html.twig', ['isCaps' => $isCaps]);
        $this->response->assign('div1', 'innerHTML', $html);
        if(($bNotify))
        {
            $message = $this->view->render('test/message.html.twig', [
                'element' => 'div1',
                'attr' => 'text',
                'value' => $html,
            ]);
            $this->response->dialog->success($message);
        }
    
        return $this->response;
    }

    public function setColor($sColor, $bNotify = true)
    {
        $this->response->assign('div1', 'style.color', $sColor);
        if(($bNotify))
        {
            $message = $this->view->render('test/message.html.twig', [
                'element' => 'div1',
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
        $options = array('maxWidth' => 400);
        $html = $this->view->render('test/credit.html.twig', ['library' => 'PgwModal']);
        $this->response->dialog->modal("Modal Dialog", $html, $buttons, $options);
    
        return $this->response;
    }
}
