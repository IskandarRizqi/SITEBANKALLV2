@extends('frontend.bprrudo.layout.main')

@section('content')
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* ===== BANNER ===== */
        .banner-img {
            width: 100%;
            height: 500px;
            object-fit: fill;
            display: block;
        }

        /* ===== RUNNING TEXT ===== */
        .running-text {
            color: rgb(250, 109, 109);
           
            font-weight: bold;
            padding-right: 80px;
            white-space: nowrap;
            font-family: 'Open Sans', sans-serif;
        }

        /* ===== GALLERY ===== */
        .gallery-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .gallery-card {
            flex-basis: 45%;
            max-width: 45%;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        .gallery-img {
            width: 100%;
            height: 280px;
            object-fit: fill;
            display: block;
        }

        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {
            .banner-img {
                height: 260px;
                object-fit: cover;
            }

            .running-text {
                font-size: 28px;
                padding-right: 40px;
            }

            .gallery-card {
                flex-basis: 100%;
                max-width: 100%;
            }

            .gallery-img {
                height: 200px;
                object-fit: cover;
            }

            .gallery-section {
                padding: 15px !important;
            }
        }

        @media (max-width: 480px) {
            .running-text {
                font-size: 24px;
                padding-right: 30px;
            }
        }
    </style>

    <!-- ===== BANNER ===== -->
    <div style="width:100%; overflow:hidden; margin-top:100px;">
        <img src="{{ asset('frontend/bprrudo/assets/img/profil/galeri.png') }}" style="object-fit: fill; height: auto;" alt="Banner" class="banner-img">
    </div>

    <!-- ===== RUNNING TEXT ===== -->
    <div style="width:100%; overflow:hidden; white-space:nowrap; position:relative; padding:10px 0; ">
        <div
            style="display:flex; width:max-content; font-family:'Open Sans', sans-serif; animation:marquee 90s linear infinite;">
            <span class="running-text" style="font-family:'Open Sans', sans-serif; font-size:40px; font-style:italic;">
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -  SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
            </span>
        </div>
    </div>

    <!-- ===== GALLERY SECTION ===== -->
    <section class="gallery-section" style="padding:20px 0; background:#ffffff;">
        <div class="gallery-wrapper">

            @foreach ($onegallery as $item)
                @csrf
                <div class="gallery-card">

                    <img src="/recfil?display=true&rf={{ $item->image }}" class="gallery-img">

                    <div style="padding:15px 20px;">
                        <h3 style="font-size:17px; font-weight:700; margin-bottom:14px;">
                            {{ $item->title }}
                        </h3>

                        <div style="display:flex; align-items:center; margin-bottom:12px;">
                            <img src="{{ asset('frontend/bprrudo/assets/img/icons/lokertime.png') }}"
                                style="width:18px; margin-right:6px;">
                            <span style="font-size:14px; color:#555;">
                                {{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}
                            </span>

                            <img src="{{ asset('frontend/bprrudo/assets/img/icons/loker1.png') }}"
                                style="width:18px; margin-left:12px; margin-right:6px;">
                            <span style="font-size:14px; color:#555;">Event</span>
                        </div>

                        <a href="{{ route('detgallery', $item->id) }}" style="text-decoration:none;">
                            <button
                                style="
                            width:100%;
                            background:#b72a3a;
                            color:white;
                            padding:12px 0;
                            border:none;
                            border-radius:25px;
                            font-size:15px;
                            cursor:pointer;">
                                Lihat Foto
                            </button>
                        </a>
                    </div>

                </div>
            @endforeach

        </div>
    </section>
@endsection
