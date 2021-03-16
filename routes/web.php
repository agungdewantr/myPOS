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


Auth::routes();
Route::group(['middleware' => 'auth'], function(){
Route::get('/', App\Http\Livewire\Home::class)->name('Home');
Route::get('penjualan', App\Http\Livewire\Penjualan::class)->name('Penjualan');
Route::get('caribarang', [App\Http\Livewire\Penjualan::class, 'caribarang'])->name('caribarang');
Route::post('penjualan', [App\Http\Livewire\Penjualan::class, 'savetransaksi'])->name('savetransaksi');
Route::delete('/penjualan/{id}/hapus', [App\Http\Livewire\Penjualan::class, 'deleteitem'])->name('deleteitem');
Route::post('penjualan/keranjang', [App\Http\Livewire\Penjualan::class, 'saveitempesanan'])->name('saveitempesanan');
Route::get('barang', App\Http\Livewire\Barang::class)->name('Barang');
Route::get('barang/{id}/edit', [App\Http\Livewire\Barang::class, 'edit'])->name('editBarang');
Route::put('barang', [App\Http\Livewire\Barang::class, 'update'])->name('updateBarang');
Route::delete('barang/{id}/delete', [App\Http\Livewire\Barang::class, 'delete'])->name('deleteBarang');
Route::post('barang', [App\Http\Livewire\Barang::class, 'CreateBarang'])->name('CreateBarang');
Route::get('pembelian', App\Http\Livewire\Pembelian::class)->name('Pembelian');
Route::post('pembelian/keranjang', [App\Http\Livewire\Pembelian::class, 'saveitembeli'])->name('saveitembeli');
Route::delete('/pembelian/{id}/hapus', [App\Http\Livewire\Pembelian::class, 'deleteitem'])->name('deleteitempembelian');
Route::post('pembelian', [App\Http\Livewire\Pembelian::class, 'savetransaksi'])->name('savetransaksipembelian');
Route::post('/periode', [App\Http\Livewire\Home::class, 'saveperiode'])->name('saveperiode');
Route::post('/diskon', [App\Http\Livewire\Home::class, 'savediskon'])->name('savediskon');
Route::get('diskon/{id}/edit', [App\Http\Livewire\Home::class, 'editdiskon'])->name('editdiskon');
Route::get('diskon/{id}/detail', [App\Http\Livewire\Barang::class, 'detaildiskon'])->name('detaildiskon');
Route::put('diskon/adddiskontobarang', [App\Http\Livewire\Barang::class, 'adddiskontobarang'])->name('adddiskontobarang');
route::put('diskon/{id}/deletebarangdiskon',  [App\Http\Livewire\Barang::class, 'deletebarangdiskon'])->name('deletebarangdiskon');
Route::put('diskon/{id}/edit', [App\Http\Livewire\Home::class, 'updatediskon'])->name('updatediskon');
Route::delete('diskon/{id}/hapus', [App\Http\Livewire\Home::class, 'hapusdiskon'])->name('hapusdiskon');
Route::get('/historypenjualan', App\Http\Livewire\HistoryPenjualan::class)->name('historypenjualan');
Route::get('/satuan', App\Http\Livewire\Satuan::class)->name('satuan');
Route::post('/satuan', [App\Http\Livewire\Satuan::class, 'createsatuan'])->name('createsatuan');
});
