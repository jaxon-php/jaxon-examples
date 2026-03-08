<?php

// Register the namespace with a third-party autoloader
$loader = new Keradus\Psr4Autoloader;
$loader->register();
$loader->addNamespace('Service\\Calculator', ajaxDir('/calculator/lib'));

// Load the config
jaxon()->app()->setup(configFile('calculator.php'));
