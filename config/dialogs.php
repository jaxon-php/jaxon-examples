<?php

return [
    'app' => [
        'classes' => [
            HelloWorld::class,
        ],
        'dialogs' => [
            'default' => [
                'modal' => 'bootbox',
                'alert' => 'noty',
                'confirm' => 'noty',
            ],
            'lib' => [
                'use' => ['alertify', 'bootbox', 'bootstrap',
                    'toastr', 'tingle', 'jalert', 'notify',
                    'cute', 'noty', 'sweetalert', 'jconfirm'],
            ],
            'toastr' => [
                'options' => [
                    'alert' => [
                        'closeButton' => true,
                        'closeDuration' => 0,
                        'positionClass' => 'toast-top-center',
                    ],
                ],
            ],
        ],
    ],
    'lib' => [
        'core' => [
            'request' => [
                'uri' => 'ajax.php',
            ],
        ],
        'js' => [
            'lib' => [
                'uri' => '/js',
            ]
        ]
    ],
];
