<?php

use Illuminate\Support\Facades\Route;

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


/* Route::resource('/productsCustomers','CustomerCartController'); */


Auth::routes(
    ['register' => false]
);

// Customer Cart Form 
Route::get('/','CustomerController@home')->name('home.home');
Route::get('order/products','CustomerController@products')->name('order.products');
Route::get('order/products/page','CustomerController@productsAJAX');
Route::post('/order/products/payment','CustomerController@payments')->name('order.payments');
Route::post('/order/products/payment/checkout','CustomerController@checkout')->name('order.checkout');


// Category
Route::get('order/category/{id}','CustomerCategoryController@category')->name('order.category');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductsController');

    Route::resource('units','UnitsController');

Route::resource('pending_order','PendingOrderController');

Route::resource('pending_order_edit','PendingEditOrderController');

Route::get('confirmed_order','ConfirmedOrderController@index')->name('confirmed_order.index');
Route::put('confirmed_order/{id}','ConfirmedOrderController@update')->name('confirmed_order.update');

Route::resource('pending_payments','PendingPaymentsController');
Route::resource('confirmed_payments','ConfirmedPaymentsController');
Route::resource('/orders','CartController');




Route::resource('delivery','DeliveryController');
Route::put('delivery/{id}','DeliveryDateController@update')->name('deliveryDate.update');

Route::resource('categories','CategoryController');
Route::resource('stocks','StocksController');
Route::resource('sale','SaleController');

});

Route::get('/pdf/{id}','InvoiceController@pdf')->name('invoice.pdf');










