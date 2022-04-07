<?php

require(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../includes/menu.php');

use Jaxon\Jaxon;
use Jaxon\Plugin\Package;
use Jaxon\Dialogs\Library\Bootstrap\BootstrapLibrary;
use Jaxon\Dialogs\Library\PgwJS\PgwJsLibrary;
use Jaxon\Dialogs\Library\Toastr\ToastrLibrary;

class DemoPackage extends Package
{
    public static function config(): string
    {
        return realpath(__DIR__ . '/../../config/package.php');
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
$jaxonAppURI = menu_subdir() . '/package/js';

$jaxon = jaxon();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', '');
$jaxon->setOption('js.app.export', true);
$jaxon->setOption('js.app.dir', $jaxonAppDir);
$jaxon->setOption('js.app.uri', $jaxonAppURI);
$jaxon->setOption('js.app.minify', false); // Optionally, the file can be minified

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Dialog options
$jaxon->setOption('dialogs.default.modal', 'bootstrap');
$jaxon->setOption('dialogs.default.message', 'toastr');
$jaxon->setOption('dialogs.libraries', [
    BootstrapLibrary::class => BootstrapLibrary::NAME,
    PgwJsLibrary::class => PgwJsLibrary::NAME,
    ToastrLibrary::class => ToastrLibrary::NAME,
]);
$jaxon->setOption('dialogs.toastr.options.closeButton', true);
$jaxon->setOption('dialogs.toastr.options.positionClass', 'toast-top-center');

$jaxon->registerPackage(DemoPackage::class);
