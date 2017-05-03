<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Jaxon\Zend\Controller\Plugin\JaxonPlugin;

class DemoController extends AbstractActionController
{
    /**
     * @var \Jaxon\Zend\Controller\Plugin\JaxonPlugin
     */
    protected $jaxon;

    public function __construct(JaxonPlugin $jaxon)
    {
        $this->jaxon = $jaxon;
    }

    public function indexAction()
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

        // Init the session
        $session = new Container('base');
        $session->offsetSet('DialogTitle', 'Yeah Man!!');

        // Call the Jaxon module
        $this->jaxon->register();

        $view = new ViewModel(array(
            'jaxonCss' => $this->jaxon->css(),
            'jaxonJs' => $this->jaxon->js(),
            'jaxonScript' => $this->jaxon->script(),
            'menuEntries' => $menuEntries,
            // Jaxon request to the Jaxon\App\Test\Bts controller
            'bts' => $this->jaxon->request('Jaxon.App.Test.Bts'),
            // Jaxon request to the Jaxon\App\Test\Pgw controller
            'pgw' => $this->jaxon->request('Jaxon.App.Test.Pgw'),
        ));
        $view->setTemplate('demo/index');
        return $view;
    }
}
