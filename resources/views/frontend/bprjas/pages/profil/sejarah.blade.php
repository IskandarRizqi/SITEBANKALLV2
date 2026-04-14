@extends('frontend.bprjas.layout.main')

@section('content')
    <style>
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

        .event-content {
            max-width: 100%;
            overflow-x: auto;
            /* biar kalau ada tabel / gambar besar, muncul scroll horizontal */
            word-wrap: break-word;
            /* biar teks panjang gak keluar area */
            line-height: 1.6;
            /* biar enak dibaca */
            text-align: justify;
            font-family: 'Archivo', sans-serif;
        }
    </style>

    <body class="body tg-heading-subheading animation-style3">


        <!--=====HERO AREA START=======-->

        <div class="common-hero">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-lg-8 m-auto">
                        <div class="main-heading">
                            <h1 style="font-size:35px;">SEJARAH</h1>
                            <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a
                                    href="index.html">Home</a> <span class="arrow"><i
                                        class="fa-regular fa-angle-right"></i></span> Sejarah <span class="arrow">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>



        <!--=====SERVICE DETAILS AREA START=======-->

        <div class="service-details-area-all sp" style="  padding-top: 0px;">
            <div class="container">
                <div class="row">
                    <!-- Kiri: Gambar -->
                    <div class="col-lg-6">
                        <div class="image" style="text-align:center;">
                            <img src="/recfil?display=true&rf={{ $sejarah->banner }}" alt="{{ $sejarah->title }}"
                                style="border-radius:8px; height: 550px; width: 500px;">
                        </div>

                    </div>

                    <!-- Kanan: Text -->
                    <div class="col-lg-6 col-md-12 col-12 ">
                        <div class="service-details-post">
                          @if($sejarah)
                            <article>
                                <div class="details-post-area">
                                    <div class="heading1">
                                        <div class="event-content">
                                            {!! $sejarah->content !!}
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--=====CTA AREA START=======-->



        <!--=====CTA AREA END=======-->

    </body>
@endsection
