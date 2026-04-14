<style>
    .footer-custom {
        background-color: #9c2b33;
        font-size: 14px;
        padding-top: 35px;
        padding-bottom: 50px;
        color: white;
    }

    .footer-custom p {
        margin: 0;
        color: white;
    }

    .footer-custom a {
        font-size: 23px;
        color: white !important;
        transition: 0.3s;
    }

    .footer-custom a:hover {
        color: blue !important;
    }

    .whatsapp-float {
        position: fixed;
        bottom: 28px;
        right: 27px;
        z-index: 1000;
    }

    @media (max-width: 768px) {
        .whatsapp-float {
            bottom: 80px;
            right: 15px;
        }

        .footer-custom .footer-group {
            flex-direction: column !important;
            align-items: center !important;
            text-align: center !important;
            gap: 15px;
        }

        .footer-custom .footer-item {
            width: 100% !important;
            margin-bottom: 10px;
        }

        .footer-custom .col-md-4.text-center.text-md-end {
            justify-content: center !important;
            margin-top: 15px;
        }

        .footer-custom .col-md-4.text-center.text-md-end a {
            margin: 0 8px 8px 8px;
        }

        .footer-custom {
            padding-bottom: 80px;
        }
    }

    .mobile-bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 65px;
        background: #ffffff;
        border-top: 4px solid #ddd;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    .mobile-bottom-nav ul {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 100%;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .mobile-bottom-nav ul li {
        flex: 1;
        text-align: center;
    }

    .mobile-bottom-nav ul li a {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        padding-top: 9px;
        font-size: 12px;
        color: #333;
        text-decoration: none;
        line-height: 1.1;
    }

    .mobile-bottom-nav ul li a i {
        font-size: 22px;
        margin-bottom: 3px;
    }

    .mobile-bottom-nav ul li a.active,
    .mobile-bottom-nav ul li a:hover {
        color: #A62C3D;
    }
</style>
<footer class="footer-custom">
    <div class="container-fluid px-4">

        <div class="row align-items-center mb-3">


            <div class="col-md-8 d-flex justify-content-start align-items-center gap-4 footer-group">

                <div class="footer-item">
                    <p class="mb-0" style="font-size: 15px">BPR Rudo merupakan <br> peserta penjaminan LPS</p>
                </div>


                <div class="footer-item text-center">
                    <img src="{{ asset('frontend/bprjas/assets/img/logo/LOGOLPS.png') }}" height="42">
                </div>


                <div class="footer-item">
                    <p class="mb-0" style="font-size: 15px">BPR Rudo berizin dan diawasi oleh <br> Otoritas Jasa
                        Keuangan</p>
                </div>

            </div>


            <div class="col-md-4 text-center text-md-end">

                <a href="jaringankantor" class="me-3"><i class="fas fa-map-marker-alt"></i></a>
                <a href="https://www.tiktok.com/@bprrudo" class="me-3" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="https://web.facebook.com/bprrudoindobank?_rdc=1&_rdr#" class="me-3" target="_blank"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/bprrudo/" class="me-3" target="_blank"><i
                        class="fab fa-instagram"></i></a>
                <a href="https://wa.me/6281334084545" class="me-3" target="_blank"><i class="fab fa-whatsapp"></i></a>


            </div>

        </div>


        <!-- Copyright -->
        <div class="row mt-3">
            <div class="col-12 text-center">
                <p>&copy; All rights reserved • Bank Rudo</p>
            </div>
        </div>

    </div>

    <!-- WA Floating -->
    <a href="https://wa.me/62895412301818" target="_blank" class="whatsapp-float">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" width="60">
    </a>

</footer>
<nav class="mobile-bottom-nav d-block d-lg-none">
    <ul>
        <li><a href="/"><i class="fa-solid fa-house"></i><span>Beranda</span></a></li>
        <li><a href="/kredit"><i class="fa-solid fa-credit-card"></i><span>Kredit</span></a></li>
        <li><a href="/deposito"><i class="fa-solid fa-coins"></i><span>Deposito</span></a></li>
        <li><a href="/tabungan"><i class="fa-solid fa-piggy-bank"></i><span>Tabungan</span></a></li>
        <li><a href="/jaringankantor"><i class="fa-solid fa-phone"></i><span>Kontak</span></a></li>
    </ul>
</nav>
