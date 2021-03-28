<?php

namespace App\Http\Livewire;
use App\Models\Mpenjualan;
use App\Models\Mpembelian;
use Livewire\Component;
use App\Models\penjualan_barang;
use DB;

class HistoryPembelian extends Component
{
    public function render()
    {
      $pembelian = Mpembelian::all();
      return view('livewire.history-pembelian', compact('pembelian'));
    }

    public function detailhispemb($id)
    {
      $detailpembelian = DB::table('pembelian_barang')
        ->join('barang', 'pembelian_barang.BarangID', '=', 'barang.barangID')
        ->join('satuan', 'pembelian_barang.SatuanID', '=', 'satuan.SatuanID')
        ->leftJoin('diskon', 'barang.DiskonID', '=', 'diskon.DiskonID')
        ->select('pembelian_barang.*', 'barang.NamaBarang','satuan.Satuan')
        ->where('pembelian_barang.PembelianID', '=', $id)
        ->get();
      $total = Mpembelian::where('PembelianID', $id)->first();
      return view('livewire.detailpembelian', compact('detailpembelian','total', 'id'));
    }

    // public function cetakinvoice($id)
    // {
    //   $detailpenjualan = DB::table('penjualan_barang')
    //     ->join('barang', 'penjualan_barang.BarangID', '=', 'barang.barangID')
    //     ->join('satuan', 'penjualan_barang.SatuanID', '=', 'satuan.SatuanID')
    //     ->leftJoin('diskon', 'barang.DiskonID', '=', 'diskon.DiskonID')
    //     ->select('penjualan_barang.*', 'barang.NamaBarang','satuan.Satuan', 'diskon.Diskon')
    //     ->where('penjualan_barang.PenjualanID', '=', $id)
    //     ->get();
    //   $totalpesanan = DB::table('penjualan')
    //     ->select('TotalPenjualan', 'NominalPembayaran')
    //     ->where('PenjualanID', '=', $id)
    //     ->first();
    //   return view('livewire.cetakinvoice', compact('detailpenjualan', 'totalpesanan', 'id'));
    // }
}
