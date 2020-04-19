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
    Route::get('login','Auth\LoginController@showLoginForm');
    Route::post('login','Auth\LoginController@login')->name('admin.login');

    Route::get('dashboard','UserController@index')->name('admin.dashboard')->middleware('auth:admin');
    Route::get('logout','Auth\LoginController@logout')->name('admin.logout')->middleware('auth:admin');
    
});

Route::get('/home', 'HomeController@index')->name('home');
