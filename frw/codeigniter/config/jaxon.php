<?php

use Jaxon\Dialogs\PgwJs\PgwJsLibrary;
use Jaxon\Dialogs\Bootstrap\BootstrapLibrary;
use Jaxon\Dialogs\Toastr\ToastrLibrary;

$directory = rtrim(APPPATH, '/') . '/jaxon/app';

$config['app'] = [
    'directories' => [
        $directory => [
            'namespace' => '\\Jaxon\\App',
            // 'separator' => '', // '.' or '_'
            // 'protected.' => [],
        ],
    ],
];
$config['lib'] = [
    'core' => [
        'language' => 'en',
        'encoding' => 'UTF-8',
        'request' => [
            'uri' => 'jaxon/process',
        ],
        'prefix' => [
            'class' => '',
        ],
        'debug' => [
            'on' => false,
            'verbose' => false,
        ],
        'error' => [
            'handle' => false,
        ],
    ],
    'js' => [
        'lib' => [
            // 'uri' => '',
        ],
        'app' => [
            // 'uri' => '',
            // 'dir' => '',
            'export' => false,
            'minify' => false,
            'options' => '',
        ],
    ],
    'dialogs' => [
        'default' => [
            'modal' => BootstrapLibrary::NAME,
            'message' => ToastrLibrary::NAME,
            'question' => BootstrapLibrary::NAME,
        ],
        ToastrLibrary::NAME => [
            'options' => [
                'closeButton' => true,
                'positionClass' => 'toast-top-center'
            ],
        ],
        'assets' => [
            'include' => [
                'all' => true,
            ],
        ],
    ],
];
