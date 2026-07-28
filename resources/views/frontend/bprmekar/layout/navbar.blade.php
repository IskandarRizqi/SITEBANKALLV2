<style>
    /* Background Header Putih */
    .th-header,
    .menu-area,
    .sticky-wrapper {
        background-color: #ff5a1e !important;
    }

    /* Text Menu Hitam */
    .main-menu ul li a {
        color: #ffffff !important;
    }

    /* Icon Dropdown (arrow menu) */
    .main-menu ul li.menu-item-has-children>a::after {
        color: #fff !important;
    }

    /* Hover Menu */
    .main-menu ul li a:hover {
        color: #0d6efd !important;
    }

    /* Submenu Background */
    .sub-menu {
        background-color: #ff5a1e !important;
    }

    /* Submenu Text */
    .sub-menu li a {
        color: #000 !important;
    }

    /* Toggle Menu Mobile (Hamburger) */
    .th-menu-toggle {
        color: #000 !important;
    }

    /* Toggle Icon */
    .th-menu-toggle i {
        color: #000 !important;
    }

    /* Icon menu kanan */
    .simple-btn img {
        filter: brightness(0);
        /* jadi hitam */
    }

    /* Sticky saat scroll */
    .sticky-wrapper.sticky {
        background-color: #fff !important;
    }

    /* Optional Shadow biar elegan */
    .menu-area {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .header-button .th-btn.style2 {
        background: linear-gradient(45deg, #091098, #ffffff);
        color: #000;
        border: none;
    }

    .header-layout3 .header-logo {
        background: #fff;
        padding: 5px 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    /* Mobile Header Putih */
    @media (max-width: 991px) {

        .th-header,
        .menu-area,
        .sticky-wrapper {
            background-color: #ffffff !important;
        }

        /* Text menu mobile jadi hitam */
        .th-mobile-menu ul li a {
            color: #000 !important;
        }

        /* Icon toggle mobile */
        .th-menu-toggle {
            color: #000 !important;
        }

        .th-menu-toggle i {
            color: #000 !important;
        }

        /* Submenu mobile */
        .th-mobile-menu .sub-menu {
            background: #fff !important;
        }

        .th-mobile-menu .sub-menu li a {
            color: #000 !important;
        }



    }
</style>


<div class="th-menu-wrapper onepage-nav">
    <div class="th-menu-area text-center"><button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo"><a href="/"><img src="frontend/bprmekar/assets/img/logo/logomekar.png"
                    style="width: 170px" alt="Atek"></a></div>

        <div class="th-mobile-menu allow-natural-scroll">
            <ul>

                <li><a href="/">Beranda</a></li>
                <li class="menu-item-has-children"><a href="#">Tentang Kami</a>
                    <ul class="sub-menu">

                        <li><a href="/visimisi">Visimisi</a></li>
                        <li><a href="/sejarah">Sejarah</a></li>
                        <li><a href="/pengurus">Pengurus</a></li>
                        <li><a href="/organisasi">Struktur Organisasi</a></li>
                        <li><a href="/galery">Galery</a></li>

                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Produk</a>
                    <ul class="sub-menu">
                        <li><a href="/kredit">Kredit</a></li>
                        <li><a href="/deposito">Deposito</a></li>
                        <li><a href="/tabungan">Tabungan</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Laporan</a>
                    <ul class="sub-menu">
                        <li><a href="/publikasi">Laporan Publikasi</a></li>
                        <li><a href="/tahunan">Laporan Tahunan</a></li>
                        <li><a href="/tatakelola">Laporan Tata Kelola</a></li>
                        <li><a href="/keberlanjutan">Laporan Keberlanjutan</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Simulasi</a>
                    <ul class="sub-menu">
                        <li><a href="/simulasi-kredit">Simulasi Kredit</a></li>
                        <li><a href="/simulasi-deposito">Simulasi Deposito</a></li>
                        <li><a href="/simulasi-tabungan">Simulasi Tabungan</a></li>
                    </ul>
                </li>
                <li><a href="/pengajuanonline">Pengajuan Online</a></li>


            </ul>

        </div>
    </div>
</div>
<header class="th-header header-layout3">
    <div class="sticky-wrapper">
        <div class="menu-area">

            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto d-none d-xl-block">
                        <nav class="main-menu">
                            <ul>

                                <li><a href="/" style="color: #fff">Beranda</a></li>
                                <li class="menu-item-has-children"><a href="#">Tentang Kami</a>
                                    <ul class="sub-menu">

                                        <li><a href="/visimisi">Visimisi</a></li>
                                        <li><a href="/sejarah">Sejarah</a></li>
                                        <li><a href="/pengurus">Pengurus</a></li>
                                        <li><a href="/organisasi">Struktur Organisasi</a></li>
                                        <li><a href="/galery">Galery</a></li>
                                        <li><a href="/tatakelolapage">Tata Kelola</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Laporan</a>
                                    <ul class="sub-menu">
                                        <li><a href="/publikasi">Laporan Publikasi</a></li>
                                        <li><a href="/tahunan">Laporan Tahunan</a></li>
                                        <li><a href="/tatakelola">Laporan Tata Kelola</a></li>
                                        <li><a href="/keberlanjutan">Laporan Keberlanjutan</a></li>
                                        <li><a href="#">Laporan Keuangan</a></li>
                                        <li><a href="#">Laporan LPS</a></li>
                                        <li><a href="#">Penanganan Pengaduan</a></li>
                                    </ul>
                                </li>
                                <!-- <li class="menu-item-has-children"><a href="#">Produk</a>
                                    <ul class="sub-menu">
                                        <li><a href="/kredit">Kredit</a></li>
                                        <li><a href="/deposito">Deposito</a></li>
                                        <li><a href="/tabungan">Tabungan</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                        </nav><button type="button" class="th-menu-toggle d-block d-xl-none"><i
                                class="far fa-bars"></i></button>
                    </div>
                    <div class="col-auto">
                        <div class="header-logo"><a href="/"><img
                                    src="{{asset('frontend/bprmekar/assets/img/logo/logomekar.png')}}"
                                    style="width: 190px;" alt="Logo"></a></div>
                    </div>

                    <div class="col-auto d-none d-xl-block">
                        <nav class="main-menu">
                            <ul>
                                <li><a href="#">Lelang</a></li>
                                <li class="menu-item-has-children"><a href="#">Kontak</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Hubungi Kami</a></li>
                                        <li><a href="#">Pengaduan Nasabah</a></li>
                                        <li><a href="">Whistleblowing System</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">E-Recruitment</a></li>
                            </ul>
                        </nav>

                    </div>
                    <button type="button" class="th-menu-toggle d-block d-xl-none ">
                        <i class="far fa-bars"></i>
                    </button>


                </div>
            </div>
        </div>
    </div>
</header>