<?php

require(dirname(__DIR__) . '/autoload.php');

use Jaxon\Jaxon;
use function Jaxon\jaxon;

class HelloWorld extends \Jaxon\App\CallableClass
{
    public function sayHello(bool $isCaps)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $this->response->assign('div2', 'innerHTML', $text);
        return $this->response;
    }

    public function showPage($pageNumber)
    {
        $this->paginator($pageNumber, 10, 150)
            ->page(function(int $page) {
                $this->response->assign('div2', 'innerHTML', "Showing page number $page");
            })
            ->render($this->rq()->showPage(), 'pagination');
        return $this->response;
    }
}

// Register object
$jaxon = jaxon();

// Request processing URI
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
