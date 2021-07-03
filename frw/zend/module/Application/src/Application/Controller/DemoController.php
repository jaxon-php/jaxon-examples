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
        // Init the session
        $session = new Container('base');
        $session->offsetSet('DialogTitle', 'Yeah Man!!');

        $view = new ViewModel(array(
            'jaxonCss' => $this->jaxon->css(),
            'jaxonJs' => $this->jaxon->js(),
            'jaxonScript' => $this->jaxon->script(),
            'pageTitle' => "Zend Framework",
            'menuEntries' => [],
            'menuSubdir' => '',
            // Jaxon request to the Jaxon\App\Test\Bts controller
            'bts' => $this->jaxon->request(\Jaxon\App\Test\Bts::class),
            // Jaxon request to the Jaxon\App\Test\Pgw controller
            'pgw' => $this->jaxon->request(\Jaxon\App\Test\Pgw::class),
        ));
        $view->setTemplate('demo/index');
        return $view;
    }
}
