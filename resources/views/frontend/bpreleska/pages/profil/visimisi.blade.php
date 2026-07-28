@extends('frontend.bpreleska.layout.main')

@section('content')
    <div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bpreleska/assets/img/banner/banner1.jpg')}}" alt="Breadcrumb" class="breadcrumb-img" />
    </div>
    <body class="body tg-heading-subheading animation-style3">
        <h5 class="display-4 wow fadeInDown" style="color: #000; text-align: center; margin-top: 30px;" data-wow-delay="0.1s">Profil</h5>
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
                      Menjadi BPR yang bertumbuh, sehat, dan mandiri untuk menunjang pertumbuhan ekonomi.
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
                    <li>Meningkatkan kepercayaan masyarakat dengan menghimpun dana dalam bentuk tabungan dan deposito.</li>
                    <li>Menyalurkan kredit usaha dan konsumtif UMKM untuk menunjang pertumbuhan ekonomi rakyat.</li>
                    <li>Meningkatkan kesejahteraan dan kompetensi karyawan BPR Eleska Artha.</li>
                </ul>
              </div>
</div>
</div>

    </body>
@endsection
