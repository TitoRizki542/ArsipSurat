<?php

use App\Http\Controllers\Admin\ArsipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JenisController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\SuratController;
use App\Models\Kategori;
use App\Models\Surat;
use Illuminate\Routing\RouteBinding;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
//Surat User
Route::get('surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('surat/{id}', [SuratController::class, 'detail'])->name('surat.detail');
Route::get('surat-tag', [SuratController::class, 'tag'])->name('surat.tag');


//Auth
Route::get('login', [LoginController::class, 'index'])->name('auth.login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Admin

//Route Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
//Route Jenis Surat
Route::get('jenis-surat', [JenisController::class, 'index'])->name('jenis.index');
Route::get('tambah-jenis', [JenisController::class, 'create'])->name('jenis.create');
Route::post('simpan-jenis', [JenisController::class, 'store'])->name('jenis.store');
Route::put('edit-jenis/{id}', [JenisController::class, 'edit'])->name('jenis.edit');
//Route Kategori Surat
Route::get('kategori-surat', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('tambah-kategori', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('simpan-kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::put('edit-kategori/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');

//Arsip Surat
Route::get('arsip-surat', [ArsipController::class, 'index'])->name('arsip.index');
Route::get('tambah-arsip', [ArsipController::class, 'create'])->name('arsip.create');
Route::post('simpan-arsip', [ArsipController::class, 'store'])->name('arsip.store');

Route::controller(ArsipController::class)->group(function () {
    //CRUD Surat
    Route::get('arsip-surat', 'index')->name('arsip.index');
    Route::get('tambah-arsip', 'create')->name('arsip.create');
    Route::post('simpan-arsip', 'store')->name('arsip.store');
    Route::delete('hapus-arsip/{id}', 'destroy')->name('arsip.delete');

    //Get surat
    Route::get('surat-masuk', 'suratMasuk')->name('surat.masuk');
    Route::get('surat-keluar', 'suratKeluar')->name('surat.keluar');
    Route::get('semua-surat', 'semuaSurat')->name('semua.surat');
});
//Pengguna
Route::get('user', [UserController::class, 'index'])->name('pengguna.index');
Route::get('tambah-user', [UserController::class, 'create'])->name('pengguna.create');
Route::post('simpan-user', [UserController::class, 'store'])->name('pengguna.store');
Route::delete('simpan-user/{id}', [UserController::class, 'destroy'])->name('pengguna.delete');


