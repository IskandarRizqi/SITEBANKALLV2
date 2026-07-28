@extends('frontend.nusaintim.layout.main')

@section('content')

<style>
  .common-hero {
    background: url('{{ asset(env(' GLOBAL_TOPPAGE')) }}') no-repeat center center;
    background-size: cover;
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
    padding: 1rem 1.5rem;
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

  .text-xl {
    font-size: 1.25rem;
  }
</style>

<body class="body tg-heading-subheading animation-style3">

  <div class="common-hero">
    <div class="container">
      <div class="row align-items-center text-center">
        <div class="col-lg-8 m-auto">
          <div class="main-heading">
            <h1 style="font-size: 35px; color: #fff;">VISI MISI</h1>
            <span class="span"><a href="/">Beranda</a> <span class="arrow"><i
                  class="fa-regular fa-angle-right"></i></span> Profil <span class="arrow"><i
                  class="fa-regular fa-angle-right"></i></span> Visi Misi <span class="arrow">
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
          Menjadi lembaga keuangan yang terpercaya dan sustainable dengan melaksanakan fungsi intermediasi secara
          maksimal yang selalu berusaha memberikan nilai tambah kepada setiap stakeholders (masyarakat, pemilik,
          karyawan, dan pemerintah) berdasarkan prinsip prudential banking dan compliance .
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
          <li>1. Memberikan dampak positif kehadiran BPR bagi masyarakat, nasabah, pemegang saham, manajemen dan
            karyawan.</li>
          <li>2. Memberikan solusi keuangan bagi masyarakat dalam penghimpunan dan penyaluran dana yang memiliki nilai
            tambah dan keunggulan.</li>
          <li>3. Melayani secara professional dengan dukungan Sumber Daya Manusia yang berintegritas dan kompeten secara
            konsisten melatih dan mengedukasi nasabah dan masyarakat perihal keuangan.</li>
          <li>4. Memajukan Perekonomian di daerahTemanggung dan sekitarnya.</li>
        </ul>
      </div>

      <!-- MAKSUD DAN TUJUAN Section -->
      <div class="flex items-center section-header mt-8">
        <div class="blue-line"></div>
        <div class="text-xl">MAKSUD DAN TUJUAN PERUSAHAAN</div>
      </div>
      <div class="border-line"></div>
      <div class="section-content mt-4">
        <ul>
          <li>1. Menghimpun dana dari masyarakat dalam bentuk simpanan berupa deposito berjangka, tabungan, dan atau
            bentuk lainnya yang dipersamakan dengan itu.</li>
          <li>2. Memberikan kredit bagi penguasaha kecil dan atau masyarakat perdesaan.</li>
          <li>3. Menyediakan pembiayaan dan penempatan dana secara konvensional, sesuai dengan ketentuan yang ditetapkan
            oleh Bank Indonesia.</li>
          <li>4. Menempatkan dananya dalam bentuk Sertifikat Bank Indonesia, Deposito Berjangka, Sertifikat Deposito dan
            atau tabungan pada bank lain. </li>
        </ul>
      </div>
    </div>
  </div>


</body>


@endsection