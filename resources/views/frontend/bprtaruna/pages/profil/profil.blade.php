@extends('frontend.bprtaruna.layout.main')

@section('content')
    <style>
        .common-hero {
            background: url('{{ asset(env('GLOBAL_BANERTOPPROFIL')) }}') no-repeat center center;
            background-size: contain;
            /* TIDAK terpotong */
            background-color: #fff;
            /* supaya tidak ada hitam */

            height: 170px;
            max-width: 1200px;
            margin: 90px auto 0 auto;
            border-radius: 15px;
        }


        /* Versi Mobile */
        @media (max-width: 768px) {
            .common-hero {
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
                background-size: 100% 100%;
                /* isi penuh TANPA ruang kosong */
                height: 180px;
                /* tinggi tetap */
                padding: 0;
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
        </div>


        <div
            style="font-family:'Open Sans', sans-serif;  display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; margin: 0;">
            <div style="width: 100%; max-width: 1200px;">
                <h2 style="text-align: center; font-weight: bold; margin-bottom: 25px; color: #000000;">PROFILE</h2>
                <!-- Visi Section -->
                <div
                    style="background-color: #ed2828; color: white; padding: 25px 30px; position: relative; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div
                        style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                        <img src="frontend/bprrudo/assets/img/icons/visi.png" alt="" style="height: 40px">
                        <span style="margin-left: 10px">Visi</span>
                    </div>
                    <div style="font-size: 20px; line-height: 1.5; padding-left: 47px;">
                        Menjadi BPR yang Bersih, Sehat, dan Terpercaya
                    </div>
                </div>

                <!-- Misi Section -->
                <div
                    style="background-color: #142ef3; color: white; padding: 25px 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div
                        style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                        <img src="frontend/bprrudo/assets/img/icons/misi.png" alt="" style="height: 40px">
                        <span style="margin-left: 10px">Misi</span>
                    </div>
                    <div style="list-style: none; padding-left: 47px;">
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                            Memberikan pelayanan terbaik kepada nasabah serta berperan aktif membantu pemerintah dalam
                            pengembangan UMKM
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                            Meningkatkan kinerja BPR yang sehat, kuat, efisien, serta profesional serta berkesinambungan
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                            Meningkatkan nilai tambah investasi pemegang saham serta kesejahteraan karyawan
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                            Menciptakan budaya kerja yang kondusif, sejuk dan nyaman dalam upaya mencapai target jangka
                            pendek, menengah dan panjang
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                            Memberikan pengetahuan tentang manajemen keuangan kepada nasabah
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                            Menjadikan bagian pemasaran sebegai konsultan keuangan pemasaran dan produk bagi para nasabah
                            PT. BPR Taruna Adidaya Santosa
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
