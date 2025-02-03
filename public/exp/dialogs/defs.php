<?php

require dirname(__DIR__, 3) . '/includes/autoload.php';

use Jaxon\Jaxon;
use Jaxon\Dialogs\Dialog\Library\Alertify;
use Jaxon\Dialogs\Dialog\Library\Bootbox;
use Jaxon\Dialogs\Dialog\Library\Bootstrap;
use Jaxon\Dialogs\Dialog\Library\CuteAlert;
use Jaxon\Dialogs\Dialog\Library\Toastr;
use Jaxon\Dialogs\Dialog\Library\JAlert;
use Jaxon\Dialogs\Dialog\Library\Tingle;
use Jaxon\Dialogs\Dialog\Library\Noty;
use Jaxon\Dialogs\Dialog\Library\Notify;
use Jaxon\Dialogs\Dialog\Library\SweetAlert;
use Jaxon\Dialogs\Dialog\Library\JQueryConfirm;

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

$aLibraries = [
    // Alertify
    'alertify'      => ['class' => Alertify::class, 'id' => 'alertify', 'name' => 'Alertify'],
    // Bootbox
    'bootbox'       => ['class' => Bootbox::class, 'id' => 'bootbox', 'name' => 'Bootbox'],
    // Bootstrap
    'bootstrap'     => ['class' => Bootstrap::class, 'id' => 'bootstrap', 'name' => 'Bootstrap'],
    // CuteAlert
    'cute'          => ['class' => CuteAlert::class, 'id' => 'cute', 'name' => 'CuteAlert'],
    // Toastr
    'toastr'        => ['class' => Toastr::class, 'id' => 'toastr', 'name' => 'Toastr'],
    // JAlert
    'jalert'        => ['class' => JAlert::class, 'id' => 'jalert', 'name' => 'JAlert'],
    // Tingle
    'tingle'        => ['class' => Tingle::class, 'id' => 'tingle', 'name' => 'Tingle'],
    // Noty
    'noty'          => ['class' => Noty::class, 'id' => 'noty', 'name' => 'Noty'],
    // Notify
    'notify'        => ['class' => Notify::class, 'id' => 'notify', 'name' => 'Notify'],
    // SweetAlert
    'sweetalert'    => ['class' => SweetAlert::class, 'id' => 'sweetalert', 'name' => 'SweetAlert'],
    // JQuery Confirm
    'jconfirm'      => ['class' => JQueryConfirm::class, 'id' => 'jconfirm', 'name' => 'JQueryConfirm'],
];

$jaxon = jaxon();
$jaxon->app()->setup(__DIR__ . '/../../../config/dialogs.php');
