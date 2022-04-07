<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;
use Jaxon\Dialogs\Library\Bootbox\BootboxLibrary;
use Jaxon\Dialogs\Library\Bootstrap\BootstrapLibrary;
use Jaxon\Dialogs\Library\PgwJS\PgwJsLibrary;
use Jaxon\Dialogs\Library\Toastr\ToastrLibrary;
use Jaxon\Dialogs\Library\JAlert\JAlertLibrary;
use Jaxon\Dialogs\Library\Tingle\TingleLibrary;
use Jaxon\Dialogs\Library\SimplyToast\SimplyToastLibrary;
use Jaxon\Dialogs\Library\Noty\NotyLibrary;
use Jaxon\Dialogs\Library\Notify\NotifyLibrary;
use Jaxon\Dialogs\Library\Lobibox\LobiboxLibrary;
use Jaxon\Dialogs\Library\Overhang\OverhangLibrary;
use Jaxon\Dialogs\Library\PNotify\PNotifyLibrary;
use Jaxon\Dialogs\Library\SweetAlert\SweetAlertLibrary;
use Jaxon\Dialogs\Library\JQueryConfirm\JQueryConfirmLibrary;

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
    // PgwJS
    'pgwjs'         => ['class' => PgwJsLibrary::class, 'id' => 'pgwjs', 'name' => 'PgwJS'],
    // Toastr
    'toastr'        => ['class' => ToastrLibrary::class, 'id' => 'toastr', 'name' => 'Toastr'],
    // JAlert
    'jalert'        => ['class' => JAlertLibrary::class, 'id' => 'jalert', 'name' => 'JAlert'],
    // Tingle
    'tingle'        => ['class' => TingleLibrary::class, 'id' => 'tingle', 'name' => 'Tingle'],
    // SimplyToast
    'simply'        => ['class' => SimplyToastLibrary::class, 'id' => 'simplytoast', 'name' => 'SimplyToast'],
    // Noty
    'noty'          => ['class' => NotyLibrary::class, 'id' => 'noty', 'name' => 'Noty'],
    // Notify
    'notify'        => ['class' => NotifyLibrary::class, 'id' => 'notify', 'name' => 'Notify'],
    // Lobibox
    'lobibox'       => ['class' => LobiboxLibrary::class, 'id' => 'lobibox', 'name' => 'Lobibox'],
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

foreach($aLibraries as $sName => $aLibrary)
{
    $jaxon->dialog()->registerLibrary($aLibrary['class'], $sName);
}

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Register functions
$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
