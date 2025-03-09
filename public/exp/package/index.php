<?php

$includesDir = dirname(__DIR__, 3) . '/includes';
require "$includesDir/autoload.php";
require "$includesDir/exp/package/code.php";

// Request processing URI
Jaxon\jaxon()->setOption('core.request.uri', "/exp/ajax.php?exp=package");

echo Jaxon\jaxon()->template()
    ->addNamespace('examples', $includesDir)
    ->render('examples::exp/package/page.php');
