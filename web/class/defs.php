<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

class HelloWorld
{
    public function sayHello($isCaps)
    {
        $text = (($isCaps) ? 'HELLO WORLD!' : 'Hello World!');
        $text = (($isCaps) ? strtoupper($this->message) : strtolower($this->message));
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

    public function showError($sMessage)
    {
        $xResponse = jaxon()->getResponse();
        $xResponse->assign('div2', 'innerHTML', $sMessage);
        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->callback()->before(function($target, &$end) {
    error_log('Target: ' . print_r($target, true));
});

$jaxon->callback()->init(function($instance) {
    $instance->message = 'voici le message';
});

$jaxon->app()->setup(__DIR__ . '/../../config/class.php');

// Js options
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.minify', false);

// Request processing URI
// $jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->callback()->after(function($target, $bEndRequest) {
    $response = jaxon()->di()->getResponseManager()->getResponse();
    $commands = $response->getCommands();
    // Apply the changes on the commands
    error_log('================= Here are the comands ' . print_r($commands, true));
    $commands[0]['data'] = 'purple';
    // Reset the changed commands in the response
    $response->clearCommands()->appendResponse($commands);
});
