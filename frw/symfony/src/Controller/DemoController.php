<?php

namespace App\Controller;

use Jaxon\AjaxBundle\Jaxon;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Jaxon\App\Test\Bts;
use Jaxon\App\Test\Pgw;
use Lagdo\Adminer\Package as Adminer;

class DemoController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request, Jaxon $jaxon, LoggerInterface $logger)
    {
        // Init the session
        $session = new Session();
        $session->set('DialogTitle', 'Yeah Man!!');

        // Print the page
        return $this->render('demo/index.html.twig', [
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Symfony Framework",
            'menuEntries' => menu_entries(),
            'menuSubdir' => menu_subdir(),
            // Jaxon request to the Bts controller
            'bts' => $jaxon->request(Bts::class),
            // Jaxon request to the Pgw controller
            'pgw' => $jaxon->request(Pgw::class),
            // Jaxon Request Factory
            'pr' => \pr(),
        ]);
    }
}
