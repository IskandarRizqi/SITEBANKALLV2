<style>
   .fspons {
      width: 75%;
      height: 60%;
   }
   .fspons1 {
      width: 80%;
      height: 65%;
   }
   /* Kurangi gap antar kolom footer di mobile */
   @media (max-width: 991.98px) {
      .row.g-5 {
         --bs-gutter-y: 1.75rem; /* jarak vertikal lebih wajar, dari 3rem jadi ~1.75rem */
      }
   }

   /* Footer bawah: center-kan di mobile */
   @media (max-width: 767.98px) {
      .fbot .d-flex {
         flex-direction: column;
         text-align: center;
         gap: 8px !important;
      }
      .fbot-links {
         display: flex;
         gap: 4px;
      }
      .fbot-links a {
         margin: 0 8px;
      }
   }
</style>
<footer>
      <div class="container" style="margin-bottom: 46px;">
         <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="col-3">
               <img src="{{asset('frontend/bprbkkbatang/assets/img/logo/ojk.png')}}" alt="Logo" class="fspons" />
            </div>
            <div class="col-3">
               <img src="{{asset('frontend/bprbkkbatang/assets/img/logo/bi.png')}}" alt="Logo" class="fspons1"/>
            </div>
            <div class="col-3">
               <img src="{{asset('frontend/bprbkkbatang/assets/img/logo/ket.png')}}" alt="Logo" class="fspons1"/>
            </div>
            <div class="col-3">
               <img src="{{asset('frontend/bprbkkbatang/assets/img/logo/ppatk.png')}}" alt="Logo" class="fspons"/>
            </div>
         </div>
      </div>
   
   <div class="container">
      <div class="row g-5">
         <div class="col-lg-4">
            <img src="{{asset('frontend/bprbkkbatang/assets/img/logo/logo.png')}}" alt="Logo" class="flogo"/>
            <p class="fdesc">Partner Pengembangan Usaha Anda</p>
         </div>
         <div class="col-sm-6 col-lg-3">
            <div class="ftit">Alamat</div>
            <p class="fdesc1">Kantor Pusat:</p>
              <p class="fdesc1" style="margin-bottom: 0; margin-top: 0;">Jl. Yos Sudarso Karang Widoro, Karang Utara, Batang</p>
              <p class="fdesc1" style="margin-bottom: 0; margin-top: 0;">Telp. (0285) 391178</p>
         </div>
         <div class="col-sm-6 col-lg-3">
             <div class="ftit">Jaringan Media Sosial</div>
              <p class="fdesc1">Ikuti juga di media sosial kami</p>
             <div class="fsoc">
                 <a href="https://www.instagram.com/ptbprbkkbatang?igsh=Z2twYm5ybTh3bjF0"><i class="fab fa-instagram fa-xl"></i></a>
                 <a href="https://wa.me/+6281329143536"><i class="fab fa-whatsapp fa-xl"></i></a>
                 <a href="https://www.tiktok.com/@bpr.bkk.batang?_t=ZS-8zzJpTP9aZF&_r=1"><i class="fab fa-tiktok fa-xl"></i></a>
              </div>
          </div>

          <div class="col-sm-6 col-lg-2">
             <div class="ftit">Tautan</div>
             <ul class="flinks ps-0">
                <li><a href="/rekrutmen"><i class="fas fa-chevron-right"></i>Karir</a></li>
                <li><a href="/informasi"><i class="fas fa-chevron-right"></i>Berita</a></li>
                <li><a href="/tatakelola"><i class="fas fa-chevron-right"></i>Tata Kelola</a></li>
                <li><a href="/pengaduan"><i class="fas fa-chevron-right"></i>Pengaduan Nasabah</a></li>
             </ul>
          </div>
      </div>
   </div>
   <div class="fbot">
   <div class="container">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
         <p class="mb-0">&copy; Copyright <span>BPR BKK Batang</span>. All Rights Reserved by</p>
         <div class="fbot-links">
            <a href="/privasipolicy">Privacy Policy</a>
            <a href="/terms">Terms</a>
         </div>
      </div>
   </div>
</div>
</footer>