<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  @yield('css')

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-block d-md-none">PERPUSDA</span>
        <span class="d-none d-md-block">PERPUSDA</span>
      </a>  

      <!-- Toggle Button -->
      <i class="bi bi-list toggle-header-btn" data-bs-toggle="collapse" data-bs-target="#menuBar"></i>

      <!-- Profile Dropdown and Login Button -->
      <nav class="header-nav ms-auto d-flex align-items-center">
        <ul class="d-flex align-items-center mb-0">
          <!-- Login Button -->
          <li class="nav-item me-2">
            <a class="btn btn-primary" href="{{ route('admin.login.form') }}">Login</a>
          </li>

          <!-- Profile Dropdown -->
          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <!-- Add an icon or profile picture here if needed -->
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>Dava Rizky</h6>
                <span>Junior Developer</span>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item d-flex align-items-center" href="/profile"><i class="bi bi-person"></i> <span>My Profile</span></a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Menu Bar -->
  <div class="container py-4">
    <div class="collapse" id="menuBar">
      <div class="row">
        @if(isset($kategoris) && $kategoris->isNotEmpty())
          @foreach($kategoris as $kategori)
            <div class="col-md-4 col-12">
              <ul class="list-unstyled">
                <li>
                  <h5><a href="{{ route('kategori.show', $kategori->kode_kategori) }}">{{ $kategori->nama_kategori }}</a></h5>
                </li>
              </ul>
            </div>
          @endforeach
        @else
          <p>No categories available.</p>
        @endif
      </div>
    </div>
  </div>
  

  @yield('content')

</body>
</html>
