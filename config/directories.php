<?php

use Jaxon\Dialogs\Dialog\Library\Toastr;
use Jaxon\Dialogs\Dialog\Library\Tingle;
use Jaxon\Dialogs\Dialog\Library\Noty;

return [
    'app' => [
        'directories' => [
            [
                'path' => __DIR__ . '/../classes/simple/app',
                'autoload' => true,
            ],
            [
                'path' => __DIR__ . '/../classes/simple/ext',
                'autoload' => true,
            ]
        ],
        'dialogs' => [
            'default' => [
                'modal' => Tingle::NAME,
                'alert' => Toastr::NAME,
                'confirm' => Noty::NAME,
            ],
            'toastr' => [
                'options' => [
                    'alert' => [
                        'closeButton' => true,
                        'positionClass' => 'toast-top-center',
                    ],
                ],
            ],
            'lib' => [
                'use' => ['bootbox', 'bootstrap'],
            ],
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
    ],
];
