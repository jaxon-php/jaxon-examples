<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DemoController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        // Init the session
        $session = new Session();
        $session->set('DialogTitle', 'Yeah Man!!');
        // Register the Jaxon classes
        $jaxon = $this->get('jaxon.ajax');

        // Print the page
        return $this->render('demo/index.html.twig', [
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Symfony Framework",
            'menuEntries' => \menu_entries(),
            'menuSubdir' => \menu_subdir(),
            // Jaxon request to the Jaxon\App\Test\Bts controller
            'bts' => $jaxon->request(\Jaxon\App\Test\Bts::class),
            // Jaxon request to the Jaxon\App\Test\Pgw controller
            'pgw' => $jaxon->request(\Jaxon\App\Test\Pgw::class),
            // Jaxon Request Factory
            'pr' => \pr(),
        ]);
    }
}
