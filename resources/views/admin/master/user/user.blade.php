<!DOCTYPE html>
<html lang="en">

<head>
  <title>Data User</title>
  @include('Template.head')
  <style>
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
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    @include('Template.navbar')
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
              <h1 class="m-0" style="font-weight: 600;">Data User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/laundry">Home</a></li>
                <li class="breadcrumb-item active">Data User</li>
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
                  <h3 class="card-title">Tabel User</h3>
                </div>

                <div class="card-body">
                  <div class="submit" style="margin-bottom:5px;">
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddUser">Tambah <i class="fa-solid fa-plus"></i></button>
                  </div>
                  <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th colspan="2" style="text-align:center ;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $no = 1;
                      @endphp
                      @forelse($user as $m)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->name }}</td>
                        <td>{{ $m->email }}</td>
                        <td>{{ $m->level }}</td>
                        <td align="center">
                          <a href="#modalEditUser{{ $m->id }}" data-toggle="modal" class="btn btn-primary btn-xs" style="box-shadow: 1px 2px 3px black;"><i class="fa-solid fa-pen-to-square"></i></a>
                          |
                          <a href="#" data-toggle="modal" data-id="{{ $m->id }}" data-nama="{{ $m->name }}" class="btn btn-danger btn-xs delete" style="box-shadow: 1px 2px 3px black;"><i class="bi bi-person-x-fill"></i></a>
                          |
                          <a id="set_dtl" href="#" data-toggle="modal" data-target="#modal-detail" data-name="{{ $m->name }}" data-email="{{ $m->email }}" data-level="{{ $m->level }}" style="color: #fff; box-shadow: 1px 2px 3px black;" title="Detail" class="btn btn-warning btn-xs">Info</a>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td align="center" colspan="5">Tidak Ada Data</td>
                      </tr>
                      @endforelse

                    </tbody>

                  </table>
                </div>

                <!-- /.card-body -->
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
              <h4 class="modal-title">Detail User</h4>
            </div>
            <div class="modal-body table-responsive">
              <table class="table table-bordered no-margin">
                <tbody>
                  <tr>
                    <th>Nama</th>
                    <td><span id="name"></span></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td><span id="email"></span></td>
                  </tr>
                  <tr>
                    <th>Level</th>
                    <td><span id="level"></span></td>
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
              <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/user/store">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap...">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email...">
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password...">
                  @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}">
                    <option value="" hidden="">-- Pilih Level --</option>
                    <option value="admin">admin</option>
                    <option value="pegawai">pegawai</option>
                  </select>
                  @error('level')
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

      @foreach($user as $d)
      <div class="modal fade" id="modalEditUser{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/user/{{ $d->id }}/update">
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

      <!-- @foreach($user as $t)
      <div class="modal fade" id="modalHapusUser{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/user/{{ $t->id }}/destroy">
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
      @endforeach -->

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
<!-- modaldetail -->
<script>
  $(document).ready(function() {
    $(document).on('click', '#set_dtl', function() {
      var name = $(this).data('name');
      var email = $(this).data('email');
      var level = $(this).data('level');
      $('#name').text(name);
      $('#email').text(email);
      $('#level').text(level);
    })
  })
</script>
<script type="text/javascript">
  window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
  })
</script>
<script>
  $('.delete').click(function() {
    var userid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');
    swal({
        title: "Yakin Nih?",
        text: "Ingin Menghapus Data Dengan Nama " + nama + " ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/deleteuser/" + userid + ""
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