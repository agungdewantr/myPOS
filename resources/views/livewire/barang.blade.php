@section('namamenu','Kelola Barang')
<div class="row">
  <div class="col-lg-8 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Kelola Barang</h4>
      </div>
      <div class="card-body">
        @if ($message = Session::get('success'))
          <div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
        @endif
        {!! \DNS1D::getBarcodeHTML("4445645656", "I25+") !!}<br>
        {!! \DNS1D::getBarcodeHTML("454584685532212", "I25+") !!}<br>
        <img src="data:image/png;base64,{{\DNS1D::getBarcodeHTML("4445645659", "I25+")}}" alt="barcode" style="width: 80px;" />
        <img src="data:image/png;base64,{{\DNS2D::getBarcodePNG("4445645656", 'QRCODE')}}" alt="barcode" style="width: 80px;" />
        <table class="table table-sm" align="center">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Harga</th>
              <th scope="col">Barcode</th>
              <th scope="col">Tgl Kadaluarsa</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach($barang as $B)
              <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$B->NamaBarang}}</td>
                  <td>{{$B->Stok}}</td>
                  <td>Rp{{$B->Harga}}</td>
                  <td><img src="data:image/png;base64,{{\DNS2D::getBarcodePNG("4445645659", 'QRCODE')}}" alt="barcode" style="width: 80px;" /></td>
                  <td>{{$B->Kadaluarsa}}</td>
                  <td>
                      <div class="row">
                          <div class="col">
                              <form action="/barang/{{$B->BarangID}}/delete" method="POST">
                                  <a href="/barang/{{$B->BarangID}}/edit"><i class="far fa-edit"></i></a>
                                  @csrf
                                  @method('DELETE')
                                  <button class="button1" type="submit" style="border: none; background-color:rgba(255, 0, 0, 0); position: absolute; width:0.1px; outline:none;"><i class="d-inline fas fa-trash-alt" style="color: red;"></i></button>
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
  <div class="col-sm-4">
        @include('livewire.barang-create')
  </div>
</div>
