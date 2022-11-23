<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>Data Profile</title>
    @include('Template.head')
    <style>
        .main-header {
            background: #F2994A;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #F2C94C, #F2994A);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #F2C94C, #F2994A);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/laundry" class="nav-link" style="font-weight:600; color:#fff; text-shadow:1px 1px 1px black;">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="color:#fff; text-shadow:1px 1px 1px black;">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="info">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight:600; color:#fff; text-shadow:1px 1px 1px black;">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="/dataprofile">Profile</a></li>
                                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                    <li>
                                        @csrf
                                        <form action="/logout" method="get">
                                            <button class="dropdown-item" type="submit">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <div class="image">
                                <img src="{{asset('dist/img/orang.png')}}" class="img-circle elevation-2" alt="User Image" style="width: 35px; margin-right:30px; background-color:#fff;">
                            </div>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Template.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/laundry">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data <small>Profile User</small></h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="exampleInputEmail1" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" value="{{ Auth::user()->password }}" class="form-control" id="exampleInputPassword1" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Level</label>
                                            <input type="text" name="level" value="{{ Auth::user()->level }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <a href="#modalEditUser" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i>Ubah Profile</a>
                                    </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">

                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>

    @foreach($user as $d)
      <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/dataprofile/{{ $d->id }}/update1">
              @csrf
              <div class="modal-body">
                <input type="hidden" value="{{ $d->id }}" name="id" required>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" value="{{ $d->name }}" class="form-control" name="name" placeholder="Nama Lengkap...">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" value="{{ $d->email }}" class="form-control" name="email" placeholder="Email...">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" value="{{ $d->password }}" class="form-control" name="password" placeholder="Password...">
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="level" required>
                    <option value="" hidden="">-- Pilih Level --</option>
                    <option value="admin">admin</option>
                    <option <?php if ($d['level'] == "admin") echo "selected"; ?> value="admin">admin</option>
                    <option <?php if ($d['level'] == "pegawai") echo "selected"; ?> value="pegawai">pegawai</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-backward-step"></i>Close</button>
                <button type="submit" class="btn btn-primary">Save Change</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endforeach


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('Template.script')

</body>
@if(Session::has('success'))
<script>
    toastr.success("{{ Session('success') }}")
</script>
@endif

</html>