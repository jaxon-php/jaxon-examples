<?php

return [
    'app' => [
        'metadata' => [
            'format' => 'annotations',
        ],
        'classes' => [
            PageContentCp::class => __DIR__ . '/../ajax/component/page/content.cp.php',
            PageContentDb::class => __DIR__ . '/../ajax/component/page/content.db.php',
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
