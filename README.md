## jaxon-examples

Sample codes demonstrating the Jaxon library usage.

#### The examples

All examples are based on the helloword.php example in the original Xajax repository https://github.com/Xajax/Xajax/blob/master/examples/helloworld.php.

#### Installation

Download the files of this repository to your web server.

Cd to the directory and run the `composer update` command.
This will install the Jaxon packages and their dependencies.

Configure your web server to give access to the `web` subdirectory, and edit the `menu_subdir()` function in the `includes\menu.php` file accordingly.
You will then be able to browse the examples.

#### Frameworks

Examples are provided for the 6 supported PHP frameworks.

- CakePHP
- CodeIgniter
- Laravel
- Symfony
- Yii Framework
- Zend Framework

To be able to run the example for a given framework, first install a supported version of the framework
and the corresponding Jaxon package in a separate directory, as described in their respective documentations.
Then, copy the example files for the framework from the `frameworks` subdir of this package to the root of the installation.

For the CakePHP framework, rename the `config/routes-{version}.php` file to `config/routes.php`.

For the Zend Framework, rename the `module/Application/config/module.config-{version}.php` file to `module/Application/config/module.config.php`.

Back to the examples installation, edit the `index.php` file in the subdir of the framework, and set the `$rootDir` variable to the path of the directory where the framework is installed.
If multiple `index-{version}.php` files are provided, rename the one corresponding to the installed version of the framework to `index.php`.

That's it.
