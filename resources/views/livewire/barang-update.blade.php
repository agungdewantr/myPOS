
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Update Barang</h3>
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
            <form action="" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group" margin-top="-5px">
                    <label for="tambahbarang" style="font-size:12pt;">Nama Barang</label><br>
                    <input type="text" class="form-control" name="NamaBarang">
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="tambahbarang" style="font-size:12pt;">Jumlah</label><br>
                            <input type="number" class="form-control" wire:model="Stok">
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <input type="hidden" wire:model="barangID">
                            <label for="tambahbarang" style="font-size:12pt;">Harga</label><br>
                            <input type="number" class="form-control" wire:model="Harga">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tambahbarang" style="font-size:12pt;">Kadaluarsa</label><br>
                    <input type="date" class="form-control" name="Kadaluarsa">
                </div>
                <button style="background-color:#9e7cf4">Submit</button>
            </form>
        </div>
    </div>
</div>