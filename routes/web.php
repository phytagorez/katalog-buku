<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

// Halaman utama langsung menampilkan Katalog Buku
Route::get('/', [BookController::class, 'index'])->name('home');

// Modul Katalog Buku
Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::put('/{book}', [BookController::class, 'update'])->name('update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('destroy');
});

// Modul Karyawan
Route::prefix('karyawans')->name('karyawans.')->group(function () {
    Route::get('/', [KaryawanController::class, 'index'])->name('index');
    Route::get('/create', [KaryawanController::class, 'create'])->name('create');
    Route::post('/', [KaryawanController::class, 'store'])->name('store');
    Route::get('/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('edit');
    Route::put('/{karyawan}', [KaryawanController::class, 'update'])->name('update');
    Route::delete('/{karyawan}', [KaryawanController::class, 'destroy'])->name('destroy');
});

// Rute alias untuk kompatibilitas URL lama
Route::redirect('/karyawan', '/karyawans');
Route::get('/karyawan/tambah', [KaryawanController::class, 'create'])->name('karyawans.legacy_create');
Route::post('/karyawan/simpan', [KaryawanController::class, 'store'])->name('karyawans.legacy_store');
