<?php

function menu_entries()
{
    return [
        '/exp/hello/' => [
            'title' => 'Hello World Function',
            'desc' => '<p>
This example shows how to export a function with Jaxon.
</p>',
        ],
        '/exp/alias/' => [
            'title' => 'Hello World Alias',
            'desc' => '<p>
This example shows how to set an alias to an exported function with Jaxon.
</p>',
        ],
        '/exp/class/' => [
            'title' => 'Hello World Class',
            'desc' => '<p>
This example shows how to export a class with Jaxon.
</p>',
        ],
        '/exp/export/' => [
            'title' => 'Export Javascript',
            'desc' => '<p>
This example shows how to export the generated javascript code in an external file, which is then loaded into the webpage.
</p>',
        ],
        '/exp/confirm/' => [
            'title' => 'Confirm question',
            'desc' => '',
        ],
        '/exp/pagination/' => [
            'title' => 'Pagination',
            'desc' => '',
        ],
        '/exp/plugins/' => [
            'title' => 'Plugin Usage',
            'desc' => '<p>
The example shows the use of Jaxon plugins, by adding javascript notifications and modal windows to the class.php
example with the jaxon-toastr, jaxon-pgwjs and jaxon-bootstrap packages.
</p>
<p>
Using an Jaxon plugin is very simple. After a plugin is installed with Composer, its automatically registers into
the Jaxon core library. It can then be accessed both in the Jaxon main object, for configuration, and in the Jaxon
response object, to provide additional functionalities to the application.
</p>',
        ],
        '/exp/dialogs/' => [
            'title' => 'Dialogs',
            'desc' => '',
        ],
        '/exp/flot/' => [
            'title' => 'Flot Plugin',
            'desc' => '',
        ],
        '/exp/config/' => [
            'title' => 'Config File',
            'desc' => '',
        ],
        '/exp/directories/' => [
            'title' => 'Register Directories',
            'desc' => '<p>
This example shows how to automatically register all the PHP classes in a set of directories.
</p>
<p>
The classes in this example are not namespaced, thus they all need to have different names, even if they are in different subdirs.
</p>',
        ],
        '/exp/namespaces/' => [
            'title' => 'Register Namespaces',
            'desc' => '<p>
This example shows how to automatically register all the classes in a set of directories with namespaces.
</p>
<p>
The namespace is prepended to the generated javascript class names, and PHP classes in different subdirs can have the same name.
</p>',
        ],
        '/exp/container/' => [
            'title' => 'DI container',
            'desc' => '',
        ],
        '/exp/package/' => [
            'title' => 'Package',
            'desc' => '',
        ],
        '/exp/autoload-default/' => [
            'title' => 'Default Autoloader',
            'desc' => '<p>
This example illustrates the use of the Composer autoloader.
</p>
<p>
By default, the Jaxon library implements a simple autoloading mechanism by require_once\'ing the corresponding PHP file
for each missing class.
</p>
<p>
When provided with the Composer autoloader, the Jaxon library registers all directories with a namespace
into the PSR-4 autoloader, and it registers all the classes in directories with no namespace into the classmap autoloader.
</p>',
        ],
        '/exp/autoload-disabled/' => [
            'title' => 'Third Party Autoloader',
            'desc' => '<p>
In this example the autoloading is disabled in the Jaxon library.
</p>
<p>
A third-party autoloader is used to load the Jaxon classes.
</p>',
        ],
    ];
}
