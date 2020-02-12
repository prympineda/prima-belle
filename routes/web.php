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

// Route::get('/', function () {

//     return view('primabelle');
    
 
// });

Route::get('/', 'LandingPageController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'administrator', 'as' => 'admin.', 'middleware' => ['auth']], function() { 
   
    Route::get('dashboard', 'AdminController@index')->name('index');
    Route::get('add-product', 'ProductController@create')->name('add-product');
    Route::post('store-product', 'ProductController@store')->name('store-product');
    Route::get('view-doll-shoes', 'ProductController@viewDollShoes')->name('view-doll-shoes');
    Route::get('view-mules', 'ProductController@viewMules')->name('view-mules');
    Route::get('view-half-inch', 'ProductController@viewHalfInch')->name('view-half-inch');
    Route::get('view-two-inches', 'ProductController@viewTwoInches')->name('view-two-inches');
    Route::get('view-birks', 'ProductController@viewBirks')->name('view-birks');

});