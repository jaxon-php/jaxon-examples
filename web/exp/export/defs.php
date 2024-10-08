<?php

require(dirname(__DIR__) . '/autoload.php');
require_once(__DIR__ . '/../../../includes/menu.php');

use Jaxon\Jaxon;
use Jaxon\Dialogs\Bootbox\BootboxLibrary;
use function Jaxon\jaxon;
use function Jaxon\pm;
use function Jaxon\rq;
use function Jaxon\jq;

class HelloWorld
{
    public function setup()
    {
        $this->sayHello(0);
        $this->setColor('black');

        $xResponse = jaxon()->getResponse();
        $xResponse->jq('#btn-uppercase')->click(rq('HelloWorld')->sayHello(1)
            ->confirm('Change {1} to uppercase?', jq('#div2')->html()));
            // ->confirm('Change {1} to uppercase?', pm()->html('div2')));
        $xResponse->jq('#btn-lowercase')->click(rq('HelloWorld')->sayHello(0)
            ->confirm('Change {1} to lowercase?', jq('#div2')->html()));
            // ->confirm('Change {1} to lowercase?', pm()->html('div2')));
        $xResponse->jq('#colorselect')
            ->on('change', rq('HelloWorld')->setColor(jq()->val())
            ->confirm('Change the color to {1}?', jq()->val())
            // ->confirm('Change the color to {1}?', pm()->select('colorselect'))
            ->elseWarning('The color may be different'));
        // $xResponse->setEventHandler('btn-uppercase', 'click', rq('HelloWorld')->sayHello(1));
        // $xResponse->setEventHandler('btn-lowercase', 'click', rq('HelloWorld')->sayHello(0));
        // $xResponse->setEventHandler('colorselect', 'change', rq('HelloWorld')->setColor(pm()->select('colorselect')));

        return $xResponse;
    }

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
}

$jaxon = jaxon();

$jaxon->setOption('js.lib.uri', '/js');
// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', 'Jaxon');

$jaxonAppDir = __DIR__ . '/js';
$jaxonAppURI = '/exp/export/js';

$jaxon->setOption('js.app.export', true);
$jaxon->setOption('js.app.dir', $jaxonAppDir);
$jaxon->setOption('js.app.uri', $jaxonAppURI);
$jaxon->setOption('js.app.minify', false); // Optionally, the file can be minified

// Dialog options
$jaxon->dialog()->registerLibrary(BootboxLibrary::class, BootboxLibrary::NAME);
$jaxon->setOption('dialogs.default.modal', BootboxLibrary::NAME);
$jaxon->setOption('dialogs.default.message', 'noty');
$jaxon->setOption('dialogs.default.question', 'noty');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Register object
$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
