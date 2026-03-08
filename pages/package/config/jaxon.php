<?php

return [
    'directories' => [
        realpath(dirname(__DIR__, 3) . '/ajax/namespace/app') => 'App',
        realpath(dirname(__DIR__, 3) . '/ajax/namespace/ext') => 'Ext',
    ],
];
