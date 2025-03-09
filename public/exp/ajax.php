<?php

$includesDir = dirname(__DIR__, 2) . '/includes';
$exampleDir = "$includesDir/exp/" . $_GET['exp'];
if (is_dir($exampleDir)) {
    require "$includesDir/autoload.php";
    require "$exampleDir/code.php";

    // Process the request.
    Jaxon\jaxon()->processRequest();
}
