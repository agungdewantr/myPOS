  <div class="card">
    <div class="card-header">
      <h4>Tambah Barang</h4>
    </div>
    <div class="card-body">
      <form method="POST" action="/barang" class="needs-validation">
            @csrf
            <div class="row">
              <div class="form-group col-12">
                <label for="NamaBarang">{{ __('Nama Barang') }}</label>
                <input id="NamaBarang" type="text" class="form-control @error('NamaBarang') is-invalid @enderror" name="NamaBarang" value="{{ old('NamaBarang') }}" autofocus>
                @error('NamaBarang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-5">
                <label for="Stok">{{ __('Stok') }}</label>
                <input id="Stok" type="number" class="form-control @error('Stok') is-invalid @enderror" name="Stok" value="{{ old('Stok') }}" autofocus>
                @error('Stok')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-7">
                <label for="Harga">{{ __('Harga') }}</label>
                <input id="Harga" type="number" class="form-control @error('Harga') is-invalid @enderror" name="Harga" value="{{ old('Harga') }}" autofocus>
                @error('Harga')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label for="Kadaluarsa">{{ __('Kadaluarsa') }}</label>
                <input id="Kadaluarsa" type="date" class="form-control @error('Kadaluarsa') is-invalid @enderror" name="Kadaluarsa" value="{{ old('Kadaluarsa') }}" autofocus>
                @error('Kadaluarsa')
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

@section('script')
<script>
    var i;
    for (i = 1; i <= 1; i++) {
        if (i == 1) {
            window.onload = function() {
                document.getElementById('btn').click();
                alert(i);
                setTimeout(function() {
                    location.reload();
                }, 1);
            }
        }
    }
    break;
</script>
@endsection
