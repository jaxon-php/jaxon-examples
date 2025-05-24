<?php

return [
    'app' => [
        'metadata' => 'annotations',
        'classes' => [
            PageContent::class,
        ],
        'directories' => [
            [
                'path' => __DIR__ . '/../classes/component/app',
                'namespace' => 'App',
            ],
            [
                'path' => __DIR__ . '/../classes/component/ext',
                'namespace' => 'Ext',
            ],
        ],
        'views' => [
            'component' => [
                'directory' => dirname(__DIR__) . '/templates/component',
                'extension' => '.php',
                'renderer' => 'jaxon',
            ],
        ],
        'options' => [
            'views' => [
                'default' => 'component',
            ],
        ],
        'dialogs' => [
            'default' => [
                'modal' => 'bootbox',
                'alert' => 'noty',
                'confirm' => 'noty',
            ],
            'lib' => [
                'use' => ['bootstrap5'],
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
