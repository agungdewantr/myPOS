<?php

namespace App\Http\Livewire;
use App\Models\Mbarang;
use App\Models\diskon;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Barang extends Component
{

    public function mount()
    {
        $this->initializedProperties();
    }

    public function render()
    {
        $barang = Mbarang::all();
        return view('livewire.barang', compact('barang'));
    }

    private function initializedProperties()
    {
        // $this->barangID;
        // $this->NamaBarang;
        // $this->Harga;
        // $this->Satuan1;
        // $this->Satuan2;
        // $this->Profit;
    }

    public function CreateBarang(Request $request)
    {
        $request->validate([
            'NamaBarang'    => 'required'
        ]);
        Mbarang::create([
            'NamaBarang'     => $request->NamaBarang
        ]);
        return redirect('/barang');
    }

    public function edit($id)
    {
        $barang = Mbarang::all();
        $EditBarang = Mbarang::where('BarangID', $id)->first();
        return view('livewire.barang-update', compact('barang', 'EditBarang'))
        ->extends('layouts.barang')->section('content');
    }

    public function update(Request $request)
    {
        $request->validate([
            'NamaBarang'    => 'required',
            'Stok'          => 'required',
            'Harga'         => 'required',
            'Kadaluarsa'    => 'required'
        ]);

        $EditBarang = Mbarang::where('BarangID', $request->BarangID)->first();
        Mbarang::where('BarangID', $request->BarangID)
          ->update([
            'NamaBarang'   => $request->NamaBarang,
            'Stok'         => $EditBarang->Stok +  $request->Stok,
            'Harga'        => $request->Harga,
            'Kadaluarsa'   => $request->Kadaluarsa
          ]);
        return redirect('/barang');
    }

    public function delete($id)
    {
        Mbarang::where('BarangID', $id)->delete();
        return redirect('/barang');
    }

    public function detaildiskon($id)
    {
      $diskon = diskon::where('DiskonID', $id)->first();
      $barangDiskon = Mbarang::where('DiskonID',$id)->get();
      return view('livewire.diskon-detail',compact('barangDiskon','diskon'));
    }

    public function adddiskontobarang(Request $request){
      $request->validate([
          'NamaBarang'    => 'required'
      ]);
      Mbarang::where('BarangID', $request->BarangID)
        ->update([
          'DiskonID'   => $request->DiskonID
        ]);
      return redirect("/diskon/$request->DiskonID/detail");
    }

    public function deletebarangdiskon(Request $request, $id){
      Mbarang::where('BarangID', $id)
        ->update([
          'DiskonID'   => NULL
        ]);
      return redirect("/diskon/$request->DiskonID/detail");
    }
}
