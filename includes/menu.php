<?php

function menu_subdir()
{
    return '/web';
}

function menu_entries()
{
    return [
        '/' => 'Home',
        '/hello/' => 'Hello World Function',
        '/alias/' => 'Hello World Alias',
        '/class/' => 'Hello World Class',
        '/export/' => 'Export Javascript',
        '/pagination/' => 'Pagination',
        '/plugins/' => 'Plugin Usage',
        '/dialogs/' => 'Dialogs',
        '/flot/' => 'Flot Plugin',
        '/config/' => 'Config File',
        '/directories/' => 'Register Directories',
        '/namespaces/' => 'Register Namespaces',
        '/autoload-default/' => 'Default Autoloader',
        '/autoload-composer/' => 'Composer Autoloader',
        '/autoload-disabled/' => 'Third Party Autoloader',
        '/dependency-injection/' => 'Dependency Injection',
        '/laravel/' => 'Laravel Framework',
        '/symfony/' => 'Symfony Framework',
        '/zend/' => 'Zend Framework',
        '/codeigniter/' => 'CodeIgniter Framework',
        '/yii/' => 'Yii Framework',
        '/cake/' => 'CakePHP Framework',
    ];
}
