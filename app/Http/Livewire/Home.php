<?php

namespace App\Http\Livewire;
use App\Models\periode;
use App\Models\diskon;
use Livewire\Component;
use Illuminate\Http\Request;

class Home extends Component
{
    public function render()
    {
        $periode = periode::all();
        return view('livewire.home', compact('periode'));
    }

    public function saveperiode(Request $request)
    {
      $request->validate([
          'Awal'    => 'required',
          'Akhir'          => 'required'
      ]);

      periode::create([
          'Awal'     => $request->Awal,
          'Akhir'           => $request->Akhir
      ]);
      return redirect()->route('Home');
    }

    public function savediskon(Request $request)
    {
      $request->validate([
          'PeriodeID'    => 'required',
          'Diskon'          => 'required'
      ]);

      diskon::create([
          'PeriodeID'     => $request->PeriodeID,
          'Diskon'           => $request->Diskon
      ]);
      return redirect()->route('Home');
    }
}
