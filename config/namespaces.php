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
        'dialogs' => [
            'default' => [
                'modal' => 'bootbox',
                'alert' => 'noty',
                'confirm' => 'noty',
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
                'use' => ['bootstrap'],
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
