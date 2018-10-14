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

Route::get('/consume', function() {
	return view('consume.index');
});

Route::get('conversations/centre/{id}','ConversationController@centre');
Route::get('conversations/messages/{convo_id}','ConversationMessageController@show');