<?php

use Jaxon\Dialogs\Toastr\ToastrLibrary;
use Jaxon\Dialogs\Tingle\TingleLibrary;
use Jaxon\Dialogs\Noty\NotyLibrary;

return [
    'app' => [
        'directories' => [
            __DIR__ . '/../classes/simple/app' => [
                'autoload' => true,
            ],
            __DIR__ . '/../classes/simple/ext' => [
                'autoload' => true,
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
