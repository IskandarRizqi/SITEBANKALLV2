@extends('frontend.bpreleska.layout.main')

@section('content')
    <style id="clear-banner-shadow">
        /* Hilangkan semua overlay bayangan */
        .header-carousel .header-carousel-item::before,
        .header-carousel .header-carousel-item::after,
        .header-carousel .header-carousel-item-img-1::before,
        .header-carousel .header-carousel-item-img-1::after,
        .header-carousel .header-carousel-item-img-2::before,
        .header-carousel .header-carousel-item-img-2::after,
        .header-carousel .header-carousel-item-img-3::before,
        .header-carousel .header-carousel-item-img-3::after {
            display: none !important;
            content: none !important;
            background: transparent !important;
            opacity: 0 !important;
        }
    </style>

    <body>
      <div class="header-carousel owl-carousel">
            @foreach ($baner as $item)
                @if (!empty($item->url) || !empty($item->url_mobile))
                    <div class="header-carousel-item" style="height: 650px; overflow: hidden;">

                        {{-- DESKTOP --}}
                        @if (!empty($item->url))
                            <div class="d-none d-md-block w-100 h-100">
                                <img src="/recfil?display=true&rf={{ $item->url }}" class="img-fluid"
                                    alt="Banner Desktop" loading="lazy"
                                    style="width: 100%; height: 100%; object-fit: fill;">
                            </div>
                        @endif

                        {{-- MOBILE --}}
                        @if (!empty($item->url_mobile))
                            <div class="d-block d-md-none w-100 h-100">
                                <img src="/recfil?display=true&rf={{ $item->url_mobile }}" class="img-fluid"
                                    alt="Banner Mobile" loading="lazy" style="width: 100%; height: 100%; object-fit: fill;">
                            </div>
                        @endif

                        <div class="carousel-caption">
                            <div class="carousel-caption-inner text-center p-3"></div>
                        </div>

                    </div>
                @endif
            @endforeach
        </div>

      <section id="category">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <h2 class="stitle">Layanan Kami</h2>
               <div class="sline"></div>
            </div>
            <div class="row g-3 justify-content-center">
               <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="0">
                  <div class="catcard">
                     <img class="catimg" src="frontend/bpreleska/assets/img/produk/kredit.png" alt=""/>
                     <div class="catnm">Kredit</div>
                  </div>
               </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="70">
                  <div class="catcard">
                     <img class="catimg" src="frontend/bpreleska/assets/img/produk/deposito.png" alt=""/>
                     <div class="catnm">Deposito</div>
                  </div>
               </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="140">
                  <div class="catcard">
                     <img class="catimg" src="frontend/bpreleska/assets/img/produk/tabungan.png" alt=""/>
                     <div class="catnm">Tabungan</div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section id="gallery">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <h2 class="stitle">Berita</h2>
               <div class="sline"></div>
            </div>
           
               <div id="bottomslidercontainer" style="width:100%" data-aos="fade-up">
                  <div id="crsDashboardBottom" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#crsDashboardMain" data-slide-to="0" class="active"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active" onclick="openbannerlink('#')" style="cursor: pointer;">
                           <img class="d-block w-100" src="https://bprbkkbatang.com/images/banner/bottom/1737783753_1657701336_Untitled-1-02.png" alt="Slide">
                           <div class="carousel-caption d-none d-md-block"></div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#crsDashboardBottom" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#crsDashboardBottom" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            
         </div>
      </section>
      <!-- <section id="chefs">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <span class="slbl">The Culinary Team</span>
               <h2 class="stitle">Meet Our Expert <span>Chefs</span></h2>
               <div class="sline"></div>
            </div>
            <div class="row g-4">
               <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                  <div class="chcard">
                     <div class="chimg">
                        <img src="frontend/bprbkkbatang/assets/img/chefs/1.jpg" alt=""/>
                        <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a></div>
                     </div>
                     <div class="chbody">
                        <div class="chnm">Alice Mortal</div>
                        <div class="chrole">Head Chef</div>
                        <div class="chexp">12 years experience</div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="80">
                  <div class="chcard">
                     <div class="chimg">
                        <img src="frontend/bprbkkbatang/assets/img/chefs/2.jpg" alt=""/>
                        <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a></div>
                     </div>
                     <div class="chbody">
                        <div class="chnm">Michael Corn</div>
                        <div class="chrole">Grill Master</div>
                        <div class="chexp">8 years experience</div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="160">
                  <div class="chcard">
                     <div class="chimg">
                        <img src="frontend/bprbkkbatang/assets/img/chefs/3.jpg" alt=""/>
                        <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a></div>
                     </div>
                     <div class="chbody">
                        <div class="chnm">Faz Chowdel</div>
                        <div class="chrole">Pastry Chef</div>
                        <div class="chexp">10 years experience</div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="240">
                  <div class="chcard">
                     <div class="chimg">
                        <img src="frontend/bprbkkbatang/assets/img/chefs/4.jpg" alt=""/>
                        <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a></div>
                     </div>
                     <div class="chbody">
                        <div class="chnm">William Latnum</div>
                        <div class="chrole">Pizza Artisan</div>
                        <div class="chexp">9 years experience</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> -->

    </body>

  
@endsection
