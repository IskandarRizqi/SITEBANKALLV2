@extends('frontend.nusaintim.layout.main')

@section('content')

<style>
  .common-hero {
    background: url('{{ asset(env(' GLOBAL_TOPPAGE')) }}') no-repeat center center;
    background-size: contain;
    /* default untuk desktop */
    background-position: center;
    color: #fff;
    padding: 40px 0;
    position: relative;
    margin-top: 70px;
    /* jarak dari navbar */
    text-align: center;
    /* teks ke tengah */
  }

  /* Versi Mobile */
  @media (max-width: 768px) {
    .common-hero {
      background: url('{{ asset(env(' GLOBAL_TOPMOBILE')) }}') no-repeat center center;
      background-size: cover;
      /* gambar diperbesar biar penuh */
      min-height: 180px;
      /* tinggi hero agar kelihatan besar */
      display: flex;
      align-items: center;
      /* teks di tengah vertikal */
      justify-content: center;
      /* teks di tengah horizontal */
      padding: 0;
      /* hilangkan padding default */
    }

    .common-hero h1,
    .common-hero h2,
    .common-hero .title {
      font-size: 20px;
      /* sesuaikan ukuran teks agar pas di mobile */
      font-weight: bold;
      color: #000;
      /* atau putih jika kontras dengan background */
    }
  }

  .section-header {
    font-weight: 600;
    padding: 1.5rem;
    color: #1f2937;
  }

  .section-content {
    padding: 0 1.5rem 1.5rem;
  }

  .border-line {
    height: 4px;
    width: 100%;
    background-color: #e5e7eb;
  }

  .blue-line {
    width: 8px;
    height: 100%;
    background-color: #3b82f6;
    margin-right: 1rem;
    border-radius: 4px;
  }
</style>

<body class="body tg-heading-subheading animation-style3">

  <div class="common-hero">
    <div class="container">
      <div class="row align-items-center text-center">
        <div class="col-lg-8 m-auto">
          <div class="main-heading">
            <h1 style="font-size: 35px">VISI MISI</h1>
            <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a href="/">Home</a> <span
                class="arrow"><i class="fa-regular fa-angle-right"></i></span> visi misi <span class="arrow">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="service-details-area-all sp">
    <div class="container mt-8">

      <!-- VISI Section -->
      <div class="flex items-center section-header">
        <div class="blue-line"></div>
        <div class="text-xl">VISI</div>
      </div>
      <div class="border-line"></div>
      <div class="section-content mt-4">
        <p class="text-lg font-semibold text-gray-800">
          Bank Berkarakter dan Terpercaya yang Mensejahterakan Masyarakat Indonesia
        </p>
      </div>

      <!-- MISI Section -->
      <div class="flex items-center section-header mt-8">
        <div class="blue-line"></div>
        <div class="text-xl">MISI</div>
      </div>
      <div class="border-line"></div>
      <div class="section-content mt-4">
        <ul>
          <li>1. Memberikan layanan keuangan yang terbaik kepada masyarakat</li>
          <li>2. Menjadi perusahaan yang sehat, profitable, dan terus berkembang</li>
          <li>3. Mensejahterakan dan memberi nilai tambah kepada seluruh stakeholders</li>
          <li>4. Berperan aktif dalam meningkatkan perekonomian Indonesia</li>
        </ul>
      </div>

    </div>
  </div>


</body>


@endsection