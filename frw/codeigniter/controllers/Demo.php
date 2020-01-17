<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the Jaxon library
        $this->load->library('jaxon');
        // Load the session library
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->library('session');
        $this->session->set_userdata(['DialogTitle' => 'Yeah Man!!']);

        // Print the page
        $this->load->view('demo/index', array(
            'JaxonCss' => $this->jaxon->css(),
            'JaxonJs' => $this->jaxon->js(),
            'JaxonScript' => $this->jaxon->script(),
            'pageTitle' => "CodeIgniter Framework",
            'menuEntries' => menu_entries(),
            'menuSubdir' => menu_subdir(),
            // Jaxon request to the Jaxon\App\Test\Bts controller
            'bts' => $this->jaxon->request(\Jaxon\App\Test\Bts::class),
            // Jaxon request to the Jaxon\App\Test\Pgw controller
            'pgw' => $this->jaxon->request(\Jaxon\App\Test\Pgw::class),
        ));
    }
}
