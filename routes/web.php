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

Route::get('/','logingController@login')->name('login');
Route::post('do-login','logingController@dologin')->name('do.login');

Route::get('admin/login','AdminController@login')->name('admin.login');
Route::post('admin/do-login','AdminController@dologin')->name('admin.do.login');
Route::get('admin/user','AdminController@home')->name('admin.user');


Route::group(['middleware'=>'user_auth'],function(){
Route::get('logout','logingController@logout')->name('logout');
Route::get('export','WebRouteContoller@export')->name('export');
Route::get('pdf','WebRouteContoller@pdf')->name('pdf');
Route::get('home','WebRouteContoller@homePage')->name('home');
Route::get('about','WebRouteContoller@about')->name('about');
Route::get('blog', 'WebRouteContoller@blog')->name('blog');
Route::get('view-user/{id}', 'WebRouteContoller@view')->name('view.user');
Route::get('adduserform','WebRouteContoller@adduserform')->name('adduserform');
Route::post('adduser', 'WebRouteContoller@adduser')->name('adduser');
Route::get('edituserform/{id}','WebRouteContoller@edituserform')->name('edituserform');
Route::post('updateuser', 'WebRouteContoller@updateuser')->name('updateuser');
Route::get('deleteuser/{id}', 'WebRouteContoller@deleteuser')->name('deleteuser');
Route::get('restore/{id}', 'WebRouteContoller@restore')->name('restore');
});

// Route::get
