<?php

use function Jaxon\jaxon;

require dirname(__DIR__, 2) . '/vendor/autoload.php';
require_once __DIR__ . '/menu.php';

$configDir = dirname(__DIR__) . '/config';
$classesDir = dirname(__DIR__) . '/classes';
$templatesDir = dirname(__DIR__) . '/templates';

jaxon()->template()
    ->addNamespace('examples', __DIR__)
    ->addNamespace('templates', $templatesDir);
