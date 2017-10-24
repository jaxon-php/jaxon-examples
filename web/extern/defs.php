<?php

require(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../includes/menu.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

class HelloWorld
{
    public function sayHello($isCaps)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';

        $xResponse = new Response();
        $xResponse->assign('div2', 'innerHTML', $text);

        return $xResponse;
    }

    public function setColor($sColor)
    {
        $xResponse = new Response();
        $xResponse->assign('div2', 'style.color', $sColor);

        return $xResponse;
    }
}

$jaxon = jaxon();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', 'Jaxon');

$jaxonAppDir = __DIR__ . '/js';
$jaxonAppURI = menu_subdir() . '/extern/js';

$jaxon->setOption('js.app.extern', true);
$jaxon->setOption('js.app.dir', $jaxonAppDir);
$jaxon->setOption('js.app.uri', $jaxonAppURI);
$jaxon->setOption('js.app.minify', true); // Optionally, the file can be minified

// Dialog options
$jaxon->setOption('dialogs.default.modal', 'bootbox');
$jaxon->setOption('dialogs.default.alert', 'bootbox');
// $jaxon->setOption('dialogs.default.confirm', 'noty');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Register object
$jaxon->register(Jaxon::CALLABLE_OBJECT, new HelloWorld(), array(
    '*' => array('mode' => "'synchronous'"),
    'sayHello' => array('mode' => "'asynchronous'"),
));
