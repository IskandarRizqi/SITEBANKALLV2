<nav class="navbar navbar-expand-lg" id="nav">
         <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('frontend/bprbkkbatang/assets/img/logo/logo.png') }}" alt="Logo" width="270px;">
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
                        <li><a class="dropdown-item {{ request()->is('tahunan') ? 'active' : '' }}" href="/tahunan">Laporan Tahunan</a></li>
                        <li><a class="dropdown-item {{ request()->is('tatakelola') ? 'active' : '' }}" href="/tatakelola">Laporan Tata Kelola</a></li>
                        <li><a class="dropdown-item {{ request()->is('keberlanjutan') ? 'active' : '' }}" href="/keberlanjutan">Laporan Keberlanjutan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{ request()->is('akb') ? 'active' : '' }}" href="/akb">Laporan AKB</a></li>
                        <li><a class="dropdown-item {{ request()->is('piagamaudit') ? 'active' : '' }}" href="/piagamaudit">Piagam Audit Internal</a></li>
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
      </nav>  
  


  <!-- Navbar & Hero Start -->
  <!-- <div class="container-fluid sticky-top px-0">
      <div class="position-absolute bg-danger" style="left: 0; top: 0; width: 100%; height: 100%;">
      </div>
      <div class="container px-0">
          <nav class="navbar navbar-expand-lg navbar-dark bg-white py-3 px-4">
              <a href="index.html" class="navbar-brand p-0">
                  {{-- <h1 class="text-primary m-0"><i class="fas fa-donate me-3"></i>Investa</h1> --}}
                  <img src="{{ asset('frontend/bprsahabattata/img/logo/logo.png') }}" alt="Logo" width="270px;">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                  <span class="fa fa-bars"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                  <div class="navbar-nav ms-auto py-0">
                      <a href="/" class="nav-item nav-link  {{ request()->is('/') ? 'active' : '' }}">Beranda</a>


                      <div class="nav-item dropdown">
                          <a href="#"
                              class="nav-link dropdown-toggle {{ request()->is('visimisi', 'sejarah', 'pengurus', 'organisasi', 'galery') ? 'active' : '' }}"
                              data-bs-toggle="dropdown">Tentang Kami</a>
                          <div class="dropdown-menu m-0">
                              <a href="/visimisi"
                                  class="dropdown-item {{ request()->is('visimisi') ? 'active' : '' }}">Profil</a>
                              <a href="/sejarah"
                                  class="dropdown-item {{ request()->is('sejarah') ? 'active' : '' }}">Sejarah</a>
                              <a href="/pengurus"
                                  class="dropdown-item {{ request()->is('pengurus') ? 'active' : '' }}">Pengurus</a>
                              <a href="/organisasi"
                                  class="dropdown-item {{ request()->is('organisasi') ? 'active' : '' }}">Struktur
                                  Organisasi</a>
                              <a href="/galery"
                                  class="dropdown-item {{ request()->is('galery') ? 'active' : '' }}">Galery</a>
                          </div>
                      </div>
                      <div class="nav-item dropdown">
                          <a href="#"
                              class="nav-link dropdown-toggle {{ request()->is('kredit', 'deposito', 'tabungan') ? 'active' : '' }}"
                              data-bs-toggle="dropdown">Produk</a>
                          <div class="dropdown-menu m-0">
                              <a href="/kredit"
                                  class="dropdown-item  {{ request()->is('kredit') ? 'active' : '' }}">Produk Kredit</a>
                              <a href="/tabungan"
                                  class="dropdown-item  {{ request()->is('tabungan') ? 'active' : '' }}">Produk
                                  Tabungan</a>
                              <a href="/deposito"
                                  class="dropdown-item {{ request()->is('deposito') ? 'active' : '' }}">Produk
                                  Deposito</a>
                          </div>
                      </div>

                      <a href="lelang-jualaset"
                          class="nav-item nav-link {{ request()->is('lelang-jualaset') ? 'active' : '' }}">Lelang</a>
                      <div class="nav-item dropdown">
                          <a href="#"
                              class="nav-link dropdown-toggle  {{ request()->is('publikasi', 'tahunan', 'tatakelola', 'keberlanjutan') ? 'active' : '' }}"
                              data-bs-toggle="dropdown">Laporan</a>
                          <div class="dropdown-menu m-0">
                              <a href="/publikasi"
                                  class="dropdown-item {{ request()->is('publikasi') ? 'active' : '' }}">Laporan
                                  Publikasi</a>
                              <a href="/tahunan"
                                  class="dropdown-item  {{ request()->is('tahunan') ? 'active' : '' }}">Laporan
                                  Tahunan</a>
                              <a href="/tatakelola"
                                  class="dropdown-item  {{ request()->is('tatakelola') ? 'active' : '' }}">Laporan Tata
                                  Kelola</a>
                              <a href="/keberlanjutan"
                                  class="dropdown-item {{ request()->is('keberlanjutan') ? 'active' : '' }}">Laporan
                                  Keberlanjutan</a>
                              <a href="/akb"
                                  class="dropdown-item {{ request()->is('akb') ? 'active' : '' }}">Laporan
                                  AKB</a>
                              <a href="/piagamaudit"
                                  class="dropdown-item {{ request()->is('piagamaudit') ? 'active' : '' }}">Laporan
                                  Piagam Audit Internal</a>
                              <a href="/laporan-lainnya"
                                  class="dropdown-item {{ request()->is('laporan-lainnya') ? 'active' : '' }}">Laporan
                                  Lainnya</a>

                          </div>
                      </div>
                      <a href="/pengajuanonline"
                          class="nav-item nav-link {{ request()->is('pengajuanonline') ? 'active' : '' }}">Pengajuan
                          Online</a>
                  </div>
                  <div class="dropdown ms-2">
                      <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 dropdown-toggle"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Simulasi
                      </a>

                      <ul class="dropdown-menu dropdown-menu-end">
                          <li>
                              <a class="dropdown-item" href="/simulasi-kredit">
                                  Simulasi Kredit
                              </a>
                          </li>
                          <li>
                              <a class="dropdown-item" href="/simulasi-tabungan">
                                  Simulasi Tabungan
                              </a>
                          </li>
                          <li>
                              <a class="dropdown-item" href="/simulasi-deposito">
                                  Simulasi Deposito
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
      </div>
  </div> -->
  <!-- Navbar & Hero End -->
