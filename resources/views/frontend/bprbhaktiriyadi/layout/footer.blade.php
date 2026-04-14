<style>
    /* Mobile Bottom Navigation */
    .mobile-bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #1a0779;
        z-index: 9999;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding: 10px 0;
    }

    .mobile-bottom-nav ul {
        display: flex;
        margin: 0;
        padding: 5px 0;
        list-style: none;
    }

    .mobile-bottom-nav ul li {
        flex: 1;
        text-align: center;
    }

    .mobile-bottom-nav ul li a {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 12px;
        text-decoration: none;
    }

    .mobile-bottom-nav ul li a i {
        font-size: 18px;
        margin-bottom: 2px;
    }

    .mobile-bottom-nav ul li a:hover {
        color: #ffffff;
    }
    .running-text {
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
    }

    .running-text span {
        display: inline-block;
        padding-left: 100%;
        animation: runningText 25s linear infinite;
    }

    @keyframes runningText {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }
</style>

<footer class="footer-wrapper footer-layout2 space-top" style="background-color: #1a0779">
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Kolom 1: About -->
                <div class="col-lg-3 col-md-6">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a href="index.html">
                                    <div
                                        style="background:#fff; padding:8px 20px; display:inline-block; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
                                        <img src="{{ asset('frontend/bprbhaktiriyadi/assets/img/logo/logo.png') }}"
                                            style="width: 180px" alt="logo">
                                    </div>
                                </a>
                            </div>
                            <p class="about-text" style="color: #fff">
                                BPR Baja Mitra Sejahtera merupakan lembaga keuangan yang berkomitmen
                                memberikan layanan perbankan terpercaya dengan produk tabungan, deposito,
                                dan kredit untuk mendukung pertumbuhan ekonomi masyarakat.
                            </p>
                            <div class="th-social">
                                <a href="https://web.facebook.com/bprbhaktiriyadiklaten/?_rdc=1&_rdr"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="https://x.com/bprbhaktiriyadi"><i class="fab fa-twitter"></i></a>

                                <a
                                    href="https://api.whatsapp.com/send/?phone=6281393630003&text&type=phone_number&app_absent=0"><i
                                        class="fab fa-whatsapp"></i></a>
                                <a href="https://www.youtube.com/@bprbhaktiriyadiklaten5203">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom 2: Tautan Terkait -->
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Tautan Terkait</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li style="color: #fff"><a href="/pengaduan" style="color: #fff">Pengaduan Nasabah</a>
                                </li>
                                 <li style="color: #fff"><a href="{{asset('frontend/bprbhaktiriyadi/assets/img/alur.png')}}" target="_blank" style="color: #fff">Alur Pengaduan Nasabah</a></li>
                                <li style="color: #fff"><a href="/rekrutmen" style="color: #fff">Karir</a></li>
                                <li style="color: #fff"><a href="/jaringankantor" style="color: #fff">Jaringan
                                        Kantor</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Kolom 3: Kontak Kami -->
                <div class="col-lg-3 col-md-6">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Kontak Kami</h3>
                        <div class="th-widget-contact">
                            <div class="info-box_text" style="display:flex; align-items:center; gap:10px;">
                                <div class="icon">
                                    <img src="{{ asset('frontend/bprbhaktiriyadi/assets/img/icon/phone.svg') }}"
                                        alt="img" style="width:20px;">
                                </div>
                                <div class="details">
                                    <p style="margin:0;">
                                        <a href="tel:+01234567890" class="info-box_link"
                                            style="color:#fff;">0281575002400</a>
                                    </p>
                                </div>
                            </div>
                            <div class="info-box_text" style="display:flex; align-items:center; gap:10px;">
                                <div class="icon">
                                    <img src="{{ asset('frontend/bprbhaktiriyadi/assets/img/icon/envelope.svg') }}"
                                        alt="img" style="width:20px;">
                                </div>
                                <div class="details">
                                    <p style="margin:0;">
                                        <a href="mailto:mailinfo00@atek.com" class="info-box_link"
                                            style="color:#fff;">bprbhaktiriyadi@gmail.com</a>
                                    </p>
                                </div>
                            </div>
                            <div class="info-box_text" style="display:flex; align-items:flex-start; gap:10px;">
                                <div class="icon">
                                    <img src="{{ asset('frontend/bprbhaktiriyadi/assets/img/icon/location-dot.svg') }}"
                                        alt="img" style="width:20px; margin-top:3px;">
                                </div>
                                <div class="details">
                                    <p style="margin:0;">
                                        <a href="https://maps.app.goo.gl/QyH2fFoJ9fii93mt7" target="_blank"
                                            style="color:#fff;">
                                            Jl. Proklamator Raya No.170 A, Bandar jaya Kec. Terbanggi Besar, Kabupaten
                                            Lampung
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom 4: Jaringan Kantor -->
                <div class="col-lg-3 col-md-6">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Jaringan Kantor</h3>
                        <select id="pilihKantor" class="form-select mb-3"
                            style="background-color:#ffffff; color:#462ced; text-transform:none;">
                            @foreach ($kantorglobal as $kantor)
                                <option value="{{ $kantor->id }}" data-nama="{{ $kantor->kantor }}"
                                    data-alamat="{{ $kantor->alamat }}" data-telp="{{ $kantor->no_telp }}"
                                    data-lat="{{ $kantor->latitude }}" data-lng="{{ $kantor->longitude }}"
                                    data-thumb="/recfil?display=true&rf={{ $kantor->thumbnail }}"
                                    {{ strtolower($kantor->kantor) == 'kantor pusat' ? 'selected' : '' }}>
                                    {{ $kantor->kantor }}
                                </option>
                            @endforeach
                        </select>
                        <div id="detailKantor">
                            <p id="namaKantor" style="font-weight:600; margin-bottom:4px;"></p>
                            <p id="alamatKantor" style="font-size:14px; margin-bottom:4px;"></p>
                            <p id="telpKantor" style="font-size:14px; margin-bottom:10px;"></p>
                            <div id="thumbnailContainer"></div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
        
    </div>
     <div class="container footer-menu" style="margin-bottom: 10px">
        <div class="f-menu running-text">
            <span style="color: white">
                PT. BPR Bhaktiriyadi berizin dan diawasi oleh Otoritas Jasa Keuangan (OJK) serta merupakan peserta penjaminan LPS.
                Maksimum nilai simpanan yang dijamin oleh
                LPS adalah Rp.2 Miliar per nasabah per bank. Untuk informasi tingkat suku bunga
                penjaminan LPS dapat diakses
            </span>
        </div>
    </div>
    
    <div class="copyright-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <p class="copyright-text">Copyright © <a href="index.html">BPR Baja</a>. Support By <a
                            href="" style="color: rgb(255, 255, 255)">Antar Uang</a></p>
                </div>
                <div class="col-lg-6 text-lg-end text-center">
                    <div class="footer-links"></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<nav class="mobile-bottom-nav d-block d-lg-none">
    <ul>
        <li><a href="/"><i class="fas fa-home"></i><span>Beranda</span></a></li>
        <li><a href="/kredit"><i class="fas fa-credit-card"></i><span>Kredit</span></a></li>
        <li><a href="/deposito"><i class="fas fa-coins"></i><span>Deposito</span></a></li>
        <li><a href="/tabungan"><i class="fas fa-piggy-bank"></i><span>Tabungan</span></a></li>
        <li><a href="/jaringankantor"><i class="fas fa-phone"></i><span>Kontak</span></a></li>
    </ul>
