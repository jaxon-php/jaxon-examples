<?php

require __DIR__ . '/defs.php';

if($jaxon->canProcessRequest())
{
    // Process the request.
    $jaxon->processRequest();
}
