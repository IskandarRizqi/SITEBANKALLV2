<style>
    .header-top {
        padding: 10px 0;
        background-color: transparent !important;
        position: absolute;
        top: 0;
        right: 60px;
        /* posisikan di kanan */
        left: auto;
        /* jangan pakai full kiri */
        width: auto;
        /* biar menyesuaikan isi */
        z-index: 2100;
        margin-bottom: 90px;
        /* jarak ke header di bawah */
    }

    .header-area {
        position: absolute;
        left: 0;
        width: 100%;
        z-index: 1000;
        background: transparent !important;
    }


    .carousel-item img {
        width: 100%;
        height: 750px;
        /* penuh tinggi layar */
        object-fit: cover;
        /* biar cover, tidak ada background putih */
    }

    /* Default (desktop) */
    /* Mobile */
    @media (max-width: 768px) {

        /* Geser banner turun supaya tidak ketutupan toggle */
        #carouselExampleControls {
            margin-top: 100px;
            /* sesuaikan dengan tinggi header/toggle */
        }

        #carouselExampleControls .carousel-item img {
            width: 100%;
            height: auto;
            /* proporsional, tidak crop */
            object-fit: cover;
            background: #fff;
            /* opsional, biar ada background kalau ada ruang kosong */
        }

        /* Panah navigasi tetap di tengah */
        #carouselExampleControls .carousel-control-prev,
        #carouselExampleControls .carousel-control-next {
            top: 50%;
            transform: translateY(-50%);
        }
    }

    .nav-link {
        color: #000;
        text-decoration: none;
        font-size: 17px;
        transition: .3s;
    }

    .nav-link:hover {
        color: #c00;
    }

    .nav-link.active {
        color: red !important;
        font-weight: bold;
    }
</style>
<!-- Header Top -->
<div class="header-top">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- Sosial Media -->
        <div class="d-flex align-items-center" style="margin-bottom: 20px;">

            <!-- Kontak -->
            <a href="contact" class="text-dark me-3">
                <i class="fas fa-address-book"></i>
            </a>

            <!-- Lokasi -->
            <a href="jaringankantor" target="_blank" class="text-dark me-3">
                <i class="fas fa-map-marker-alt"></i>
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/people/BPR-JAS-JUANA/100075920540063/#" target="_blank"
                class="text-dark me-3">
                <i class="fab fa-facebook-f"></i>
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/juwana_artha_sentosa/" target="_blank" class="text-dark me-3">
                <i class="fab fa-instagram"></i>
            </a>

            <!-- WhatsApp -->
            <a href="https://wa.me/6281326296688" target="_blank" class="text-dark me-3">
                <i class="fab fa-whatsapp"></i>
            </a>

            <!-- YouTube -->
            <a href="https://www.youtube.com/@juwanaarthasentosa1261" target="_blank" class="text-dark">
                <i class="fab fa-youtube"></i>
            </a>
        </div>

    </div>
</div>


