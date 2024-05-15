<?php

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
        'js' => [
            'lib' => [
                'uri' => '/js',
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
            'lib' => [
                'use' => ['bootstrap'],
            ],
        ],
    ],
];
