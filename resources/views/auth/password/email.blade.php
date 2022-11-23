<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>
  @include('Template.head')
</head>

<body class="hold-transition recover-page1">
<div class="login-form">
        <form method="POST" action="/forget-password">
            @csrf
            <div class="text-center" style="margin-top: 100px;">
                <a href="index.html" aria-label="Space">
                    <img class="mb-3 bg-light" src="../dist/img/orang.png" alt="Logo" width="70" height="70" style="border-radius: 30px;">
                </a>
            </div>
            <div class="text-center mb-4">
                <h1 class="h3 mb-0">Recover account</h1>
                <p>Masukkan Email Yang Ingin Di Perbaiki.</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="js-form-message mb-3">
                <div class="js-focus-state input-group form">
                <div class="input-group-prepend form__prepend">
                    <span class="input-group-text form__text">
                    <i class="fa fa-user form__text-inner"></i>
                    </span>
                </div>
                <input type="email" class="form-control form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Email" autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary login-btn btn-block">Recover account</button>
            </div>

            <div class="text-center mb-3">
                <p class="text-muted">Belum Punya Akun? <a href="/register">Sign in</a></p>
            </div>
            <p class="small text-center text-muted mb-0">All rights reserved. © Maulana Indra. 2022 indrabro190.com.</p>
        </form>
    </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  @include('Template.script')
</body>

@if(Session::has('error'))
<script>
  toastr.error("{{ Session('error') }}")
</script>
@endif

</html>