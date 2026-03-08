<?php

require dirname(__DIR__) . '/pages/bootstrap.php';

$menus = menu_entries();
$example = menu_current();
if(isset($menus[$example]))
{
    require dirname(__DIR__) . "/pages/$example/code.php";

    // Process the request.
    jaxon()->processRequest();
}
