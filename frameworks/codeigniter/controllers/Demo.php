<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the Jaxon library
        $this->load->library('jaxon');
        // Load the session library
        $this->load->library('session');
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

        $this->load->library('session');
        $this->session->set_userdata(['DialogTitle' => 'Yeah Man!!']);
        // Register the Jaxon classes
        $this->jaxon->register();
        // Print the page
        $this->load->view('demo/index', array(
            'JaxonCss' => $this->jaxon->css(),
            'JaxonJs' => $this->jaxon->js(),
            'JaxonScript' => $this->jaxon->script(),
            'pageTitle' => "CodeIgniter Framework",
            'menuEntries' => $menuEntries,
            // Jaxon request to the Jaxon\App\Test\Bts controller
            'bts' => $this->jaxon->request(\Jaxon\App\Test\Bts::class),
            // Jaxon request to the Jaxon\App\Test\Pgw controller
            'pgw' => $this->jaxon->request(\Jaxon\App\Test\Pgw::class),
        ));
    }
}
