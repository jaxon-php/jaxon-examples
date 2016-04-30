<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Xajax\Xajax;
use Xajax\Response\Response;

\Xajax\Config\Json::read(__DIR__ . '/../../config/separated.json', '');

// Use the Composer autoloader
$xajax = Xajax::getInstance();
$xajax->useComposerAutoLoader();

// Add class dirs with namespaces
$xajax->addClassDir(__DIR__ . '/../../classes/namespace/app', 'App');
$xajax->addClassDir(__DIR__ . '/../../classes/namespace/ext', 'Ext');
