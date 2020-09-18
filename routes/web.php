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

Route::prefix('category')->name('category.')->group(function(){
    
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('{slug}/{id}/edit', 'CategoryController@edit')->name('edit');
    Route::get('create', 'CategoryController@create')->name('create');
    Route::post('store', 'CategoryController@store')->name('store');
    Route::post('{id}/update', 'CategoryController@update')->name('update');
    Route::post('delete', 'CategoryController@destroy')->name('delete');
});
