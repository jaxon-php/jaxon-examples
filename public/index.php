<?php

$includesDir = dirname(__DIR__) . '/includes';
require "$includesDir/autoload.php";

echo Jaxon\jaxon()->template()
    ->addNamespace('examples', $includesDir)
    ->render('examples::index.php');
