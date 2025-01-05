<?php

require(dirname(__DIR__) . '/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Dialogs\Bootbox\BootboxLibrary;
use Jaxon\Dialogs\Bootstrap\BootstrapLibrary;
use Jaxon\Dialogs\CuteAlert\CuteAlertLibrary;
use Jaxon\Dialogs\Toastr\ToastrLibrary;
use Jaxon\Dialogs\JAlert\JAlertLibrary;
use Jaxon\Dialogs\Tingle\TingleLibrary;
use Jaxon\Dialogs\Noty\NotyLibrary;
use Jaxon\Dialogs\Notify\NotifyLibrary;
use Jaxon\Dialogs\SweetAlert\SweetAlertLibrary;
use Jaxon\Dialogs\JQueryConfirm\JQueryConfirmLibrary;
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

        return $xResponse;
    }

    public function showSuccess($id, $name)
    {
        jaxon()->setOption('dialogs.default.message', $id);
        $xResponse = jaxon()->newResponse();
        $xResponse->dialog->title('Yeah Man!!!')->success("Powered by $name!!");

        return $xResponse;
    }

    public function showInfo($id, $name)
    {
        jaxon()->setOption('dialogs.default.message', $id);
        $xResponse = jaxon()->newResponse();
        $xResponse->dialog->title('Yeah Man!!!')->info("Powered by $name!!");

        return $xResponse;
    }

    public function showWarning($id, $name)
    {
        jaxon()->setOption('dialogs.default.message', $id);
        $xResponse = jaxon()->newResponse();
        $xResponse->dialog->title('Yeah Man!!!')->warning("Powered by $name!!");

        return $xResponse;
    }

    public function showError($id, $name)
    {
        jaxon()->setOption('dialogs.default.message', $id);
        $xResponse = jaxon()->newResponse();
        $xResponse->dialog->title('Yeah Man!!!')->error("Powered by $name!!");

        return $xResponse;
    }
}

$aLibraries = [
    // Bootbox
    'bootbox'       => ['class' => BootboxLibrary::class, 'id' => 'bootbox', 'name' => 'Bootbox'],
    // Bootstrap
    'bootstrap'     => ['class' => BootstrapLibrary::class, 'id' => 'bootstrap', 'name' => 'Bootstrap'],
    // CuteAlert
    'cute'          => ['class' => CuteAlertLibrary::class, 'id' => 'cute', 'name' => 'CuteAlert'],
    // Toastr
    'toastr'        => ['class' => ToastrLibrary::class, 'id' => 'toastr', 'name' => 'Toastr'],
    // JAlert
    'jalert'        => ['class' => JAlertLibrary::class, 'id' => 'jalert', 'name' => 'JAlert'],
    // Tingle
    'tingle'        => ['class' => TingleLibrary::class, 'id' => 'tingle', 'name' => 'Tingle'],
    // Noty
    'noty'          => ['class' => NotyLibrary::class, 'id' => 'noty', 'name' => 'Noty'],
    // Notify
    'notify'        => ['class' => NotifyLibrary::class, 'id' => 'notify', 'name' => 'Notify'],
    // SweetAlert
    'sweetalert'    => ['class' => SweetAlertLibrary::class, 'id' => 'sweetalert', 'name' => 'SweetAlert'],
    // JQuery Confirm
    'jconfirm'      => ['class' => JQueryConfirmLibrary::class, 'id' => 'jconfirm', 'name' => 'JQueryConfirm'],
];

$jaxon = jaxon();

// Request processing URI
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->setOption('dialogs.lib.use', ['bootbox', 'bootstrap', 'toastr',
    'tingle', 'jalert', 'noty', 'notify', 'cute', 'sweetalert', 'jconfirm']);

// Register functions
$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
