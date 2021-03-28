<?php

namespace App\Http\Livewire;
use App\Models\Mbarang;
use App\Models\Mpenjualan;
use App\Models\Msatuan;
use App\Models\penjualan_barang;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Penjualan extends Component
{
  public function render()
  {
    $penjualan_barang = DB::table('penjualan_barang')
      ->join('barang', 'penjualan_barang.BarangID', '=', 'barang.barangID')
      ->join('satuan', 'penjualan_barang.SatuanID', '=', 'satuan.SatuanID')
      ->leftJoin('diskon', 'barang.DiskonID', '=', 'diskon.DiskonID')
      ->select('penjualan_barang.*', 'barang.NamaBarang','satuan.Satuan', 'diskon.Diskon')
      ->where('penjualan_barang.PenjualanID', '=', NULL)
      ->get();
    $totalpesanan = DB::table('penjualan_barang')
      ->select(DB::raw('SUM(Total) as totalPesanan'))
      ->where('PenjualanID', '=', NULL)
      ->first();
      $satuan = null;
    return view('livewire.penjualan', compact('penjualan_barang', 'totalpesanan', 'satuan'));
  }

  public function satuan($id){
    echo json_encode(Msatuan::where('BarangID', $id)->get());
  }

  public function saveitempesanan(Request $request){
    $satuan = Msatuan::select('Jumlah')->where('SatuanID', $request->SatuanID)->first();
    $request->validate([
        'NamaBarang'   => 'required',
        'Qty'          => 'required',
        'SatuanID'     => 'required'
    ]);
    $databrg = Mbarang::where('BarangID', $request->BarangID)->first();
    if($databrg->DiskonID == NULL) {
      $hargajual = $databrg->Harga + $databrg->Harga*$databrg->Profit;
    } else {
      $databrg = DB::table('barang')
              ->join('diskon', 'barang.DiskonID', '=', 'diskon.DiskonID')
              ->select('barang.*', 'diskon.Diskon')
              ->where('barang.BarangID','=',$request->BarangID)
              ->first();
              $hargajual = $databrg->Harga + $databrg->Harga*$databrg->Profit;
              $hargajual = $hargajual - ($hargajual*$databrg->Diskon);
    }
    $cekbarang = DB::table('penjualan_barang')
      ->where('BarangID', $request->BarangID)
      ->where('PenjualanID', NULL)
      ->get();

    if(($databrg->Stok - $request->Qty*$satuan->Jumlah) >= 0) {
      if (count($cekbarang) == 0) {
        Mbarang::where('BarangID', $request->BarangID)
          ->update(['Stok' => $databrg->Stok - $request->Qty*$satuan->Jumlah]);
        penjualan_barang::create([
          'BarangID' => $request->BarangID,
          'Qty'      => $request->Qty,
          'SatuanID' => $request->SatuanID,
          'Harga'    => (($databrg->Harga + $databrg->Harga*$databrg->Profit)*$satuan->Jumlah),
          'Total'    => (($request->Qty*$satuan->Jumlah) * $hargajual),
        ]);
        return redirect('/penjualan');
    } else {
      $qtydanTotal = DB::table('penjualan_barang')
        ->select('Qty', 'Total','SatuanID')
        ->where('BarangID', $request->BarangID)
        ->where('PenjualanID', NULL)
        ->first();
        if($qtydanTotal->SatuanID != $request->SatuanID)
        {
          Mbarang::where('BarangID', $request->BarangID)
            ->update(['Stok' => $databrg->Stok - $request->Qty*$satuan->Jumlah]);
          penjualan_barang::create([
            'BarangID' => $request->BarangID,
            'Qty'      => $request->Qty,
            'SatuanID' => $request->SatuanID,
            'Harga'    => (($databrg->Harga + $databrg->Harga*$databrg->Profit)*$satuan->Jumlah),
            'Total'    => (($request->Qty*$satuan->Jumlah) * $hargajual),
          ]);
        } else{
          Mbarang::where('BarangID', $request->BarangID)
            ->update(['Stok' => $databrg->Stok - $request->Qty*$satuan->Jumlah]);
          penjualan_barang::where('BarangID', $request->BarangID)
            ->where('PenjualanID', NULL)
            ->update(['Qty' => $qtydanTotal->Qty + $request->Qty, 'Total' => $qtydanTotal->Total + (($request->Qty*$satuan->Jumlah) * $hargajual)]);
        }
        return redirect('/penjualan');
      }
    } else {
      return redirect()->route('Penjualan')->with('error', 'Stok tidak mencukupi');
    }
  }

  public function deleteitem($id)
  {
    $getQty = penjualan_barang::where('pjbID', $id)->first();
    $satuan = Msatuan::select('Jumlah')->where('SatuanID', $getQty->SatuanID)->first();
    $getBrg = Mbarang::where('BarangID', $getQty->BarangID)->first();
    Mbarang::where('BarangID', $getQty->BarangID)
      ->update(['Stok' => ($getBrg->Stok + ($getQty->Qty*$satuan->Jumlah))]);
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
    if($request->inppembayaran < $request->totalHidden) {
      return redirect('/penjualan')->with(['pembayaran' => 'Nominal Pembayaran Kurang']);
    } else {
      Mpenjualan::create([
        'TotalPenjualan'    => $request->totalHidden,
        'NominalPembayaran' => $request->inppembayaran
      ]);
      $PenjualanID = DB::table('penjualan')
        ->select(DB::raw('MAX(PenjualanID) as id'))
        ->first();
      penjualan_barang::where('PenjualanID', NULL)
        ->update(['PenjualanID' => $PenjualanID->id]);
        return redirect('/penjualan')->with(['pembayaransukses' => 'Transaksi Berhasil tersimpan']);
    }
  }
}
