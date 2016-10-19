<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DemoController extends AbstractActionController
{
    public function indexAction()
    {
        // Call the Jaxon module
        $jaxon = $this->getServiceLocator()->get('JaxonPlugin');
        $jaxon->register();

        $view = new ViewModel(array(
            'JaxonCss' => $jaxon->css(),
            'JaxonJs' => $jaxon->js(),
            'JaxonScript' => $jaxon->script(),
        ));
        $view->setTemplate('demo/index');
        return $view;
    }
}
