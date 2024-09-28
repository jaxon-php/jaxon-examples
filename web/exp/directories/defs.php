<?php

require(dirname(__DIR__) . '/autoload.php');
use function Jaxon\jaxon;

jaxon()->app()->setup(__DIR__ . '/../../../config/directories.php');
