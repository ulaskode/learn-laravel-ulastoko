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

Auth::routes(['verify' => true]);

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

    // Namespace Auth
    Route::group(['namespace'=>'Auth'],function(){
        // Login & Logout
        Route::get('login','LoginController@showLoginForm');
        Route::post('login','LoginController@login')->name('admin.login');
        Route::get('logout','LoginController@logout')->name('admin.logout')->middleware('auth:admin');
    
        // Reset Password
        Route::middleware(['guest:admin'])->group(function (){
            Route::get('password/reset','ResetPasswordController@showLinkRequestForm')->name('admin.password.request');
            Route::post('password/email','ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
            Route::get('password/reset/{token}','ResetPasswordController@showResetForm')->name('admin.password.reset');
            Route::post('password/reset','ResetPasswordController@reset')->name('admin.password.update');
        });
    });

    // Halaman
    Route::get('dashboard','UserController@index')->name('admin.dashboard')->middleware('auth:admin');
    
});

Route::get('/home', 'HomeController@index')->name('home');
