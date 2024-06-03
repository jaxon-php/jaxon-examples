<?php

require(__DIR__ . '/../../../vendor/autoload.php');
use function Jaxon\jaxon;

jaxon()->app()->setup(__DIR__ . '/../../../config/component.php');
