<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todos','TodoController')->middleware('auth:api');
Route::get('conversations/centre/{id}','ConversationController@centre')->middleware('auth:api');
Route::get('conversations/messages/{convo_id}','ConversationMessageController@show')->middleware('auth:api');
Route::get('conversations/parent/{parent_id}','ConversationPartyController@show')->middleware('auth:api');

Route::post('conversations/new','ConversationController@store')->middleware('auth:api');
Route::post('conversations/message/new','ConversationMessageController@store')->middleware('auth:api');