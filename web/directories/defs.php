<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Response\Response;

$jaxon = jaxon();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', '');

// Dialog options
$jaxon->setOption('dialogs.default.modal', 'tingle');
$jaxon->setOption('dialogs.default.alert', 'toastr');
$jaxon->setOption('dialogs.libraries', array('pgwjs', 'bootstrap'));
$jaxon->setOption('dialogs.toastr.options.closeButton', true);
$jaxon->setOption('dialogs.toastr.options.positionClass', 'toast-top-center');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Add class dirs
$jaxon->addClassDir(__DIR__ . '/../../classes/simple/app');
$jaxon->addClassDir(__DIR__ . '/../../classes/simple/ext');
