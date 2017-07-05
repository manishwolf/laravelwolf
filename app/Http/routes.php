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
Route::get('/home','UserController@home');
//Route::get('home','UserController@home');
Route::any('/editbook/{id}','UserController@editbook')->where(['id' => '[0-9]+']);
Route::any('/deletebook/{id}','UserController@deletebook')->where(['id' => '[0-9]+']);

Route::any('/addbook','UserController@addBook');
Route::any('/','Login@index');
Route::any('/registration','Login@registration');
Route::any('/logout','UserController@logout');


//~ Route::get('/home', function () {
	//~ echo "ffff";
    //~ return view('welcomeBack');
//~ });
//~ Route::get('/homeless','UserController@homeless');
//~ Route::get('/home/{name}', function ($name) {
	//~ try {
	//~ return $name;
//~ } catch (Exception $e) {echo "hunt";
//~ }
//~ })->where('name', '[A-Za-z]+');

?>
