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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin route goes here

Route::match(['get', 'post'], '/', 'AdminController@login')->name('login');
Route::match(['get', 'post'], 'register', 'AdminController@register')->name(
    'register'
);
Route::match(
    ['get', 'post'],
    'store-register-user',
    'AdminController@store_register_user'
)->name('store_register_user');
Route::match(
    ['get', 'post'],
    'authenticate-uesr',
    'AdminController@authenticate'
)->name('authenticate');
Route::match(['get', 'post'], 'admin-logout', 'AdminController@logout')->name(
    'admin-logout'
);

// product route goes here
Route::group(['middleware' => 'Authorized'], function () {
    Route::match(['get', 'post'], 'user-dashboard', 'AdminController@dashboard')
        ->name('user-dashboard')
        ->middleware('admin');
    Route::match(['get', 'post'], 'store-product', 'ProductController@store')
        ->name('store-product')
        ->middleware('admin');
    Route::match(['get', 'post'], 'product-status', 'ProductController@status')
        ->name('product-status')
        ->middleware('admin');
    Route::match(['get', 'post'], 'product-del', 'ProductController@delete')
        ->name('product-del')
        ->middleware('admin');
    Route::match(
        ['get', 'post'],
        'get-product-details',
        'ProductController@get_details'
    )
        ->name('get-product-details')
        ->middleware('admin');
    Route::match(
        ['get', 'post'],
        'update-product-details',
        'ProductController@update_details'
    )
        ->name('update-product-details')
        ->middleware('admin');
    // product routes ends here

    // customer route goes here

    Route::match(
        ['get', 'post'],
        'customer-dashboard',
        'CustomerController@dashboard'
    )
        ->name('customer-dashboard')
        ->middleware('customer');
});

// admin route ends here
