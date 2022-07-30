<?php

namespace App\Controller;

use Lagdo\DbAdmin\Package as DbAdmin;
use Cake\Core\Configure;
use Cake\Routing\Router;

use function Jaxon\jaxon;

class DemoController extends AppController
{
    public function index()
    {
        $jaxon = jaxon()->app();

        // Set the DbAdmin package as ready
        $dbAdmin = $jaxon->package(DbAdmin::class);
        $dbAdmin->ready();

        // Set the layout
        $this->viewBuilder()->setLayout('empty');

        $this->set('csrfToken', $this->request->getAttribute('csrfToken'));
        $this->set('jaxonCss', $jaxon->css());
        $this->set('jaxonJs', $jaxon->js());
        $this->set('jaxonScript', $jaxon->script());
        $this->set('pageTitle', "Cake Framework");
        $this->set('menuEntries', []);
        $this->set('menuSubdir', '');
        // Jaxon request to the Jaxon\App\Test\Bts controller
        $this->set('bts', $jaxon->request(\Jaxon\App\Test\Bts::class));
        // Jaxon request to the Jaxon\App\Test\Pgw controller
        $this->set('pgw', $jaxon->request(\Jaxon\App\Test\Pgw::class));
        // DbAdmin home
        $this->set('dbAdmin', $dbAdmin->getHtml());
        $this->render('demo');
    }

    public function jaxon()
    {}
}
