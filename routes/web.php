<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'LandPageController@index');

Route::get('/admin', 'DashboardController@index');

Route::get('/login', 'UserController@index');

Route::post('/checkUser', 'UserController@checkUser');

Route::get('/logout', 'UserController@logout');

Route::post('/angularConnect', 'AngularConnectController@index');

Route::get('/attributes', 'LangAttributeController@index');

Route::get('/translations', 'TranslationsController@index');

Route::get('/image_attribute', 'ImagesController@index');

Route::get('/img', 'ImagesController@imageContent');

Route::get('/archives', 'ImagesController@archives');

Route::get('/getArchive', 'ImagesController@getArchive');

Route::get('/jap', function(){

	setcookie("language", "jap", time() + (86400 * 30), "/");
	return redirect()->back();

});

Route::get('/eng', function(){

	setcookie("language", "eng", time() + (86400 * 30), "/");
	return redirect()->back();

});

Route::get('/sample', function(){

	DB::table('tbl_images')->insert(array(

		"image_name"	=> "4325435435435",
		"attribute_id"	=> "21"

		)); 

});

Route::get('/contact','contact_controller@sendMail');
