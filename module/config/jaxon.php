<?php

return array(
    'app' => array(
        'controllers' => array(
            array(
                'directory' => dirname(__DIR__) . '/classes',
                'namespace' => '\\Jaxon\\App',
                // 'separator' => '.',
                // 'protected' => [],
            ),
        ),
        'views' => array(
            'demo' => array(
                'directory' => dirname(__DIR__) . '/views',
                'extension' => '.tpl',
                'renderer' => 'jaxon',
                'register' => true,
            ),
        ),
        /*'options' => array(
            'views' => array(
                'default' => 'demo',
            ), 
        ),*/
    ),
    'lib' => array(
        'core' => array(
            'language' => 'en',
            'encoding' => 'UTF-8',
            'request' => array(
                // 'uri' => '',
            ),
            'prefix' => array(
                'class' => '',
            ),
            'debug' => array(
                'on' => false,
                'verbose' => false,
            ),
            'error' => array(
                'handle' => false,
            ),
        ),
        'js' => array(
            'lib' => array(
                // 'uri' => '/jaxon/lib',
            ),
            'app' => array(
                // 'uri' => '',
                // 'dir' => '',
                'extern' => false,
                'minify' => false,
            ),
        ),
        'assets' => array(
            'include' => array(
                'all' => true,
            ),
        ),
        'dialogs' => array(
            'libraries' => array('pgwjs'),
            'default' => array(
                'modal' => 'bootstrap',
                'alert' => 'bootstrap',
                'confirm' => 'bootstrap',
            ),
            'toastr' => array(
                'options' => array(
                    'closeButton' => true,
                    'positionClass' => 'toast-top-center'
                ),
            ),
        ),
    ),
);
