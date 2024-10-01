<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/data-siswa">
              <i class="bi bi-circle"></i><span>Data Siswa</span>
            </a>
          </li>
          <li>
            <a href="/data-buku">
              <i class="bi bi-circle"></i><span>Data Buku</span>
            </a>
          </li>
          <li>
            <a href="/data-kelas">
              <i class="bi bi-circle"></i><span>Data Kelas</span>
            </a>
          </li>
          
        </ul>
        
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-trans" data-bs-toggle="collapse" href="#">
          <i class="bi bi-receipt-cutoff"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-trans" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/peminjaman">
              <i class="bi bi-circle"></i><span>Peminjaman</span>
            </a>
          </li>
          <li>
            <a href="/pengembalian">
              <i class="bi bi-circle"></i><span>Pengembalian</span>
            </a>
          </li>
          
        </ul>
        
      </li><!-- End Components Nav -->




    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

   

    <section class="section">
      @yield('content')
    </section>

  </main><!-- End #main -->

  