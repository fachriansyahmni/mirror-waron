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

Route::any('/cari', 'MainController@cariPage')->name('cari');
Route::any('/about', function () {
    return view('about');
})->name('about');

Route::any('/warung-{id}', 'MainController@warungOverview')->name('overview.warung');
Route::any('/kategori/{id}', 'MainController@warungByKategori')->name('kategori.warung');



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
    Route::any('/admin/reset-Owner', 'AdminController@resetOwner')->name('admin.resetOwner');
    Route::any('/admin/{id}/savePsswdOwner', 'AdminController@savePsswdOwner')->name('admin.savePsswdOwner');
    Route::any('/admin/{id}/reset/owner', 'AdminController@resetPsswdOwner')->name('admin.resetPsswdOwner');
    Route::any('/admin/mancat/{id}/edit', 'AdminController@edit')->name('admin.edit');
    Route::put('/admin/mancat/{id}', 'AdminController@update')->name('admin.update');
    Route::any('/admin/reset', 'AdminController@resetPsswd')->name('admin.reset');
    Route::any('/admin/{id}/reset', 'AdminController@savePsswd')->name('admin.save');
});

//area warung
Route::middleware('auth:warung')->group(function () {
    Route::any('/me', 'AkunController@myProfile')->name('user.me'); //user profile
    Route::any('/dashboard', 'AkunController@index')->name('user.dashboard');
    Route::any('/dashboard/warung', 'WarungController@warung')->name('user.warung');

    Route::any('/dashboard/warung/buat', 'WarungController@create')->name('user.warung.create'); //menampilkan form
    Route::any('/dashboard/warung/m/{id}', 'WarungController@manage')->name('user.warung.manage'); //manage warung (edit, delete, dsb)
    Route::any('/dashboard/warung-delete/{id}', 'WarungController@deleteWarung')->name('user.warung.delete'); //menghapus warung
    Route::any('/my-warung/{idwarung}', 'WarungController@view')->name('warung.view'); //view warung

    //crud barang
    // Route::get('/my-warung/{idwarung}/barang/create', 'BarangController@create'); //menampilkan form
    Route::any('/my-warung/{idwarung}/barang/create', 'BarangController@store')->name('barang.create'); //menyimpan form
    Route::get('/barang', 'BarangController@index'); //menampilkan item
    //Route::get('/barang/{id}/edit', 'BarangController@edit'); //menampilkan form edit
    Route::get('/barang/{id}/show', 'BarangController@show'); //lihat detail data
    Route::put('/barang/update', 'BarangController@updateBarang')->name('barang.update.action'); //menyimpan hasil edit
    Route::delete('/barang/{id}', 'BarangController@destroy'); //menghapus

    Route::get('/barang/{id}/show', 'WarungController@show'); //lihat detail data
    Route::get('/barang/{id}/edit', 'WarungController@edit'); //menampilkan form edit
    Route::put('/barang/{id}', 'WarungController@update'); //menyimpan hasil edit
    Route::get('/barang/{id}/edit-stok', 'WarungController@editStok'); //menampilkan form edit stok 
    Route::put('/barang/{id}/stok', 'WarungController@updateStok'); //menyimpan hasil edit

    //profile
    Route::get('/profile/{id}/show', 'AkunController@show')->name('show.profile');; //menampilkan profile
    Route::get('/profile/{id}/edit', 'AkunController@edit'); //menampilkan form edit
    Route::put('/profile/{id}', 'AkunController@update')->name('update.profile.action'); //menyimpan hasil edit
    Route::post('/profile/{id}/edit', 'AkunController@savePsswd');
});

// Route::middleware('auth:admin,warung')->group(function () {
//     Route::any('/dashboard/warung', 'WarungController@warung')->name('user.warung');

//     Route::any('/dashboard/warung/buat', 'WarungController@create')->name('user.warung.create'); //menampilkan form
//     Route::any('/dashboard/warung/m/{id}', 'WarungController@manage')->name('user.warung.manage'); //manage warung (edit, delete, dsb)
// });
