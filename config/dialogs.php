<?php

return [
    'app' => [
        'classes' => [
            HelloWorld::class,
        ],
        'dialogs' => [
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
