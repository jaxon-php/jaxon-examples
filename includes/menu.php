<?php

function menu_subdir()
{
    return '';
}

function menu_entries()
{
    return [
        '/' => 'Home',
        '/exp/hello/' => 'Hello World Function',
        '/exp/alias/' => 'Hello World Alias',
        '/exp/class/' => 'Hello World Class',
        '/exp/export/' => 'Export Javascript',
        '/exp/confirm/' => 'Confirm question',
        '/exp/pagination/' => 'Pagination',
        '/exp/plugins/' => 'Plugin Usage',
        '/exp/dialogs/' => 'Dialogs',
        '/exp/flot/' => 'Flot Plugin',
        '/exp/config/' => 'Config File',
        '/exp/directories/' => 'Register Directories',
        '/exp/namespaces/' => 'Register Namespaces',
        '/exp/container/' => 'DI container',
        '/exp/package/' => 'Package',
        '/exp/autoload-default/' => 'Default Autoloader',
        '/exp/autoload-disabled/' => 'Third Party Autoloader',
    ];
}
