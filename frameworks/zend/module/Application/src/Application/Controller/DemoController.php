<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
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
        // Call the Jaxon module
        // $this->jaxon = $this->getServiceLocator()->get('JaxonPlugin');
        $this->jaxon->register();

        $view = new ViewModel(array(
            'JaxonCss' => $this->jaxon->css(),
            'JaxonJs' => $this->jaxon->js(),
            'JaxonScript' => $this->jaxon->script(),
        ));
        $view->setTemplate('demo/index');
        return $view;
    }
}
