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
    Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboards'], function (){
        Route::get('/','DashboardController@index')->name('dashboard.index');
    });

    /**
     * User Route: all, add, edit
     */
    Route::group(['namespace' => 'User','prefix' => 'users'], function (){
        Route::get('/','UserController@index')->name('user.index');
        Route::get('/add','UserController@addView')->name('user.addView');
        Route::post('/','UserController@add')->name('user.add');
        Route::get('/edit/{id}','UserController@editView')->name('user.editView');
        Route::put('/{id}','UserController@edit')->name('user.edit');
    });

});

/**
 * Authentication and grant permission
 */
Route::group(['namespace' => 'App\Http\Controllers\Auth','prefix'=>'auths','middleware' => ['web']], function() {
    Route::get('/login','AuthenticationController@login')->name('auth.login');
    Route::post('/login','AuthenticationController@authenticate')->name('auth.authenticate');
    Route::get('/logout','AuthenticationController@logout')->name('auth.logout');
});

/**
 * Debug
 */
Route::group(['namespace' => 'App\Http\Controllers\Auth','prefix'=>'debugs','middleware' => ['web']], function() {
    Route::get('/log', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});