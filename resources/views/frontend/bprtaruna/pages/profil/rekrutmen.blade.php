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

    <!--=====HERO AREA START=======-->

    <body class="body tg-heading-subheading animation-style3">
        <div class="common-heros">

        </div>


        <!--=====BLOG AREA START=======-->
        <div class="col-lg-12" style="padding-top: 0px">
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
                                <!-- Loop konten artikel -->
                                @foreach ($rekruitmen as $item)
                                    @csrf
                                    <div class="col-lg-6">
                                        <div class="blog2-box">
                                            <div class="image">
                                                <img src="/recfil?display=true&rf={{ $item->gambar }}" alt=""
                                                    style="height: 300px; border-radius: 5px 5px;">
                                            </div>
                                            <div class="heading1">
                                                <div class="tags">
                                                    <a href="#" class="date"><img
                                                            src="frontend/bprjas/assets/img/icons/date.png" alt="">
                                                        {{ \Carbon\Carbon::parse($item->tanggal_posting)->format('d/m/Y') }}</a>
                                                    <a href="#" class="date outhor">
                                                        <img src="{{ asset('frontend/bprjas/assets/img/icons/user.png') }}"
                                                            alt="">
                                                        {{ $item->tipe_pekerjaan_text }}
                                                    </a>
                                                </div>
                                                <h4><a href="{{ route('detrekrutmen', $item->id) }}"
                                                        style="font-size: 20px;">{{ $item->judul }}</a></h4>
                                                <div class="space16"></div>
                                                {{-- <p>We explore the growing trend of remote work and its implications for cybersecurity.</p> --}}
                                                <div class="space16"></div>
                                                <a href="{{ route('detrekrutmen', $item->id) }}" class="learn">Selengkapnya
                                                    <span><i class="fa-solid fa-arrow-right"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach




                                {{-- 
                                    <div class="space60"></div>
                                    <div class="row">
                                        <div class="col-12 m-auto">
                                            <div class="theme-pagination text-center">
                                            <ul>
                                                <li><a href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                                                <li><a class="active" href="#">01</a></li>
                                                <li><a href="#">02</a></li>
                                                <li>...</li>
                                                <li><a href="#">12</a></li>
                                                <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                                            </ul>
                                            </div>
                                        </div>
                                    </div> --}}

                                <!-- Tambahkan sisa artikel seperti ini -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>

    <!--=====BLOG AREA END=======-->
@endsection
