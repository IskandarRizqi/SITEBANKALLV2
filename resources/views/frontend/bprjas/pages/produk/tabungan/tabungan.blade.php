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
</style>

<body class="body tg-heading-subheading animation-style3">


  <!--=====progress END=======-->

        <div class="paginacontainer"> 

        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
            </svg>
        </div>

        </div> 



   
     
        <!--=====HERO AREA START=======-->

        <div class="common-hero">
          <div class="container">
            <div class="row align-items-center text-center">
              <div class="col-lg-8 m-auto">
                <div class="main-heading">
                  <h1 style="font-size: 35px">TABUNGAN</h1>
                    <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a href="index.html">Home</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Produk <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Tabungan</span>
                </div>
              </div>
            </div>
          </div>
        </div>


                <!--=====TEAM AREA START=======-->

                <div class="team2 team-page sp" style="padding-top: 0px">
                    <div class="container">
                      <div class="space30"></div>
                      <div class="row">
                        @foreach($tabungan as $item)
                              <div class="col-lg-4 col-md-6">
                                  <div class="team-box">
                                      <div class="image-area">
                                          <div class="image">
                                              <a href="{{ route('dettabungan',$item->id) }}">
                                                  <img src="/recfil?display=true&rf={{ $item->thumbnail }}" 
                                                      alt="{{ $item->title ?? 'tabungan' }}">
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  </div>
</body>


@endsection