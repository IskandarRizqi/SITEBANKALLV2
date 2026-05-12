@extends('frontend.bprbahari.layout.main')

@section('content')
    <style>
        #bootcarousel .carousel-item {
            min-height: 600px;
        }

        #bootcarousel .box-table,
        #bootcarousel .box-cell {
            height: 550px;
            background: transparent !important;
        }


        @media(max-width:768px) {

            #bootcarousel .carousel-item,
            #bootcarousel .box-table,
            #bootcarousel .box-cell,
            #bootcarousel .slider-thumb {
                min-height: 550px;
                height: 550px;
            }

            #banner-mobile {
                margin-top: 0 !important;
            }
        }
    </style>


    <div class="banner-area text-center text-uppercase top-pad-80 text-large" style="margin-top: 90px" id="banner-mobile">

        <div id="bootcarousel" class="carousel text-light slide carousel-fade animate_text" data-bs-ride="carousel"
            data-bs-interval="3000">

            <!-- Wrapper for slides -->
            <div class="carousel-inner carousel-zoom">

                @php $active = false; @endphp

                @foreach ($baner as $item)
                    @if (!empty($item->url) || !empty($item->url_mobile))
                        <div class="carousel-item {{ !$active ? 'active' : '' }}">

                            {{-- Desktop --}}
                            @if (!empty($item->url))
                                <div class="slider-thumb d-none d-md-block"
                                    style="background-image:url('/recfil?display=true&rf={{ $item->url }}'); 
                                    background-size: 100% 100%; 
                                    background-repeat: no-repeat; 
                                    background-position: center;">
                                </div>
                            @endif

                            {{-- Mobile --}}
                            @if (!empty($item->url_mobile))
                                <div class="slider-thumb bg-fill d-block d-md-none"
                                    style="background-image:url('/recfil?display=true&rf={{ $item->url_mobile }}'); 
                                    background-size: 100% 100%; 
                                    background-repeat: no-repeat; 
                                    background-position: center;">
                                </div>
                            @endif

                        </div>

                        @php $active = true; @endphp
                    @endif
                @endforeach

            </div>

            <!-- Control -->
            <button class="carousel-control-prev left carousel-control light" type="button" data-bs-target="#bootcarousel"
                data-bs-slide="prev">
                <i class="arrow_left"></i>
            </button>
            <button class="carousel-control-next right carousel-control light" type="button" data-bs-target="#bootcarousel"
                data-bs-slide="next">
                <i class="arrow_right"></i>
            </button>

        </div>

    </div>
    <!-- End Banner -->
    <div class="case-studies-area overflow-hidden grid-items default-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5>Produk & Layanan</h5>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="case-items-area">
                <div class="masonary">
                    <div id="portfolio-grid" class="case-items colums-3">
                        <!-- Single Item -->
                        <div class="pf-item">
                            <div class="case-style-two">
                                <div class="thumb">
                                    <img src="frontend/bprsulawesi/assets/img/home-8/portfolio/2.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                  
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->

                        <!-- Single Item -->
                        <div class="pf-item width">
                            <div class="case-style-two">
                                <div class="thumb">
                                    <img src="frontend/bprsulawesi/assets/img/profil/undian.jpg" alt="Undian" style="height: 440px">
                                </div>
                                <div class="info">
                                  
                                    <h4>
                                        <a href="#"></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->

                        <!-- Single Item -->
                        <div class="pf-item">
                            <div class="case-style-two">
                                <div class="thumb">
                                    <img src="frontend/bprsulawesi/assets/img/portfolio/1.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                   
                                    <h4>
                                        <a href="#">Kredit</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->

                        <!-- Single Item -->
                        <div class="pf-item">
                            <div class="case-style-two">
                                <div class="thumb">
                                    <img src="frontend/bprsulawesi/assets/img/portfolio/2.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                   
                                    <h4>
                                        <a href="#">Tabungan</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->

                        <!-- Single Item -->
                        <div class="pf-item">
                            <div class="case-style-two">
                                <div class="thumb">
                                    <img src="frontend/bprsulawesi/assets/img/portfolio/3.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                    
                                    <h4>
                                        <a href="#">Deposito</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="choose-us-area overflow-hidden reverse default-padding">
        <div class="container">
            <div class="row align-center">

                <div class="col-lg-6 info wow fadeInUp">
                    <h5>Kenapa Kami</h5>
                    <h2 class="area-title">Mengapa Memilih PT BPR Sulawesi Karya Sentosa ?</h2>
                    <p>
                        PT. BPR Sulawesi Karya Sentosa merupakan grup bank Perkreditan Rakyat yang berfokus meningkatkan hidup masyarakat
                        dengan penuh Integritas. respect dan perbaikan terus menerus.
                    </p>
                    <ul>
                        <li>CEPAT</li>
                        <li>AMAN</li>
                         <li>PEDULI</li>
                    </ul>
                    <div class="contact">
                        <p>
                            Hubungi Kami 
                        </p>
                        <h4><i class="fas fa-phone"></i>(0451) 4019001</h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="thumb wow fadeInRight" data-wow-delay="0.6s">
                        <img src="frontend/bprbahari/assets/img/about/1.jpg" alt="Thumb" width="500px">
                        <div class="content wow fadeInLeft" data-wow-delay="0.8s">
                            <h2>25<span>+</span></h2>
                            <h5>Years of Experience</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Area -->

    <!-- Start Case Studies Area
                                                ============================================= -->
    {{-- <div class="case-studies-area bg-gray default-padding-bottom">
        <!-- Fixed BG -->
        <div class="fixed-shape-top">
            <img src="frontend/bprbahari/assets/img/shape/bg-7.png" alt="Shape">
        </div>
        <!-- End Fixed BG -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5>Case Studies</h5>
                        <h2 class="area-title">Our Recent Launched Available Projects</h2>
                        <div class="devider"></div>
                        <p>
                            Outlived no dwelling denoting in peculiar as he believed. Behaviour excellent middleton be as it
                            curiosity departure ourselves very extreme.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fill">
            <div class="case-carousel text-center text-light owl-carousel owl-theme">
                <div class="item">
                    <div class="thumb">
                        <img src="frontend/bprbahari/assets/img/portfolio/1.jpg" alt="Thumb">
                    </div>
                    <div class="info">
                        <div class="tags">
                            <a href="#">Networking</a> /
                            <a href="#">Technology</a>
                        </div>
                        <h4>
                            <a href="#">Cyber Security</a>
                        </h4>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="frontend/bprbahari/assets/img/portfolio/2.jpg" alt="Thumb">
                    </div>
                    <div class="info">
                        <div class="tags">
                            <a href="#">Networking</a> /
                            <a href="#">Technology</a>
                        </div>
                        <h4>
                            <a href="#">IT Counsultancy</a>
                        </h4>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="frontend/bprbahari/assets/img/portfolio/3.jpg" alt="Thumb">
                    </div>
                    <div class="info">
                        <div class="tags">
                            <a href="#">Networking</a> /
                            <a href="#">Technology</a>
                        </div>
                        <h4>
                            <a href="#">Analysis of Security</a>
                        </h4>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="frontend/bprbahari/assets/img/portfolio/4.jpg" alt="Thumb">
                    </div>
                    <div class="info">
                        <div class="tags">
                            <a href="#">Networking</a> /
                            <a href="#">Technology</a>
                        </div>
                        <h4>
                            <a href="#">Social Media App</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Case Studies Area -->


    <!-- Start Blog Area
                                                ============================================= -->
    <div class="blog-area default-padding-bottom bottom-less">
        <div class="container">

            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5>Informasi</h5>
                        <h2 class="area-title">Berita & Informasi Terbaru</h2>
                        <div class="devider"></div>
                    </div>
                </div>
            </div>

            <div class="blog-items">
                <div class="row">

                    @foreach ($allinfo->take(3) as $item)
                        <div class="single-item col-lg-4 col-md-6 mb-4">

                            <div class="item">

                                <!-- Thumbnail -->
                                <div class="thumb" style="height:250px; overflow:hidden;">

                                    <img src="/recfil?display=true&rf={{ $item->thumbnail }}" alt="{{ $item->title }}"
                                        style="width:100%; height:100%; object-fit:cover;">

                                    <div class="date">
                                        {{ \Carbon\Carbon::parse($item->tanggal_tampil)->format('d') }}
                                        <span>
                                            {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('M, Y') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="info">

                                    <div class="meta">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-calendar"></i>
                                                    {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h4 style="min-height:70px;">
                                        <a href="{{ route('detberita', $item->id) }}">
                                            {{ \Illuminate\Support\Str::limit($item->title, 60) }}
                                        </a>
                                    </h4>



                                    <a class="btn-more" href="{{ route('detberita', $item->id) }}">
                                        Baca Selengkapnya
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

                <!-- Lihat Semua -->
                <div style="text-align:right; ">
                    <a href="/informasi"
                        style="
                        display:inline-block;
                        padding:10px 20px;
                        background:#0a1c92;
                        color:white;
                        border-radius:20px;
                        text-decoration:none;
                        font-weight:600;
                    ">
                        Lihat Semua
                    </a>
                </div>

            </div>

        </div>
    </div>
    <!-- End Blog Area Area -->
@endsection
