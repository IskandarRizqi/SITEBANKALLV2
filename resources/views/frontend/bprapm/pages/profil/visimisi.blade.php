@extends('frontend.bprapm.layout.main')

@section('content')
    <style>
        .common-heros {
            background: url('{{ asset(env('GLOBAL_BANERTOPPROFIL')) }}') no-repeat center center;
            background-size: contain;
            height: 170px;
            max-width: 1120px;
            margin: 90px auto 0 auto;
            border-radius: 15px;
        }


        /* Versi Mobile */
        @media (max-width: 768px) {
            .common-heros {
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
                background-size: contain;

                width: calc(100% - 30px);
                height: 120px;
        
                margin: 80px auto 0 auto;
                border-radius: 10px;
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

        <div class="common-heros">
        </div>


        <div
            style="font-family:'Open Sans', sans-serif;  display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; margin: 0;">
            <div style="width: 100%; max-width: 1120px;">
               <h2 style="text-align: center; font-weight: bold; margin-bottom: 55px; color: #000000;">Profil</h2>
                <!-- Visi Section -->
                <div
                    style="background: linear-gradient(90deg,rgba(32, 37, 129, 1) 0%, rgba(1, 145, 76, 1) 100%); color: white; padding: 25px 30px; position: relative; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div
                        style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                        <img src="frontend/bprrudo/assets/img/icons/visi.png" alt="" style="height: 40px">
                        <span style="margin-left: 10px">Visi</span>
                    </div>
                    <div style="font-size: 20px; line-height: 1.5; padding-left: 47px;">
                        Menjadi Bank yang sehat, kuat, membanggakan, dan terdepan melayani Masyarakat Umum dan UMKM di Tegal, Brebes, Pemalang dan sekitarnya
                    </div>
                </div>

                <!-- Misi Section -->
                <div
                    style="background: linear-gradient(90deg, rgba(1, 145, 76, 1) 0%, rgba(32, 37, 129, 1) 100%); color: white; padding: 25px 30px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div
                        style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                        <img src="frontend/bprrudo/assets/img/icons/misi.png" alt="" style="height: 40px">
                        <span style="margin-left: 10px">Misi</span>
                    </div>
                    <div style="list-style: none; padding-left: 47px;">
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">1. </span>
                            Memberikan solusi yang tepat masalah keuangan bagi Masyarakat Umum dan modal kerja bagi UMKM.
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">2. </span>
                            Melayani lebih baik.
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">3. </span>
                            Menjadi tempat yang aman dan menarik untuk berinvestasi.
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">4. </span>
                            Menciptakan nilai tambah bagi Pemegang Saham.
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">5. </span>
                            Menjadi tempat bagi Karyawan untuk pengembangan karir dan peningkatan kesejahteraan.
                        </div>
                    </div>
                </div>
                
                <!-- Motto Section -->
                <div
                    style="background: linear-gradient(90deg,rgba(32, 37, 129, 1) 0%, rgba(1, 145, 76, 1) 100%); color: white; padding: 25px 30px; position: relative; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div
                        style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                        <img src="frontend/bprrudo/assets/img/icons/visi.png" alt="" style="height: 40px">
                        <span style="margin-left: 10px">Motto</span>
                    </div>
                    <div style="font-size: 20px; line-height: 1.5; padding-left: 47px;">
                        Seluruh Insan Bank Arthapuspa Mega memegang teguh dan berkomitmen selalu melayani lebih baik.
                    </div>
                </div>
                
                <!-- Tujuan Section -->
                <div
                    style="background: linear-gradient(90deg, rgba(1, 145, 76, 1) 0%, rgba(32, 37, 129, 1) 100%); color: white; padding: 25px 30px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div
                        style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                        <img src="frontend/bprrudo/assets/img/icons/misi.png" alt="" style="height: 40px">
                        <span style="margin-left: 10px">Tujuan</span>
                    </div>
                    <div style="list-style: none; padding-left: 47px;">
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">1. </span>
                            Dikelola oleh pribadi - pribadi yang sehat, dengan cara yang sehat dan konsisten dengan tujuan menjadi Bank yang sehat.
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">2. </span>
                            Terdepan dalam pelayanan.
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">3. </span>
                            Menjadi Bank yang membanggakan bagi para Stakeholder.
                        </div>
                        <div
                            style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                            <span style="position: absolute; left: 0; font-size: 22px;">4. </span>
                            Menjadi Bank pilihan Masyarakat Umum dan UMKM di Tegal, Brebes, Pemalang dan sekitarnya.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
