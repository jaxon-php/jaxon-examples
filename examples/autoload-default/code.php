<?php

use Jaxon\Jaxon;

$jaxon = jaxon();

$jaxon->setOption('js.lib.uri', '/js');
// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', '');

// Dialog options
$jaxon->setAppOption('dialogs.default.modal', 'bootstrap5');
$jaxon->setAppOption('dialogs.default.alert', 'toastr');
$jaxon->setAppOption('dialogs.toastr.options.alert.closeButton', true);
$jaxon->setAppOption('dialogs.toastr.options.alert.positionClass', 'toast-top-center');
$jaxon->setAppOption('dialogs.lib.use', ['tingle']);

// Add class dirs with namespaces
$jaxon->register(Jaxon::CALLABLE_DIR, classDir('/namespace/app'), ['namespace' => 'App']);
$jaxon->register(Jaxon::CALLABLE_DIR, classDir('/namespace/ext'), ['namespace' => 'Ext']);
