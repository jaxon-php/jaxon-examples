<?php

function menu_current(): string
{
    return $_GET['exp'] ?? '';
}

function menu_url(string $example): string
{
    return "/?exp=$example";
}

function menu_entries()
{
    return [
        'calculator' => [
            'title' => 'Calculator',
            'desc' => '<p>
In this example, a calculator is implemented as a Jaxon component, which is inserted at a given position in the page.
</p>
<p>
The result of the operation is computed by a service which is injected in the main component, and formatted by another component.
</p>',
        ],
        'hello' => [
            'title' => 'Hello World Function',
            'desc' => '<p>
This example shows how to export a function with Jaxon.
</p>',
        ],
        'alias' => [
            'title' => 'Hello World Alias',
            'desc' => '<p>
This example shows how to set an alias to an exported function with Jaxon.
</p>',
        ],
        'class' => [
            'title' => 'Hello World Class',
            'desc' => '<p>
This example shows how to export a class with Jaxon.
</p>',
        ],
        'export' => [
            'title' => 'Export Javascript',
            'desc' => '<p>
This example shows how to export the generated javascript code in an external file, which is then loaded into the webpage.
</p>',
        ],
        'confirm' => [
            'title' => 'Confirm question',
            'desc' => '',
        ],
        'pagination' => [
            'title' => 'Pagination',
            'desc' => '',
        ],
        'html-attributes' => [
            'title' => 'Jaxon HTML attributes',
            'desc' => '<p>
This example shows how to use Jaxon HTML custom attributes to attach a component to a DOM node, and define event handlers.
</p>',
        ],
        'event-parent' => [
            'title' => 'Children event handlers',
            'desc' => '<p>
This example shows how to use Jaxon HTML custom attributes to define event handlers on child DOM nodes.
</p>',
        ],
        'event-target' => [
            'title' => 'Multiple event handlers',
            'desc' => '<p>
This example shows how to use Jaxon HTML custom attributes to define multiple event handlers on a single DOM node.
</p>',
        ],
        'bind-component' => [
            'title' => 'Bind a component',
            'desc' => '<p>
This example shows how to dynamically bind a component to a DOM node.
</p>',
        ],
        'outerhtml-component' => [
            'title' => 'Attributes in outerHTML',
            'desc' => '<p>
This example shows how to dynamically bind a component to a DOM node by setting its outerHTML property.
</p>',
        ],
        'pagination-component' => [
            'title' => 'Pagination component',
            'desc' => 'This example demonstrates the built-in pagination component.',
        ],
        'pagination-databag' => [
            'title' => 'Pagination and databag',
            'desc' => 'In this example the built-in pagination component in used with a data bag.',
        ],
        'plugins' => [
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
        'dialogs' => [
            'title' => 'Dialogs',
            'desc' => '',
        ],
        'flot' => [
            'title' => 'Flot Plugin',
            'desc' => '',
        ],
        'config' => [
            'title' => 'Config File',
            'desc' => '',
        ],
        'directories' => [
            'title' => 'Register Directories',
            'desc' => '<p>
This example shows how to automatically register all the PHP classes in a set of directories.
</p>
<p>
The classes in this example are not namespaced, thus they all need to have different names, even if they are in different subdirs.
</p>',
        ],
        'namespaces' => [
            'title' => 'Register Namespaces',
            'desc' => '<p>
This example shows how to automatically register all the classes in a set of directories with namespaces.
</p>
<p>
The namespace is prepended to the generated javascript class names, and PHP classes in different subdirs can have the same name.
</p>',
        ],
        'container' => [
            'title' => 'DI container',
            'desc' => '',
        ],
        'package' => [
            'title' => 'Package',
            'desc' => '',
        ],
        'autoload-default' => [
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
        'autoload-disabled' => [
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
