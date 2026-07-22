@extends('frontend.bprjas.layout.main')

@section('content')

<style>
  .kantor-container {
    margin: 30px auto;
    max-width: 1100px;
    font-family: Arial, sans-serif;
    font-size: 14px;
  }

  .section-header {
    background-color: #113ADC;
    /* biru dongker */
    color: white;
    font-weight: bold;
    padding: 10px;
    margin-top: 20px;
  }

  .kantor-item {
    padding: 15px;
    border: 1px solid #ddd;
    background: #f9f9f9;
  }

  .kantor-item strong {
    display: block;
    margin-bottom: 5px;
  }

  .kantor-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 10px;
  }

  .common-hero {
    background: url('{{ asset(env(' GLOBAL_TOPPAGE')) }}') no-repeat center center;
    background-size: contain;
    /* default untuk desktop */
    background-position: center;
    color: #fff;
    padding: 40px 0;
    position: relative;
    margin-top: 70px;
    /* jarak dari navbar */
    text-align: center;
    /* teks ke tengah */
  }

  /* Versi Mobile */
  @media (max-width: 768px) {
    .common-hero {
      background: url('{{ asset(env(' GLOBAL_TOPMOBILE')) }}') no-repeat center center;
      background-size: cover;
      /* gambar diperbesar biar penuh */
      min-height: 180px;
      /* tinggi hero agar kelihatan besar */
      display: flex;
      align-items: center;
      /* teks di tengah vertikal */
      justify-content: center;
      /* teks di tengah horizontal */
      padding: 0;
      /* hilangkan padding default */
    }

    .common-hero h1,
    .common-hero h2,
    .common-hero .title {
      font-size: 20px;
      /* sesuaikan ukuran teks agar pas di mobile */
      font-weight: bold;
      color: #000;
      /* atau putih jika kontras dengan background */
    }
  }
</style>

<body class="body tg-heading-subheading animation-style3">


  <div class="common-hero">
    <div class="container">
      <div class="row align-items-center text-center">
        <div class="col-lg-8 m-auto">
          <div class="main-heading">
            <h1 style="font-size: 35px">Event Kegiatan</h1>
            <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a href="/">Home</a> <span
                class="arrow"><i class="fa-regular fa-angle-right"></i></span> event kegiatan</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="blog blog-page sp">
    <div class="container">
      <div class="row">
        @foreach ($event as $item)
        <div class="col-lg-4">
          <a href="{{ route('detevent', $item->id) }}" style="text-decoration:none; color:inherit; display:block;">
            <div
              style="background:#fff; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1); overflow:hidden; font-family:'Archivo', sans-serif; margin-bottom:20px;">

              <!-- Carousel -->
              <div id="imageCarousel{{ $item->id }}" class="carousel slide" data-bs-ride="carousel"
                data-bs-interval="3000">
                <div class="carousel-inner">
                  @php
                  $banners = $multibaner->where('page_id', $item->id);
                  @endphp

                  @foreach ($banners as $index => $banner)
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="/recfil?display=true&rf={{ $banner->url}}" class="d-block w-100"
                      alt="Banner {{ $index+1 }}" style="width:100%; height:250px; object-fit:cover;">
                  </div>
                  @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel{{ $item->id }}"
                  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel{{ $item->id }}"
                  data-bs-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </button>
              </div>


              <!-- Detail Event -->
              <div style="padding:15px; text-align:left;">
                <h4 style="font-size:16px; font-weight:700; text-transform:uppercase; margin:10px 0; color:#1a1a1a;">
                  {{ $item->title }}
                </h4>
                <p style="font-size:13px; color:#666; margin:0 0 10px 0;">
                  {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
                </p>
                <span style="font-size:14px; font-weight:600; color:#007bff;">Lanjutkan Membaca</span>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</body>


@endsection