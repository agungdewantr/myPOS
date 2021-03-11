<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="col-3 card-icon bg-primary">
        <i class="fas fa-chart-line"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header mr-auto">
          <h4>Profit yang diterapkan</h4>
        </div>
        <div class="card-body">
          10 %
          <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
          <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="col-3 card-icon bg-primary">
        <i class="far fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header mr-auto">
          <h4>Penjualan Bulan ini</h4>
        </div>
        <div class="card-body">
          10 %
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="col-3 card-icon bg-primary">
        <i class="far fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header mr-auto">
          <h4>Pembelian bulan ini</h4>
        </div>
        <div class="card-body">
          10 %
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-lg-5">
    </div>
    <!-- aa -->
    <div class="col-lg-7 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Diskon</h4>
        </div>
        <div class="card-body">
          @if ($message = Session::get('success'))
            <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
            </div>
          @endif
          <a href="#" class="btn btn-primary">+ Tambah Diskon</a>
          <table class="table table-sm" align="center">
            <thead>
              <tr>
                <th scope="col" rowspan="2">No</th>
                <th scope="col">Awal Periode </th>
                <th scope="col">Akhir Periode</th>
                <th scope="col" rowspan="2">Detail</th>
                <th scope="col" rowspan="2">Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach($periode as $p)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$p->Awal}}</td>
                <td>{{$p->Akhir}}</td>
                <td><a href=""><i class="fas fa-info-circle"></i></a></td>
                <td>
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                                <a href=""><i class="far fa-edit"></i></a>
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
</div>
