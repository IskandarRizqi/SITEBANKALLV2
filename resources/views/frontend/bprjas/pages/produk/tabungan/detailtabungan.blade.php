@extends('frontend.bprjas.layout.main')

@section('content')

<style>
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

  .event-content {
    max-width: 100%;
    overflow-x: auto;
    /* biar kalau ada tabel / gambar besar, muncul scroll horizontal */
    word-wrap: break-word;
    /* biar teks panjang gak keluar area */
    line-height: 1.6;
    /* biar enak dibaca */
    text-align: justify;
    font-family: 'Archivo', sans-serif;
  }
</style>

<body class="body tg-heading-subheading animation-style3">


  <!--=====HERO AREA START=======-->

  <div class="common-hero">
    <div class="container">
      <div class="row align-items-center text-center">
        <div class="col-lg-8 m-auto">
          <div class="main-heading">
            <h1 style="font-size: 35PX">DETAIL TABUNGAN</h1>
            <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a href="/">Home</a> <span
                class="arrow"><i class="fa-regular fa-angle-right"></i></span> Produk <span class="arrow"><i
                  class="fa-regular fa-angle-right"></i></span> Detail Tabungan</span>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="service-details-area-all sp">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">

          <div class="sidebar-box-area sidebar-bg mb-40">
            <h3>Produk Terkait</h3>
            <ul class="features-list">
              @foreach($other_tabungan as $item)
              <li>
                <a href="{{ route('dettabungan', $item->id) }}">
                  {{ $item->title }}
                  <span><i class="fa-regular fa-angle-right"></i></span>
                </a>
              </li>
              @endforeach
            </ul>
          </div>

        </div>

        <div class="col-lg-8 col-md-12 col-12">
          <div class="service-details-post">
            <article>
              <div class="details-post-area">
                <div class="image">
                  <img src="/recfil?display=true&rf={{ $tabungan->banner }}"
                    style="height: 800px; border-radius:5px 5px;" alt="{{ $tabungan->title ?? 'tabungan' }}">
                </div>
                <div class="space30"></div>
                <div class="heading1">
                  <h2 style="font-size: 30px;">{{ $tabungan->title }}</h2>
                  <div class="space16"></div>
                  <div class="event-content">
                    {!! $tabungan->content !!}
                  </div>
                </div>
              </div>
            </article>
            <a href="/pengajuanonline"
              style="margin-top: 40px; background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; text-decoration: none; display: inline-block;">
              Ajukan
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection