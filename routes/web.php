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

Route::group( ['prefix'=>'supplier', 'middleware'=>['auth','admin']],  function(){

    Route::get('/list', 'Admin\SupplierController@SupplierList')->name('supplier-list');
    Route::get('/add', 'Admin\SupplierController@SupplierAdd')->name('supplier-add');
    Route::post('/store', 'Admin\SupplierController@SupplierStore')->name('supplier-store');
    Route::get('/delete/{id}', 'Admin\SupplierController@SupplierDelete')->name('supplier-delete');
    Route::get('/edit/{id}', 'Admin\SupplierController@SupplierEdit')->name('supplier-edit');
    Route::post('/update/{id}', 'Admin\SupplierController@SupplierUpdate')->name('supplier-update');

});

Route::group( ['prefix'=>'customer', 'middleware'=>['auth','admin']],  function(){

    Route::get('/list', 'Admin\CustomerController@CustomerList')->name('customer-list');
    Route::get('/add', 'Admin\CustomerController@CustomerAdd')->name('customer-add');
    Route::post('/store', 'Admin\CustomerController@CustomerStore')->name('customer-store');
    Route::get('/delete/{id}', 'Admin\CustomerController@CustomerDelete')->name('customer-delete');
    Route::get('/edit/{id}', 'Admin\CustomerController@CustomerEdit')->name('customer-edit');
    Route::post('/update/{id}', 'Admin\CustomerController@CustomerUpdate')->name('customer-update');

});

Route::group( ['prefix'=>'unit', 'middleware'=>['auth','admin']],  function(){

    Route::get('/list', 'Admin\UnitController@UnitList')->name('unit-list');
    Route::get('/add', 'Admin\UnitController@UnitAdd')->name('unit-add');
    Route::post('/store', 'Admin\UnitController@UnitStore')->name('unit-store');
    Route::get('/delete/{id}', 'Admin\UnitController@UnitDelete')->name('unit-delete');
    Route::get('/edit/{id}', 'Admin\UnitController@UnitEdit')->name('unit-edit');
    Route::post('/update/{id}', 'Admin\UnitController@UnitUpdate')->name('unit-update');

});

Route::group( ['prefix'=>'category', 'middleware'=>['auth','admin']],  function(){

    Route::get('/list', 'Admin\CategoryController@CategoryList')->name('category-list');
    Route::get('/add', 'Admin\CategoryController@CategoryAdd')->name('category-add');
    Route::post('/store', 'Admin\CategoryController@CategoryStore')->name('category-store');
    Route::get('/delete/{id}', 'Admin\CategoryController@CategoryDelete')->name('category-delete');
    Route::get('/edit/{id}', 'Admin\CategoryController@CategoryEdit')->name('category-edit');
    Route::post('/update/{id}', 'Admin\CategoryController@CategoryUpdate')->name('category-update');

});

