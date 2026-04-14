  <!-- Topbar Start -->
  <div class="container-fluid topbar px-0 d-none d-lg-block">
      <div class="container px-0">
          <div class="row gx-0 align-items-center" style="height: 45px;">
              <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                  <div class="d-flex flex-wrap">
                      <a href="https://www.google.com/maps/place/Pt+Bpr+Kotabaru/@-3.2494793,116.2207901,17z/data=!3m1!4b1!4m6!3m5!1s0x2def302cb6c251ab:0x7919a61a5ad7bfdf!8m2!3d-3.2494847!4d116.223365!16s%2Fg%2F11ltp1yrr5?entry=ttu&g_ep=EgoyMDI2MDMyNC4wIKXMDSoASAFQAw%3D%3D"
                          class="text-white me-4 " target="_blank"><i
                              class="fas fa-map-marker-alt text-white me-2"></i>Maps</a>
                        <a href="tel:085124525" class="text-white me-4">
                          <i class="fas fa-phone-alt text-white me-2"></i>085124525
                          </a>
                          <a href="#" class="text-white me-0"><i class="fas fa-envelope text-white me-2"></i>
                              bankKotabaru_perseroda@yahoo.com</a>
                  </div>
              </div>
              <div class="col-lg-4 text-center text-lg-end">
                  <div class="d-flex align-items-center justify-content-end">
                      <a href="#" class="btn btn-red btn-square rounded-circle nav-fill me-3"><i
                              class="fab fa-facebook-f text-white"></i></a>
                      <a href="#" class="btn btn-red btn-square rounded-circle nav-fill me-3"><i
                              class="fab fa-twitter text-white"></i></a>
                      <a href="https://www.instagram.com/bpr.bankkotabaru/"
                          class="btn btn-red btn-square rounded-circle nav-fill me-3"><i
                              class="fab fa-instagram text-white"></i></a>
                      <a href="#" class="btn btn-red btn-square rounded-circle nav-fill me-0"><i
                              class="fab fa-linkedin-in text-white"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Topbar End -->


  <!-- Navbar & Hero Start -->
  <div class="container-fluid sticky-top px-0">
      <div class="position-absolute bg-info" style="left: 0; top: 0; width: 100%; height: 100%;">
      </div>
      <div class="container px-0">
          <nav class="navbar navbar-expand-lg navbar-dark bg-white py-3 px-4">
              <a href="index.html" class="navbar-brand p-0">
                  {{-- <h1 class="text-primary m-0"><i class="fas fa-donate me-3"></i>Investa</h1> --}}
                  <img src="{{ asset('frontend/bprkotabaru/img/logo/logo.png') }}" alt="Logo" width="270px;">
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
  </div>
  <!-- Navbar & Hero End -->
