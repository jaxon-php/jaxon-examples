<?php

return [
    'app' => [
        'classes' => [
            PageContent::class,
            Pagination::class,
        ],
        'directories' => [
            __DIR__ . '/../classes/component/app' => [
                'namespace' => 'App',
            ],
            __DIR__ . '/../classes/component/ext'=> [
                'namespace' => 'Ext',
            ],
        ],
        'views' => [
            'component' => [
                'directory' => dirname(__DIR__) . '/templates',
                'extension' => '.php',
                'renderer' => 'jaxon',
            ],
        ],
        'options' => [
            'views' => [
                'default' => 'component',
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
