<?php

use Jaxon\App\FuncComponent;
use Jaxon\App\NodeComponent;

use function Jaxon\attr;
use function Jaxon\jaxon;
use function Jaxon\rq;

class HelloText extends NodeComponent
{
    public function html(): string
    {
        return $this->stash()->get('is_caps') ? 'HELLO WORLD!' : 'Hello World!';
    }
}

class HelloWorld extends FuncComponent
{
    public function sayHello(bool $isCaps)
    {
        $this->stash()->set('is_caps', $isCaps);

        $this->response->assign('div2', 'outerHTML', '<div class="col-md-12" id="div2" ' .
            attr()->bind(rq(HelloText::class)) . '></div>');
        // The HelloText component is rendered only if the Jaxon attribute in the
        // above outerHTML content is successfully processed.
        $this->cl(HelloText::class)->render();
    }

    public function setColor(string $sColor)
    {
        $this->response->assign('div2', 'style.color', $sColor);
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup($configDir . '/class.php');
// Js options
$jaxon->setOptions(['lib' => ['uri' => '/js'], 'app' => ['minify' => false]], 'js');
$jaxon->register(Jaxon\Jaxon::CALLABLE_CLASS, HelloText::class);
