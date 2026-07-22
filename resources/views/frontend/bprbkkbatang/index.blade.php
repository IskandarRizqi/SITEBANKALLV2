@extends('frontend.bprbkkbatang.layout.main')

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

        .header-carousel-item {
            height: 650px;
            overflow: hidden;
        }
        
        @media (max-width: 767px) {
            .header-carousel-item {
                height: 220px; /* sesuaikan sama tinggi banner mobile kamu */
            }
        }
    </style>

    <body>
      <div class="header-carousel owl-carousel">
            @foreach ($baner as $item)
                @if (!empty($item->url) || !empty($item->url_mobile))
                    <div class="header-carousel-item">

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
                                    alt="Banner Mobile" loading="lazy" style="width: 100%; object-fit: fill;">
                            </div>
                        @endif

                        <div class="carousel-caption">
                            <div class="carousel-caption-inner text-center p-3"></div>
                        </div>

                    </div>
                @endif
            @endforeach
        </div>


      <section id="special">
         <div class="spbg"></div>
         <div class="container" style="position:relative;z-index:2;">
            <div class="row g-5">
               <div class="col-lg-4" data-aos="fade-right">
					<div class="card" style="height: 100%" >
						<div class="card-header text-light">
							<h4>SUKU BUNGA </h4>
						</div>
						<div class="card-body">
							<h5 style="color:blue;font-size:17px;"> SUKU BUNGA LPS</h5><ul>
                            <li>6,00%</li>
                        </ul><h5 style="color:blue;font-size:17px;"> TAMADES</h5><ul>
                            <li>1,75% Per Tahun</li>
                        </ul><h5 style="color:blue;font-size:17px;">TABUNGANKU</h5><ul>
                            <li>2%  Per Tahun</li>
                        </ul><h5 style="color:blue;font-size:17px;">TAB. TAHARA</h5><ul>
                            <li>0,2% Per Tahun</li>
                        </ul><h5 style="color:blue;font-size:17px;">DEPOSITO</h5><table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Bulan</th>
										<th>Suku Bunga</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1 Bulan</td>
										<td>4%</td>
									</tr>
									<tr>
										<td>3 Bulan</td>
										<td>4%</td>
									</tr>
									<tr>
										<td>6 Bulan</td>
										<td>4.5%</td>
									</tr>
									<tr>
										<td>12 Bulan</td>
										<td>5%</td>
									</tr>
								</tbody>	
							</table>
							<br>
                     <div style="text-align:center;">
                        <strong style="font-size:14px;">LPS Menjamin Simpanan Anda di Bank <br>
                        Hingga 2 Miliar  Per Nasabah Per Bank </strong>
                     </div>
						</div>
					</div>
                    </div>
				
               <div class="col-lg-8" data-aos="fade-left">
                
					<div class="card" style="height: auto">
						<div class="card-header text-light">
							<h4>PROFIL SINGKAT</h4>
						</div>
						<div class="card-body">
                     <h4 style="color:blue; text-align:center;">
                        <strong>PERUSAHAAN DAERAH BANK PERKREDITAN RAKYAT (PD. BPR) BKK BATANG</strong>
                     </h4>
                     <p>
                        Perusahaan Daerah Bank Perkreditan Rakyat (PD. BPR) BKK BATANG Kabupaten Batang didirikan berdasarkan Peraturan Daerah (Perda) Provinsi Jawa Tengah No.11 tahun 1981, sedangkan pengukuhan sebagai Bank Perkreditan Rakyat berdasarkan Perda Provinsi Jawa Tengah No.4 tahun 1995 dan telah diumumkan dalam Lembaran Daerah Provinsi Jawa Tengah No.15 tahun 1996 seri D nomor 13.
                     </p>
						
						</div>
					</div>
				</div>
			</div>
               </div>
           
         
      </section>

      

      <section id="category">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <h2 class="stitle">Layanan Kami</h2>
               <div class="sline"></div>
            </div>
            <div class="row g-3 justify-content-center">
               <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="0">
                  <a href="/kredit">
                  <div class="catcard" data-filter="all">
                     <img class="catimg" src="frontend/bprbkkbatang/assets/img/produk/ikonkredit.png" alt=""/>
                     <div class="catnm">Kredit</div>
                  </div>
                  </a>
               </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="70">
                  <a href="/deposito">
                  <div class="catcard" data-filter="burgers">
                     <img class="catimg" src="frontend/bprbkkbatang/assets/img/produk/ikondepo.png" alt=""/>
                     <div class="catnm">Deposito</div>
                  </div>
                  </a>
               </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="140">
                  <a href="/tabungan">
                  <div class="catcard" data-filter="pizza">
                     <img class="catimg" src="frontend/bprbkkbatang/assets/img/produk/ikontab.png" alt=""/>
                     <div class="catnm">Tabungan</div>
                  </div>
                  </a>
               </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="210">
                  <a href="/layananlain">
                  <div class="catcard" data-filter="chicken">
                     <img class="catimg" src="frontend/bprbkkbatang/assets/img/menu/lainnya.png" alt=""/>
                     <div class="catnm">Layanan Lainnya</div>
                  </div>
                  </a>
               </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="280">
                  <a href="/pengaduan">
                  <div class="catcard" data-filter="wraps">
                     <img class="catimg" src="frontend/bprbkkbatang/assets/img/menu/pengaduan.png" alt=""/>
                     <div class="catnm">Pengaduan</div>
                  </div>
                  </a>
               </div>
            </div>
         </div>
      </section>

      <section id="chefs">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <h2 class="stitle">Berita</h2>
               <div class="sline"></div>
            </div>
            <div class="row g-3">
            @foreach ($allinfo as $item)
               <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                  <div class="chcard">
                     <div class="chimg">
                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}" alt="{{ $item->title }}"/>
                     </div>
                     <div class="chbody">
                        <div class="chrole">{{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d, M, Y') }}</div>
                        <div class="chnm">{{ $item->title }}</div>
                        <div class="btn-baca mt-3">
                            <a href="{{ route('detberita', $item->id) }}">
                                Baca Selengkapnya...
                            </a>
                        </div>
                     </div>
                  </div>
               </div>
             @endforeach
            </div>
         </div>
         
         <div class="text-center mt-4">
            <a href="/informasi" class="btn btn-danger">Lihat Semua Berita</a>
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
