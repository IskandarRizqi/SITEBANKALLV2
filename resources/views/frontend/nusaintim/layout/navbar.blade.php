<!--=====HEADER START=======-->



<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pera">
                    <p><img src="frontend/nusaintim/assets/img/icons/header-top-span.png" alt=""> BPR Nusa Intim
                        Mitra Tepat untuk Tumbuh dan Berkembang</p>
                </div>
            </div>
        </div>
    </div>
</div>
<header>
    <div class="header-area header-area1 header-area-all d-none d-lg-block" id="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-elements">
                        <div class="site-logo">
                            <a href="/">
                                <img src="frontend/nusaintim/assets/img/logo/logo.png" style="height: 77px;"
                                    alt="">
                            </a>
                        </div>


                        <div class="main-menu-ex main-menu-ex1">
                            <ul>

                                <li><a href="/">Home </a>

                                </li>

                                <li><a href="#about">Tentang Kami </a></li>

                                <li class="dropdown-menu-parrent"><a href="#">Produk <i
                                            class="fa-solid fa-angle-down"></i></a>
                                    <ul>
                                        <li><a href="/kredit">Kredit</a></li>
                                        <li><a href="/deposito">Deposito</a></li>
                                        <li><a href="/tabungan">Tabungan</a></li>

                                    </ul>
                                </li>


                                <li class="dropdown-menu-parrent"><a href="#">Laporan <i
                                            class="fa-solid fa-angle-down"></i></a>
                                    <ul>
                                        <li><a href="/publikasi">Publikasi </i></a></li>
                                        <li><a href="/tatakelola">Tata Kelola </i></a></li>
                                        <li><a href="/tahunan">Tahunan </i></a></li>
                                        <li><a href="/keberlanjutan">Keberlanjutan </i></a></li>

                                    </ul>
                                </li>
                                <li><a href="/faq">Bantuan </a></li>

                            </ul>

                        </div>

                        <div class="header1-buttons ml-auto d-flex align-items-center">
                            <div class="button">
                                <a class="theme-btn1" href="/pengajuanonline">
                                    Pengajuan Online <span><i class="fa-solid fa-arrow-right"></i></span>
                                </a>
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
                    <a href="/"><img src="frontend/nusaintim/assets/img/logo/logo.png"
                            style="height: 60px; width: 50px;" alt=""></a>
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
        <a href="/"><img src="frontend/nusaintim/assets/img/logo/logo.png" style="height: 60px; width: 50px;"
                alt=""></a>
    </div>
    <div class="menu-close">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <div class="mobile-nav">

        <ul>
            <li class="has-dropdown"><a href="/">Home </a> </li>
            <li><a href="/#about">Tentang Kami</a></li>
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

            <li class="has-dropdown"><a href="faq">Bantuan</a> </li>




            <div class="mobile-button">
                <a class="menu-btn2" href="pengajuanonline">Pengajuan Online <span><i
                            class="fa-solid fa-arrow-right"></i></span></a>
            </div>

            <div class="single-footer-items">
                <h3>Hubungi Kami</h3>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/nusaintim/assets/img/icons/footer1-icon1.png" alt="">
                    </div>
                    <div class="pera">
                        <a href="tel:(0967) 524482">(0967) 524482</a>
                    </div>
                </div>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/nusaintim/assets/img/icons/wa.png" alt=""
                            style="width: 23px; height: 23px; filter: brightness(0) invert(1);">
                    </div>
                    <div class="pera">
                        <a href="https://wa.me/62967593195" target="_blank">0967593195</a>
                    </div>
                </div>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/nusaintim/assets/img/icons/footer1-icon3.png" alt="">
                    </div>
                    <div class="pera">
                        <a href="mailto:nusaintim@yahoo.com" style="font-size: 15px;">nusaintim@yahoo.com</a>
                    </div>
                </div>


                <div class="contact-infos">
                    <ul class="social-icon">
                        <li><a
                                href="https://web.facebook.com/people/Bpr-Nusa-Intim/pfbid0EbfXzGEpxYtKWm8vYKwq7HgyoGcbQypCyjBMf9PQTmu3DtSydwF6pzRNpw7opyCjl/"><i
                                    class="fa-brands fab fa-facebook-f"></i></a></li>
                        {{-- <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li> --}}
                        <li><a href="https://www.youtube.com/watch?v=H16FqvSvDbM"><i
                                    class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/bprnusaintim/"><i
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
