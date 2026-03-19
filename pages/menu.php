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
            'desc' => '<p>
This example demonstrates the built-in pagination component.
</p>',
        ],
        'pagination-databag' => [
            'title' => 'Pagination and databag',
            'desc' => '<p>
In this example the built-in pagination component in used with a databag.
</p>',
        ],
        'plugin' => [
            'title' => 'Response plugin',
            'desc' => '<p>
This example shows how to create a response plugin with custom commands.
</p>
<p>
The response plugin class extends the `AbstractResponsePlugin` and implements the `JsCodeGeneratorInterface` interface for Javascript code generation.
Its Javascript code registers two custom commands in the client application, which are then called in the PHP functions.
</p>',
        ],
        'dialogs' => [
            'title' => 'Dialogs',
            'desc' => '',
        ],
        'flot' => [
            'title' => 'Flot examples',
            'desc' => 'Flot examples',
        ],
        'flot-types' => [
            'title' => 'Flot types examples',
            'desc' => 'Flot types examples from https://www.flotcharts.org/flot/examples/series-types/index.html.',
        ],
        'flot-axes' => [
            'title' => 'Flot multiple axes examples',
            'desc' => 'Flot multiple axes examples from https://www.flotcharts.org/flot/examples/axes-interacting/index.html.',
        ],
        'flot-pie' => [
            'title' => 'Flot pie example',
            'desc' => 'Flot pie example from https://www.flotcharts.org/flot/examples/series-pie/index.html.',
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
        'autoload-composer' => [
            'title' => 'Composer Autoloader',
            'desc' => '<p>
This example demonstrates the use of the Composer autoloader.
</p>
<p>
By default, the Jaxon library registers all directories with a namespace into the PSR-4 autoloader,
and registers all the classes in directories with no namespace into the classmap autoloader.
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
        // The upload example is disabled by default
        // 'upload' => [
        //     'title' => 'File upload',
        //     'desc' => '<p>File upload example.</p>',
        // ],
    ];
}
