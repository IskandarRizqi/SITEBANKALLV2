<style>
    .header-top {
        padding: 10px 0;
        background-color: transparent !important;
        position: fixed;
        top: 0;
        right: 60px;
        left: auto;
        width: auto;
        z-index: 9999;
        box-shadow: none !important;
        border: none !important;
    }


    .header-top .container {
        padding: 0 !important;
        background: transparent !important;
        box-shadow: none !important;
        border: none !important;
    }

    .header-area {
        position: fixed;
        left: 0;
        width: 100%;
        z-index: 1000;
        background: transparent;
    }


    .carousel-item img {
        width: 100%;
        height: 750px;
        object-fit: cover;
    }

    @media (max-width: 768px) {

        #carouselExampleControls {
            margin-top: 100px;
        }

        #carouselExampleControls .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
            background: #fff;
        }

        #carouselExampleControls .carousel-control-prev,
        #carouselExampleControls .carousel-control-next {
            top: 50%;
            transform: translateY(-50%);
        }
    }

    .nav-link {
        color: #000 !important;
        text-decoration: none;
        font-size: 17px;
        font-weight: 400 !important;
        transition: .3s;
    }

    .nav-link:hover {
        color: #c00;
    }

    /* menu aktif */
    .nav-link.active {
        color: #000 !important;
        font-weight: 700 !important;
    }
</style>

<div class="header-top">
    <div class="container d-flex justify-content-between align-items-center" style="margin-top: 8px;">

        <div class="d-flex align-items-center" style="margin-bottom: 20px;">

            <a href="jaringankantor" target="_blank" class="text-dark me-3">
                <img src=" {{ asset('frontend/bprrudo/assets/img/icons/map.png') }}" style="width:27px; height:27px;"
                    alt="map">
            </a>
            <a href="https://www.tiktok.com/@bprrudo" target="_blank" class="text-dark me-3">
                <img src=" {{ asset('frontend/bprrudo/assets/img/icons/tt.png') }}" style="width:27px; height:27px;"
                    alt="tiktok">
            </a>

            <a href="https://web.facebook.com/bprrudoindobank?_rdc=1&_rdr#" target="_blank" class="text-dark me-3">
                <img src="{{ asset('frontend/bprrudo/assets/img/icons/facebook.png') }}" style="width:27px; height:27px;"
                    alt="facebook">
            </a>

            <a href="https://www.instagram.com/bprrudo/" target="_blank" class="text-dark me-3">
                <img src="{{ asset('frontend/bprrudo/assets/img/icons/instagram.png') }}"
                    style="width:27px; height:27px;" alt="instagram">
            </a>

            <a href="https://wa.me/6281334084545" target="_blank" class="text-dark me-3">
                <img src="{{ asset('frontend/bprrudo/assets/img/icons/waa.png') }}" style="width:27px; height:27px;"
                    alt="whatsapp">
            </a>


        </div>
    </div>
</div>


