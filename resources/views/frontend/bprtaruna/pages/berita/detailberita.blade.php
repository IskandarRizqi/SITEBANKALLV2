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

        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* jumlah baris yang ditampilkan */
            -webkit-box-orient: vertical;
            overflow: hidden;
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




        <!--=====SERVICE DETAILS AREA START=======-->

        <div class="service-details-area-all sp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12 ">
                        <div class="service-details-post">
                            <article>
                                <div class="details-post-area" style="padding:10px; max-width:100%; overflow-x:hidden;">
                                    <div class="image">
                                        <img src="/recfil?display=true&rf={{ $berita->banner }}" alt="{{ $berita->title }}"
                                            style="height:440px; object-fit:cover; border-radius:5px;">
                                    </div>
                                    <div class="social-users">
                                        <ul>
                                            <li><a href="#"><img
                                                        src="{{ asset('frontend/bprjas/assets/img/icons/user-icon2.png') }}"
                                                        alt="">
                                                    {{ \Carbon\Carbon::parse($berita->tanggal_tampil)->format('d F Y') }}</a>
                                            </li>
                                            <li><a href="#"><img
                                                        src="{{ asset('frontend/bprjas/assets/img/icons/user-icon3.png') }}"
                                                        alt=""> {{ $berita->tag }}</a></li>
                                        </ul>
                                    </div>
                                    <br>
                                    <div class="heading1">
                                        <h3>{{ $berita->title }}</h3>
                                        <br>
                                        <div class="event-content">
                                            {!! $berita->content !!}
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="sidebar-box-area sidebar-bg mb-40">
                            <h3>Berita Lain</h3>
                            <div class="sidebar-blog-boxs">
                                @foreach ($other_berita as $item)
                                    <div class="sidebar-blogs">
                                        <div class="">
                                            <div class="image">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}" alt=""
                                                    style="border-radius:5px;">
                                            </div>
                                        </div>
                                        <div class="heading">
                                            <a href="#" class="date">
                                                <img src="frontend/bprjas/assets/img/icons/date.png" alt="">
                                                {{ $item->created_at->format('d/m/Y') }}
                                            </a>

                                            <h5>
                                                <a href="{{ route('detberita', $item->id) }}">
                                                    <p class="mb-0 fw-bold text-truncate-2">{{ $item->title }}</p>
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
@endsection
