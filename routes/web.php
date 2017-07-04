<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|f
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('test','TestController@testCase'); 

Route::get('show',['uses'=>"TestController@show","as"=>"routShow"]);

Route::get('registertest','AddserTestController@register'); 

Route::get('adduser',['uses'=>"AddserTestController@addUser","as"=>"routAdduser"]);

Route::get('showuser',['uses'=>"AddserTestController@show","as"=>"routShowUser"]);

Route::post("testPost",['uses'=>'TestController@testCase2','as'=>'routeTest']);

Route::post("addUserPost",['uses'=>'AddserTestController@addUser','as'=>'routeRegister']);

Route::get('article/{id}' , ['uses'=>'TestPOController@showArticle','as'=>'routeshow']);

Route::post('sreach',['uses'=>'TestPOController@sreach','as'=>'routeSreach']);

Route::get('article' , ['uses'=>'TestPOController@allArticle','as'=>'routeArticle']);

Route::group(['middleware' => 'auth'], function(){

	Route::post("creatpost",['uses'=>'TestPOController@createNewPost','as'=>'creatpost']);

	Route::post("createMessage/{id}",['uses'=>'TestPOController@createMessage','as'=>'routeCreatMessage']);

	Route::get('userArticle',['uses'=>'TestPOController@showUserArticleTitle','as'=>'routeShowArticle']);

	Route::get("post",'TestPOController@viewPost');

	Route::post("post",['uses'=>'TestPOController@viewPost','as'=>'routePost']);

	Route::group(['middleware' => 'checkuser'], function(){

		Route::get("edit/{id}", ['uses'=>'TestPOController@editArticle','as'=>'routeEdit']);

		Route::put("updateArticle/{id}",['uses'=> 'TestPOController@updateArticle','as'=>'routeUpdateArticle']);

		Route::get("deleteArticle/{id}",['uses'=> 'TestPOController@deleteArticle','as'=>'routeDeleteArticle']);
	});
});
