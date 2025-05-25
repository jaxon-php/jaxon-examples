<?php

return [
    'directories' => [
        realpath(dirname(__DIR__, 4) . '/classes/namespace/app') => 'App',
        realpath(dirname(__DIR__, 4) . '/classes/namespace/ext') => 'Ext',
    ],
];
