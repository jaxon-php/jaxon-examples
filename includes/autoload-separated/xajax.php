<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

\Jaxon\Config\Json::read(__DIR__ . '/../../config/separated.json', '');

// Use the Composer autoloader
$jaxon = Jaxon::getInstance();
$jaxon->useComposerAutoloader();

// Add class dirs with namespaces
$jaxon->addClassDir(__DIR__ . '/../../classes/namespace/app', 'App');
$jaxon->addClassDir(__DIR__ . '/../../classes/namespace/ext', 'Ext');
