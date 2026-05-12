@extends('frontend.bprbahari.layout.main')

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

        /* ===== EVENT GRID ===== */
        .event-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .event-card {
            flex-basis: 45%;
            max-width: 45%;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        .event-img {
            width: 100%;
            height: 280px;
            object-fit: fill;
            display: block;
        }

        .event-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
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

            .event-card {
                flex-basis: 100%;
                max-width: 100%;
            }

            .event-img {
                height: 200px;
                object-fit: cover;
            }

            .event-section {
                padding: 15px !important;
            }
        }

        @media (max-width: 480px) {
            .running-text {
                font-size: 24px;
                padding-right: 30px;
            }

            .event-img {
                height: 180px;
            }
        }
    </style>


    <div style="width:100%; overflow:hidden; margin-top:100px;">
        <img src="{{ asset('frontend/bprrudo/assets/img/profil/event.png') }}" alt="Banner" style="object-fit: fill; height: auto;"
            class="banner-img">
    </div>


    <div style="width:100%; overflow:hidden; white-space:nowrap; position:relative; padding:10px 0; ">
        <div
            style="display:flex; width:max-content; font-family:'Open Sans', sans-serif; animation:marquee 90s linear infinite;">
            <span class="running-text" style="font-family:'Open Sans', sans-serif; font-size:40px; font-style:italic;">
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -  SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
            </span>
        </div>
    </div>

    <section class="event-section" style="padding:20px 0; background:#ffffff;">
        <div class="event-wrapper">

            @foreach ($eventberita as $item)
                @csrf
                <div class="event-card">

                    <img src="/recfil?display=true&rf={{ $item->banner }}" class="event-img" alt="Event Banner">

                    <div style="padding:15px 20px;">
                        <h3
                            style="font-size:17px; font-weight:700; margin-bottom:14px; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; overflow: hidden;">
                            {{ $item->title }}
                        </h3>


                        <div class="event-info">
                            <img src="{{ asset('frontend/bprrudo/assets/img/icons/lokertime.png') }}" style="width:18px;">
                            <span style="font-size:14px; color:#555;">
                                {{ \Carbon\Carbon::parse($item->tanggal_tampil)->format('d/m/Y') }}
                            </span>

                            <img src="{{ asset('frontend/bprrudo/assets/img/icons/loker1.png') }}"
                                style="width:18px; margin-left:10px;">
                            <span style="font-size:14px; color:#555;">
                                @if ($item->type == 0)
                                    Berita
                                @elseif ($item->type == 1)
                                    Event
                                @elseif ($item->type == 2)
                                    Lainnya
                                @else
                                    -
                                @endif
                            </span>

                        </div>

                        <a href="{{ route('detevent', $item->id) }}" style="text-decoration:none;">
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
                                Lihat Detail
                            </button>
                        </a>
                    </div>

                </div>
            @endforeach

        </div>
    </section>
@endsection
