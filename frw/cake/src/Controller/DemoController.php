<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Routing\Router;

class DemoController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // Load the Jaxon component
        $this->loadComponent('Jaxon/Cake.Jaxon');
    }

    public function index()
    {
        // Start and init the session
        $this->request->session()->write('DialogTitle', 'Yeah Man!!');

        // Set the layout
        if(substr(Configure::version(), 0, 3) != '3.0')
        {
            $this->viewBuilder()->layout('empty');
        }
        else
        {
            $this->layout = 'empty';
        }

        // Call the Jaxon module
        $this->Jaxon->register();

        $this->set('jaxonCss', $this->Jaxon->css());
        $this->set('jaxonJs', $this->Jaxon->js());
        $this->set('jaxonScript', $this->Jaxon->script());
        $this->set('pageTitle', "Cake Framework");
        $this->set('menuEntries', menu_entries());
        $this->set('menuSubdir', menu_subdir());
        // Jaxon request to the Jaxon\App\Test\Bts controller
        $this->set('bts', $this->Jaxon->request(\Jaxon\App\Test\Bts::class));
        // Jaxon request to the Jaxon\App\Test\Pgw controller
        $this->set('pgw', $this->Jaxon->request(\Jaxon\App\Test\Pgw::class));
        $this->render('demo');
    }
}
