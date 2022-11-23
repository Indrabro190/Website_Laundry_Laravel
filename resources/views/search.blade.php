<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>Dashboard</title>
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

        div.dataTables_wrapper {
            width: 600px;
            margin: 0 auto;
        }

        #transaksi {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #transaksi td,
        #transaksi th {
            border: 1px solid #ddd;
            padding: 10px;
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
            background-color: #889496;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <!-- Navbar -->
        @include('Template.navbar')
        <!-- /.navbar -->
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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/laundry">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- Content Wrapper. Contains page content -->
            <!-- <div class="content-wrapper"> -->
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Customer</span>
                                    <span class="info-box-number">
                                        {{ $customer1 }}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">User</span>
                                    <span class="info-box-number">{{ $user }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Transaksi</span>
                                    <span class="info-box-number">
                                        {{ $hitung }}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan</span>
                                    <span class="info-box-number" id="lb_total"></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- /.row -->

                    <!-- <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Grafik transaksi bulanan</h5>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                      <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                        <a class="dropdown-divider"></a>
                        <a href="#" class="dropdown-item">Separated link</a>
                      </div>
                    </div>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div> -->
                    <!-- /.card-header -->

                    <!-- ./card-body -->
                    <!-- <div class="card-body">
                  <div id="grafik"></div>
                </div> -->
                    <!-- /.card-footer -->
                    <!-- </div> -->
                    <!-- /.card -->
                    <!-- </div> -->
                    <!-- /.col -->
                    <!-- </div> -->
                    <!-- <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Grafik transaksi Harian</h5>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                      <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                        <a class="dropdown-divider"></a>
                        <a href="#" class="dropdown-item">Separated link</a>
                      </div>
                    </div>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div> -->
                    <!-- /.card-header -->

                    <!-- ./card-body -->
                    <!-- <div class="card-body">
                  <div id="harian"></div>
                </div> -->
                    <!-- /.card-footer -->
                    <!-- </div> -->
                    <!-- /.card -->
                    <!-- </div> -->
                    <!-- /.col -->
                    <!-- </div> -->
                    <!-- /.row -->


                    <!-- Main row -->
                </div>
                <!-- /.col -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Laporan Transaksi</h3>
                                        <form action="/search" method="POST">
                                            @csrf
                                            <br>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <div class="form-group row">
                                                            <label for="date" class="col-form-label col-sm-2">Dari Tanggal :</label>
                                                            <div class="col-sm-3">
                                                                <input type="date" class="form-control input-sm" id="from" name="from" required>
                                                            </div>
                                                            <label for="date" class="col-form-label col-sm-2">Sampai Tgl :</label>
                                                            <div class="col-sm-3">
                                                                <input type="date" class="form-control input-sm" id="to" name="to" required>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <button type="submit" class="btn" name="search" title="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="card-body" id="transaksi">
                                        <div class="row">
                                            <div class="col col-lg-4 col-md-4">
                                                <h4 class="text-center" style="font-weight: 600;">Ringkasan Transaksi</h4>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>Total Penjualan</td>
                                                            <td>
                                                                <label type="text" id="lb_total1"></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Transaksi</td>
                                                            <td>{{$hitung}} Transaksi</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col col-lg-8 col-md-8">
                                                <h4 class="text-center">Rincian Transaksi</h4>
                                                <div class="table-responsive">
                                                    <table id="example" class="display nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tanggal Transaksi</th>
                                                                <th>Cabang</th>
                                                                <th>Paket</th>
                                                                <th>Harga</th>
                                                                <th>Qty</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $total = 0;
                                                            @endphp
                                                            @foreach($transaksi as $index => $m)
                                                            @php
                                                            $total += $m->namapaket->harga * $m->Qty;
                                                            @endphp
                                                            <tr align="center">
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{ $m->created_at->format('d/m/Y')}}</td>
                                                                <td>{{ $m->cabang->namecabang }}</td>
                                                                <td>{{ $m->namapaket->namepaket }}</td>
                                                                <td>{{ $m->namapaket->harga }}</td>
                                                                <td>{{ $m->Qty }}</td>
                                                                <td>Rp. {{ number_format($m->namapaket->harga * $m->Qty) }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{ $transaksi->Links() }}
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
        </div>

        <!-- /.content -->
        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- /.content-wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('Template.script')
    <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

</body>
<script>
    // scroll table
    $(document).ready(function() {
        $('#example').DataTable({
            scrollX: true,
        });

        $('#lb_total').text('Rp.{{number_format($total) }}');
        $('#lb_total1').text('Rp.{{number_format($total) }}');

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

</html>