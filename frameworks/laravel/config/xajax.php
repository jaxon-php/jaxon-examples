<?php

return array(
	'app' => array(
		// 'route' => 'xajax',
		// 'dir' => '',
		// 'namespace' => '',
		// 'excluded' => [],
	),
	'lib' => array(
		'core' => array(
			'language' => 'en',
			'encoding' => 'UTF-8',
			'request' => array(
				'uri' => 'laravel/xajax',
			),
			'prefix' => array(
				'class' => '',
			),
			'debug' => array(
				'on' => false,
				'verbose' => false,
			),
			'error' => array(
				'handle' => false,
			),
		),
		'js' => array(
			'lib' => array(
				// 'uri' => '',
			),
			'app' => array(
				// 'uri' => '',
				// 'dir' => '',
				'export' => false,
				'minify' => false,
			),
		),
		'toastr' => array(
			'options' => array(
				'closeButton' => true,
				'positionClass' => 'toast-bottom-right'
			),
		),
		'assets' => array(
			'include' => array(
				'all' => true,
			),
		),
	),
);
