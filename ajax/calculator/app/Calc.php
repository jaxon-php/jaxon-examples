<?php

namespace App\Calculator;

use Jaxon\App\NodeComponent;
use Stringable;

class Calc extends NodeComponent
{
    public function html(): Stringable
    {
        return $this->view()->render('calculator::wrapper');
    }
}
