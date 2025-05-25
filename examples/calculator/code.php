<?php

use function Jaxon\jaxon;

// Register the namespace with a third-party autoloader
$loader = new Keradus\Psr4Autoloader;
$loader->register();
$loader->addNamespace('Service\\Calculator', classDir('/calculator/lib'));

// Load the config
jaxon()->app()->setup(configFile('calculator.php'));
