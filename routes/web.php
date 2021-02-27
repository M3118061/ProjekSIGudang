<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::view('/dashboard', 'dashboard');

// Route::view('/', 'page/auth/login');
// Route::get('/logout', 'Auth\LoginController@logout');

//login
Route::get('/', function () {
    return view('page.auth.login');
});

//dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// pegawai
Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index');
Route::get('/pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@show');

// data gudang
Route::get('/stok_barang', 'App\Http\Controllers\StokBarangController@index');
Route::get('/jenis_barang', 'App\Http\Controllers\JenisBarangController@index');
Route::get('/satuan_barang', 'App\Http\Controllers\SatuanBarangController@index');

// trasaksi
Route::get('/barang_masuk', 'App\Http\Controllers\BarangMasukController@index');
Route::get('/barang_keluar', 'App\Http\Controllers\BarangKeluarController@index');

//supplier
Route::get('/supplier', 'App\Http\Controllers\SupplierController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
