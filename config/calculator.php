<?php

return [
    'app' => [
        'directories' => [
            [
                'path' => __DIR__ . '/../classes/calculator/app',
                'namespace' => 'App\\Calculator',
            ],
        ],
        'views' => [
            'calculator' => [
                'directory' => dirname(__DIR__) . '/templates/calculator',
                'extension' => '.php',
                'renderer' => 'jaxon',
            ],
        ],
        'dialogs' => [
            'default' => [
                'alert' => 'cute',
            ],
        ],
        'container' => [
            'auto' => [
                Service\Calculator\CalculatorService::class,
            ],
        ],
    ],
    'lib' => [
        'core' => [
            'debug' => [
                'on' => false,
            ],
            'request' => [
                'uri' => "/ajax.php?exp=calculator",
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
