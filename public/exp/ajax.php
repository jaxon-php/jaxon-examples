<?php

use function Jaxon\jaxon;

$examplesDir = dirname(__DIR__, 2) . '/examples';
$exampleDir = "$examplesDir/" . $_GET['exp'];
if (is_dir($exampleDir)) {
    require "$examplesDir/bootstrap.php";
    require "$exampleDir/code.php";

    // Process the request.
    jaxon()->processRequest();
}
