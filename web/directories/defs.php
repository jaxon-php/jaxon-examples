<?php

require(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../vendor/jaxon-php/jaxon-dialogs/src/start.php');
use function Jaxon\jaxon;

jaxon()->app()->setup(__DIR__ . '/../../config/directories.php');
