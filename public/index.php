<?php

require dirname(__DIR__) . '/pages/bootstrap.php';

$menus = menu_entries();
$example = menu_current();
if(isset($menus[$example]))
{
    renderPage($example);
    exit();
}

echo jaxon()->template()->render('templates::examples/index.php');
