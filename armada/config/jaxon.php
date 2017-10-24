<?php

return [
    'app' => [
        'classes' => [
            [
                'directory' => dirname(__DIR__) . '/classes',
                'namespace' => '\\Jaxon\\App',
                // 'separator' => '.',
                // 'protected' => [],
            ],
        ],
        'views' => [
            'smarty' => [
                'directory' => dirname(__DIR__) . '/views/smarty',
                'extension' => '.tpl',
                'renderer' => 'smarty',
                'register' => true,
            ],
            'dwoo' => [
                'directory' => dirname(__DIR__) . '/views/dwoo',
                'extension' => '.tpl',
                'renderer' => 'dwoo',
                'register' => true,
            ],
            'blade' => [
                'directory' => dirname(__DIR__) . '/views/blade',
                'extension' => '.blade.php',
                'renderer' => 'blade',
                'register' => true,
            ],
            'twig' => [
                'directory' => dirname(__DIR__) . '/views/twig',
                'extension' => '.html.twig',
                'renderer' => 'twig',
                'register' => true,
            ],
            'latte' => [
                'directory' => dirname(__DIR__) . '/views/latte',
                'extension' => '.tpl',
                'renderer' => 'latte',
                'register' => true,
            ],
            'raintpl' => [
                'directory' => dirname(__DIR__) . '/views/raintpl',
                'extension' => '.tpl',
                'renderer' => 'raintpl',
                'register' => true,
            ],
        ],
        'options' => [
            'views' => [
                'default' => 'default',
            ],
        ],
    ],
    'lib' => [
        'core' => [
            'language' => 'en',
            'encoding' => 'UTF-8',
            'request' => [
                'uri' => 'ajax.php',
            ],
            'prefix' => [
                'class' => '',
            ],
            'debug' => [
                'on' => false,
                'verbose' => false,
            ],
            'error' => [
                'handle' => false,
            ],
        ],
        'js' => [
            'lib' => [
                'uri' => 'https://cdn.jaxon-php.org/libs/jaxon/1.2.0',
            ],
            'app' => [
                // 'uri' => '',
                // 'dir' => '',
                'extern' => false,
                'minify' => false,
            ],
        ],
        'assets' => [
            'include' => [
                'all' => true,
            ],
        ],
        'dialogs' => [
            'libraries' => ['pgwjs'],
            'default' => [
                'modal' => 'bootstrap',
                'alert' => 'noty',
                'confirm' => 'noty',
            ],
            'toastr' => [
                'options' => [
                    'closeButton' => true,
                    'positionClass' => 'toast-top-center'
                ],
            ],
        ],
    ],
];
