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
  <div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Diskon</h4>
      </div>
      <div class="card-body">
        <div class="row">
        <div class="col-6">
          <ul class="nav nav-tabs justify-content-center" id="myTab6" role="tablist">
            <li class="nav-item">
              <a class="nav-link active text-center" id="home-tab6" data-toggle="tab" href="#home6" role="tab" aria-controls="home" aria-selected="true">
                <span><i class="fas fa-home"></i></span>Kelola Periode</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" id="profile-tab6" data-toggle="tab" href="#profile6" role="tab" aria-controls="profile" aria-selected="false">
                <span><i class="fas fa-id-card"></i></span>Kelola Diskon</a>
            </li>
          </ul>
          <div class="tab-content tab-bordered" id="myTabContent6">
            <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab6">
              <form method="POST" action="/register" class="needs-validation" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="name">{{ __('Awal Periode') }}</label>
                        <input id="Awal" type="date" class="form-control @error('name') is-invalid @enderror" name="Awal" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="no_telp">{{ __('Akhir Periode') }}</label>
                        <input id="Akhir" type="date" class="form-control @error('no_telp') is-invalid @enderror" name="Akhir" value="{{ old('no_telp') }}" autocomplete="no_telp" autofocus>
                        @error('no_telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('Save') }}
                      </button>
                    </div>
                  </form>
            </div>
            <div class="tab-pane fade" id="profile6" role="tabpanel" aria-labelledby="profile-tab6">
              <form method="POST" action="/register" class="needs-validation" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="name">{{ __('Periode') }}</label>
                        <select class="form-control">
                          <option value="">--Pilih--</option>
                          @foreach($periode as $p)
                          <option value="">{{$p->Awal}}||{{$p->Akhir}}</option>
                          @endforeach
                        </select>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <input id="id_role" type="hidden" class="form-control" name="id_role" value="4">
                      <div class="form-group col-6">
                        <label for="no_telp">{{ __('Besar Diskon (%)') }}</label>
                        <input id="Akhir" type="number" class="form-control @error('no_telp') is-invalid @enderror" name="diskon" value="{{ old('no_telp') }}" autocomplete="no_telp" autofocus>
                        @error('no_telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('Save') }}
                      </button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
        <div class="col-6">
          <h6>Daftar Diskon Perperiode</h6><br>
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
  </div>
</div>
