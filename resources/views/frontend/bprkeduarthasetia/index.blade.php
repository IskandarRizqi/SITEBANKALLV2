@extends('frontend.bprkeduarthasetia.layout.main')

@section('content')

<!--=== MODAL POPUP SLIDER START ===-->
<div id="popup-modal" style="position: fixed; z-index: 99999; top: 0; left: 0; width: 100%; height: 100vh; background: rgba(0,0,0,0.5); backdrop-filter: blur(6px); display: flex; justify-content: center; align-items: center;">
  <div style="position: relative; width: 130%; max-width: 900px; max-height: 100vh; background: transparent;">
    
    <!-- SLIDER -->
    <div id="slider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000" style="border-radius: 10px; overflow: hidden;">
        <div class="carousel-inner">
            @php $activeSet = false; @endphp
            @foreach($baner as $item)
            @if(!empty($item->url))
                <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">
                <img 
                    src="/recfil?display=true&rf={{ $item->url }}" 
                    class="d-block w-100" 
                    alt="Slide {{ $loop->iteration }}"
                    style="object-fit: fill; height: 450px; border-radius: 10px;">
                </div>
                @php $activeSet = true; @endphp
            @endif
            @endforeach
        </div>
    </div>

    <!-- BUTTON NEXT / PREV -->
    <button id="prev-btn" style="position: absolute; top: 50%; left: 0; transform: translateY(-50%); background: rgba(0,0,0,0.5); border: none; color: white; font-size: 24px; padding: 5px 12px; cursor: pointer;">❮</button>
    <button id="next-btn" style="position: absolute; top: 50%; right: 0; transform: translateY(-50%); background: rgba(0,0,0,0.5); border: none; color: white; font-size: 24px; padding: 5px 12px; cursor: pointer;">❯</button>

    <!-- CLOSE BUTTON -->
    <button id="close-popup" style="position: absolute; top: 5px; right: 10px; background: rgba(0,0,0,0.6); color: white; border: none; font-size: 24px; padding: 4px 10px; cursor: pointer; border-radius: 5px;">&times;</button>
  </div>
</div>
<!--=== MODAL POPUP SLIDER END ===-->



<body class="body tg-heading-subheading animation-style3">



