  <div class="card">
    <div class="card-header">
      <h4>Tambah Barang</h4>
    </div>
    <div class="card-body">
      <form method="POST" action="/barang" class="needs-validation">
            @csrf
            <div class="row">
              <div class="form-group col-8">
                <label for="NamaBarang">{{ __('Nama Barang') }}</label>
                <input id="NamaBarang" type="text" class="form-control @error('NamaBarang') is-invalid @enderror" name="NamaBarang" value="{{ old('NamaBarang') }}" autofocus autocomplete="off">
                @error('NamaBarang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-4">
                <label for="Profit">{{ __('Profit (%)') }}</label>
                <input id="Profit" type="number" class="form-control @error('Profit') is-invalid @enderror" name="Profit" value="{{ old('Profit') }}" autofocus autofocus autocomplete="off">
                @error('Profit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label for="Kode">{{ __('Kode Barang') }}</label>
                <input id="Kode" type="number" class="form-control @error('Kode') is-invalid @enderror" min=0 max=9999999999 name="Kode" value="{{ old('Kode') }}" autofocus>
                @error('Kodes')
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
