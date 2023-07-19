<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>PRESI-APP</title>
<!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('/') }}vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="{{ asset('/') }}vendors/base/vendor.bundle.base.css">
<!-- endinject -->
<!-- plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('/') }}css/style.css">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('/') }}images/favicon.png">
</head>

<body>
<div class="container-scroller">
<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
      <div class="col-lg-4 mx-auto">

        {{-- @if(session()->has('success'))    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginError'))    
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif --}}

        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
          <div class="brand-logo">
            <img src="{{ asset('/') }}images/logo-smp.png" class="rounded mx-auto d-block">
            <h4 class="text-center text-success"> SMP NEGERI 2 TEMPEL</h4>
          </div>
          <form action="{{ url('login/proses') }}" method="post">
            @csrf
            <div class="form-floating mt-2">
                <input type="text" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" id="username" placeholder="username" autofocus required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">{{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mt-2">
                <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">{{ $message }}
                </div>
                @enderror
              </div>

            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-warning font-weight-medium btn-lg auth-form-btn text-white" type="submit">LOGIN</button>
            </div>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
            </div>
            <div class="text-center mt-4 font-weight-light">
              Tidak Punya Akun? <a href="/register" class="text-primary">Silahkan Daftar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('/') }}vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset('/') }}js/off-canvas.js"></script>
<script src="{{ asset('/') }}js/hoverable-collapse.js"></script>
<script src="{{ asset('/') }}js/template.js"></script>
<!-- endinject -->
</body>

</html>