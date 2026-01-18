<?php

namespace App\Calculator;

use Jaxon\App\NodeComponent;
use Jaxon\App\RenderViewTrait;

class Result extends NodeComponent
{
    use RenderViewTrait;

    /**
     * @param string $operator
     * @param mixed $result
     *
     * @return void
     */
    public function show(string $operator, mixed $result): void
    {
        $this->renderView('calculator::result', [
            'result' => $result,
            'operator' => $operator,
        ]);
    }
}
