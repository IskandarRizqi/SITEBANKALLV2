@extends('frontend.bprsms.layout.main')

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
        .job-wrapper {
            max-width: 1125px;
            margin: 0px auto 40px;
            font-family: 'Open Sans', sans-serif;
            color: #333;
        }

        .job-header-title {
            font-size: 25px;
            font-weight: 700;
            color: #c62828;
        }

        /* ===== GALLERY GRID ===== */
        .gallery-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .gallery-item {
            width: calc(50% - 10px);
            border-radius: 6px;
            overflow: hidden;
        }

        .gallery-item img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border-radius: 6px;
            display: block;
        }

        /* ===== EVENT CONTENT ===== */
        .event-content {
            max-width: 100%;
            overflow-x: auto;
            word-wrap: break-word;
            line-height: 1.6;
            text-align: justify;
            font-family: 'Open Sans', sans-serif;
        }

        .event-content * {
            all: revert;
        }

        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {
            .job-wrapper {
                padding: 10px;
                margin-top: 100px;
            }

            .job-header-title {
                font-size: 20px;
            }

            .gallery-grid {
                flex-direction: column;
            }

            .gallery-item {
                width: 100%;
            }

            .gallery-item img {
                height: 220px;
            }
        }

        @media (max-width: 480px) {
            .gallery-item img {
                height: 200px;
            }
        }
    </style>

    <body class="body tg-heading-subheading animation-style3">

        <div class="common-heros"></div>
        <div class="job-wrapper" style="margin-top:50px">
            <!-- ===== GALLERY ===== -->
            <div class="gallery-grid">

                @foreach ($gallery as $item)
                    <div class="gallery-item" style="text-align: center">
                        <img src="/recfil?display=true&rf={{ $item->image }}" alt="Gallery Image">

                        <div class="gallery-desc" style="margin-top: 5px">
                            {{ $item->description }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
@endsection
