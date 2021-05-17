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

//dashboard
Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/products', function () {
    return view('frontend.products');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change-password', 'App\Http\Controllers\PasswordController@changePassword')->name('change-password')->middleware('auth');
Route::post('/update-password', 'App\Http\Controllers\PasswordController@updatePassword')->name('update-password')->middleware('auth');

Auth::routes();

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('is_admin');

// pegawai
Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index')->name('pegawai.index')->middleware('checkRole:admin');
Route::get('/pegawai/cari', 'App\Http\Controllers\PegawaiController@cari')->name('pegawai.search')->middleware('checkRole:admin');
Route::get('/pegawai/create', 'App\Http\Controllers\PegawaiController@create')->middleware('checkRole:admin');
Route::get('/pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@show')->middleware('checkRole:admin');
Route::post('/pegawai', 'App\Http\Controllers\PegawaiController@store')->middleware('checkRole:admin');
Route::delete('/pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@destroy')->middleware('checkRole:admin');
Route::get('/pegawai/{pegawai}/edit', 'App\Http\Controllers\PegawaiController@edit')->middleware('checkRole:admin');
Route::patch('/pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@update')->middleware('checkRole:admin');

//jenis
Route::get('/jenis', 'App\Http\Controllers\JenisBarangController@index')->name('jenis.index');
Route::get('/jenis/cari', 'App\Http\Controllers\JenisBarangController@cari')->name('jenis.search');
Route::get('/jenis/create', 'App\Http\Controllers\JenisBarangController@create');
Route::post('/jenis', 'App\Http\Controllers\JenisBarangController@store');
Route::delete('/jenis/{jenisBarang}', 'App\Http\Controllers\JenisBarangController@destroy');
Route::get('/jenis/{jenisBarang}/edit', 'App\Http\Controllers\JenisBarangController@edit');
Route::patch('/jenis/{jenisBarang}', 'App\Http\Controllers\JenisBarangController@update');


//satuan barang
Route::get('/satuan', 'App\Http\Controllers\SatuanBarangController@index');
Route::get('/satuan/cari', 'App\Http\Controllers\SatuanBarangController@cari')->name('satuan.search');
Route::get('/satuan/create', 'App\Http\Controllers\SatuanBarangController@create');
Route::post('/satuan', 'App\Http\Controllers\SatuanBarangController@store');
Route::delete('/satuan/{satuanBarang}', 'App\Http\Controllers\SatuanBarangController@destroy');
Route::get('/satuan/{satuanBarang}/edit', 'App\Http\Controllers\SatuanBarangController@edit');
Route::patch('/satuan/{satuanBarang}', 'App\Http\Controllers\SatuanBarangController@update');

//data barang
Route::get('/dataBarang', 'App\Http\Controllers\DataBarangController@index')->name('dataBarang.index');
Route::get('/dataBarang/cari', 'App\Http\Controllers\DataBarangController@cari')->name('dataBarang.search');
Route::get('/dataBarang/create', 'App\Http\Controllers\DataBarangController@create');
Route::post('/dataBarang', 'App\Http\Controllers\DataBarangController@store');
Route::delete('/dataBarang/{dataBarang}', 'App\Http\Controllers\DataBarangController@destroy');
Route::get('/dataBarang/{dataBarang}/edit', 'App\Http\Controllers\DataBarangController@edit');
Route::patch('/dataBarang/{dataBarang}', 'App\Http\Controllers\DataBarangController@update');


//stok barang
Route::get('/stokBarang', 'App\Http\Controllers\StokBarangController@index');
Route::get('/stokBarang/create', 'App\Http\Controllers\StokBarangController@create');
Route::post('/stokBarang', 'App\Http\Controllers\StokBarangController@store');
Route::delete('/stokBarang/{stokBarang}', 'App\Http\Controllers\StokBarangController@destroy')->name('stok.destroy');
Route::get('/stokBarang/{stokBarang}/edit', 'App\Http\Controllers\StokBarangController@edit')->name('stok.edit');
Route::patch('/stokBarang/{stokBarang}', 'App\Http\Controllers\StokBarangController@update');
Route::get('/stokBarang/cetak', 'App\Http\Controllers\StokBarangController@cetakStok');

// barang masuk
Route::get('/BarangMasuk', 'App\Http\Controllers\BarangMasukController@index');
Route::get('/BarangMasuk/create', 'App\Http\Controllers\BarangMasukController@create');
Route::post('/BarangMasuk', 'App\Http\Controllers\BarangMasukController@store');
Route::delete('/BarangMasuk/{barangMasuk}', 'App\Http\Controllers\BarangMasukController@destroy');
Route::get('/BarangMasuk/{barangMasuk}/edit', 'App\Http\Controllers\BarangMasukController@edit');
Route::patch('/BarangMasuk/{barangMasuk}', 'App\Http\Controllers\BarangMasukController@update');
Route::get('/BarangMasuk/cetak', 'App\Http\Controllers\BarangMasukController@cetakBarangMasuk')->name('BarangMasuk.cetak');

//barang keluar
Route::get('/BarangKeluar', 'App\Http\Controllers\BarangKeluarController@index');
Route::get('/BarangKeluar/create', 'App\Http\Controllers\BarangKeluarController@create');
Route::post('/BarangKeluar', 'App\Http\Controllers\BarangKeluarController@store');
Route::delete('/BarangKeluar/{barangKeluar}', 'App\Http\Controllers\BarangKeluarController@destroy');
Route::get('/BarangKeluar/{barangKeluar}/edit', 'App\Http\Controllers\BarangKeluarController@edit');
Route::patch('/BarangKeluar/{barangKeluar}', 'App\Http\Controllers\BarangKeluarController@update');
Route::get('/BarangKeluar/cetak', 'App\Http\Controllers\BarangKeluarController@cetakBarangKeluar');

//supplier
Route::get('/supplier', 'App\Http\Controllers\SupplierController@index')->name('supplier.index');
Route::get('/supplier/cari', 'App\Http\Controllers\SupplierController@cari')->name('supplier.search');
Route::get('/supplier/create', 'App\Http\Controllers\SupplierController@create');
Route::post('/supplier', 'App\Http\Controllers\SupplierController@store');
Route::delete('/supplier/{supplier}', 'App\Http\Controllers\SupplierController@destroy');
Route::get('/supplier/{supplier}/edit', 'App\Http\Controllers\SupplierController@edit');
Route::patch('/supplier/{supplier}', 'App\Http\Controllers\SupplierController@update')->name('supplier.update');

//laporan stok
Route::get('/laporanStok', 'App\Http\Controllers\LaporanStokController@index');
Route::get('/laporanStokPertanggal/{tglawal}/{tglakhir}', 'App\Http\Controllers\LaporanStokController@CetakStokPertanggal');

//laporan barang masuk
Route::get('/laporanMasuk', 'App\Http\Controllers\LaporanMasukController@index');
Route::get('/laporanMasukPertanggal/{tglawal}/{tglakhir}', 'App\Http\Controllers\LaporanMasukController@CetakMasukPertanggal');

//laporan barang keluar
Route::get('/laporanKeluar', 'App\Http\Controllers\LaporanKeluarController@index');
Route::get('/laporanKeluarPertanggal/{tglawal}/{tglakhir}', 'App\Http\Controllers\LaporanKeluarController@CetakKeluarPertanggal');


