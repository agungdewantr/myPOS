@section('namamenu','Dashboard')
@if ($message = Session::get('profit'))
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="alert alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
</div>
</div>
@endif
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="col-3 card-icon bg-primary">
        <i class="fas fa-list"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header mr-auto">
          <h4>Banyak Jenis Barang</h4>
        </div>
        <div class="card-body">
      {{$banyakbarang}}
      </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="col-3 card-icon bg-primary">
        <i class="fas fa-money-bill-wave-alt"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header mr-auto">
          <h4>Penjualan Bulan ini</h4>
        </div>
        <div class="card-body">
          Rp.{{ number_format($totalpenjualan,0,',','.') }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="col-3 card-icon bg-primary">
        <i class="fas fa-cart-arrow-down"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header mr-auto">
          <h4>Pembelian bulan ini</h4>
        </div>
        <div class="card-body">
          Rp.{{ number_format($totalpembelian,0,',','.') }}
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-7 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Daftar Diskon</h4>
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
              <th scope="col" rowspan="2">No</th>
              <th scope="col">Awal Periode </th>
              <th scope="col">Akhir Periode</th>
              <th scope="col">Besar Diskon</th>
              <th scope="col" rowspan="2">Detail</th>
              <th scope="col" rowspan="2">Aksi</th>
            </tr>
          </thead>
          <tbody>
          @foreach($diskon as $d)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$d->Awal}}</td>
              <td>{{$d->Akhir}}</td>
              <td>{{$d->Diskon*100}}</td>
              <td><a href="/diskon/{{$d->DiskonID}}/detail"><i class="fas fa-info-circle"></i></a></td>
              <td>
                  <div class="row">
                      <div class="col">
                              <form action="/diskon/{{$d->DiskonID}}/hapus" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/diskon/{{$d->DiskonID}}/edit" id="tombolku" class="but"><i class="far fa-edit"></i></a>
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
  <div class="col-lg-5 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Tambah Diskon</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="/diskon" class="needs-validation">
              @csrf
              <div class="row">
                <div class="form-group col-6">
                  <label for="Awal">{{ __('Awal Periode') }}</label>
                  <input id="Awal" type="date" class="form-control @error('Awal') is-invalid @enderror" name="Awal" value="{{ old('Awal') }}" autofocus>
                  @error('Awal')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-6">
                  <label for="Akhir">{{ __('Akhir Periode') }}</label>
                  <input id="Akhir" type="date" class="form-control @error('Akhir') is-invalid @enderror" name="Akhir" value="{{ old('Akhir') }}" autofocus>
                  @error('Akhir')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12">
                  <label for="Diskon">{{ __('Besar Diskon (%)') }}</label>
                  <input id="Diskon" type="number" class="form-control @error('Diskon') is-invalid @enderror" name="Diskon" value="{{ old('Diskon') }}" autofocus>
                  @error('Diskon')
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
</div>
