<style>
    .pxn_main_navigation ul li .sub-menu {
        background-color: #0a1c92;
        /* hijau lebih soft */
        border-radius: 6px;

    }
</style>

<!-- start: Search Popup -->
<div class="pxn_search_popup_overlay"></div>
<div class="pxn_search_popup">
    <div class="search_close">
        <button type="button" class="search_close_btn">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round">
                </path>
                <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round">
                </path>
            </svg>
        </button>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form action="#" class="search_form">
                    <h2 class="search_title">Search portfolios, services or blogs...</h2>
                    <div class="search_box">
                        <input class="search-input-field" type="search" placeholder="Search here..." required>
                        <button type="submit">
                            <i class="pxni-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end: Search Popup -->

<!-- start: Offcanvas -->
<div class="pxn_offcanvas_overlay"></div>
<div class="pxn_offcanvas">
    <div class="offcanvas_bg"></div>
    <div class="offcanvas_wrapper">

        <!-- top -->
        <div class="offcanvas_top d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="offcanvas_logo">
                <a class="pxn_site_logo" href="/">
                    <img src="{{ asset('frontend/bprana/assets/images/logo/logo.png') }}" alt="Logo"
                        style="width:230px !important; max-width:none !important; height:auto;">
                </a>
            </div>

            <button class="offcanvas_close">
                <span class="icon"><i class="pxni-close"></i></span>
            </button>
        </div>

        <!-- mobile menu -->
        <div class="pxn_offcanvas_menu mobile_menu d-lg-none mean-container"></div>


    </div>
