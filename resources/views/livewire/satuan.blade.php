@section('namamenu','Satuan Barang')
<div class="row">
  <div class="col-lg-7 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Daftar Satuan Barang</h4>
      </div>
      <div class="card-body">
        @if ($message = Session::get('success'))
          <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
        @endif
        <table class="table table-sm">
          <thead align="center">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Satuan</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($satuan as $s)
            <tr align="center">
              <td>{{$loop->iteration}}</td>
              <td>{{$s->Satuan}}</td>
              <td>{{$s->Jumlah}}</td>
              <td>
                <div class="row">
                  <div class="col">
                    <form action="/satuan/{{$s->SatuanID}}/hapus" method="POST">
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
        <h4>Tambah Satuan</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <form action="" method="post">
            @csrf
            <div class="form-row">
              <div class="form-group">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="input-field col-6">
                        <label for="Satuan">Satuan</label>
                        <input type="text" id="Satuan" name="Satuan" value="{{old('Satuan')}}" class="form-control @error('Satuan') is-invalid @enderror" autocomplete="off">
                        @error('Satuan')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="input-field col-6">
                        <label for="Jumlah">Jumlah</label>
                        <input type="number" id="Jumlah" name="Jumlah" value="{{old('Jumlah')}}" class="form-control @error('Jumlah') is-invalid @enderror" autocomplete="off">
                        @error('Jumlah')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <button class="btn btn-primary mt-2" type="submit">Submit</button>
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
