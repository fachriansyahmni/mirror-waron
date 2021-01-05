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
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::get('/manage', 'AdminController@manage')->name('admin.manage');
    Route::get('/mancat', 'AdminController@mancat')->name('admin.mancat');
});

//area warung
Route::middleware('auth:warung')->group(function () {
});
