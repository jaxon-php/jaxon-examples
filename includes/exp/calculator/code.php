<?php

use function Jaxon\jaxon;

// Register the namespace with a third-party autoloader
$loader = new Keradus\Psr4Autoloader;
$loader->register();
$loader->addNamespace('Service\\Calculator', $classesDir . '/calculator/lib');

// Load the config
jaxon()->app()->setup($configDir . '/calculator.php');
