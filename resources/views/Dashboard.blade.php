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

    .span {
      background: #FFEFBA;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #FFFFFF, #FFEFBA);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #FFFFFF, #FFEFBA);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    #kotak {
      background: #FC5C7D;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #6A82FB, #FC5C7D);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #6A82FB, #FC5C7D);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }

    #laporan {
      background: #C9D6FF;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #E2E2E2, #C9D6FF);
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight:600; color:#fff; text-shadow:1px 1px 1px black;"><i class="fa-solid fa-download"></i></a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/exportpdf">Download PDF</a></li>
            <li><a class="dropdown-item" href="/exportexcel">Download Excel</a></li>
          </ul>
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
              <div class="info-box" style="box-shadow: 1px 1px 10px black;" id="kotak">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-weight: 700; color: #00B2CB;">Customer</span>
                  <span class="info-box-number" style="text-shadow:1px 1px 1px #fff;">
                    {{ $customer1 }}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-3">
              <div class="info-box mb-3" style="box-shadow: 1px 1px 10px black;" id="kotak">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-weight: 700; color: red;">User</span>
                  <span class="info-box-number" style="text-shadow:1px 1px 1px #fff;">
                    {{ $user }}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-3">
              <div class="info-box" style="box-shadow: 1px 1px 10px black;" id="kotak">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-weight: 700; color: green;">Transaksi</span>
                  <span class="info-box-number" style="text-shadow:1px 1px 1px #fff;">
                    {{ $hitung }}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-3">
              <div class="info-box mb-3" style="box-shadow: 1px 1px 10px black;" id="kotak">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-weight: 700; color: yellow;">Pendapatan</span>
                  <span class="info-box-number" id="lb_total" style="text-shadow:1px 1px 1px #fff;"></span>
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



        <!-- /.content -->
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card" style="box-shadow: 1px 2px 15px black;" id="laporan">
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
                        <table class="table table-bordered" style="box-shadow: 1px 5px 18px black;">
                          <tbody>

                            <tr align="center">
                              <td>Total Pemesanan</td>
                              <td>
                                <label type="text" id="lb_total1"></label>
                              </td>
                            </tr>

                            <tr align="center">
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
                              @foreach($transaksi as $m)
                              @php
                              $total += $m->namapaket->harga * $m->Qty;
                              @endphp
                              <tr align="center">
                                <td>{{ $loop->iteration}}</td>
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


    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('Template.footer')
  </div>
  <!-- ./wrapper -->

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

</html>