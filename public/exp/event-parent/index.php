<?php

$includesDir = dirname(__DIR__, 3) . '/includes';
require "$includesDir/autoload.php";
require "$includesDir/exp/event-parent/code.php";

// Request processing URI
Jaxon\jaxon()->setOption('core.request.uri', "/exp/ajax.php?exp=event-parent");

echo Jaxon\jaxon()->template()
    ->addNamespace('examples', $includesDir)
    ->render('examples::exp/event-parent/page.php');
