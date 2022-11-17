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


Route::group(['prefix'=>'devices-guide','middleware' => ['permission:devices-guide.view']],function(){
    Route::get('/{id}', 'GuideController@index');
});

Route::group(['prefix'=>'devices-guide','middleware' => ['permission:devices-guide.add']],function(){
    Route::get('{id}/create', 'GuideController@create');
    Route::POST('{id}/store', 'GuideController@store');

});
Route::group(['prefix'=>'devices-guide','middleware' => ['permission:devices-guide.edit']],function(){
    Route::get('/edit/{id}', 'GuideController@edit');
    Route::POST('/update/{id}', 'GuideController@update');
    Route::get('/status/{id}', 'GuideController@status');
});
Route::group(['prefix'=>'devices-guide','middleware' => ['permission:devices-guide.delete']],function(){
    Route::get('/destroy/{id}', 'GuideController@destroy');
});