<header>
    <div class="container">
        <div class="header-area header-area1 header-area-all d-none d-lg-block"id="header"
            style="position:fixed; top:0; left:0;  background:transparent;">

            <a href="/">
                <img src="{{ asset('frontend/bprrudo/assets/img/logo/rudoo.png') }}" alt="logo"
                    style="height: 25px;  width: 120px; transform: scale(1.7); transform-origin: center; margin-top: 53px; margin-left: 100px; object-fit: fill;">

            </a>
            <!-- Menu -->
            <div id="mainMenu" class="main-menu-ex main-menu-ex1"
                style="position:fixed; top:40px; left:240px; width:100%; z-index:999; transition:all 0.3s; background:transparent;">
                <ul style="display:flex; justify-content:center; gap:2px; list-style:none; margin:0; padding:15px 0;">

                    <!-- Beranda -->
                    <li class="nav-item">
                        <a href="/" class="nav-link" style="font-size: 18px;">BERANDA</a>
                    </li>

                    <!-- Profil -->
                    <li class="dropdown-menu-parrent nav-item" style="position:relative;">
                        <a href="#" class="nav-link" style="font-size: 18px;">PROFIL <i
                                class="fa-solid fa-angle-down"></i></a>
                        <ul
                            style="position:absolute; top:100%; left:0; display:none; list-style:none; margin:0; padding:10px; background:#fff; border:1px solid #ddd; min-width:180px; text-align:left;">
                            {{-- <li><a href="profil" class="nav-link">Profil</a></li> --}}
                            <li><a href="/sejarah" class="nav-link">Sejarah</a></li>
                            <li><a href="/visimisi" class="nav-link">Visi Misi</a></li>
                            <li><a href="/corevalue" class="nav-link">Core Value</a></li>
                            {{-- <li><a href="/pengurus" class="nav-link">Manajemen</a></li> --}}
                            <li><a href="/organisasi" class="nav-link">Struktur Organisasi</a></li>
                            <li><a href="/jaringankantor" class="nav-link"> Kantor Kami</a></li>

                        </ul>
                    </li>


                    <!-- Produk -->
                    <li class="dropdown-menu-parrent nav-item" style="position:relative;">
                        <a href="#" class="nav-link" style="font-size: 18px;">PRODUK <i
                                class="fa-solid fa-angle-down"></i></a>
                        <ul
                            style="position:absolute; top:100%; left:0; display:none; list-style:none; margin:0; padding:10px; background:#fff; border:1px solid #ddd; min-width:180px; text-align:left;">

                            <li><a href="/tabungan" class="nav-link">Tabungan</a></li>
                            <li><a href="/deposito" class="nav-link">Deposito</a></li>
                            <li><a href="/kredit" class="nav-link">Kredit</a></li>
                             <li><a href="/pengajuanonline" class="nav-link">Pengajuan Online</a></li>

                            {{-- <li><a href="/pengajuanonline" class="nav-link">Pengajuan Online</a></li> --}}
                        </ul>
                    </li>

                    <li class="dropdown-menu-parrent nav-item" style="position:relative;">
                        <a href="#" class="nav-link" style="font-size: 18px;">INFORMASI <i
                                class="fa-solid fa-angle-down"></i></a>
                        <ul
                            style="position:absolute; top:100%; left:0; display:none; list-style:none; margin:0; padding:10px; background:#fff; border:1px solid #ddd; min-width:180px; text-align:left;">
                            {{-- <li><a href="/infolps" class="nav-link">Informasi LPS</a></li> --}}
                            {{-- <li><a href="#" class="nav-link">Tips Finansial</a></li> --}}
                            <li><a href="/rekrutmen" class="nav-link">Lowongan Kerja</a></li>
                            <li><a href="/lelang-jualaset" class="nav-link">Lelang</a></li>
                            {{-- <li><a href="/contact" class="nav-link">Hubungi Kami</a></li> --}}
                            <li><a href="/pengaduan" class="nav-link">Pengaduan Online & WBS</a></li>


                        </ul>
                    </li>

                  

                    <li class="nav-item">
                        <a href="/laporanall" class="nav-link" style="font-size: 18px;">LAPORAN</a>
                    </li>


                    <li class="dropdown-menu-parrent nav-item" style="position:relative;">
                        <a href="#" class="nav-link" style="font-size: 18px;">GALERI <i
                                class="fa-solid fa-angle-down"></i></a>
                        <ul
                            style="position:absolute; top:100%; left:0; display:none; list-style:none; margin:0; padding:10px; background:#fff; border:1px solid #ddd; min-width:180px; text-align:left;">
                            <li><a href="/eventkegiatan" class="nav-link">Berita</a></li>
                            <li><a href="/galery" class="nav-link">Galleri</a></li>
                        </ul>
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
</header>

<!--=====Mobile header start=======-->

<div class="mobile-header d-block d-lg-none ">
    <div class="container-fluid">
        <div class="col-12">
            <div class="mobile-header-elements">
                <div class="mobile-logo">
                    <a href="/">
                        <img src="{{ asset('frontend/bprrudo/assets/img/logo/rudoo.png') }}" alt="logo"
                            style="width: 200px; height: auto; margin-top: auto">
                    </a>
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
        <a href="/">
            <img src="{{ asset('frontend/bprrudo/assets/img/logo/logomobile.png') }}" alt="logo"
                style="width: 190px; height: auto;">
        </a>
    </div>

    <div class="menu-close">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <div class="mobile-nav">

        <ul>
            <li class="has-dropdown"><a href="/">Beranda </a> </li>
            <li class="has-dropdown"><a href="#">Profil</a>
                <ul class="sub-menu">
                    <li><a href="/sejarah">Sejarah</a></li>
                    <li><a href="/visimisi">Visi Misi</a></li>
                    <li><a href="/corevalue">Core Value</a></li>
                    <li><a href="/organisasi">Struktur Organisasi</a></li>
                    <li><a href="/jaringankantor">Kantor Kami</a></li>

                </ul>
            </li>
            <li class="has-dropdown"><a href="/laporanall">Laporan</a>

            </li>

            <li class="has-dropdown"><a href="#">Produk</a>
                <ul class="sub-menu">
                    <li><a href="/tabungan">Tabungan</a></li>
                    <li><a href="/deposito">Deposito</a></li>
                    <li><a href="/kredit">Kredit</a></li>
                    <li><a href="/pengajuanonline">Pengajuan Online</a></li>

                </ul>
            </li>


            <li class="has-dropdown"><a href="#">Informasi</a>
                <ul class="sub-menu">
                    <li><a href="/rekrutmen">Lowongan Kerja</a></li>
                    <li><a href="/lelang-jualaset">Lelang</a></li>
                    <li><a href="/pengaduan">Pengaduan Online & WBS</a></li>

                </ul>
            </li>

            <li class="has-dropdown"><a href="#">Galeri</a>
                <ul class="sub-menu">
                    <li><a href="/eventkegiatan">Berita</a></li>
                    <li><a href="/galery"> Gallery</a></li>
                </ul>
            </li>

            {{-- <div class="mobile-button">
                <a class="menu-btn2" href="/pengajuanonline">Pengajuan Online <span><i
                            class="fa-solid fa-arrow-right"></i></span></a>
            </div> --}}

            <div class="single-footer-items">
                <h3>Hubungi Kami</h3>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/bprjas/assets/img/icons/footer1-icon1.png" alt="">
                    </div>
                    <div class="pera">
                        <a href="tel:081334084545">081334084545</a>
                    </div>
                </div>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/bprjas/assets/img/icons/wa.png" alt=""
                            style="width: 23px; height: 23px; filter: brightness(0) invert(1);">
                    </div>
                    <div class="pera">
                        <a href="https://wa.me/6281334084545">081334084545</a>
                    </div>
                </div>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/bprjas/assets/img/icons/footer1-icon3.png" alt="">
                    </div>
                    <div class="pera">
                        <a href="mailto:brprudoindobank@gmail.com" style="font-size: 15px;">brprudoindobank@gmail.com</a>
                    </div>
                </div>


                <div class="contact-infos">
                    <ul class="social-icon">
                        <li><a href="https://web.facebook.com/bprrudoindobank?_rdc=1&_rdr#"><i
                                    class="fa-brands fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.youtube.com/@bprrudoindobank4797"><i
                                    class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/bprrudo/"><i
                                    class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>

            </div>
    </div>

    </ul>
</div>



<script>
    document.querySelectorAll('.dropdown-menu-parrent').forEach(el => {
        el.addEventListener('mouseenter', () => {
            el.querySelector('ul').style.display = 'block';
        });
        el.addEventListener('mouseleave', () => {
            el.querySelector('ul').style.display = 'none';
        });
    });


    document.querySelectorAll('.main-menu-ex a').forEach(link => {
        if (link.classList.contains('active')) {
            link.style.color = '#e00000';
            // HAPUS baris bold
        }
    });
</script>

<script>
    window.addEventListener('scroll', function() {
        const headerTop = document.querySelector('.header-top');
        const headerArea = document.querySelector('.header-area');

        if (window.scrollY > 50) {
            headerTop.style.background = "#ffffff";
            headerTop.style.boxShadow = "0 2px 6px rgba(0,0,0,0.15)";

            headerArea.style.background = "#ffffff";
            headerArea.style.boxShadow = "0 2px 6px rgba(0,0,0,0.15)";
        } else {
            headerTop.style.background = "transparent";
            headerTop.style.boxShadow = "none";

            headerArea.style.background = "transparent";
            headerArea.style.boxShadow = "none";
        }
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let currentPage = window.location.pathname;
        currentPage = currentPage.replace(/\/$/, "");

        document.querySelectorAll(".nav-link").forEach(link => {
            let href = link.getAttribute("href");
            if (!href || href === "#" || href.startsWith("javascript")) return;

            href = href.replace(/\/$/, "");


            if (href === "" || href === "/") {
                if (currentPage === "" || currentPage === "/") {
                    link.classList.add("active");
                } else {
                    link.classList.remove("active");
                }
                return;
            }


            if (currentPage.includes(href)) {
                let parentDropdown = link.closest(".dropdown-menu-parrent");
                if (parentDropdown) {
                    let parentLink = parentDropdown.querySelector(":scope > .nav-link");
                    if (parentLink) parentLink.classList.add("active");
                } else {
                    link.classList.add("active");
                }
            }
        });
    });
</script>
