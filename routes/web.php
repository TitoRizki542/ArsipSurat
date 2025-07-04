<?php

use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\Admin\ArsipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JenisController;
use App\Http\Controllers\Admin\BidangController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\SuratController;
use App\Models\Bidang;
use App\Models\Surat;
use Illuminate\Routing\RouteBinding;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

//Surat User
Route::middleware(['auth:web'])->group(function () {
Route::get('surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('surat/{id}', [SuratController::class, 'detail'])->name('surat.detail');
Route::get('surat-tag', [SuratController::class, 'tag'])->name('surat.tag');
});

//Auth
Route::get('login', [LoginController::class, 'index'])->name('auth.login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


//Admin
//Route Dashboard

Route::middleware(['auth:admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    //Route Jenis Surat
    Route::get('jenis-surat', [JenisController::class, 'index'])->name('jenis.index');
    Route::get('tambah-jenis', [JenisController::class, 'create'])->name('jenis.create');
    Route::post('simpan-jenis', [JenisController::class, 'store'])->name('jenis.store');
    Route::put('edit-jenis/{id}', [JenisController::class, 'edit'])->name('jenis.edit');
    Route::delete('hapus-jenis/{id}', [JenisController::class, 'destroy'])->name('jenis.delete');
    //Route Kategori Surat
    Route::get('bidang-surat', [BidangController::class, 'index'])->name('bidang.index');
    Route::get('tambah-bidang', [BidangController::class, 'create'])->name('bidang.create');
    Route::post('simpan-bidang', [BidangController::class, 'store'])->name('bidang.store');
    Route::put('edit-bidang/{id}', [BidangController::class, 'edit'])->name('bidang.edit');
    Route::delete('hapus-bidang/{id}', [BidangController::class, 'destroy'])->name('bidang.delete');

    //Arsip Surat
    Route::get('arsip-surat', [ArsipController::class, 'index'])->name('arsip.index');
    Route::get('tambah-arsip', [ArsipController::class, 'create'])->name('arsip.create');
    Route::post('simpan-arsip', [ArsipController::class, 'store'])->name('arsip.store');
    Route::controller(ArsipController::class)->group(function () {
        //CRUD Surat
        Route::get('arsip-surat', 'index')->name('arsip.index');
        Route::get('tambah-arsip', 'create')->name('arsip.create');
        Route::post('simpan-arsip', 'store')->name('arsip.store');
        Route::get('arsip-edit/{id}', 'edit')->name('arsip.edit');
        Route::put('arsip-update/{id}', 'update')->name('arsip.update');
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
});
