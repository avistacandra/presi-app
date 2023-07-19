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
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
            <img src="{{ asset('/') }}images/logo-smp.png" class="rounded mx-auto d-block">
            <h4 class="text-center text-success"> SMP NEGERI 2 TEMPEL</h4>
            </div>
            <form action="{{ url('register') }}" method="post">
                @csrf
            <div class="form-floating mt-2">
                <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name')}}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback"> {{ $message }}
                </div>
                @enderror
            </div>    
            <div class="form-floating mt-2">
                <input type="text" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username')}}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback"> {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mt-2">
                <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email')}}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback"> {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mt-2">
                <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Password" required value="{{ old('password')}}">
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback"> {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mt-2">
                <input type="level" name="level" class="form-control form-control-lg @error('level') is-invalid @enderror" id="level" placeholder="Level" required value="{{ old('level')}}">
                <label for="password">Level</label>
                @error('level')
                <div class="invalid-feedback"> {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-block btn-warning font-weight-medium auth-form-btn text-white" type="submit">REGISTER</button>
            </div>
            <div class="text-center mt-4 font-weight-light">
                Sudah Punya Akun? <a href="{{ url('login') }}" class="text-primary">Login</a>
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