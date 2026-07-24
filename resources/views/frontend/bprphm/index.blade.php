@extends('frontend.bprphm.layout.main')

@section('content')
<style>
    @media (max-width: 768px) {

        .cta-flex {
            flex-direction: column;
            text-align: center;
        }

        .cta-flex div {
            padding: 15px;
        }

        .cta-flex img {
            max-width: 80%;
            margin: 20px auto;
        }

        .cta-flex h2 {
            font-size: 1.6rem;
        }

        .cta-flex h3 {
            font-size: 1.4rem;
        }

        /* SIMULASI */
        .simulasi-wrapper {
            flex-direction: column !important;
        }

        .simulasi-left {
            width: 100% !important;
            padding-right: 0 !important;
        }

        .simulasi-right {
            width: 100% !important;
            margin-top: 25px;
            justify-content: center !important;
        }

        .simulasi-right img {
            width: 100% !important;
            max-width: 350px;
        }

        #hasilSimulasi {
            overflow-x: auto !important;
            display: block;
            width: 100%;
        }

        #hasilSimulasi table {
            min-width: 700px;
        }

        #officeInfo {
            flex-direction: column !important;
            gap: 20px;
        }

    }

    .partner-logo {
        width: 100%;
        text-align: center;
        padding: 30px 0;
    }

    .partner-logo img {
        max-width: 85%;
        height: auto;
    }
</style>

