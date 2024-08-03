<?php

namespace App\Test;

class Test extends \Jaxon\App\Component
{
    private $isCaps = false;

    public function html(): string
    {
        return $this->isCaps ? 'HELLO WORLD!' : 'Hello World!';
    }

    public function sayHello(bool $isCaps)
    {
        // There is no need to specify an HTML id attribute here.
        // The HTML code is automatically assigned to the attached DOM node
        $this->isCaps = $isCaps;
        $this->render();
        $this->cl(Buttons::class)->render();
        return $this->response;
    }

    public function setColor(string $sColor)
    {
        $this->response->assign('style.color', $sColor);
        return $this->response;
    }
}
