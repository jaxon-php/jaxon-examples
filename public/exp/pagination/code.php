<?php

use Jaxon\Jaxon;
use function Jaxon\jaxon;

class HelloWorld extends \Jaxon\App\FuncComponent
{
    public function sayHello(bool $isCaps)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $this->response->assign('div2', 'innerHTML', $text);
    }

    public function showPage($pageNumber)
    {
        $this->paginator($pageNumber, 10, 150)
            ->page(function(int $page) {
                $this->response->assign('div2', 'innerHTML', "Showing page number $page");
            })
            ->render($this->rq()->showPage(), 'pagination');
    }
}

// Register object
$jaxon = jaxon();

// Request processing URI
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('core.request.uri', 'ajax.php');
$jaxon->view()->addNamespace('pagination',
    dirname(__DIR__, 3) . '/templates/pagination', '.php', 'jaxon');

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
