<?php

namespace App\Http\Livewire;
use App\Models\Penjualan;
use Livewire\Component;

class HistoryPenjualan extends Component
{
    public function render()
    {
        $penjualan = Penjualan::all();
        return view('livewire.history-penjualan', compact('penjualan'));
    }
}
