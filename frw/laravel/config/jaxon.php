<?php

use Jaxon\Dialogs\Library\Bootbox\BootboxLibrary;
use Jaxon\Dialogs\Library\Noty\NotyLibrary;
use Jaxon\Dialogs\Library\PgwJS\PgwJsLibrary;

$directory = app_path('Jaxon');

return [
    'app' => [
        'request' => [
            // 'route' => 'jaxon',
        ],
        'directories' => [
            $directory => [
                'namespace' => '\\App\\Jaxon',
                // 'separator' => '', // '.' or '_'
                // 'protected' => [],
                'register' => false,
            ],
        ],
        'packages' => [
            Lagdo\DbAdmin\Package::class => [
                'template' => 'bootstrap5',
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
        'upload' => [
            'default' => [
                'dir' => __DIR__ . '/uploads',
            ],
        ],
        'js' => [
            'lib' => [
                'uri' => '/jaxon/lib',
            ],
            'app' => [
                // 'uri' => 'http://laravel.jaxon.loc/jaxon/app',
                // 'dir' => '/home/thierry/www/jaxon/frw/laravel-7x/public/jaxon/app',
                'export' => false,
                'minify' => false,
            ],
        ],
        'dialogs' => [
            'libraries' => [
                BootboxLibrary::class => BootboxLibrary::NAME,
                NotyLibrary::class => NotyLibrary::NAME,
                PgwJsLibrary::class => PgwJsLibrary::NAME,
            ],
            'default' => [
                'modal' => BootboxLibrary::NAME,
                'message' => NotyLibrary::NAME,
                'question' => NotyLibrary::NAME,
            ],
            'assets' => [
                'include' => [
                    'all' => true,
                ],
            ],
        ],
    ],
];
