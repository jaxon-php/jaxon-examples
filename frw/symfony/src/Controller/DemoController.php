<?php

namespace App\Controller;

use Jaxon\Symfony\Jaxon;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Jaxon\App\Test\Bts;
use Jaxon\App\Test\Pgw;
use Lagdo\DbAdmin\Package as DbAdmin;

use function Jaxon\jaxon;
use function Jaxon\pm;

class DemoController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request, Jaxon $jaxon, LoggerInterface $logger)
    {
        // Set the DbAdmin package as ready
        $dbAdmin = $jaxon->package(DbAdmin::class);
        $dbAdmin->ready();

        // Print the page
        return $this->render('demo/index.html.twig', [
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Symfony Framework",
            'menuEntries' => [],
            'menuSubdir' => '',
            // Jaxon request to the Bts controller
            'bts' => $jaxon->request(Bts::class),
            // Jaxon request to the Pgw controller
            'pgw' => $jaxon->request(Pgw::class),
            // Jaxon Request Factory
            'pr' => pm(),
            // DbAdmin home
            'dbAdmin' => $dbAdmin->getHtml(),
        ]);
    }

    /**
     * @Route("/ajax", name="jaxon.ajax")
     */
    public function jaxon(Jaxon $jaxon)
    {
        if(!$jaxon->canProcessRequest())
        {
            return; // Todo: return an error message
        }

        $jaxon->processRequest();
        return $jaxon->httpResponse();
    }
}
