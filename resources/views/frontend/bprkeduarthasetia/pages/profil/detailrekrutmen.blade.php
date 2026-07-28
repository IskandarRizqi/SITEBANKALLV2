@extends('frontend.nusaintim.layout.main')

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

<!--=====HERO AREA START=======-->
<div class="common-hero">
  <div class="container">
    <div class="row align-items-center text-center">
      <div class="col-lg-10 m-auto">
        <div class="main-heading">
          <h1 style="font-size: 35px">Detail Lowongan Pekerjaan</h1>
          <span class="span">
            <img src="{{asset('frontend/bprjas/assets/img/icons/span1.png')}}" alt="">
            <a href="/">Home</a>
            <span class="arrow"><i class="fa-regular fa-angle-right"></i></span>
            Detail Loker
          </span>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="service-details-area-all sp">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 m-auto">
        <!-- card dibuat lebih lebar -->
        <div class="card shadow-lg border-0 p-4" style="border-radius: 20px;">

          <div class="card-body" style="max-width: 800px; margin: auto;">
            <article>
              <div class="details-post-area">
                <div class="heading1">
                  <h2 style="text-align: center; font-size: 30px;">{{ $detrekrutmen->judul }}</h2>
                  <div class="social-users">
                    <ul>
                      <li>
                        <a href="#" class="date outhor">
                          <img src="{{ asset('frontend/bprjas/assets/img/icons/user.png') }}" alt="">
                          {{ $detrekrutmen->tipe_pekerjaan_text }}
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="{{ asset('frontend/bprjas/assets/img/icons/user-icon2.png') }}" alt="">
                          {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_posting)->format('d/m/Y') }}
                          <span style="margin-left: 10px; margin-right: 10px;">Sampai Tanggal</span>
                          <img src="{{ asset('frontend/bprjas/assets/img/icons/user-icon2.png') }}" alt="">
                          {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_berakhir)->format('d/m/Y') }}
                        </a>
                      </li>
                    </ul>
                  </div>
                  <br>
                  <div class="image">
                    <img src="/recfil?display=true&rf={{ $detrekrutmen->gambar}}" alt=""
                      style="height: auto; border-radius: 5px 5px;">
                  </div>
                  <br>
                  <div class="event-content">
                    {!! $detrekrutmen->deskripsi !!}
                  </div>
                </div>
              </div>
            </article>
          </div>

        </div>
      </div>

    </div>
  </div>

  @endsection