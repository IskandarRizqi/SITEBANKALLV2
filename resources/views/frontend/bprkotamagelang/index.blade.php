@extends('frontend.bprkotamagelang.layout.main')

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

      <section id="services" class="services section">
         <!-- Section Title -->
         <div class="container section-title" data-aos="fade-up">
            <h2>Layanan</h2>
            <p><span>Lihat </span> <span class="description-title">Layanan</span> <span> Kami</span></p>
         </div><!-- End Section Title -->
         <div class="container">
         <div class="row gy-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
               <div class="service-item position-relative">
                  <div class="icon">
                     <img src="frontend/bprkotamagelang/assets/img/produk/kredit.png" alt="">
                  </div>
                  <a href="#" class="stretched-link">
                     <h3>Kredit</h3>
                  </a>
               </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
               <div class="service-item position-relative">
                  <div class="icon">
                     <img src="frontend/bprkotamagelang/assets/img/produk/deposito.png" alt="">

                  </div>
               <a href="#" class="stretched-link">
                  <h3>Deposito</h3>
               </a>
               </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
               <div class="service-item position-relative">
                  <div class="icon">
                     <img src="frontend/bprkotamagelang/assets/img/produk/tabungan.png" alt="">
                  </div>
                  <a href="#" class="stretched-link">
                     <h3>Tabungan</h3>
                  </a>
               </div>
            </div><!-- End Service Item -->
         </div>

         </div>
      </section>

      <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Berita & Event</h2>
        <p><span>Lihat&nbsp;</span><span class="description-title">Berita & Event</span> <span> Kami</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <!-- <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Card</li>
            <li data-filter=".filter-branding">Web</li>
          </ul> -->

         <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($berita as $item)
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
               <a href="{{ route('detailberita', $item->id) }}" class="text-decoration-none text-dark">
                  <img src="/recfil?display=true&rf={{ $item->thumbnail }}" class="img-fluid" alt="{{ $item->title }}">
                  <div class="portfolio-info">
                     <h4>{{ $item->title }}</h4>
                     <p>{{ \Carbon\Carbon::parse($item->tanggal_tampil)->format('d M Y') }}</p>
                  </div>
               </a>
            </div><!-- End Portfolio Item -->
            @endforeach
         </div>
         <div class="text-center mt-4">
            <a href="/informasi" class="btn btn-primary">Lihat Semua Berita & Event</a>
        </div>

      </div>

    </section>
    </body>

  
@endsection
