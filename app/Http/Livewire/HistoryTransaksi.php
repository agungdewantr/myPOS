<?php

namespace App\Http\Livewire;
use App\Models\Mpenjualan;
use App\Models\Mpembelian;
use Livewire\Component;
use App\Models\penjualan_barang;
use DB;

class HistoryTransaksi extends Component
{
    public function render()
    {
        $penjualan = Mpenjualan::all();
        return view('livewire.history-penjualan', compact('penjualan'));
    }

    public function historypembelian()
    {
        $pembelian = Mpembelian::all();
        return view('livewire.history-pembelian', compact('pembelian'));
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
      $totalpesanan = DB::table('penjualan')
        ->select('TotalPenjualan', 'NominalPembayaran', 'created_at')
        ->where('PenjualanID', '=', $id)
        ->first();
      return view('livewire.detailpenjualan', compact('detailpenjualan', 'totalpesanan', 'id'));
    }

    public function cetakinvoice($id)
    {
      $detailpenjualan = DB::table('penjualan_barang')
        ->join('barang', 'penjualan_barang.BarangID', '=', 'barang.barangID')
        ->join('satuan', 'penjualan_barang.SatuanID', '=', 'satuan.SatuanID')
        ->leftJoin('diskon', 'barang.DiskonID', '=', 'diskon.DiskonID')
        ->select('penjualan_barang.*', 'barang.NamaBarang','satuan.Satuan', 'diskon.Diskon')
        ->where('penjualan_barang.PenjualanID', '=', $id)
        ->get();
      $totalpesanan = DB::table('penjualan')
        ->select('TotalPenjualan', 'NominalPembayaran', 'created_at')
        ->where('PenjualanID', '=', $id)
        ->first();
      return view('livewire.cetakinvoice', compact('detailpenjualan', 'totalpesanan', 'id'));
    }
}
