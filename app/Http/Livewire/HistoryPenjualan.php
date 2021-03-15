<?php

namespace App\Http\Livewire;
use App\Models\Mpenjualan;
use Livewire\Component;

class HistoryPenjualan extends Component
{
    public function render()
    {
        $penjualan = Mpenjualan::all();
        return view('livewire.history-penjualan', compact('penjualan'));
    }
}
