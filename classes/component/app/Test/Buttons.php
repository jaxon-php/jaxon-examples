<?php

namespace App\Test;

class Buttons extends \Jaxon\App\NodeComponent
{
    public function html(): string
    {
        return $this->view()->render('component::buttons/app', ['test' => $this->rq(Test::class)]);
    }
}
