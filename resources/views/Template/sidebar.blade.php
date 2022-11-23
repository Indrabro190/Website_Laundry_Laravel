<html>
  <head>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  </head>
  <body>
  <style>
  .main-sidebar {
    background: #667db6;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  }

  p {
    color: #fff;
  }

  span p {
    color: #000;
  }

  .brand-link {
    background: #7F00FF;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #E100FF, #7F00FF);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #E100FF, #7F00FF);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  }

  #master {
    background: #667db6;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  }
</style>
<aside class="main-sidebar sidebar-dark-success elevation-4">
  <!-- Brand Logo -->
  <a href="/laundry" class="brand-link">
    <img src="{{asset('dist/img/laundry.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Laundry Bang Indra</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="/dashboard" class="nav-link">
            <i class="fa-solid fa-chart-line"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/dataprofile" class="nav-link">
            <i class="fa-solid fa-user"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active" id="master">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          @if(Auth::user()->level=="admin")
            <li class="nav-item">
              <a href="/user" class="nav-link active">
                <i class="fa-solid fa-users"></i>
                <span>
                  <p>Data User</p>
                </span>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a href="/datacustomer" class="nav-link active">
                <i class="fa-solid fa-person"></i>
                <span>
                  <p>Data Customer</p>
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/datatipepaket" class="nav-link active">
                <i class="fa-solid fa-people-carry-box"></i>
                <span>
                  <p>Jenis Laundry</p>
                </span>
              </a>
            </li>
            @if(Auth::user()->level=="admin")
            <li class="nav-item">
              <a href="/datasatuan" class="nav-link active">
                <i class="fa-solid fa-scale-unbalanced"></i>
                <span>
                  <p>Satuan</p>
                </span>
              </a>
            </li>
            @endif
            @if(Auth::user()->level=="admin")
            <li class="nav-item">
              <a href="/datapaket" class="nav-link active">
                <i class="fa-solid fa-box-open"></i>
                <span>
                  <p>Paket</p>
                </span>
              </a>
            </li>
            @endif
            @if(Auth::user()->level=="admin")
            <li class="nav-item">
              <a href="/datacabang" class="nav-link active">
                <i class="fa-solid fa-house-flag"></i>
                <span>
                  <p>Cabang</p>
                </span>
              </a>
            </li>
            @endif
          </ul>
        </li>
        <li class="nav-item">
          <a href="/transaksi" class="nav-link">
            <i class="fa-solid fa-money-bill-wave"></i>
            <p>
              Transaksi
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
  </body>
</html>