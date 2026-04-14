<style>
     .footer-custom {
  background-color: #113ADC; /* biru tua sesuai gambar */
  font-size: 14px;
}

.footer-custom a {
  font-size: 18px;
  transition: color 0.3s;
}

.footer-custom a:hover {
  color: #ffcc00; /* warna hover opsional */
}


.whatsapp-float {
  position: fixed;
  bottom: 28px;
  right: 27px;
  z-index: 1000;
}
/* khusus untuk mobile (max-width: 768px) */
@media (max-width: 768px) {
  .whatsapp-float {
    bottom: 70px; /* dinaikkan biar di atas bottom navbar */
    right: 10px;  /* bisa atur lagi kalau perlu */
  }
  .footer-custom {
    margin-bottom: 30px;
  }
  
}


    /* BOTTOM NAVBAR */
.mobile-bottom-nav {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  height: 65px; /* cukup tinggi agar lega */
  background: #ffffff;
  border-top: 1px solid #ddd;
  display: flex;
  justify-content: space-around;
  align-items: center;
  z-index: 999;
}

.mobile-bottom-nav ul {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
  height: 100%;
}

.mobile-bottom-nav ul li {
  flex: 1;
  text-align: center;
}

.mobile-bottom-nav ul li a {
  display: flex;
  flex-direction: column;
  justify-content: center; /* biar icon + teks pas tengah */
  align-items: center;
  height: 100%;
  font-size: 12px;
  color: #333;
  text-decoration: none;
  line-height: 1.2;
}

.mobile-bottom-nav ul li a i {
  font-size: 20px;
  margin-bottom: 3px;
  display: block;
}

.mobile-bottom-nav ul li a.active,
.mobile-bottom-nav ul li a:hover {
  color: #0d6efd; /* Bootstrap primary */
}

</style>
<!-- Footer -->
<footer class="footer-custom text-white py-3">
  <div class="container-fluid px-4">
    
    <!-- Baris Atas -->
    <div class="row align-items-center mb-2">
      <!-- Teks kiri -->
      <div class="col-md-3 text-center text-md-start mb-2 mb-md-0">
        <p class="mb-0">BPR JAS merupakan peserta penjaminan LPS</p>
      </div>

      <!-- Logo LPS -->
      <div class="col-md-2 text-center mb-2 mb-md-0">
        <img src="{{asset('frontend/bprjas/assets/img/logo/LOGOLPS.png')}}" alt="LPS" height="40">
      </div>

      <!-- Teks tengah -->
      <div class="col-md-4 text-center mb-2 mb-md-0">
        <p class="mb-0">BPR JAS berizin dan diawasi oleh Otoritas Jasa Keuangan</p>
      </div>

      <!-- Sosmed kanan -->
      <div class="col-md-3 text-center text-md-end">
        <a href="https://www.facebook.com/people/BPR-JAS-JUANA/100075920540063/#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/juwana_artha_sentosa/" class="text-white me-2"><i class="fab fa-instagram"></i></a>
        <a href="https://www.youtube.com/@juwanaarthasentosa1261" class="text-white me-2"><i class="fab fa-youtube"></i></a>
        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
      </div>

    </div>

    <!-- Baris Bawah (Copyright) -->
    <div class="row">
      <div class="col-12 text-center">
        <p class="mb-0">&copy; All rights reserved. • BPR JAS</p>
      </div>
    </div>

  </div>

<a href="https://wa.me/6281326296688" target="_blank" class="whatsapp-float">
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" width="60" height="60">
</a>

</footer>


          <!--===== Bottom Navbar Mobile Start =====-->
          <nav class="mobile-bottom-nav d-block d-lg-none" >
            <ul>
              <li>
                <a href="/">
                  <i class="fa-solid fa-house"></i>
                  <span>Beranda</span>
                </a>
              </li>
              <li>
                <a href="kredit">
                  <i class="fa-solid fa-credit-card"></i>
                  <span>Kredit</span>
                </a>
              </li>
              <li>
                <a href="deposito">
                  <i class="fa-solid fa-coins"></i>
                  <span>Deposito</span>
                </a>
              </li>
              <li>
                <a href="tabungan">
                  <i class="fa-solid fa-piggy-bank"></i>
                  <span>Tabungan</span>
                </a>
              </li>
              <li>
                <a href="contact">
                  <i class="fa-solid fa-phone"></i>
                  <span>Kontak</span>
                </a>
              </li>
            </ul>
          </nav>
          <!--===== Bottom Navbar Mobile End =====-->












