@extends('frontend.bprtanadoang.layout.main')

@section('content')
    <style>
        /* .slide-bg-img{
                                transform: none !important;
                                animation: none !important;
                                transition: none !important;
                            } */
        .rate-table th,
        .rate-table td {
            color: #fff !important;
        }
    </style>

    <body>

        <!-- ##### Hero Area Start ##### -->
        <div class="hero-area">
            <div class="hero-slideshow owl-carousel">

                @foreach ($baner as $item)
                    @if (!empty($item->url) || !empty($item->url_mobile))
                        <div class="single-slide bg-img">

                            <!-- DESKTOP -->
                            @if (!empty($item->url))
                                <div class="slide-bg-img bg-img"
                                    style="background-image: url('/recfil?display=true&rf={{ $item->url }}'); object-fit: fill;">
                                </div>
                            @endif

                            <!-- MOBILE -->
                            @if (!empty($item->url_mobile))
                                <div class="slide-bg-img bg-img d-block d-md-none"
                                    style="background-image: url('/recfil?display=true&rf={{ $item->url_mobile }}');">
                                </div>
                            @endif

                            <div class="slide-du-indicator"></div>

                        </div>
                    @endif
                @endforeach

            </div>
        </div>
        <!-- ##### Hero Area End ##### -->
        {{-- Periksa apakah koleksi $umkm tidak kosong --}}
        @if ($umkm->isNotEmpty())
            <div class="blog sp">
                <div class="container">
                    <div class="section-header text-center">
                        <p>UMKM</p>
                        <h2 style="margin-bottom: 50px;">UMKM BPR Tanadoang</h2>
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
                                        "
                                    onmouseover="this.style.transform='translateY(-5px)'"
                                    onmouseout="this.style.transform='translateY(0)'">

                                    <!-- gambar -->
                                    <div style="position:relative;">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            style="height:200px;width:100%;object-fit:fill;">

                                        @if ($badge)
                                            <span
                                                style="
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
                                            <span
                                                style="
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
                                        <h5
                                            style="
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
                                        <div
                                            style="
                                                    font-size:12px;
                                                    color:#444;
                                                    margin-bottom:10px;
                                                    height:30px;
                                                    overflow:hidden;
                                                ">
                                            🛍️ {{ \Illuminate\Support\Str::limit($layananText, 40) }}
                                        </div>

                                        <!-- button -->
                                        <a href="{{ route('detumkm', $item->id) }}"
                                            style="
                                                    display:block;
                                                    text-align:center;
                                                    background:#1578f1;
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
                        <a href="umkm"
                            style="
                                    background:#1578f1;
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

        <!-- ##### Features Area Start ###### -->
        <section class="features-area section-padding-100-0">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="100ms">

                            <div class="section-heading">
                                <div class="line"></div>
                                <p>Layanan Produk Kami</p>
                                <h3>Produk Unggulan</h3>
                            </div>

                            <h6>Kami menyediakan berbagai produk keuangan terpercaya seperti Kredit, Deposito, dan Tabungan
                                untuk membantu kebutuhan finansial Anda dengan aman dan mudah.</h6>

                            <a href="#" class="btn credit-btn mt-50">Ajukan</a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="300ms">
                            <img src="frontend/bprtanadoang/img/produk/kredit.png" alt="">
                            <h5>Kredit</h5>
                            <p>Pembiayaan mudah dan cepat untuk mendukung usaha maupun kebutuhan pribadi Anda.</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                            <img src="frontend/bprtanadoang/img/produk/deposito.png" alt="">
                            <h5>Deposito</h5>
                            <p>Investasi aman dengan bunga kompetitif untuk membantu mengembangkan dana Anda.</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="700ms">
                            <img src="frontend/bprtanadoang/img/produk/tabungan.png" alt="">
                            <h5>Tabungan</h5>
                            <p>Solusi menabung yang aman, fleksibel, dan membantu merencanakan masa depan Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="cta-area d-flex flex-wrap">
            <!-- Cta Thumbnail -->
            <div class="cta-thumbnail bg-img jarallax"
                style="background-image: url(frontend/bprtanadoang/img/bg-img/5.jpg);"></div>

            <!-- Cta Content -->
            <div class="cta-content">

                <div class="section-heading white">
                    <div class="line"></div>
                    {{-- <p>Informasi Produk</p> --}}
                    <h2>Rate Deposito</h2>
                </div>

                <div class="table-responsive mt-30">
                    <table class="table table-bordered table-striped rate-table">
                        <thead>
                            <tr>
                                <th>Jangka Waktu</th>
                                <th>Rate (%)</th>
                                {{-- <th>Keterangan</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1 Bulan</td>
                                <td>4.00%</td>
                                {{-- <td>Minimal 10 Juta</td> --}}
                            </tr>
                            <tr>
                                <td>3 Bulan</td>
                                <td>4.50%</td>
                                {{-- <td>Minimal 10 Juta</td> --}}
                            </tr>
                            <tr>
                                <td>6 Bulan</td>
                                <td>5.00%</td>
                                {{-- <td>Minimal 10 Juta</td> --}}
                            </tr>
                            <tr>
                                <td>12 Bulan</td>
                                <td>5.50%</td>
                                {{-- <td>Minimal 10 Juta</td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>

                <a href="/pengajuanonline" class="btn credit-btn box-shadow btn-2 mt-20">
                    Ajukan Deposito
                </a>

            </div>
        </section>
        <!-- ##### Call To Action End ###### -->

        <!-- ##### Call To Action Start ###### -->
        <section class="cta-2-area wow fadeInUp" data-wow-delay="100ms">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Cta Content -->
                        <div class="cta-content d-flex flex-wrap align-items-center justify-content-between">
                            <div class="cta-text">
                                <h4>Kami Siap Membantu Anda dengan Layanan Terpercaya.</h4>
                            </div>
                            <div class="cta-btn">
                                <a href="#" class="btn credit-btn box-shadow">Hubungi Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="miscellaneous-area bg-gray section-padding-100-0">
            <div class="container">
                <div class="row align-items-end justify-content-center">
                    <!-- Add Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="add-area mb-100 wow fadeInUp" data-wow-delay="100ms">
                            <a href="#"><img src="frontend/bprtanadoang/img/profil/2.png" alt=""></a>
                        </div>
                    </div>

                    <!-- Contact Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="contact--area mb-100 wow fadeInUp" data-wow-delay="300ms">
                            <!-- Section Heading -->
                            <div class="section-heading mb-50">
                                <div class="line"></div>
                                <h2>Kontak Kami</h2>
                            </div>
                            <!-- Contact Content -->
                            <div class="contact-content">
                                <!-- Single Contact Content -->
                                <div class="single-contact-content d-flex align-items-center">
                                    <div class="icon">
                                        <img src="frontend/bprtanadoang/img/core-img/location.png" alt="">
                                    </div>
                                    <div class="text">
                                        <p style="font-size: 13px">Jl. Hamang DM No 45 Benteng <br> Kepulauan Selayar</p>
                                    </div>
                                </div>
                                <!-- Single Contact Content -->
                                <div class="single-contact-content d-flex align-items-center">
                                    <div class="icon">
                                        <img src="frontend/bprtanadoang/img/core-img/call.png" alt="">
                                    </div>
                                    <div class="text">
                                        <p style="font-size: 13px">041422810 <br> senin-sabtu , 08:00 - 15:00 </p>

                                    </div>
                                </div>
                                <!-- Single Contact Content -->
                                <div class="single-contact-content d-flex align-items-center">
                                    <div class="icon">
                                        <img src="frontend/bprtanadoang/img/core-img/message2.png" alt="">
                                    </div>
                                    <div class="text">
                                        <p style="font-size: 13px;">bprtanadoang@gmail.com</p>
                                        {{-- <span>we reply in 24 hrs</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- News Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="news--area mb-100 wow fadeInUp" data-wow-delay="500ms">

                            <!-- Section Heading -->
                            <div class="section-heading mb-50">
                                <div class="line"></div>
                                <h2>Berita Terbarus</h2>
                            </div>

                            @foreach ($allinfo->take(3) as $item)
                                <!-- Single News Area -->
                                <div class="single-news-area d-flex align-items-center">

                                    <div class="news-thumbnail">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            alt="{{ $item->title }}"
                                            style="width:120px; height:87px; object-fit:cover;">
                                    </div>

                                    <div class="news-content">
                                        <a href="{{ route('detberita', $item->id) }}"
                                            style="
                                                    color:#000;
                                                    font-weight:600;
                                                    display: -webkit-box;
                                                    -webkit-line-clamp: 2;
                                                    -webkit-box-orient: vertical;
                                                    overflow: hidden;
                                            ">
                                            {{ $item->title }}
                                        </a>

                                        <span style="color:#000;">
                                            <i class="fa fa-calendar"></i>
                                            {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                        </span>

                                    </div>

                                </div>
                            @endforeach
                            <div style="margin-top:10px;">
                                <a href="/informasi" class="btn credit-btn btn-sm">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Miscellaneous Area End ###### -->





    </body>
@endsection
