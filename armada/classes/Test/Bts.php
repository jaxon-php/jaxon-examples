<?php

namespace Jaxon\App\Test;

use Jaxon\Sentry\Classes\Armada as JaxonClass;

class Bts extends JaxonClass
{
    public function sayHello($sTemplate, $isCaps, $bNotify = true)
    {
        $html = $this->view()->render($sTemplate . '::test/hello', ['isCaps' => $isCaps]);
        $this->response->assign('div2', 'innerHTML', $html);
        if(($bNotify))
        {
            // Show last command, and save this one in the session.
            $this->instance('.Session')->command('sayHello');
            // Show a success notification.
            $message = $this->view()->render($sTemplate . '::test/message', [
                'element' => 'div2',
                'attr' => 'text',
                'value' => $html,
            ]);
            $this->response->dialog->success($message, $this->session()->get('DialogTitle', 'No title'));
        }

        return $this->response;
    }

    public function setColor($sTemplate, $sColor, $bNotify = true)
    {
        $this->response->assign('div2', 'style.color', $sColor);
        $this->response->dialog->hide();
        if(($bNotify))
        {
            // Show last command, and save this one in the session.
            $this->instance('.Session')->command('setColor');
            // Show a success notification.
            $message = $this->view()->render($sTemplate . '::test/message', [
                'element' => 'div2',
                'attr' => 'color',
                'value' => $sColor,
            ]);
            $this->response->dialog->success($message, $this->session()->get('DialogTitle', 'No title'));
        }

        return $this->response;
    }

    public function showDialog($sTemplate)
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
        $width = 300;
        $html = $this->view()->render($sTemplate . '::test/credit', ['library' => 'Twitter Bootstrap']);
        $this->response->dialog->show("Modal Dialog", $html, $buttons, compact('width'));

        return $this->response;
    }
}
