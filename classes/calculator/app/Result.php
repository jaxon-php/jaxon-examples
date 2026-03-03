<?php

namespace App\Calculator;

use Jaxon\App\ComponentDataTrait;
use Jaxon\App\NodeComponent;
use Stringable;

class Result extends NodeComponent
{
    use ComponentDataTrait;

    /**
     * @inheritDoc
     */
    public function html(): Stringable
    {
        return $this->view()->render('calculator::result', [
            'result' => $this->get('result'),
            'operator' => $this->get('operator'),
        ]);
    }
}
