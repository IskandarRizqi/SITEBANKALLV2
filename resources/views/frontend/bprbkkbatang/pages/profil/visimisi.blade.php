@extends('frontend.bprbkkbatang.layout.main')

@section('content')
    <div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bprbkkbatang/assets/img/banner/profile.jpeg')}}" alt="Breadcrumb" class="breadcrumb-img" />
    </div>
    <body class="body tg-heading-subheading animation-style3">
        <h5 class="display-4 wow fadeInDown" style="color: #000; text-align: center; margin-top: 30px;" data-wow-delay="0.1s">PROFIL</h5>
        <div class="service-details-area-all sp mb-5">
          <div class="container mt-8">

              <!-- VISI Section -->
              <div class="flex items-center section-header">
                  <div class="blue-line"></div>
                  <div class="text-xl">VISI</div>
              </div>
              <div class="border-line"></div>
              <div class="section-content mt-2">
                  <p class="text-lg font-semibold text-gray-800">
                      Menjadi Bank yang sehat, kuat, dan efisien serta dipercaya oleh masyarakat diseluruh Kabupaten Batang dan sekitarnya.
                  </p>
              </div>

              <!-- MISI Section -->
              <div class="flex items-center section-header mt-8">
                <div class="blue-line"></div>
                <div class="text-xl">MISI</div>
              </div>
              <div class="border-line"></div>
              <div class="section-content mt-2">
                <ul>
                    <li>BPR Batang Kabupaten Batang sebagai lembaga keuangan mikro yang berusaha untuk memberikan pelayanan terbaik, cepat, akurat, dan terpercaya</li>
                    <li>Mendukung pengembangan usaha mikro dan kecil</li>
                    <li>Menyediakan produk sesuai dengan kebutuhan masyarakat</li>
                    <li>Meningkatkan deviden kepada Pemerintah Daerah serta meningkatkan kesejahteraan pengurus dan karyawan</li>
                </ul>
              </div>
</div>
</div>

    </body>
@endsection
