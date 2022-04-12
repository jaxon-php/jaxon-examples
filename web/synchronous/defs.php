<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\App\CallableClass;

class HelloWorld extends CallableClass
{
    public function sleep($iDuration)
    {
        sleep(intval($iDuration));
        $this->response->append('div2', 'innerHTML', "<br/>I slept for $iDuration second(s)");
        return $this->response;
    }

    public function ssleep($iDuration)
    {
        sleep(intval($iDuration));
        $this->response->append('div2', 'innerHTML', "<br/>I slept for $iDuration second(s)");
        return $this->response;
    }

    public function nodup($iDuration)
    {
        sleep(intval($iDuration));
        $this->response->append('div2', 'innerHTML', "<br/>I slept for $iDuration second(s)");
        return $this->response;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->app()->setup(__DIR__ . '/../../config/class.php');

// Js options
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.minify', false);

// Request processing URI
// $jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class, [
    'sleep' => ['mode' => "'asynchronous'"],
    'ssleep' => ['mode' => "'synchronous'"],
    'nodup' => ['callback' => "nodupCallbacks"],
]);
