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

Route::get('/barang/create','BarangController@create'); //menampilkan form
Route::post('/barang','BarangController@store'); //menyimpan form
Route::get('/barang','BarangController@index'); //menampilkan item
Route::get('/barang/{id}/edit','BarangController@edit'); //menampilkan form edit
Route::get('/barang/{id}/show','BarangController@show'); //lihat detail data
Route::put('/barang/{id}','BarangController@update'); //menyimpan hasil edit
Route::delete('/barang/{id}','BarangController@destroy'); //menghapus

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
