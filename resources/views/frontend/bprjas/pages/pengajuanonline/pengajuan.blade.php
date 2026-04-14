@extends('frontend.bprjas.layout.main')

@section('content')
    <style>
        .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 2px solid #ccc;
        }

        .tab-button {
            padding: 10px 20px;
            border: none;
            background-color: #eee;
            cursor: pointer;
            margin-right: 5px;
            border-radius: 5px 5px 0 0;
        }

        .tab-button.active {
            background-color: #fff;
            border-bottom: 2px solid #fff;
            font-weight: bold;
        }

        .tab-content {
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
        }

        .hidden {
            display: none;
        }


        .tab-button {
            background-color: #f1f1f1;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            color: #333;
            border-radius: 4px;
            margin: 0 5px;
            transition: 0.3s;
        }

        .tab-button:hover {
            background-color: #e0e0e0;
        }

        .tab-button.active {
            background-color: #3059CE;
            /* Biru Bootstrap */
            color: white;
        }


        .common-hero {
            background: url('{{ asset(env('GLOBAL_TOPPAGE')) }}') no-repeat center center;
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
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
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
        
        .team-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
    </style>

    <div class="common-hero">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-lg-8 m-auto">
                    <div class="main-heading">
                        <h1 style="font-size: 35px">PENGAJUAN ONLINE</h1>
                        <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a
                                href="index.html">Home</a> <span class="arrow"><i
                                    class="fa-regular fa-angle-right"></i></span> Pengajuan Online <span class="arrow">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="team2 team-page sp" style="padding-top:0px">
        <div class="container">
            <br>

            <h4 style=" text-align:center; color:#f4110d; font-weight:600; margin-bottom:20px;">
                {{-- Pengajuan Online --}}
            </h4>

            <div style=" border:1.5px solid #f4110d; border-radius:8px; padding:30px 15px;">

                <h5 style=" text-align:center; font-weight:600; margin-bottom:30px; ">
                    Pilih Layanan
                </h5>

                <div class="row justify-content-center">

                    <!-- Kredit -->
                    <div class="col-lg-4 col-md-6">
                        <a href="/formpengajuankredit" style="text-decoration:none;color:inherit;">
                            <div class="team-box"
                                style="background:#4c93d1;border-radius:8px;padding:25px 15px;text-align:center;margin-bottom:20px;cursor:pointer;transition:.3s;">
                                <div class="image-area">
                                    <div class="image">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/kredit.png') }}"
                                            style="width:70px;margin-bottom:15px;">
                                    </div>
                                </div>
                                <h5 style="margin-bottom:5px;">Kredit</h5>
                                <p style="font-size:15px;color:#500000055;">Klik disini untuk mengisi formulir <br> pengajuan
                                    Kredit</p>
                            </div>
                        </a>
                    </div>


                    <!-- Tabungan -->
                    <div class="col-lg-4 col-md-6">
                        <a href="/formpengajuantabungan" style="text-decoration:none;color:inherit;">
                            <div class="team-box"
                                style="background:#4c93d1;border-radius:8px;padding:25px 15px;text-align:center;margin-bottom:20px;cursor:pointer;transition:.3s;">
                                <div class="image-area">
                                    <div class="image">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/tabungan.png') }}"
                                            style="width:70px;margin-bottom:15px;">
                                    </div>
                                </div>
                                <h5 style="margin-bottom:5px;">Tabungan</h5>
                                <p style="font-size:15px;color:#000000;">Klik disini untuk mengisi formulir <br> pengajuan
                                    Tabungan</p>
                            </div>
                        </a>
                    </div>



                    <!-- Deposito -->
                    <div class="col-lg-4 col-md-6">
                        <a href="/formpengajuandeposito" style="text-decoration:none;color:inherit;">
                            <div class="team-box"
                                style="background:#4c93d1;border-radius:8px;padding:25px 15px;text-align:center;margin-bottom:20px;cursor:pointer;transition:.3s;">
                                <div class="image-area">
                                    <div class="image">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/deposito.png') }}"
                                            style="width:70px;margin-bottom:15px;">
                                    </div>
                                </div>

                                <h5 style="margin-bottom:5px;">Deposito</h5>
                                <p style="font-size:15px;color:#000000;">
                                    Klik disini untuk mengisi formulir <br>
                                    pengajuan Deposito
                                </p>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
