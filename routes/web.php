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
// Slide 
Route::get('/slide', "SlideController@index");
Route::get('/slide/create', "SlideController@create");
Route::post('/slide/save', "SlideController@save");
Route::get('/slide/edit/{id}', "SlideController@edit");
Route::post('/slide/update', "SlideController@update");
Route::get('/slide/delete/{id}', "SlideController@delete");
// video training 
Route::get('/video-training', "VideoTrainingController@index");
Route::get('/video-training/create', "VideoTrainingController@create");
Route::post('/video-training/save', "VideoTrainingController@save");
Route::get('/video-training/delete/{id}', "VideoTrainingController@delete");
Route::get('/video-training/edit/{id}', "VideoTrainingController@edit");
Route::post('/video-training/update', "VideoTrainingController@update");
Route::get('/home', 'HomeController@index')->name('home');
// detail page
Route::get('/detail/{id}', 'FrontController@detail');
Route::get('/about-kampongcham/detail/{id}', 'FrontController@about_kampongcham_detail');
Route::get('/page-by-category/{id}', 'FrontController@page_by_category');
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
Route::get('/category', "CategoryController@index");
Route::get('/category/create', "CategoryController@create");
Route::get('/category/edit/{id}', "CategoryController@edit");
Route::get('/category/delete/{id}', "CategoryController@delete");
Route::post('/category/save', "CategoryController@save");
Route::post('/category/update', "CategoryController@update");

// Shop owner
Route::get('/shop-owner', "ManageShopOwnerController@index");
Route::get('/shop-owner/create', "ManageShopOwnerController@create");
Route::get('/shop-owner/edit/{id}', "ManageShopOwnerController@edit");
Route::get('/shop-owner/delete/{id}', "ManageShopOwnerController@delete");
Route::post('/shop-owner/save', "ManageShopOwnerController@save");
Route::post('/shop-owner/update', "ManageShopOwnerController@update");
//Front Shop
Route::get('/shop-owner/shop', "FrontShopController@index");
Route::get('/shop-owner/shop/create', "FrontShopController@create");
Route::post('/shop-owner/shop/save', "FrontShopController@save");
Route::get('/shop-owner/shop/edit/{id}', "FrontShopController@edit");
Route::post('/shop-owner/shop/update', "FrontShopController@update");
//Front Product
Route::get('/shop-owner/product', "FrontProductController@index");
Route::get('/shop-owner/product/create', "FrontProductController@create");
Route::post('/shop-owner/product/save', "FrontProductController@save");
Route::get('/shop-owner/product/delete/{id}', "FrontProductController@delete");
Route::get('/shop-owner/product/edit/{id}', "FrontProductController@edit");
Route::post('/shop-owner/product/update', "FrontProductController@update");
Route::get('/shop-owner/product/detail/{id}', "FrontProductController@view");
Route::get('/shop-owner/product/img/edit/{id}', "FrontProductController@edit_img");
Route::post('/shop-owner/product/img/update', "FrontProductController@update_img");
Route::get('/shop-owner/product/img/delete/{id}/{product_id}', "FrontProductController@delete_img");
Route::post('/shop-owner/product_img/{product_id}/save', "FrontProductController@saveProductImage");
Route::post('/shop-owner/unsubscribe', "FrontSubscriptonController@unsubscribe");
Route::post('/shop-owner/subscribe', "FrontSubscriptonController@subscribe");
Route::get('/shop-owner/subscription', "FrontSubscriptonController@subscription");
// Page
Route::get('/page', "PageController@index");
Route::get('/page/create', "PageController@create");
Route::post('/page/save', "PageController@save");
Route::get('/page/delete/{id}', "PageController@delete");
Route::get('/page/edit/{id}', "PageController@edit");
Route::post('/page/update', "PageController@update");
Route::get('/page/view/{id}', "PageController@view");
// Page
Route::get('/about-kampongcham', "AboutKampongchamController@index");
Route::get('/about-kampongcham/create', "AboutKampongchamController@create");
Route::post('/about-kampongcham/save', "AboutKampongchamController@save");
Route::get('/about-kampongcham/delete/{id}', "AboutKampongchamController@delete");
Route::get('/about-kampongcham/edit/{id}', "AboutKampongchamController@edit");
Route::post('/about-kampongcham/update', "AboutKampongchamController@update");
Route::get('/about-kampongcham/view/{id}', "AboutKampongchamController@view");
// Post
Route::get('/post', "PostController@index");
Route::get('/post/create', "PostController@create");
Route::post('/post/save', "PostController@save");
Route::get('/post/delete/{id}', "PostController@delete");
Route::get('/post/edit/{id}', "PostController@edit");
Route::post('/post/update', "PostController@update");
Route::get('/post/view/{id}', "PostController@view");
// front page
Route::get('/page/about', "FrontPageController@about");
Route::get('/page/contact', "FrontPageController@contact");
Route::get('/page/message-from-the-governor', "FrontPageController@message");
// test
Route::get('/test', "TestController@index");
// product admin
Route::get('/admin/product', "ProductController@index");
Route::get('/admin/product/create', "ProductController@create");
Route::get('/admin/product/edit/{id}', "ProductController@edit");
Route::get('/admin/product/delete/{id}', "ProductController@delete");
Route::post('/admin/product/save', "ProductController@save");
Route::post('/admin/product/update', "ProductController@update");
Route::get('/admin/product/detail/{id}', "ProductController@pro_detail");
Route::get('/admin/product/photo/delete/{id}', "ProductController@delete_photo");
Route::post('/admin/product/photo/upload', "ProductController@upload_photo");
// featured product admin
Route::get('/admin/feature/product', "FeaturedProductController@index");
Route::get('/admin/feature/product/delete/{id}', "FeaturedProductController@delete");

// Post
Route::get('/post', 'PostController@index');
Route::get('/post/create', 'PostController@create');
Route::post('/post/save', 'PostController@save');
Route::get('/post/edit/{id}', 'PostController@edit');
Route::post('/post/update', 'PostController@update');
Route::post('/post/delete', 'PostController@delete');