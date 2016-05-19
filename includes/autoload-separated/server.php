<?php

require (__DIR__ . '/xajax.php');

// Check if there is a request.
if($xajax->canProcessRequest())
{
    // When processing a request, the required class will be autoloaded
    $xajax->processRequest();
}
