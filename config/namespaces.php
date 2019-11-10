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