{{-- <!--===== FOOTER AREA START =======-->

                  <!--=====CTA AREA START=======-->

               <div class="cta">
                    <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-7">
                         <div class="heading1-w">
                         <h2 class="title tg-element-title">Di BPR JAS, Kami Berkomitmen pada Bisnis</h2>
                         <div class="space16"></div>
                         <p data-aos="fade-right" data-aos-duration="700" >Kami menawarkan beragam produk dan layanan perbankan, mulai dari tabungan, deposito, kredit, sehingga Anda dapat memilih sesuai dengan kebutuhan dan tujuan keuangan Anda.</p>
                         </div>
                    </div>

                    <div class="col-lg-5">
                         <div class="buttons">
                         <a class="cta-btn1" href="https://wa.me/6281326296688">Minta Konsultasi <span><i class="fa-solid fa-arrow-right"></i></span></a>
                         <a class="cta-btn2" href="service.html">Jelajahi Solusi <span><i class="fa-solid fa-arrow-right"></i></span></a>
                         </div>
                    </div>
                    </div>
                    </div>
               </div>

        <!--=====CTA AREA END=======-->


                <div class="footer1 _relative">
                  <div class="container">
                       <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                 <div class="single-footer-items footer-logo-area">
                                      <div class="footer-logo">
                                        <a href="#"><img src="assets/img/logo/jas.png" alt=""></a>
                                      </div>
                                      <div class="space20"></div>
                                      <div class="heading1">
                                        <strong>PT BPR JUWANA ARTHA SENTOSA</strong> <br>
                                        <br>

                                        <td>
                                          <p> <strong>  Kantor Pusat </strong> : Jl. Komodo No 34 Juwana, Pati Jawa Tengah, Indonesia</p> 
                                          <p> <strong> Kantor Kas </strong>   : Jl. Ronggowarsito Komplek ruko No 5. A5 Plangitan, Kab.Pati</p>
                                        </td>

                                      </div>
                                     
                                 </div>
                            </div>
        
                           <div class="col-lg col-md-6 col-12">
                                 <div class="single-footer-items">
                                      <h3>Profil</h3>
        
                                      <ul class="menu-list">
                                           <li><a href="sejarah">Sejarah</a></li>
                                           <li><a href="pengurus">Pengurus</a></li>
                                           <li><a href="organisasi">Struktur Organisasi</a></li>
                                           <li><a href="jaringan-kantor">Jaringan Kantor</a></li>
                                      </ul>
                                 </div>
                            </div>
        
                            <div class="col-lg col-md-6 col-12">
                                 <div class="single-footer-items">
                                      <h3>Tautan</h3>
        
                                      <ul class="menu-list">
                                           <li><a href="lelang">info lelang </a></li>
                                           <li><a href="#">Jual Aset</a></li>
                                           <li><a href="rekrutmen">E - Recruitment</a></li>
                                           <li><a href="pengaduan">Pengaduan Pelanggaran</a></li>
                                           <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSfO340OmQU84nottx330Gphj8vQbtgVhJa2Wx46YAjS4u_Ajw/viewform?pli=1">Survey Kepuasan Pelangggan</a></li>
                                      </ul>
                                       <div>
                                        <ul class="social-icon">
                                            <li> <a href="https://www.ppatk.go.id/">  <img src="assets/img/logo/ppatk1.png" alt="" style="height: 35px; width: 35px; margin-right: 7px;"> </a></li>
                                            <li> <a href="https://www.ojk.go.id/id/Default.aspx"> <img src="assets/img/logo/ojk.jpeg" alt="" style="height: 35px; width: 35px; margin-right: 7px;"> </a> </li>
                                             <li> <a href="https://www.bi.go.id/id/default.aspx"> <img src="assets/img/logo/bii.jpg" alt="" style="height: 35px; width: 35px; margin-right: 7px;"> </a> </li>
                                              <li> <a href="https://lps.go.id/"> <img src="assets/img/logo/lps.jpg" alt="" style="height: 35px; width: 35px; margin-right: 7px;"> </a> </li>
                                        </ul>
                                      </div>
                                 </div>
                            </div>
        
        
                            <div class="col-lg-3 col-md-6 col-12">
                                 <div class="single-footer-items">
                                      <h3>Hubungi Kami</h3>
        
                                      <div class="contact-box">
                                        <div class="icon">
                                          <img src="assets/img/icons/footer1-icon1.png" alt="">
                                        </div>
                                        <div class="pera">
                                          <a href="tel:0500222333">(0295) 471 488</a>
                                        </div>
                                      </div>

                                      <div class="contact-box">
                                        <div class="icon">
                                        <img src="assets/img/icons/wa.png" alt="" style="width: 23px; height: 23px;">
                                        </div>
                                        <div class="pera">
                                          <a href="https://wa.me/6281326296688" target="_blank">081326296688</a>
                                        </div>
                                    </div>

                                      <div class="contact-box">
                                        <div class="icon">
                                          <img src="assets/img/icons/footer1-icon3.png" alt="">
                                        </div>
                                        <div class="pera">
                                          <a href="mailto:juwanaarthasentosa@yahoo.com" style="font-size: 15px;">juwanaarthasentosa@yahoo.com</a>
                                        </div>
                                      </div>

                                      <div>
                                        <ul class="social-icon">
                                           <li><a href="https://www.facebook.com/people/BPR-JAS-JUANA/100075920540063/#"><i class="fa-brands fab fa-facebook-f"></i></a></li>
          
                                           <li><a href="https://www.youtube.com/@juwanaarthasentosa1261"><i class="fa-brands fa-youtube"></i></a></li>
                                           <li><a href="https://www.instagram.com/juwana_artha_sentosa/"><i class="fa-brands fa-instagram"></i></a></li>
                                      </ul>
                                      </div>
                                       
        
                                 </div>
                            </div>
        
                       </div>
        
                       <div class="space40"></div>
                  </div>

                  <div class="copyright-area">
                    <div class="container">
                      <div class="row align-items-center">
                        <div class="col-md-5">
                             <div class="coppyright">
                               <p>Copyright @2025 Bpr JAS Support By Antar uang</p>
                             </div>
                        </div>
                        <div class="col-md-7">
                             <div class="coppyright right-area">
                                  <a href="term">Terms & Conditions</a>
                                  <a href="privasipolicy">Privacy Policy</a>
                             </div>
                        </div>
                   </div>
                    </div>
               </div>
      
                </div>
        
                <!--===== FOOTER AREA END =======--> --}}