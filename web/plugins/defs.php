<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

class HelloWorld
{
    public function sayHello($isCaps, $bNotify = true)
    {
        $text = ($isCaps ? 'HELLO WORLD!': 'Hello World!');
        $xResponse = new Response();
        if(($bNotify))
        {
            // $xResponse->confirmCommands(2, 'Skip text assignement?');
            $xResponse->assign('div2', 'innerHTML', $text);
            // $xResponse->confirmCommands(1, 'Skip text notification?');
            $xResponse->dialog->success("div2 text is now $text");
        }
        else
        {
            // $xResponse->confirmCommands(1, 'Skip text assignement?');
            $xResponse->assign('div2', 'innerHTML', $text);
        }

        return $xResponse;
    }

    public function setColor($sColor, $bNotify = true)
    {
        $xResponse = new Response();
        if(($bNotify))
        {
            // $xResponse->confirmCommands(1, 'Skip color assignement?');
            $xResponse->assign('div2', 'style.color', $sColor);
            // $xResponse->confirmCommands(1, 'Skip color assignement?');
            $xResponse->dialog->success("div2 color is now $sColor");
        }
        else
        {
            // $xResponse->confirmCommands(1, 'Skip color assignement?');
            $xResponse->assign('div2', 'style.color', $sColor);
        }

        return $xResponse;
    }

    public function showDialog()
    {
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('width' => 500);
        $xResponse->dialog->show("Modal Dialog", "This modal dialog is powered by Bootbox!!", $buttons, $options);

        return $xResponse;
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
$jaxon->setOption('dialogs.default.alert', 'ymzbox');
$jaxon->setOption('dialogs.default.confirm', 'ymzbox');

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
$jaxon->register(Jaxon::CALLABLE_OBJECT, new HelloWorld());
