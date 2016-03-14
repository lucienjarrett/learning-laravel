<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|



Route::get('/contact', function(){

    return view('contact.contact');
} );

Route::get('contact/index', function(){

    return view('contact.index');
} );
*/
Route::get('/', function () {
    $people = ['Jamila', 'Lucien', 'Angeleque'];
    return view('welcome', compact('people'));
});

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
