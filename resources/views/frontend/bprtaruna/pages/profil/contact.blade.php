@extends('frontend.bprtaruna.layout.main')

@section('content')

<style>
.kantor-container {
  margin: 30px auto;
  max-width: 1100px;
  font-family: Arial, sans-serif;
  font-size: 14px;
}

.section-header {
  background-color: #113ADC; /* biru dongker */
  color: white;
  font-weight: bold;
  padding: 10px;
  margin-top: 20px;
}

.kantor-item {
  padding: 15px;
  border: 1px solid #ddd;
  background: #f9f9f9;
}

.kantor-item strong {
  display: block;
  margin-bottom: 5px;
}

.kantor-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
  gap: 10px;
}

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



   
     
        <!--=====HERO AREA START=======-->

<div class="common-hero">
  <div class="container">
    <div class="row align-items-center text-center">
      <div class="col-lg-8 m-auto">
        <div class="main-heading">
          <h1 style="font-size: 35px">KONTAK</h1>
            <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a href="index.html">Home</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Kontak</span>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>

        <div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-boxs">
                            <div class="heading1">
                                <h2>Kirimkan Pesan Anda</h2>
                                <div class="space16"></div>
                                <p style="text-align:justify">Jika Anda mempunyai pertanyaan mengenai produk dan layanan BPR JAS atau ingin menyampaikan Informasi, Saran, Pengalaman, ataupun Keluhan yang dapat memperbaiki kinerja kami, silakan mengisi formulir dibawah.</p>
                            </div>
                            <div class="contact-box">
                                <div class="icon">
                                    <img src="frontend/bprjas/assets/img/icons/contact-page-icon1.png" alt="">
                                </div>
                                <div class="heading">
                                    <h5>Telepon</h5>
                                    <a href="tel:(0295) 471 488" class="text">(0295) 471 488</a>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="icon">
                                    <img src="frontend/bprjas/assets/img/icons/contact-page-icon2.png" alt="">
                                </div>
                                <div class="heading">
                                    <h5>Email</h5>
                                    <a href="mailto:juwanaarthasentosa@yahoo.com " class="text">juwanaarthasentosa@yahoo.com </a>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="icon">
                                    <img src="frontend/bprjas/assets/img/icons/contact-page-icon3.png" alt="">
                                </div>
                                <div class="heading">
                                    <h5>Kantor Pusat</h5>
                                    <a href="https://www.google.com/maps/place/BPR+Juwana+Artha+Sentosa/@-6.7162902,111.1398401,17z/data=!3m1!4b1!4m6!3m5!1s0x2e772c624125db65:0x1f11ba875d4932de!8m2!3d-6.7162955!4d111.142415!16s%2Fg%2F1pztxp85_?entry=ttu&g_ep=EgoyMDI1MDgxOS4wIKXMDSoASAFQAw%3D%3D" 
                                    class="text">Jl. Komodo No 34 Juwana, Pati Jawa Tengah, Indonesia</a>
                                </div>
                            </div>


                        </div>
                    </div>

                <div class="col-lg-6">
    <div class="contact-form-details">
        <form onsubmit="sendToWhatsApp(event)">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-input">
                        <input type="text" id="nama_panggilan" placeholder="Nama Panggilan" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-input">
                        <input type="text" id="nama_panjang" placeholder="Nama Panjang" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="single-input">
                        <input type="email" id="email" placeholder="Email" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="single-input">
                        <input type="number" id="telepon" placeholder="No. Telepon" required>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="single-input">
                        <textarea id="pesan" cols="30" rows="5" placeholder="Pesan" required></textarea>
                    </div>
                </div>

                <div class="col-lg-12">
                    <button type="submit" class="theme-btn1">Kirim <span><i class="fa-solid fa-arrow-right"></i></span></button>
                </div>
            </div>
        </form>
    </div>
</div>

                </div>
            </div>
        </div>

        <!--=====CONACT AREA END=======-->
       
        <br>
        <br>
    <div class="kantor-container">
            <!-- KANTOR PUSAT -->
          @foreach ($kantor as $item )
            <div class="section-header">{{$item->kantor}}</div>

            <div class="kantor-item">
              
              <p class="flex items-center gap-2" style="font-weight: bold">
                  <i class="fa-solid fa-map-marker-alt text-red-500" style="margin-right: 10px;"></i>
                  <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" 
                    target="_blank" 
                    style="color: inherit; text-decoration: none;">
                      {{ $item->alamat }}
                  </a>
              </p>
              <p class="flex items-center gap-2" style="font-weight: bold">
                  <i class="fa-solid fa-phone text-green-600" style="margin-right: 10px;"></i>
                  <a href="tel:{{ $item->no_telp }}" 
                    style="color: inherit; text-decoration: none;">
                      {{ $item->no_telp }}
                  </a>
              </p>

          </div>



          @endforeach
        </div>



        <div class="contact-map-page">
        <iframe src="https://www.google.com/maps/d/embed?mid=1G5OqPRRfiWj3SnZAxdJFzQB_Xuf6yY8&ehbc=2E312F&noprof=1" width="640" height="480"></iframe>

        </div>


        <!--=====CTA AREA START=======-->
</body>
<script>
function kirimWA() {
    let namaPanggilan = document.getElementById("nama_panggilan").value;
    let namaPanjang   = document.getElementById("nama_panjang").value;
    let email         = document.getElementById("email").value;
    let telepon       = document.getElementById("telepon").value;
    let pesan         = document.getElementById("pesan").value;

    let nomorAdmin = "6281326296688"; // ganti dengan nomor WA tujuan (format internasional)

    let text = `Halo, saya ${namaPanggilan} (${namaPanjang}).
Email: ${email}
Telepon: ${telepon}

Pesan:
${pesan}`;

    let url = `https://wa.me/${nomorAdmin}?text=${encodeURIComponent(text)}`;
    window.open(url, "_blank");
}
</script>

@endsection