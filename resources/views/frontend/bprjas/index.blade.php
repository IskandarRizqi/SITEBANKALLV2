@extends('frontend.bprjas.layout.main')

@section('content')
    <style>
         .header-top {
            padding: 5px 0;
            background-color: transparent !important;
            position: fixed;
            top: 0;
            right: 0px;
            left: auto;
            width: auto;
            z-index: 2100;
        }

        .header-area {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 2000;
            background: #ffffff;
            /* ganti sesuai warna brand */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

         .carousel-item img {
            width: 100%;
            height: 650px;
            object-fit: fill;
        }


        /* Default (desktop) */
        /* Mobile */
        @media (max-width: 768px) {

            /* Geser banner turun supaya tidak ketutupan toggle */
            #carouselExampleControls {
                margin-top: 100px;
                /* sesuaikan dengan tinggi header/toggle */
            }

            #carouselExampleControls .carousel-item img {
                width: 100%;
                height: auto;
                /* proporsional, tidak crop */
                object-fit: cover;
                background: #fff;
                /* opsional, biar ada background kalau ada ruang kosong */
            }

            /* Panah navigasi tetap di tengah */
            #carouselExampleControls .carousel-control-prev,
            #carouselExampleControls .carousel-control-next {
                top: 50%;
                transform: translateY(-50%);
            }
        }

        .card {
            border: none;
            overflow: hidden;
        }

        .card img {
            height: auto;
            /* samakan tinggi */
            object-fit: cover;
            /* biar proporsional */
            width: 100%;
            display: block;
        }

        .footer-custom {
            background-color: #113ADC;
            /* biru tua sesuai gambar */
            font-size: 14px;
        }

        .footer-custom a {
            font-size: 18px;
            transition: color 0.3s;
        }

        .footer-custom a:hover {
            color: #ffcc00;
            /* warna hover opsional */
        }

        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* jumlah baris yang ditampilkan */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>


    <body class="body tg-heading-subheading animation-style3">
        <!--=====HEADER START=======-->



        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @php $activeSet = false; @endphp
                @foreach ($baner as $item)
                    @if (!empty($item->url))
                        <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">
                            <img src="/recfil?display=true&rf={{ $item->url }}" alt="Slide" class="d-block w-100">
                        </div>
                        @php $activeSet = true; @endphp
                    @endif
                @endforeach
            </div>

            <!-- Kontrol Navigasi -->
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>



        <div class="container-fluid my-4 px-2"> <!-- pakai container-fluid & padding 10px -->
            <div class="d-flex align-items-center mb-3">
                <h5 class="mb-0 fw-bold">Produk BPR JAS</h5>
                <div class="flex-grow-1 border-bottom ms-2"></div>
            </div>
            <div class="row gx-3"> <!-- gx-2 = jarak antar kolom kecil -->

                <!-- Card 1 -->
                <div class="col-md-4 col-12 mb-2">
                    <div class="card h-100">
                        <a href="tabungan"><img src="frontend/bprjas/assets/img/produk/tabungan/TAB.png"
                                class="card-img-top img-fluid" alt="Tabungan"> </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4 col-12 mb-2">
                    <div class="card h-100">
                        <a href="deposito"><img src="frontend/bprjas/assets/img/produk/deposito/DEPO.png"
                                class="card-img-top img-fluid" alt="Deposito"> </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4 col-12 mb-2">
                    <div class="card h-100">
                        <a href="kredit"><img src="frontend/bprjas/assets/img/produk/kredit/kredit.png"
                                class="card-img-top img-fluid" alt="Kredit"> </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid my-4 px-2">
            <div class="row">

                <!-- Kolom Event -->
                <div class="col-md-6 mb-3">
                    <!-- Judul Event -->
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="mb-0 fw-bold">Event BPR JAS</h5>
                        <div class="flex-grow-1 border-bottom ms-2"></div>
                    </div>

                    <!-- Carousel Event -->
                    <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            @foreach ($event as $key => $item)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <a href="{{ route('detevent', $item->id) }}">
                                        <img src="/recfil?display=true&rf={{ $item->banner }}"
                                            style="height: 440px; object-fit: cover; border-radius: 5px 5px;"
                                            class="d-block w-100" alt="{{ $item->title }}">
                                    </a>
                                    <div class="carousel-caption d-none d-md-block text-start"
                                        style="background: rgba(0,0,0,0.5); padding: 15px; border-radius: 8px;">
                                        <h5 style="color: #fff; text-shadow: 2px 2px 5px rgba(0,0,0,0.8);">
                                            {{ $item->title }}
                                        </h5>
                                        <p style="color: #f1f1f1; text-shadow: 1px 1px 4px rgba(0,0,0,0.8);">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Tombol panah kiri -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <!-- Tombol panah kanan -->
                        <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>


                <!-- Kolom Info -->
                <div class="col-md-6 mb-3">
                    <!-- Judul Info -->
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="mb-0 fw-bold">Info BPR JAS</h5>
                        <div class="flex-grow-1 border-bottom ms-2"></div>
                    </div>

                    <!-- Isi Info Card -->
                    <div class="row gx-2">
                        @foreach ($berita as $item)
                            <div class="col-md-4 col-12 mb-2">
                                <a href="{{ route('detberita', $item->id) }}" class="text-decoration-none text-dark">
                                    <div class="card h-100">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            style="height: 140px; border-radius: 5px 5px;" class="card-img-top img-fluid"
                                            alt="{{ $item->title }}">
                                        <div class="p-2">
                                            <small>{{ \Carbon\Carbon::parse($item->tanggal_tampil)->format('d M Y') }}</small>
                                            <p class="mb-0 fw-bold text-truncate-2">{{ $item->title }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="informasi" class="btn btn-danger w-100 fw-bold">Lihat Selengkapnya...</a>
                    </div>
                </div>


    </body>
@endsection

{{-- <script>
          document.addEventListener("DOMContentLoaded", function() {
            const navLink = document.querySelector('a[href="#about"]');
            if (navLink) {
              const onIndex = window.location.pathname.endsWith("/") || window.location.pathname === "/";
              if (!onIndex) {
                navLink.setAttribute("href", "/#about");
              }
            }
          });
        </script>

       <script>
  document.addEventListener("DOMContentLoaded", function () {
    var myCarousel = document.querySelector('#carouselExampleControls');
    var carousel = new bootstrap.Carousel(myCarousel, {
      interval: 5000, // 3 detik
      ride: 'carousel'
    });
  });
</script>



<script>
  const eventCarousel = document.querySelector('#eventCarousel');
  if (eventCarousel) {
    new bootstrap.Carousel(eventCarousel, {
      interval: 5000,  // auto slide tiap 2 detik
      ride: 'carousel'
    });
  }
</script> --}}
