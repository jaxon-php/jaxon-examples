<?php

use Jaxon\Dialogs\Library\PgwJS\PgwJsLibrary;
use Jaxon\Dialogs\Library\Bootstrap\BootstrapLibrary;
use Jaxon\Dialogs\Library\Toastr\ToastrLibrary;

$directory = rtrim(\Yii::getAlias('@app'), '/') . '/jaxon/App';

return [
    'app' => [
        'directories' => [
            $directory => [
                'namespace' => '\\Jaxon\\App',
                // 'separator' => '', // '.' or '_'
                // 'protected' => [],
            ],
        ],
    ],
    'lib' => [
        'core' => [
            'language' => 'en',
            'encoding' => 'UTF-8',
            'request' => [
                'uri' => 'jaxon',
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
                // 'uri' => '/jaxon/lib',
            ],
            'app' => [
                // 'uri' => '',
                // 'dir' => '',
                'export' => false,
                'minify' => false,
            ],
        ],
        'dialogs' => [
            'libraries' => [
                BootstrapLibrary::class => BootstrapLibrary::NAME,
                ToastrLibrary::class => ToastrLibrary::NAME,
                PgwJsLibrary::class => PgwJsLibrary::NAME,
            ],
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
    ],
];