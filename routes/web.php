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

Route::get('conversations/{groupID}','ConversationController@getGroupConversations');
Route::get('users/{groupID}','UserController@getUsersFromGroup');
Route::resource('conversations', 'ConversationController');



// end chat stuff

//b2b stuff

Route::get('b2b','QuestionsController@index');
Route::post('b2b/add','QuestionsController@store');


//random names stuff

Route::get('random','RandomNamesController@index');
Route::get('random/start','RandomNamesController@startNewGame');
Route::get('random/next','RandomNamesController@nextLoser');

