<?php

$includesDir = dirname(__DIR__, 3) . '/includes';
require "$includesDir/autoload.php";
require "$includesDir/exp/event-target/code.php";

// Request processing URI
Jaxon\jaxon()->setOption('core.request.uri', "/exp/ajax.php?exp=event-target");

echo Jaxon\jaxon()->template()
    ->addNamespace('examples', $includesDir)
    ->render('examples::exp/event-target/page.php');
