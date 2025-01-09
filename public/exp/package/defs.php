<?php

require(dirname(__DIR__) . '/autoload.php');
require_once(__DIR__ . '/../../../includes/menu.php');

use Jaxon\Plugin\AbstractPackage;
use Jaxon\Dialogs\Dialog\Library\Bootstrap;
use Jaxon\Dialogs\Dialog\Library\Toastr;
use function Jaxon\jaxon;

class DemoPackage extends AbstractPackage
{
    public static function config(): string
    {
        return realpath(__DIR__ . '/config/jaxon.php');
    }

    public function getReadyScript(): string
    {
        return '';
    }

    public function getHtml(): string
    {
        return '';
    }
}

$jaxonAppDir = __DIR__ . '/js';
$jaxonAppURI = '/package/js';

$jaxon = jaxon();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', '');
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('js.app.export', true);
$jaxon->setOption('js.app.dir', $jaxonAppDir);
$jaxon->setOption('js.app.uri', $jaxonAppURI);
$jaxon->setOption('js.app.minify', false); // Optionally, the file can be minified

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Dialog options
$jaxon->setOption('dialogs.default.modal', Bootstrap::NAME);
$jaxon->setOption('dialogs.default.alert', Toastr::NAME);
$jaxon->setOption('dialogs.toastr.options.closeButton', true);
$jaxon->setOption('dialogs.toastr.options.positionClass', 'toast-top-center');

$jaxon->registerPackage(DemoPackage::class);
