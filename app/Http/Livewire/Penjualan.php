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
    public function mount()
    {
        $this->initializedProperties();
    }
    public function render()
    {
        $penjualan_barang = DB::table('penjualan_barang')
            ->join('barang', 'penjualan_barang.BarangID', '=', 'barang.barangID')
            ->select('penjualan_barang.*', 'barang.Harga', 'barang.NamaBarang')
            ->where('penjualan_barang.PenjualanID','=', NULL)
            ->get();
        $barang = Mbarang::all();
        $totalpesanan = DB::table('penjualan_barang')
                          ->select(DB::raw('SUM(Total) as totalPesanan'))
                          ->where('PenjualanID','=',NULL)
                          ->first();

        return view('livewire.penjualan', compact('penjualan_barang', 'barang','totalpesanan'));
    }
    public function save()
    {
      $databrg = Mbarang::where('BarangID', $this->barangID)->first();
      $cekbarang = DB::table('penjualan_barang')
                  ->where('BarangID', $this->barangID)
                  ->where('PenjualanID', NULL)
                  ->get();
                  if(count($cekbarang) == 0){
                    penjualan_barang::create([
                        'BarangID' => $this->barangID,
                        'Qty' => $this->Qty,
                        'Total' => $databrg->Harga*$this->Qty,
                    ]);
                    Mbarang::where('BarangID', $this->barangID)
                    ->update(['Jumlah'=> $databrg->Jumlah-$this->Qty]);
                    return redirect('/penjualan');
                    return redirect('/penjualan');
                  } else {
                    $qtydanTotal = DB::table('penjualan_barang')
                                ->select('Qty','Total')
                                ->where('BarangID', $this->barangID)
                                ->where('PenjualanID', NULL)
                                ->first();
                    Mbarang::where('BarangID', $this->barangID)
                    ->update(['Jumlah'=> $databrg->Jumlah-$this->Qty]);
                    penjualan_barang::where('BarangID', $this->barangID)
                    ->where('PenjualanID', NULL)
                    ->update(['Qty'=> $qtydanTotal->Qty+$this->Qty, 'Total' =>$qtydanTotal->Total+ ($this->Qty*$databrg->Harga)]);
                    return redirect('/penjualan');
                  }
        return redirect('/penjualan');
    }
    public function tambahQty($id){
      dd($id);
    }
    private function initializedProperties()
    {
        $this->barangID = null;
        $this->Qty = null;
    }

    public function caribarang()
    {
        $barang = Mbarang::all();
        return response()->json($barang);
    }

    public function autocomplete(Request $request)
    {
      $barang = Mbarang::select("NamaBarang")
                        ->where("NamaBarang","LIKE","%{$request->terms}%")
                        ->get();
                        return response()->json($barang);
    }
    public function savetransaksi(Request $request){
      Mpenjualan::create([
        'totalTransaksi' => $request->total,
        'jmlPembayaran' => $request->jmlpembayaran
      ]);
      $PenjualanID = DB::table('penjualan')
                    ->select(DB::raw('MAX(PenjualanID) as id'))
                    ->first();
      penjualan_barang::where('PenjualanID', NULL)
      ->update(['PenjualanID'=> $PenjualanID->id]);
      return redirect('/penjualan');
    }
}
