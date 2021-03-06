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
// back-end route
Route::get('/post/{id}', 'FrontController@post');
Route::get('/page/{id}', 'FrontController@page');
Route::get('/category/{id}', 'FrontController@category');
Route::get('/service', 'FrontPageController@service');
Route::get('/service/price/{id}', 'FrontPageController@service_price');
Route::get('/resdoc', 'FrontPageController@resource_document');
Route::get('/tsinv', 'FrontPageController@turist_investment');
Route::get('/announcement', 'FrontPageController@announcement');
Route::get('/contact', 'FrontPageController@contact');

Route::get('/admin',"HomeController@index");
Route::get('/admin/dashboard',"HomeController@index");
Route::get('/',"FrontController@index");

Auth::routes();
// Logo
Route::get('/logo', "LogoController@index");
Route::get('/logo/create', "LogoController@create");
Route::post('/logo/save', "LogoController@save");
Route::get('/logo/edit/{id}', "LogoController@edit");
Route::post('/logo/update', "LogoController@update");
// governor history
Route::get('/governor-history', "GovernorHistoryController@index");
Route::get('/governor-history/create', "GovernorHistoryController@create");
Route::post('/governor-history/save', "GovernorHistoryController@save");
Route::get('/governor-history/edit/{id}', "GovernorHistoryController@edit");
Route::post('/governor-history/update', "GovernorHistoryController@update");
Route::get('/governor-history/delete/{id}', "GovernorHistoryController@delete");
// Slide 
Route::get('/slide', "SlideController@index");
Route::get('/slide/create', "SlideController@create");
Route::post('/slide/save', "SlideController@save");
Route::get('/slide/edit/{id}', "SlideController@edit");
Route::post('/slide/update', "SlideController@update");
Route::get('/slide/delete/{id}', "SlideController@delete");

Route::get('/home', 'HomeController@index')->name('home');

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

// catogory
Route::get('/admin/category', "CategoryController@index");
Route::get('/admin/category/create', "CategoryController@create");
Route::get('/admin/category/edit/{id}', "CategoryController@edit");
Route::get('/admin/category/delete/{id}', "CategoryController@delete");
Route::post('/admin/category/save', "CategoryController@save");
Route::post('/admin/category/update', "CategoryController@update");
// Admin Contact
Route::get('/admin/contact', "AdminContactController@index");
Route::get('/admin/contact/create', "AdminContactController@create");
Route::get('/admin/contact/edit/{id}', "AdminContactController@edit");
Route::get('/admin/contact/delete/{id}', "AdminContactController@delete");
Route::post('/admin/contact/save', "AdminContactController@save");
Route::post('/admin/contact/update', "AdminContactController@update");
// Admin Contact
Route::get('/contact/type', "ContactTypeController@index");
Route::get('/contact/type/create', "ContactTypeController@create");
Route::get('/contact/type/edit/{id}', "ContactTypeController@edit");
Route::get('/contact/type/delete/{id}', "ContactTypeController@delete");
Route::post('/contact/type/save', "ContactTypeController@save");
Route::post('/contact/type/update', "ContactTypeController@update");
// Post
Route::get('/post', "PostController@index");
Route::get('/post/create', "PostController@create");
Route::get('/post/create/new', "PostController@create");
Route::post('/post/save', "PostController@save");
Route::get('/post/delete/{id}', "PostController@delete");
Route::get('/post/edit/{id}', "PostController@edit");
Route::post('/post/update', "PostController@update");
Route::get('/post/view/{id}', "PostController@view");
// front page
Route::get('/page/about', "FrontPageController@about");
Route::get('/page/contact', "FrontPageController@contact");
// test
Route::get('/test', "TestController@index");

// Menu
Route::get('/admin/menu', 'MenuController@index');
Route::get('/admin/menu/create', 'MenuController@create');
Route::post('/admin/menu/store', "MenuController@store");
// file manager
Route::get('/admin/filemanager', "FileManagerController@index");

// API
Route::get('/api/get_service', 'FrontPageController@getService');
Route::get('/api/get_service_price/{id}', 'FrontPageController@getServicePrice');

// Route for mobile view.
Route::get('/mobile/post/{id}', 'MobileController@detail');