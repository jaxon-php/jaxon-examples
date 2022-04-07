<?php

use Jaxon\Dialogs\Library\Bootstrap\BootstrapLibrary;
use Jaxon\Dialogs\Library\PgwJS\PgwJsLibrary;
use Jaxon\Dialogs\Library\Toastr\ToastrLibrary;
use Jaxon\Dialogs\Library\Tingle\TingleLibrary;
use Jaxon\Dialogs\Library\Noty\NotyLibrary;

return [
    'app' => [
        'directories' => [
            __DIR__ . '/../classes/namespace/app' => [
                'namespace' => 'App',
            ],
            __DIR__ . '/../classes/namespace/ext'=> [
                'namespace' => 'Ext',
            ]
        ],
    ],
    'lib' => [
        'core' => [
            'debug' => [
                'on' => false,
            ],
            'request' => [
                'uri' => 'ajax.php',
            ],
            'prefix' => [
                'class' => '',
            ],
        ],
        'dialogs' => [
            'libraries' => [
                BootstrapLibrary::class => BootstrapLibrary::NAME,
                PgwJsLibrary::class => PgwJsLibrary::NAME,
                ToastrLibrary::class => ToastrLibrary::NAME,
                TingleLibrary::class => TingleLibrary::NAME,
                NotyLibrary::class => NotyLibrary::NAME,
            ],
            'default' => [
                'modal' => TingleLibrary::NAME,
                'message' => ToastrLibrary::NAME,
                'question' => NotyLibrary::NAME,
            ],
            'toastr' => [
                'options' => [
                    'closeButton' => true,
                    'positionClass' => 'toast-top-center',
                ],
            ],
        ],
    ],
];
