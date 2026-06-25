@extends('frontend.bprapm.layout.main')

<style>
    .teks{
        margin-bottom: 0px;
    }

    .teksbold{
        margin-bottom: 0px;
        font-weight: bold;
        white-space: none;
    }

    .row{
        display: flex;
    }
</style>

@section('content')
    <section class="tj-slider-section" style="margin-top: 100px;">
      <div class="swiper hero-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide tj-slider-item">
            <div class="slider-bg-image" data-bg-image="frontend/bprapm/assets/images/banner/jepang.jpg"></div>
            <div class="container">
              <div class="slider-wrapper">
                <div class="slider-content">
                  <h1 class="slider-title">Duta Alih Teknologi ke <span>Jepang.</span></h1>
                  <div class="slider-desc">Bersama Bank APM & LPK GAI</div>
                  <div class="slider-btn">
                    <a class="tj-primary-btn" href="">
                      <span class="btn-text"><span>Daftar Sekarang</span></span>
                      <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="choose" class="tj-choose-section h6-choose h7-choose section-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading style-2 style-7 text-center">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Apa itu Program Magang Jepang?</span>
                  <h2 class="sec-title text-anim">Program resmi untuk transfer teknologi dan keterampilan dari Jepang ke Indonesia.</h2>
                </div>
              </div>
            </div>
            <div class="row rightSwipeWrap h7-choose-item-wrapper  wow fadeInLeftBig" data-wow-delay=".4s">
              <div class="col-lg-4 h7-choose-item">
                <div class="choose-box h6-choose-box h7-choose-box">
                  <div class="choose-content">
                    <div class="choose-icon">
                      <i class="tji-innovative"></i>
                    </div>
                    <h4 class="title">Tujuan & Manfaat</h4>
                    <p class="desc">Meningkatkan kompetensi, mendapatkan pengalaman kerja internasional, dan membawa pulang teknologi serta etos kerja Jepang.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 h7-choose-item">
                <div class="choose-box h6-choose-box h7-choose-box">
                  <div class="choose-content">
                    <div class="choose-icon">
                      <i class="tji-award"></i>
                    </div>
                    <h4 class="title">Legalitas Terjamin</h4>
                    <p class="desc">Bekerja sama dengan lembaga resmi dan pemerintah, memastikan program berjalan sesuai hukum dan prosedur yang berlaku.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 h7-choose-item">
                <div class="choose-box h6-choose-box h7-choose-box">
                  <div class="choose-content">
                    <div class="choose-icon">
                      <i class="tji-support"></i>
                    </div>
                    <h4 class="title">Beragam Bidang Kerja</h4>
                    <p class="desc">Tersedia posisi di berbagai sektor industri seperti manufaktur, konstruksi, pertanian, pengolahan makanan, dan lainnya.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <section class="h10-about section-gap">
          <div class="container">
            <div class="row flex-column-reverse flex-md-row ">
              <div class="col-12 col-lg-7">
                <div class="h10-about-content-wrapper">
                  <div class="sec-heading style-3 ">
                    <h2 class="sec-title title-highlight wow fadeInUp" data-wow-delay=".3s">
                        Solusi Pendanaan dengan Dana Talangan Bank APM
                    </h2>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6 d-none d-md-block d-lg-none">
                      <div class="about-img-area h10-about-banner wow bounceInLeft" data-wow-delay=".3s">
                        <div class="about-img">
                          <img src="assets/images/about/h10-about-banner.webp" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12">
                      <div class="h10-about-content">
                        <p class="desc wow fadeInUp" data-wow-delay=".4s">
                            Jangan biarkan biaya menjadi penghalang. Kami menyediakan fasilitas dana talangan untuk semua kebutuhan Anda.
                        </p>
                        <div class="h9-about-funfact h10-about-funfact">
                          <div class="countup-item">
                            <div class="inline-content">
                              <span class="count-plus">
                                <i class="fa-duotone fa-light fa-rocket-launch" style="--fa-primary-color: rgb(5, 98, 64); --fa-secondary-color: rgb(5, 98, 64);"></i>
                              </span>
                            </div>
                            <span class="count-text">Proses pengajuan mudah dan cepat</span>
                          </div>
                          <div class="countup-item">
                            <div class="inline-content">
                              <span class="count-plus">
                                <i class="fa-duotone fa-solid fa-wallet" style="--fa-primary-color: rgb(5, 98, 64); --fa-secondary-color: rgb(5, 98, 64);"></i>                              </span>
                            </div>
                            <span class="count-text">Pembayaran cicilan dimulai setelah Anda bekerja di Jepang.</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-12 col-lg-5 d-block d-md-none d-lg-block">
                <div class="about-img-area h10-about-banner wow bounceInLeft" data-wow-delay=".3s">
                  <div class="about-img overflow-hidden">
                    <div class="footer-subscribe h5-footer-subscribe" style="border: 1px solid;">
                          <h3 class="title text-anim">Contoh Simulasi Cicilan</h3>
                            <div class="row">
                                <div class="col-6">
                                    <p class="teks">Jumlah Pinjaman</p>
                                </div>
                                <div class="col-6">
                                    <p class="teksbold">Rp. 30.000.000</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="teks">Tenor / Jangka Waktu</p>
                                </div>
                                <div class="col-6">
                                    <p class="teksbold">12 bulan</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="teks">Suku Bunga (flat)</p>
                                </div>
                                <div class="col-6">
                                    <p class="teksbold">1% / bulan</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <p class="teks">Angsuran per Bulan</p>
                                </div>
                                <div class="col-6">
                                    <p class="teksbold">Rp. 2.800.000</p>
                                </div>
                            </div>

                            <div class="row">
                              *Angka simulasi. Perhitungan akhir disesuaikan dengan persetujuan Bank APM.
                            </div>
                    </div>
              
                  </div>
                </div>
              </div>
            </div>
          </div>


        </section>

@endsection