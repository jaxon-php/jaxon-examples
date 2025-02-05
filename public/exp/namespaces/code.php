<?php
use function Jaxon\jaxon;

jaxon()->callback()->before(function($target, &$end) {
    error_log('Target: ' . print_r($target, true));
});

jaxon()->app()->setup($configDir . '/namespaces.php');
