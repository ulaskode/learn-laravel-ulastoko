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
})->name('index');
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

    Route::group(['middleware' => 'auth:admin'],function(){
        // Halaman
        Route::get('dashboard','UserController@index')->name('admin.dashboard');
    
        // Edit Profile & Change Password
        Route::group(['prefix'=>'profile','middleware'=>'AdminProfile'],function(){
            Route::get('/{admin:username}','AdminController@editProfile')->name('admin.profile');
            Route::post('/{admin:username}','AdminController@saveProfile')->name('admin.saveProfile');

            Route::get('/{admin:username}/password','AdminController@editPassword')->name('admin.password');
            Route::post('/{admin:username}/password','AdminController@savePassword')->name('admin.savePassword');

            Route::post('/{admin:username}/photo','AdminController@savePhoto')->name('admin.savePhoto');
        });
    });

    
});