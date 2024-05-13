<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;
use function Jaxon\jaxon;

class HelloWorld
{
    public function sayHello($isCaps)
    {
        $text = (($isCaps) ? 'HELLO WORLD!' : 'Hello World!');
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'innerHTML', $text);

        $xResponse->confirmCommands(2, 'Exécuter les 2 prochaines commandes?');
        $xResponse->debug('Le premier message à afficher.');
        $xResponse->debug('Le deuxième message à afficher.');
        $xResponse->debug('Le message à afficher dans tous les cas.');

        $xResponse->debug('Le message avant le sleep.');
        $xResponse->sleep(50);
        $xResponse->debug('Le message après le sleep.');
        return $xResponse;
    }

    public function setColor($sColor)
    {
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'style.color', $sColor);
        return $xResponse;
    }

    public function showError($sMessage)
    {
        $xResponse = jaxon()->newResponse();
        $xResponse->assign('div2', 'innerHTML', $sMessage);
        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup(__DIR__ . '/../../config/class.php');
$jaxon->setOption('dialogs.default.question', 'bootbox');

// Js options
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.minify', false);

// Request processing URI
// $jaxon->setOption('core.request.uri', 'ajax.php');
