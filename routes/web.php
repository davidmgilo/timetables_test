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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile/tokens', function () {
        return view('tokens');
    });
    #adminlte_routes

//    Route::resource('attendances', 'AttendancesController');
});

Route::get('pdf/user/{id}', 'PdfController@user');
Route::get('pdf/users', 'PdfController@users');

Route::get('auth/{github}', 'Auth\MySocialAuthController@redirectToProvider');
Route::get('auth/{github}/callback', 'Auth\MySocialAuthController@handleProviderCallback');

Route::get('auth/{facebook}', 'Auth\MySocialAuthController@redirectToProvider');
Route::get('auth/{facebook}/callback', 'Auth\MySocialAuthController@handleProviderCallback');

Route::get('auth/{google}', 'Auth\MySocialAuthController@redirectToProvider');
Route::get('auth/{google}/callback', 'Auth\MySocialAuthController@handleProviderCallback');

Route::get('auth/{twitter}', 'Auth\MySocialAuthController@redirectToProvider');
Route::get('auth/{twitter}/callback', 'Auth\MySocialAuthController@handleProviderCallback');
