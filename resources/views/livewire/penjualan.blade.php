@section('namamenu','Transaksi Penjualan')
<div class="row">
  <div class="col-lg-7 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Keranjang Belanja</h4>
      </div>
      <div class="card-body">
        @if ($message = Session::get('success'))
          <div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
        @endif
        <table class="table table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga</th>
              <th scope="col">Qty</th>
              <th scope="col">Disc %</th>
              <th scope="col">Total</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($penjualan_barang as $pj)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$pj->NamaBarang}}</td>
              <td>{{$pj->Harga+$pj->Harga*$profit->Profit}}</td>
              <td>{{$pj->Qty}}</td>
              <td>

              </td>
              <td>{{$pj->Total}}</td>
              <td>
                <div class="row">
                  <div class="col">
                    <form action="/penjualan/{{$pj->pjbID}}/hapus" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="button1" type="submit" style="border: none; background-color:rgba(255, 0, 0, 0);"><i class="fas fa-trash-alt" style="color: red;"></i></button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
    <div class="col-lg-5 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Tambah Transaksi</h4>
        </div>
        <div class="card-body">
          <div class="row">
          <form action="/penjualan/keranjang" method="post">
            @csrf
            <div class="form-row">
              <div class="form-group">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="input-field col-8">
                        <label for="jenis">Nama Barang</label>
                        <input type="text" id="NamaBarang" name="NamaBarang" value="{{old('NamaBarang')}}" class="form-control @error('NamaBarang') is-invalid @enderror" autocomplete="off">
                        @error('jenis')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="input-field col-4">
                        <label for="jenis">Qty</label>
                        <input type="number" id="Qty" name="Qty" value="{{old('Qty')}}" class="form-control @error('Qty') is-invalid @enderror" autocomplete="off">
                        <input type="hidden" name="BarangID" value="" id="BarangID">
                        @error('jenis')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-7"></div>
  <div class="col-lg-5">
    <div class="card">
      <div class="card-header">
        <h4>Proses Pembayaran</h4>
      </div>
        <div class="card-body">
          <form name="calcu" method="POST" action="/penjualan">
          @csrf
          <input type="number" class="form-control" id="rupiah1" placeholder="Masukkan Nominal Pembayaran" name="inppembayaran" value="" autofocus />
          <div class="col-lg-12 text-right">
            <div class="invoice-detail-item">
              <div class="invoice-detail-name">Total Pembelian</div>
              <div class="invoice-detail-value" id="total"><h3>Rp.{{ number_format($totalpesanan->totalPesanan,2,',','.') }}</h3></div>
              <input type="hidden" readonly="" id="totalHidden" name="totalHidden" value="{{$totalpesanan->totalPesanan}}"  style="font-size:20px; border:none; text-align: right;font-style:bold;width:205px;" >
            </div>
            <div class="invoice-detail-item">
              <div class="invoice-detail-name">Nominal Pembayaran </div>
              <div class="invoice-detail-value" ><h3 id="rupiahh"></h3></div>
            </div>
            <hr class="mt-2 mb-2">
            <div class="invoice-detail-item">
              <div class="invoice-detail-name">Kembalian</div>
              <div class="invoice-detail-value invoice-detail-value-lg"><h3 id="kembalian"></h3></div>
                <input type="hidden" readonly=""  id="inpkembalian" name="inpkembalian" value="">
            </div>
            <button type="submit" class="btn btn-primary" name="button">Save</button>
          </div>
          </form>
        </div>
    </div>
  </div>
</div>

@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      type: 'get',
      url: '{!!URL::to('caribarang')!!}',
      success: function(response) {
        console.log(response);
        //material css
        //convert array to object
        var hargaArray = response;
        var dataharga = {};
        var dataharga2 = {};
        for (var i = 0; i < hargaArray.length; i++) {
          dataharga[hargaArray[i].NamaBarang] = null;
          dataharga2[hargaArray[i].NamaBarang] = hargaArray[i];
        }

        // console.log("dataharga2");
        // console.log(dataharga2);

        $('input#NamaBarang').autocomplete({
          data: dataharga,
          onAutocomplete: function(reqdata) {
            console.log(reqdata);
            $('#BarangID').val(dataharga2[reqdata]['BarangID']);
          }
        });
        //end
      }
    })
  });
  $(document).ready(function() {
    $("#totalHidden, #rupiah1, #rupiah, #kembalian, #inpkembalian").keyup(function() {
      var total = $("#totalHidden").val();
      var jmlpembayaran = $("#rupiah1").val();
      var kembalian = parseInt(jmlpembayaran) - parseInt(total);
      $("#inpkembalian").val(kembalian);
      var tampilkembalian = kembalian.toString();
      document.getElementById("rupiahh").innerHTML = formatRupiah(jmlpembayaran, "Rp.");
      document.getElementById("kembalian").innerHTML = formatRupiah(tampilkembalian, "Rp.");
    });
  });

// var rupiah = document.getElementById("rupiahh").innerHTML;

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

</script>
@endsection
