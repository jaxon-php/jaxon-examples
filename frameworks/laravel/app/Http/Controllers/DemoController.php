<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelJaxon;

class DemoController extends Controller
{
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
            'armada.php' => 'Armada',
            'laravel/' => 'Laravel Framework',
            'symfony/' => 'Symfony Framework',
            'zend/' => 'Zend Framework',
            'codeigniter/' => 'CodeIgniter Framework',
            'yii/' => 'Yii Framework',
            'cake/' => 'CakePHP Framework',
        );

        // Save the DialogTitle var in the session
        session()->set('DialogTitle', 'Yeah Man!!');
        // Register the Jaxon classes
        LaravelJaxon::register();
        // Print the page
        return view('demo/index', array(
            'jaxonCss' => LaravelJaxon::css(),
            'jaxonJs' => LaravelJaxon::js(),
            'jaxonScript' => LaravelJaxon::script(),
            'menuEntries' => $menuEntries,
            // Jaxon request to the Jaxon\App\Test\Bts controller
            'bts' => LaravelJaxon::request('Jaxon.App.Test.Bts'),
            // Jaxon request to the Jaxon\App\Test\Pgw controller
            'pgw' => LaravelJaxon::request('Jaxon.App.Test.Pgw'),
        ));
    }
}
