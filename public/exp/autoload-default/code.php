<?php

use Jaxon\Jaxon;
use function Jaxon\jaxon;

$jaxon = jaxon();

$jaxon->setOption('js.lib.uri', '/js');
// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', '');

// Dialog options
$jaxon->app()->setOption('dialogs.default.modal', 'bootstrap5');
$jaxon->app()->setOption('dialogs.default.alert', 'toastr');
$jaxon->app()->setOption('dialogs.toastr.options.alert.closeButton', true);
$jaxon->app()->setOption('dialogs.toastr.options.alert.positionClass', 'toast-top-center');
$jaxon->app()->setOption('dialogs.lib.use', ['tingle']);

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Add class dirs with namespaces
$jaxon->register(Jaxon::CALLABLE_DIR, $classesDir . '/namespace/app', ['namespace' => 'App']);
$jaxon->register(Jaxon::CALLABLE_DIR, $classesDir . '/namespace/ext', ['namespace' => 'Ext']);
