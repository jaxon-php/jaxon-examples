<?php

$loader = new Keradus\Psr4Autoloader;
$loader->register();

// Register the namespace with a third-party autoloader
$loader->addNamespace('Service\\Calculator', ajaxDir('/calculator/lib'));
// Load the config
jaxon()->app()->setup(configFile('calculator.php'));
