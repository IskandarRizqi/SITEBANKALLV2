@extends('frontend.bprman.layout.main')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <div id="smooth-wrapper">
        <div class="space-for-header"></div>

        <!-- start: Banner Section -->
        <section class="h4-banner-section" style="padding:15px; margin-top:0px; background-color: #ecf0f0;">
            <div class="swiper h4-banner-slider">
                <div class="swiper-wrapper">

                    @foreach ($baner as $item)
                        @if (!empty($item->url) || !empty($item->url_mobile))
                            <div class="swiper-slide">

                                {{-- DESKTOP --}}
                                @if (!empty($item->url))
                                    <img src="/recfil?display=true&rf={{ $item->url }}" alt="Banner Desktop"
                                        class="d-none d-md-block"
                                        style="width:100%; height:550px; object-fit:fill; display:block; border-radius:10px;">
                                @endif

                                {{-- MOBILE --}}
                                @if (!empty($item->url_mobile))
                                    <img src="/recfil?display=true&rf={{ $item->url_mobile }}" alt="Banner Mobile"
                                        class="d-block d-md-none"
                                        style="width:100%; height:550px; object-fit:cover; display:block; border-radius:10px;">
                                @endif

                            </div>
                        @endif
                    @endforeach

                </div>

                {{-- Pagination --}}
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <script>
            var swiper = new Swiper(".h4-banner-slider", {
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        </script>
        <!-- end: Banner Section -->
        @if ($deposito->count() || $tabungan->count() || $kredit->count())

            <section class="rate section" style="margin-top: 100px;">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-4">
                                <b class="head-title" style="font-size:30px; font-weight:bold">
                                    Counter Rate
                                </b>
                            </div>
                        </div>

                        <div class="col-12">
                            <!-- TAB HEADER -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                @if ($deposito->count())
                                    <li class="nav-item mr-2">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#tabratedeposit" type="button">
                                            Deposito
                                        </button>
                                    </li>
                                @endif

                                @if ($tabungan->count())
                                    <li class="nav-item mr-2">
                                        <button class="nav-link {{ !$deposito->count() ? 'active' : '' }}"
                                            data-bs-toggle="tab" data-bs-target="#tabratetabungan" type="button">
                                            Tabungan
                                        </button>
                                    </li>
                                @endif

                                @if ($kredit->count())
                                    <li class="nav-item">
                                        <button
                                            class="nav-link {{ !$deposito->count() && !$tabungan->count() ? 'active' : '' }}"
                                            data-bs-toggle="tab" data-bs-target="#tabratekredit" type="button">
                                            Kredit
                                        </button>
                                    </li>
                                @endif

                            </ul>

                            <br>

                            <!-- TAB CONTENT -->
                            <div class="tab-content">

                                @if ($deposito->count())
                                    <div class="tab-pane fade show active" id="tabratedeposit">
                                        @foreach ($deposito as $item)
                                            <div class="mb-3">
                                                <img src="/recfil?rf={{ $item->image }}" class="w-100"
                                                    style="height:500px; object-fit:fill; border-radius:10px;">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if ($tabungan->count())
                                    <div class="tab-pane fade {{ !$deposito->count() ? 'show active' : '' }}"
                                        id="tabratetabungan">
                                        @foreach ($tabungan as $item)
                                            <div class="mb-3">
                                                <img src="/recfil?rf={{ $item->image }}" class="w-100"
                                                    style="height:500px; object-fit:fill; border-radius:10px;">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if ($kredit->count())
                                    <div class="tab-pane fade {{ !$deposito->count() && !$tabungan->count() ? 'show active' : '' }}"
                                        id="tabratekredit">
                                        @foreach ($kredit as $item)
                                            <div class="mb-3">
                                                <img src="/recfil?rf={{ $item->image }}" class="w-100"
                                                    style="height:500px; object-fit:fill; border-radius:10px;">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        @endif

        
        <div class="tj-working-process section-gap section-gap-x" style="margin-top: 120px;">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading-wrap">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s">Layanan Kami</span>
                  <div class="heading-wrap-content">
                    <div class="sec-heading style-2">
                      <h2 class="sec-title text-anim">Mengapa Memilih BPR Multi Artha Nusa</h2>
                    </div>
                    <p class="desc wow fadeInUp" data-wow-delay=".5s">
                        BPR Multi Artha Nusa merupakan grup bank perkreditan rakyat yang berfokus meningkatkan kualitas hidup masyarakat dengan penuh integritas, respect, dan perbaikan terus-menerus.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="working-process-area">
                  <div class="process-item wow fadeInLeft" data-wow-delay=".5s">
                    <div class="process-step">
                      <span>01</span>
                    </div>
                    <div class="process-content">
                      <h4 class="title">Cepat</h4>
                      <p class="desc">
                        Pengajuan Anda langsung diproses, kami berkomitmen memberikan Anda kepastian dalam 3 hari kerja
                      </p>
                    </div>
                  </div>
                  <div class="process-item wow fadeInLeft" data-wow-delay=".7s">
                    <div class="process-step">
                      <span>02</span>
                    </div>
                    <div class="process-content">
                      <h4 class="title">Aman</h4>
                      <p class="desc">Kami dikelola oleh tim profesional dengan pengalaman yamg solid, terdaftar, dan diawasi OJK, serta dijamin LPS</p>
                    </div>
                  </div>
                  <div class="process-item wow fadeInLeft" data-wow-delay=".9s">
                    <div class="process-step">
                      <span>03</span>
                    </div>
                    <div class="process-content">
                      <h4 class="title">Peduli</h4>
                      <p class="desc">Kami berkomitmen untuk melayani Anda dengan sepenuh hati. Konsultasikan kebutuhan Anda saat ini</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-shape-1">
            <img src="assets/images/shape/pattern-2.svg" alt="">
          </div>
          <div class="bg-shape-2">
            <img src="assets/images/shape/pattern-3.svg" alt="">
          </div>
        </div>


        <!-- start: Project Section -->
        <section class="h6-service section-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading sec-heading-centered style-2 style-6 ">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>PRODUK DAN LAYANAN</span>
                  <h2 class="sec-title title-anim">Produk dan Layanan BPR Multi Arthanusa</h2>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12">
                <div class="h6-service-slider swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="h6-service-item">
                        <div class="h6-service-thumb">
                          <a href="service-details.html"><img src="frontend/bprman/assets/images/product/kredits.png" alt=""></a>
                        </div>
                        <div class="h6-service-content">
                          <h5 class="h6-service-index">
                            01.
                          </h5>
                          <div class="h6-service-title-wrap">
                            <h4 class="title"><a href="blog-details.html">Kredit</a>
                            </h4>
                            <a class="text-btn" href="service-details.html">
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="h6-service-item">
                        <div class="h6-service-thumb">
                          <a href="service-details.html"><img src="frontend/bprman/assets/images/product/depositos.png" alt=""></a>
                        </div>
                        <div class="h6-service-content">
                          <h5 class="h6-service-index">
                            02.
                          </h5>
                          <div class="h6-service-title-wrap">
                            <h4 class="title"><a href="blog-details.html">Deposito</a>
                            </h4>
                            <a class="text-btn" href="service-details.html">
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="h6-service-item">
                        <div class="h6-service-thumb">
                          <a href="service-details.html"><img src="frontend/bprman/assets/images/product/tabungan.png" alt=""></a>
                        </div>
                        <div class="h6-service-content">
                          <h5 class="h6-service-index">
                            03.
                          </h5>
                          <div class="h6-service-title-wrap">
                            <h4 class="title"><a href="blog-details.html">Tabungan</a>
                            </h4>
                            <a class="text-btn" href="service-details.html">
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="h6-service-item">
                        <div class="h6-service-thumb">
                          <a href="service-details.html"><img src="frontend/bprman/assets/images/product/layanankami.png" alt=""></a>
                        </div>
                        <div class="h6-service-content">
                          <h5 class="h6-service-index">
                            04.
                          </h5>
                          <div class="h6-service-title-wrap">
                            <h4 class="title"><a href="blog-details.html">Layanan Lain</a>
                            </h4>
                            <a class="text-btn" href="service-details.html">
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- <div class="swiper-slide">
                      <div class="h6-service-item">
                        <div class="h6-service-thumb">
                          <a href="service-details.html"><img src="assets/images/service/h6-service-2.webp" alt=""></a>
                        </div>
                        <div class="h6-service-content">
                          <h5 class="h6-service-index">
                            01.
                          </h5>
                          <div class="h6-service-title-wrap">
                            <h4 class="title"><a href="blog-details.html">Customer Experience Solutions</a>
                            </h4>
                            <a class="text-btn" href="service-details.html">
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>

                        </div>
                      </div>
                    </div> -->
                  </div>
                  <div class="swiper-pagination-area"></div>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 25px;">Kehadiran BPR Multi Arthanusa dengan susunan pemegang saham dan managemen yang baru mempunyai komitmen untuk memberikan layanan perbankan terbaik kepada masyarakat UMKM dan pedesaan sesuai dengan visi dan misi BPR.</p>

            </div>
          </div>
        </section>
        <!-- end: Project Section -->


        <section class="tj-contact-section h4-contact-section section-gap section-gap-x">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-10">
                        <div class="wow fadeInUp" data-wow-delay=".4s">

                            <div class="sec-heading style-4 text-center mb-4">
                                <span class="sub-title">
                                    <i class="tji-box"></i>Video
                                </span>

                                <h2 class="sec-title title-anim">
                                    Kaleidoskop OJK 2022
                                </h2>
                            </div>

                            <div style="border-radius:20px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.15);">

                                <div class="ratio ratio-16x9">
                                    <iframe src="https://www.youtube.com/embed/hQZlFQSrB20" title="YouTube video"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="bg-shape-1">
                <img src="frontend/bprman/assets/images/shape/pattern-2.svg" alt="">
            </div>

            <div class="bg-shape-2">
                <img src="frontend/bprman/assets/images/shape/pattern-3.svg" alt="">
            </div>
        </section>

        <!-- start: Blog Section -->
        <section class="tj-blog-section-2 section-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading-wrap">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s">BERITA DAN EVENT</span>
                  <div class="heading-wrap-content">
                    <div class="sec-heading style-2">
                      <h2 class="sec-title text-anim">Temukan berita dan event terbaru kami</h2>
                    </div>
                    <!-- <div class="wow fadeInUp" data-wow-delay=".5s">
                      <p class="desc">Developing personalized customer journeys to increase satisfaction and loyalty.
                      </p>
                    </div> -->
                    <div class="slider-navigation d-none d-md-inline-flex wow fadeInUp" data-wow-delay=".7s">
                      <div class="slider-prev">
                        <span class="anim-icon">
                          <i class="tji-arrow-left"></i>
                          <i class="tji-arrow-left"></i>
                        </span>
                      </div>
                      <div class="slider-next">
                        <span class="anim-icon">
                          <i class="tji-arrow-right"></i>
                          <i class="tji-arrow-right"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                    <div class="col-12">
                        <div class="h4-blog-wrap">
                            @foreach ($allinfo->take(3) as $item)
                            <div class="blog-item style-3 wow fadeInUp" data-wow-delay=".3s">
                                <div class="blog-thumb">
                                    <img src="/recfil?display=true&rf={{ $item->thumbnail }}" alt="{{ $item->title }}">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span class="categories">Berita</span>
                                    </div>
                                    <h4 class="title" style="min-height:70px;"><a href="{{ route('detberita', $item->id) }}">
                                        {{ \Illuminate\Support\Str::limit($item->title, 60) }}</a>
                                    </h4>
                                    <span style="color: white;">{{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M, Y') }}</span>
                                    <a class="text-btn" href="{{ route('detberita', $item->id) }}">
                                        <span class="btn-text"><span>Baca Selengkapnya</span></span>
                                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="/informasi"><button class="btn btn-primary mt-3">Berita Lainnya</button></a>
                </div>
          </div>
        </section>
    </div>
@endsection