<?php

namespace App\Http\Livewire;
use App\Models\diskon;
use Livewire\Component;
use Illuminate\Http\Request;

class Home extends Component
{
    public function render()
    {
        $diskon = diskon::all();
        return view('livewire.home', compact('diskon'));
    }

    public function savediskon(Request $request)
    {
      $request->validate([
          'Diskon'    => 'required',
          'Awal'      => 'required',
          'Akhir'     => 'required'
      ]);

      diskon::create([
        'Awal'     => $request->Awal,
        'Akhir'           => $request->Akhir,
        'Diskon'           => $request->Diskon/100
      ]);
      return redirect()->route('Home');
    }

    public function editdiskon($id) {
      $diskonEdit = diskon::where('DiskonID',$id)->first();
      $diskon = diskon::all();
      return view('livewire.diskon-update', compact('diskon','diskonEdit'));
    }

    public function updatediskon(Request $request, $id) {
      diskon::where('DiskonID',$id)
      ->update([
        'Awal'   => $request->Awal,
        'Akhir'         => $request->Akhir,
        'Diskon'        => $request->Diskon/100
      ]);
      return redirect()->route('Home')->with(['success' => 'Diskon Berhasil Diedit']);
    }

    public function hapusdiskon($id) {
       diskon::where('DiskonID',$id)->delete();
      return redirect()->route('Home')->with(['success' => 'Diskon Berhasil Dihapus']);
    }

    public function saveProfit(Request $request){
      $request->validate([
          'Profit'    => 'required'
      ]);

      Mprofit::create([
        'Profit'  => $request->Profit/100
      ]);
      return redirect()->route('Home');
    }

    public function updateProfit(Request $request, $id) {
      Mprofit::where('ProfitID',$id)
      ->update([
        'Profit'   => $request->Profit/100
      ]);
      return redirect()->route('Home')->with(['profit' => 'Profit Berhasil Diedit']);
}
}
