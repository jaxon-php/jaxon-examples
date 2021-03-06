<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\CallableClass;
use Jaxon\Response\Response;

class HelloWorld extends CallableClass
{
    public function sayHello($isCaps, $bNotify = true)
    {
        $text = ($isCaps ? 'HELLO WORLD!': 'Hello World!');
        if(($bNotify))
        {
            // $this->response->confirmCommands(2, 'Skip text assignement?');
            $this->response->assign('div2', 'innerHTML', $text);
            // $this->response->confirmCommands(1, 'Skip text notification?');
            $this->response->dialog->success("div2 text is now $text");
        }
        else
        {
            // $this->response->confirmCommands(1, 'Skip text assignement?');
            $this->response->assign('div2', 'innerHTML', $text);
        }

        return $this->response;
    }

    public function setColor($sColor, $bNotify = true)
    {
        if(($bNotify))
        {
            // $this->response->confirmCommands(1, 'Skip color assignement?');
            $this->response->assign('div2', 'style.color', $sColor);
            // $this->response->confirmCommands(1, 'Skip color assignement?');
            $this->response->dialog->success("div2 color is now $sColor");
        }
        else
        {
            // $this->response->confirmCommands(1, 'Skip color assignement?');
            $this->response->assign('div2', 'style.color', $sColor);
        }

        return $this->response;
    }

    public function showDialog()
    {
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('width' => 500);
        $this->response->dialog->show("Modal Dialog", "This modal dialog is powered by Bootbox!!", $buttons, $options);

        return $this->response;
    }
}

$jaxon = jaxon();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', 'Jaxon');

// Js options
// $jaxon->setOption('js.lib.uri', '/exp/js/lib');
// $jaxon->setOption('js.app.minify', false);

// Dialog options
$jaxon->setOption('dialogs.default.modal', 'bootbox');
$jaxon->setOption('dialogs.default.message', 'ymzbox');
$jaxon->setOption('dialogs.default.question', 'ymzbox');

$jaxon->setOption('dialogs.confirm.title', 'Confirmer');
$jaxon->setOption('dialogs.confirm.yes', 'Oui');
$jaxon->setOption('dialogs.confirm.no', 'Non');

$jaxon->setOption('dialogs.toastr.options.closeButton', true);
$jaxon->setOption('dialogs.toastr.options.positionClass', 'toast-top-center');
$jaxon->setOption('dialogs.pnotify.options.styling', 'bootstrap3');
$jaxon->setOption('dialogs.pgwjs.options.modal.maxWidth', 800);

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->plugin('dialog')->registerClasses();

// Register object
$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
