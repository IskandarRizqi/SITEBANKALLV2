@extends('frontend.bprman.layout.main')

@section('content')
    <style>
        /* Card Produk */
        .team-box {
            margin-bottom: 30px;
        }

        .tabungan-img {
            width: 100%;
            height: 400px;
            object-fit: fill;
            border-radius: 15px;
            transition: 0.3s;
        }

        .tabungan-img:hover {
            transform: scale(1.03);
        }

        /* Mobile */
        @media(max-width:768px) {
            .tabungan-img {
                height: auto;
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
            background: url('{{ asset ('frontend/bprman/assets/images/banner/deposito.jpg') }}') no-repeat center center;
            background-size: cover;
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
        <div class="common-heros">
            
        </div>
        <br>
   <div class="case-studies-area overflow-hidden grid-items default-padding">
       
        <div class="container">
            <div class="case-items-area">
                <div class="masonary">
                    <div id="portfolio-grid" class="case-items colums-3">

                        @foreach ($deposito as $item)
                            <div class="pf-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            alt="{{ $item->title ?? 'kredit' }}"
                                            style="width: 100%; height: 380px; object-fit: fill; border-radius: 10px;">
                                        <a href="/recfil?display=true&rf={{ $item->thumbnail }}" class="item popup-gallery">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="tags">
                                            <a href="{{ route('detdeposito', $item->id) }}">
                                                {{ implode(', ', json_decode($item->tag, true) ?? []) }}
                                            </a>
                                        </div>
                                        <h4>
                                            <a href="{{ route('detdeposito', $item->id) }}">
                                                {{ \Illuminate\Support\Str::limit($item->title, 40) }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
