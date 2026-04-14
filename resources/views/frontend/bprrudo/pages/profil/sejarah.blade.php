@extends('frontend.bprrudo.layout.main')

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

        /* Responsive Running Text */
        .running-text {
            color: rgb(250, 109, 109);
            font-size: 58px;
            font-weight: bold;
            padding-right: 80px;
            white-space: nowrap;
        }

        @media(max-width:768px) {
            .running-text {
                font-size: 28px;
                padding-right: 40px;
            }
        }

        /* Image circle responsive */
        .hero-circle {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
        }

        @media(max-width:768px) {
            .hero-circle {
                width: 35px;
                height: 35px;
            }
        }

        /* Responsive text content */
        .text-content {
            font-size: 16px;
            line-height: 1.7;
            text-align: justify;
        }

        @media(max-width:768px) {
            .text-content {
                font-size: 14px;
            }
        }

        /* Responsive side images */
        .side-img {
            width: 100%;
            height: 140px;
            border-radius: 12px;
            object-fit: cover;
        }

        @media(max-width:768px) {
            .side-img {
                height: 100px;
            }
        }

        /* Left main image */
        .main-img {
            width: 100%;
            height: 80%;
            border-radius: 12px;
            object-fit: cover;
        }

        @media(max-width:768px) {
            .main-img {
                height: 180px;
            }
        }

        @media (max-width:768px) {
            .mobile-order-1 {
                order: 1;
            }

            .mobile-order-2 {
                order: 2;
            }
        }

        .event-content * {
            all: revert;
        }
    </style>

    <!-- Banner -->
    <div style="width:100%; overflow:hidden; margin-top:100px;">
        @if ($sejarah && $sejarah->banner)
            <img src="/recfil?display=true&rf={{ $sejarah->banner }}" alt="Banner" class="banner-img"
                style="object-fit: fill; height: auto;">
        @else
            <img src="{{ asset('frontend/bprrudo/assets/img/profil/sejarahhh.png') }}" alt="Banner" class="banner-img"
                style="object-fit: fill; height: auto;">
        @endif

    </div>

    <!-- Running Text -->
    <div style="width:100%; overflow:hidden; white-space:nowrap; position:relative; padding:10px 0;">
        <div
            style="display:flex; width:max-content; font-family:'Open Sans', sans-serif; animation:marquee 90s linear infinite;">
            <span class="running-text" style="font-family:'Open Sans', sans-serif; font-size:40px; font-style:italic;">
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -  SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
            </span>
        </div>
    </div>

    @if ($sejarah)
        <div class="container" style="margin-top:40px;">
            <div class="row">

                <div class="col-lg-5 col-md-12">
                    <h2 style="font-weight:800;color:#b80000;margin-bottom:20px;font-family:'Open Sans',sans-serif;">
                        {{ $sejarah->title }}</h2>

                    <div style="width:100%;">

                        @if ($sejarah && $sejarah->banner)
                            <img src="/recfil?display=true&rf={{ $sejarah->banner }}" alt="Banner" class="banner-img"
                                style="width:100%;border-radius:14px;object-fit:fill; height: 300px;">
                        @else
                            <img src="{{ asset('frontend/bprrudo/assets/img/profil/sejarahhh.png') }}" alt="Banner"
                                class="banner-img" style="width:100%;border-radius:14px;object-fit:fill; height: 300px;">
                        @endif
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:10px;">
                            <img src="{{ asset('frontend/bprrudo/assets/img/profil/1.png') }}"
                                style="width:100%;border-radius:14px;object-fit:cover; height: 200px;">
                            <img src="{{ asset('frontend/bprrudo/assets/img/profil/2.png') }}"
                                style="width:100%;border-radius:14px;object-fit:cover; height: 200px;">
                        </div>

                        <div style="display:flex;justify-content:center;margin-top:12px;">
                            <img src="{{ asset('frontend/bprrudo/assets/img/hero/1.png') }}"
                                style="width:45px;height:45px;border-radius:50%;border:3px solid #fff;">
                            <img src="{{ asset('frontend/bprrudo/assets/img/hero/2.png') }}"
                                style="width:45px;height:45px;border-radius:50%;border:3px solid #fff;margin-left:-12px;">
                            <img src="{{ asset('frontend/bprrudo/assets/img/hero/3.png') }}"
                                style="width:45px;height:45px;border-radius:50%;border:3px solid #fff;margin-left:-12px;">
                            <img src="{{ asset('frontend/bprrudo/assets/img/hero/4.png') }}"
                                style="width:45px;height:45px;border-radius:50%;border:3px solid #fff;margin-left:-12px;">
                            <div
                                style="width:45px;height:45px;border-radius:50%;background:#000;color:#fff;font-weight:bold;font-size:13px;display:flex;align-items:center;justify-content:center;border:3px solid #fff;margin-left:-12px;">
                                9K+</div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-7 col-md-12 text-content" style=" font-family:'Open Sans', sans-serif;"">
                    <p>
                        {!! $sejarah->content !!}
                    </p>
                </div>

            </div>
        </div>
    @endif
@endsection
