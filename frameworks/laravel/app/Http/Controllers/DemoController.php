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
            'extern.php' => 'Export Javascript',
            'plugins.php' => 'Plugin Usage',
            'config.php' => 'Config File',
            'directories.php' => 'Register Directories',
            'namespaces.php' => 'Register Namespaces',
            'autoload-default.php' => 'Default Autoloader',
            'autoload-composer.php' => 'Composer Autoloader',
            'autoload-disabled.php' => 'Third Party Autoloader',
            'module.php' => 'Module',
            'laravel/' => 'Laravel Framework',
            'symfony/' => 'Symfony Framework',
            'zend/' => 'Zend Framework',
            'codeigniter/' => 'CodeIgniter Framework',
            'yii/' => 'Yii Framework',
            'cake/' => 'CakePHP Framework',
        );

        // Start and init the session
        session()->start();
        // session(['DialogTitle' => 'Yeah Man!!']);
        session()->put('DialogTitle', 'Yeah Man!!');
        session()->save();
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
