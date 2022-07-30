<?php

use Jaxon\Dialogs\Bootstrap\BootstrapLibrary;
use Jaxon\Dialogs\PgwJs\PgwJsLibrary;
use Jaxon\Dialogs\Toastr\ToastrLibrary;
use Jaxon\Dialogs\Tingle\TingleLibrary;
use Jaxon\Dialogs\Noty\NotyLibrary;

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
            'default' => [
                'modal' => 'bootbox',
                'message' => 'noty',
                'question' => 'noty',
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
