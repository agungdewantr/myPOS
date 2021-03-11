<?php

namespace App\Http\Livewire;
use App\Models\Mbarang;
use App\Models\Mpenjualan;
use App\Models\penjualan_barang;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Penjualan extends Component
{
  public $barangID;
  public $Qty;
  public $query;

  public function render()
  {
    $penjualan_barang = DB::table('penjualan_barang')
      ->join('barang', 'penjualan_barang.BarangID', '=', 'barang.barangID')
      ->select('penjualan_barang.*', 'barang.Harga', 'barang.NamaBarang')
      ->where('penjualan_barang.PenjualanID', '=', NULL)
      ->get();
    $barang = Mbarang::all();
    $totalpesanan = DB::table('penjualan_barang')
      ->select(DB::raw('SUM(Total) as totalPesanan'))
      ->where('PenjualanID', '=', NULL)
      ->first();
    return view('livewire.penjualan', compact('penjualan_barang', 'barang', 'totalpesanan'));
  }

  public function saveitempesanan(Request $request){
    $request->validate([
        'NamaBarang'   => 'required',
        'Qty'          => 'required'
    ]);
    $databrg = Mbarang::where('BarangID', $request->BarangID)->first();
    $cekbarang = DB::table('penjualan_barang')
      ->where('BarangID', $request->BarangID)
      ->where('PenjualanID', NULL)
      ->get();
    if (count($cekbarang) == 0) {
      Mbarang::where('BarangID', $request->BarangID)
        ->update(['Stok' => $databrg->Stok - $request->Qty]);
      penjualan_barang::create([
        'BarangID' => $request->BarangID,
        'Qty'      => $request->Qty,
        'Total'    => $databrg->Harga * $request->Qty,
      ]);
      return redirect('/penjualan');
  } else {
    $qtydanTotal = DB::table('penjualan_barang')
      ->select('Qty', 'Total')
      ->where('BarangID', $request->BarangID)
      ->where('PenjualanID', NULL)
      ->first();
      Mbarang::where('BarangID', $request->BarangID)
        ->update(['Stok' => $databrg->Jumlah - $this->Qty]);
      penjualan_barang::where('BarangID', $request->BarangID)
        ->where('PenjualanID', NULL)
        ->update(['Qty' => $qtydanTotal->Qty + $request->Qty, 'Total' => $qtydanTotal->Total + ($request->Qty * $databrg->Harga)]);
      return redirect('/penjualan');
    }
  }

  public function save()
  {
    $databrg = Mbarang::where('BarangID', $this->barangID)->first();
    $cekbarang = DB::table('penjualan_barang')
      ->where('BarangID', $this->barangID)
      ->where('PenjualanID', NULL)
      ->get();
    if (count($cekbarang) == 0) {
      penjualan_barang::create([
        'BarangID' => $this->barangID,
        'Qty'      => $this->Qty,
        'Total'    => $databrg->Harga * $this->Qty,
      ]);
      Mbarang::where('BarangID', $this->barangID)
        ->update(['Stok' => $databrg->Jumlah - $this->Qty]);
      return redirect('/penjualan');
    } else {
      $qtydanTotal = DB::table('penjualan_barang')
        ->select('Qty', 'Total')
        ->where('BarangID', $this->barangID)
        ->where('PenjualanID', NULL)
        ->first();
      Mbarang::where('BarangID', $this->barangID)
        ->update(['Stok' => $databrg->Jumlah - $this->Qty]);
      penjualan_barang::where('BarangID', $this->barangID)
        ->where('PenjualanID', NULL)
        ->update(['Qty' => $qtydanTotal->Qty + $this->Qty, 'Total' => $qtydanTotal->Total + ($this->Qty * $databrg->Harga)]);
      return redirect('/penjualan');
    }
  }
  public function deleteitem($id)
  {
    penjualan_barang::where('pjbID', $id)->delete();
    return redirect('/penjualan')->with(['success' => 'Item dihapus']);
  }

  public function caribarang()
  {
    $barang = Mbarang::all();
    return response()->json($barang);
  }

  public function savetransaksi(Request $request)
  {
    Mpenjualan::create([
      'TotalPenjualan'    => $request->totalHidden,
      'NominalPembayaran' => $request->inppembayaran
    ]);
    $PenjualanID = DB::table('penjualan')
      ->select(DB::raw('MAX(PenjualanID) as id'))
      ->first();
    penjualan_barang::where('PenjualanID', NULL)
      ->update(['PenjualanID' => $PenjualanID->id]);
    return redirect('/penjualan');
  }
}
