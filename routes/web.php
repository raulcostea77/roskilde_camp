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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook-login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::post('/saveCamp', 'CampController@saveCamp')->name('save-camp-location');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');


// Chat stuff

 Route::resource('groups', 'GroupController');

Route::resource('conversations', 'ConversationController');
// end chat stuff
