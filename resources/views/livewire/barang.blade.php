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
        <table class="table table-sm" align="center">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Stok</th>
              <th scope="col">Harga (Pcs)</th>
              <th scope="col">Barcode</th>
              <th scope="col">Profit</th>
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
                  <td>{!! \DNS1D::getBarcodeHTML($B->Kode, "I25+") !!}{{$B->Kode}}</td>
                  <td>{{$B->Profit*100}} %</td>
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
