<?php

return [
    'app' => [
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
            ]
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
