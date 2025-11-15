<?php

return [
    'app' => [
        'options' => [
            'logging' => [
                'enabled' => true,
            ],
        ],
        'classes' => [
            [
                'name' => HelloWorld::class,
                'functions' => [
                    '*' => [
                        'mode' => "'asynchronous'",
                    ],
                    'sayHello' => [
                        'mode' => "'synchronous'",
                    ],
                ],
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
                'class' => 'Jxn',
            ],
        ],
    ],
];
