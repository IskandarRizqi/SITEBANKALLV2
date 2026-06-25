<header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="#">
                <img src="{{ asset('frontend/bprtemanggung/assets/img/logo/logo.png') }}" alt="Logo" width="270px;" style="height: 75px;">
            </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
            <li class="dropdown"><a href="#" class="nav-link {{ request()->is('visimisi', 'sejarah', 'pengurus', 'organisasi', 'galery') ? 'active' : '' }}" href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a class="dropdown-item {{ request()->is('visimisi') ? 'active' : '' }}" href="/visimisi">Profil</a></li>
                    <li><a class="dropdown-item {{ request()->is('sejarah') ? 'active' : '' }}" href="/sejarah">Sejarah</a></li>
                    <li><a class="dropdown-item {{ request()->is('pengurus') ? 'active' : '' }}" href="/pengurus">Pengurus</a></li>
                    <li><a class="dropdown-item {{ request()->is('organisasi') ? 'active' : '' }}" href="/organisasi">Struktur Organisasi</a></li>
                    <li><a class="dropdown-item {{ request()->is('galery') ? 'active' : '' }}" href="/galery">Galeri</a></li>
                </ul>
            </li>
    
            <li class="dropdown"><a href="#" class="nav-link {{ request()->is('kredit', 'deposito', 'tabungan') ? 'active' : '' }}" href="#"><span>Produk</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                    <li><a class="dropdown-item {{ request()->is('kredit') ? 'active' : '' }}" href="/kredit">Kredit</a></li>
                    <li><a class="dropdown-item {{ request()->is('deposito') ? 'active' : '' }}" href="/deposito">Deposito</a></li>
                    <li><a class="dropdown-item {{ request()->is('tabungan') ? 'active' : '' }}" href="/tabungan">Tabungan</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="nav-link {{ request()->is('publikasi', 'tahunan', 'laporan-lainnya') ? 'active' : '' }}"><span>Laporan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                    <li><a class="dropdown-item {{ request()->is('publikasi') ? 'active' : '' }}" href="/publikasi">Publikasi</a></li>
                    <li><a class="dropdown-item {{ request()->is('tahunan') ? 'active' : '' }}" href="/tahunan">Tahunan</a></li>
                    <li><a class="dropdown-item {{ request()->is('laporan-lainnya') ? 'active' : '' }}" href="/laporan-lainnya">Lainnya</a></li>
                </ul>
            </li>
            <li><a href="/pengajuanonline" class="nav-link {{ request()->is('pengajuanonline') ? 'active' : '' }}">Pengajuan Online</a></li>
            <li><a href="/lelang-jualaset" class="nav-link {{ request()->is('lelang-jualaset') ? 'active' : '' }}">Lelang</a></li>
            <li class="dropdown"><a href="#" class="nav-link {{ request()->is('simulasi-kredit', 'simulasi-deposito', 'simulasi-tabungan') ? 'active' : '' }}"><span>Simulasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a class="dropdown-item {{ request()->is('simulasi-kredit') ? 'active' : '' }}" href="/simulasi-kredit">Simulasi Kredit</a></li>
                    <li><a class="dropdown-item {{ request()->is('simulasi-deposito') ? 'active' : '' }}" href="/simulasi-deposito">Simulasi Deposito</a></li>
                    <li><a class="dropdown-item {{ request()->is('simulasi-tabungan') ? 'active' : '' }}" href="/simulasi-tabungan">Simulasi Tabungan</a></li>
                </ul>
            </li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- <nav class="navbar navbar-expand-lg" id="nav">
         <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('frontend/bpreleska/assets/img/logo/logo.png') }}" alt="Logo" width="270px;">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <i class="fas fa-bars" style="color:var(--primary);font-size:1.35rem;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('visimisi', 'sejarah', 'pengurus', 'organisasi', 'galery') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown" data-bs-auto-close="true">
                        Tentang Kami
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->is('visimisi') ? 'active' : '' }}" href="/visimisi">Profil</a></li>
                        <li><a class="dropdown-item {{ request()->is('sejarah') ? 'active' : '' }}" href="/sejarah">Sejarah</a></li>
                        <li><a class="dropdown-item {{ request()->is('pengurus') ? 'active' : '' }}" href="/pengurus">Pengurus</a></li>
                        <li><a class="dropdown-item {{ request()->is('organisasi') ? 'active' : '' }}" href="/organisasi">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item {{ request()->is('galery') ? 'active' : '' }}" href="/galery">Galeri</a></li>
                    </ul>
                    </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('kredit', 'deposito', 'tabungan') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown" data-bs-auto-close="true">
                        Produk
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->is('kredit') ? 'active' : '' }}" href="/kredit">Produk Kredit</a></li>
                        <li><a class="dropdown-item {{ request()->is('tabungan') ? 'active' : '' }}" href="/tabungan">Produk Tabungan</a></li>
                        <li><a class="dropdown-item {{ request()->is('deposito') ? 'active' : '' }}" href="/deposito">Produk Deposito</a></li>
                    </ul>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link {{ request()->is('lelang-jualaset') ? 'active' : '' }}" href="/lelang-jualaset">Lelang</a>
                    </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('publikasi', 'tahunan', 'tatakelola', 'keberlanjutan', 'akb', 'piagamaudit', 'laporan-lainnya') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown" data-bs-auto-close="true">
                        Laporan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->is('publikasi') ? 'active' : '' }}" href="/publikasi">Laporan Publikasi</a></li>
                        <li><a class="dropdown-item {{ request()->is('laporan-lainnya') ? 'active' : '' }}" href="/laporan-lainnya">Laporan Lainnya</a></li>
                    </ul>
                    </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="true">
                        Simulasi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->is('simulasi-kredit') ? 'active' : '' }}" href="/simulasi-kredit">Simulasi Kredit</a></li>
                        <li><a class="dropdown-item {{ request()->is('simulasi-tabungan') ? 'active' : '' }}" href="/simulasi-tabungan">Simulasi Tabungan</a></li>
                        <li><a class="dropdown-item {{ request()->is('simulasi-deposito') ? 'active' : '' }}" href="/simulasi-deposito">Simulasi Deposito</a></li>
                    </ul>
                    </li>

                </ul>

                <div class="d-flex align-items-center gap-1">
                    <a href="/pengajuanonline" class="nav-link nav-cta {{ request()->is('pengajuanonline') ? 'active' : '' }}">Pengajuan Online</a>
                </div>
                </div>
         </div>
    </nav>   -->
  
