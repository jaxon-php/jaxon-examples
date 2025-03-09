<?php

$includesDir = dirname(__DIR__, 3) . '/includes';
require "$includesDir/autoload.php";
require "$includesDir/exp/directories/code.php";

// Request processing URI
Jaxon\jaxon()->setOption('core.request.uri', "/exp/ajax.php?exp=directories");

echo Jaxon\jaxon()->template()
    ->addNamespace('examples', $includesDir)
    ->render('examples::exp/directories/page.php');
