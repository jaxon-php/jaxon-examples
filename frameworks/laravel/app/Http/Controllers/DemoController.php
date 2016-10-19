<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
    }

    public function index()
    {
        // Register the Jaxon classes
        \LaravelJaxon::register();
        // Print the page
        return view('demo/index', array(
            'JaxonCss' => \LaravelJaxon::css(),
            'JaxonJs' => \LaravelJaxon::js(),
            'JaxonScript' => \LaravelJaxon::script()
        ));
    }
}
