<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;

class HelloWorld extends \Jaxon\CallableClass
{
    public function sayHello($isCaps)
    {
        $text = (($isCaps) ? 'HELLO WORLD!' : 'Hello World!');
        $this->response->assign('div2', 'innerHTML', $text);
        return $this->response;
    }

    public function showPage($pageNumber)
    {
        $this->response->assign('div2', 'innerHTML', "Showing page number $pageNumber");
        $this->response->assign('pagination', 'innerHTML', $this->rq()->showPage(pr()->page())->paginate($pageNumber, 10, 150));
        return $this->response;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup(__DIR__ . '/../../config/class.php');

// Request processing URI
// $jaxon->setOption('core.request.uri', 'ajax.php');

// $jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class, [
//     '*' => ['mode' => "'synchronous'"],
//     'sayHello' => ['mode' => "'asynchronous'"],
// ]);
