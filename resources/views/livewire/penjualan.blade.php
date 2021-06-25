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
              <th scope="col">Qty</th>
              <th scope="col">Satuan</th>
              <th scope="col">Harga</th>
              <th scope="col">Diskon</th>
              <th scope="col">Total</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($penjualan_barang as $pj)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$pj->NamaBarang}}</td>
              <td>{{$pj->Qty}}</td>
              <td>{{$pj->Satuan}}</td>
              <td>{{$pj->Harga}}</td>
              <td>
                @if($pj->Diskon == null)
                -
                @else
                {{$pj->Diskon*100}}%
                @endif
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
        @if ($message = Session::get('error'))
        <button id="tombolku" style="display:none;" class="but">Open Modal</button>
        <div id="myModal" class="penghalang">
          <div class="modal-content">
            <span id="tutup">&times;</span>
            <h4 class="text-center text-danger">Error !</h4>
            <p class="text-center">{{$message}}</p>
            <a href="" class="badge badge-danger">Kembali</a>
          </div>
        </div>
        @endif
        <div class="row">
          <form action="/penjualan/keranjang" method="post">
            @csrf
            <div class="form-row">
              <div class="form-group">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="input-field col-12">
                        <label for="jenis">Nama Barang</label>
                        <input type="text" id="NamaBarang" name="NamaBarang" value="{{old('NamaBarang')}}" class="form-control @error('NamaBarang') is-invalid @enderror" autocomplete="off">
                        <input type="hidden" id="BarangID" name="BarangID">
                        @error('jenis')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col-12">
                        <label for="Qty">Qty</label>
                        <div class="input-group mb-3">
                          <input type="number" class="form-control @error('Qty') is-invalid @enderror" id="Qty" name="Qty" aria-describedby="basic-addon1">
                          <div class="input-group-prepend">
                            <select class="form-control @error('Satuan') is-invalid @enderror" placeholder="pilih satuan" name="SatuanID" id="SatuanID">

                            </select>
                            @error('Qty')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
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
        @if ($message = Session::get('pembayaran'))
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('pembayaransukses'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <form name="calcu" method="POST" action="/penjualan">
          @csrf
          <input type="number" class="form-control" id="rupiah1" placeholder="Masukkan Nominal Pembayaran" name="inppembayaran" value="" autofocus />
          <div class="col-lg-12 text-right">
            <div class="invoice-detail-item">
              <div class="invoice-detail-name">Total Pembelian</div>
              <div class="invoice-detail-value" id="total">
                <h3>Rp.{{ number_format($totalpesanan->totalPesanan,0,',','.') }}</h3>
              </div>
              <input type="hidden" readonly="" id="totalHidden" name="totalHidden" value="{{$totalpesanan->totalPesanan}}" style="font-size:20px; border:none; text-align: right;font-style:bold;width:205px;">
            </div>
            <div class="invoice-detail-item">
              <div class="invoice-detail-name">Nominal Pembayaran </div>
              <div class="invoice-detail-value">
                <h3 id="rupiahh"></h3>
              </div>
            </div>
            <hr class="mt-2 mb-2">
            <div class="invoice-detail-item">
              <div class="invoice-detail-name">Kembalian</div>
              <div class="invoice-detail-value invoice-detail-value-lg">
                <h3 id="kembalian"></h3>
              </div>
              <input type="hidden" readonly="" id="inpkembalian" name="inpkembalian" value="">
            </div>
            <button type="submit" class="btn btn-primary" name="button" id="save">Save</button>
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
      url: '{!!URL::to('caribarangjual')!!}',
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
<script>
  $(document).ready(function() {
    $('input#Qty').keyup(function() {
      let id = $("#BarangID").val();
      $('#SatuanID').empty();
      $('#SatuanID').append(`<option value="" disable selected>Processing....</option>`);
      $.ajax({
        type: 'GET',
        url: 'ambilsatuan/' + id,
        success: function(response) {
          console.log(response);
          var response = JSON.parse(response);
          console.log(response);
          $('#SatuanID').empty();
          $('#SatuanID').append('<option value="" disable selected>Pilih Satuan</option>');
          response.forEach(element => {
            // $('#SatuanID').append(`<option value="" disable selected>${element['Satuan']}</option>`);
            console.log(element['Satuan']);
            $('#SatuanID').append(`<option value="${element['Satuan']}">${element['Satuan']}</option>`);
          });
        }
      });
    });
  });
</script>
<!-- <script>
$(document).ready(function(){
  $('input#rupiah1').keyup(function(){
    let bayar = parseInt($("rupiah1").val());
    let total = parseInt($("#totalHidden").val());
    if(bayar < total) {
      $('button#save').attr("disabled", true);
    }
  });
});
</script> -->
@endsection