<div class="row">
  <div class="col-5">
    <div class="row">
      <div class="card">
        <div class="card-body">
          <h5>Transaksi Penjualan</h5>
          <form name="tambah" wire:submit.prevent="save" onsubmit="return validateForm()">
            <div class="row">
              <div class="col-8">
                <select class="form-control" wire:model="barangID" id="exampleFormControlSelect1">
                  <option value="">Pilih</option>
                  @foreach($barang as $brg)
                  <option value="{{$brg->BarangID}}"><button type="submit" wire:click="save()" name="button">{{$brg->NamaBarang}}</button></option>
                  @endforeach
                </select>
              </div>
              <div class="col-4">
                <input type="Number" wire:model="Qty" class="form-control" name="" placeholder="Tambah Qty">
              </div>
            </div>
            <div class="col-12 mt-2">
              <button class="col-12 btn btn-primary" id="btn" style="background-color: #9e7cf4; border:none;" style="border:none;"><i class="fas fa-cart-plus" style="margin-right=5px;"></i>
                <p class="d-inline">Masukkan Keranjang</p>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card">
        <div class="card-body">
          <form name="calcu" method="POST" action="/penjualan">
            @csrf
            <table class="table table-sm col-12" bgcolor="#fc8d8e">
              <tr border="0">
                <td border="0"><b>Total Harga</b></td>
                <td>:</td>
                <td>
                  <div class="form-group">
                    <input style="margin-bottom: -20px;background-color:#fc8d8e;color:white;border:none;" type="text" value="{{$totalpesanan->totalPesanan}}" name="total" readonly="" class="form-control" id="total" onFocus="startCalc();" onBlur="stopCalc();">
                  </div>
                </td>
              </tr>
              <tr border="0">
                <td><b>Bayar</b></td>
                <td>:</td>
                <td>
                  <div class="form-group">
                    <input style="margin-bottom: -20px;background-color:#fc8d8e;color:white;border:none;font-size:15px;" type="number" class="form-control" id="jmlpembayaran" name="jmlpembayaran" placeholder="Masukkan jumlah pembayaran.." onFocus="startCalc();" onBlur="stopCalc();">
                  </div>
                </td>
              </tr>
              <tr border="0">
                <td><b>Kembalian</b></td>
                <td>:</td>
                <td>
                  <div class="form-group">
                    <input style="margin-bottom: -20px;background-color:#fc8d8e;color:white;border:none;" type="text" readonly="" class="form-control" id="kembalian" name="kembalian" onFocus="startCalc();" onBlur="stopCalc();">
                  </div>
                </td>
              </tr>
            </table>
            <div class="row">
              <div class="col-12 mt-2">
                <button class="col-12 btn btn-primary" style="background-color: #9e7cf4; border:none;" type="submit" style="border:none;"><i class="fas fa-plus"></i>
                  <p class="d-inline">Save</p>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-7">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Keranjang Belanja</h4>
        <div class="table">
          <table class="table table-sm" style="max-height:400px;">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody style="">
              @foreach($penjualan_barang as $pj)
              <tr style="max-height:400px; overflow-y:auto;">
                <td>{{$loop->iteration}}</td>
                <td>{{$pj->NamaBarang}}</td>
                <td>{{$pj->Harga}}</td>
                <td>{{$pj->Qty}}</td>
                <td>{{$pj->Total}}</td>
                <td>
                  <div class="row">
                    <div class="col">
                      <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="button1" type="submit" style="border: none; background-color:rgba(255, 0, 0, 0);"><i class="fas fa-trash-alt" style="color: red;"></i></button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@section('script')
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script><script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#total, #jmlpembayaran").keyup(function() {
                var total  = $("#total").val();
                var jmlpembayaran = $("#jmlpembayaran").val();

                var kembalian = parseInt(jmlpembayaran) - parseInt(total);
                $("#total").val(total);
            });
        });
    </script> -->
<script>
  function startCalc() {
    interval = setInterval("calc()", 1);
  }

  function calc() {
    total = document.calcu.total.value;
    jmlpembayaran = document.calcu.jmlpembayaran.value;
    document.calcu.kembalian.value = jmlpembayaran - total;
  }

  function stopCalc() {
    clearInterval(interval);
  }
</script> <!-- Menghitung otomatis -->
@endsection