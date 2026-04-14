@extends('frontend.bprjas.layout.main')

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
    <!--=====HERO AREA START=======-->

    <body class="body tg-heading-subheading animation-style3">
        <div class="common-heros">

        </div>

        <!--=====PROJECT BOXS START=======-->

        <div class="project-boxs-area sp">
            <div class="container">
                <div class="row">
                    @php
                        // Group gallery berdasarkan title (kategori)
                        $groupedGallery = $gallery->groupBy('kategori');
                    @endphp

                    @foreach ($groupedGallery as $title => $items)
                        <div class="col-lg-4 col-md-6">
                            <div class="project-page-box">

                                {{-- Carousel --}}
                                <div id="carousel-{{ \Illuminate\Support\Str::slug($title) }}" class="carousel slide"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($items as $key => $item)
                                            <div class="carousel-item @if ($key == 0) active @endif">
                                                <img src="/recfil?display=true&rf={{ $item->image }}"
                                                    alt="{{ $item->title }}" class="d-block w-100"
                                                    style="border-radius:8px; height:360px; object-fit:fill;">
                                            </div>
                                        @endforeach
                                    </div>

                                    {{-- Tombol navigasi --}}
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carousel-{{ \Illuminate\Support\Str::slug($title) }}"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carousel-{{ \Illuminate\Support\Str::slug($title) }}"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>

                                <div class="heading2 mt-2">
                                    <h4>
                                        <a href="" style="font-size: 15px;">
                                            {{ $item->title }}
                                        </a>
                                    </h4>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </body>
@endsection
