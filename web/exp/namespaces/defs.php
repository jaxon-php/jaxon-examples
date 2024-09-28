<?php

require(dirname(__DIR__) . '/autoload.php');
use function Jaxon\jaxon;

jaxon()->callback()->before(function($target, &$end) {
    error_log('Target: ' . print_r($target, true));
});

jaxon()->app()->setup(__DIR__ . '/../../../config/namespaces.php');
