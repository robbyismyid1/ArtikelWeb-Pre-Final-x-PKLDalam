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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('/tag', 'TagController');
    Route::resource('/kategori', 'KategoriController');
    Route::resource('/rilis', 'RilisController');
    Route::resource('/negara', 'NegaraController');
    Route::resource('/artikel', 'ArtikelController');
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'FrontController@index')->name('index');
    Route::get('/faq', function () {
        return view('front.faq');
    });
    Route::get('/catalog', 'FrontController@catalog')->name('catalog2');
    Route::get('/about', function () {
        return view('front.about');
    });
    Route::get('/{artikel}', 'FrontController@detailblog')->name('details1');
});