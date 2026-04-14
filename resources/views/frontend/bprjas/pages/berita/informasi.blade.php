@extends('frontend.bprjas.layout.main')

@section('content')

<style>
.common-hero {
  background: url('{{ asset(env('GLOBAL_TOPPAGE')) }}') no-repeat center center; 
  background-size: contain; /* default untuk desktop */
  background-position: center;
  color: #fff;
  padding: 40px 0;
  position: relative;
  margin-top: 70px; /* jarak dari navbar */
  text-align: center; /* teks ke tengah */
}

/* Versi Mobile */
@media (max-width: 768px) {
  .common-hero {
    background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center; 
    background-size: cover;   /* gambar diperbesar biar penuh */
    min-height: 180px;        /* tinggi hero agar kelihatan besar */
    display: flex;
    align-items: center;      /* teks di tengah vertikal */
    justify-content: center;  /* teks di tengah horizontal */
    padding: 0;               /* hilangkan padding default */
  }

  .common-hero h1,
  .common-hero h2,
  .common-hero .title { 
    font-size: 20px;   /* sesuaikan ukuran teks agar pas di mobile */
    font-weight: bold;
    color: #000;       /* atau putih jika kontras dengan background */
  }
}
.text-truncate-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;   /* jumlah baris yang ditampilkan */
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.event-content {
  max-width: 100%;
  overflow-x: auto;   /* biar kalau ada tabel / gambar besar, muncul scroll horizontal */
  word-wrap: break-word; /* biar teks panjang gak keluar area */
  line-height: 1.6;   /* biar enak dibaca */
  text-align: justify;
 font-family: 'Archivo', sans-serif;
}

