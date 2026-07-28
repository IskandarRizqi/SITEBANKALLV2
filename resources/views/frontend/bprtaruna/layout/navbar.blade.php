<!--=====HEADER START=======-->

<header>
    <div class="header-area header-area1 header-area-all d-none d-lg-block" id="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-elements">
                        <div class="site-logo">
                            <a href="/">
                                <img src="{{ asset('frontend/bprtaruna/assets/img/logo/logo.png') }}"
                                    style="height: 25px;  width: 120px; transform: scale(1.7); transform-origin: center; margin-top: 0px; margin-left: 30px; object-fit: fill;"
                                    alt="">
                            </a>
                            {{-- <a href="/">
                                <img src="{{ asset('frontend/bprtaruna/assets/img/logo/logo.png') }}" alt="logo"
                                    style="height: 25px;  width: 120px;transform-origin: center; margin-left: 100px; object-fit: fill;">

                            </a> --}}
                        </div>


                        <div class="main-menu-ex main-menu-ex1">
                            <ul>

                                <li><a href="/">Home </a></li>
                                <li class="dropdown-menu-parrent"><a href="#">Profil <i
                                            class="fa-solid fa-angle-down"></i></a>
                                    <ul>
                                        <li><a href="/visimisi">Profil </i></a></li>
                                        <li><a href="/sejarah">Sejarah </i></a></li>
                                        <li><a href="/pengurus">Pengurus </i></a></li>
                                        <li><a href="/organisasi">Struktur Organisasi </i></a></li>

                                    </ul>
                                </li>
                                <li class="dropdown-menu-parrent"><a href="#">Produk <i
                                            class="fa-solid fa-angle-down"></i></a>
                                    <ul>
                                        <li><a href="/kredit">Kredit</a></li>
                                        <li><a href="/deposito">Deposito</a></li>
                                        <li><a href="/tabungan">Tabungan</a></li>

                                    </ul>
                                </li>
                                {{-- <li class="dropdown-menu-parrent"><a href="#">Laporan <i
                                            class="fa-solid fa-angle-down"></i></a>
                                    <ul>
                                        <li><a href="/publikasi">Publikasi </i></a></li>
                                        <li><a href="/tatakelola">Tata Kelola </i></a></li>
                                        <li><a href="/tahunan">Tahunan </i></a></li>
                                        <li><a href="/keberlanjutan">Keberlanjutan </i></a></li>

                                    </ul>
                                </li> --}}
                                <li><a href="/publikasi">Laporan </a></li>
                                <li><a href="/pengajuanonline">Pengajuan Online </a></li>
                                <li><a href="/lelang-jualaset">Lelang </a></li>

                            </ul>

                        </div>

                        <div class="header1-buttons ml-auto d-flex align-items-center">
                            <div class="header1-buttons ml-auto d-flex align-items-center">
                                <div class="button" style="position: relative; display: inline-block;"
                                    onmouseover="this.querySelector('.dropdown-inline').style.display='block'"
                                    onmouseout="this.querySelector('.dropdown-inline').style.display='none'">

                                    <a class="theme-btn1" href="#"
                                        style="padding:20px 18px; font-size:14px; line-height:1.0;">
                                        Simulasi <span><i class="fa-solid fa-angle-down"></i></span>
                                    </a>

                                    <div class="dropdown-inline"
                                        style="
                                        position: absolute;
                                        top: 100%;
                                        left: 0;
                                        min-width: 200px;
                                        background: #ffffff;
                                        border-radius: 8px;
                                        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
                                        padding: 10px 0;
                                        display: none;
                                        z-index: 999;
                                    ">

                                        <a href="/simulasi-kredit"
                                            style="display:block;padding:10px 20px;text-decoration:none;color:#333;">Kredit</a>
                                        <a href="/simulasi-deposito"
                                            style="display:block;padding:10px 20px;text-decoration:none;color:#333;">Deposito</a>
                                        <a href="/simulasi-tabungan"
                                            style="display:block;padding:10px 20px;text-decoration:none;color:#333;">Tabungan</a>
                                    </div>
                                </div>

                                @auth
                                    @if (auth()->user()->role == 1)
                                        <div class="account-icon" style="margin-left: 40px;" alt="Profile">
                                            <a href="/dashboarduser" style="font-size: 25px; color: #333;">
                                                <i class="fa-solid fa-user-tie"></i>
                                            </a>
                                        </div>
                                    @endif
                                @endauth
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
<!--=====HEADER END=======-->

