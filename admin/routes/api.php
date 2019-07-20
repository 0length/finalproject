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
Route::post('articles', 'API\UserController@articles');

});

// Route::middleware('auth:api')->get('/article', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:api')->get('/subject', 'API\UserController@articles');

Route::get('articles', 'API\UserController@articles');
Route::get('articles/{id}', 'API\UserController@articlesid');
Route::get('subjects', 'API\UserController@subjects');
Route::get('subjects/{id}', 'API\UserController@subjectsid');
