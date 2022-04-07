<?php

namespace App\Controller;

use Lagdo\DbAdmin\Package as DbAdmin;

use Cake\Core\Configure;
use Cake\Routing\Router;

class DemoController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Load the Jaxon component
        $this->loadComponent('Jaxon/Cake.Jaxon');
    }

    public function index()
    {
        // Start and init the session
        $this->request->getSession()->write('DialogTitle', 'Yeah Man!!');

        // Set the DbAdmin package as ready
        $dbAdmin = $this->Jaxon->package(DbAdmin::class);
        $dbAdmin->ready();

        // Set the layout
        $this->viewBuilder()->setLayout('empty');

        $this->set('csrfToken', $this->request->getAttribute('csrfToken'));

        $this->set('jaxonCss', $this->Jaxon->css());
        $this->set('jaxonJs', $this->Jaxon->js());
        $this->set('jaxonScript', $this->Jaxon->script());
        $this->set('pageTitle', "Cake Framework");
        $this->set('menuEntries', []);
        $this->set('menuSubdir', '');
        // Jaxon request to the Jaxon\App\Test\Bts controller
        $this->set('bts', $this->Jaxon->request(\Jaxon\App\Test\Bts::class));
        // Jaxon request to the Jaxon\App\Test\Pgw controller
        $this->set('pgw', $this->Jaxon->request(\Jaxon\App\Test\Pgw::class));
        // DbAdmin home
        $this->set('dbAdmin', $dbAdmin->getHtml());
        $this->render('demo');
    }
}
