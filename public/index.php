<?php

use function Jaxon\jaxon;

$examplesDir = dirname(__DIR__) . '/examples';
require "$examplesDir/bootstrap.php";

echo jaxon()->template()->render('examples::index.php');
