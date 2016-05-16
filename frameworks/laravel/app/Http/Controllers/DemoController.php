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
		// Register the Xajax classes
		\LaravelXajax::register();
		// Print the page
		return view('index', array(
			'XajaxCss' => \LaravelXajax::css(),
			'XajaxJs' => \LaravelXajax::js(),
			'XajaxScript' => \LaravelXajax::script()
		));
	}
}
