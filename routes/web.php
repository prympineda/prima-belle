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
    return view('primabelle');
   // return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'administrator', 'as' => 'admin.', 'middleware' => ['auth']], function() { 
    Route::get('dashboard', 'AdminController@index')->name('index');
    Route::get('add-product', 'ProductController@create')->name('add-product');
    Route::post('store-product', 'ProductController@store')->name('store-product');

});