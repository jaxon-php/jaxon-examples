<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Jaxon\Laravel\Jaxon;

class DemoController extends Controller
{
    public function index(Jaxon $jaxon)
    {
        // Save the DialogTitle var in the session
        session()->set('DialogTitle', 'Yeah Man!!');
        // Register the Jaxon classes
        $jaxon->register();
        // Print the page
        return view('demo/index', array(
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Laravel Framework",
            'menuEntries' => menu_entries(),
            'menuSubdir' => menu_subdir(),
            // Jaxon request to the Jaxon\App\Test\Bts controller
            'bts' => $jaxon->request(\Jaxon\App\Test\Bts::class),
            // Jaxon request to the Jaxon\App\Test\Pgw controller
            'pgw' => $jaxon->request(\Jaxon\App\Test\Pgw::class),
        ));
    }
}
