<?php

require dirname(__DIR__) . '/examples/bootstrap.php';

$menus = menu_entries();
$example = menu_current();
if(isset($menus[$example]))
{
    require dirname(__DIR__) . "/examples/$example/code.php";

    // Process the request.
    jaxon()->processRequest();
}
