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

Auth::routes();

Route::group(['middlware' => 'auth'], function()
{
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/repositories')->uses('RepositoryController@index')->name('repositories.index');
    Route::get('/repositories/create')->uses('RepositoryController@create')->name('repositories.create');
    Route::post('/respoitories')->uses('RepositoryController@store')->name('repositories.store');

	Route::get('/repositories/{repository}/posts/create')->uses('PostController@create')->name('posts.create');
	Route::post('/repositories/{repository}/posts')->uses('PostController@store')->name('posts.store');
});

