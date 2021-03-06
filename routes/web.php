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
    return view('frontend.welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin','middleware'=>['checkadmin']],function(){
    Route::get('/dashboard','DashboardController@index');
    Route::resource('/news','NewsController');
    Route::resource('/blogs','BlogsController');
//    Route::resource('/banners','BannersController');
    Route::resource('/images', 'ImagesController');
});

Route::group(['prefix'=>'frontend'],function(){
    Route::get('/gallery','FrontendController@getGallery');
});