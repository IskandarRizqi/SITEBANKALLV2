@extends('frontend.bprrudo.layout.main')

@section('content')
    <style>
        /* Running text animation */
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Responsive Banner */
        .banner-img {
            width: 100%;
            height: 500px;
            object-fit: fill;
            display: block;
        }

        @media(max-width:768px) {
            .banner-img {
                height: 260px;
                object-fit: cover;
            }
        }

        /* Responsive Running Text */
        .running-text {
            color: rgb(250, 109, 109);
            font-size: 58px;
            font-weight: bold;
            padding-right: 80px;
            white-space: nowrap;
        }

        @media(max-width:768px) {
            .running-text {
                font-size: 28px;
                padding-right: 40px;
            }
        }
    </style>

    <!-- Banner -->
    <div style="width:100%; overflow:hidden; margin-top:100px; ">
        <img src="{{ asset('frontend/bprrudo/assets/img/profil/sejarahhh.png') }}" style="object-fit: fill; height: auto;" alt="Banner"
            class="banner-img">
    </div>

    <!-- Running Text -->
    <div style="width:100%; overflow:hidden; white-space:nowrap; position:relative; padding:10px 0;">
        <div
            style="display:flex; width:max-content; font-family:'Open Sans', sans-serif; animation:marquee 90s linear infinite;">
            <span class="running-text" style="font-family:'Open Sans', sans-serif; font-size:40px; font-style:italic;">
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -  SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
            </span>
        </div>
    </div>

    <div
        style="font-family:'Open Sans', sans-serif;  display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; margin: 0;">
        <div style="width: 100%; max-width: 1200px;">
            <h2 style="text-align: center; font-weight: bold; margin-bottom: 10px; color: #A62C3D;">VISI MISI</h2>
            <!-- Visi Section -->
            <div
                style="background-color: #E77E5F; color: white; padding: 25px 30px; position: relative; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <div style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                    <img src="frontend/bprrudo/assets/img/icons/visi.png" alt="" style="height: 40px">
                    <span style="margin-left: 10px">Visi</span>
                </div>
                <div style="font-size: 20px; line-height: 1.5; padding-left: 47px;">
                    Menjadi BPR yang Bersih, Sehat, dan Terpercaya
                </div>
            </div>

            <!-- Misi Section -->
            <div
                style="background-color: #ED943E; color: white; padding: 25px 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <div style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                    <img src="frontend/bprrudo/assets/img/icons/misi.png" alt="" style="height: 40px">
                    <span style="margin-left: 10px">Misi</span>
                </div>
                <div style="list-style: none; padding-left: 47px;">
                    <div
                        style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                        <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                        Meningkatkan kinerja BPR yang sehat dan berkesinambungan dengan memberikan pelayanan terbaik kepada
                        nasabah.
                    </div>
                    <div
                        style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                        <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                        Menjadikan nasabah sebagai mitra usaha yang utama dan bisa memberikan solusi terhadap kebutuhan
                        keuangan mereka dengan prinsip kehati-hatian dan saling menguntungkan.
                    </div>
                    <div
                        style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                        <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                        Menjalankan tata Kelola BPR dengan baik dan profesional sehingga tercipta Good Corporate Governance.
                    </div>
                    <div
                        style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                        <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                        Meningkatkan kesejahteraan bagi seluruh karyawan dan pengurus, memberikan keuntungan bagi pemegang
                        saham serta memberikan nilai tambah bagi seluruh stake holder.
                    </div>
                    <div
                        style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                        <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                        Menjalin sinergi antara pemegang saham, pengurus, karyawan, dan nasabah untuk mewujudkan BPR yang
                        bersih, sehat dan terpercaya.
                    </div>
                    <div
                        style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                        <span style="position: absolute; left: 0; font-size: 22px;">•</span>
                        Mendukung pengembangan ekonomi daerah yang sehat dan produktif, dengan memberikan kredit kepada
                        masyarakat dan para pengusaha UMKM..
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
