<?php

namespace App\Http\Livewire;

use App\Models\Mbarang;
use Livewire\Component;

class Barang extends Component
{
    public function render()
    {
        $barang = Mbarang::all();
        return view('livewire.barang', compact('barang'));
    }
}
