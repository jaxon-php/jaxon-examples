<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\App\CallableClass;
use Jaxon\Response\Response;

use Service\ExampleInterface;
use Service\Example;

// Register the namespace with a third-party autoloader
$loader = new Keradus\Psr4Autoloader;
$loader->register();
$loader->addNamespace('Service', __DIR__ . '/../../classes/namespace/service');

class HelloWorld extends CallableClass
{
    protected $service;

    public function __construct(ExampleInterface $service)
    {
        $this->service = $service;
    }

    public function sayHello($isCaps, $sMessage)
    {
        $sMessage = $this->service->message($isCaps) . ', ' . $sMessage;
        $this->response->assign('div2', 'innerHTML', $sMessage);
        return $this->response;
    }

    public function setColor($sColor)
    {
        $sColor = $this->service->color($sColor);
        $this->response->assign('div2', 'style.color', $sColor);
        return $this->response;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup(__DIR__ . '/../../config/container.php', 'lib');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');
$jaxon->setOption('core.decode_utf8', true);

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
