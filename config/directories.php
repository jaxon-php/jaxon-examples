<?php

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
                'modal' => 'tingle',
                'alert' => 'toastr',
            ],
            'libraries' => ['pgwjs', 'bootstrap'],
            'toastr' => [
                'options' => [
                    'closeButton' => true,
                    'positionClass' => 'toast-top-center',
                ],
            ],
        ],
    ],
];
