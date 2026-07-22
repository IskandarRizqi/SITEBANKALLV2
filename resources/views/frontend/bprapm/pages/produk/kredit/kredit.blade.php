
@extends('frontend.bprapm.layout.main')

@section('content')
    <style>
       
        /* Card Kredit */
        .team-box {
            margin-bottom: 30px;
        }

        .kredit-img {
            width: 100%;
            height: 300px;
            object-fit: fill;
            border-radius: 15px;
            transition: 0.3s;
        }

        .kredit-img:hover {
            transform: scale(1.03);
        }

        /* Mobile */
        @media (max-width: 768px) {
            .kredit-img {
                height: auto;
            }
            .breadcrumb-area {
                margin-top: 0;
            }
            
            .common-heros {
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
                background-size: contain;

                width: calc(100% - 30px);
                /*height: 120px;*/
                margin: 80px auto 0 auto;
                border-radius: 10px;
            }
            
        }
        
        
        .common-heros {
            background: url('{{ asset(env('GLOBAL_BANERTOPPROFIL')) }}') no-repeat center center;
            background-size: contain;
            /* TIDAK terpotong */

            height: 170px;
            max-width: 1120px;
            margin: 90px auto 0 auto;
            border-radius: 15px;
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

    <div class="case-studies-area overflow-hidden grid-items default-padding">
        <h2 style="text-align: center; font-weight: bold; margin-bottom: 50px; margin-top: 120px; color: #000000;">Kredit</h2>
        <div class="container">
    <div class="row">
        @foreach ($kredit as $item)
            <div class="col-lg-6 col-md-6 col-12 mb-4">
                <div class="team-box">
                    <div class="info mb-2">
                        <h4>{{ \Illuminate\Support\Str::limit($item->title, 40) }}</h4>
                    </div>
                    <div class="thumb">
                        <a href="{{ route('detkredit', $item->id) }}">
                            <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                alt="{{ $item->title ?? 'kredit' }}"
                                class="kredit-img">
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    </div>
@endsection

