<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- tambahan -->
    <meta name="robots" content="noindex,nofollow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link href="{!! asset('assets/plugins/chartist/dist/chartist.min.css')!!}" rel="stylesheet">
    <link href="{!! asset('assets/css/style.min.css') !!}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <livewire:styles />
</head>

<body>
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark" style="background-color: #9e7cf4;">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand justify-content-center" href="/" style="background-color: #9d7bf3;">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->

                            <img src="{!! asset('assets/images/logo-text.png') !!}" alt="homepage" class="dark-logo">

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!-- <span class="logo-text"> -->

                        <!-- dark Logo text -->
                        <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->

                        <!-- </span> -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <li class="nav-item hidden-sm-down">
                            <form class="app-search pl-3">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li>
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <div class="dropdown show">
                                <a class=" dropdown-toggle  " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <p class="h6 mt-2 mr-5"><span style="color:white; border:solid 2px; padding: 8px 10px; border-radius: 20px;">Budi Karya Budi Karya<i class="fas fa-chevron-down pl-2"></i></span></p>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Profil</a>

                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/" aria-expanded="false"><i class="mr-3 far fa-clock fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('Penjualan')}}" aria-expanded="false"><i class="mr-3 fas fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Penjualan</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/pembelian" aria-expanded="false"><i class="mr-3 fas fa-cart-arrow-down" aria-hidden="true"></i><span class="hide-menu">Pembelian</span></a></li>
                        <li class="sidebar-item"> <a id="btnbrg" class="sidebar-link waves-effect waves-dark sidebar-link" href="/barang" aria-expanded="false"><i class="mr-3 fas fa-database" aria-hidden="true"></i><span class="hide-menu">Barang</span></a></li>
                        <button onclick="myFunction()" type="submit">ehhhhh</button>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0" style="color: #9e7cf4;">@yield('title')</h3>
                        <div class="d-flex align-items-center" style="margin-bottom:-30px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                {{ $slot }}
            </div>
            <footer class="footer text-center">
                © SISTEM KASIR 2021
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <script src="{!! asset('assets/plugins/jquery/dist/jquery.min.js') !!}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{!! asset('assets/plugins/popper.js/dist/umd/popper.min.js') !!}"></script>
    <script src="{!! asset('assets/plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/js/app-style-switcher.js') !!}"></script>
    <!--Wave Effects -->
    <script src="{!! asset('assets/js/waves.js') !!}"></script>
    <!--Menu sidebar -->
    <script src="{!! asset('assets/js/sidebarmenu.js') !!}"></script>
    <!--Custom JavaScript -->
    <script src="{!! asset('assets/js/custom.js') !!}"></script>
    <!--This page JavaScript -->
    <!--flot chart-->
    <script src="{!! asset('assets/plugins/flot/jquery.flot.js') !!}"></script>
    <script src="{!! asset('assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js') !!}"></script>
    <script src="{!! asset('assets/js/pages/dashboards/dashboard1.js') !!}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--  -->
    <!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/> -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            console.log('test');
            $.ajax({
                type: 'get',
                url: '{!!URL::to('caribarang ')!!}',
                success:function(response) {
                    console.log(response);
                    //m css
                    var barangArray = response;
                    var databarang = {};
                    var databarang2 = {};
                    for (var i = 0; i < barangArray.length; i++) {
                      databarang[barangArray[i].NamaBarang] =null;
                      databarang2[barangArray[i].NamaBarang] =barangArray[i];
                    }
                    console.log(databarang);
                    $('input#barang').autocomplete({
                        data: databarang,
                    });
                }
            })
        });
    </script> -->
    <!-- <script>
      var path = "{{route('autocomplete')}}";
      $('input#barang').autocomplete({
        source:function(terms,process){
          return $.get(path,{terms:terms},function(data){
            return process($data);
          });
        }
      });
    </script> -->
    <!-- <script>
    function validateForm() {
        var x = document.forms["tambah"]["barang"].value;
        var y = document.forms["tambah"]["barang2"].value;
        if (x == null || x == "") {
          x =y;
            alert(x);
        }
    }
    </script> -->
    @yield('script')
    <livewire:scripts />

</body>

</html>