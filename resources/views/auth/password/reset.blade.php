<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>
  @include('Template.head')
  <style>
    .card {
      background: #C9D6FF;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #E2E2E2, #C9D6FF);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .alert {
      opacity: 70%;
    }
  </style>
</head>

<body class="hold-transition reset-page2">
  <div class="login-box"></div>
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h2><b style="color:red;">Reset</b> <b><span>Password</span></h2></b>
    </div>
    <div class="card-body">
      <form method="POST" action="/reset-password">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email..." value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="new-password">
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input id="password-confirm" type="password" class="form-control" placeholder="confirm Password" name="password_confirmation" autocomplete="new-password">
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- /.login-box -->

  <!-- jQuery -->
  @include('Template.script')
</body>
@if(Session::has('success'))
<script>
  toastr.success("{{ Session('success') }}")
</script>
@endif

@if(Session::has('error'))
<script>
  toastr.error("{{ Session('error') }}")
</script>
@endif

</html>