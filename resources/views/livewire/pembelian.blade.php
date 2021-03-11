<div class="row">
  <div class="col-lg-7 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Pesan Barang</h4>
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
              <th scope="col">Total</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pembelian_barang as $pb)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$pb->NamaBarang}}</td>
              <td>{{$pb->Harga}}</td>
              <td>{{$pb->Qty}}</td>
              <td>{{$pb->Total}}</td>
              <td>
                <div class="row">
                  <div class="col">
                    <form action="/pembelian/{{$pb->pbbID}}/hapus" method="POST">
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
          <form action="/pembelian/keranjang" method="post">
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