</div>
<!-- end: Offcanvas -->
<!-- start: Header Area -->
<header class="pxn-header pxn-header-3 header-absolute">
    <!-- header top -->
    <div class="pxn_header_top">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="pxn_header_top_wrap d-flex flex-wrap align-items-center justify-content-center gap-2">
                        <div class="pxn_topbar_info">
                            <i class="pxni-shield-check"></i>
                            <p class="info_text">PT. BPR Artha Nusantara Abadi Mitra Andalan Masyarakat
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pxn_header_main">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="pxn_header_main_wrap d-flex flex-wrap align-items-center">
                        <!-- logo -->
                        <a class="pxn_site_logo" href="/">
                            <img src="{{ asset('frontend/bprana/assets/images/logo/logo.png') }}" alt="Logo"
                                style="width:230px !important; max-width:none !important; height:auto;">
                        </a>

                        <div class="pxn_header_main_inner d-none d-lg-inline-flex flex-wrap align-items-center">
                            <!-- navigation -->
                            <nav class="pxn_main_navigation d-none d-lg-inline-block" id="mobile-menu">
                                <ul>
                                    <li><a href="/">Beranda</a></li>
                                    <li class="has-dropdown"><a href="#">Tentang Kami</a>
                                        <ul class="sub-menu">
                                            <li><a href="/profile">profile</a></li>
                                            <li><a href="/sejarah">Sejarah</a></li>
                                            <li><a href="/pengurus">Pengurus</a></li>
                                            <li><a href="/organisasi">Struktur Organisasi</a></li>
                                            <li><a href="/galery">Gallery</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown"><a href="#">Produk</a>
                                        <ul class="sub-menu">
                                            <li><a href="/kredit">Kredit</a></li>
                                            <li><a href="/tabungan">Tabungan</a></li>
                                            <li><a href="/deposito">Deposito</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="/pengajuanonline">Pengajuan Online</a></li>
                                    <li class="has-dropdown"><a href="#">Laporan</a>
                                        <ul class="sub-menu">
                                            <li><a href="/publikasi">Publikasi</a></li>
                                            <li><a href="/tahunan">Tahunan</a></li>
                                            <li><a href="/tatakelola">Tata Kelola</a></li>
                                            <li><a href="/keberlanjutan">Keberlanjutan</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="/lelang-jualaset">Lelang</a></li>
                                </ul>
                            </nav>

                            <!-- socials -->
                            <ul class="pxn_socials_2 d-none d-xxl-inline-flex">
                                <li><a class="social" href="https://facebook.com/" target="_blank"><i
                                            class="pxni-facebook"></i></a>
                                </li>
                                <li><a class="social" href="https://x.com/" target="_blank"><i
                                            class="pxni-x-twitter"></i></a></li>
                                <li><a class="social" href="https://linkedin.com/" target="_blank"><i
                                            class="pxni-linkedin"></i></a>
                                </li>
                                <li><a class="social" href="https://instagram.com/" target="_blank"><i
                                            class="pxni-instagram"></i></a>
                                </li>
                            </ul>
                        </div>

                        <!-- right info -->
                        <div class="pxn_header_right d-none d-md-inline-flex flex-wrap align-items-center">

                            <div style="position: relative;">

                                <a href="#" class="pxn_header_btn pxn-btn-primary"
                                    onmouseover="this.nextElementSibling.style.display='block'"
                                    onmouseout="this.nextElementSibling.style.display='none'">

                                    <span class="btn_text"><span style="color: #fff">Simulasi</span></span>
                                    <span class="btn_icon" style="background-color: #0a1c92"><i
                                            class="pxni-arrow-right"></i></span>
                                </a>

                                <ul onmouseover="this.style.display='block'" onmouseout="this.style.display='none'"
                                    style="
                                        display: none;
                                        position: absolute;
                                        top: 100%;
                                        right: 0;
                                        min-width: 180px;
                                        background: #0a1c92;
                                        padding: 10px 0;
                                        margin: 0;
                                        list-style: none;
                                        border-radius: 8px;
                                        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
                                        z-index: 999;
                                        overflow: visible;
                                    ">
                                    <li>
                                        <a href="/simulasi-kredit"
                                            style="display:block; padding:10px 20px; color:white; text-decoration:none;">
                                            Simulasi Kredit
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/simulasi-tabungan"
                                            style="display:block; padding:10px 20px; color:white; text-decoration:none;">
                                            Simulasi Tabungan
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/simulasi-deposito"
                                            style="display:block; padding:10px 20px; color:white; text-decoration:none;">
                                            Simulasi Deposito
                                        </a>
                                    </li>

                                </ul>

                            </div>

                        </div>

                        <!-- offcanvas toggle -->
                        <button class="pxn_offcanvas_toggle d-lg-none">
                            <span class="text">Menu</span>
                            <span class="icon"><i class="pxni-menu"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<header class="pxn-header pxn-header-3 header-duplicate header-sticky">
    <div class="pxn_header_main">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="pxn_header_main_wrap d-flex flex-wrap align-items-center">
                        <!-- logo -->
                        <a class="pxn_site_logo" href="/">
                            <img src="{{ asset('frontend/bprana/assets/images/logo/logo.png') }}" alt="Logo"
                                style="width:230px !important; max-width:none !important; height:auto; background-color: white; padding: 5px 10px; border-radius: 5px;">
                        </a>

                        <div class="pxn_header_main_inner d-none d-lg-inline-flex flex-wrap align-items-center">
                            <!-- navigation -->
                            <nav class="pxn_main_navigation d-none d-lg-inline-block">
                                <ul>
                                    <li><a href="/">Beranda</a></li>
                                    <li class="has-dropdown"><a href="#">Tentang Kami</a>
                                        <ul class="sub-menu">
                                            <li><a href="/profile">profile</a></li>
                                            <li><a href="/sejarah">Sejarah</a></li>
                                            <li><a href="/pengurus">Pengurus</a></li>
                                            <li><a href="/organisasi">Struktur Organisasi</a></li>
                                            <li><a href="/galery">Gallery</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown"><a href="#">Produk</a>
                                        <ul class="sub-menu">
                                            <li><a href="/kredit">Kredit</a></li>
                                            <li><a href="/tabungan">Tabungan</a></li>
                                            <li><a href="/deposito">Deposito</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="/pengajuanonline">Pengajuan Online</a></li>
                                    <li class="has-dropdown"><a href="#">Laporan</a>
                                        <ul class="sub-menu">
                                            <li><a href="/publikasi">Publikasi</a></li>
                                            <li><a href="/tahunan">Tahunan</a></li>
                                            <li><a href="/tatakelola">Tata Kelola</a></li>
                                            <li><a href="/keberlanjutan">Keberlanjutan</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="/lelang-jualaset">Lelang</a></li>
                                </ul>
                            </nav>

                            <!-- socials -->
                            <ul class="pxn_socials_2 d-none d-xxl-inline-flex">
                                <li><a class="social" href="https://facebook.com/" target="_blank"><i
                                            class="pxni-facebook"></i></a>
                                </li>
                                <li><a class="social" href="https://x.com/" target="_blank"><i
                                            class="pxni-x-twitter"></i></a></li>
                                <li><a class="social" href="https://linkedin.com/" target="_blank"><i
                                            class="pxni-linkedin"></i></a>
                                </li>
                                <li><a class="social" href="https://instagram.com/" target="_blank"><i
                                            class="pxni-instagram"></i></a>
                                </li>
                            </ul>
                        </div>

                        <!-- right info -->
                        <div class="pxn_header_right d-none d-md-inline-flex flex-wrap align-items-center">

                            <a href="#" class="pxn_header_btn pxn-btn-primary">
                                <span class="btn_text"><span style="color: #fff">Simulasi</span></span>
                                <span class="btn_icon" style="background-color: #0a1c92"><i
                                        class="pxni-arrow-right"></i></span>
                            </a>
                        </div>

                        <!-- offcanvas toggle -->
                        <button class="pxn_offcanvas_toggle d-lg-none">
                            <span class="text">Menu</span>
                            <span class="icon"><i class="pxni-menu"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end: Header Area -->