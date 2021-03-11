<?php

namespace App\Http\Livewire;
use App\Models\Mbarang;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Barang extends Component
{
    public $NamaBarang;
    public $barangID;
    public $Stok;
    public $Harga;
    public $Kadaluarsa;
    public $updateMode = false;

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
        $this->NamaBarang;
        $this->Stok;
        $this->Harga;
        $this->Kadaluarsa;
        $this->barangID;
    }

    public function CreateBarang(Request $request)
    {
        $request->validate([
            'NamaBarang'    => 'required',
            'Stok'          => 'required',
            'Harga'         => 'required',
            'Kadaluarsa'    => 'required'
        ]);
        Mbarang::create([
            'NamaBarang'     => $request->NamaBarang,
            'Stok'           => $request->Stok,
            'Harga'          => $request->Harga,
            'Kadaluarsa'     => $request->Kadaluarsa
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
}
