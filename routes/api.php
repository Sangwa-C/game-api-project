<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*  routes for user table */
Route::get('getAllUsers', 'ApiController@getAllUsers');
Route::get('getUser/{id}', 'ApiController@getUser');
Route::post('createUser', 'ApiController@createUser');
Route::put('editUsers/{id}', 'ApiController@updateUser');
Route::delete('deleteUser/{id}','ApiController@deleteUser');

/*  routes for user table */

Route::get('displayAllCategories', 'ApiController@getAllCategories');
Route::get('DisplayCategory/{id}', 'ApiController@getCategory');
Route::post('createCategory', 'ApiController@createCategory');
Route::put('editCategory/{id}', 'ApiController@updateCategory');
Route::delete('deleteCategory/{id}','ApiController@deleteCategory');

/*  routes for user table */

Route::get('displayAllQuestion', 'ApiController@getAllQuestions');
Route::get('displayByQuestionId/{id}', 'ApiController@getQuestion');
Route::get('getQuestionByCatId/{id}', 'ApiController@getQuestionByCatId');
Route::post('createQuestion', 'ApiController@createQuestion');
Route::put('editQuestion/{id}', 'ApiController@updateQuestion');
Route::delete('deleteQuestion/{id}','ApiController@deleteQuestion');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
