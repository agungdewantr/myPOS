<?php

namespace App\Http\Livewire;

use App\Models\periode;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $periode = periode::all();
        return view('livewire.home', compact('periode'));
    }
}
