<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Msatuan;
use Livewire\Component;

class Satuan extends Component
{
    public function render()
    {
        $satuan = Msatuan::all();
        return view('livewire.satuan', compact('satuan'));
    }
}
