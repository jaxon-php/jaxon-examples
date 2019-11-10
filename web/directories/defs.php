<?php

require(__DIR__ . '/../../vendor/autoload.php');

jaxon()->app()->setup(__DIR__ . '/../../config/directories.php');

// $jaxon->setOption('core.debug.on', true);
// $jaxon->setOption('core.prefix.class', '');

// Request processing URI
// $jaxon->setOption('core.request.uri', 'ajax.php');

// Dialog options
// $jaxon->setOption('dialogs.default.modal', 'tingle');
// $jaxon->setOption('dialogs.default.alert', 'toastr');
// $jaxon->setOption('dialogs.libraries', ['pgwjs', 'bootstrap']);
// $jaxon->setOption('dialogs.toastr.options.closeButton', true);
// $jaxon->setOption('dialogs.toastr.options.positionClass', 'toast-top-center');

// Add class dirs
// $jaxon->register(Jaxon::CALLABLE_DIR, __DIR__ . '/../../classes/simple/app');
// $jaxon->register(Jaxon::CALLABLE_DIR, __DIR__ . '/../../classes/simple/ext');
