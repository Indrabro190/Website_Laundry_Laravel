<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <title>Data Cabang</title>
  @include('Template.head')
  <style>
    .main-header {
      background: #D3CCE3;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #E9E4F0, #D3CCE3);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #E9E4F0, #D3CCE3);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

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
              <h1 class="m-0" style="font-weight: 600;">Data Cabang</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/laundry">Home</a></li>
                <li class="breadcrumb-item active">Data Cabang</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel Cabang</h3>
                  <!-- <div class="col-auto">
                    <form action="/datacabang" method="GET" style="margin-right: 700px; margin-left:10px;">
                      <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search...">
                    </form>
                  </div> -->
                </div>

                <div class="card-body">
                <div class="submit" style="margin-bottom:5px;">
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddUser">Tambah<i class="fa-solid fa-plus"></i></button>
                  </div>
                  <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                      <tr align="center">
                        <th>#</th>
                        <th>Nama Cabang</th>
                        <th colspan="2" style="text-align:center ;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $no = 1;
                      @endphp
                      @forelse($data as $m)
                      <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->namecabang }}</td>
                        <td>
                          <a href="#modalEditUser{{ $m->id }}" data-toggle="modal" class="btn btn-primary btn-xs" style="box-shadow: 1px 2px 3px black;"><i class="fa-solid fa-pen-to-square"></i></a>
                          |
                          <a href="#" data-toggle="modal" data-id="{{ $m->id }}" data-nama="{{ $m->namecabang }}" class="btn btn-danger btn-xs delete" style="box-shadow: 1px 2px 3px black;"><i class="fa-solid fa-eraser"></i></a>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td align="center" colspan="3">Tidak Ada Data</td>
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



      <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Cabang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/cabang/store">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Cabang</label>
                  <input type="text" class="form-control @error('namecabang') is-invalid @enderror" name="namecabang" value="{{ old('namecabang') }}" placeholder="Nama Cabang...">
                  @error('namecabang')
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
              <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/cabang/{{ $d->id }}/update">
              @csrf
              <div class="modal-body">
                <input type="hidden" value="{{ $d->id }}" name="id" required>
                <div class="form-group">
                  <label>Nama Cabang</label>
                  <input type="text" value="{{ $d->namecabang }}" class="form-control" name="namecabang">
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
              <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/cabang/{{ $t->id }}/destroy">
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
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  @include('Template.script')

</body>
<script type="text/javascript">
  window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
  })
</script>
<script>
  $('.delete').click(function() {
    var cabangid = $(this).attr('data-id');
    var namecabang = $(this).attr('data-nama');
    swal({
        title: "Yakin Nih?",
        text: "Ingin Menghapus Data Dengan Nama " + namecabang + " ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/deletecabang/" + cabangid + ""
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

</html>