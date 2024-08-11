<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('login');
});

//ini route login
Route::post('/login', [LoginController::class, 'login']);

//ini route admin
Route::get('/admin', [AdminController::class, 'admin']);

//routing crud Barang
Route::get('/admin/barang', [AdminController::class, 'barang']); //ini untuk menampilkan data
Route::get('/admin/barang/tambah', [AdminController::class, 'tambah_barang']); //ini untuk menampilkan form tambah
Route::get('/admin/barang/edit/{id}', [AdminController::class, 'edit_barang']); //ini untuk menampilkan form edit
Route::get('/admin/barang/delete/{id}', [AdminController::class, 'delete_barang']); //ini untuk menghapus data
Route::post('/admin/barang/simpan', [AdminController::class, 'simpan_barang']); //ini untuk menyimpan data
Route::post('/admin/barang/update/{id}', [AdminController::class, 'update_barang']); //ini untuk mengupdate data


Route::get('/admin/laporan', [LaporanController::class, 'index']); // Display the report index
Route::get('/admin/laporan/barang', [LaporanController::class, 'cetak_barang']); // Print the barang report



Route::get('/kasir', function () {
    return view('layouts.master');
});
