<?php

require(dirname(__DIR__) . '/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Dialogs\Library\Alertify;
use Jaxon\Dialogs\Library\Bootbox;
use Jaxon\Dialogs\Library\Bootstrap;
use Jaxon\Dialogs\Library\CuteAlert;
use Jaxon\Dialogs\Library\Toastr;
use Jaxon\Dialogs\Library\JAlert;
use Jaxon\Dialogs\Library\Tingle;
use Jaxon\Dialogs\Library\Noty;
use Jaxon\Dialogs\Library\Notify;
use Jaxon\Dialogs\Library\SweetAlert;
use Jaxon\Dialogs\Library\JQueryConfirm;

use function Jaxon\attr;
use function Jaxon\jaxon;
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
        jaxon()->setOption('dialogs.default.modal', $id);
        $xResponse = jaxon()->newResponse();
        $buttons = [['title' => 'Close', 'class' => 'btn', 'click' => 'close']];
        $options = [];
        $xResponse->dialog->show('Modal Dialog', $this->content($name), $buttons, $options);
    }

    public function showSuccess($id, $name)
    {
        jaxon()->setOption('dialogs.default.message', $id);
        $xResponse = jaxon()->newResponse();
        $xResponse->dialog->title('Yeah Man!!!')->success("Powered by $name!!");
    }

    public function showInfo($id, $name)
    {
        jaxon()->setOption('dialogs.default.message', $id);
        $xResponse = jaxon()->newResponse();
        $xResponse->dialog->title('Yeah Man!!!')->info("Powered by $name!!");
    }

    public function showWarning($id, $name)
    {
        jaxon()->setOption('dialogs.default.message', $id);
        $xResponse = jaxon()->newResponse();
        $xResponse->dialog->title('Yeah Man!!!')->warning("Powered by $name!!");
    }

    public function showError($id, $name)
    {
        jaxon()->setOption('dialogs.default.message', $id);
        $xResponse = jaxon()->newResponse();
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

// Request processing URI
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->setOption('dialogs.lib.use', ['alertify', 'bootbox', 'bootstrap', 'toastr',
    'tingle', 'jalert', 'noty', 'notify', 'cute', 'sweetalert', 'jconfirm']);

// Register functions
$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
