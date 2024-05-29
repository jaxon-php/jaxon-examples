<?php

require(__DIR__ . '/../../../vendor/autoload.php');

use Jaxon\Jaxon;
use function Jaxon\jaxon;

class HelloWorld
{
    public function sayHello(bool $isCaps)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        $xResponse = jaxon()->getResponse();
        $xResponse->assign('div2', 'innerHTML', $text);
        return $xResponse;
    }

    public function setColor(string $sColor)
    {
        $xResponse = jaxon()->getResponse();
        $xResponse->assign('div2', 'style.color', $sColor);
        return $xResponse;
    }

    public function upload()
    {
        $xResponse = jaxon()->getResponse();
        $files = jaxon()->upload()->files();
        $xResponse->dialog->modal('Uploaded files', print_r($files['photos'], true), []);
        $xResponse->dialog->info('Uploaded ' . count($files['photos']) . ' file(s).');
        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

// Request processing URI
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.minify', false);
$jaxon->setOption('upload.default.dir', __DIR__ . '/files');
$jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->setOption('dialogs.default.modal', 'bootstrap');
$jaxon->setOption('dialogs.default.message', 'toastr');

$jaxon->callback()->after(function($target, $end) {
    jaxon()->di()->getResponseManager()->getResponse()->debug('After upload');
});

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class, [
    'functions' => ['upload' => ['upload' => "'file-select'"]],
]);
