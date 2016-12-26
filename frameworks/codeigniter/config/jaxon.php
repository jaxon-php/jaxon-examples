<?php

$config['app'] = array(
    'controllers' => array(
        // 'directory' => '',
        // 'namespace' => '',
        // 'protected' => array(),
    ),
);
$config['lib'] = array(
    'core' => array(
        'language' => 'en',
        'encoding' => 'UTF-8',
        'request' => array(
            'uri' => '/exp/codeigniter/jaxon/process',
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
            'uri' => '/jaxon/lib',
        ),
        'app' => array(
            // 'uri' => '',
            // 'dir' => '',
            'extern' => false,
            'minify' => false,
            'options' => '',
        ),
    ),
    'dialogs' => array(
        'libraries' => array('pgwjs'),
        'default' => array(
            'modal' => 'bootbox',
            'alert' => 'bootbox',
            'confirm' => 'bootbox',
        ),
        'toastr' => array(
            'options' => array(
                'closeButton' => true,
                'positionClass' => 'toast-bottom-right'
            ),
        ),
        'assets' => array(
            'include' => array(
                'all' => true,
            ),
        ),
    ),
);
