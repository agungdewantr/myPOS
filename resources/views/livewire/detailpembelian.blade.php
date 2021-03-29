<!DOCTYPE html>
<!-- <html lang="en"> -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="robots" content="noindex,nofollow">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail Transaksi Pembelian #{{$id}}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{!! asset('assets1/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets1/css/components.css') !!}">
    <style>
      @media print {
        @page
        {
          /* size: A5; */
          /* margin: -10px; */
        }
        .section-header-breadcrumb {
          display: none;
        }
        .main-wrapper {
          width:auto;
        }
        /* .table th{
          width: : 10px;
        } */
        .section .hapus {
          display: none;
        }
        .navbar-expand-lg main-navbar {
          display: none;
        }
        .main-sidebar {
          display: none;
        }
        .main-footer{
          display: none;
        }
        .btn{
          display: none;
        }
      }
    </style>
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
                      <li><a class="nav-link" href="/satuan"><i class="fas fa-balance-scale"></i> <span>Satuan</span></a></li>
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
        <div class="hapus section-header">
          <h1>Invoice</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Invoice</div>
          </div>
        </div>

        <div class="section-body">
          <div class="invoice">
            <div class="invoice-print">
              <div class="row">
                <div class="col-lg-12">
                  <div class="invoice-title">
                    <h2>Invoice</h2>
                    <div class="invoice-number">Transaksi #{{$id}}</div>
                  </div>
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <table border="0">
                    <tbody>
                    <tr><td><b>Tgl Transaksi</b></td><td>:</td><td><b>{{date('d/m/Y H:i:s', strtotime($total->created_at))}}</b><br></td></tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-6">
                  <!-- <div class="text-md-right">
                    <a href="/cetakinvoice/{{$id}}" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</a>
                  </div> -->
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-md" >
                      <tr align="center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total</th>
                      </tr>
                      @foreach($detailpembelian as $dp)
                      <tr align="center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dp->NamaBarang}}</td>
                        <td>{{$dp->Qty}}</td>
                        <td>{{$dp->Satuan}}</td>
                        <td>{{$dp->Harga}}</td>
                        <td>{{$dp->Total}}</td>
                      </tr>
                      @endforeach
                    </table>
                  </div>
                  <div class="row mt-4">
                    <div class="col-lg-8">
                    </div>
                    <div class="col-lg-4 text-right">
                      <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Total</div>
                        <div class="invoice-detail-value">Rp.{{ number_format($total->TotalPembelian,0,',','.') }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </section>
    </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 MYPOS
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
    @yield('script')
    @livewireScripts
</body>

</html>
