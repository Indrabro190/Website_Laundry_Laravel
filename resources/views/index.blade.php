<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- font awesome css -->
  <link rel="stylesheet" href="../fontawesome/css/all.css">
  <!-- datatable modal link -->
  <!-- css toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <style>
    .card {
      background: #C9D6FF;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #E2E2E2, #C9D6FF);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
    .card{
      border-radius: 10px;
      box-shadow: 1px 2px 20px pink;
    }

    .alert {
      opacity: 70%;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <!-- dark mode -->
  <div id="toggle">
    <i class="indicator"></i>
  </div>

  <div class="login-box"></div>
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1><b style="color:red;">Log</b> <b><span>In</span></h1></b>
    </div>
    <div class="card-body">
      <b><p class="login-box-msg">Masukkan Data Anda</p></b>

      <form action="/cek_login" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
          <div class="input-group-append">
          </div>
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="/register" class="text-center">Belum Punya Akun?</a>
      <a href="/forget-password" class="text-center" style="padding-left: 20px;">Lupa Sandi?</a>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <!-- /.login-box -->


  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- cdn toastr -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <script>
    const body = document.querySelector('body');
    const toggle = document.getElementById('toggle');
    toggle.onclick = function() {
      toggle.classList.toggle('active');
      body.classList.toggle('active');
    }
  </script>

</body>

<!-- toastr notification success -->
@if(Session::has('success'))
<script>
  toastr.success("{{ Session('success') }}")
</script>
@endif
<!-- end toastr notification -->

<!-- toastr notification error -->
@if(Session::has('error'))
<script>
  toastr.error("{{ Session('error') }}")
</script>
@endif
<!-- end toastr notification error -->

</html>