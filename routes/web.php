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

Router::prefix('category')->name('category.')->group(function(){
    Router::get('index', 'CategoryController@index')->name('index');
    Router::get('edit/{id}', 'CategoryController@edit')->name('edit');
    Router::get('create', 'CategoryController@create')->name('create');
    Router::post('store', 'CategoryController@store')->name('store');
    Router::post('update', 'CategoryController@update')->name('update');
    Router::post('delete', 'CategoryController@delete')->name('delete');
});
