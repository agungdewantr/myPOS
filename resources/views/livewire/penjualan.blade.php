                    <div class="row">
                      <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                        <div class="card">
                          <div class="card-header">
                            <h4>Keranjang Belanja</h4>
                          </div>
                          <div class="card-body">
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
                                @foreach($penjualan_barang as $pj)
                                <tr>
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
                              <div class="row">
                                <div class="col-lg-4">

                                </div>
                                <form name="calcu" method="POST" action="/penjualan">
                                  @csrf
                                <div class="col-lg-8 text-right">
                                  <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total Pembelian</div>
                                    <div class="invoice-detail-value"><input type="number" readonly="" id="total" name="total" value="{{$totalpesanan->totalPesanan}}"  style="font-size:20px; border:none; text-align: right;font-style:bold;width:205px;" onFocus="startCalc();" onBlur="stopCalc();"></div>
                                  </div>
                                  <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Nominal Pembayaran </div>
                                    <div class="invoice-detail-value"><input type="number" id="jmlpembayaran" name="jmlpembayaran" value="" style="font-size:20px;text-align: right; border:none; decoration: none; font-style:bold;width:205px;" onFocus="startCalc();" onBlur="stopCalc();"> </div>
                                  </div>
                                  <hr class="mt-2 mb-2">
                                  <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Kembalian</div>
                                    <div class="invoice-detail-value invoice-detail-value-lg"><input type="number" readonly=""  id="kembalian" name="kembalian" value="" style="font-size:20px;text-align: right; border:none; decoration: none; font-style:bold;width:205px;" onFocus="startCalc();" onBlur="stopCalc();"></div>
                                  </div>
                                </div>
                                <button type="button" class="btn btn-primary" name="button">Save</button>
                              </form>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-5">
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

                            console.log("dataharga2");
                            console.log(dataharga2);

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
                        $("#jumlah, #hargajual").keyup(function() {
                          var harga = $("#hargajual").val();
                          var jumlah = $("#jumlah").val();

                          var totalharga = parseInt(harga) * parseInt(jumlah);
                          $("#totalHarga").val(totalharga);
                        });
                      });
                    </script>
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
