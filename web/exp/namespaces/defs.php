<?php

require(__DIR__ . '/../../../vendor/autoload.php');
require_once(__DIR__ . '/../../../vendor/jaxon-php/jaxon-dialogs/src/start.php');
use function Jaxon\jaxon;

jaxon()->callback()->before(function($target, &$end) {
    error_log('Target: ' . print_r($target, true));
});

jaxon()->app()->setup(__DIR__ . '/../../../config/namespaces.php');
