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
    </style>

    <body class="body tg-heading-subheading animation-style3">


        <div class="common-heros"></div>


        <div class="service-details-area-all sp">
            <h2 style="text-align: center; font-weight: bold; margin-bottom: 55px; color: #000000; ">Struktur Organisasi</h2>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">


                        <div class="sidebar-box-area sidebar-bg mb-40">
                            <h3>Profil Terkait</h3>
                            <ul class="features-list">
                                <li><a href="sejarah">Sejarah <span><i class="fa-regular fa-angle-right"></i></span></a>
                                </li>
                                <li><a href="pengurus">Pengurus <span><i class="fa-regular fa-angle-right"></i></span></a>
                                </li>
                                <li><a href="organisasi">Struktur Oranisasi<span><i
                                                class="fa-regular fa-angle-right"></i></span></a></li>

                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-8 col-md-12 col-12 ">
                        <div class="service-details-post">
                            @if ($organisasi)
                                <article>
                                    <div class="details-post-area">
                                        <div class="image" style="text-align:center;">
                                            <img src="/recfil?display=true&rf={{ $organisasi->banner }}"
                                                alt="{{ $organisasi->title }}"
                                                style="border-radius:8px ;height: 450px; width: 900px;">
                                        </div>
                                        <div class="space30"></div>
                                        <div class="heading1">
                                            <div class="event-content">
                                                {!! $organisasi->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @else
                                <div class="alert alert-warning text-center">
                                    Data belum tersedia.
                                </div>
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
