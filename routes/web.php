<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'Website\HomeController@index');

Route::get('/admin', 'Admin\HomeController@index');
Route::group(['prefix' => '/admin/'], function () {

    Route::get('/theme/create', 'Admin\ThemeController@create');
    Route::get('/product/create', 'Admin\ProductController@create');
    Route::get('/offer/create', 'Admin\OfferController@create');
    Route::get('/service/create', 'Admin\ServiceController@create');

    Route::post('/theme/store', 'Admin\ThemeController@store');
    Route::post('/product/store', 'Admin\ProductController@store');
    Route::post('/offer/store', 'Admin\OfferController@store');
    Route::post('/service/store', 'Admin\ServiceController@store');

    Route::post('/theme/update', 'Admin\ThemeController@update');
    Route::post('/product/update', 'Admin\ProductController@update');
    Route::post('/offer/update', 'Admin\OfferController@update');
    Route::post('/service/update', 'Admin\ServiceController@update');

});

Route::group(['prefix' => '/api/v1/disk/'], function () {

    Route::group(['middleware' => ['auth', 'auth.basic']], function () {

        // Routes for disk browser
        Route::post('directories', 'Disk\DirectoryController@index');
        Route::post('directory/store', 'Disk\DirectoryController@store');
        Route::post('directory/destroy', 'Disk\DirectoryController@destroy');
        Route::post('files', 'Disk\FileController@index');
        Route::post('file/store', 'Disk\FileController@store');
        Route::post('search', 'Disk\DiskController@search');

   });
});