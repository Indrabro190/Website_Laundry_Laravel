<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <title>Data Customer</title>
  @include('Template.head')
  <style>
    div.dataTables_wrapper {
      width: 920px;
      margin: 0 auto;
    }

    .scroll {
      overflow: auto;
    }


    #customer {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customer td,
    #customer th {
      border: 1px solid #ddd;
      padding: 15px;
    }

    #customer tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customer tr:hover {
      background-color: #ddd;
    }

    #customer th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #2DA1B1;
      color: white;
    }

    #datatable th {
      background-color: #2DA1B1;
      color: #fff;
    }

    .main-header {
      background: #F2994A;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #F2C94C, #F2994A);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #F2C94C, #F2994A);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

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

        <div class="col-auto">
          <form action="/datacustomer" method="GET">
            <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search..." style="background: transparent; color:#fff;">
          </form>
        </div>
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

    <!-- Main Sidebar Container -->
    @include('Template.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0" style="font-weight: 600;">Data Customer</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/laundry">Home</a></li>
                <li class="breadcrumb-item active">Data Customer</li>
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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel Customer</h3>
                </div>

                <div class="card-body" id="customer">
                  <div class="submit" style="margin-bottom:5px;">
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddUser">Tambah<i class="fa-solid fa-plus"></i></button>
                  </div>
                  <div class="scroll">
                    <table id="myTable" class="display nowrap" class="table table-bordered table-hover">
                      <thead>
                        <tr align="center">
                          <th>#</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Jenis Kelamin</th>
                          <th>No Telefon</th>
                          <th colspan="2" style="text-align:center ;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @forelse($data as $index => $m)
                        <tr align="center">
                          <td>{{ $index + $data->firstItem() }}</td>
                          <td>{{ $m->namecustomer }}</td>
                          <td>{{ $m->alamat }}</td>
                          <td>{{ $m->jeniskelamin }}</td>
                          <td>0{{ $m->notelepon }}</td>
                          <td align="center">
                            <a href="#modalEditUser{{ $m->id }}" data-toggle="modal" class="btn btn-primary btn-xs" style="box-shadow: 1px 2px 3px black;"><i class="fa-solid fa-pen-to-square"></i></a>
                            |
                            <a href="#" data-toggle="modal" data-id="{{ $m->id }}" data-namecustomer="{{ $m->namecustomer }}" class="btn btn-danger btn-xs delete" style="box-shadow: 1px 2px 3px black;"><i class="bi bi-person-x-fill"></i></a>

                          </td>
                        </tr>
                        @empty
                        <tr>
                          <td align="center" colspan="6">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>

                <!-- /.card-body -->
                <div class="d-flex justify-content-end" style="margin-right: 20px;">
                  {{ $data->Links() }}
                </div>
              </div>

              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>

      <div class="modal fade" id="modal-detail">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="clode" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Detail Customer</h4>
            </div>
            <div class="modal-body table-responsive">
              <table class="table table-bordered no-margin">
                <tbody>
                  <tr>
                    <th>Nama</th>
                    <td><span id="namecustomer"></span></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><span id="alamat"></span></td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td><span id="jeniskelamin"></span></td>
                  </tr>
                  <tr>
                    <th>No Telefon</th>
                    <td><span id="notelepon"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Customer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/customer/store">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control @error('namecustomer') is-invalid @enderror" name="namecustomer" value="{{ old('namecustomer') }}" placeholder="Nama Lengkap...">
                  @error('namecustomer')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="ALamat...">
                  @error('alamat')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control @error('jeniskelamin') is-invalid @enderror" name="jeniskelamin" value="{{ old('jeniskelamin') }}">
                    <option value="" selected>-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  @error('jeniskelamin')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>No Telefon</label>
                  <input type="number" class="form-control @error('notelepon') is-invalid @enderror" name="notelepon" placeholder="Telefon...">
                  @error('notelepon')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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

      @foreach($data as $d)
      <div class="modal fade" id="modalEditUser{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/customer/{{ $d->id }}/update">
              @csrf
              <div class="modal-body">
                <input type="hidden" value="{{ $d->id }}" name="id" required>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" value="{{ $d->namecustomer }}" class="form-control" name="namecustomer">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" value="{{ $d->alamat }}" class="form-control" name="alamat">
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" name="jeniskelamin">
                    <option selected>{{ $d->jeniskelamin }}</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>No Telefon</label>
                  <input type="number" value="0{{ $d->notelepon }}" class="form-control" name="notelepon">
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

      @foreach($data as $t)
      <div class="modal fade" id="modalHapusUser{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/customer/{{ $t->id }}/destroy">
              @csrf
              <div class="modal-body">
                <input type="hidden" value="{{ $t->id }}" name="id" required>
                <div class="form-group">
                  <h4>Apakah Anda Ingin Menghapus Data Ini</h4>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-backward-step"></i>Close</button>
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-user-xmark" style="color: #fff;"></i>Hapus</button>
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
    <!-- ./wrapper -->
    
    <!-- REQUIRED SCRIPTS -->
    <!-- script datatable modal -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
  </div>
</body>
<!-- modaldetail -->
<script>
  $(document).ready(function() {
    $(document).on('click', '#set_dtl', function() {
      var namecustomer = $(this).data('namecustomer');
      var alamat = $(this).data('alamat');
      var jeniskelamin = $(this).data('jeniskelamin');
      var notelepon = $(this).data('notelepon');
      $('#namecustomer').text(namecustomer);
      $('#alamat').text(alamat);
      $('#jeniskelamin').text(jeniskelamin);
      $('#notelepon').text(notelepon);
    })
  })
</script>

<script>
  // scroll table
  $(document).ready(function() {
    $('#myTable').dataTable({
      scrollX: true,
    });
  });
</script>
<script type="text/javascript">
  window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
  })
</script>
<script>
  $('.delete').click(function() {
    var customerid = $(this).attr('data-id');
    var namecustomer = $(this).attr('data-namecustomer');
    swal({
        title: "Yakin Nih?",
        text: "Ingin Menghapus Data Dengan Nama " + namecustomer + " ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/deletecustomer/" + customerid + ""
          swal("Data Berhasil Di Hapus Bro", {
            icon: "success",
          });
        } else {
          swal("Data Kamu Masih Disimpan");
        }
      });
  });
</script>
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