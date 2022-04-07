<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Dialogs\Library\Bootstrap\BootstrapLibrary;
use Jaxon\Dialogs\Library\PgwJS\PgwJsLibrary;
use Jaxon\Dialogs\Library\Toastr\ToastrLibrary;

$jaxon = jaxon();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', '');

// Dialog options
$jaxon->setOption('dialogs.default.modal', 'bootstrap');
$jaxon->setOption('dialogs.default.alert', 'toastr');
$jaxon->setOption('dialogs.libraries', [
    BootstrapLibrary::class => BootstrapLibrary::NAME,
    PgwJsLibrary::class => PgwJsLibrary::NAME,
    ToastrLibrary::class => ToastrLibrary::NAME,
]);
$jaxon->setOption('dialogs.toastr.options.closeButton', true);
$jaxon->setOption('dialogs.toastr.options.positionClass', 'toast-top-center');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Add class dirs with namespaces
$jaxon->register(Jaxon::CALLABLE_DIR, __DIR__ . '/../../classes/namespace/app', ['namespace' => 'App']);
$jaxon->register(Jaxon::CALLABLE_DIR, __DIR__ . '/../../classes/namespace/ext', ['namespace' => 'Ext']);
