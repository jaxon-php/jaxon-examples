<?php

namespace App\Calculator;

use Jaxon\App\NodeComponent;
use Stringable;

class Result extends NodeComponent
{
    public function html(): Stringable
    {
        return $this->view()->render('calculator::result', [
            'result' => $this->stash()->get('calculator.result'),
            'operator' => $this->stash()->get('calculator.operator'),
        ]);
    }
}
