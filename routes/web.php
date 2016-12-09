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

Auth::routes();

Route::get('/', 'Website\HomeController@index');
Route::get('/theme/{slug}', 'Website\ThemeController@show');
Route::get('/service/{slug}', 'Website\ServiceController@show');
Route::get('/shop', 'Website\ProductController@index');
Route::get('/product/{slug}', 'Website\ProductController@show');
Route::post('/party/store', 'Website\PartyController@store');
Route::post('/cart/store', 'Website\CartController@store');
Route::post('/cart/update', 'Website\CartController@update');
Route::post('/cart/destroy', 'Website\CartController@destroy');
Route::get('/checkout', 'Website\CartController@index');
Route::get('/admin', 'Admin\HomeController@index');
Route::get('/{slug}', 'Website\PageController@show');

Route::group(['prefix' => '/admin/'], function () {

    Route::get('/theme/create', 'Admin\ThemeController@create');
    Route::get('/product/create', 'Admin\ProductController@create');
    Route::get('/offer/create', 'Admin\OfferController@create');
    Route::get('/service/create', 'Admin\ServiceController@create');
    Route::get('/page/create', 'Admin\PageController@create');
    Route::get('/package/create', 'Admin\PackageController@create');

    Route::post('/theme/store', 'Admin\ThemeController@store');
    Route::post('/product/store', 'Admin\ProductController@store');
    Route::post('/offer/store', 'Admin\OfferController@store');
    Route::post('/service/store', 'Admin\ServiceController@store');
    Route::post('/page/store', 'Admin\PageController@store');
    Route::post('/package/store', 'Admin\PackageController@store');

    Route::post('/theme/update', 'Admin\ThemeController@update');
    Route::post('/product/update', 'Admin\ProductController@update');
    Route::post('/offer/update', 'Admin\OfferController@update');
    Route::post('/service/update', 'Admin\ServiceController@update');
    Route::post('/page/update', 'Admin\PageController@update');
    Route::post('/configuration/update', 'Admin\ConfigurationController@update');
    Route::post('/package/update', 'Admin\PackageController@update');

    Route::post('/theme/destroy', 'Admin\ThemeController@destroy');
    Route::post('/product/destroy', 'Admin\ProductController@destroy');
    Route::post('/offer/destroy', 'Admin\OfferController@destroy');
    Route::post('/service/destroy', 'Admin\ServiceController@destroy');
    Route::post('/page/destroy', 'Admin\PageController@destroy');
    Route::post('/package/destroy', 'Admin\PackageController@destroy');

});

Route::group(['prefix' => '/api/v1/disk/'], function () {

    Route::group(['middleware' => ['auth', 'auth.basic']], function () {

        // Routes for disk browser
        Route::post('directories', 'DiskBrowser\DirectoryController@index');
        Route::post('directory/store', 'DiskBrowser\DirectoryController@store');
        Route::post('directory/destroy', 'DiskBrowser\DirectoryController@destroy');
        Route::post('files', 'DiskBrowser\FileController@index');
        Route::post('file/store', 'DiskBrowser\FileController@store');
        Route::post('search', 'DiskBrowser\DiskController@search');

   });
});