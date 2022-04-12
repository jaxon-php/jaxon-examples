<?php

namespace App\Jaxon\Test;

use Jaxon\App\CallableClass as JaxonClass;

class Pgw extends JaxonClass
{
    public function sayHello($isCaps, $bNotify = true)
    {
        $html = $this->view()->render('test/hello', ['isCaps' => $isCaps]);
        $this->response->assign('div1', 'innerHTML', $html);
        if(($bNotify))
        {
            // Show last command, and save this one in the session.
            $this->cl(Session::class)->command('sayHello');
            // Show a success notification.
            $message = $this->view()->render('test/message', [
                'element' => 'div1',
                'attr' => 'text',
                'value' => $html,
            ]);
            $this->response->dialog->success($message, $this->session()->get('DialogTitle', 'No title'));
        }

        return $this->response;
    }

    public function setColor($sColor, $bNotify = true)
    {
        $this->response->assign('div1', 'style.color', $sColor);
        if(($bNotify))
        {
            // Show last command, and save this one in the session.
            $this->cl(Session::class)->command('setColor');
            // Show a success notification.
            $message = $this->view()->render('test/message', [
                'element' => 'div1',
                'attr' => 'color',
                'value' => $sColor,
            ]);
            $this->response->dialog->success($message, $this->session()->get('DialogTitle', 'No title'));
        }

        return $this->response;
    }

    public function showDialog()
    {
        $buttons = array(
            array(
                'title' => 'Clear session',
                'class' => 'btn',
                'click' => $this->cl('.Session')->rq()->reset()
            ),
            array(
                'title' => 'Close',
                'class' => 'btn',
                'click' => 'close'
            )
        );
        $options = array('maxWidth' => 400);
        $html = $this->view()->render('test/credit', ['library' => 'PgwModal']);
        $this->response->dialog->with('pgwjs')->show("Modal Dialog", $html, $buttons, $options);

        return $this->response;
    }
}
