<?php

use Jaxon\Dialogs\Dialog\Library\Toastr;
use Jaxon\Dialogs\Dialog\Library\Tingle;
use Jaxon\Dialogs\Dialog\Library\Noty;

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
        'js' => [
            'lib' => [
                'uri' => '/js',
            ],
        ],
        'dialogs' => [
            'default' => [
                'modal' => Tingle::NAME,
                'message' => Toastr::NAME,
                'question' => Noty::NAME,
            ],
            'toastr' => [
                'options' => [
                    'closeButton' => true,
                    'positionClass' => 'toast-top-center',
                ],
            ],
            'lib' => [
                'use' => ['bootbox', 'bootstrap'],
            ],
        ],
    ],
];
