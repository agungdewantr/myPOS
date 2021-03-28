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
            <label for="satuan">Satuan</label>
            <div class="row field_wrapper">
              <div class="form-group col-6">
                <input id="Satuan" type="text" class="form-control @error('Kode') is-invalid @enderror" placeholder="Nama Satuan" name="Satuan[]" value="{{ old('Kode') }}" autofocus>
                @error('Kodes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-4">
                <input id="Jumlah" type="number" class="form-control @error('Kode') is-invalid @enderror" placeholder="Jumlah" name="Jumlah[]" value="{{ old('Kode') }}" autofocus>
                @error('Kodes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-2">
                <a class="btn btn-success" href="javascript:void(0);" id="add_button" title="Add field">+</a>
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
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('#add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    // var fieldHTML = '<div class="form-group add"><div class="row">';
    // fieldHTML=fieldHTML + '<div class="col-md-6"><input class="form-control" placeholder="Bahasa Pemrograman" type="text" name="nama_bahasa[]" /></div>';
    // fieldHTML=fieldHTML + '<div class="col-md-2"><a href="javascript:void(0);" class="remove_button btn btn-danger">HAPUS</a></div>';
    // fieldHTML=fieldHTML + '</div></div>';
    var fieldHTML = '<div class="row ml-1 mr-1"><div class="form-group col-6"><input id="Satuan" type="text" class="form-control @error('Kode') is-invalid @enderror" placeholder="Nama Satuan" name="Satuan[]" value="{{ old('Satuan') }}" autofocus></div><div class="form-group col-4"><input id="Jumlah" type="number" class="form-control @error('Kode') is-invalid @enderror" placeholder="Jumlah" name="Jumlah[]" value="{{ old('Kode') }}" autofocus></div><div class="form-group col-2"><a href="javascript:void(0);" class="remove_button btn btn-danger">-</a></div></div>';
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('').parent('').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection
