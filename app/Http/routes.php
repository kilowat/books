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


Route::get('/',[
	'as'=>'pages.index',
	'uses'=>'PageController@index',
		
]);
Route::get('user/profile/{user}',[
		'as'=>'user.profile',
		'middleware'=>'auth',
		'uses'=>'UserController@profile'
]);

Route::model('user','\App\Model\User');

Route::get('user/profile/messages/show',[
		'as'=>'user.messages.show',
		'middleware'=>'auth',
		'uses'=>'MessagesController@show'
]);
Route::get('user/profile/{id}/messages/send',[
		'as'=>'user.messages.send',
		'middleware'=>'auth',
		'uses'=>'MessagesController@send'
]);
Route::controller('auth', 'Auth\AuthController');