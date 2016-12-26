<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
    }

    public function index()
    {
        $menuEntries = array(
            'index.php' => 'Home',
            'hello.php' => 'Hello World Function',
            'alias.php' => 'Hello World Alias',
            'class.php' => 'Hello World Class',
            'merge.php' => 'Merge Javascript',
            'plugins.php' => 'Plugin Usage',
            'config.php' => 'Config File',
            'directories.php' => 'Register Directories',
            'namespaces.php' => 'Register Namespaces',
            'autoload-default.php' => 'Default Autoloader',
            'autoload-disabled.php' => 'Third Party Autoloader',
            'autoload-separated.php' => 'Separated Files',
            'laravel.php' => 'Laravel Framework',
            'codeigniter.php' => 'CodeIgniter Framework',
        );

        // Register the Jaxon classes
        \LaravelJaxon::register();
        // Print the page
        return view('demo/index', array(
            'jaxonCss' => \LaravelJaxon::css(),
            'jaxonJs' => \LaravelJaxon::js(),
            'jaxonScript' => \LaravelJaxon::script(),
            'menuEntries' => $menuEntries,
        ));
    }
}
