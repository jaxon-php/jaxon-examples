<?php

use Jaxon\Jaxon;
use Jaxon\App\FuncComponent;
use Service\ExampleInterface;

// Register the namespace with a third-party autoloader
$loader = new Keradus\Psr4Autoloader;
$loader->register();
$loader->addNamespace('Service', classDir('/namespace/service'));

class HelloWorld extends FuncComponent
{
    protected $service;

    public function __construct(ExampleInterface $service)
    {
        $this->service = $service;
    }

    public function sayHello(bool $isCaps, $sMessage)
    {
        $sMessage = $this->service->message($isCaps) . ', ' . $sMessage;
        $this->response()->assign('div2', 'innerHTML', $sMessage);
    }

    public function setColor(string $sColor)
    {
        $sColor = $this->service->color($sColor);
        $this->response()->assign('div2', 'style.color', $sColor);
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup(configFile('container.php', 'lib'));
$jaxon->setOption('core.decode_utf8', true);

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
