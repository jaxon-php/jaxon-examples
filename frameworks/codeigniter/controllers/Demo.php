<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(__DIR__ . '/Xajax_Controller.php');

class Demo extends Xajax_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Register the Xajax classes
		$this->xajax->register();
		// Print the page
		$this->load->library('parser');
		$this->parser->parse('index', array(
			'XajaxCssInclude' => $this->xajax->css(),
			'XajaxJsInclude' => $this->xajax->js(),
			'XajaxJavascript' => $this->xajax->javascript()
		));
	}
}
