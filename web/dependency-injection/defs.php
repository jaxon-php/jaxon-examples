<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

use Service\ExampleInterface;
use Service\Example;

// Register the namespace with a third-party autoloader
$loader = new Keradus\Psr4Autoloader;
$loader->register();
$loader->addNamespace('Service', __DIR__ . '/../../classes/namespace/service');

class HelloWorld
{
    protected $service;
    protected $response;

    public function __construct(ExampleInterface $service)
    {
        $this->service = $service;
        $this->response = new Response();
    }

    public function sayHello($isCaps)
    {
        $sMessage = $this->service->message($isCaps);
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

$jaxon->readConfigFile(__DIR__ . '/../../config/class.php', 'lib');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Bind the interface with its implementation
$jaxon->di()->set(ExampleInterface::class, function($di){
    return new Example();
});

$jaxon->register(Jaxon::CALLABLE_OBJECT, HelloWorld::class);
