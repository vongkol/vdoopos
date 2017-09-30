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

Route::get('/',"HomeController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// POS Screen
Route::get('/pos', "POSController@index");
// user route
Route::get('/user', "UserController@index");
Route::get('/user/profile', "UserController@load_profile");
Route::get('/user/reset-password', "UserController@reset_password");
Route::post('/user/change-password', "UserController@change_password");
Route::get('/user/finish', "UserController@finish_page");
Route::post('/user/update-profile', "UserController@update_profile");
Route::get('/user/delete/{id}', "UserController@delete");
Route::get('/user/create', "UserController@create");
Route::post('/user/save', "UserController@save");
Route::get('/user/edit/{id}', "UserController@edit");
Route::post('/user/update', "UserController@update");
Route::get('/user/update-password/{id}', "UserController@load_password");
Route::post('/user/save-password', "UserController@update_password");
Route::get('/user/branch/{id}', "UserController@branch");
Route::post('/user/branch/save', "UserController@add_branch");
Route::get('/user/branch/delete/{id}', "UserController@delete_branch");
// role
Route::get('/role', "RoleController@index");
Route::get('/role/create', "RoleController@create");
Route::post('/role/save', "RoleController@save");
Route::get('/role/delete/{id}', "RoleController@delete");
Route::get('/role/edit/{id}', "RoleController@edit");
Route::post('/role/update', "RoleController@update");
Route::get('/role/permission/{id}', "PermissionController@index");
Route::post('/rolepermission/save', "PermissionController@save");
// branch
Route::get('/branch', "BranchController@index");
Route::get('/branch/create', "BranchController@create");
Route::post('/branch/save', "BranchController@save");
Route::get('/branch/delete/{id}', "BranchController@delete");
Route::get('/branch/edit/{id}', "BranchController@edit");
Route::post('/branch/update', "BranchController@update");
// Social
Route::get('/social', "SocialController@index");
Route::get('/social/create', "SocialController@create");
Route::post('/social/save', "SocialController@save");
Route::get('/social/delete/{id}', "SocialController@delete");
Route::get('/social/edit/{id}', "SocialController@edit");
Route::post('/social/update', "SocialController@update");
// Logo
Route::get('/logo', "LogoController@index");
Route::get('/logo/create', "LogoController@create");
Route::post('/logo/save', "LogoController@save");
Route::get('/logo/edit/{id}', "LogoController@edit");
Route::post('/logo/update', "LogoController@update");
// Page
Route::get('/page', "PageController@index");
Route::get('/page/create', "PageController@create");
Route::post('/page/save', "PageController@save");
Route::get('/page/delete/{id}', "PageController@delete");
Route::get('/page/edit/{id}', "PageController@edit");
Route::post('/page/update', "PageController@update");
Route::get('/page/view/{id}', "PageController@view");
// catogory
Route::get('/category', "CategoryController@index");
Route::get('/category/create', "CategoryController@create");
Route::get('/category/edit/{id}', "CategoryController@edit");
Route::get('/category/delete/{id}', "CategoryController@delete");
Route::post('/category/save', "CategoryController@save");
Route::post('/category/update', "CategoryController@update");
// slider
Route::get('/slider', "SliderController@index");
Route::get('/slider/create', "SliderController@create");
Route::get('/slider/edit/{id}', "SliderController@edit");
Route::get('/slider/delete/{id}', "SliderController@delete");
Route::post('/slider/save', "SliderController@save");
Route::post('/slider/update', "SliderController@update");
// unit
Route::get('/unit', "UnitController@index");
Route::get('/unit/create', "UnitController@create");
Route::get('/unit/edit/{id}', "UnitController@edit");
Route::get('/unit/delete/{id}', "UnitController@delete");
Route::post('/unit/save', "UnitController@save");
Route::post('/unit/update', "UnitController@update");
// size
Route::get('/size', "SizeController@index");
Route::get('/size/create', "SizeController@create");
Route::get('/size/edit/{id}', "SizeController@edit");
Route::get('/size/delete/{id}', "SizeController@delete");
Route::post('/size/save', "SizeController@save");
Route::post('/size/update', "SizeController@update");
// branch
Route::get('/branch', "BranchController@index");
Route::get('/branch/create', "BranchController@create");
Route::get('/branch/edit/{id}', "BranchController@edit");
Route::get('/branch/delete/{id}', "BranchController@delete");
Route::post('/branch/save', "BranchController@save");
Route::post('/branch/update', "BranchController@update");
// discount
Route::get('/discount', "DiscountController@index");
Route::get('/discount/create', "DiscountController@create");
Route::get('/discount/edit/{id}', "DiscountController@edit");
Route::get('/discount/delete/{id}', "DiscountController@delete");
Route::post('/discount/save', "DiscountController@save");
Route::post('/discount/update', "DiscountController@update");
// item
Route::get('/item', "ItemController@index");
Route::get('/item/create', "ItemController@create");
Route::get('/item/edit/{id}', "ItemController@edit");
Route::get('/item/delete/{id}', "ItemController@delete");
Route::post('/item/save', "ItemController@save");
Route::post('/item/update', "ItemController@update");
Route::get('/item/view/{id}', "ItemController@view");
// item detail
Route::get('/item/deleteitemdetail/{id}', "ItemController@deleteItemDetail");
Route::get('/item/edititemdetail/{id}', "ItemController@editItemDetail");
Route::post('/item/view/{id}/save', "ItemController@saveItem");
Route::get('/item/getsize', "ItemController@getSize");
// customer
Route::get('/customer', "CustomerController@index");
Route::get('/customer/create', "CustomerController@create");
Route::get('/customer/edit/{id}', "CustomerController@edit");
Route::get('/customer/delete/{id}', "CustomerController@delete");
Route::post('/customer/save', "CustomerController@save");
Route::post('/customer/update', "CustomerController@update");
// table
Route::get('/table', "TableController@index");
Route::get('/table/create', "TableController@create");
Route::get('/table/edit/{id}', "TableController@edit");
Route::get('/table/delete/{id}', "TableController@delete");
Route::post('/table/save', "TableController@save");
Route::post('/table/update', "TableController@update");
// exchange rate
Route::get('/exchangerate', "ExchangeRateController@index");
Route::get('/exchangerate/edit/{id}', "ExchangeRateController@edit");
Route::post('/exchangerate/update', "ExchangeRateController@update");
// test
Route::get('/test', "TestController@index");
