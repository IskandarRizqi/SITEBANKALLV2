@extends('frontend.nusaintim.layout.main')

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

        <div class="hero1" style="background-image: url(frontend/nusaintim/assets/img/bg/hero1-bg.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
          <div class="container">
            <div class="row">
              <div class="col-lg-5">
                <div class="main-headding">
                  <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><img src="frontend/nusaintim/assets/img/icons/span1.png" alt=""> Bank Perekonomian Rakyat</span>
                  <h1 class="title tg-element-title" style="font-size:60px;">Mitra Keuangan Modern untuk Masa Depan yang  <span class="after">Lebih Cerah </span></h1>
                  <div class="space16"></div>
                  <p style="font-size:14px;">BPR NUSAINTIM adalah mitra keuangan terpercaya yang menghadirkan layanan personal, produk unggul, dan kemudahan akses untuk membantu mewujudkan masa depan finansial yang lebih baik.</p>

                  <div class="space30"></div>
                 
                </div>
              </div>

              <div class="col-lg-7">
                <div class="hero1-all-images">
                  <div class="image1 ">
                    <img src="frontend/nusaintim/assets/img/hero/1.png" alt="" style="height: 450px;">
                  </div>
                  <div class="image2 reveal">
                    <img src="frontend/nusaintim/assets/img/hero/2.png" alt="" >
                  </div>
                  <div class="image3 shape-animaiton3">
                    <img src="frontend/nusaintim/assets/img/hero/2ns.png" alt="" style="height: 55px; width: 200px;">
                  </div>
                  <div class="image4 shape-animaiton3">
                    <img src="frontend/nusaintim/assets/img/hero/1ns.png" alt="" style="height: 130px; width: 330px;" >
                  </div>
                  <div class="shape1">
                    <img src="frontend/nusaintim/assets/img/shapes/header1-shape1.png" alt="">
                  </div>
                  <div class="shape2">
                    <img src="frontend/nusaintim/assets/img/shapes/header1-shape2.png" alt="">
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!--=====HERO AREA END=======-->

        <!--=====HERO BOTTOM AREA START=======-->

        <div class="">
          <div class="container">
            <div class="row hero-bottom-area">
              <div class="col-lg-3">
                <div class="single-box">
                  <div class="icon">
                    <img src="frontend/nusaintim/assets/img/icons/credit.png" alt="">
                  </div>
                  <div class="headding">
                    <h5>Kredit  dengan cicilan ringan</h5>
                    <p>Didukung oleh tim yang ramah dan solutif.</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3">
                <div class="single-box">
                  <div class="icon">
                    <img src="frontend/nusaintim/assets/img/icons/tabung.png" alt="">
                  </div>
                  <div class="headding">
                    <h5>Tabungan dengan bunga kompetitif</h5>
                    <p>Didukung oleh tim yang ramah dan solutif.</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3">
                <div class="single-box">
                  <div class="icon">
                    <img src="frontend/nusaintim/assets/img/icons/konsultasi.png" alt="">
                  </div>
                  <div class="headding">
                    <h5>Konsultasi finansial Gratis</h5>
                    <p>Didukung oleh tim yang ramah dan solutif.</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3">
                <div class="single-box">
                  <div class="icon">
                    <img src="frontend/nusaintim/assets/img/icons/layanan.png" alt="">
                  </div>
                  <div class="headding">
                    <h5>Layanan Personal Perbankan</h5>
                    <p>Didukung oleh tim yang ramah dan solutif</p>
                  </div>
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
                  <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><img src="frontend/nusaintim/assets/img/icons/span1.png" alt=""> Tentang Kami</span>
                  <h2 class="title tg-element-title">Mengapa harus memilih PT BPR Nusa Intim?</h2>
                  <div class="space16"></div>
                  <p data-aos="fade-right" data-aos-duration="700">Menjadi BPR yang unggul dan sehat secara finansial, efisien dalam operasional, serta berperan aktif dalam pemberdayaan usaha mikro dan kecil, sekaligus mendorong peningkatan Pendapatan Asli Daerah (PAD).</p>

                  <div class="single-items" data-aos="fade-right" data-aos-duration="700">
                    <div class="">
                      <div class="icon">
                        <img src="frontend/nusaintim/assets/img/icons/sehat.png" alt="">
                      </div>
                    </div>
                    <div class="">
                      <h4><a href="#">Solid</a></h4>
                      <div class="space10"></div>
                      <p>Menjamin keamanan data dan kontinuitas layanan melalui sistem pengamanan dan manajemen risiko yang solid dan terpercaya.</p>
                    </div>
                  </div>

                  <div class="single-items" data-aos="fade-right" data-aos-duration="900">
                    <div class="">
                      <div class="icon">
                        <img src="frontend/nusaintim/assets/img/icons/terpercaya.png" alt="">
                      </div>
                    </div>
                    <div class="">
                      <h4><a href="#">Andal</a></h4>
                      <div class="space10"></div>
                     <p>Memberikan layanan keuangan yang andal dan profesional sebagai mitra terpercaya dalam mendukung pertumbuhan usaha Anda.</p>
                    </div>
                  </div>

                  <div class="single-items" data-aos="fade-right" data-aos-duration="1100">
                    <div class="">
                      <div class="icon">
                        <img src="frontend/nusaintim/assets/img/icons/kuat.png" alt="">
                      </div>
                    </div>
                    <div class="">
                      <h4><a href="#">Tangguh</a></h4>
                      <div class="space10"></div>
                     <p>Membangun fondasi keuangan yang tangguh dan stabil untuk memastikan bisnis Anda mampu menghadapi tantangan dan berkembang secara berkelanjutan.</p>
                    </div>
                  </div>


                </div>
                <div class="space30"></div>
                <div class="" data-aos="fade-right" data-aos-duration="800">
                  <a class="theme-btn1" href="#">Temukan Lebih Banyak <span><i class="fa-solid fa-arrow-right"></i></span></a>
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
                  <img src="frontend/nusaintim/assets/img/bg/work-bg.png" alt="" class="bg-image shape-animaiton4">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--=====WORK AREA END=======-->

        <!--=====ABOUT AREA START=======-->

        <div class="about1 sp">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="about-image">
                  <div class="image1 reveal">
                    {{-- <img src="frontend/nusaintim/assets/img/about/about1-img1.png" alt=""> --}}
                  </div>
                  <div class="image2 reveal image-anime">
                    <img src="frontend/nusaintim/assets/img/work/2.png" style="max-height: 1200px; border:10px;" alt="">
                  </div>
                  <div class="icon-box">
                    <img src="frontend/nusaintim/assets/img/icons/about1-shape-icon.png"  alt="">
                    <h4>Bpr NusaIntim</h4>
                    <p>Siap Melayani dengan Ramah</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="heading1">
                  <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><img src="frontend/nusaintim/assets/img/icons/span1.png" alt=""> Service Exellent</span>
                  <h2 class="title tg-element-title">Kami Hadir Untuk Solusi Keuangan Anda</h2>
                  <div class="space16"></div>
                  <p data-aos="fade-left" data-aos-duration="800">Mewujudkan Bank Perkreditan Rakyat (BPR) yang kompetitif dengan rating sehat serta efisien, mendukung sektor usaha kecil dan mikro seerta mendukung peningkatan Pendapatan Asli Daerah (PAD).</p>

                    <ul class="list" data-aos="fade-left" data-aos-duration="1100">
                      <li><span><i class="fa-solid fa-check"></i></span> Tabungan Berkembang – Bunga kompetitif untuk pertumbuhan dana optimal.</li>
                      <li><span><i class="fa-solid fa-check"></i></span> Pinjaman Mudah – Proses cepat, syarat ringan, dan suku bunga terjangkau. </li>
                      <li><span><i class="fa-solid fa-check"></i></span> Layanan Ramah – Didukung tim profesional siap membantu kebutuhan finansial Anda.</li>
                      <li><span><i class="fa-solid fa-check"></i></span>  Aman & Terpercaya – Diawasi OJK, menjamin keamanan dana Anda.</li>
                    </ul>
                    <div class="space30"></div>
                    <div class="" data-aos="fade-left" data-aos-duration="900">
                      <a class="theme-btn1" href="#">Temukan Lebih Banyak <span><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--=====ABOUT AREA END=======-->

        <!--=====SERVICE AREA START=======-->

        <div class="service sp">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 m-auto text-center">
                <div class="heading1">
                  <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><img src="frontend/nusaintim/assets/img/icons/span1.png" alt=""> Layanan Kami</span>
                  <h2 class="title tg-element-title">Apa saja Produk dan Layanan PT BPR Nusa Intim?</h2>
                </div>
              </div>
            </div>

            <div class="space30"></div>
            <div class="row">
              <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="700">
                <div class="single-box">
                  <div class="icon">
                    <img src="frontend/nusaintim/assets/img/icons/kmu.png" alt="">
                  </div>
                  <div class="heading1">
                    <h4><a href="service-details.html">Deposito Khusus</a></h4>
                    <div class="space16"></div>
                    <p style="text-align: justify">Deposito yang diperuntukan untuk nominal diatas Rp. 100.000.000 dengan suku bunga Maksimal LPS. Manfaat yang bisa di dapatkan dari produk ini adalah bebas pinalti dan denda jika dicairkan sebelum jatuh tempo dan Bunga berjalan bisa dibayarkan sesuai syarat dan ketentuan yang berlaku , dan dapat digunakan sebagai jaminan kredit.</p>
                    <div class="space16"></div>
                    {{-- <a href="service-details.html" class="learn">Learn More <span><i class="fa-solid fa-arrow-right"></i></span></a> --}}
                  </div>
                </div>
              </div>

              <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="1100">
                <div class="single-box">
                  <div class="icon">
                    <img src="frontend/nusaintim/assets/img/icons/tabarisan.png" alt="">
                  </div>
                  <div class="heading1">
                    <h4><a href="service-details.html">Tabungan Taburan</a></h4>
                    <div class="space16"></div>
                    <p>Tabungan Taburan adalah produk simpanan BPR yang memudahkan nasabah menabung secara rutin dengan fleksibilitas setoran dan kemudahan akses dana. Tabungan ini sangata cocok untuk menabung dengan perhitungan bunga harian rata rata saldo terakhir sebesar 3%,  dan dapat digunakan sebagai jaminan kredit</p>
                    <div class="space16"></div>
                    {{-- <a href="pengajuanonline" class="learn">Learn More <span><i class="fa-solid fa-arrow-right"></i></span></a> --}}
                  </div>
                </div>
              </div>

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
                    <a href="pengajuanonline" class="learn">Ajukan Sekarang <span><i class="fa-solid fa-arrow-right"></i></span></a>
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
                    <a href="pengajuanonline" class="learn">Ajukan Sekarang <span><i class="fa-solid fa-arrow-right"></i></span></a>
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
                    <a href="pengajuanonline" class="learn">Ajukan Sekarang <span><i class="fa-solid fa-arrow-right"></i></span></a>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

        <!--=====SERVICE AREA END=======-->

       
       

   

        <!--=====TESTIMONIAL AREA START=======-->

        <div class="testimonial sp">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 m-auto text-center">
                <div class="heading1">
                  <span class="span" data-aos="zoom-in-left" data-aos-duration="700" ><img src="frontend/nusaintim/assets/img/icons/span1.png" alt=""> Testimoni Nasabah</span>
                  <h2 class="title tg-element-title">Temukan Apa yang Mitra Kami <br> Katakan Tentang Kami</h2>
                </div>
              </div>
            </div>

            <div class="row _relative">
              <div class="tes1-slider" data-aos="fade-up" data-aos-duration="800">
                <div class="tes1-single-slider">
                  <div class="row align-items-center">
                    <div class="col-lg-8">
                      <div class="right-side">
                       <h4>Pengalaman Nyata Nasabah</h4>
                     <p>"Saya merasa sangat puas dengan layanan di BPR Nusaintim. Proses pengajuan kreditnya cepat dan stafnya sangat membantu. Membantu usaha saya tumbuh dengan dukungan yang profesional dan terpercaya."</p>
                        <div class="bottom-area">
                          <div class="img">
                            <img src="frontend/nusaintim/assets/img/testimonial/fitriana.png" alt="" style="height: 80px; width: 80px;">
                          </div>
                          <div class="heading">
                            <h5><a href="#">Fitriana</a></h5>
                            <p>Nasabah</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="left-side">
                        <img src="frontend/nusaintim/assets/img/testimonial/fitriana.png" alt="" style="height: 350px; width: 350px;">
                      </div>
                    </div>

                  </div>
                </div>

                <div class="tes1-single-slider">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="right-side">
                          <h4>Pengalaman Nyata Nasabah</h4>
                      <p>“Bantuan modal dari BPR Nusaintim sangat membantu usaha saya berkembang.”  
                        Saya menjalankan usaha warung kopi dan membutuhkan dana tambahan untuk perbaikan. Proses pengajuan kredit di BPR Nusaintim cepat, suku bunga kompetitif, dan pelayanannya sangat mendukung pelaku UMKM seperti saya.</p>

                        <div class="bottom-area">
                          <div class="img">
                            <img src="frontend/nusaintim/assets/img/testimonial/haris.png" alt="" style="height: 80px; width: 80px;">
                          </div>
                          <div class="heading">
                            <h5><a href="#">Harizar </a></h5>
                            <p>Nasabah</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="left-side">
                        <img src="frontend/nusaintim/assets/img/testimonial/haris.png" alt="" style="height: 350px; width: 350px;">
                      </div>
                    </div>
                    
                  </div>
                </div>


              </div>

              <div class="tes1-arrows">
                <button class="testimonial-prev-arrow"><i class="fa-solid fa-arrow-left"></i></button>
                <button class="testimonial-next-arrow"><i class="fa-solid fa-arrow-right"></i></button>
              </div>
            </div>
          </div>
        </div>

        <!--=====TESTIMONIAL AREA END=======-->

        <!--=====BLOG AREA START=======-->

        <div class="blog sp">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 m-auto text-center">
                <div class="heading1">
                  <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><img src="frontend/nusaintim/assets/img/icons/span1.png" alt=""> Dapatkan beragam berita dan pengumuman dari kami</span>
                  <h2 class="title tg-element-title">Informasi Terbaru</h2>
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