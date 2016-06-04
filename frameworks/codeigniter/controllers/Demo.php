<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(__DIR__ . '/Jaxon_Controller.php');

class Demo extends Jaxon_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Register the Jaxon classes
        $this->jaxon->register();
        // Print the page
        $this->load->library('parser');
        $this->parser->parse('index', array(
            'JaxonCss' => $this->jaxon->css(),
            'JaxonJs' => $this->jaxon->js(),
            'JaxonScript' => $this->jaxon->script()
        ));
    }
}
