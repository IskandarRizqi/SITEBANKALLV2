@extends('frontend.bprsahabattata.layout.main')

@section('content')
    <style id="clear-banner-shadow">
        /* Hilangkan semua overlay bayangan */
        .header-carousel .header-carousel-item::before,
        .header-carousel .header-carousel-item::after,
        .header-carousel .header-carousel-item-img-1::before,
        .header-carousel .header-carousel-item-img-1::after,
        .header-carousel .header-carousel-item-img-2::before,
        .header-carousel .header-carousel-item-img-2::after,
        .header-carousel .header-carousel-item-img-3::before,
        .header-carousel .header-carousel-item-img-3::after {
            display: none !important;
            content: none !important;
            background: transparent !important;
            opacity: 0 !important;
        }
    </style>

    <body>




        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            @foreach ($baner as $item)
                @if (!empty($item->url) || !empty($item->url_mobile))
                    <div class="header-carousel-item" style="height: 650px; overflow: hidden;">

                        {{-- DESKTOP --}}
                        @if (!empty($item->url))
                            <div class="d-none d-md-block w-100 h-100">
                                <img src="/recfil?display=true&rf={{ $item->url }}" class="img-fluid"
                                    alt="Banner Desktop" loading="lazy"
                                    style="width: 100%; height: 100%; object-fit: fill;">
                            </div>
                        @endif

                        {{-- MOBILE --}}
                        @if (!empty($item->url_mobile))
                            <div class="d-block d-md-none w-100 h-100">
                                <img src="/recfil?display=true&rf={{ $item->url_mobile }}" class="img-fluid"
                                    alt="Banner Mobile" loading="lazy" style="width: 100%; height: 100%; object-fit: fill;">
                            </div>
                        @endif

                        <div class="carousel-caption">
                            <div class="carousel-caption-inner text-center p-3"></div>
                        </div>

                    </div>
                @endif
            @endforeach
        </div>
        <!-- Carousel End -->




        <!-- Services Start -->
        @if ($umkm->isNotEmpty())
            <div class="blog sp" style="margin-top: 50px">
                <div class="container">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                        <h4 class="text-danger">UMKM</h4>
                        <h1 class="display-4"> UMKM BPR Sahabat Tata</h1>
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
                                                    background:#f63030;
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
                                    background:#f63030;
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

        <!-- Services End -->


        <!-- Project Start -->
        {{-- <div class="container-fluid project">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h4 class="text-primary">Produk</h4>
                    <h1 class="display-4">Produk Layanan</h1>
                </div>
                <div class="project-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="project-img">
                            <img src="frontend/bprsahabattata/img/projects-1.jpg" class="img-fluid w-100 rounded" alt="Image">
                        </div>
                        <div class="project-content bg-light rounded p-4">
                            <div class="project-content-inner">
                                <div class="project-icon mb-3"><i class="fas fa-chart-line fa-4x text-primary"></i></div>
                                <p class="text-dark fs-5 mb-3">Business Growth</p>
                                <a href="#" class="h4">Business Strategy And Investment Planning Growth </a>
                                <div class="pt-4">
                                    <a class="btn btn-light rounded-pill py-3 px-5" href="#">Ajukan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="project-img">
                            <img src="frontend/bprsahabattata/img/projects-1.jpg" class="img-fluid w-100 rounded" alt="Image">
                        </div>
                        <div class="project-content bg-light rounded p-4">
                            <div class="project-content-inner">
                                <div class="project-icon mb-3"><i class="fas fa-signal fa-4x text-primary"></i></div>
                                <p class="text-dark fs-5 mb-3">Marketing Strategy</p>
                                <a href="#" class="h4">Product Sailing Marketing Strategy For Improve Business</a>
                                <div class="pt-4">
                                    <a class="btn btn-light rounded-pill py-3 px-5" href="#">Ajukan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-item h-100">
                        <div class="project-img">
                            <img src="frontend/bprsahabattata/img/projects-1.jpg" class="img-fluid w-100 rounded" alt="Image">
                        </div>
                        <div class="project-content bg-light rounded p-4">
                            <div class="project-content-inner">
                                <div class="project-icon mb-3"><i class="fas fa-signal fa-4x text-primary"></i></div>
                                <p class="text-dark fs-5 mb-3">Marketing Strategy</p>
                                <a href="#" class="h4">Product Sailing Marketing Strategy For Improve Business</a>
                                <div class="pt-4">
                                    <a class="btn btn-light rounded-pill py-3 px-5" href="#">Ajukan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container-fluid testimonial  py-1" style="margin-bottom: 20px">
            <div class="container py-1">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h4 class="text-danger">Produk</h4>
                    <h1 class="display-4">Produk Layanan</h1>
                </div>
                <div class="row g-4 align-items-center">
                    <div class="col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="h-100 rounded">
                            {{-- <h4 class="text-primary">Produk Layanan </h4> --}}
                            <h1 class="display-4 mb-4  " style="font-size: 50px">Pilihan Produk Keuangan Terbaik Anda</h1>
                            <p class="mb-4"> Nikmati berbagai produk layanan BPR yang aman, terpercaya, dan
                                menguntungkan. Kami hadir untuk membantu kebutuhan finansial Anda
                                dengan layanan profesional dan proses yang mudah.</p>
                            <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="/pengajuanonline">Ajukan
                                <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="testimonial-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                            <div class="testimonial-item wow fadeInUp" data-wow-delay="0.3s">
                                <img src="frontend/bprsahabattata/img/profil/kredit.png" class="img-fluid rounded"
                                    alt="Testimonial 1">
                            </div>

                            <div class="testimonial-item wow fadeInUp" data-wow-delay="0.5s">
                                <img src="frontend/bprsahabattata/img/profil/tabungan.png" class="img-fluid rounded"
                                    alt="Testimonial 2">
                            </div>

                            <div class="testimonial-item wow fadeInUp" data-wow-delay="0.7s">
                                <img src="frontend/bprsahabattata/img/profil/deposito.png" class="img-fluid rounded"
                                    alt="Testimonial 3">
                            </div>
                            <div class="testimonial-item wow fadeInUp" data-wow-delay="0.7s">
                                <img src="frontend/bprsahabattata/img/profil/rate.png" class="img-fluid rounded"
                                    alt="Testimonial 3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Blog Start -->
        <div class="container-fluid blog pb-5" style="margin-top: 70px">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h4 class="text-danger">Informasi</h4>
                    <h1 class="display-4">Berita Terbaru</h1>
                </div>

                <div class="row g-4 justify-content-center">

                    @foreach ($allinfo as $key => $item)
                        <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="{{ 0.1 + $key * 0.2 }}s">

                            <div class="blog-item bg-light rounded p-4"
                                style="background-image: url(frontend/bprsahabattata/img/bg.png);">

                                <!-- META -->
                                <div class="mb-4">

                                    <h4 class="text-primary mb-2">
                                        {{-- {{ $item->kategori ?? 'Informasi' }} --}}
                                    </h4>

                                    <div class="d-flex justify-content-between">

                                        @if ($item->tanggal_tampil)
                                            <p class="mb-0">
                                                <span class="text-dark fw-bold">Tanggal</span>
                                                {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                            </p>
                                        @endif

                                        @if (!empty($item->tag))
                                            <p class="mb-0">
                                                <span class="text-dark fw-bold">Tag</span>
                                                {{ implode(', ', json_decode($item->tag, true) ?? []) }}
                                            </p>
                                        @endif

                                    </div>
                                </div>

                                <!-- IMAGE -->
                                <div class="project-img">
                                    <a href="{{ route('detberita', $item->id) }}">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            class="img-fluid w-100 rounded" style="height:220px; object-fit:cover;"
                                            alt="{{ $item->title }}">
                                    </a>

                                    <div class="blog-plus-icon">
                                        <a href="/recfil?display=true&rf={{ $item->thumbnail }}" data-lightbox="blog"
                                            class="btn btn-primary btn-md-square rounded-pill">
                                            <i class="fas fa-plus fa-1x"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- TITLE -->
                                <div class="my-4">
                                    <a href="{{ route('detberita', $item->id) }}" class="h4"
                                        style="
                                    display:-webkit-box;
                                    -webkit-line-clamp:2;
                                    -webkit-box-orient:vertical;
                                    overflow:hidden;
                                ">
                                        {{ $item->title }}
                                    </a>
                                </div>

                                <!-- BUTTON -->
                                <a class="btn btn-primary rounded-pill py-2 px-4"
                                    href="{{ route('detberita', $item->id) }}" style="color: #fff">
                                    Selengkapnya
                                </a>

                            </div>

                        </div>
                    @endforeach
                    <div style="display:flex; justify-content:flex-end; margin-top:15px;">
                        <a href="/informasi"
                            style="
                                    background:#f63030;
                                    color:#fff;
                                    padding:8px 20px;
                                    border-radius:20px;
                                    font-weight:bold;
                                    text-decoration:none;
                                ">
                            Lihat Semua
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <!-- Blog End -->




        <!-- Testimonial Start -->
        <!-- Testimonial End -->


        <!-- FAQ Start -->
        {{-- <div class="container-fluid faq py-5">
                <div class="container py-5">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                            <div class="pb-5">
                                <h4 class="text-danger">FAQs</h4>
                                <h1 class="display-4">Get the Answers to Common Questions</h1>
                            </div>
                            <div class="accordion bg-light rounded p-4" id="accordionExample">
                                <div class="accordion-item border-0 mb-4">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button text-dark fs-5 fw-bold rounded-top" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseTOne">
                                            What Does a Financial Advisor Do?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body my-2">
                                            <h5>Dolor sit amet consectetur adipisicing elit.</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo impedit,
                                                sapiente quis illo quia nulla atque maxime fuga minima ipsa quae cum
                                                consequatur, sit, delectus exercitationem odit officiis maiores! Neque,
                                                quidem corrupti modi architecto eos saepe incidunt dignissimos rerum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0 mb-4">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            What industries do you specialize in?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body my-2">
                                            <h5>Dolor sit amet consectetur adipisicing elit.</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo impedit,
                                                sapiente quis illo quia nulla atque maxime fuga minima ipsa quae cum
                                                consequatur, sit, delectus exercitationem odit officiis maiores! Neque,
                                                quidem corrupti modi architecto eos saepe incidunt dignissimos rerum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0 mb-4">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Can you guarantee for growth?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body my-2">
                                            <h5>Dolor sit amet consectetur adipisicing elit.</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo impedit,
                                                sapiente quis illo quia nulla atque maxime fuga minima ipsa quae cum
                                                consequatur, sit, delectus exercitationem odit officiis maiores! Neque,
                                                quidem corrupti modi architecto eos saepe incidunt dignissimos rerum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0 mb-0">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            What makes your business plans so special?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body my-2">
                                            <h5>Dolor sit amet consectetur adipisicing elit.</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo impedit,
                                                sapiente quis illo quia nulla atque maxime fuga minima ipsa quae cum
                                                consequatur, sit, delectus exercitationem odit officiis maiores! Neque,
                                                quidem corrupti modi architecto eos saepe incidunt dignissimos rerum.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                            <div class="faq-img RotateMoveRight rounded">
                                <img src="frontend/bprsahabattata/img/faq-img.jpg" class="img-fluid rounded w-100"
                                    alt="Image">
                                <a class="faq-btn btn btn-primary rounded-pill text-white py-3 px-5" href="#">Read
                                    More Q & A <i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        <!-- FAQ End -->





    </body>
    <script>
        $('.header-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: true, // ini untuk next prev
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 800,
            items: 1,
            navText: [
                '<i class="fa fa-chevron-left"></i>',
                '<i class="fa fa-chevron-right"></i>'
            ]
        });
    </script>
@endsection
