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
    return view('home');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get(
    '/home',
    function () {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }
    }
)->name('home');

//area admin
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.home');
    Route::get('/test', 'AdminController@test')->name('admin.test');
});

//area warung
Route::middleware('auth:warung')->group(function () {
});
