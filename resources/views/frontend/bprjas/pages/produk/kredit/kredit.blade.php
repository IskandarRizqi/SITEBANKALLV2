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
                  <h1 style="font-size: 35px;">KREDIT</h1>

                    <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a href="index.html">Home</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Produk <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Kredit</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      
                <!--=====TEAM AREA START=======-->

                <div class="team2 team-page sp" style="padding-top: 0px;">
                    <div class="container">
                     
                      <div class="row">
                         @foreach($kredit as $item)
                              <div class="col-lg-4 col-md-6">
                                  <div class="team-box">
                                      <div class="image-area">
                                          <div class="image">
                                              <a href="{{ route('detkredit',$item->id) }}">
                                                  <img src="/recfil?display=true&rf={{ $item->thumbnail }}" 
                                                      alt="{{ $item->title ?? 'kredit' }}">
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </div>

                      {{-- <div class="space60"></div>
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
                        </div>
                    </div> --}}
                  </div>
          
                  <!--=====TEAM AREA END=======-->



        {{-- <div class="service-details-area-all sp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                       

                        <div class="sidebar-box-area sidebar-bg mb-40">
                            <h3>Produk Terkait</h3>
                            <ul class="features-list">
                                <li><a href="kreditinvestasi">Kredit Investasi <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                                <li><a href="kreditkonsumtif">Kredit Konsumtif <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                                <li><a href="kreditmodalusaha">Kredit Modal Usaha <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                                <li><a href="kreditmultiguna">Kredit Multiguna <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-8 details-left-space">
                        <div class="service-details-post">
                            <article>
                                <div class="details-post-area">
                                    <div class="image">
                                        <img src="frontend/bprjas/assets/img/produk/kredit/kreditt.jpg" alt="">
                                    </div>
                                    <div class="space30"></div>
                                    <div class="heading1">
                                       
                                        <div class="space16"></div>
                                        <p>Kredit pada BPR (Bank Perkreditan Rakyat) adalah fasilitas pembiayaan yang diberikan oleh BPR kepada nasabah perorangan maupun badan usaha untuk berbagai keperluan seperti modal usaha, konsumsi, maupun investasi. Kredit ini diberikan dengan syarat dan ketentuan tertentu serta umumnya dijamin dengan agunan (jaminan).</p> <br>
                                        <h3>Syarat Umum Pengajuan Kredit di BPR:</h3> <br>
                                        <p>1. Warga Negara Indonesia (WNI) berusia minimal 21 tahun atau sudah menikah.</p> 
                                        <p>2. Memiliki penghasilan tetap atau usaha yang berjalan aktif.</p>
                                        <p>3. Fotokopi KTP pemohon dan pasangan (jika sudah menikah).</p>
                                        <p>4. Kartu Keluarga (KK).</p>
                                        <p>5. NPWP (jika diperlukan).</p> <br>

                                        <h3>Ketentuan Kredit BPR:</h3> <br>
                                        <p>1. Besaran plafon kredit ditentukan berdasarkan kemampuan membayar dan nilai jaminan.</p>
                                        <p>2. Jangka waktu kredit bervariasi, bisa mulai dari 6 bulan hingga 5 tahun.</p>
                                        <p>3. Suku bunga tetap atau mengambang, tergantung kebijakan BPR.</p>
                                        <p>4. Dikenakan biaya administrasi dan provisi sesuai kebijakan masing-masing BPR.</p>
                                        <p>5. Jika terjadi keterlambatan pembayaran, akan dikenakan denda keterlambatan.</p>
                                        <p>6. Agunan bisa disita jika terjadi kredit macet sesuai ketentuan hukum.</p>
                                    </div>
                                </div>
                            </article>
                            <a href="pengajuanonline" style="margin-top: 40px; background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; text-decoration: none; display: inline-block;">
                              Ajukan
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    
                          <!--=====CTA AREA START=======-->

     

        <!--=====CTA AREA END=======-->

</body>


@endsection