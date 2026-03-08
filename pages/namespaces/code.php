<?php

jaxon()->callback()->before(function($target, &$end) {
    error_log('Target: ' . print_r($target, true));
});

jaxon()->app()->setup(configFile('namespaces.php'));
