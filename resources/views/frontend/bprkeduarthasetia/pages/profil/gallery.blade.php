@extends('frontend.bprkeduarthasetia.layout.main')

@section('content')

<style>
.common-hero {
  background: url('{{ asset(env('GLOBAL_TOPPAGE')) }}') no-repeat center center; 
  background-size: cover; /* default untuk desktop */
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
</style>
  <!--=====HERO AREA START=======-->
    
            <div class="common-hero">
              <div class="container">
                <div class="row align-items-center text-center">
                  <div class="col-lg-10 m-auto">
                    <div class="main-heading">
                      <h1 style="font-size: 35px; color: #fff">Gallery
                        </h1>
                        <span class="span"> <a href="index.html">Beranda</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Profil <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Gallery</span>
                    </div>
                  </div>
    
                </div>
              </div>
            </div>
    
  <!--=====PROJECT BOXS START=======-->

        <div class="project-boxs-area sp">
            <div class="container">
                <div class="row">
                    @php
                        // Group gallery berdasarkan title (kategori)
                        $groupedGallery = $gallery->groupBy('kategori');
                    @endphp

                    @foreach($groupedGallery as $title => $items)
                        <div class="col-lg-4 col-md-6">
                            <div class="project-page-box">

                                {{-- Carousel --}}
                                <div id="carousel-{{ \Illuminate\Support\Str::slug($title) }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($items as $key => $item)
                                            <div class="carousel-item @if($key==0) active @endif">
                                                <img src="/recfil?display=true&rf={{ $item->image }}" 
                                                    alt="{{ $item->title }}" 
                                                    class="d-block w-100"
                                                    style="border-radius:8px; height:360px; object-fit:cover;">
                                            </div>
                                        @endforeach
                                    </div>

                                    {{-- Tombol navigasi --}}
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ \Illuminate\Support\Str::slug($title) }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ \Illuminate\Support\Str::slug($title) }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>

                                <div class="heading2 mt-2">
                                    <h4 >
                                        <a href="" style="font-size: 15px;">
                                            {{ $item->title }}
                                        </a>
                                    </h4>
                                   
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

@endsection