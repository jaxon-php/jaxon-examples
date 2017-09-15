<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Jaxon\Laravel\Jaxon;

class DemoController extends Controller
{
    public function index(Jaxon $jaxon)
    {
        $menuEntries = array(
            'index.php' => 'Home',
            'hello.php' => 'Hello World Function',
            'alias.php' => 'Hello World Alias',
            'class.php' => 'Hello World Class',
            'extern.php' => 'Export Javascript',
            'plugins.php' => 'Plugin Usage',
            'flot.php' => 'Flot Plugin',
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
        $jaxon->register();
        // Print the page
        return view('demo/index', array(
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Laravel Framework",
            'menuEntries' => $menuEntries,
            // Jaxon request to the Jaxon\App\Test\Bts controller
            'bts' => $jaxon->request(\Jaxon\App\Test\Bts::class),
            // Jaxon request to the Jaxon\App\Test\Pgw controller
            'pgw' => $jaxon->request(\Jaxon\App\Test\Pgw::class),
        ));
    }
}
