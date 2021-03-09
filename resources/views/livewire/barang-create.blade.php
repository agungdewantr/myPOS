<div class="card">
    <div class="card-body">
        <h3 class="card-title">Tambah Barang</h3>
        <div class="card-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <br>

            <div class="form-group" margin-top="-5px">
                <label for="tambahbarang" style="font-size:12pt;">Nama Barang</label><br>
                <input type="text" class="form-control" name="NamaBarang" wire:model="NamaBarang">
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <label for="tambahbarang" style="font-size:12pt;">Jumlah</label><br>
                        <input type="number" class="form-control" wire:model="Stok" name="Jumlah">
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group">
                        <label for="tambahbarang" style="font-size:12pt;">Harga</label><br>
                        <input type="number" class="form-control" wire:model="Harga" name="Harga">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tambahbarang" style="font-size:12pt;">Kadaluarsa</label><br>
                <input type="date" class="form-control" name="Kadaluarsa" wire:model="Kadaluarsa">
            </div>
            <button style="background-color:#9e7cf4" class="btn" id="btn" wire:click.prevent="save()">Submit</button>
        </div>
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