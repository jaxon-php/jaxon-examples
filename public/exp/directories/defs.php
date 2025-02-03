<?php

require dirname(__DIR__, 3) . '/includes/autoload.php';
use function Jaxon\jaxon;

jaxon()->app()->setup(__DIR__ . '/../../../config/directories.php');
