@extends('frontend.bprtaruna.layout.main')

@section('content')
    <style>
          .common-heros {
            background: url('{{ asset(env('GLOBAL_BANERTOPPROFIL')) }}') no-repeat center center;
            background-size: contain;
            /* TIDAK terpotong */
            background-color: #fff;
            /* supaya tidak ada hitam */

            height: 170px;
            max-width: 1120px;
            margin: 90px auto 0 auto;
            border-radius: 15px;
        }


        /* Versi Mobile */
        @media (max-width: 768px) {
            .common-heros {
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
                background-size: 100% 50%;
                /* isi penuh TANPA ruang kosong */
                height: 180px;
                margin-top: 30px;
                /* tinggi tetap */
                padding: 0;
                object-fit: contain
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

        <div class="common-heros">
            
        </div>
        <br>
        <br>



        <!--=====SERVICE DETAILS AREA START=======-->

        <div class="service-details-area-all sp" style="  padding-top: 0px;">
            <h2 style="text-align: center; font-weight: bold; margin-bottom: 55px; color: #000000;">Sejarah</h2>
            <div class="container">
                <div class="row">
                    <!-- Kiri: Gambar -->
                    <div class="col-lg-6">
                        <div class="image" style="text-align:center;">
                            <img src="/recfil?display=true&rf={{ $sejarah->banner }}" alt="{{ $sejarah->title }}"
                                style="border-radius:8px; height: 460px; width: 500px;">
                        </div>

                    </div>

                    <!-- Kanan: Text -->
                    <div class="col-lg-6 col-md-12 col-12 ">
                        <div class="service-details-post">
                            <article>
                                <div class="details-post-area">
                                    <div class="heading1">
                                        <div class="event-content">
                                            {!! $sejarah->content !!}
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--=====CTA AREA START=======-->



        <!--=====CTA AREA END=======-->

    </body>
@endsection
