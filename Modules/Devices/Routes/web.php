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

Route::group(['prefix'=>'devices','middleware' => ['permission:devices.view']],function(){
    Route::get('/', 'DevicesController@index');
});

Route::group(['prefix'=>'devices','middleware' => ['permission:devices.add']],function(){
    Route::get('/create', 'DevicesController@create');
    Route::POST('/store', 'DevicesController@store');

});
Route::group(['prefix'=>'devices','middleware' => ['permission:devices.edit']],function(){
    Route::get('/edit/{id}', 'DevicesController@edit');
    Route::POST('/update/{id}', 'DevicesController@update');
    Route::get('/status/{id}', 'DevicesController@status');
});
Route::group(['prefix'=>'devices','middleware' => ['permission:devices.delete']],function(){
    Route::get('/destroy/{id}', 'DevicesController@destroy');
});