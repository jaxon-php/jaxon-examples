<?php

return [
    'app' => [
        'classes' => [
            HelloWorld::class => [
                '*' => [
                    'mode' => "'asynchronous'",
                ],
                'sayHello' => [
                    'mode' => "'synchronous'",
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
