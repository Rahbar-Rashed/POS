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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'auth'], function(){
	Route::prefix('users')->group(function(){
	Route::get('/view', 'Backend\UserController@view')->name('users.view');
	Route::get('/add', 'Backend\UserController@add')->name('users.add');
	Route::post('/store', 'Backend\UserController@store')->name('users.store');
	Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
	Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
	Route::get('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');
});

Route::prefix('profile')->group(function(){
	Route::get('/view', 'Backend\ProfileController@view')->name('profile.view');
	Route::get('/edit/{id}', 'Backend\ProfileController@edit')->name('profile.edit');
	Route::post('/update/{id}', 'Backend\ProfileController@update')->name('profile.update');
	Route::get('/password/view', 'Backend\ProfileController@password_view')->name('password.view');
	Route::post('/password/update', 'Backend\ProfileController@password_update')->name('password.update');

});

Route::prefix('suppliers')->group(function(){
	Route::get('/view', 'Backend\SupplierController@view')->name('suppliers.view');
	Route::get('/add', 'Backend\SupplierController@add')->name('suppliers.add');
	Route::post('/store', 'Backend\SupplierController@store')->name('suppliers.store');
	Route::get('/edit/{id}', 'Backend\SupplierController@edit')->name('suppliers.edit');
	Route::post('/update/{id}', 'Backend\SupplierController@update')->name('suppliers.update');
	Route::get('/delete/{id}', 'Backend\SupplierController@delete')->name('suppliers.delete');
});

Route::prefix('customer')->group(function(){
	Route::get('/view', 'Backend\CustomerController@view')->name('customer.view');
	Route::get('/add', 'Backend\CustomerController@add')->name('customer.add');
	Route::post('/store', 'Backend\CustomerController@store')->name('customer.store');
	Route::get('/edit/{id}', 'Backend\CustomerController@edit')->name('customer.edit');
	Route::post('/update/{id}', 'Backend\CustomerController@update')->name('customer.update');
	Route::get('/delete/{id}', 'Backend\CustomerController@delete')->name('customer.delete');
});

Route::prefix('units')->group(function(){
	Route::get('/view', 'Backend\UnitController@view')->name('units.view');
	Route::get('/add', 'Backend\UnitController@add')->name('units.add');
	Route::post('/store', 'Backend\UnitController@store')->name('units.store');
	Route::get('/edit/{id}', 'Backend\UnitController@edit')->name('units.edit');
	Route::post('/update/{id}', 'Backend\UnitController@update')->name('units.update');
	Route::get('/delete/{id}', 'Backend\UnitController@delete')->name('units.delete');
});

Route::prefix('category')->group(function(){
	Route::get('/view', 'Backend\CategoryController@view')->name('category.view');
	Route::get('/add', 'Backend\CategoryController@add')->name('category.add');
	Route::post('/store', 'Backend\CategoryController@store')->name('category.store');
	Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('category.edit');
	Route::post('/update/{id}', 'Backend\CategoryController@update')->name('category.update');
	Route::get('/delete/{id}', 'Backend\CategoryController@delete')->name('category.delete');
});

Route::prefix('product')->group(function(){
	Route::get('/view', 'Backend\ProductController@view')->name('product.view');
	Route::get('/add', 'Backend\ProductController@add')->name('product.add');
	Route::post('/store', 'Backend\ProductController@store')->name('product.store');
	Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('product.edit');
	Route::post('/update/{id}', 'Backend\ProductController@update')->name('product.update');
	Route::get('/delete/{id}', 'Backend\ProductController@delete')->name('product.delete');
});

Route::prefix('purchase')->group(function(){
	Route::get('/view', 'Backend\PurchaseController@view')->name('purchase.view');
	Route::get('/add', 'Backend\PurchaseController@add')->name('purchase.add');
	Route::post('/store', 'Backend\PurchaseController@store')->name('purchase.store');
	Route::get('/pending', 'Backend\PurchaseController@pending')->name('purchase.pending');
	Route::get('/approve/{id}', 'Backend\PurchaseController@approve')->name('purchase.approve');
	Route::get('/delete/{id}', 'Backend\PurchaseController@delete')->name('purchase.delete');
});

Route::get('/get-category','Backend\DefaultController@get_category')->name('get-category');
Route::get('/get-product','Backend\DefaultController@get_product')->name('get-product');
Route::get('/check/product/stock','Backend\DefaultController@get_current_stock')->name('check-product-stock');

Route::prefix('invoice')->group(function(){
	Route::get('/view', 'Backend\InvoiceController@view')->name('invoice.view');
	Route::get('/add', 'Backend\InvoiceController@add')->name('invoice.add');
	Route::post('/store', 'Backend\InvoiceController@store')->name('invoice.store');
	Route::get('/pending', 'Backend\InvoiceController@pending')->name('invoice.pending');
	Route::get('/approve/{id}', 'Backend\InvoiceController@approve')->name('invoice.approve');
	Route::get('/delete/{id}', 'Backend\InvoiceController@delete')->name('invoice.delete');
	Route::get('/view/approve/pending/{id}', 'Backend\InvoiceController@view_approve_pending')->name('view.approve.pending');
	Route::post('/approval/store/{id}', 'Backend\InvoiceController@approval_store')->name('approval.store');
});

Route::get('/test', function(){
	app()->make('my_service');
});

});

/*


 */
