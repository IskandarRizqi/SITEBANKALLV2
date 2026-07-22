<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    .visitor-stats {
        background-color: #f8f9fa;
        padding: 20px;
        /* Diperkecil dari 30px */
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        text-align: center;
    }

    .visitor-stats h5 {
        font-size: 16px;
        /* Diperkecil dari 24px */
        font-weight: 700;
        color: #333;
        margin-bottom: 10px;
    }

    .visitor-stats p {
        font-size: 12px;
        /* Diperkecil dari 14px */
        color: #000000;
        margin-bottom: 20px;
    }

    .stats-container {
        display: flex;
        justify-content: space-evenly;
        /* Distribusi yang lebih merata untuk 2 item */
        gap: 10px;
    }

    .stat-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .stat-item i {
        font-size: 22px;
        /* Diperkecil dari 28px */
        color: #cb201d;
        margin-bottom: 8px;
    }

    .stat-info .stat-number {
        display: block;
        font-size: 18px;
        /* Diperkecil dari 28px */
        font-weight: 700;
        color: #000000;
        line-height: 1;
    }

    .stat-info p {
        font-size: 10px;
        /* Diperkecil dari 12px */
        color: #000000;
        margin: 5px 0 0;
    }

    .whatsapp-float {
        position: fixed;
        bottom: 28px;
        right: 27px;
        z-index: 1000;
    }



    /* Responsive untuk layar sangat kecil */
    @media (max-width: 767.98px) {
        .stats-container {
            flex-direction: row;
            /* Tetap horizontal di mobile */
            justify-content: center;
            gap: 20px;
        }

        .stat-item {
            flex-direction: column;
            /* Kembali ke kolom */
        }

        .whatsapp-float {
            bottom: 80px;
            right: 15px;
        }
    }

    /* Mobile Bottom Navigation */
    .mobile-bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #1578f1;
        /* warna hijau menyesuaikan website */
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
        color: #ad1414;
    }

    /* agar konten tidak tertutup navbar */
    @media (max-width: 768px) {
        body {
            padding-bottom: 60px;
        }
    }


    @keyframes runningText {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .footer-social {
        margin-top: 15px;
        display: flex;
        gap: 10px;
    }

    .footer-social a {
        width: 38px;
        height: 38px;
        background: #1a902a;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .3s;
        font-size: 14px;
    }

    .footer-social a:hover {
        background: #1a902a;
        transform: translateY(-3px);
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
<!-- ##### Footer Area Start ##### -->
<footer class="footer-area section-padding-100-0">
    <div class="container">
        <div class="row">

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-footer-widget mb-100">
                    <h5 class="widget-title">Tentang Perusahaan</h5>
                    <p style="text-align: justify; line-height:1.6; color: #fff;">
                        PT. BPR Datagita Mustika terletak di kawasan pusat ekonomi strategis di Leuwiliang PT. BPR
                        Datagita Mustika memiliki misi untuk ikut berperan
                        Serta menumbuh kembangkan perekonomian.
                    </p>

                    <div class="footer-social">
                        <a
                            href="https://web.facebook.com/people/Bpr-Datagita-Mustika/pfbid0tVYVc9su8ae1Cw5PeN7JMpMduKjynaSg7r6QTUZUoBbHVyaspov1dbFja3qPH4C4l/"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/bpr_datagitamustika/?hl=id"><i
                                class="fab fa-instagram"></i></a>
                        {{-- <a href="https://www.youtube.com/@BPRPESISIRDatagita Mustika"><i
                                class="fab fa-youtube"></i></a> --}}
                        {{-- <a href="#"><i class="fab fa-tiktok"></i></a> --}}
                        <a
                            href="https://api.whatsapp.com/send/?phone=6281314791447&text&type=phone_number&app_absent=0"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>

                </div>
            </div>
            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-footer-widget mb-100">
                    <h5 class="widget-title">Tautan Terkait</h5>
                    <!-- Nav -->
                    <nav>
                        <ul>
                            <li><a href="/pengaduan">Pengaduan Nasabah</a></li>
                            {{-- <li><a href="/contact">Kontak</a></li> --}}
                            <li><a href="/lelang-jualaset">Lelang</a></li>
                            <li><a href="/jaringankantor">Jaringan Kantor</a></li>
                            <li><a href="/informasi">Berita</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-footer-widget mb-100">
                    <h5 class="widget-title">Jaringan Kantor</h5>
                    <!-- Nav -->
                    <select id="pilihKantor" class="form-select mb-3"
                        style="background-color:#ffffff; color:#462ced; text-transform:none;">

                        @foreach ($kantorglobal as $kantor)
                        <option value="{{ $kantor->id }}" data-nama="{{ $kantor->kantor }}"
                            data-alamat="{{ $kantor->alamat }}" data-telp="{{ $kantor->no_telp }}"
                            data-lat="{{ $kantor->latitude }}" data-lng="{{ $kantor->longitude }}"
                            data-thumb="/recfil?display=true&rf={{ $kantor->thumbnail }}" {{ strtolower($kantor->kantor)
                            == 'kantor pusat' ? 'selected' : '' }}>
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

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-2">
                <div class="visitor-stats">
                    <h5>Statistik Pengunjung</h5>
                    {{-- <p>
                        Pantau aktivitas real-time website kami dan lihat bagaimana kami terus berkembang.
                    </p> --}}
                    <div class="stats-container">
                        <div class="stat-item">
                            <i class="fas fa-users"></i>
                            <div class="stat-info">
                                <span class="stat-number" data-target="{{ $total_visitor }}">0</span>
                                <p>Total Pengunjung</p>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-user-check"></i>
                            <div class="stat-info">
                                <span class="stat-number" data-target="{{ $today_visitor }}">0</span>
                                <p>Pengunjung Hari Ini</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <div class="container footer-menu">
        <div class="f-menu running-text">
            <span style="color: white; margin-bottom: 10px;">
                PT. BPR Datagita Mustika berizin dan diawasi oleh <strong>Otoritas Jasa Keuangan (OJK)</strong> serta
                merupakan peserta penjaminan LPS.
                Maksimum nilai simpanan yang dijamin oleh
                LPS adalah Rp.2 Miliar per nasabah per bank. Untuk informasi tingkat suku bunga
                penjaminan LPS dapat diakses
            </span>
        </div>
    </div>


    <!-- Copywrite Area -->
    <div class="copywrite-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copywrite-content d-flex flex-wrap justify-content-between align-items-center">
                        <!-- Footer Logo -->
                        {{-- <a href="/" class="footer-logo"><img
                                src="{{ asset('frontend/bprdatagita/img/logo/logo.png') }}" alt="logo"
                                width="125px;"></a> --}}

                        <!-- Copywrite Text -->
                        <p class="copywrite-text"><a href="#">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> BPR Datagita Mustika All Rigths Reserved by <a href="https://antaruang.com/"
                                    target="_blank" style="color: #e72c2c">Antar Uang</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
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
<!-- ##### Footer Area Start ##### -->
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

        //    document.getElementById('namaKantor').innerText = nama;
        document.getElementById('alamatKantor').innerHTML =
    `<span style="color:#fff;">${alamat}</span>`;

        document.getElementById('telpKantor').innerHTML =
            `<strong style="color:#fff;">Telp : </strong> 
         <a href="tel:${telp}" style="color:#fff;">${telp}</a>`;

        let googleLink = `https://www.google.com/maps?q=${lat},${lng}`;

        let thumbnailHTML = `
        <a href="${googleLink}" target="_blank">
            <img src="${thumb}" 
                 style="width:80%; height:70px; object-fit:cover; border-radius:8px; cursor:pointer; text-align:center"
                 alt="Lokasi Kantor">
        </a>
    `;

        document.getElementById('thumbnailContainer').innerHTML = thumbnailHTML;
    }

    // Ketika dropdown berubah
    document.getElementById('pilihKantor')
        .addEventListener('change', tampilkanKantor);

    // Saat pertama kali halaman dibuka (default Kantor Pusat langsung tampil)
    window.addEventListener('DOMContentLoaded', tampilkanKantor);
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const animateCounter = (element) => {
            const target = +element.getAttribute('data-target');
            const increment = target / 200;
            let current = 0;
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    element.innerText = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    element.innerText = target.toLocaleString('id-ID');
                }
            };
            updateCounter();
        };

        const statsSection = document.querySelector('.visitor-stats');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = document.querySelectorAll('.stat-number');
                    counters.forEach(counter => animateCounter(counter));
                    observer.unobserve(statsSection);
                }
            });
        }, {
            threshold: 0.5
        });

        if (statsSection) {
            observer.observe(statsSection);
        }
    });
</script>