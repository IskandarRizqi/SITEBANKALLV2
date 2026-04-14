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


        <!--=====progress END=======-->

        <div class="paginacontainer">

            <div class="progress-wrap">
                <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
                </svg>
            </div>

        </div>





        <!--=====HERO AREA START=======-->

        <div class="common-heros">
           
        </div>

        <br><br>

        <!-- BEGIN CONTENT PART -->

        <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
            <div class="row readContent">
                <div class="col-lg-12 mt-3 mb-3">
                    <div class="row d-flex justify-content-center">
                        @foreach ($tahunan as $item)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100 text-center border-0">
                                    <img src="/recfil?display=true&rf={{ $item->thumbnail }}" class="card-img-top rounded-3"
                                        alt="{{ $item->title }}"
                                        style="width: 200px; height: 300px; object-fit: cover; margin: 0 auto;">
                                    <div class="card-body">
                                        <h6 class="text-muted">Laporan</h6>
                                        <h6 class="fw-bold">{{ strtoupper($item->title) }}</h6>
                                        <br>
                                        <a href="/recfil?display=true&rf={{ $item->url }}" target="_blank"
                                            class="btn btn-danger text-white fw-bold px-4">
                                            Download
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- End Row -->
                </div>
            </div>
        </div>

        <!-- END CONTENT PART -->

        <!--=====CTA AREA START=======-->



        <!--=====CTA AREA END=======-->

    </body>
@endsection
