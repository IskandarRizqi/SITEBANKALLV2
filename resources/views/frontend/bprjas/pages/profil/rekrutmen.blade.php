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
</style>

<!--=====HERO AREA START=======-->

<div class="common-hero">
  <div class="container">
    <div class="row align-items-center text-center">
      <div class="col-lg-8 m-auto">
        <div class="main-heading">
          <h1 style="font-size: 35px">E-RECRUITMENT</h1>
          <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a href="/">Home</a> <span
              class="arrow"><i class="fa-regular fa-angle-right"></i></span> Rekrutment <span class="arrow">
        </div>
      </div>
    </div>
  </div>
</div>


<!--=====BLOG AREA START=======-->
<div class="col-lg-12" style="padding-top: 0px">
  <div class="blog blog-page sp">
    <div class="container">
      <div class="row">
        <!-- Sidebar Produk Terkait -->
        <div class="col-lg-4">
          <div class="sidebar-box-area sidebar-bg mb-40">
            <h3>Tautan Terkait</h3>
            <ul class="features-list">
              <li><a href="lelang">Lelang <span><i class="fa-regular fa-angle-right"></i></span></a></li>
              <li><a href="#">Jual Aset <span><i class="fa-regular fa-angle-right"></i></span></a></li>
              <li><a href="rekrutmen">E-Recruitment <span><i class="fa-regular fa-angle-right"></i></span></a></li>
              <li><a href="pengaduan">Pengaduan Pelanggaran <span><i class="fa-regular fa-angle-right"></i></span></a>
              </li>
              <li><a
                  href="https://docs.google.com/forms/d/e/1FAIpQLSfO340OmQU84nottx330Gphj8vQbtgVhJa2Wx46YAjS4u_Ajw/viewform?pli=1">Survey
                  Kepuasan Pelanggan <span><i class="fa-regular fa-angle-right"></i></span></a></li>
            </ul>
          </div>
        </div>

        <!-- Konten Gambar Artikel -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Loop konten artikel -->
            @foreach ($rekruitmen as $item)
            @csrf
            <div class="col-lg-6">
              <div class="blog2-box">
                <div class="image">
                  <img src="/recfil?display=true&rf={{ $item->gambar}}" alt=""
                    style="height: 300px; border-radius: 5px 5px;">
                </div>
                <div class="heading1">
                  <div class="tags">
                    <a href="#" class="date"><img src="frontend/bprjas/assets/img/icons/date.png" alt=""> {{
                      \Carbon\Carbon::parse($item->tanggal_posting)->format('d/m/Y') }}</a>
                    <a href="#" class="date outhor">
                      <img src="{{ asset('frontend/bprjas/assets/img/icons/user.png') }}" alt="">
                      {{ $item->tipe_pekerjaan_text }}
                    </a>
                  </div>
                  <h4><a href="{{ route('detrekrutmen', $item->id) }}" style="font-size: 20px;">{{ $item->judul }}</a>
                  </h4>
                  <div class="space16"></div>
                  {{-- <p>We explore the growing trend of remote work and its implications for cybersecurity.</p> --}}
                  <div class="space16"></div>
                  <a href="{{ route('detrekrutmen', $item->id) }}" class="learn">Selengkapnya <span><i
                        class="fa-solid fa-arrow-right"></i></span></a>
                </div>
              </div>
            </div>
            @endforeach




            {{--
            <div class="space60"></div>
            <div class="row">
              <div class="col-12 m-auto">
                <div class="theme-pagination text-center">
                  <ul>
                    <li><a href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                    <li><a class="active" href="#">01</a></li>
                    <li><a href="#">02</a></li>
                    <li>...</li>
                    <li><a href="#">12</a></li>
                    <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                  </ul>
                </div>
              </div>
            </div> --}}

            <!-- Tambahkan sisa artikel seperti ini -->

          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!--=====BLOG AREA END=======-->

@endsection