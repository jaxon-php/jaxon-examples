<?php

require dirname(__DIR__) . '/examples/bootstrap.php';

$menus = menu_entries();
$example = menu_current();
if(isset($menus[$example]))
{
    renderExample($example);
    exit();
}

echo jaxon()->template()->render('templates::examples/index.php');
