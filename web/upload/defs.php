<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;

class HelloWorld
{
    public function sayHello($isCaps)
    {
        $text = (($isCaps) ? 'HELLO WORLD!' : 'Hello World!');
        $xResponse = jaxon()->getResponse();
        $xResponse->assign('div2', 'innerHTML', $text);
        return $xResponse;
    }

    public function setColor($sColor)
    {
        $xResponse = jaxon()->getResponse();
        $xResponse->assign('div2', 'style.color', $sColor);
        return $xResponse;
    }

    public function upload()
    {
        $xResponse = jaxon()->getResponse();
        $files = jaxon()->upload()->files();
        $xResponse->alert('Uploaded ' . count($files['photos']) . ' file(s).');
        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

// Request processing URI
$jaxon->setOption('js.lib.uri', '/js/upload');
$jaxon->setOption('js.app.minify', false);
$jaxon->setOption('upload.default.dir', __DIR__ . '/files');
$jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class, [
    'upload' => ['upload' => "'file-select'"],
]);
