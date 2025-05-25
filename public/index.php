<?php

use function Jaxon\jaxon;

require dirname(__DIR__) . '/examples/bootstrap.php';

echo jaxon()->template()->render('templates::examples/index.php');
