<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Jaxon\Laravel\Jaxon;
use Lagdo\DbAdmin\Package as DbAdmin;
use function Jaxon\jaxon;

class DemoController extends Controller
{
    public function index(Jaxon $jaxon)
    {
        // Save the DialogTitle var in the session
        // session()->set('DialogTitle', 'Yeah Man!!');

        // Set the DbAdmin package as ready
        $dbAdmin = $jaxon->package(DbAdmin::class);
        $dbAdmin->ready();

        // Print the page
        return view('demo/index', array(
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Laravel Framework",
            'menuEntries' => [], // menu_entries(),
            'menuSubdir' => './', // menu_subdir(),
            // Jaxon request to the App\Jaxon\Test\Bts controller
            'bts' => $jaxon->request(\App\Jaxon\Test\Bts::class),
            // Jaxon request to the App\Jaxon\Test\Pgw controller
            'pgw' => $jaxon->request(\App\Jaxon\Test\Pgw::class),
            // DbAdmin home
            'dbAdmin' => $dbAdmin->getHtml(),
        ));
    }

    public function jaxon(Jaxon $jaxon)
    {
        // $jaxon->callback()->invalid(function ($message) {
        //     \Log::warning("Upload error: $message");
        //     $response = jaxon()->getResponse();
        //     $response->dialog->info("Upload error: $message");
        //     return $response;
        // });

        // Process the Jaxon request
        if($jaxon->canProcessRequest())
        {
            return $jaxon->processRequest();
        }
    }
}
