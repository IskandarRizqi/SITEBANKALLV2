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

        .auction-card {
            background: #fff;
            border-radius: 10px;
            border: 2px solid #ddd;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .auction-card:hover {
            background: #ff1313;
            /* biru */
            color: #fff !important;
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .auction-card:hover * {
            color: #fff !important;
        }

        .auction-card:hover .btn {
            background: #1118ed !important;
            border-color: #1118ed !important;
            color: #fff !important;
        }

        /* Gambar */
        .main-img-wrapper {
            padding: 8px;
        }

        .main-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
        }

        .thumb {
            width: 32%;
            height: 70px;
            object-fit: cover;
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
            background: red;
            color: white;
            border-radius: 6px;
            font-size: 12px;
        }
    </style>

    <body class="body tg-heading-subheading animation-style3">



        <div class="common-heros">
        
        </div>
  


        <div class="col-lg-12">
            <div class="blog blog-page sp">
                <div class="container">
                    <div class="row">
                        <!-- Sidebar Produk Terkait -->
                        <div class="col-lg-4">
                            <div class="sidebar-box-area sidebar-bg mb-40">
                                <h3>Tautan Terkait</h3>
                                <ul class="features-list">


                                    <li><a href="rekrutmen">E-Recruitment <span><i
                                                    class="fa-regular fa-angle-right"></i></span></a></li>
                                    <li><a href="pengaduan">Pengaduan Pelanggaran <span><i
                                                    class="fa-regular fa-angle-right"></i></span></a></li>

                                </ul>
                            </div>
                        </div>

                        <!-- Konten Gambar Artikel -->
                        <div class="col-lg-8">
                            <div class="row">
                                @foreach ($lelang as $item)
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <a href="{{ route('detlelang', $item->id) }}"
                                            class="text-decoration-none text-dark">
                                            <div class="auction-card shadow-sm border-0">

                                                <!-- Gambar -->
                                                <div class="position-relative main-img-wrapper">
                                                    <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                        alt="Rumah Lelang"
                                                        style="height: 400px; object-fit:cover; width:100%;"
                                                        class="main-img">
                                                    @php
                                                        $now = \Carbon\Carbon::now();
                                                    @endphp

                                                    @if($now->between(
                                                            \Carbon\Carbon::parse($item->mulai),
                                                            \Carbon\Carbon::parse($item->selesai)
                                                        ))
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
                                                                        class="text-warning">Rp.{{ number_format($item->limit, 0, ',', '.') }}</strong></span>
                                                                <span>Uang
                                                                    Jaminan<br><strong>Rp.{{ number_format($item->jaminan, 0, ',', '.') }}</strong></span>
                                                            </div>

                                                            <p class="small mb-2">{{ $item->deskripsi }}</p>
                                                            <p class="small fw-bold text-primary mb-2">
                                                                Batas Akhir Setor Uang
                                                                Jaminan<br>{{ \Carbon\Carbon::parse($item->selesai)->format('d-m-Y') }}
                                                            </p>
                                                            <span class="btn btn-sm btn-success w-100 fw-bold">OPEN
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


            <!--=====CTA AREA START=======-->



            <!--=====CTA AREA END=======-->

    </body>
@endsection
