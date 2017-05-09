<?php

return array(
    'app' => array(
        'classes' => array(
            array(
                'directory' => dirname(__DIR__) . '/classes',
                'namespace' => '\\Jaxon\\App',
                // 'separator' => '.',
                // 'protected' => [],
            ),
        ),
        'views' => array(
            'default' => array(
                'directory' => dirname(__DIR__) . '/views/default',
                'extension' => '.tpl',
                'renderer' => 'jaxon',
                'register' => true,
            ),
            'smarty' => array(
                'directory' => dirname(__DIR__) . '/views/smarty',
                'extension' => '.tpl',
                'renderer' => 'smarty',
                'register' => true,
            ),
            'dwoo' => array(
                'directory' => dirname(__DIR__) . '/views/dwoo',
                'extension' => '.tpl',
                'renderer' => 'dwoo',
                'register' => true,
            ),
            'blade' => array(
                'directory' => dirname(__DIR__) . '/views/blade',
                'extension' => '.blade.php',
                'renderer' => 'blade',
                'register' => true,
            ),
            'twig' => array(
                'directory' => dirname(__DIR__) . '/views/twig',
                'extension' => '.html.twig',
                'renderer' => 'twig',
                'register' => true,
            ),
            'latte' => array(
                'directory' => dirname(__DIR__) . '/views/latte',
                'extension' => '.tpl',
                'renderer' => 'latte',
                'register' => true,
            ),
            'raintpl' => array(
                'directory' => dirname(__DIR__) . '/views/raintpl',
                'extension' => '.tpl',
                'renderer' => 'raintpl',
                'register' => true,
            ),
        ),
        'options' => array(
            'views' => array(
                'default' => 'default',
            ), 
        ),
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
                'uri' => 'https://cdn.jaxon-php.org/libs/jaxon/1.2.0',
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
                'alert' => 'noty',
                'confirm' => 'noty',
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
