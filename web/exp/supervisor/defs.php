<?php

require(__DIR__ . '/../../../vendor/autoload.php');
require_once(__DIR__ . '/../../../includes/menu.php');

use function Jaxon\jaxon;

// Register object
$jaxon = jaxon();

$jaxon->app()->setup(__DIR__ . '/../../../config/supervisor.php');
