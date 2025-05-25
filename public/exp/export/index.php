<?php

use function Jaxon\jaxon;

$examplesDir = dirname(__DIR__, 3) . '/examples';
require "$examplesDir/bootstrap.php";
require "$examplesDir/export/code.php";

// Request processing URI
jaxon()->setOption('core.request.uri', "/exp/ajax.php?exp=export");

echo jaxon()->template()->render('examples::export/page.php');
