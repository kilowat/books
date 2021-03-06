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

Route::get('user/edit',[
		'as'=>'user.profile.edit',
		'middleware'=>'auth',
		'uses'=>'UserController@edit'
]);

Route::patch('user/store',[
		'as'=>'user.profile.store',
		'middleware'=>'auth',
		'uses'=>'UserController@store'
]);
Route::model('user','\App\Model\User');

Route::get('user/list',[
		'as'=>'user.list',
		'middleware'=>'auth',
		'uses'=>'UserController@usersList'
]);

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

/*
/*****user publications********
Route::get('user/profile/publication/index',[
		'as'=>'user.publication.index',
		'middleware'=>'auth',
		'uses'=>'PublicationController@index'
]);
Route::get('user/profile/publication/create',[
		'as'=>'user.publication.create',
		'middleware'=>'auth',
		'uses'=>'PublicationController@create'
]);
**************************/

Route::get('user/publication/{id}/editor',[
		'as'=>'user.publication.editor.index',
		'uses'=>'EditorController@index',
	]);
Route::post('user/publication/{id}/editor/save',[
		'as'=>'user.publication.editor.save',
		'uses'=>'EditorController@save',
	]);
Route::post('user/publication/{id}/editor/page',[
		'as'=>'user.publication.editor.page',
		'uses'=>'EditorController@page',
	]);


Route::get('publication/category/{category}/{publication}',[
		'as'=>'publication.detail',
		'uses'=>'PublicationController@detail'
])->where(['publication' => '[0-9]+', 'category' => '[А-яA-z0-9]+']);

Route::get('publication/category/{category}',[
		'as'=>'publication.category',
		'uses'=>'PublicationController@category'
]);

Route::get('publication',[
		'as'=>'publication.all',
		'uses'=>'PublicationController@all'
]);



Route::resource('user/publication','PublicationController');



Route::bind('publication',function($id){
	return App\Model\Publication::find($id);
});

Route::controller('reader', 'ReaderController');
	

Route::controller('auth', 'Auth\AuthController');