<!--=====progress END=======-->

    <!-- Preloader -->
    {{-- <section>
      <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader ctn-preloader1" style="background:#00aaff;">
          <div class="animation-preloader">
            <div class="txt-loading">
              <span data-text-preloader="N" class="letters-loading">
                N
              </span>
              <span data-text-preloader="U" class="letters-loading">
                U
              </span>
              <span data-text-preloader="S" class="letters-loading">
                S
              </span>
              <span data-text-preloader="A" class="letters-loading">
                A
              </span>
              <span data-text-preloader="" class="letters-loading">
                
              </span>
              <span data-text-preloader="I" class="letters-loading">
                I
              </span>
              <span data-text-preloader="N" class="letters-loading">
                N
              </span>
               <span data-text-preloader="T" class="letters-loading">
                T
              </span>
               <span data-text-preloader="I" class="letters-loading">
                I
              </span>
               <span data-text-preloader="M" class="letters-loading">
                M
              </span>
            </div>
          </div>	
        </div>
      </div>
    </section> --}}



        <!--=====HERO AREA START=======-->

        <div class="hero1" style="background-image: url(frontend/bprkeduarthasetia/assets/img/bg/bgkedu.png); background-position: center; background-repeat: no-repeat; background-size: cover; min-height: 350px;">
          <div class="container">
            <h1 style="color: white; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); text-align: center; margin-top: 20px;">PT BPR Kedu Arthasetia</h1>
          </div>
        </div>

        <!--=====HERO AREA END=======-->

        <!--=====HERO BOTTOM AREA START=======-->

        <div class="">
          <div class="container">
            <div class="row hero-bottom-area">
              <div id="slider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000" style="border-radius: 10px; overflow: hidden;">
                <div class="carousel-inner">
                    @php $activeSet = false; @endphp
                    @foreach($baner as $item)
                    @if(!empty($item->url))
                        <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">
                        <img 
                            src="/recfil?display=true&rf={{ $item->url }}" 
                            class="d-block w-100" 
                            alt="Slide {{ $loop->iteration }}"
                            style="object-fit: fill; height: 450px; border-radius: 10px;">
                        </div>
                        @php $activeSet = true; @endphp
                    @endif
                    @endforeach
                </div>
              </div>

            </div>
          </div>
        </div>

        <!--=====HERO BOTTOM AREA END=======-->

 <!--=====WORK AREA START=======-->

        <div  id= "about" class="work sp">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="heading1">
                  <h2 class="title tg-element-title">Mengapa harus memilih PT BPR Kedu Arthasetia?</h2>
                  <div class="space16"></div>
                  <p data-aos="fade-right" data-aos-duration="700">
                    PT BPR Kedu Arthasetia merupakan bank perekonomian rakyat yang berfokus meningkatkan kualitas hidup masyarakat dengan penuh integritas, respect dan perbaikan terus menerus.
                  </p>

                  <div class="single-items" data-aos="fade-right" data-aos-duration="700">
                    <div class="">
                      <div class="icon">
                        <i class="fa-light fa-person-running-fast fa-2xl" style="color: #000;"></i>
                      </div>
                    </div>
                    <div class="">
                      <h4>Cepat</h4>
                      <div class="space10"></div>
                      <p>Pengajuan Anda langsung diproses, kami berkomitmen memberikan Anda kepastian dalam 3 hari kerja</p>
                    </div>
                  </div>

                  <div class="single-items" data-aos="fade-right" data-aos-duration="900">
                    <div class="">
                      <div class="icon">
                        <i class="fa-light fa-key fa-2xl" style="color: #000;"></i>
                      </div>
                    </div>
                    <div class="">
                      <h4>Aman</h4>
                      <div class="space10"></div>
                     <p>Kami kelola oleh tim profesional dengan pengalaman solid, terdaftar dan diawasi OJK, serta dijamin LPS</p>
                    </div>
                  </div>

                  <div class="single-items" data-aos="fade-right" data-aos-duration="1100">
                    <div class="">
                      <div class="icon">
                        <i class="fa-light fa-heart fa-2xl" style="color: #000;"></i>
                      </div>
                    </div>
                    <div class="">
                      <h4>Peduli</h4>
                      <div class="space10"></div>
                     <p>Kami berkomitmen untuk melayani Anda dengan sepenuh hati. Konsultasikan kebutuhan Anda saat ini</p>
                    </div>
                  </div>


                </div>
                
              </div>

              <div class="col-lg-6">
                <div class="work-images">
                  <div class="row align-items-center">
                    <div class="col-md-6">
                      <div class="image reveal image-anime">
                        <img src="frontend/nusaintim/assets/img/work/3.jpg" alt="" style="height: 260px; width: 310px;" >
                      </div>
                      <div class="image reveal image-anime">
                        <img src="frontend/nusaintim/assets/img/work/nusa2.png" alt="" style="height: 260px; width: 310px;">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="image reveal image-anime">
                        <img src="frontend/nusaintim/assets/img/work/10.png" alt="" style="height: 260px;  width: 310px;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--=====WORK AREA END=======-->

        <!--=====ABOUT AREA END=======-->

        <!--=====SERVICE AREA START=======-->

        <div class="service sp">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 m-auto text-center">
                <div class="heading1">
                  <span class="span" data-aos="zoom-in-left" data-aos-duration="700">Layanan Kami</span>
                  <h2 class="title tg-element-title">Apa saja Produk dan Layanan PT BPR Kedu Arthasetia?</h2>
                </div>
              </div>
            </div>

            <div class="space30"></div>
            <div class="row">
              <div class="col-lg-4" data-aos="zoom-in-up" data-aos-duration="800">
                <div class="single-box">
                  <div class="icon">
                    <img src="frontend/nusaintim/assets/img/icons/kredit.png" alt="">
                  </div>
                  <div class="heading1">
                    <h4><a href="service-details.html">Kredit</a></h4>
                    <div class="space16"></div>
                    <p>Beragam macam jenis produk kredit dengan bunga yang kecil dan cepat cair.</p>
                    <div class="space16"></div>
                    <!-- <a href="pengajuanonline" class="learn">Ajukan Sekarang <span><i class="fa-solid fa-arrow-right"></i></span></a> -->
                  </div>
                </div>
              </div>

              <div class="col-lg-4" data-aos="zoom-in-up" data-aos-duration="1200">
                <div class="single-box">
                  <div class="icon">
                    <img src="frontend/nusaintim/assets/img/icons/depo.png" alt="">
                  </div>
                  <div class="heading1">
                    <h4><a href="service-details.html">Deposito</a></h4>
                    <div class="space16"></div>
                    <p>Deposito Berjangka untuk Investasi Jangka Panjang yang Aman dan Menguntungkan</p>
                    <div class="space16"></div>
                    <!-- <a href="pengajuanonline" class="learn">Ajukan Sekarang <span><i class="fa-solid fa-arrow-right"></i></span></a> -->
                  </div>
                </div>
              </div>


              <div class="col-lg-4" data-aos="zoom-in-up" data-aos-duration="900">
                <div class="single-box">
                  <div class="icon">
                    <img src="frontend/nusaintim/assets/img/icons/tab.png" alt="">
                  </div>
                  <div class="heading1">
                    <h4><a href="service-details.html">Tabungan</a></h4>
                    <div class="space16"></div>
                    <p>Memberikan Anda kemudahan bertransaksi dengan suku bunga tinggi</p>
                    <div class="space16"></div>
                    <!-- <a href="pengajuanonline" class="learn">Ajukan Sekarang <span><i class="fa-solid fa-arrow-right"></i></span></a> -->
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

        <!--=====SERVICE AREA END=======-->

       
        <!--=====BLOG AREA START=======-->

        <div class="blog sp" style="background-image: url(frontend/bprkeduarthasetia/assets/img/bg/bgkedu2.png); background-position: center; background-repeat: no-repeat; background-size: cover; min-height: 500px;">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 m-auto text-center">
                <div class="heading1">
                  <span class="span" data-aos="zoom-in-left" data-aos-duration="700">Dapatkan beragam berita dan pengumuman dari kami</span>
                  <h2 class="title tg-element-title" style="color: #fff;">Informasi Terbaru</h2>
                </div>
              </div>
            </div>
            <div class="space30"></div>
            <div class="row">
                @foreach ($allinfo as $item)
                <div class="col-md-4 col-12 mb-2">
                    <div class="blog-box" data-aos="zoom-in-up" data-aos-duration="1100">
                    <div class="image image-anime">
                        <img src="/recfil?display=true&rf={{ $item->thumbnail}}"
                                style="height: 215px; border-radius: 5px 5px;" 
                                class="card-img-top img-fluid" 
                                alt="{{ $item->title }}">
                    </div>
                    <div class="heading">
                        <div class="tags">
                        <a href="#"><img src="frontend/nusaintim/assets/img/icons/blog-icon1.png" alt=""> {{$item->kategori }}</a>
                        <a href="#">
                          <img src="frontend/nusaintim/assets/img/icons/blog-icon2.png" alt="">
                          {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                        </a>

                        </div>
                        <h4>
                            <a href="{{ route('detberita', $item->id) }}">
                                {{ \Illuminate\Support\Str::limit($item->title, 45) }}
                            </a>
                        </h4>
                        {{-- <a href="{{ route('detberita', $item->id) }}" class="learn"> Selengkapnya <span><i class="fa-solid fa-arrow-right"></i></span></a> --}}
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-end mt-3">
                <a href="informasi" class="btn btn-danger w-20 fw-bold">Selengkapnya...</a>
            </div>
          </div>
        </div>

        <!--=====BLOG AREA END=======-->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Ambil elemen carousel
    const myCarousel = document.querySelector('#slider');
    const carousel = new bootstrap.Carousel(myCarousel, {
      interval: 4000, // jeda antar slide otomatis (ms)
      ride: 'carousel'
    });

    // Tombol navigasi manual
    document.getElementById('prev-btn').addEventListener('click', function () {
      carousel.prev();
    });

    document.getElementById('next-btn').addEventListener('click', function () {
      carousel.next();
    });

    // Tombol tutup popup
    document.getElementById('close-popup').addEventListener('click', function () {
      document.getElementById('popup-modal').style.display = 'none';
    });
  });
</script>



         


</body>

@endsection