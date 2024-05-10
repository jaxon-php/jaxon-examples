<?php

require(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../vendor/jaxon-php/jaxon-dialogs/src/start.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;
use Jaxon\Dialogs\Bootstrap\BootstrapLibrary;
use Jaxon\Dialogs\PgwJs\PgwJsLibrary;
use Jaxon\Dialogs\Toastr\ToastrLibrary;
use function Jaxon\jaxon;

$jaxon = jaxon();

$jaxon->setOption('js.lib.uri', '/js');
// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', '');

// Dialog options
$jaxon->setOption('dialogs.default.modal', 'bootstrap');
$jaxon->setOption('dialogs.default.message', 'toastr');
$jaxon->setOption('dialogs.toastr.options.closeButton', true);
$jaxon->setOption('dialogs.toastr.options.positionClass', 'toast-top-center');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Add class dirs with namespaces
$jaxon->register(Jaxon::CALLABLE_DIR, __DIR__ . '/../../classes/namespace/app', ['namespace' => 'App']);
$jaxon->register(Jaxon::CALLABLE_DIR, __DIR__ . '/../../classes/namespace/ext', ['namespace' => 'Ext']);
