<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/images/web.png" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE//dist/css/adminlte.min.css')}}">
  <!-- loginstyle -->
  <link rel="stylesheet" href="{{asset('bootstrap-5.3/css/bootstrap.min.css') }}">
</head>
<body class="hold-transition register-page bg-dark">

<div class="register-box">
  <div class="register-logo">
  </div>

  <div class="card card-outline-dark ">
    <div class="card-header text-center bg-primary" style="position: relative; display: flex; align-items: center; justify-content: center;">
        <div class="logo-container" style="position: absolute; left: 0; margin-left: 20px;">
            <img class="animation__shake" src="{{asset('assets/images/web.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>
        <div class="title-container" style="flex-grow: 1; text-align: center;">
            <p href="#" class="h1 text-white"><b>Register</p>
        </div>
    </div>
    <div class="card-body register-card-body">
     <form action="{{route('SignUp')}}" method="post" enctype="multipart/form-data">
        @csrf
      {{-- name --}}
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="name" name="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        {{-- email --}}
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
      {{-- password --}}
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        {{-- profile_picture --}}
        <div class="input-group mb-3"> 
          <input class="form-control" type="file" name="profile_picture" id="profile_picture">
          <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-image"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
          </div>
          <div class="col-4">
            <a class="btn btn-dark" type="button" href="{{ route('login') }}">Back</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('bootstrap-5.3/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
