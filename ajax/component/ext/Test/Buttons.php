<?php

namespace Ext\Test;

class Buttons extends \Jaxon\App\NodeComponent
{
    public function html(): string
    {
        return $this->view()->render('component::buttons/ext', ['test' => $this->rq(Test::class)]);
    }
}
