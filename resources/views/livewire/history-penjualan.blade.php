@section('namamenu','History Penjualan')
<div class="row">
  <div class="col-lg-8 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Kelola Barang</h4>
      </div>
      <div class="card-body">
        <table class="table table-sm" align="center">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">tgl Transaksi</th>
              <th scope="col">Total Transaksi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach($penjualan as $p)
              <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$p->create_at}}</td>
                  <td>{{$p->TotalPenjualan}}</td>
                  <td><a href="/historypenjualan/{{$p->PenjualanID}}/detail"><i class="fas fa-info-circle"></i></a></td>
                  <!-- <td>
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
                  </td> -->
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
