<?php

require(dirname(__DIR__) . '/autoload.php');

use Jaxon\Jaxon;
use function Jaxon\jaxon;

class HelloWorld
{
    public function sayHello(bool $isCaps)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $xResponse = jaxon()->getResponse();
        $xResponse->assign('div2', 'innerHTML', $text);
    }

    public function setColor(string $sColor)
    {
        $xResponse = jaxon()->getResponse();
        $xResponse->assign('div2', 'style.color', $sColor);
    }

    public function upload()
    {
        $xResponse = jaxon()->getResponse();
        $files = jaxon()->upload()->files();
        $xResponse->dialog->show('Uploaded files', print_r($files['photos'], true), []);
        $xResponse->dialog->info('Uploaded ' . count($files['photos']) . ' file(s).');
    }
}

// Register object
$jaxon = jaxon();

// Request processing URI
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.minify', false);
$jaxon->setOption('upload.default.dir', __DIR__ . '/files');
$jaxon->setOption('core.request.uri', 'ajax.php');
$jaxon->setOption('core.upload.enabled', true);

$jaxon->app()->setOption('dialogs.default.modal', 'bootstrap');
$jaxon->app()->setOption('dialogs.default.alert', 'toastr');

$jaxon->callback()->after(function($target, $end) {
    jaxon()->di()->getResponseManager()->getResponse()->debug('After upload');
});

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class, [
    'functions' => ['upload' => ['upload' => "'file-select'"]],
]);