<body>
    <div class="wrapper">

        <div id="carousel" class="carousel slide " data-ride="carousel" data-interval="4000">

            <ol class="carousel-indicators">
                @php $indicatorIndex = 0; @endphp
                @foreach ($baner as $item)
                @if (!empty($item->url) || !empty($item->url_mobile))
                <li data-target="#carousel" data-slide-to="{{ $indicatorIndex }}"
                    class="{{ $indicatorIndex == 0 ? 'active' : '' }}"></li>
                @php $indicatorIndex++; @endphp
                @endif
                @endforeach
            </ol>

            <div class="carousel-inner">
                @php $activeSet = false; @endphp

                @foreach ($baner as $item)
                @if (!empty($item->url) || !empty($item->url_mobile))
                <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">

                    {{-- DESKTOP --}}
                    @if (!empty($item->url))
                    <img src="{{env('APP_URL','')}}/recfil?display=true&rf={{ $item->url }}"
                        class="d-none d-md-block w-100" alt="Slide">
                    @endif

                    {{-- MOBILE --}}
                    @if (!empty($item->url_mobile))
                    <img src="{{env('APP_URL','')}}/recfil?display=true&rf={{ $item->url_mobile }}"
                        class="d-block d-md-none w-100" alt="Slide">
                    @endif

                </div>

                @php $activeSet = true; @endphp
                @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        {{-- Periksa apakah koleksi $umkm tidak kosong --}}
        @if ($umkm->isNotEmpty())
        <div class="blog sp">
            <div class="container">
                <div class="section-header text-center">
                    <p>UMKMss</p>
                    <h2>UMKM BPR PHM</h2>
                </div>

                <div class="space30"></div>

                <div class="row">
                    @foreach ($umkm as $item)
                    @php
                    // badge
                    $badge = '';
                    $badgeColor = '';

                    if ($item->type_pilihan == 0) {
                    $badge = '⭐ Rekomendasi';
                    $badgeColor = '#28a745';
                    } elseif ($item->type_pilihan == 1) {
                    $badge = '🔥 Terlaris';
                    $badgeColor = '#dc3545';
                    } elseif ($item->type_pilihan == 2) {
                    $badge = '🏆 Top Rating';
                    $badgeColor = '#ffc107';
                    }

                    // layanan json
                    $layanan = json_decode($item->layanan, true);
                    $layananText = is_array($layanan) ? implode(', ', $layanan) : $item->layanan;
                    @endphp

                    <div class="col-md-3 col-12 mb-3">
                        <div style="
                                            border-radius:10px;
                                            overflow:hidden;
                                            box-shadow:0 4px 12px rgba(0,0,0,0.1);
                                            background:#fff;
                                            transition:0.3s;
                                            height:100%;
                                        " onmouseover="this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.transform='translateY(0)'">

                            <!-- gambar -->
                            <div style="position:relative;">
                                <img src="{{env('APP_URL','')}}/recfil?display=true&rf={{ $item->thumbnail }}"
                                    style="height:200px;width:100%;object-fit:fill;">

                                @if ($badge)
                                <span style="
                                                        position:absolute;
                                                        top:10px;
                                                        left:10px;
                                                        background:{{ $badgeColor }};
                                                        color:#fff;
                                                        padding:4px 10px;
                                                        font-size:12px;
                                                        border-radius:20px;
                                                        font-weight:bold;
                                                    ">
                                    {{ $badge }}
                                </span>
                                @endif

                                @if ($item->nilai_discount > 0)
                                <span style="
                                                        position:absolute;
                                                        top:10px;
                                                        right:10px;
                                                        background:#cb201d;
                                                        color:#fff;
                                                        padding:4px 10px;
                                                        font-size:12px;
                                                        border-radius:20px;
                                                        font-weight:bold;
                                                    ">
                                    Diskon {{ $item->nilai_discount }}
                                </span>
                                @endif
                            </div>

                            <!-- content -->
                            <div style="padding:12px;">

                                <!-- title -->
                                <h5 style="
                                                    font-size:15px;
                                                    font-weight:bold;
                                                    margin-bottom:5px;
                                                    height:40px;
                                                    overflow:hidden;
                                                    text-align:center;
                                                ">
                                    {{ \Illuminate\Support\Str::limit($item->title, 45) }}
                                </h5>

                                <!-- rating -->
                                <div style="font-size:13px;color:#ffc107;margin-bottom:5px;">
                                    ⭐ {{ $item->rating }}
                                </div>

                                <!-- lokasi -->
                                <div style="font-size:13px;color:#666;margin-bottom:4px;">
                                    ⏰ Buka: {{ substr($item->jam_buka, 0, 5) }} -
                                    {{ substr($item->jam_tutup, 0, 5) }}
                                </div>

                                <!-- layanan -->
                                <div style="
                                                    font-size:12px;
                                                    color:#444;
                                                    margin-bottom:10px;
                                                    height:30px;
                                                    overflow:hidden;
                                                ">
                                    🛍️ {{ \Illuminate\Support\Str::limit($layananText, 40) }}
                                </div>

                                <!-- button -->
                                <a href="{{ route('detumkm', $item->id) }}" style="
                                                    display:block;
                                                    text-align:center;
                                                    background:#2c2e93;
                                                    color:#fff;
                                                    padding:6px;
                                                    border-radius:5px;
                                                    font-size:13px;
                                                    text-decoration:none;
                                                    font-weight:bold;
                                                ">
                                    Lihat Detail
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div style="display:flex; justify-content:flex-end; margin-top:15px;">
                    <a href="umkm" style="
                                    background:#2c2e93;
                                    color:#fff;
                                    padding:8px 20px;
                                    border-radius:5px;
                                    font-weight:bold;
                                    text-decoration:none;
                                ">
                        Selengkapnya..
                    </a>
                </div>

            </div>
        </div>
        @endif






        <!-- Service Start -->
        <div class="service">
            <div class="container">
                {{-- <div class="section-header text-center">
                    <p>Our Services</p>
                    <h2>We Provide Services</h2>
                </div> --}}
                <div class="row">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{env('APP_URL','')}}/frontend/bprphm/img/produk/kredit/kredit.png"
                                    alt="Image">
                                <div class="service-overlay">
                                    <p>
                                        Solusi pendanaan untuk beragam kebutuhan Anda di BPR Perbaungan Hombar Makmur
                                    </p>
                                </div>
                            </div>
                            <div class="service-text">
                                <h3>Kredit</h3>
                                <a class="btn" href="frontend/bprphm/img/produk/kredit/kredit.png"
                                    data-lightbox="service">+</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{env('APP_URL','')}}/frontend/bprphm/img/produk/tabungan/tab.png"
                                    alt="Image">
                                <div class="service-overlay">
                                    <p>
                                        Nikmati kemudahan menabung bersama tabungan BPR Perbaungan Hombar Makmur
                                    </p>
                                </div>
                            </div>
                            <div class="service-text">
                                <h3>Tabungan</h3>
                                <a class="btn" href="frontend/bprphm/img/produk/tabungan/tab.png"
                                    data-lightbox="service">+</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{env('APP_URL','')}}/frontend/bprphm/img/produk/deposito/depo.png"
                                    alt="Image">
                                <div class="service-overlay">
                                    <p>
                                        Rencanakan masa depan keuangan Anda bersama deposito BPR Perbaungan Hombar
                                        Makmur
                                    </p>
                                </div>
                            </div>
                            <div class="service-text">
                                <h3>Deposito</h3>
                                <a class="btn" href="frontend/bprphm/img/produk/deposito/depo.png"
                                    data-lightbox="service">+</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Service End -->


        <div style="width:82%; margin:auto; background:#2c2e93; padding:35px; border-radius:15px; margin-top:60px; display:flex; flex-direction:column;"
            class="simulasi-wrapper">

            <div class="simulasi-wrapper" style="display:flex;">

                <div class="simulasi-left" style="width:55%; color:white; padding-right:20px;" class="simulasi-left">

                    <h3 style="font-weight:600; margin-bottom:25px; display:flex; align-items:center; color: white;">
                        <img src="{{env('APP_URL','')}}/frontend/bprrudo/assets/img/produk/iconsimulasi.png"
                            style="width:50px; margin-right:10px;">
                        Simulasi Pinjaman
                    </h3>


                    <label style="font-size:14px;">Plafon Pembiayaan</label>
                    <div style="display:flex; align-items:center; background:white; border-radius:30px;
                padding:12px 20px; margin-bottom:18px;">
                        <span style="color:#2c2e93; font-weight:bold; margin-right:10px;">Rp.</span>

                        <input type="text" id="plafon" placeholder="Ketik disini"
                            style="border:none; outline:none; width:100%; font-size:14px;">
                    </div>

                    <label style="font-size:14px;">Lama Angsuran</label>
                    <div style="display:flex; align-items:center; background:white; border-radius:30px;
                padding:12px 20px; margin-bottom:18px;">

                        <input type="text" id="tenor" placeholder="Ketik disini"
                            style="border:none; outline:none; width:100%; font-size:14px;">

                        <span style="color:#2c2e93; font-weight:bold; margin-left:10px;">Bulan</span>
                    </div>

                    <label style="font-size:14px;">Bunga</label>
                    <div style="display:flex; align-items:center; background:white; border-radius:30px;
                padding:12px 20px; margin-bottom:18px;">

                        <input type="text" id="bunga" placeholder="Ketik disini"
                            style="border:none; outline:none; width:100%; font-size:14px;">

                        <span style="color:#2c2e93; font-weight:bold; white-space:nowrap; margin-left:10px;">
                            % / Tahun
                        </span>
                    </div>

                    <label style="font-size:14px;">Sistem Angsuran</label>
                    <div style="background:white; border-radius:30px; padding:0; margin-bottom:30px;">

                        <select id="sistem" style="width:100%; padding:12px 20px; border-radius:30px;
                        border:none; outline:none; font-size:14px;
                        appearance:none; -webkit-appearance:none; -moz-appearance:none;
                        background:white url('data:image/svg+xml;utf8,<svg fill=\'%232c2e93\' height=\'18\' viewBox=\'0 0 24 24\' width=\'18\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>') 
                        no-repeat right 20px center;">
                            <option value="">Pilih</option>
                            <option value="flat">Flat</option>
                            <option value="anuitas">Anuitas</option>
                        </select>

                    </div>


                    <div style="display:flex; justify-content:space-between; margin-top:5px; margin-bottom:20px;"
                        class="simulasi-buttons">

                        <button id="btnReset" style="width:40%; padding:12px; border-radius:30px; background:#cb201d;
                        border:none; color:white; font-size:14px;">
                            Reset
                        </button>

                        <button id="btnHitung" style="width:55%; padding:12px; border-radius:30px; background:white;
                        border:none; color:#2c2e93; font-weight:bold; font-size:14px;">
                            Hitung
                        </button>

                    </div>

                </div>


                <div class="simulasi-right" style="width:45%; display:flex; align-items:center; justify-content:center;"
                    class="simulasi-right">
                    <img src="{{env('APP_URL','')}}/frontend/bprphm/img/rate.png"
                        style="width:90%; border-radius:10px;">
                </div>

            </div>


            <div id="hasilSimulasiContainer" style="width:100%; margin-top:30px; display:none;">
                <div style="background:white; border-radius:10px; padding:20px; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
                    <h4 style="color:#2c2e93; margin-bottom:15px; text-align:center;">Hasil Simulasi Pinjaman</h4>
                    <div id="hasilSimulasi" style="width:100%;"></div>
                </div>
            </div>

        </div>


        <!-- Video Start -->
        {{-- <div class="video wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <button type="button" class="btn-play" data-toggle="modal"
                    data-src="https://www.youtube.com/embed/25X7vZhiQ6E" data-target="#videoModal">
                    <span></span>
                </button>

            </div>
        </div> --}}

        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video End -->


        {{--
        <!-- Team Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Our Team</p>
                    <h2>Meet Our Engineer</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="frontend/bprphm/img/team-1.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Adam Phillips</h2>
                                <p>CEO & Founder</p>
                            </div>
                            <div class="team-social">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="frontend/bprphm/img/team-2.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Dylan Adams</h2>
                                <p>Civil Engineer</p>
                            </div>
                            <div class="team-social">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="frontend/bprphm/img/team-3.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Jhon Doe</h2>
                                <p>Interior Designer</p>
                            </div>
                            <div class="team-social">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="frontend/bprphm/img/team-4.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Josh Dunn</h2>
                                <p>Painter</p>
                            </div>
                            <div class="team-social">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End --> --}}


        {{--
        <!-- FAQs Start -->
        <div class="faqs">
            <div class="container">
                <div class="section-header text-center">
                    <p>Frequently Asked Question</p>
                    <h2>You May Ask</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id="accordion-1">
                            <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
                                        Lorem ipsum dolor sit amet?
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                        mi. Curabitur facilisis ornare velit non.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo">
                                        Lorem ipsum dolor sit amet?
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                        mi. Curabitur facilisis ornare velit non.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInLeft" data-wow-delay="0.3s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree">
                                        Lorem ipsum dolor sit amet?
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                        mi. Curabitur facilisis ornare velit non.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInLeft" data-wow-delay="0.4s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseFour">
                                        Lorem ipsum dolor sit amet?
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                        mi. Curabitur facilisis ornare velit non.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInLeft" data-wow-delay="0.5s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseFive">
                                        Lorem ipsum dolor sit amet?
                                    </a>
                                </div>
                                <div id="collapseFive" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                        mi. Curabitur facilisis ornare velit non.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="accordion-2">
                            <div class="card wow fadeInRight" data-wow-delay="0.1s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseSix">
                                        Lorem ipsum dolor sit amet?
                                    </a>
                                </div>
                                <div id="collapseSix" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                        mi. Curabitur facilisis ornare velit non.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInRight" data-wow-delay="0.2s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseSeven">
                                        Lorem ipsum dolor sit amet?
                                    </a>
                                </div>
                                <div id="collapseSeven" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                        mi. Curabitur facilisis ornare velit non.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInRight" data-wow-delay="0.3s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseEight">
                                        Lorem ipsum dolor sit amet?
                                    </a>
                                </div>
                                <div id="collapseEight" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                        mi. Curabitur facilisis ornare velit non.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInRight" data-wow-delay="0.4s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseNine">
                                        Lorem ipsum dolor sit amet?
                                    </a>
                                </div>
                                <div id="collapseNine" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                        mi. Curabitur facilisis ornare velit non.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInRight" data-wow-delay="0.5s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseTen">
                                        Lorem ipsum dolor sit amet?
                                    </a>
                                </div>
                                <div id="collapseTen" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                        mi. Curabitur facilisis ornare velit non.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQs End --> --}}


        {{--
        <!-- Testimonial Start -->
        <div class="testimonial wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-slider-nav">
                            <div class="slider-nav"><img src="frontend/bprphm/img/testimonial-1.jpg" alt="Testimonial">
                            </div>
                            <div class="slider-nav"><img src="frontend/bprphm/img/testimonial-2.jpg" alt="Testimonial">
                            </div>
                            <div class="slider-nav"><img src="frontend/bprphm/img/testimonial-3.jpg" alt="Testimonial">
                            </div>
                            <div class="slider-nav"><img src="frontend/bprphm/img/testimonial-4.jpg" alt="Testimonial">
                            </div>
                            <div class="slider-nav"><img src="frontend/bprphm/img/testimonial-1.jpg" alt="Testimonial">
                            </div>
                            <div class="slider-nav"><img src="frontend/bprphm/img/testimonial-2.jpg" alt="Testimonial">
                            </div>
                            <div class="slider-nav"><img src="frontend/bprphm/img/testimonial-3.jpg" alt="Testimonial">
                            </div>
                            <div class="slider-nav"><img src="frontend/bprphm/img/testimonial-4.jpg" alt="Testimonial">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-slider">
                            <div class="slider-item">
                                <h3>Customer Name</h3>
                                <h4>profession</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                                    Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                                    gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                                    maximus.</p>
                            </div>
                            <div class="slider-item">
                                <h3>Customer Name</h3>
                                <h4>profession</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                                    Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                                    gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                                    maximus.</p>
                            </div>
                            <div class="slider-item">
                                <h3>Customer Name</h3>
                                <h4>profession</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                                    Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                                    gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                                    maximus.</p>
                            </div>
                            <div class="slider-item">
                                <h3>Customer Name</h3>
                                <h4>profession</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                                    Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                                    gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                                    maximus.</p>
                            </div>
                            <div class="slider-item">
                                <h3>Customer Name</h3>
                                <h4>profession</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                                    Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                                    gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                                    maximus.</p>
                            </div>
                            <div class="slider-item">
                                <h3>Customer Name</h3>
                                <h4>profession</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                                    Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                                    gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                                    maximus.</p>
                            </div>
                            <div class="slider-item">
                                <h3>Customer Name</h3>
                                <h4>profession</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                                    Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                                    gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                                    maximus.</p>
                            </div>
                            <div class="slider-item">
                                <h3>Customer Name</h3>
                                <h4>profession</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                                    Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                                    gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                                    maximus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End --> --}}


        <!-- Blog Start -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>Informasi</p>
                    <h2>Berita Terbaru</h2>
                </div>
                <div class="row">
                    @foreach ($allinfo as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">

                            <div class="blog-img">
                                <a href="{{ route('detberita', $item->id) }}">
                                    <img src="{{env('APP_URL','')}}/recfil?display=true&rf={{ $item->thumbnail }}"
                                        alt="{{ $item->title }}" style="width:100%; height:220px; object-fit:fill;">
                                </a>
                            </div>

                            <div class="blog-meta">
                                <p>
                                    <i class="far fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                </p>

                                <p class="ml-3">
                                    <i class="fas fa-tag"></i>
                                    {{ implode(', ', json_decode($item->tag, true) ?? []) }}
                                </p>
                            </div>

                            <div class="blog-text">
                                <h4>
                                    <a href="{{ route('detberita', $item->id) }}"
                                        style="font-weight:bold; color:#000; text-decoration:none; font-size: 20px;">
                                        {{ \Illuminate\Support\Str::limit($item->title, 80) }}
                                    </a>
                                </h4>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                <div style="display:flex; justify-content:flex-end; margin-top:15px;">
                    <a href="informasi" style="
                                background:#2c2e93;
                                color:#fff;
                                padding:8px 20px;
                                border-radius:5px;
                                font-weight:bold;
                                text-decoration:none;
                            ">
                        Selengkapnya..
                    </a>
                </div>
            </div>
        </div>
        <!-- Blog End -->
        {{-- <div class="section-header text-center">
            <p>PJOB</p>
            <h2>Berita Terbaru</h2>
        </div> --}}
        <div class="partner-logo" style="">
            <img src="{{ asset('frontend/bprphm/img/pjob/1.png') }}" alt="Logo">
        </div>



    </div>

</body>
<script>
    function customRound(number) {
            const last2 = String(Math.round(number)).slice(-2);
            const val = Number(last2);
            if (val === 0) return Math.round(number);

            if (val <= 50) return Math.round(number) - val + 50;
            else return Math.round(number) - val + 100;
        }

        // FORMAT RUPIAH + 2 DESIMAL
        function formatRupiah(num) {
            return Number(num).toLocaleString("id-ID", {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }


        document.getElementById("btnHitung").addEventListener("click", function() {

            let plafon = parseInt(document.getElementById("plafon").value.replace(/\D/g, ''));
            let tenor = parseInt(document.getElementById("tenor").value);
            let bungaTahun = parseFloat(document.getElementById("bunga").value);
            let sistem = document.getElementById("sistem").value;

            if (!plafon || !tenor || !bungaTahun || !sistem) {
                alert("Harap lengkapi semua input.");
                return;
            }

            let bungaPerBulan = bungaTahun / 12 / 100;

            let html = `
        <table style="width:100%; border-collapse:collapse;">
            <tr style="background:#2c2e93; color:white; text-align:center;">
                <th style="padding:12px 8px; font-size:14px;">Tenor</th>
                <th style="padding:12px 8px; font-size:14px;">Angsuran Pokok</th>
                <th style="padding:12px 8px; font-size:14px;">Angsuran Bunga</th>
                <th style="padding:12px 8px; font-size:14px;">Total Angsuran</th>
                <th style="padding:12px 8px; font-size:14px;">Baki Debet</th>
            </tr>
    `;

            let totalPokok = 0,
                totalBunga = 0,
                totalAngsuran = 0;

            let baki = plafon;



            // ====================================================
            // BARIS AWAL
            // ====================================================
            html += `
        <tr style="text-align:center; background:white; border-bottom:1px solid #eee;">
            <td style="padding:10px 8px; font-size:14px;">-</td>
            <td style="padding:10px 8px; font-size:14px;">Rp.0,00</td>
            <td style="padding:10px 8px; font-size:14px;">Rp.0,00</td>
            <td style="padding:10px 8px; font-size:14px;">Rp.0,00</td>
            <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(plafon)}</td>
        </tr>
    `;



            // ====================================================
            // SISTEM FLAT — PERHITUNGAN BPR
            // ====================================================
            if (sistem === "flat") {

                let bungaFlat = plafon * bungaPerBulan;
                let pokokTetap = plafon / tenor;
                let lastPokok = 0;

                for (let i = 1; i <= tenor; i++) {

                    let pokok = customRound(pokokTetap);
                    let bunga = customRound(bungaFlat);
                    let total = customRound(pokok + bunga);

                    baki -= pokok;
                    if (baki < 0) baki = 0;

                    // koreksi tenor terakhir
                    if (i === tenor - 1) lastPokok = baki;
                    if (i === tenor) pokok = lastPokok;

                    html += `
                <tr style="text-align:center; background:white; border-bottom:1px solid #eee;">
                    <td style="padding:10px 8px; font-size:14px;">${i}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(pokok)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(bunga)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(total)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(baki)}</td>
                </tr>
            `;

                    totalPokok += pokok;
                    totalBunga += bunga;
                    totalAngsuran += total;
                }
            }



            // ====================================================
            // SISTEM ANUITAS — SAMA DGN BPR
            // ====================================================
            else if (sistem === "anuitas") {

                let A = (plafon * bungaPerBulan) / (1 - Math.pow(1 + bungaPerBulan, -tenor));
                A = customRound(A);

                let lastPokok = 0;

                for (let i = 1; i <= tenor; i++) {

                    let bunga = customRound(baki * bungaPerBulan);
                    let pokok = customRound(A - bunga);

                    baki -= pokok;
                    if (baki < 0) baki = 0;

                    // koreksi tenor terakhir
                    if (i === tenor - 1) lastPokok = baki;
                    if (i === tenor) pokok = lastPokok;

                    html += `
                <tr style="text-align:center; background:white; border-bottom:1px solid #eee;">
                    <td style="padding:10px 8px; font-size:14px;">${i}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(pokok)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(bunga)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(A)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(baki)}</td>
                </tr>
            `;

                    totalPokok += pokok;
                    totalBunga += bunga;
                    totalAngsuran += A;
                }
            }



            // ====================================================
            // TOTAL
            // ====================================================
            html += `
        <tr style="background:#e86c55; text-align:center; font-weight:bold; color:white;">
            <td style="padding:12px 8px; font-size:14px;">Total</td>
            <td style="padding:12px 8px; font-size:14px;">Rp.${formatRupiah(totalPokok)}</td>
            <td style="padding:12px 8px; font-size:14px;">Rp.${formatRupiah(totalBunga)}</td>
            <td style="padding:12px 8px; font-size:14px;">Rp.${formatRupiah(totalAngsuran)}</td>
            <td style="padding:12px 8px; font-size:14px;">-</td>
        </tr>
        </table>
    `;

            document.getElementById("hasilSimulasi").innerHTML = html;
            document.getElementById("hasilSimulasiContainer").style.display = "block";
        });



        // RESET FORM
        document.getElementById("btnReset").addEventListener("click", function() {
            document.getElementById("plafon").value = "";
            document.getElementById("tenor").value = "";
            document.getElementById("bunga").value = "";
            document.getElementById("sistem").value = "";

            document.getElementById("hasilSimulasiContainer").style.display = "none";
        });
</script>
@endsection