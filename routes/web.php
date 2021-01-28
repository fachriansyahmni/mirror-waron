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

Route::any('/cari', function () {
    return view('search');
})->name('cari');
Route::any('/about', function () {
    return view('about');
})->name('about');

Route::any('/namawarung', function () {
    return view('overview');
})->name('overview.warung');

//crud barang
Route::get('/barang/create', 'BarangController@create'); //menampilkan form
Route::post('/barang', 'BarangController@store'); //menyimpan form
Route::get('/barang', 'BarangController@index'); //menampilkan item
Route::get('/barang/{id}/edit', 'BarangController@edit'); //menampilkan form edit
Route::get('/barang/{id}/show', 'BarangController@show'); //lihat detail data
Route::put('/barang/{id}', 'BarangController@update'); //menyimpan hasil edit
Route::delete('/barang/{id}', 'BarangController@destroy'); //menghapus


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get(
    '/check',
    function () {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        } elseif (Auth::guard('warung')->check()) {
            return redirect()->route('user.dashboard');
        } else {
            return abort(404);
        }
    }
)->name('home');

//area admin
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.home');
    Route::get('/admin/profile', 'AdminController@profile')->name('admin.profile');
    Route::any('/admin/manage', 'AdminController@manage')->name('admin.manage');
    Route::any('/admin/manage/warung-activation', 'AdminController@warungActivation')->name('admin.manage.warung-activation');
    Route::any('/admin/mancat', 'AdminController@mancat')->name('admin.mancat');
});

//area warung
Route::middleware('auth:warung')->group(function () {
    Route::any('/me', 'AkunController@myProfile')->name('user.me'); //user profile
    Route::any('/dashboard', 'AkunController@index')->name('user.dashboard');
    Route::any('/dashboard/warung', 'WarungController@warung')->name('user.warung');

    Route::any('/dashboard/warung/buat', 'WarungController@create')->name('user.warung.create'); //menampilkan form
    Route::any('/dashboard/warung/m/{id}', 'WarungController@manage')->name('user.warung.manage'); //manage warung (edit, delete, dsb)

    Route::any('/my-warung/{idwarung}', 'WarungController@view')->name('warung.view'); //view warung
});

// Route::middleware('auth:admin,warung')->group(function () {
//     Route::any('/dashboard/warung', 'WarungController@warung')->name('user.warung');

//     Route::any('/dashboard/warung/buat', 'WarungController@create')->name('user.warung.create'); //menampilkan form
//     Route::any('/dashboard/warung/m/{id}', 'WarungController@manage')->name('user.warung.manage'); //manage warung (edit, delete, dsb)
// });
