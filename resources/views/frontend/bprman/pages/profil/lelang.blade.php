@extends('frontend.bprman.layout.main')

@section('content')
    <style>
        .auction-card {
            background: #fff;
            border-radius: 10px;
            border: 2px solid #ddd;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .auction-card:hover {
            background: linear-gradient(45deg, #0a1c92, #f6ff00);
            /* biru */
            color: #fff !important;
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .auction-card:hover * {
            color: #fff !important;
        }

        .auction-card:hover .btn {
            background: #d8df0e !important;
            border-color: #d8df0e !important;
            color: #fff !important;
        }

        /* Gambar */
        .main-img-wrapper {
            padding: 8px;
        }

        .main-img {
            width: 100%;
            height: 220px;
            object-fit: fill;
            border-radius: 8px;
        }

        .thumb {
            width: 32%;
            height: 70px;
            object-fit: fill;
            border-radius: 6px;
        }

        .thumb-more {
            width: 32%;
            height: 70px;
            border-radius: 6px;
            background: #333;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .countdown-box {
            position: absolute;
            bottom: 0;
            left: 0;
            margin: 8px;
            padding: 4px 8px;
            background: rgb(63, 36, 237);
            color: white;
            border-radius: 6px;
            font-size: 12px;
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
            background: url('{{ asset ('frontend/bprman/assets/images/banner/lelang.png') }}') no-repeat center center;
            background-size: contain;
            /* TIDAK terpotong */

            height: 170px;
            max-width: 1120px;
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
        <div class="col-lg-12" style="margin-top: 50px;">
            <div class="blog blog-page sp">
                <div class="container">
                    <div class="row">

                        <!-- Konten Gambar Artikel -->
                        <div class="col-lg-12">
                            <div class="row">
                                @foreach ($lelang as $item)
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <a href="{{ route('detlelang', $item->id) }}"
                                            class="text-decoration-none text-dark">
                                            <div class="auction-card shadow-sm border-0">

                                                <!-- Gambar -->
                                                <div class="position-relative main-img-wrapper">
                                                    <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                        alt="Rumah Lelang"
                                                        style="height: 400px; object-fit:fill; width:100%;"
                                                        class="main-img">
                                                    @php
                                                        $now = \Carbon\Carbon::now();
                                                    @endphp

                                                    @if ($now->between(\Carbon\Carbon::parse($item->mulai), \Carbon\Carbon::parse($item->selesai)))
                                                        <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                                            LIVE
                                                        </span>
                                                    @endif

                                                </div>

                                                <!-- Detail -->
                                                <div class="p-3 text-center">
                                                    <h6 class="fw-bold mb-2">
                                                        <i class="fa-solid fa-building me-1"></i>
                                                        {{ $item->title }}
                                                    </h6>
                                                    <p class="small mb-2 text-muted">{{ $item->type_text }}</p>

                                                    <div class="d-flex justify-content-between small mb-2">
                                                        <span>Nilai Limit<br><strong
                                                                class="text-muted">Rp.{{ number_format($item->limit, 0, ',', '.') }}</strong></span>
                                                        <span>Uang
                                                            Jaminan<br><strong
                                                                class="text-muted">Rp.{{ number_format($item->jaminan, 0, ',', '.') }}</strong></span>
                                                    </div>

                                                    <p class="small mb-2">{{ $item->deskripsi }}</p>
                                                    <p class="small fw-bold text-primary mb-2">
                                                        Batas Akhir Setor Uang
                                                        Jaminan<br>{{ \Carbon\Carbon::parse($item->selesai)->format('d-m-Y') }}
                                                    </p>
                                                    <span class="btn btn-sm w-100 fw-bold"
                                                        style="background-color: #0a1c92; color: #fff;">OPEN
                                                        BIDDING</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div>
            </div>

    </body>
@endsection
