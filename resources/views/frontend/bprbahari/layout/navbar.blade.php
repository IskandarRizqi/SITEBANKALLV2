<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="top-bar-area inc-pad bg-gradient text-light">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6 info">
                <ul>
                    <li>
                        <i class="fas fa-phone-alt"></i> (0283) 353879
                    </li>
                    <li>
                        <i class="fas fa-envelope-open"></i> bprbapastegal@gmail.com
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 text-right item-flex">
                <div class="info">
                    <ul>
                        <li>
                            <i class="fas fa-clock"></i> Buka : 8:00 – 15:00
                        </li>
                    </ul>
                </div>
                {{-- <div class="social">
                       <ul>
                           <li>
                               <a href="#">
                                   <i class="fab fa-facebook-f"></i>
                               </a>
                           </li>
                           <li>
                               <a href="#">
                                   <i class="fab fa-twitter"></i>
                               </a>
                           </li>
                           <li>
                               <a href="#">
                                   <i class="fab fa-linkedin-in"></i>
                               </a>
                           </li>
                       </ul>
                   </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- End Header Top -->

<header>
    <nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed dark no-background">

        <div class="container d-flex justify-content-between align-items-center">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('frontend/bprbahari/assets/img/logo/logo.png') }}" class="logo" alt="Logo"
                        width="170px">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-menu">

                <img src="{{ asset('frontend/bprbahari/assets/img/logo/logo.png') }}" alt="Logo" width="170px">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-times"></i>
                </button>

                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                    <li>
                        <a href="/">Beranda</a>

                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a href="/profile">Profile</a></li>
                            <li><a href="/sejarah">Sejarah</a></li>
                            <li><a href="/pengurus">Pengurus</a></li>
                            <li><a href="/organisasi">Struktur Organisai</a></li>
                            <li><a href="/galery">Gallery</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produk</a>
                        <ul class="dropdown-menu">
                            <li><a href="/kredit">Kredit</a></li>
                            <li><a href="/tabungan">Tabungan</a></li>
                            <li><a href="/deposito">Deposito</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Weekend Banking</a></li>
                            <li><a href="#">PPOB</a></li>
                            <li><a href="#">Safe Deposit Box</a></li>
                            <li><a href="#">Kiriman Uang </a></li>
                            <li><a href="#">Bakti UMKM</a></li>
                            <li><a href="#">POS</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan</a>
                        <ul class="dropdown-menu">
                            <li><a href="/publikasi">Publikasi</a></li>
                            <li><a href="/tahunan">Tahunan</a></li>
                            <li><a href="/tatakelola">Tata Kelola</a></li>
                            <li><a href="/Keberlanjutan">Keberlanjutan</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Simulasi</a>
                        <ul class="dropdown-menu">
                            <li><a href="/simulasi-kredit">Simulasi Kredit</a></li>
                            <li><a href="/simulasi-tabungan">Simulasi Tabungan</a></li>
                            <li><a href="/simulasi-deposito">Simulasi Deposito</a></li>


                        </ul>
                    </li>
                </ul>
            </div>

            <div class="attr-right">
                <div class="attr-nav">
                    <ul>
                        <li class="contact">
                            <div class="call">
                                {{-- <div class="icon">
                                       <i class="fas fa-comments-alt-dollar"></i>
                                   </div> --}}
                                <h5
                                    style="font-size: 15px; background: #0b2c5f; display: inline-block; padding: 10px 18px; border-radius: 8px;">
                                    <a href="/pengajuanonline" style="color: #fff; text-decoration: none;">
                                        Pengajuan Online
                                    </a>
                                </h5>
                                {{-- <div class="info">
                                       <p>Ada yang di Tanyakan?</p>
                                       <h5><a href="mailto:info@crysta.com">info@bestup.com</a></h5>
                                   </div> --}}
                            </div>
                        </li>
                        <li>
                            @auth
                                @if (auth()->user()->role == 1)
                                    <div class="account-icon" style="margin-left: 40px;" alt="Profile">
                                        <a href="/dashboarduser" style="font-size: 25px; color: #333;">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </a>
                                    </div>
                                @endif
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="overlay-screen"></div>
    </nav>
</header>
