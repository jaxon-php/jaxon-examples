<?php

return [
    'directories' => [
        realpath(dirname(__DIR__, 3) . '/classes/namespace/app') => 'App',
        realpath(dirname(__DIR__, 3) . '/classes/namespace/ext') => 'Ext',
    ],
];
