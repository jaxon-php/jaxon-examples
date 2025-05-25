<?php

use function Jaxon\jaxon;

$examplesDir = dirname(__DIR__, 3) . '/examples';
require "$examplesDir/bootstrap.php";
require "$examplesDir/hello/code.php";

// Request processing URI
jaxon()->setOption('core.request.uri', "/exp/ajax.php?exp=hello");

echo jaxon()->template()->render('examples::hello/page.php');
