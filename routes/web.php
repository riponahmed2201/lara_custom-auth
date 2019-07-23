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

Route::get('/admin_register','Admin\RegistationController@index')->name('register');
Route::post('/admin_register/store','Admin\RegistationController@store')->name('register.store');
Route::get('/confirm_email/{id}','Admin\RegistationController@confirm_email')->name('confirm_email');
Route::get('/admin_login','Admin\LoginController@index')->name('admin_login');
Route::get('/admin_login/check','Admin\LoginController@check')->name('admin_login.check');
Route::get('/dashboard','Admin\DashboardController@dashboard')->name('dashboard')->middleware('admin');
Route::get('/forgot_password','Admin\LoginController@forgot')->name('forgot');
Route::post('/forgot_password/check','Admin\LoginController@forgot_check')->name('forgot_check');
Route::get('/forgot_password/update/{id}','Admin\LoginController@forgot_update')->name('forgot_update');
Route::post('/forgot/update/{id}','Admin\LoginController@forgot_new')->name('forgot_new');
Route::get('/logout','Admin\LoginController@logout')->name('logout');