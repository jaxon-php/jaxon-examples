<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route to demo page
Route::get('/', array('as' => 'demo', 'uses' => 'DemoController@index'));

// Route to Jaxon request processor
/*Route::post('jaxon', array(
    'as' => 'laraveljaxon',
    'uses' => '\Jaxon\Laravel\Http\Controllers\JaxonClass@process',
));*/
