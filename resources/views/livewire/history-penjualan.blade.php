@section('namamenu','History Transaksi')
<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tahun
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tanggal

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0]. ' ' . $pecahkan[0];
}
 ?>
 <div class="row">
	 <div class="col-lg-8 col-md-12 col-12 col-sm-12">
		 <div class="card">
			 <div class="card-body">
	 <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
		 <a href="/historypenjualan" class="btn btn-primary">History Penjualan</a>
		 <a href="/historypembelian" class="btn btn-outline-primary">History Pembelian</a>
	 </div>
 </div>
</div>
</div>
</div>
<div class="row">
  <div class="col-lg-8 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>History Penjualan</h4>
      </div>
      <div class="card-body">
        <table class="table table-sm" align="center">
          <thead align="center">
            <tr>
              <!-- <th scope="col">#</th> -->
              <th scope="col">No Transaksi</th>
              <th scope="col">tgl Transaksi</th>
              <th scope="col">Total Transaksi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach($penjualan as $p)
              <tr align="center">
                  <!-- <td>{{$loop->iteration}}</td> -->
                  <td>{{$p->PenjualanID}}</td>
                  <td>{{date('d/m/Y H:i:s', strtotime($p->created_at))}}</td>
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
