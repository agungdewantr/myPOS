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
                  <td>{{$p->created_at}}</td>
                  <td>Rp.{{ number_format($p->TotalPenjualan,0,',','.') }}</td>
                  <td><a href="/historypenjualan/{{$p->PenjualanID}}/detail"><i class="fas fa-info-circle"></i></a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
