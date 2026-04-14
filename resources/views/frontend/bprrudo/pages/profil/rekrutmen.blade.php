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

        .banner-img {
            width: 100%;
            height: 500px;
            object-fit: fill;
            display: block;
        }

        @media (max-width: 768px) {
            .banner-img {
                height: 260px;
                object-fit: cover;
            }
        }

        .running-text {
            color: rgb(250, 109, 109);
           
            font-weight: bold;
            padding-right: 80px;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .running-text {
                font-size: 28px;
                padding-right: 40px;
            }
        }

        @media (max-width: 480px) {
            .running-text {
                font-size: 24px;
                padding-right: 30px;
            }
        }

        @media (max-width: 768px) {
            .job-wrapper {
                gap: 16px !important;
                padding: 0 14px;
            }

            .job-card {
                flex-basis: 100% !important;
                max-width: 100% !important;
            }

            .job-info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }
        }
    </style>

    <div style="width:100%; overflow:hidden; margin-top:100px;">
        <img src="{{ asset('frontend/bprrudo/assets/img/profil/loker.png') }}"  style="object-fit: fill; height: auto;" alt="Banner"
            class="banner-img">
    </div>

    <div style="width:100%; overflow:hidden; white-space:nowrap; position:relative; padding:10px 0;">
        <div
            style="display:flex; width:max-content; font-family:'Open Sans', sans-serif; animation:marquee 90s linear infinite;">
            <span class="running-text" style="font-family:'Open Sans', sans-serif; font-size:40px; font-style:italic;">
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -  SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
            </span>
        </div>
    </div>

    <section style="padding:20px 0; background:#ffffff;">
        <div class="job-wrapper"
            style="display:flex; flex-wrap:wrap; justify-content:center; gap:25px; max-width:1200px; margin:auto;">

            @foreach ($rekruitmen as $item)
                @csrf
                <div class="job-card"
                    style="flex-basis:48%; max-width:48%; background:#fff; border-radius:15px;
                box-shadow:0px 4px 12px rgba(0,0,0,0.12); overflow:hidden;">

                    <img src="/recfil?display=true&rf={{ $item->gambar }}"
                        style="width:100%; height:280px; object-fit:fill;">

                    <div style="padding:15px 20px;">
                        <h3 style="font-size:17px; font-weight:700; margin-bottom:14px;">
                            {{ $item->judul }}
                        </h3>

                        <div class="job-info-row" style="display:flex; justify-content:space-between; margin-bottom:10px;">
                            <div style="display:flex; align-items:center;">
                                <img src="{{ asset('frontend/bprrudo/assets/img/icons/lokergudang.png') }}"
                                    style="width:18px; margin-right:6px;">
                                <span style="font-size:14px; color:#555;">PT. BPR Rudo Indobank</span>
                            </div>
                            <div style="display:flex; align-items:center;">
                                <img src="{{ asset('frontend/bprrudo/assets/img/icons/lokermap.png') }}"
                                    style="width:18px; margin-right:6px;">
                                <span style="font-size:14px; color:#555;">{{ $item->lokasi }}</span>
                            </div>
                        </div>

                        <div class="job-info-row" style="display:flex; justify-content:space-between; margin-bottom:15px;">
                            <div style="display:flex; align-items:center;">
                                <img src="{{ asset('frontend/bprrudo/assets/img/icons/loker1.png') }}"
                                    style="width:18px; margin-right:6px;">
                                <span style="font-size:14px; color:#555;">
                                    {{ $item->tipe_pekerjaan_text }}
                                </span>
                            </div>
                            <div style="display:flex; align-items:center;">
                                <img src="{{ asset('frontend/bprrudo/assets/img/icons/lokertime.png') }}"
                                    style="width:18px; margin-right:6px;">
                                <span style="font-size:14px; color:#555;">
                                    {{ \Carbon\Carbon::parse($item->tanggal_posting)->format('d/m/Y') }}
                                </span>
                            </div>
                        </div>

                        <a href="{{ route('detrekrutmen', $item->id) }}" style="text-decoration:none;">
                            <button
                                style="width:100%; background:#b72a3a; color:white; padding:12px 0;
                            border:none; border-radius:25px; font-size:15px; cursor:pointer;">
                                Lihat Detail
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
