<?php

// namespace App\Http\Livewire;
//
// use App\Models\Mbarang;
// use Livewire\Component;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
//
// class BarangUpdate extends Component
// {
//
//     public $updateMode = false;
//     public function render()
//     {
//         $barang = Mbarang::all();
//         return view('livewire.barang', compact('barang'));
//     }
//
//     public function edit($id)
//     {
//         $this->updateMode = true;
//         $updateMode = $this->updateMode;
//         $barang = Mbarang::all();
//         $EditBarang = Mbarang::where('BarangID', $id)->first();
//         return view('livewire.barang', compact('barang', 'EditBarang', 'updateMode'));
//     }
// }