</nav>

<script>
    function tampilkanKantor() {
        let select = document.getElementById('pilihKantor');
        let selected = select.options[select.selectedIndex];

        let nama = selected.getAttribute('data-nama');
        let alamat = selected.getAttribute('data-alamat');
        let telp = selected.getAttribute('data-telp');
        let lat = selected.getAttribute('data-lat');
        let lng = selected.getAttribute('data-lng');
        let thumb = selected.getAttribute('data-thumb');

        document.getElementById('alamatKantor').innerHTML = `<span style="color:#fff;">${alamat}</span>`;
        document.getElementById('telpKantor').innerHTML =
            `<strong style="color:#fff;">Telp : </strong><a href="tel:${telp}" style="color:#fff;">${telp}</a>`;

        let googleLink = `https://www.google.com/maps?q=${lat},${lng}`;
        let thumbnailHTML = `
            <a href="${googleLink}" target="_blank">
                <img src="${thumb}" style="width:80%; height:70px; object-fit:cover; border-radius:8px; cursor:pointer; text-align:center" alt="Lokasi Kantor">
            </a>
        `;
        document.getElementById('thumbnailContainer').innerHTML = thumbnailHTML;
    }

    document.getElementById('pilihKantor').addEventListener('change', tampilkanKantor);
    window.addEventListener('DOMContentLoaded', tampilkanKantor);
</script>
