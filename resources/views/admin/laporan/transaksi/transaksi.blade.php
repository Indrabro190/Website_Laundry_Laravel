<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <title>Transaksi</title>
  @include('Template.head')
  <style>
    div.dataTables_wrapper {
      width: 920px;
      margin: 0 auto;
    }

    .scroll {
      overflow: auto;
    }


    #transaksi {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #transaksi td,
    #transaksi th {
      border: 1px solid #ddd;
      padding: 15px;
    }

    #transaksi tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #transaksi tr:hover {
      background-color: #ddd;
    }

    #transaksi th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #2DA1B1;
      color: white;
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
              <h1 class="m-0" style="font-weight: 600;">Data Transaksi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/laundry">Home</a></li>
                <li class="breadcrumb-item active">Data Transaksi</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sedang Dikerjakan</a>
              <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Selesai</a>
              <a class="nav-item nav-link" id="nav-batal-tab" data-toggle="tab" href="#nav-batal" role="tab" aria-controls="nav-profile" aria-selected="false">Batal</a>
            </div>
          </nav> -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel Transaksi</h3>
                </div>
                <div class="card-body" id="transaksi">
                  <div class="submit" style="margin-bottom: 5px;">
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddUser">Tambah <i class="fa-solid fa-plus"></i></button>
                  </div>
                  <div class="scroll">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form id="formDelete">
                          @csrf
                          <table id="myTable" class="display nowrap">
                            <thead>
                              <!-- table table-bordered table-hover -->
                              <tr>
                                <th><button class="btn btn-primary" type="submit"><i class="fa-solid fa-trash"></i></button></th>
                                <th style="width: 10px">#</th>
                                <th style="width: 100px">Cabang</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Paket</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Berat</th>
                                <th class="text-center">Estimasi Selesai</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Status</th>
                                <th colspan="2" class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse($transaksi as $index => $m)
                              <tr align="center" class="{{ $m->id }}">
                                <td>
                                  <input type="checkbox" name="ids[]" value="{{ $m->id }}">
                                </td>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $m->cabang->namecabang }}</td>
                                <td>{{ $m->customer->namecustomer }}</td>
                                <td>{{ $m->namapaket->namepaket }}</td>
                                <td>{{ $m->namapaket->harga }}</td>
                                <td>{{ $m->Qty }}</td>
                                <td>{{ $m->estimasiselesai }}</td>
                                <td>Rp. {{ number_format($m->namapaket->harga * $m->Qty) }}</td>
                                @if(Auth::user()->level=="pegawai")
                                <td>{{ $m->Status }}</td>
                                @endif
                                @if(Auth::user()->level=="admin")
                                <td><button class="btn btn-default editpemesanan" style="border-radius: 15px; background-color:#04AA6D; border-color:#fff;"><a href="#modalstatus{{ $m->id }}" data-toggle="modal" style="color: #fff;">{{ $m->Status }}</a></button></td>
                                @endif
                                <td>
                                  <a href="#modalEditUser{{ $m->id }}" data-toggle="modal" class="btn btn-primary btn-xs" style="box-shadow: 1px 2px 3px black;"><i class="fa-solid fa-pen-to-square"></i></a>
                                  <a href="#" data-toggle="modal" data-id="{{ $m->id }}" data-nama="{{ $m->customer->namecustomer }}" class="btn btn-danger btn-xs delete" style="box-shadow: 1px 2px 3px black;"><i class="fa-solid fa-eraser"></i></a>
                                  <a id="set_dtl" href="#" data-toggle="modal" data-target="#modal-detail" data-cabang="{{ $m->cabang->namecabang }}" data-customer="{{ $m->customer->namecustomer }}" data-namapaket="{{ $m->namapaket->namepaket }}" data-estimasiselesai="{{ $m->estimasiselesai }}" data-berat="{{ $m->Qty }}" data-jumlah_item="{{ $m->jumlah_item }}" data-total_bayar="Rp.{{ number_format($m->namapaket->harga * $m->Qty) }}" style="color: #fff; box-shadow:1px 2px 3px black;" title="Detail" class="btn btn-warning btn-xs">Info</a>
                                </td>
                              </tr>
                              @empty
                              <tr>
                                <td align="center" colspan="11">Tidak Ada Data</td>
                              </tr>
                              @endforelse

                            </tbody>

                          </table>
                          {{ $transaksi->Links() }}
                        </form>
                      </div>
                    </div>

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
                    <th>Cabang</th>
                    <td><span id="namecabang"></span></td>
                  </tr>
                  <tr>
                    <th>Customer</th>
                    <td><span id="namecustomer"></span></td>
                  </tr>
                  <tr>
                    <th>Paket</th>
                    <td><span id="namepaket"></span></td>
                  </tr>
                  <tr>
                    <th>Estimasi Selesai</th>
                    <td><span id="estimasiselesai"></span></td>
                  </tr>
                  <tr>
                    <th>Berat</th>
                    <td><span id="berat"></span></td>
                  </tr>
                  <tr>
                    <th>Jumlah Item</th>
                    <td><span id="jumlah_item"></span></td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td><span id="total_bayar"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- tambah data -->
      <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" id="modal-title">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-title">Add Transaksi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/transaksi/store" id="main_form">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Cabang</label>
                  <select class="form-control @error('cabang_id') is-invalid @enderror" name="cabang_id" value="{{ old('namecabang') }}">
                    <option value="" hidden="">--pilih cabang--</option>
                    @foreach($cabang as $value)
                    <option value="{{ $value->id }}">{{ $value->namecabang }}</option>
                    @endforeach
                  </select>
                  @error('cabang_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Nama Customer</label>
                  <select class="form-control @error('customer_id') is-invalid @enderror" name="customer_id" value="{{ old('customer_id') }}">
                    <option value="" hidden="">--pilih nama--</option>
                    @foreach($customer as $value)
                    <option value="{{ $value->id }}">{{ $value->namecustomer }}</option>
                    @endforeach
                  </select>
                  @error('customer_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Nama Paket</label>
                  <select class="namapaket form-control @error('namapaket_id') is-invalid @enderror" name="namapaket_id" value="{{ old('namapaket_id') }}" id="namapaket_id">
                    <option value="" hidden="">--pilih paket--</option>
                    @foreach($namapaket as $value)
                    <option value="{{ $value->id }}">{{ $value->namepaket }}</option>
                    @endforeach
                  </select>
                  @error('namapaket_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Estimasi Selesai</label>
                  <input type="date" class="form-control @error('estimasiselesai') is-invalid @enderror" name="estimasiselesai" value="{{ old('estimasiselesai') }}">
                  @error('estimasiselesai')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Berat</label>
                  <input type="number" class="Qty form-control @error('Qty') is-invalid @enderror" name="Qty" id="Qty" value="{{ old('Qty') }}" placeholder="--masukkan Berat--">
                  @error('Qty')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Jumlah Item</label>
                  <input type="number" class="form-control @error('jumlah_item') is-invalid @enderror" name="jumlah_item" id="jumlah_item" value="{{ old('jumlah_item') }}" placeholder="--masukkan jumlah_item--">
                  @error('jumlah_item')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-backward-step"></i>Close</button>
                  <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- pilih status -->
      @foreach($transaksi as $k)
      <div class="modal fade" id="modalstatus{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" id="example">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Ubah status </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/transaksi/{{ $k->id }}/updatestatus">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="Status">
                    <option hidden="" selected>{{ $k->Status }}</option>
                    <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Batal">Batal</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal Selesai</label>
                  <input type="date" class="form-control @error('tanggalselesai') is-invalid @enderror" name="tanggalselesai" value="{{ old('tanggalselesai') }}">
                  @error('tanggalselesai')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-backward-step"></i>Close</button>
                  <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endforeach


      <!-- ubah data -->
      @foreach($transaksi as $d)
      <div class="modal fade" id="modalEditUser{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Update Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/transaksi/{{ $d->id }}/update">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Cabang</label>
                  <select class="form-select" name="cabang_id" required>
                    @foreach($cabang as $cab)
                    <option value="{{ $cab->id }}" {{ $cab->id == $d->cabang_id ? 'selected' : '' }}>{{ $cab->namecabang }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Customer</label>
                  <select class="form-select" name="customer_id" required>
                    @foreach($customer as $cust)
                    <option value="{{ $cust->id }}" {{ $cust->id == $d->customer_id ? 'selected' : '' }}>{{ $cust->namecustomer }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Paket</label>
                  <select class="form-select" name="namapaket_id" required>
                    @foreach($namapaket as $paket)
                    <option value="{{ $paket->id }}" {{ $paket->id == $d->namapaket_id ? 'selected' : '' }}>{{ $paket->namepaket }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Estimasi Selesai</label>
                  <input type="date" class="form-control" name="estimasiselesai" value="{{ $d->estimasiselesai}}">
                </div>
                <div class="form-group">
                  <label>Berat</label>
                  <input type="number" value="{{ $d->Qty }}" class="form-control" name="Qty" id="Qty">
                </div>
                <div class="form-group">
                  <label>Jumlah Item</label>
                  <input id="jumlah_item" type="number" value="{{ $d->jumlah_item }}" class="form-control" name="jumlah_item">
                </div>
                <!-- <div class="form-group">
                  <label>Subtotal</label>
                  <select class="form-control @error('namapaket_id') is-invalid @enderror" id="harga" name="namapaket_id" value="{{ old('namapaket_id') }}">
                    <option value="" hidden="">--pilih paket--</option>
                    @foreach($namapaket as $value)
                    <option value="{{ $value->id }}" {{ $value->id == $d->namapaket_id ? 'selected' : ''  }}>{{ $value->harga }}</option>
                    @endforeach
                  </select>
                  @error('namapaket_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div> -->
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-select" name="Status">
                    <option value="{{ $d->Status }}" hidden>{{ $d->Status }}</option>
                    <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Diambil">Diambil</option>
                    <option value="Batal">Batal</option>
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
    <!-- script datatable modal -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  @include('Template.script')
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


</body>
<!-- Delete Multiple Data -->
<script>
  $(document).ready(function(e) {
    $("#formDelete").submit(function(e) {
      e.preventDefault();

      var formData = $(this).serialize();

      $.ajax({
        url: "{{ route('deletetransaksi') }}",
        type: "POST",
        data: formData,
        success: function(data) {
          if (data.success == true) {
            var ids = data.ids;
            for (let i = 0; i < ids.length; i++) {
              $('.' + ids[i]).remove();
            }
          }
        }
      });
    });
  });
</script>
<!-- script hitung total harga -->
<!-- <script type="text/javascript">
  $(document).ready(function() {
    $("div.modal-content").on("change", 'div.modal-body', function(event) {
      hitungbaris($(this).closest("div.modal-body"));
      hitung();
    });
  });

  function hitungbaris(modal) {
    var Qty = +modal.find('#Qty').val();
    var harga = +modal.find('option:selected').val();
    modal.find('#total').val((Qty * harga).toFixed(2));
  }
</script> -->

<script>
  // scroll table
  $(document).ready(function() {
    $('#myTable').dataTable({
      scrollX: true,
    });
  });
</script>

<script>
  $(document).ready(function() {
    $(document).on('click', '#set_dtl', function() {
      var cabang = $(this).data('cabang');
      var customer = $(this).data('customer');
      var namapaket = $(this).data('namapaket');
      var estimasiselesai = $(this).data('estimasiselesai');
      var berat = $(this).data('berat');
      var jumlah_item = $(this).data('jumlah_item');
      var total_bayar = $(this).data('total_bayar');
      $('#namecabang').text(cabang);
      $('#namecustomer').text(customer);
      $('#namepaket').text(namapaket);
      $('#estimasiselesai').text(estimasiselesai);
      $('#berat').text(berat);
      $('#jumlah_item').text(jumlah_item);
      $('#total_bayar').text(total_bayar);
    })
  })
</script>

<!-- <script type="text/javascript">
  $(document).ready(function() {
    $(document).on('change', '#jenislaundry', function() {
      // console.log("its change");

      var jumlah = $(this).val();
      console.log(jumlah);
    })
  })
</script> -->

<script type="text/javascript">
  window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
  })
</script>
<script>
  $('.delete').click(function() {
    var deleteid = $(this).attr('data-id');
    var namecustomer = $(this).attr('data-nama');
    swal({
        title: "Yakin Nih?",
        text: "Ingin Menghapus Data Ini dengan nama " + namecustomer + " ? ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/delete/" + deleteid + " ",
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