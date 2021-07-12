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


Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['web','auth']], function() {
    Route::get('/', function () {
        return view('blank');
    });
    /**
     * Dashboard Route
     */
    Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function (){
        Route::get('/','DashboardController@index')->name('dashboard.index');
    });

});

/**
 * Authentication and grant permission
 */
Route::group(['namespace' => 'App\Http\Controllers\Auth','prefix'=>'auth','middleware' => ['web']], function() {
    Route::get('/login','AuthenticationController@login')->name('auth.login');
    Route::post('/login','AuthenticationController@authenticate')->name('auth.authenticate');
    Route::get('/logout','AuthenticationController@logout')->name('auth.logout');
});

/**
 * Debug
 */
Route::group(['namespace' => 'App\Http\Controllers\Auth','prefix'=>'debug','middleware' => ['web']], function() {
    Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});