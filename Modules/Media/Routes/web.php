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

Route::group(['prefix'=>'media','middleware' => ['permission:media.view']],function(){
    Route::get('/', 'MediaController@index');
    Route::get('/scan', 'MediaController@scan');
});

Route::group(['prefix'=>'media','middleware' => ['permission:media.add']],function(){
    Route::get('/create', 'MediaController@create');
    Route::POST('/store', 'MediaController@store');

});
Route::group(['prefix'=>'media','middleware' => ['permission:media.edit']],function(){
    Route::get('/edit/{id}', 'MediaController@edit');
    Route::POST('/update/{id}', 'MediaController@update');
    Route::get('/status/{id}', 'MediaController@status');
});
Route::group(['prefix'=>'media','middleware' => ['permission:media.delete']],function(){
    Route::get('/destroy/{id}', 'MediaController@destroy');
});