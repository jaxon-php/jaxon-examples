<?php

use function Jaxon\jaxon;

$includesDir = dirname(__DIR__, 3) . '/includes';
require "$includesDir/autoload.php";
require "$includesDir/exp/calculator/code.php";

echo jaxon()->template()
    ->addNamespace('examples', $includesDir)
    ->render('examples::exp/calculator/page.php');
