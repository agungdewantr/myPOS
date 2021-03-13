<!DOCTYPE html>
<!-- <html lang="en"> -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="robots" content="noindex,nofollow">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>General Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css"> -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{!! asset('assets1/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets1/css/components.css') !!}">
    @livewireStyles
</head>

<body>
  @yield('content')
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
                        <a href="index.html">Stisla</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li><a class="nav-link" href="/"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
                        <li><a class="nav-link" href="/penjualan"><i class="far fa-square"></i> <span>Penjualan</span></a></li>
                        <li><a class="nav-link" href="/pembelian"><i class="far fa-square"></i> <span>Pembelian</span></a></li>
                        <li><a class="nav-link" href="/barang"><i class="far fa-square"></i> <span>Barang</span></a></li>
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
                        <h1>@yield('namamenu')</h1>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Statistics</h4>
                                    <div class="card-header-action">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-primary">Week</a>
                                            <a href="#" class="btn">Month</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart" height="182"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Recent Activities</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png" alt="avatar">
                                            <div class="media-body">
                                                <div class="float-right text-primary">Now</div>
                                                <div class="media-title">Farhan A Mujib</div>
                                                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-2.png" alt="avatar">
                                            <div class="media-body">
                                                <div class="float-right">12m</div>
                                                <div class="media-title">Ujang Maman</div>
                                                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-3.png" alt="avatar">
                                            <div class="media-body">
                                                <div class="float-right">17m</div>
                                                <div class="media-title">Rizal Fakhri</div>
                                                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-4.png" alt="avatar">
                                            <div class="media-body">
                                                <div class="float-right">21m</div>
                                                <div class="media-title">Alfa Zulkarnain</div>
                                                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="text-center pt-1 pb-1">
                                        <a href="#" class="btn btn-primary btn-lg btn-round">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    {{$slot}}
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
    <script>
$('#myModal').modal('show');
</script>
<script>
$('#myModal1').modal1('show');
</script>
<!-- <script type="text/javascript">
  $(document).ready(function() {
      $('.but').trigger('click');
  }) -->
</script>
    @yield('script')
    @livewireScripts
</body>

</html>