<!--=====Mobile header start=======-->
<div class="mobile-header d-block d-lg-none ">
    <div class="container-fluid">
        <div class="col-12">
            <div class="mobile-header-elements">
                <div class="mobile-logo">
                    <a href="/"><img src="frontend/bprtaruna/assets/img/logo/logo.png"
                            style="width: 190px; height: auto;" alt=""></a>
                </div>
                <div class="mobile-nav-icon">
                    <i class="fa-duotone fa-bars-staggered"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-sidebar d-block d-lg-none">
    <div class="logo-m">
        <a href="/"><img src="frontend/bprtaruna/assets/img/logo/logo.png" style="width: 190px; height: auto; "
                alt=""></a>
    </div>
    <div class="menu-close">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <div class="mobile-nav">

        <ul>
            <li class="has-dropdown"><a href="/">Home </a> </li>
            <li class="has-dropdown"><a href="#">Profil</a>
                <ul class="sub-menu">
                    <li><a href="/visimisi">Profil</a></li>
                    <li><a href="/sejarah">Sejarah</a></li>
                    <li><a href="/pengurus">Pengurus</a></li>
                    <li><a href="/organisasi">Struktur Organisasi</a></li>
                </ul>
            </li>
            <li class="has-dropdown"><a href="#">Produk</a>
                <ul class="sub-menu">
                    <li><a href="/kredit">Kredit</a></li>
                    <li><a href="/deposito">Deposito</a></li>
                    <li><a href="/tabungan">Tabungan</a></li>
                </ul>
            </li>

            <li class="has-dropdown"><a href="#">Laporan</a>
                <ul class="sub-menu">
                    <li><a href="/publikasi">Publikasi</a></li>
                    <li><a href="/tatakelola">Tata Kelola</a></li>
                    <li><a href="/tahunan">Tahunan</a></li>
                    <li><a href="/keberlanjutan">Keberlanjutan</a></li>
                </ul>
            </li>

            <li class="has-dropdown"><a href="/lelang-jualaset">Lelang</a> </li>




            <div class="mobile-button">
                <a class="menu-btn2" href="/pengajuanonline">Pengajuan Online <span><i
                            class="fa-solid fa-arrow-right"></i></span></a>
            </div>

            <div class="single-footer-items">
                <h3>Hubungi Kami</h3>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/bprtaruna/assets/img/icons/footer1-icon1.png" alt="">
                    </div>
                    <div class="pera">
                        <a href="tel:(0291) 4311911">(0291) 4311911</a>
                    </div>
                </div>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/bprtaruna/assets/img/icons/wa.png" alt=""
                            style="width: 23px; height: 23px; filter: brightness(0) invert(1);">
                    </div>
                    <div class="pera">
                        <a href="https://wa.me/6285723526093" target="_blank">6285723526093</a>
                    </div>
                </div>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/bprtaruna/assets/img/icons/footer1-icon3.png" alt="">
                    </div>
                    <div class="pera">
                        <a href="mailto:banktaruna@gmail.com" style="font-size: 15px;">banktaruna@gmail.com</a>
                    </div>
                </div>


                <div class="contact-infos">
                    <ul class="social-icon">
                        <li><a href="https://id-id.facebook.com/BPRTarunaAdidayaSantos4/"><i
                                    class="fa-brands fab fa-facebook-f"></i></a></li>
                        {{-- <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li> --}}
                        <li><a href="https://www.youtube.com/watch?v=H16FqvSvDbM"><i
                                    class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/bprtarunaadidayasantosa/"><i
                                    class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>

            </div>
    </div>

    </ul>
</div>


<!--=====Mobile header end=======-->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navLink = document.querySelector('a[href="#about"]');
        if (navLink) {
            const onIndex = window.location.pathname.endsWith("/") || window.location.pathname === "/";
            if (!onIndex) {
                navLink.setAttribute("href", "/#about");
            }
        }
    });
</script>
