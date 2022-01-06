<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Frotend Home Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/










/*
|--------------------------------------------------------------------------
| Backend Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group([ 'prefix' => 'admin'], function(){

    Route::get('/', 'App\Http\Controllers\Backend\PageController@dashboard')->name('admin.dashboard');

    Route::group([ 'prefix' => '/brands'], function(){
        Route::get('/manage', 'App\Http\Controllers\Backend\BrandController@index')->name('brands.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\BrandController@create')->name('brands.create');
        Route::post('/store', 'App\Http\Controllers\Backend\BrandController@store')->name('brands.store');


    });

});
