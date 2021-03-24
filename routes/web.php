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
    return view('home');
});
Route::get('/user/register','Auth\RegisterController@show');
Route::post('/user/register','Auth\RegisterController@register');
Route::get('/user/logout','Auth\LoginController@logout');
Route::get('/user/login','Auth\LoginController@show');
Route::post('/user/login','Auth\LoginController@login');

Route::prefix('admin')->namespace("Admin")->middleware('manager')->group(function (){

    Route::get('/','AdminController@index');
    Route::get('/users','UserController@index');
    Route::get('/users/edit/{id}','UserController@edit');
    Route::post('/users/edit/{id}','UserController@update');

    Route::get('/roles','RoleController@index');
    Route::get('/roles/create','RoleController@create');
    Route::post('/roles/create','RoleController@store');
    Route::get('/roles/edit/{id}','RoleController@edit');

    Route::get('/categories','CategoryController@index');
    Route::get('/categories/create','CategoryController@create');
    Route::post('/categories/create','CategoryController@store');
    Route::get('/categories/edit/{id}','CategoryController@edit');
    Route::post('/categories/edit/{id}','CategoryController@update');


});

Route::prefix('postcreator')->namespace('PostCreator')->middleware('postcreator')->group(function (){

    Route::get('posts','PostController@index');
    Route::get('posts/create','PostController@create');
    Route::post('posts/create','PostController@store');
    Route::get('posts/edit/{id}','PostController@edit');
    Route::post('posts/edit/{id}','PostController@update');
    Route::get('posts/show/{name}','PostController@show');
    Route::post('comment/create','CommentController@store');

});
