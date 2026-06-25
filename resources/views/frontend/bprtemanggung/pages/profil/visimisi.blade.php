@extends('frontend.bprtemanggung.layout.main')

@section('content')
    <div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bprtemanggung/assets/img/banner/banner.jpg')}}" alt="Breadcrumb" class="breadcrumb-img" />
    </div>
    <body class="body tg-heading-subheading animation-style3">
        <h6 class="display-4 wow fadeInDown" style="color: #000; text-align: center; margin-top: 30px; font-size: 40px;" data-wow-delay="0.1s">PROFIL</h6>
        <div class="service-details-area-all sp mb-5">
          <div class="container mt-8">

              <!-- VISI Section -->
              <div class="flex items-center section-header">
                  <div class="blue-line"></div>
                  <div class="text-xl" style="font-size: 25px; font-weight: 600;">VISI</div>
              </div>
              <div class="border-line"></div>
              <div class="section-content mt-2">
                  <p class="text-lg font-semibold text-gray-800">
                      "Bank yang sehat, unggul, dan menjadi pilihan"
                  </p>
                  <span>Maksud dan Tujuan 3 Visi PT. BPR BKK Temanggung adalah:</span>
                  <ul style="list-style-type: none; padding-left: 0;">
                    <li class="isi-visi">1. SEHAT</li>
                    <p>PT BPR BKK Temanggung harus sehat dari sisi keuangannya yang tercermin dari faktor Capital, Asset, Management, Earning, Liquidity dan sehat dari sisi pengelolaannya yang tercermin dari adanya sikap perilakunya yang profesional dan tidak menyimpang dengan ketentuan yang berlaku, dengan motto “BPR yang sehat merupakan segalanya”.</p>
                    <li class="isi-visi">2. UNGGUL</li>
                    <p>PT BPR BKK Temanggung harus menjadi yang paling unggul dalam peningkatan SDM, Pemanfaatan Teknologi Informasi (TI), mempunyai produk yang beragam sesuai dengan kebutuhan masyarakat dan sarana prasarananya memadai, dengan motto “Terdepan dalam kelasnya”.</p>
                    <li class="isi-visi">3. MENJADI PILIHAN</li>
                    <p>PT BPR BKK Temanggung harus dapat menjadi pilihan bagi nasabah, masyarakat dan mitra kerjanya, yaitu menjadi BPR utama dalam setiap melakukan transaksi keuangannya dengan motto “Apabila menjadi pilihan pasti dapat menjadi besar dan dipercaya”.</p>
              </div>

              <!-- MISI Section -->
              <div class="flex items-center section-header mt-8">
                <div class="blue-line"></div>
                <div class="text-xl" style="font-size: 25px; font-weight: 600;">MISI</div>
              </div>
              <div class="border-line"></div>
              <div class="section-content mt-2">
                <ul style="list-style-type: none; padding-left: 0;">
                    <li>1. Menjadi salah satu lembaga penggerak ekonomi rakyat dengan menyediakan modal usaha bagi UMKM.</li>
                    <li>2. Memberikan keuntungan dan manfaat yang optimal bagi pemangku kepentingan (Stakeholders).</li>
                    <li>3. Memberikan pelayanan prima yang didukung oleh SDM yang berkualitas.</li>
                    <li>4. Memerangi praktek rentenir dan pengijon di masyarakat.</li>
                </ul>
              </div>
</div>
</div>

    </body>
@endsection
