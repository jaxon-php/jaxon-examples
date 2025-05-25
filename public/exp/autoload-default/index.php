<?php

use function Jaxon\jaxon;

$examplesDir = dirname(__DIR__, 3) . '/examples';
require "$examplesDir/bootstrap.php";
require "$examplesDir/autoload-default/code.php";

// Request processing URI
jaxon()->setOption('core.request.uri', "/exp/ajax.php?exp=autoload-default");

echo jaxon()->template()->render('examples::autoload-default/page.php');
