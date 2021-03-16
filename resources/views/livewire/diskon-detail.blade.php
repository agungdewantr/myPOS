<!DOCTYPE html>
<!-- <html lang="en"> -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="robots" content="noindex,nofollow">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail Diskon</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{!! asset('assets1/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets1/css/components.css') !!}">
    @livewireStyles
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{!! asset('assets1/img/avatar/avatar-1.png') !!}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{Auth::user()->name}}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a href="/profile" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                          </a>
                          <div class="dropdown-divider"></div>
                          <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item has-icon text-danger" style="outline:none;"><i class="fas fa-sign-out-alt"></i><h6 class="small">Logout</h6></button>
                          </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/">myPOS</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/">St</a>
                    </div>
                    <ul class="sidebar-menu">
                      <li><a class="nav-link" href="/"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                      <li><a class="nav-link" href="/penjualan"><i class="fas fa-money-bill-wave-alt"></i> <span>Penjualan</span></a></li>
                      <li><a class="nav-link" href="/pembelian"><i class="fas fa-cart-arrow-down"></i> <span>Pembelian</span></a></li>
                      <li><a class="nav-link" href="/barang"><i class="fas fa-database"></i> <span>Barang</span></a></li>
                      <li><a class="nav-link" href="/historypenjualan"><i class="fas fa-history"></i> <span>Histori Transaksi</span></a></li>
                      <li><a class="nav-link" href="/satuan"><i class=""></i> <span>Satuan</span></a></li>
                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Detail Diskon</h1>
                    </div>
                    <div class="row">
                      <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                        <div class="card">
                          <div class="card-header">
                            <h4>Daftar barang terdiskon</h4>
                          </div>
                          <div class="card-body">
                            <p>Awal Periode Diskon : {{$diskon->Awal}} AKhir Periode Diskon : {{$diskon->Akhir}}</p>
                              <div class="card-body">
                                <ul class="list-group">
                                  @foreach($barangDiskon as $bd)
                                  <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$bd->NamaBarang}}
                                    <span class="">
                                      <form action="/diskon/{{$bd->BarangID}}/deletebarangdiskon" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="DiskonID" value="{{$diskon->DiskonID}}">
                                      <button class="button1" type="submit" style="border: none; background-color:rgba(255, 0, 0, 0); width:0.1px; outline:none;"><i class="d-inline fas fa-trash-alt" style="color: red;"></i></button>
                                  </form>
                                    </span>
                                  </li>
                                  @endforeach
                                </ul>
                              </div>
                          </div>
                        </div>
                      </div>
                        <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                          <div class="card">
                            <div class="card-header">
                              <h4>Pilih barang untuk diskon</h4>
                            </div>
                            <div class="card-body">
                              <div class="row">
                              <form action="/diskon/adddiskontobarang" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                  <div class="form-group">
                                    <div class="input-field col-12">
                                    <label for="NamaBarang">Nama Barang</label>
                                    <input type="hidden" name="BarangID" id="BarangID" value="">
                                    <input type="hidden" name="DiskonID" id="DiskonID" value="{{$diskon->DiskonID}}">
                                    <input type="text" id="NamaBarang" name="NamaBarang" value="{{old('NamaBarang')}}" class="form-control @error('NamaBarang') is-invalid @enderror" autocomplete="off">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                  </div>
                                  </div>
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
    <script src="{!! asset('assets1/js/stisla.js') !!}"></script>

    <!-- JS Libraies -->
    <!-- <script src="../node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
    <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="../node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->

    <!-- Template JS File -->
    <script src="{!! asset('assets1/js/scripts.js') !!}"></script>
    <script src="{!! asset('assets1/js/custom.js') !!}"></script>

    <!-- Page Specific JS File -->
    <script src="{!! asset('assets1/js/page/index-0.js') !!}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $.ajax({
        type: 'get',
        url: '{!!URL::to('caribarang')!!}',
        success: function(response) {
          console.log(response);
          //material css
          //convert array to object
          var hargaArray = response;
          var dataharga = {};
          var dataharga2 = {};
          for (var i = 0; i < hargaArray.length; i++) {
            dataharga[hargaArray[i].NamaBarang] = null;
            dataharga2[hargaArray[i].NamaBarang] = hargaArray[i];
          }

          // console.log("dataharga2");
          // console.log(dataharga2);

          $('input#NamaBarang').autocomplete({
            data: dataharga,
            onAutocomplete: function(reqdata) {
              console.log(reqdata);
              $('#BarangID').val(dataharga2[reqdata]['BarangID']);
            }
          });
          //end
        }
      })
    });
  </script>
    @livewireScripts
</body>

</html>
