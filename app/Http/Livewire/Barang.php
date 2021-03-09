<?php

namespace App\Http\Livewire;

use App\Models\Mbarang;
use Livewire\Component;

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

    public function save()
    {
        $this->validate([
            'NamaBarang'    => ['required'],
            'Stok'          => ['required'],
            'Harga'         => ['required'],
            'Kadaluarsa'    => ['required']
          ]);
        Mbarang::create([
            'NamaBarang'    => $this->NamaBarang,
            'Stok'        => $this->Stok,
            'Harga'         => $this->Harga,
            'Kadaluarsa'    => $this->Kadaluarsa
        ]);
        return redirect('/barang');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $barang = Mbarang::where('BarangID', $id)->first();
        $this->NamaBarang = $barang->NamaBarang;
        $this->barangID = $id;
        $this->Stok = '';
        $this->Harga = $barang->Harga;
        $this->Kadaluarsa = $barang->Kadaluarsa;
    }

    public function update()
    {
        $barang = Mbarang::where('BarangID', $this->barangID)->first();
        Mbarang::where('BarangID', $this->barangID)
            ->update([
                'NamaBarang' => $this->NamaBarang,
                'Stok' =>  $this->Stok + $barang->Stok,
                'Harga' => $this->Harga,
                'Kadaluarsa' => $this->Kadaluarsa
            ]);
        return redirect('/barang');
    }

    public function delete($id)
    {
        Mbarang::where('BarangID', $id)->delete();
    }
}
