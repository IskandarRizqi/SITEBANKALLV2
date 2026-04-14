@extends('frontend.bprbhaktiriyadi.layout.main')

@section('content')
    <Style>
        .hero-12 {
            position: relative;
        }

        .hero-12 .swiper-slide,
        .hero-12 .hero-inner,
        .hero-12 .th-hero-bg {
            height: 550px;
        }

        .hero-12 .th-hero-bg {
            background-size: 100% 100%;
            /* fill full kanan kiri bawah */
            background-position: center;
            background-repeat: no-repeat;
        }

        .blog-grid4 .blog-img {
            width: 420px;
            min-width: 420px;
        }

        .blog-grid4 .blog-img img {
            width: 420px;
            height: 230px;
            /* tinggi sama semua */
            object-fit: cover;
            border-radius: 8px;
        }

        .berita-desc {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.5;
            max-height: 3em;
            /* 2 baris */
            white-space: normal;
        }
    </Style>
    <div class="hero-12 white-bg" id="hero">
        <div class="swiper th-slider overflow-hidden" id="heroSlide12"
            data-slider-options='{"effect":"fade","autoHeight":false,"autoplay":{"delay":3000}}'>

            <div class="swiper-wrapper">

                @foreach ($baner as $item)
                    @if (!empty($item->url) || !empty($item->url_mobile))
                        <div class="swiper-slide">
                            <div class="hero-inner">

                                <!-- Desktop -->
                                @if (!empty($item->url))
                                    <div class="th-hero-bg d-none d-md-block"
                                        style="background-image: url('/recfil?display=true&rf={{ $item->url }}');">
                                    </div>
                                @endif

                                <!-- Mobile -->
                                @if (!empty($item->url_mobile))
                                    <div class="th-hero-bg d-block d-md-none"
                                        style="background-image: url('/recfil?display=true&rf={{ $item->url_mobile }}');">
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>

        <!-- Arrow -->
        <button data-slider-prev="#heroSlide12" class="slider-arrow slider-prev">
            <img src="frontend/bprbhaktiriyadi/assets/img/icon/right-arrow2.svg" alt="">
        </button>

        <button data-slider-next="#heroSlide12" class="slider-arrow slider-next">
            <img src="frontend/bprbhaktiriyadi/assets/img/icon/left-arrow2.svg" alt="">
        </button>

    </div>

    @if ($umkm->isNotEmpty())
        <div class="blog sp">
            <div class="container" style="margin-top: 50px">
                <div class="title-area about-12-titlebox mb-20 pe-xxl-1 me-xxl-1">
                    <span class="sub-title style1 text-anime-style-2">UMKM</span>
                    <h2 class="sec-title mb-20 text-anime-style-3">UMKM BPR Baja</h2>

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
                                                        background:#ff5722;
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
                                                     background: linear-gradient(45deg, #091098, #ffffff);
                                                    color:#fff;
                                                    padding:6px;
                                                    border-radius:20px;
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
                                     background: linear-gradient(45deg, #091098, #ffffff);
                                    color:#fff;
                                    padding:8px 20px;
                                    border-radius:20px;
                                    font-weight:bold;
                                    text-decoration:none;
                                ">
                        Selengkapnya..
                    </a>
                </div>

            </div>
        </div>
    @endif

  
    <section class="benefit-area position-relative overflow-hidden bg-smoke overflow-hidden" id="benefit-sec"
        data-bg-src="frontend/bprbhaktiriyadi/assets/img/bg/benefit-bg.png">
        <div class="swiper th-slider benefitSlide" id="benefitSlide"
            data-slider-options='{"effect":"fade","loog":true,"speed": 2000,"thumbs":{"swiper":".benefit-grid-thumb"}}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="benefit-img"><img src="frontend/bprbhaktiriyadi/assets/img/center.jpg"
                            alt="centerbaner"></div>
                </div>
               
            </div>
            
        </div>
        <div class="benefit-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4">
                        <div class="title-area benefit-titlebox pe-xl-5">
                            <h2 class="sec-title text-white text-anime-style-2">Produk & Layanan BPR Bhaktiriyadi</h2>
                            <p class="text-white wow fadeInUp">BPR Baja menyediakan berbagai produk layanan perbankan yang dirancang untuk memenuhi kebutuhan
                            finansial masyarakat dalam memberikan
                            kemudahan dalam mengelola keuangan secara fleksibel dan terpercaya.</p>
                            <div class="wow fadeInUp"><a href="benefit-details.html"
                                    class="th-btn style2 th-radius th-icon" style="margin-bottom: 40px">Ajukan <i
                                        class="fa-light fa-arrow-right-long"></i></a></div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="title-area"><span class="sub-title text-white text-anime-style-2">Produk & Layanan</span>
                            {{-- <h2 class="sec-title text-white text-anime-style-3">Key Benefits of Data Analytics</h2> --}}
                        </div>
                        <div class="slider-area benefit-slider-thumb-wrap">
                            <div class="swiper th-slider benefit-grid-thumb" id="benefitSlide"
                                data-slider-options='{"effect":"slide","loog":true,"breakpoints":{"0":{"slidesPerView":1},"575":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"},"1300":{"slidesPerView":"4"}}}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="box-img"><img
                                                src="frontend/bprbhaktiriyadi/assets/img/produk/kredit.png"
                                                alt="Image"></div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="box-img"><img
                                                src="frontend/bprbhaktiriyadi/assets/img/produk/tabungan.png"
                                                alt="Image"></div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="box-img"><img
                                                src="frontend/bprbhaktiriyadi/assets/img/produk/deposito.png"
                                                alt="Image"></div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="contact-area3 bg-top-center space-top overflow-hidden overflow-hidden" style="margin-top: 50px"
        data-bg-src="frontend/bprbhaktiriyadi/assets/img/bg/contact_bg_8.jpg">
        <div class="container">
            <div class="row gy-4 justify-content-between">
                <div class="col-lg-6">
                    <div class="title-area contact8-titlebox">
                        <span class="sub-title text-white text-anime-style-2">
                            Rate Deposito
                        </span>

                        <h2 class="sec-title text-white text-anime-style-3">
                            Nikmati Suku Bunga Deposito Kompetitif dan Investasi Aman Bersama BPR Baja
                        </h2>

                        <p class="text-white mt-3">
                            BPR Baja menawarkan produk deposito dengan suku bunga menarik dan jangka waktu fleksibel
                            untuk membantu Anda mengembangkan dana secara optimal.
                    </div>

                    <div class="contact-action wow fadeInUp">
                        <a href="/deposito" class="th-btn style7 th-radius th-icon" style="margin-bottom: 20px">
                            Ajukan Deposito
                            <i class="fa-light fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact8-form-area ms-xl-5">
                        <table class="table table-bordered rate-table h-100 mb-0" style="border-color: #3b87f9;">
                            <thead style="background: linear-gradient(135deg, #0d2b5e, #3b87f9);">
                                <tr>
                                    <th
                                        style="color: #f5c518; font-weight: 700; letter-spacing: 0.5px; padding: 14px 16px; border-color: #3b87f9;">
                                        Jangka Waktu</th>
                                    <th
                                        style="color: #f5c518; font-weight: 700; letter-spacing: 0.5px; padding: 14px 16px; border-color: #3b87f9;">
                                        Rate (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background-color: #eef4fb;">
                                    <td
                                        style="color: #3b87f9; font-weight: 600; padding: 13px 16px; border-color: #c4d6ed;">
                                        1 Bulan</td>
                                    <td
                                        style="color: #b8860b; font-weight: 700; padding: 13px 16px; border-color: #c4d6ed;">
                                        4.00%</td>
                                </tr>
                                <tr style="background-color: #ffffff;">
                                    <td
                                        style="color: #3b87f9; font-weight: 600; padding: 13px 16px; border-color: #c4d6ed;">
                                        3 Bulan</td>
                                    <td
                                        style="color: #b8860b; font-weight: 700; padding: 13px 16px; border-color: #c4d6ed;">
                                        5.00%</td>
                                </tr>
                                <tr style="background-color: #eef4fb;">
                                    <td
                                        style="color: #3b87f9; font-weight: 600; padding: 13px 16px; border-color: #c4d6ed;">
                                        6 Bulan</td>
                                    <td
                                        style="color: #b8860b; font-weight: 700; padding: 13px 16px; border-color: #c4d6ed;">
                                        5.50%</td>
                                </tr>
                                <tr style="background-color: #ffffff;">
                                    <td
                                        style="color: #3b87f9; font-weight: 600; padding: 13px 16px; border-color: #c4d6ed;">
                                        12 Bulan</td>
                                    <td
                                        style="color: #b8860b; font-weight: 700; padding: 13px 16px; border-color: #c4d6ed;">
                                        6.50%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-area space bg-smoke" data-bg-src="frontend/bprbhaktiriyadi/assets/img/shape/line-patter.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="sec_title_static">
                        <div class="sec_title_wrap">
                            <div class="title-area blog12-titlebox text-center text-lg-start pe-xl-5"><span
                                    class="sub-title text-anime-style-2">Informasi</span>
                                <h2 class="sec-title text-anime-style-3">Berita Terbaru</h2>
                                <div class="wow fadeInUp"><a href="/informasi"
                                        class="th-btn style4 th-radius th-icon">Lihat Semua .. <i
                                            class="fa-light fa-arrow-right-long"></i></a></div>
                            </div>
                            <div class="blog12-shape"><img src="frontend/bprbhaktiriyadi/assets/img/shape/blog-present.png"
                                    alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog-grid4-static-wrap">

                        @foreach ($allinfo->take(4) as $item)
                            <div class="col-12 blog-grid12 blog-grid4_wrapp">

                                <div class="blog-grid4 th-ani style4 mt-24 d-flex">

                                    <!-- Gambar kecil -->
                                    <div class="blog-img global-img me-3">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            alt="{{ $item->title }}">
                                    </div>

                                    <div class="box-content">

                                        <div class="blog-meta">
                                            <a class="author" href="#">
                                                <i class="fa fa-calendar"></i>
                                                {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                            </a>
                                        </div>

                                        <h3 class="box-title">
                                            <a href="{{ route('detberita', $item->id) }}">
                                                {{ \Illuminate\Support\Str::limit($item->title, 50) }}
                                            </a>
                                        </h3>

                                        <!-- Deskripsi dari content -->
                                        {{-- <p class="sec-text berita-desc">
                                            {{ strip_tags($item->content) }}
                                        </p> --}}
                                        <a href="{{ route('detberita', $item->id) }}"
                                            class="th-btn style4 th-radius th-icon btn-sm">
                                            Lihat Detail
                                            <i class="fa-light fa-arrow-right-long"></i>
                                        </a>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
