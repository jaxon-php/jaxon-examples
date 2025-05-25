<?php

use function Jaxon\attr;
use function Jaxon\jaxon;
use function Jaxon\js;
use function Jaxon\rq;

class HelloWorld
{
    private function content(string $name): string
    {
        return '<div ' . attr()->bind(rq(HelloWorld::class)) .
            '>This modal dialog is powered by ' . $name . '!!</div>';
    }

    public function showDialog($id, $name)
    {
        jaxon()->app()->setOption('dialogs.default.modal', $id);
        $xResponse = jaxon()->getResponse();
        $buttons = [
            ['title' => 'Close', 'class' => 'btn btn-danger', 'click' => 'close'],
            ['title' => 'Do', 'class' => 'btn', 'click' => js('console')->log("Clicked on the button!!")]
        ];
        $options = [];
        $xResponse->dialog->show('Modal Dialog', $this->content($name), $buttons, $options);
    }

    public function showConfirm($id, $name)
    {
        jaxon()->app()->setOption('dialogs.default.confirm', $id);
        jaxon()->app()->setOption('dialogs.default.alert', $id);
        jaxon()->getResponse()->alert('Oh! Yeah!!!');
    }

    public function showSuccess($id, $name)
    {
        jaxon()->app()->setOption('dialogs.default.alert', $id);
        $xResponse = jaxon()->getResponse();
        $xResponse->dialog->title('Yeah Man!!!')->success("Powered by $name!!");
    }

    public function showInfo($id, $name)
    {
        jaxon()->app()->setOption('dialogs.default.alert', $id);
        $xResponse = jaxon()->getResponse();
        $xResponse->dialog->title('Yeah Man!!!')->info("Powered by $name!!");
    }

    public function showWarning($id, $name)
    {
        jaxon()->app()->setOption('dialogs.default.alert', $id);
        $xResponse = jaxon()->getResponse();
        $xResponse->dialog->title('Yeah Man!!!')->warning("Powered by $name!!");
    }

    public function showError($id, $name)
    {
        jaxon()->app()->setOption('dialogs.default.alert', $id);
        $xResponse = jaxon()->getResponse();
        $xResponse->dialog->title('Yeah Man!!!')->error("Powered by $name!!");
    }
}

$jaxon = jaxon();
$jaxon->app()->setup(configFile('dialogs.php'));
