<style>
    .navbar .dropdown-menu {
        margin-top: 0;
    }

    .navbar .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .running-text {
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
        color: #000000;
    }

    .running-text span {
        display: inline-block;
        padding-left: 100%;
        animation: runningText 15s linear infinite;
    }

    @keyframes runningText {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    @media (min-width: 992px) {
        .nav-bar.nav-bar-floating {
            background: transparent;
            /* padding-top: 14px;
            padding-bottom: 14px; */
            z-index: 20;
        }

        .nav-bar.nav-bar-floating .navbar {
            background: transparent !important;
            padding: 0;
        }

        .nav-bar.nav-bar-floating #navbarCollapse {
            flex-basis: auto;
            /* flex-grow: 0; */
            max-width: 100%;
            margin: 0 auto;
            padding: 8px 14px;
            background: rgba(44, 46, 147, 0.94);
            border-radius: 0;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
            backdrop-filter: blur(10px);
        }

        .nav-bar.nav-bar-floating .navbar-nav {
            align-items: center;
        }

        .nav-bar.nav-bar-floating .navbar-nav .nav-link {
            /* border-radius: 999px; */
            white-space: nowrap;
        }

        .nav-bar.nav-bar-floating .btn {
            white-space: nowrap;
        }

        .nav-bar.nav-bar-floating .dropdown-menu {
            margin-left: 0;
            border-radius: 0;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }
    }
</style>
<!-- Top Bar Start -->
<div class="top-bar" hidden>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-12">
                <div class="logo">
                    <a href="/">

                        <img src="{{ asset('frontend/bprphm/img/logo/logo.png') }}" alt="Logo" style="max-height: 45px">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-7 d-none d-lg-block">
                <div class="running-text">
                    <span>
                        Jam Buka : 08:00 - 15:00 &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                        No Telp : (061) 7990260 &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                        Email: bprphm@gmail.com &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                        Sukses Bersama Nasabah
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Bar End -->

<!-- Nav Bar Start -->
<div class="nav-bar nav-bar-floating p-0">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="/" class="nav-item nav-link bg-white">
                        <img src="{{ asset('frontend/bprphm/img/logo/logo.png') }}" alt="Logo" style="max-height: 45px">
                    </a>
                    <a href="/" class="nav-item nav-link  {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle   {{ request()->is('visimisi', 'sejarah', 'pengurus', 'organisasi', 'galery') ? 'active' : '' }}"
                            data-toggle="dropdown">Tentang Kami</a>
                        <div class="dropdown-menu">
                            <a href="/visimisi"
                                class="dropdown-item {{ request()->is('visimisi') ? 'active' : '' }}">Visi Misi</a>
                            <a href="/sejarah"
                                class="dropdown-item {{ request()->is('sejarah') ? 'active' : '' }}">Sejarah</a>
                            <a href="/pengurus"
                                class="dropdown-item {{ request()->is('pengurus') ? 'active' : '' }}">Pengurus</a>
                            <a href="/organisasi"
                                class="dropdown-item {{ request()->is('organisasi') ? 'active' : '' }}">Struktur
                                Organisasi</a>
                            <a href="/galery"
                                class="dropdown-item {{ request()->is('galery') ? 'active' : '' }}">Gallery</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle {{ request()->is('kredit', 'deposito', 'tabungan') ? 'active' : '' }}"
                            data-toggle="dropdown">Produk</a>
                        <div class="dropdown-menu">
                            <a href="/kredit" class="dropdown-item {{ request()->is('kredit') ? 'active' : '' }}">Kredit
                            </a>
                            <a href="/deposito"
                                class="dropdown-item {{ request()->is('deposito') ? 'active' : '' }}">Deposito</a>
                            <a href="/tabungan"
                                class="dropdown-item {{ request()->is('tabungan') ? 'active' : '' }}">Tabungan</a>
                        </div>
                    </div>
                    <a href="/lelang-jualaset"
                        class="nav-item nav-link {{ request()->is('lelang-jualaset') ? 'active' : '' }}">Lelang
                    </a>
                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle {{ request()->is('publikasi', 'tahunan', 'tatakelola', 'keberlanjutan') ? 'active' : '' }}"
                            data-toggle="dropdown">Laporan</a>
                        <div class="dropdown-menu">
                            <a href="/publikasi"
                                class="dropdown-item {{ request()->is('publikasi') ? 'active' : '' }}">Laporan
                                Publikasi </a>
                            <a href="/tahunan"
                                class="dropdown-item {{ request()->is('tahunan') ? 'active' : '' }}">Laporan
                                Tahunan</a>
                            <a href="/tatakelola"
                                class="dropdown-item {{ request()->is('tatakelola') ? 'active' : '' }}">Laporan Tata
                                Kelola</a>
                            <a href="/keberlanjutan"
                                class="dropdown-item {{ request()->is('keberlanjutan') ? 'active' : '' }}">Laporan
                                RAKB</a>
                            {{-- <a href="single.html" class="dropdown-item"></a> --}}

                        </div>
                    </div>
                    <a href="/pengajuanonline"
                        class="nav-item nav-link {{ request()->is('pengajuanonline') ? 'active' : '' }}">Pengajuan
                        Online</a>

                </div>
                <div class="running-text mr-2">
                    <span class="text-white">
                        Jam Buka : 08:00 - 15:00 &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                        No Telp : (061) 7990260 &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                        Email: bprphm@gmail.com &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                        Sukses Bersama Nasabah
                    </span>
                </div>
                <div class="ml-auto nav-item dropdown">
                    <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                        Simulasi
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="/simulasi-kredit" class="dropdown-item">Simulasi Kredit</a>
                        <a href="/simulasi-deposito" class="dropdown-item">Simulasi Deposito</a>
                        <a href="/simulasi-tabungan" class="dropdown-item">Simulasi Tabungan</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->