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
    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('index');

})->name('landing_page');

Route::get('/', 'LandingPageController@index')->name('index');

Auth::routes();

Route::group(['prefix' => 'administrator', 'as' => 'admin.', 'middleware' => ['auth', 'preventBackHistory']], function() { 
   
    //DASHBOARD
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
    Route::get('activity-logs', 'AdminController@getActivityLogs')->name('activity-logs');
    Route::get('change-password', 'AdminController@changePassword')->name('change-password');
    Route::post('save-change-password', 'AdminController@saveChangePassword')->name('save-change-password');

    //PRODUCT CRUD
    Route::get('add-product', 'ProductController@create')->name('add-product');
    Route::post('store-product', 'ProductController@store')->name('store-product');
    Route::get('edit-product/{uid}', 'ProductController@edit')->name('edit-product');
    Route::post('update-product/{uid}', 'ProductController@update')->name('update-product');

    //PRODUCT VIEW
    Route::get('view-doll-shoes', 'ProductController@viewDollShoes')->name('view-doll-shoes');
    Route::get('view-mules', 'ProductController@viewMules')->name('view-mules');
    Route::get('view-half-inch', 'ProductController@viewHalfInch')->name('view-half-inch');
    Route::get('view-two-inches', 'ProductController@viewTwoInches')->name('view-two-inches');
    Route::get('view-birks', 'ProductController@viewBirks')->name('view-birks');

    //ORDERS
    Route::get('reserved-orders', 'OrdersController@reservedOrders')->name('reserved-orders');
    Route::get('sold-orders', 'OrdersController@soldOrders')->name('sold-orders');

    //PLACE ORDER
    Route::get('place-orders/{uid}', 'OrdersController@placeOrders')->name('place-orders');
    Route::post('update-place-orders', 'OrdersController@updatePlaceOrders')->name('update-place-orders');
    Route::post('checkout-orders/{uid}', 'OrdersController@checkoutOrders')->name('checkout-orders');
    Route::get('sold-items/{uid}', 'OrdersController@soldItems')->name('sold-items');
    Route::get('unsold-items/{uid}', 'OrdersController@unsoldItems')->name('unsold-items');
    Route::get('cancel-orders/{uid}', 'OrdersController@cancelReservedOrders')->name('cancel-orders');

});