<?php

use function Jaxon\jaxon;

$examplesDir = dirname(__DIR__, 3) . '/examples';
require "$examplesDir/bootstrap.php";
require "$examplesDir/calculator/code.php";

echo jaxon()->template()->render('examples::calculator/page.php');
