<?php

require(__DIR__ . '/../../vendor/autoload.php');

jaxon()->callback()->before(function($target, &$end) {
    error_log('Target: ' . print_r($target, true));
});

jaxon()->app()->setup(__DIR__ . '/../../config/namespaces.php');
