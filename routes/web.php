<?php

use App\Http\Controllers\HargaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');
Route::get('/daftar-harga', [HargaController::class, 'daftar_harga'])->name('daftar_harga');

Route::post('/buap-pesanan', [PesananController::class, 'buat_pesanan'])->name('buat_pesanan');
Route::get('/pesanan-list', [PesananController::class, 'pesanan_list'])->name('pesanan_list');