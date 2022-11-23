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