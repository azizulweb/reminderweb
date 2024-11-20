<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log In</title>
   <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="assets/images/web.png" />
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Admin LTE -->
   <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="{{asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
   <!-- loginstyle -->
   <link rel="stylesheet" href="{{asset('bootstrap-5.3/css/bootstrap.min.css') }}">
  
</head>
<body class="hold-transition login-page bg-dark">
  @if($errors->has('credentials'))
          <div class="alert alert-danger">
              {{ $errors->first('credentials') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif

  <div class="login-box">
  <!-- /.login-logo -->
        <div class="card card-outline-dark ">
          <div class="card-header text-center bg-primary" style="position: relative; display: flex; align-items: center; justify-content: center;">
            <div class="logo-container" style="position: absolute; left: 0; margin-left: 20px;">
                <img class="animation__shake" src="{{asset('assets/images/web.png')}}" alt="AdminLTELogo" height="60" width="60">
            </div>
            <div class="title-container" style="flex-grow: 1; text-align: center;">
                <p href="#" class="h1 text-white"><b>LOG</b>IN</p>
            </div>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Silahkan Log In terlebih dahulu...</p>

            <form action="{{url('/proses-login')}}" method="post">
              @csrf
              <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" name="email">
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                      </div>
                  </div>
              </div>
              <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                      </div>
                  </div>
              </div>
          
              <!-- Bagian Button -->
              <div class="row">
                  <div class="col-7 d-flex justify-content-between">
                      <button class="btn btn-primary mr-2" type="submit">Sign In</button>
                      <a class="btn btn-secondary" type="button" href="{{ route('regis') }}">Sign Up</a>
                  </div>
              </div>
          </form>
          
            <!-- /.social-auth-links -->
  
          </div>
        </div>
  
    <!-- /.login-box -->

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
