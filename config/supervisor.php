<?php

return [
    'app' => [
        'packages' => [
            Lagdo\Supervisor\Package::class => [
                'servers' => [
                    'first_server' => [
                        'url' => 'http://192.168.1.10',
                        'port' => '9001',
                    ],
                    'second_server' => [
                        'url' => 'http://192.168.1.11',
                        'port' => '9001',
                    ],
                ],
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
