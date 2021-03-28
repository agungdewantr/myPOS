<?php

namespace App\Http\Livewire;
use App\Models\Mbarang;
use App\Models\Msatuan;
use App\Models\Mpembelian;
use App\Models\pembelian_barang;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pembelian extends Component
{

    public function render()
    {
      $pembelian_barang = DB::table('pembelian_barang')
        ->join('barang', 'pembelian_barang.BarangID', '=', 'barang.barangID')
        ->join('satuan', 'pembelian_barang.SatuanID', '=', 'satuan.SatuanID')
        ->select('pembelian_barang.*', 'barang.NamaBarang', 'satuan.Satuan')
        ->where('pembelian_barang.PembelianID', '=', NULL)
        ->get();
      $totalpesanan = DB::table('pembelian_barang')
        ->select(DB::raw('SUM(Total) as totalPesanan'))
        ->where('PembelianID', '=', NULL)
        ->first();
      $satuan = Msatuan::all();
      return view('livewire.pembelian', compact('pembelian_barang', 'totalpesanan','satuan'));
    }

    public function saveitembeli(Request $request){
      $satuan = Msatuan::select('Jumlah')->where('SatuanID', $request->SatuanID)->first();
        $request->validate([
            'NamaBarang'   => 'required',
            'Qty'          => 'required',
            'SatuanID'     => 'required',
            'Harga'        => 'required',
            'Total'        => 'required'
        ]);
        $databrg = Mbarang::where('BarangID', $request->BarangID)->first();
        $cekbarang = DB::table('pembelian_barang')
          ->where('BarangID', $request->BarangID)
          ->where('PembelianID', NULL)
          ->get();
        if (count($cekbarang) == 0) {
          Mbarang::where('BarangID', $request->BarangID)
            ->update(['Stok' => $databrg->Stok + $request->Qty*$satuan->Jumlah, 'Harga' =>$request->Harga/$satuan->Jumlah]);
          pembelian_barang::create([
            'BarangID' => $request->BarangID,
            'SatuanID' => $request->SatuanID,
            'Harga'    => $request->Harga,
            'Qty'      => $request->Qty,
            'Total'    => $request->Total,
          ]);
          return redirect('/pembelian');
      } else {
        $qtydanTotal = DB::table('pembelian_barang')
          ->select('Qty', 'Total')
          ->where('BarangID', $request->BarangID)
          ->where('PembelianID', NULL)
          ->first();
          Mbarang::where('BarangID', $request->BarangID)
            ->update(['Stok' => $databrg->Stok + $request->Qty*$satuan->Jumlah, 'Harga' =>$request->Harga/$satuan->Jumlah]);
          pembelian_barang::where('BarangID', $request->BarangID)
            ->where('PembelianID', NULL)
            ->update(['Qty' => $qtydanTotal->Qty + $request->Qty, 'Total' => $qtydanTotal->Total + ($request->Qty * $databrg->Harga)]);
          return redirect('/pembelian');
        }
      }

    public function deleteitem($id)
    {
        pembelian_barang::where('pbbID', $id)->delete();
        return redirect('/pembelian')->with(['success' => 'Item dihapus']);
    }

    public function savetransaksi(Request $request)
    {
      $totalpembelian = DB::table('pembelian_barang')
        ->select(DB::raw('SUM(Total) as totalpembelian'))
        ->where('PembelianID', '=', NULL)
        ->first();
      Mpembelian::create([
        'TotalPembelian'    => $totalpembelian->totalpembelian
      ]);
      $PembelianID = DB::table('pembelian')
        ->select(DB::raw('MAX(PembelianID) as id'))
        ->first();
      pembelian_barang::where('PembelianID', NULL)
        ->update(['PembelianID' => $PembelianID->id]);
      return redirect('/pembelian')->with(['success' => 'Transaksi Pembelian Tersimpan']);
    }
}
