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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes([
    'register' => false, 
    'reset' => false, 
    'verify' => false,
  ]);
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){
    
    Route::resource('company', 'CompanyController', [
        'names' => [
            'index' => 'company',
            'add' => 'company.create',
            'store' => 'company.store',
            'edit' => 'company.edit',
        ]
    ]);
    Route::post('company/{id}', [
        'as' => 'company.update',
        'uses' => 'CompanyController@update'
    ]);
    Route::resource('shop', 'ShopController', [
        'names' => [
            'index' => 'shop',
            'add' => 'shop.create',
            'store' => 'shop.store',
            'edit' => 'shop.edit',
        ]
    ]);
    Route::post('shop/{id}', [
        'as' => 'shop.update',
        'uses' => 'ShopController@update'
    ]);
    Route::resource('customer', 'CustomerController', [
        'names' => [
            'index' => 'customer',
            'add' => 'customer.create',
            'store' => 'customer.store',
            'edit' => 'customer.edit',
        ]
    ]);
    Route::post('customer/{id}', [
        'as' => 'customer.update',
        'uses' => 'CustomerController@update'
    ]);

 
});