<header>
    <div class="header-area header-area1 header-area-all d-none d-lg-block" id="header"
        style="position:fixed; top:0; left:0; width:100%; z-index:999; transition:all 0.3s; background:#fff;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-elements">
                        <!-- Logo -->
                        <div class="site-logo">
                            <a href="/">
                                <img src="{{ asset('frontend/bprjas/assets/img/logo/LogoDef.png') }}" alt="logo"
                                    style="height: 50px; width: 150px; transform: scale(1.6); transform-origin: center; margin-top: 5px;">

                            </a>
                            <!-- Menu -->
                            <div id="mainMenu" class="main-menu-ex main-menu-ex1"
                                style="position:fixed; top:0; left:0; width:100%; z-index:999; transition:all 0.3s; background:transparent;">
                                <ul
                                    style="display:flex; justify-content:center; gap:7px; list-style:none; margin:0; padding:15px 0;">

                                    <!-- Beranda -->
                                    <li class="nav-item">
                                        <a href="/" class="nav-link">BERANDA</a>
                                    </li>

                                    <!-- Profil -->
                                    <li class="dropdown-menu-parrent nav-item" style="position:relative;">
                                        <a href="#" class="nav-link">PROFIL <i
                                                class="fa-solid fa-angle-down"></i></a>
                                        <ul
                                            style="position:absolute; top:100%; left:0; display:none; list-style:none; margin:0; padding:10px; background:#fff; border:1px solid #ddd; min-width:180px; text-align:left;">
                                            {{-- <li><a href="profil" class="nav-link">Profil</a></li> --}}
                                            <li><a href="/sejarah" class="nav-link">Sejarah</a></li>
                                            <li><a href="/visimisi" class="nav-link">Visi Misi</a></li>
                                            <li><a href="/pengurus" class="nav-link">Manajemen</a></li>
                                            <li><a href="/organisasi" class="nav-link">Struktur Organisasi</a></li>
                                            <li><a href="/jaringankantor" class="nav-link">Jaringan Kantor</a></li>

                                        </ul>
                                    </li>


                                    <!-- Produk -->
                                    <li class="dropdown-menu-parrent nav-item" style="position:relative;">
                                        <a href="#" class="nav-link">PRODUK <i
                                                class="fa-solid fa-angle-down"></i></a>
                                        <ul
                                            style="position:absolute; top:100%; left:0; display:none; list-style:none; margin:0; padding:10px; background:#fff; border:1px solid #ddd; min-width:180px; text-align:left;">
                                            <li><a href="/kredit" class="nav-link">Kredit</a></li>
                                            <li><a href="/deposito" class="nav-link">Deposito</a></li>
                                            <li><a href="/tabungan" class="nav-link">Tabungan</a></li>
                                            <li><a href="/pengajuanonline" class="nav-link">Pengajuan Online</a></li>
                                        </ul>
                                    </li>



                                    <!-- Penghargaan -->
                                    <li class="dropdown-menu-parrent nav-item" style="position:relative;">
                                        <a href="#" class="nav-link">LAPORAN <i
                                                class="fa-solid fa-angle-down"></i></a>
                                        <ul
                                            style="position:absolute; top:100%; left:0; display:none; list-style:none; margin:0; padding:10px; background:#fff; border:1px solid #ddd; min-width:180px; text-align:left;">
                                            {{-- <li><a href="/penghargaan" class="nav-link">Penghargaan</a></li> --}}

                                            {{-- <li><a href="/tinjauankeuangan" class="nav-link">Tinjauan Keuangan</a></li> --}}
                                            <li><a href="/publikasi" class="nav-link">Laporan Publikasi</a></li>
                                            <li><a href="/tatakelola" class="nav-link">Laporan GCG</a></li>
                                            <li><a href="/keberlanjutan" class="nav-link">Laporan Keberlanjutan</a></li>
                                            <li><a href="/tahunan" class="nav-link">Laporan Tahunan</a></li>
                                            <li><a href="/piagamaudit">Piagam Audit Internal</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown-menu-parrent nav-item" style="position:relative;">
                                        <a href="#" class="nav-link">GALERI <i
                                                class="fa-solid fa-angle-down"></i></a>
                                        <ul
                                            style="position:absolute; top:100%; left:0; display:none; list-style:none; margin:0; padding:10px; background:#fff; border:1px solid #ddd; min-width:180px; text-align:left;">
                                            <li><a href="/eventkegiatan" class="nav-link">Event Kegiatan</a></li>
                                            <li><a href="/galery" class="nav-link">Gallery</a></li>
                                        </ul>
                                    </li>



                                    <!-- Laporan -->
                                    <li class="dropdown-menu-parrent nav-item" style="position:relative;">
                                        <a href="#" class="nav-link">INFORMASI <i
                                                class="fa-solid fa-angle-down"></i></a>
                                        <ul
                                            style="position:absolute; top:100%; left:0; display:none; list-style:none; margin:0; padding:10px; background:#fff; border:1px solid #ddd; min-width:180px; text-align:left;">
                                            <li><a href="/infolps" class="nav-link">Informasi LPS</a></li>
                                            {{-- <li><a href="#" class="nav-link">Tips Finansial</a></li> --}}
                                            <li><a href="/rekrutmen" class="nav-link">Karir</a></li>
                                            <li><a href="/contact" class="nav-link">Hubungi Kami</a></li>
                                            <li><a href="/pengaduan" class="nav-link">Pengaduan Online & WBS</a></li>
                                            <li><a
                                                    href="https://docs.google.com/forms/d/e/1FAIpQLSfO340OmQU84nottx330Gphj8vQbtgVhJa2Wx46YAjS4u_Ajw/viewform?pli=1">Survey
                                                    Kepuasan Pelanggan</a></li>
                                            <li><a href="/faq" class="nav-link">FAQ'S</a></li>
                                            <li><a href="/lelang-jualaset" class="nav-link">Lelang</a></li>
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
                    <a href="/">
                        <img src="{{ asset('frontend/bprjas/assets/img/logo/LogoDef.png') }}" alt="logo"
                            style="width: 250px; height: auto; margin-top: auto">
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
            <img src="{{ asset('frontend/bprjas/assets/img/logo/LogoDef.png') }}" alt="logo"
                style="width: 250px; height: auto;">
        </a>
    </div>

    <div class="menu-close">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <div class="mobile-nav">

        <ul>
            <li class="has-dropdown"><a href="/">Beranda </a> </li>
            {{-- <li class="has-dropdown"><a href="#">Profil</a>  --}}
            <ul class="sub-menu">
                {{-- <li><a href="#">Profil</a></li> --}}
                <li><a href="/sejarah">Sejarah</a></li>
                {{-- <li><a href="/visimisi">Visi Misi</a></li> --}}
                <li><a href="/pengurus">Manajemen</a></li>
                <li><a href="/organisasi">Struktur Organisasi</a></li>
                <li><a href="/jaringan-kantor">Jaringan Kantor</a></li>

            </ul>
            </li>
            <li class="has-dropdown"><a href="#">Laporan</a>
                <ul class="sub-menu">
                    {{-- <li><a href="/penghargaan">Penghargaan</a></li> --}}

                    {{-- <li><a href="/visimisi">Visi Misi</a></li> --}}
                    {{-- <li><a href="/tinjauankeuangan">Tinjauan Keuangan</a></li> --}}
                    <li><a href="/publikasi">Laporan Publikasi</a></li>
                    <li><a href="/tatakelola">Laporan GCG</a></li>
                    <li><a href="/keberlanjutan">Laporan Keberlanjutan</a></li>
                    <li><a href="/tahunan">Laporan Tahunan</a></li>
                    <li><a href="/piagamaudit">Piagam Audit Internal</a></li>
                </ul>
            </li>

            <li class="has-dropdown"><a href="#">Produk</a>
                <ul class="sub-menu">
                    <li><a href="/kredit">Kredit</a></li>
                    <li><a href="/deposito">Deposito</a></li>
                    <li><a href="/tabungan">Tabungan</a></li>
                    <li><a href="/pengajuanonline">Pengajuan Online</a></li>
                </ul>
            </li>

            <li class="has-dropdown"><a href="#">Galeri</a>
                <ul class="sub-menu">
                    <li><a href="/eventkegiatan">Event Kegiatan</a></li>
                    <li><a href="/galery" class="nav-link">Gallery</a></li>
                </ul>
            </li>

            <li class="has-dropdown"><a href="#">Informasi</a>
                <ul class="sub-menu">
                    <li><a href="/infolps">Informasi LPS</a></li>
                    {{-- <li><a href="tatakelola">Tips Finansial</a></li> --}}
                    <li><a href="/rekrutmen">Karir</a></li>
                    <li><a href="/contact">Hubungi Kami</a></li>
                    <li><a href="/pengaduan">Pengaduan Online & WBS</a></li>
                    <li><a
                            href="https://docs.google.com/forms/d/e/1FAIpQLSfO340OmQU84nottx330Gphj8vQbtgVhJa2Wx46YAjS4u_Ajw/viewform?pli=1">Survey
                            Kepuasan Pelanggan</a></li>
                    <li><a href="/faq">FAQ'S</a></li>
                    <li><a href="/lelang-jualaset" class="nav-link">Lelang</a></li>
                </ul>
            </li>

            <div class="mobile-button">
                <a class="menu-btn2" href="/pengajuanonline">Pengajuan Online <span><i
                            class="fa-solid fa-arrow-right"></i></span></a>
            </div>

            <div class="single-footer-items">
                <h3>Hubungi Kami</h3>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/bprjas/assets/img/icons/footer1-icon1.png" alt="">
                    </div>
                    <div class="pera">
                        <a href="tel:0500222333">(0295) 471 488</a>
                    </div>
                </div>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/bprjas/assets/img/icons/wa.png" alt=""
                            style="width: 23px; height: 23px; filter: brightness(0) invert(1);">
                    </div>
                    <div class="pera">
                        <a href="tel:0356588547">081326296688</a>
                    </div>
                </div>

                <div class="contact-box">
                    <div class="icon">
                        <img src="frontend/bprjas/assets/img/icons/footer1-icon3.png" alt="">
                    </div>
                    <div class="pera">
                        <a href="mailto:admin@techxen.org" style="font-size: 15px;">juwanaarthasentosa@yahoo.com</a>
                    </div>
                </div>


                <div class="contact-infos">
                    <ul class="social-icon">
                        <li><a href="https://www.facebook.com/people/BPR-JAS-JUANA/100075920540063/#"><i
                                    class="fa-brands fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.youtube.com/@juwanaarthasentosa1261"><i
                                    class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/juwana_artha_sentosa/"><i
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myCarousel = document.querySelector('#carouselExampleControls');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 4000, // 3 detik
            ride: 'carousel'
        });
    });
