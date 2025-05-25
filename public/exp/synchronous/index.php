<?php

use function Jaxon\jaxon;

$examplesDir = dirname(__DIR__, 3) . '/examples';
require "$examplesDir/bootstrap.php";
require "$examplesDir/synchronous/code.php";

// Request processing URI
jaxon()->setOption('core.request.uri', "/exp/ajax.php?exp=synchronous");

echo jaxon()->template()->render('examples::synchronous/page.php');
