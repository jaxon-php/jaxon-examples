<?php

function menu_subdir()
{
    return '/exp/web';
}

function menu_entries()
{
    return array(
        '/' => 'Home',
        '/hello/' => 'Hello World Function',
        '/alias/' => 'Hello World Alias',
        '/class/' => 'Hello World Class',
        '/extern/' => 'Export Javascript',
        '/plugins/' => 'Plugin Usage',
        '/dialogs/' => 'Dialogs',
        '/flot/' => 'Flot Plugin',
        '/config/' => 'Config File',
        '/directories/' => 'Register Directories',
        '/namespaces/' => 'Register Namespaces',
        '/autoload/default.php' => 'Default Autoloader',
        '/autoload/composer.php' => 'Composer Autoloader',
        '/autoload/disabled.php' => 'Third Party Autoloader',
        '/armada/' => 'Armada',
        '/laravel/' => 'Laravel Framework',
        '/symfony/' => 'Symfony Framework',
        '/zend/' => 'Zend Framework',
        '/codeigniter/' => 'CodeIgniter Framework',
        '/yii/' => 'Yii Framework',
        '/cake/' => 'CakePHP Framework',
    );
}
