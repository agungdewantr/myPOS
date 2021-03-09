<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Kelola Barang</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Tgl Kadaluarsa</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barang as $B)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$B->NamaBarang}}</td>
                            <td>{{$B->Stok}}</td>
                            <td>Rp{{$B->Harga}}</td>
                            <td>{{$B->Kadaluarsa}}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <form action="" method="POST">
                                            <a href="/barang/{{$B->BarangID}}/edit"><i class="far fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="button1" type="submit" style="border: none; background-color:rgba(255, 0, 0, 0); position: absolute; width:0.1px; outline:none;"><i class="d-inline fas fa-trash-alt" style="color: red;"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        @if(!$updateMode)
        @include('livewire.barang-create')
        @else
        @include('livewire.barang-update')
        @endif
    </div>
</div>