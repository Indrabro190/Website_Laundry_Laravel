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
    .alert{
      opacity: 70%;
    }
  </style>
</head>

<body class="hold-transition login-page">
<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Verify Your Email Address</div>
                   <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <a href="{{ url('/reset-password/'.$token) }}">Click Here</a>
                </div>
            </div>
        </div>
    </div>
</div>

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