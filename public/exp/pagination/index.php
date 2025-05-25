<?php

use function Jaxon\jaxon;

$examplesDir = dirname(__DIR__, 3) . '/examples';
require "$examplesDir/bootstrap.php";
require "$examplesDir/pagination/code.php";

// Request processing URI
jaxon()->setOption('core.request.uri', "/exp/ajax.php?exp=pagination");

echo jaxon()->template()->render('examples::pagination/page.php');
