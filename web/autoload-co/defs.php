<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

$jaxon = jaxon();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', '');

// Dialog options
$jaxon->setOption('dialogs.default.modal', 'bootstrap');
$jaxon->setOption('dialogs.default.alert', 'toastr');
$jaxon->setOption('dialogs.libraries', ['pgwjs']);
$jaxon->setOption('dialogs.toastr.options.closeButton', true);
$jaxon->setOption('dialogs.toastr.options.positionClass', 'toast-top-center');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Use the Composer autoloader
$jaxon->useComposerAutoloader();

// Add class dirs with namespaces
$jaxon->register(Jaxon::CALLABLE_DIR, __DIR__ . '/../../classes/namespace/app', 'App');
$jaxon->register(Jaxon::CALLABLE_DIR, __DIR__ . '/../../classes/namespace/ext', 'Ext');
