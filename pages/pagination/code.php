<?php

use Jaxon\Jaxon;

class HelloWorld extends \Jaxon\App\FuncComponent
{
    public function sayHello(bool $isCaps)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $this->response()->assign('div2', 'innerHTML', $text);
    }

    public function showPage($pageNumber)
    {
        $itemsPerPage = 10;
        $totalItems = 150;
        $this->paginator($pageNumber, $itemsPerPage, $totalItems)
            ->page(function(int $page) {
                $this->response()->assign('div2', 'innerHTML', "Showing page number $page");
            })
            ->render($this->rq()->showPage(), 'pagination');
    }
}

// Register object
$jaxon = jaxon();

$jaxon->setOption('js.lib.uri', '/js');

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