/* UNTUK CONTENT */
  .btn-tab {
    border: none;
    background: #f0f0f0;
    padding: 10px 25px;
    margin: 0 5px;
    border-radius: 30px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  .btn-tab.active {
    background: #007bff;
    color: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
  }
  .btn-tab:hover {
    background: #0056b3;
    color: #fff;
  }
  .tab-content {
    animation: fadeIn 0.5s ease;
  }
  @keyframes fadeIn {
    from {opacity: 0; transform: translateY(10px);}
    to {opacity: 1; transform: translateY(0);}
  }
  .blog2-box .image img {
    width: 100%;
    height: 300px;   /* atur tinggi sesuai kebutuhan */
    object-fit: cover;
    border-radius: 8px;
}
</style>

    
            <div class="common-hero">
              <div class="container">
                <div class="row align-items-center text-center">
                  <div class="col-lg-10 m-auto">
                    <div class="main-heading">
                      <h1 style="font-size: 35px;">INFORMASI</h1>
                        <span class="span">  <a href="index.html">Home</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Informasi</span>
                        <img src="{{asset('frontend/bprjas/assets/img/icons/span1.png')}}" alt="">
                    </div>
                  </div>
    
                </div>
              </div>
            </div>
    

       <!--===== BLOG AREA START =====-->
        <div class="blog blog-page sp" style="padding-top: 30px">
            <div class="container">
                <!-- Tombol Filter -->
                <div class="text-center mb-3">
                <button class="btn-tab active" onclick="showTab('all')">Semua</button>
                <button class="btn-tab " onclick="showTab('berita')">Berita</button>
                <button class="btn-tab" onclick="showTab('event')">Event</button>
                <button class="btn-tab" onclick="showTab('literasi')">Literasi Keuangan</button>
                </div>

                {{-- ALL --}}
                <div class="row tab-content" id="all">
                  @foreach($all as $item)
                      <div class="col-lg-4">
                          <div class="blog2-box">
                              @if($item->type == 0)
                                  <a href="{{ route('detberita', $item->id) }}" class="text-decoration-none text-dark">
                              @elseif($item->type == 1)
                                  <a href="{{ route('detevent', $item->id) }}" class="text-decoration-none text-dark">
                              @elseif($item->type == 2)
                                  <a href="{{ route('detliterasi', $item->id) }}" class="text-decoration-none text-dark">
                              @endif

                                                <div id="imageCarousel{{ $item->id }}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                                                  <div class="carousel-inner">
                                                        @if($item->thumbnail)
                                                          <div class="carousel-item active">
                                                              <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                                  class="d-block w-100"
                                                                  alt="Thumbnail {{ $item->title }}"
                                                                  style="width:100%; height:250px; object-fit:cover; border-radius: 5px;">
                                                          </div>
                                                      @endif

                                                      {{-- Banner dari multibanner --}}
                                                      @php
                                                          $banners = $multibaner->where('page_id', $item->id);
                                                      @endphp
                                                      @foreach ($banners as $index => $banner)
                                                          <div class="carousel-item {{ !$item->thumbnail && $loop->first ? 'active' : '' }}">
                                                              <img src="/recfil?display=true&rf={{ $banner->url }}"
                                                                  class="d-block w-100"
                                                                  alt="Banner {{ $index+1 }}"
                                                                  style="width:100%; height:250px; object-fit:cover; border-radius: 5px;">
                                                          </div>
                                                      @endforeach
                                                  </div>

                                                  <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel{{ $item->id }}" data-bs-slide="prev">
                                                      <span class="carousel-control-prev-icon"></span>
                                                  </button>
                                                  <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel{{ $item->id }}" data-bs-slide="next">
                                                      <span class="carousel-control-next-icon"></span>
                                                  </button>
                                                </div>
                                      <div class="heading1">
                                          <div class="tags">
                                              <span class="date">
                                                  <img src="{{ asset('assets/img/icons/date.png') }}" alt="" 
                                                      style="height: 18px; margin-right:5px;"> 
                                                  {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                              </span>
                                          </div>
                                          <h4 class="mt-2">
                                              <p class="mb-0 fw-bold text-truncate-2" style="color:#000;">{{ $item->title }}</p>
                                          </h4>
                                          <br>
                                          <span class="learn" style="font-size:15px;">
                                              Lanjutkan Membaca <i class="fa-solid fa-arrow-right"></i>
                                          </span>
                                      </div>
                                  </a>
                          </div>
                      </div>
                  @endforeach
                </div>


                <!-- Konten BERITA -->
                 <div class="row tab-content d-none" id="berita">
                    @foreach($berita as $item)
                            <div class="col-lg-4">
                                <div class="blog2-box">
                                    <a href="{{ route('detberita', $item->id) }}" class="text-decoration-none text-dark">
                                       <!-- Carousel -->
                                                <div id="imageCarousel{{ $item->id }}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                                                  <div class="carousel-inner">
                                                        @if($item->thumbnail)
                                                          <div class="carousel-item active">
                                                              <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                                  class="d-block w-100"
                                                                  alt="Thumbnail {{ $item->title }}"
                                                                  style="width:100%; height:250px; object-fit:cover; border-radius: 5px;">
                                                          </div>
                                                      @endif

                                                      {{-- Banner dari multibanner --}}
                                                      @php
                                                          $banners = $multibaner->where('page_id', $item->id);
                                                      @endphp
                                                      @foreach ($banners as $index => $banner)
                                                          <div class="carousel-item {{ !$item->thumbnail && $loop->first ? 'active' : '' }}">
                                                              <img src="/recfil?display=true&rf={{ $banner->url }}"
                                                                  class="d-block w-100"
                                                                  alt="Banner {{ $index+1 }}"
                                                                  style="width:100%; height:250px; object-fit:cover; border-radius: 5px;">
                                                          </div>
                                                      @endforeach
                                                  </div>

                                                  <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel{{ $item->id }}" data-bs-slide="prev">
                                                      <span class="carousel-control-prev-icon"></span>
                                                  </button>
                                                  <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel{{ $item->id }}" data-bs-slide="next">
                                                      <span class="carousel-control-next-icon"></span>
                                                  </button>
                                                </div>
                                        <div class="heading1">
                                            <div class="tags">
                                                <span class="date">
                                                    <img src="{{ asset('assets/img/icons/date.png') }}" alt="" 
                                                        style="height: 18px; margin-right:5px;"> 
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                                </span>
                                            </div>
                                            <h4 class="mt-2">
                                                <p class="mb-0 fw-bold text-truncate-2" style="color:#000;">{{ $item->title }}</p>
                                            </h4>
                                            <br>
                                            <span class="learn"   style="font-size:15px;">
                                                Lanjutkan Membaca <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                </div>

              

                <!-- Konten EVENT -->
                <div class="row tab-content d-none" id="event">
                    @foreach($event as $item)
                            <div class="col-lg-4">
                                <div class="blog2-box">
                                    <a href="{{ route('detevent', $item->id) }}" class="text-decoration-none text-dark">
                                       <!-- Carousel -->
                                                <div id="imageCarousel{{ $item->id }}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                                                  <div class="carousel-inner">
                                                        @if($item->thumbnail)
                                                          <div class="carousel-item active">
                                                              <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                                  class="d-block w-100"
                                                                  alt="Thumbnail {{ $item->title }}"
                                                                  style="width:100%; height:250px; object-fit:cover; border-radius: 5px;">
                                                          </div>
                                                      @endif

                                                      {{-- Banner dari multibanner --}}
                                                      @php
                                                          $banners = $multibaner->where('page_id', $item->id);
                                                      @endphp
                                                      @foreach ($banners as $index => $banner)
                                                          <div class="carousel-item {{ !$item->thumbnail && $loop->first ? 'active' : '' }}">
                                                              <img src="/recfil?display=true&rf={{ $banner->url }}"
                                                                  class="d-block w-100"
                                                                  alt="Banner {{ $index+1 }}"
                                                                  style="width:100%; height:250px; object-fit:cover; border-radius: 5px;">
                                                          </div>
                                                      @endforeach
                                                  </div>

                                                  <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel{{ $item->id }}" data-bs-slide="prev">
                                                      <span class="carousel-control-prev-icon"></span>
                                                  </button>
                                                  <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel{{ $item->id }}" data-bs-slide="next">
                                                      <span class="carousel-control-next-icon"></span>
                                                  </button>
                                                </div>
                                        <div class="heading1">
                                            <div class="tags">
                                                <span class="date">
                                                    <img src="{{ asset('assets/img/icons/date.png') }}" alt="" 
                                                        style="height: 18px; margin-right:5px;"> 
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                                </span>
                                            </div>
                                            <h4 class="mt-2">
                                                <p class="mb-0 fw-bold text-truncate-2" style="color:#000;">{{ $item->title }}</p>
                                            </h4>
                                            <br>
                                            <span class="learn"   style="font-size:15px;">
                                                Lanjutkan Membaca <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                </div>

                <!-- Konten Literasi Keuangan -->
                <div class="row tab-content d-none" id="literasi">
                    @foreach($literasi as $item)
                            <div class="col-lg-4">
                                <div class="blog2-box">
                                    <a href="{{ route('detliterasi', $item->id) }}" class="text-decoration-none text-dark">
                                       <!-- Carousel -->
                                                <div id="imageCarousel{{ $item->id }}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                                                  <div class="carousel-inner">
                                                      @if($item->thumbnail)
                                                          <div class="carousel-item active">
                                                              <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                                  class="d-block w-100"
                                                                  alt="Thumbnail {{ $item->title }}"
                                                                  style="width:100%; height:250px; object-fit:cover; border-radius: 5px;">
                                                          </div>
                                                      @endif

                                                      {{-- Banner dari multibanner --}}
                                                      @php
                                                          $banners = $multibaner->where('page_id', $item->id);
                                                      @endphp
                                                      @foreach ($banners as $index => $banner)
                                                          <div class="carousel-item {{ !$item->thumbnail && $loop->first ? 'active' : '' }}">
                                                              <img src="/recfil?display=true&rf={{ $banner->url }}"
                                                                  class="d-block w-100"
                                                                  alt="Banner {{ $index+1 }}"
                                                                  style="width:100%; height:250px; object-fit:cover; border-radius: 5px;">
                                                          </div>
                                                      @endforeach
                                                  </div>

                                                  <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel{{ $item->id }}" data-bs-slide="prev">
                                                      <span class="carousel-control-prev-icon"></span>
                                                  </button>
                                                  <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel{{ $item->id }}" data-bs-slide="next">
                                                      <span class="carousel-control-next-icon"></span>
                                                  </button>
                                                </div>
                                        <div class="heading1">
                                            <div class="tags">
                                                <span class="date">
                                                    <img src="{{ asset('assets/img/icons/date.png') }}" alt="" 
                                                        style="height: 18px; margin-right:5px;"> 
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                                </span>
                                            </div>
                                            <h4 class="mt-2">
                                                <p class="mb-0 fw-bold text-truncate-2" style="color:#000;">{{ $item->title }}</p>
                                            </h4>
                                            <br>
                                            <span class="learn"   style="font-size:15px;">
                                                Lanjutkan Membaca <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                </div>

            </div>
        </div>





<!-- JS -->
<script>
  function showTab(tab) {
    // sembunyikan semua tab
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('d-none'));
    // hapus active button
    document.querySelectorAll('.btn-tab').forEach(el => el.classList.remove('active'));
    // tampilkan tab yang dipilih
    document.getElementById(tab).classList.remove('d-none');
    // aktifkan tombolnya
    event.target.classList.add('active');
  }
</script>
@endsection