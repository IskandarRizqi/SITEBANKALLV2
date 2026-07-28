@extends('frontend.bprman.layout.main')

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
        .team-box {
            margin-bottom: 30px;
        }
        
        .tabungan-img {
            width: 100%;
            height: 250px;
            object-fit: fill;
            border-radius: 15px;
            transition: 0.3s;
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
         .breadcrumb-area {
            margin-top: 90px;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .breadcrumb-area {
                margin-top: 0;
            }
        } .breadcrumb-area {
            margin-top: 90px;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .breadcrumb-area {
                margin-top: 0;
            }
            
            .common-heros {
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
                background-size: 100% 50%;
                /* isi penuh TANPA ruang kosong */
                height: 180px;
                margin-top: 30px;
                /* tinggi tetap */
                padding: 0;
                object-fit: contain;
            }

        }
        
        
        .common-heros {
            background: url('{{ asset ('frontend/bprman/assets/images/banner/tabungan.jpg') }}') no-repeat center center;
            background-size: contain;
            /* TIDAK terpotong */

            height: 500px;
            max-width: 1200px;
            margin: 100px auto 0 auto;
            border-radius: 10px;
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


    <div class="case-studies-area overflow-hidden grid-items default-padding">
    <div class="container">
    <div class="row">
        @foreach ($tabungan as $item)
            <div class="col-lg-6 col-md-6 col-12 mb-4">
                <div class="team-box">
                    <div class="info mb-2">
                        <h4>{{ \Illuminate\Support\Str::limit($item->title, 40) }}</h4>
                    </div>
                    <div class="thumb">
                        <a href="{{ route('dettabungan', $item->id) }}">
                            <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                alt="{{ $item->title ?? 'tabungan' }}"
                                class="tabungan-img">
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    </div>
</body>
@endsection
