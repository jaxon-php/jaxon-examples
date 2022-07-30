<?php

$directory = rtrim(ROOT, '/') . '/jaxon/App';

return [
    'app' => [
        'request' => [
            // 'route' => 'jaxon',
        ],
        'directories' => [
            $directory => [
                'namespace' => '\\Jaxon\\App',
                // 'separator' => '', // '.' or '_'
                // 'protected' => [],
            ],
        ],
        'packages' => [
            Lagdo\DbAdmin\Package::class => [
                'template' => 'bootstrap3',
                'servers' => [
                    'mysql' => [
                        'name' => 'MySQL',
                        'driver' => 'mysql',
                        'host' => 'localhost',
                        'port' => 3306,
                        'username' => 'invoice',
                        'password' => 't27M9RpaJmd45Twz',
                        'access' => [
                            // 'server' => true,
                            'databases' => ['voyager', 'adminer', 'crater', 'invoice', 'demo'],
                        ],
                    ],
                    'pgsql' => [
                        'name' => 'PostgreSQL',
                        'driver' => 'pgsql',
                        'host' => '127.0.0.1',
                        // 'port' => 5432,
                        'username' => 'postgres',
                        'password' => '',
                        'access' => [
                            // 'server' => true,
                            'databases' => ['voyager', 'demo'],
                            'schemas' => ['public'],
                        ],
                    ],
                    'sqlite' => [
                        'name' => 'Sqlite',
                        'driver' => 'sqlite',
                        'prefer_pdo' => true,
                        'directory' => '/home/thierry/sqlite',
                    ],
                ],
                'default' => 'mysql',
                'access' => [
                    // 'server' => true,
                ],
                'export' => [
                    'url' => 'http://symfony.jaxon.loc/exports',
                    'dir' => '/home/thierry/www/jaxon/frw/laravel-7.x/public/exports',
                ],
            ],
        ],
    ],
    'lib' => [
        'core' => [
            'language' => 'en',
            'encoding' => 'UTF-8',
            'request' => [
                'uri' => '/ajax',
                'csrf_meta' => 'csrf-token',
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
                'uri' => '/jaxon/lib',
            ],
            'app' => [
                // 'uri' => '',
                // 'dir' => '',
                'export' => false,
                'minify' => false,
            ],
        ],
        'dialogs' => [
            'default' => [
                'modal' => 'bootstrap',
                'message' => 'toastr',
                'question' => 'bootstrap',
            ],
            'toastr' => [
                'options' => [
                    'closeButton' => true,
                    'positionClass' => 'toast-top-center'
                ],
            ],
            'assets' => [
                'include' => [
                    'all' => true,
                ],
            ],
        ],
    ],
];
