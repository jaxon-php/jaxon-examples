<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

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
    'bootbox'       => ['class' => 'bootbox', 'name' => 'Bootbox'],
    // Bootstrap
    'bootstrap'     => ['class' => 'bootstrap', 'name' => 'Bootstrap'],
    // PgwJS
    'pgwjs'         => ['class' => 'pgwjs', 'name' => 'PgwJS'],
    // Toastr
    'toastr'        => ['class' => 'toastr', 'name' => 'Toastr'],
    // JAlert
    'jalert'        => ['class' => 'jalert', 'name' => 'JAlert'],
    // Tingle
    'tingle'        => ['class' => 'tingle', 'name' => 'Tingle'],
    // SimplyToast
    'simply'        => ['class' => 'simplytoast', 'name' => 'SimplyToast'],
    // Noty
    'noty'          => ['class' => 'noty', 'name' => 'Noty'],
    // Notify
    'notify'        => ['class' => 'notify', 'name' => 'Notify'],
    // Lobibox
    'lobibox'       => ['class' => 'lobibox', 'name' => 'Lobibox'],
    // Overhang
    'overhang'      => ['class' => 'overhang', 'name' => 'Overhang'],
    // PNotify
    'pnotify'       => ['class' => 'pnotify', 'name' => 'PNotify'],
    // SweetAlert
    'sweetalert'    => ['class' => 'swal', 'name' => 'SweetAlert'],
    // JQuery Confirm
    'jconfirm'      => ['class' => 'jconfirm', 'name' => 'JQueryConfirm'],
    // IziModal and IziToast
    'izi-toast'     => ['class' => 'izi', 'name' => 'Izi'],
    // YmzBox
    'ymzbox'        => ['class' => 'ymzbox', 'name' => 'YmzBox'],
];

$jaxon = jaxon();

$jaxon->setOption('dialogs.libraries', array_keys($aLibraries));

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Register functions
$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
