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
// Route::get('/', function () {
//     return view('page.auth.login');
// });

//dashboard
Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('is_admin');

// pegawai
Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index');
Route::get('/pegawai/create', 'App\Http\Controllers\PegawaiController@create');
Route::get('/pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@show');
Route::post('/pegawai', 'App\Http\Controllers\PegawaiController@store');
Route::delete('/pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@destroy');
Route::get('/pegawai/{pegawai}/edit', 'App\Http\Controllers\PegawaiController@edit');
Route::patch('/pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@update');

//jenis
Route::get('/jenis', 'App\Http\Controllers\JenisBarangController@index');
Route::get('/jenis/create', 'App\Http\Controllers\JenisBarangController@create');
Route::post('/jenis', 'App\Http\Controllers\JenisBarangController@store');
Route::get('/jenis/{jenis}/edit', 'App\Http\Controllers\JenisBarangController@edit');
Route::patch('/jenis/{jenis}', 'App\Http\Controllers\JenisBarangController@store');

//stok barang
Route::get('/stok_barang', 'App\Http\Controllers\StokBarangController@index');

//satuan barang
Route::get('/satuan_barang', 'App\Http\Controllers\SatuanBarangController@index');

// trasaksi
Route::get('/barang_masuk', 'App\Http\Controllers\BarangMasukController@index');
Route::get('/barang_keluar', 'App\Http\Controllers\BarangKeluarController@index');

//supplier
Route::get('/supplier', 'App\Http\Controllers\SupplierController@index');

