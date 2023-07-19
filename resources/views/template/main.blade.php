<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PRESI-APP</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/navbar.blade.php -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="{{ url('home') }}"><img src="{{ asset('/') }}images/ijo-smp.svg" alt="logo" />
                        </br>
                        <span class="d-flex justify-content-center border rounded" style="background-color: #C1D0B5; font-size:12px;">Login Sebagai: {{ Auth::user()->username }}</span>
                    </a>
                    {{-- <a class="navbar-brand brand-logo-mini" href="{{ url('home') }}"><img src="{{ asset('/') }}images/logo-mini.svg" alt="logo" /></a> --}}
                    {{-- <b class=" text-bold text-success">SMP N 2 TEMPEL</b> --}}
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-sort-variant"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                {{-- <b class=" text-black text-bold">SMP N 2 TEMPEL</b> --}}
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            Selamat Datang, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <ul class="dropdown-item">
                                <a href="#" class="nav-link"><i class="mdi mdi-settings text-primary"></i>Settings</a>
                            </ul>
                            <ul>
                                <hr class="dropdown-divider">
                            </ul>
                            {{-- <form action="/logout" method="post"> --}}
                            {{-- @csrf --}}
                            <ul class="dropdown-item">
                                <a class="nav-link" href="{{ url('logout') }}" role="button">
                                    {{-- <button type="submit" class="dropdown-item"> --}}
                                    <i class="mdi mdi-logout text-primary"></i>Logout
                                </a>
                            </ul>
                            {{-- </button> --}}
                            {{-- </form> --}}
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <!-- partial:../../partials/sidebar.blade.php -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    @include('template.menu')
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-end flex-wrap">
                                    <div class="me-md-3 me-xl-50 pt-0">
                                        <h4 class="text-success mdi mdi-school">
                                            @yield('judul')
                                        </h4>
                                    </div>
                                    <div class="d-flex left">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <h5 class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;{{Route::current()->getName()}}&nbsp;/&nbsp;</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('isi')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © Aplikasi Presensi Siswa 2023</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">SMP Negeri 2 Tempel</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/js/template.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- endinject -->

    <!-- chart js -->

</body>

</html>