</script>

<script>
    // Dropdown hover
    document.querySelectorAll('.dropdown-menu-parrent').forEach(el => {
        el.addEventListener('mouseenter', () => {
            el.querySelector('ul').style.display = 'block';
        });
        el.addEventListener('mouseleave', () => {
            el.querySelector('ul').style.display = 'none';
        });
    });

    // Scroll effect (hanya tambahkan shadow)
    window.addEventListener('scroll', function() {
        const headerFixed = document.getElementById('header');
        if (window.scrollY > 50) {
            headerFixed.style.boxShadow = '0 2px 6px rgba(0,0,0,0.1)';
        } else {
            headerFixed.style.boxShadow = 'none';
        }
    });

    // Active menu warna merah
    document.querySelectorAll('.main-menu-ex a').forEach(link => {
        if (link.classList.contains('active')) {
            link.style.color = '#e00000';
            link.style.fontWeight = 'bold';
        }
    });
</script>

<script>
    const eventCarousel = document.querySelector('#eventCarousel');
    if (eventCarousel) {
        new bootstrap.Carousel(eventCarousel, {
            interval: 4000, // auto slide tiap 2 detik
            ride: 'carousel'
        });
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let currentPage = window.location.pathname;
        currentPage = currentPage.replace(/\/$/, ""); // hapus "/" di belakang

        document.querySelectorAll(".nav-link").forEach(link => {
            let href = link.getAttribute("href");
            if (!href || href === "#" || href.startsWith("javascript")) return;

            href = href.replace(/\/$/, ""); // hapus "/" di belakang

            // === Khusus untuk BERANDA ===
            if (href === "" || href === "/") {
                if (currentPage === "" || currentPage === "/") {
                    link.classList.add("active"); // aktif hanya di halaman root
                } else {
                    link.classList.remove("active"); // pastikan tidak aktif di halaman lain
                }
                return; // berhenti disini, jangan lanjut cek includes()
            }

            // === Menu lain ===
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
