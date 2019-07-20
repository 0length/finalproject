<?php

use Illuminate\Http\Request;
use App\Article;
use App\Subject;
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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
});

//getList
Route::get('articles', 'API\DataController@articles');
Route::get('subjects', 'API\DataController@subjects');

//getItembyid
Route::get('articles/{id}', 'API\DataController@articlesid');
Route::get('subjects/{id}', 'API\DataController@subjectsid');

//increment
Route::get('articles/visit/{id}', 'API\DataController@countItem');
Route::post('articles/visit/{id}', 'API\DataController@increItem');