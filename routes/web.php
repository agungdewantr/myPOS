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


Auth::routes();
Route::get('/', App\Http\Livewire\Home::class)->name('Home');
Route::get('penjualan', App\Http\Livewire\Penjualan::class)->name('Penjualan');
Route::get('caribarang', [App\Http\Livewire\Penjualan::class, 'caribarang'])->name('caribarang');
Route::get('barang', App\Http\Livewire\Barang::class)->name('Barang');
Route::get('barang/{id}/edit', [App\Http\Livewire\BarangUpdate::class, 'edit'])->name('editBarang');
Route::post('barang', [App\Http\Livewire\Barang::class, 'CreateBarang'])->name('CreateBarang');
Route::post('penjualan', [App\Http\Livewire\Penjualan::class, 'savetransaksi'])->name('savetransaksi');
Route::post('penjualan/keranjang', [App\Http\Livewire\Penjualan::class, 'saveitempesanan'])->name('saveitempesanan');
