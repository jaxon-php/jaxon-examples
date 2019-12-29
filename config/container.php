<?php

use Service\ExampleInterface;
use Service\Example;

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
        'container' => [
            ExampleInterface::class => function() {
                return new Example();
            }
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
