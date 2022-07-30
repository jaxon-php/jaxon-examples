<?php

require(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../vendor/jaxon-php/jaxon-dialogs/src/start.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;
use Jaxon\Dialogs\Bootbox\BootboxLibrary;
use Jaxon\Dialogs\Bootstrap\BootstrapLibrary;
use Jaxon\Dialogs\PgwJs\PgwJsLibrary;
use Jaxon\Dialogs\Toastr\ToastrLibrary;
use Jaxon\Dialogs\JAlert\JAlertLibrary;
use Jaxon\Dialogs\Tingle\TingleLibrary;
use Jaxon\Dialogs\Noty\NotyLibrary;
use Jaxon\Dialogs\Notify\NotifyLibrary;
use Jaxon\Dialogs\Overhang\OverhangLibrary;
use Jaxon\Dialogs\PNotify\PNotifyLibrary;
use Jaxon\Dialogs\SweetAlert\SweetAlertLibrary;
use Jaxon\Dialogs\JQueryConfirm\JQueryConfirmLibrary;

class HelloWorld
{
    public function showDialog($id, $name)
    {
        jaxon()->setOption('dialogs.default.modal', $id);
        $xResponse = jaxon()->newResponse();
        $buttons = [['title' => 'Close', 'class' => 'btn', 'click' => 'close']];
        $options = [];
        $xResponse->dialog->show("Modal Dialog", "This modal dialog is powered by $name!!", $buttons, $options);

        return $xResponse;
    }
}

$aLibraries = [
    // Bootbox
    'bootbox'       => ['class' => BootboxLibrary::class, 'id' => 'bootbox', 'name' => 'Bootbox'],
    // Bootstrap
    'bootstrap'     => ['class' => BootstrapLibrary::class, 'id' => 'bootstrap', 'name' => 'Bootstrap'],
    // PgwJs
    'pgwjs'         => ['class' => PgwJsLibrary::class, 'id' => 'pgwjs', 'name' => 'PgwJs'],
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
    // Overhang
    'overhang'      => ['class' => OverhangLibrary::class, 'id' => 'overhang', 'name' => 'Overhang'],
    // PNotify
    'pnotify'       => ['class' => PNotifyLibrary::class, 'id' => 'pnotify', 'name' => 'PNotify'],
    // SweetAlert
    'sweetalert'    => ['class' => SweetAlertLibrary::class, 'id' => 'swal', 'name' => 'SweetAlert'],
    // JQuery Confirm
    'jconfirm'      => ['class' => JQueryConfirmLibrary::class, 'id' => 'jconfirm', 'name' => 'JQueryConfirm'],
];

$jaxon = jaxon();

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Register functions
$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
