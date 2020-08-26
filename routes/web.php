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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// front route
Route::get('/home', 'Front\HomeController@index')->name('home');

// Admin route
Route::get('admin/home', 'Admin\HomeController@index')->name('admin-home');

Route::group( ['prefix'=>'admin', 'middleware'=>['auth','admin']],  function(){

    Route::get('/user/list', 'Admin\UserController@UserList')->name('user-list');
    Route::get('/user/add', 'Admin\UserController@UserAdd')->name('user-add');
    Route::post('/user/store', 'Admin\UserController@UserStore')->name('user-store');
    Route::get('/user/delete/{id}', 'Admin\UserController@UserDelete')->name('user-delete');
    Route::get('/user/edit/{id}', 'Admin\UserController@UserEdit')->name('user-edit');
    Route::post('/user/update/', 'Admin\UserController@UserUpdate')->name('user-update');

});

Route::group( ['prefix'=>'admin', 'middleware'=>['auth','admin']],  function(){

    Route::get('/supplier/list', 'Admin\SupplierController@SupplierList')->name('supplier-list');
    Route::get('/supplier/add', 'Admin\SupplierController@SupplierAdd')->name('supplier-add');
    Route::post('/supplier/store', 'Admin\SupplierController@SupplierStore')->name('supplier-store');
    Route::get('/supplier/delete/{id}', 'Admin\SupplierController@SupplierDelete')->name('supplier-delete');
    Route::get('/supplier/edit/{id}', 'Admin\SupplierController@SupplierEdit')->name('supplier-edit');
    Route::post('/supplier/update/', 'Admin\SupplierController@SupplierUpdate')->name('supplier-update');

});

