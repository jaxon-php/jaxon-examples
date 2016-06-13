## jaxon-examples

Sample codes demonstrating the Jaxon library usage.

#### Installation

Download the files of this repository to a directory of your web server.

Cd to the directory and run the `composer update` command.
This will install the `jaxon-php/jaxon-core` package and its dependencies.

Configure your web server to give access to the directory.
You can then open any php example file in a browser.

#### Examples

All examples are based on the helloword.php example in the original Jaxon repository https://github.com/Jaxon/Jaxon/blob/master/examples/helloworld.php.

##### hello.php

This example shows how to export a function with Jaxon.

##### class.php

This example shows how to export a class with Jaxon.

##### merge.php

This example shows how to export the generated javascript code in an external file, which is then loaded into the webpage.
You'll need to create the "deferred" directory, and adapt the parameter of the mergeJavascript() function to your webserver configuration for this example to work.
The compression of the generated javascript code is not yet implemented.

##### plugins.php

The example shows the use of Jaxon plugins, by adding javascript notifications and modal windows to the class.php example with the jaxon-toastr, jaxon-pgwjs and jaxon-bootstrap packages.
Using an Jaxon plugin is very simple. After a plugin is installed with Composer, its automatically registers into the Jaxon core library. It can then be accessed both in the Jaxon main object, for configuration, and in the Jaxon response object, to provide additional functionalities to the application.

##### classdirs.php

This example shows how to automatically register all the PHP classes in a set of directories.
The classes in this example are not namespaced, thus they all need to have different names, even if they are in different subdirs.

##### namespaces.php

This example shows how to automatically register all the classes in a set of directories with namespaces.
The namespace is prepended to the generated javascript class names, and PHP classes in different subdirs can have the same name.

##### autoload-default.php

This example shows how to optimize Jaxon requests processing with autoloading.
In all the examples above, an instance of all exported Jaxon classes is created when processing a request, while only an instance of the requested class is needed. In an application with a high number of classes, this can cause performance issues.
In this example, the Jaxon classes are not registered when processing a request. However, the Jaxon library is smart enough to detect that the required class is missing, and load only the necessary file.

##### autoload-composer.php

This example illustrates the use of the Composer autoloader.
By default, the Jaxon library implements a simple autoloading mechanism by require_once'ing the corresponding PHP file for each missing class. When provided with the Composer autoloader, the Jaxon library registers all directories with a namespace into the PSR-4 autoloader, and it registers all the classes in directories with no namespace into the classmap autoloader.

##### autoload-disabled.php

In this example the autoloading is disabled in the Jaxon library.
The developer then needs to provides its own autoloading, otherwise the Jaxon library will raise an error at any attempt to register classes from a directory.
This example will not work until the autoloading is setup.
