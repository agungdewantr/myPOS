<?php

namespace App\Http\Livewire;
use App\Models\Mpenjualan;
use Livewire\Component;
use App\Models\penjualan_barang;
use DB;

class HistoryPenjualan extends Component
{
    public function render()
    {
        $penjualan = Mpenjualan::all();
        return view('livewire.history-penjualan', compact('penjualan'));
    }

    public function detailhispenj($id)
    {
      $detailpenjualan = DB::table('penjualan_barang')
        ->join('barang', 'penjualan_barang.BarangID', '=', 'barang.barangID')
        ->join('satuan', 'penjualan_barang.SatuanID', '=', 'satuan.SatuanID')
        ->leftJoin('diskon', 'barang.DiskonID', '=', 'diskon.DiskonID')
        ->select('penjualan_barang.*', 'barang.NamaBarang','satuan.Satuan', 'diskon.Diskon')
        ->where('penjualan_barang.PenjualanID', '=', $id)
        ->get();
      $totalpesanan = DB::table('penjualan_barang')
        ->select(DB::raw('SUM(Total) as totalPesanan'))
        ->where('PenjualanID', '=', $id)
        ->first();
      return view('livewire.detailpenjualan', compact('detailpenjualan', 'totalpesanan'));
    }
}
